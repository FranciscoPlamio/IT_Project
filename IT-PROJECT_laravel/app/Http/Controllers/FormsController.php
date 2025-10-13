<?php

namespace App\Http\Controllers;

use App\Helpers\FormManager;
use App\Models\Forms\Form1_01;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Forms\Form1_01\Form101ApplicationDetails;
use App\Models\Forms\Form1_01\ApplicantDetails;
use App\Models\Forms\Form1_01\RequestAssistance;
use App\Models\Forms\Form1_01\Declaration;
use App\Models\Forms\FormsMeta;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class FormsController extends Controller
{
    // In FormController or a dedicated page controller
    public function index()
    {
        $forms = [
            ['number' => '1-01', 'title' => 'Application for Radio Operator Examination'],
            ['number' => '1-02', 'title' => 'Application for Radio Operator Certificate'],
            ['number' => '1-03', 'title' => 'Application for Amateur Radio Operator Certificate/AmateurRadio Station License'],
            ['number' => '1-09', 'title' => 'Aplication for Permit to Purchase/Possess/Sell/Transfer'],
            ['number' => '1-11', 'title' => 'Application for Construction Permit/Radio Station License'],
            ['number' => '1-13', 'title' => 'Form D (For Modification)'],
            ['number' => '1-14', 'title' => 'Application for Temporary Permit to Propagate/Demonstrate'],
            ['number' => '1-16', 'title' => 'Application for Permit to Transport Radio Transmitter/Transceiver'],
            ['number' => '1-18', 'title' => 'Application for Dealer/Manufacturer/Service/Center/Retailer/Reseller/Permit/CPE
                                Supplier Accreditation'],
            ['number' => '1-19', 'title' => 'Application for Certificate of Registration (WDN/SRD/RFID/SRRS/Public Trunk Radio)'],
            ['number' => '1-20', 'title' => 'Application for Certificate of Registration - Value Added Services'],
            ['number' => '1-21', 'title' => 'Application for Duplicate of Permit/License/Certificate'],
            ['number' => '1-22', 'title' => 'Application for TVRO Registration Certificate/TVRO/Station License/CATV Station
                                License'],
            ['number' => '1-24', 'title' => 'Affidavit of Ownership and Loss with Undertaking'],
            ['number' => '1-25', 'title' => 'Complaint Form'],
        ];

        return view('FormsList', compact('forms'));
    }


    public function show($formType)
    {
        return view("clientside.forms.Form{$formType}", compact('formType'));
    }

    /**
     * Load Form 1-01 for editing using form token or applicant ID.
     */
    public function edit(Request $request, $formType)
    {
        // Check token
        $token = $request->query('token') ?: $request->input('token');
        if (!$token) {
            return redirect()->route('forms.show', ['formType' => $formType])->withErrors('Missing form token.');
        }

        // Check form
        $form = session('form_' . $formType . '_' . $request->input('token'));
        if (!$form) {
            return redirect()->route('forms.show', ['formType' => $formType])->withErrors('Form not found.');
        }

        // Check if user is editing his/her own form.
        $sessionEmail = session('email_verified');
        $user = User::where('email', $sessionEmail)->first();

        if (!$user || (string) $form['user_id'] !== (string) $user->_id) {
            return redirect()->route('forms.show', ['formType' => $formType])->withErrors('Unauthorized access to this form.');
        }

        $form['form_token'] = $token;

        return view('clientside.forms.Form' . $formType, [
            'form' => $form,
            'formType' => $formType
        ]);
    }

    /**
     * Store Application Details section (Form 1-01) into the database.
     */
    public function storeApplication(Request $request)
    {
        $validated = $request->validate([
            'date_of_exam' => ['nullable', 'date'],
            'rtg' => ['nullable', 'array'],
            'amateur' => ['nullable', 'array'],
            'rphn' => ['nullable', 'array'],
            'rroc' => ['nullable', 'array'],
        ]);

        $formToken = $request->input('form_token');
        if (!$formToken) {
            $formToken = (string) Str::uuid();
        }

        // Otherwise redirect back with token in session for linking next steps
        return redirect()->back()->with([
            'status' => 'Application Details saved',
            // 'form_token' => $record->form_token,
        ]);
    }

    /**
     * Store the entire Form 1-01 (all sections) in one request.
     */
    public function storeAll(Request $request, $formType)
    {
        $formToken = $request->input('form_token');

        // Form
        $validated = session('form_' . $formType . '_' . $request->input('form_token'));
        if (!$validated) {
            return back()->withErrors(['message' => 'No form data found in session.']);
        }

        // User email
        $user = $this->getUser();

        // $status = $request->input('status', 'draft');
        // $transactionData = ['status' => $status];

        // Save using FormManager
        $result = FormManager::saveForm('form' . $formType, $formToken, $validated, $user->_id);

        // if ($status === 'submitted') {
        //     session()->forget("form101_" . $formToken);
        // }

        if ($request->wantsJson()) {
            dd($result);
            return response()->json([
                'message' => 'Form ' . $formType . ' saved',
                'form_token' => $formToken,
                'form' => $result['form'],
                'meta' => $result['meta'],
            ]);
        }

        return redirect()->route('payment.method')->with([
            'status' => 'Form 1-01 saved',
        ]);
    }

    public function preview(Request $request, $formType)
    {
        // Gets rules of a form
        // App\Helpers\FormManager
        $rules = FormManager::getValidationRules($formType);
        // dd($rules);
        // Validate fields of a form, if there are invalid it will print error messages
        try {
            $validated = $request->validate(
                $rules['rules'],
                $rules['messages'],
                $rules['attributes']
            );
        } catch (ValidationException $e) {
            //  Dump the validation errors (for debugging)
            dd('Validation failed:', $e->errors(), $e->getMessage());

            // or log it instead of dumping:
            // \Log::error('Validation failed', ['errors' => $e->errors()]);

            // or redirect back manually:
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $e) {
            //  Catch any other unexpected errors
            dd('Unexpected error:', $e->getMessage(), $e->getTraceAsString());
        }

        // Verify user
        $user = $this->getUser();
        $validated['user_id'] = $user->_id;

        // Get or Generate Form Token
        $formToken = $request->input('form_token');
        if (!$formToken) {
            $formToken = (string) Str::uuid();
        }

        // Store validated data temporarily in session
        session(["form_{$formType}_$formToken" => $validated]);

        return redirect()->route('forms.validation', ['formType' => $formType, 'token' => $formToken])
            ->with([
                'status' => 'Form ' . $formType . ' saved for review.',
            ]);
    }

    /**
     * Show Validation page using latest data from DB.
     */
    public function showValidation(Request $request, $formType)
    {
        $form = session('form_' . $formType . '_' . $request->input('token'));

        // $token = $request->query('token') ?: $request->input('token');
        // if (!$token) {
        //     return redirect()->route('forms.1-01')->withErrors('Missing form token.');
        // }

        // $form = Form1_01::where('form_token', $token)->first();
        // if (!$form) {
        //     return redirect()->route('forms.1-01')->withErrors('Form not found for the provided token.');
        // }

        // // Check if user is viewing his/her own form
        // $sessionEmail = session('email_verified');
        // $user = User::where('email', $sessionEmail)->first();
        // if (!$user || (string) $form->user_id !== (string) $user->_id) {
        //     return redirect()->route('forms.1-01')->withErrors('Unauthorized access to this form.');
        // }

        return view('clientside.forms.Validation', [
            'form' => $form,
            'formType' => $formType,
        ]);
    }

    public function getUser()
    {
        // User email
        $userEmail = session('email_verified');
        $user = User::where('email', $userEmail)->first();
        // Check if user exists
        if (!$user) {
            // Throw a manual exception if not found
            throw new \Exception('User not found in the database. Please authenticate your email again');
        }
        return $user;
    }
}
