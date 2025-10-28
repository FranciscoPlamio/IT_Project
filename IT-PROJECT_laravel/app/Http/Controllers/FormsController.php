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
use Illuminate\Support\Facades\Http;

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
            ['number' => '1-26', 'title' => 'Complaint on Text Message'],
        ];

        return view('formsList', compact('forms'));
    }

    public function index2()
    {
        $forms = [
            [ //0
                'formType' => '1-01',
                'title' => 'Form No. NTC 1-01 - Application for Radio Operator Examination',
                'image' => 'images/Form1-01_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-01.pdf',
            ],
            [ //1
                'formType' => '1-02',
                'title' => 'Form No. NTC 1-02 - Application for Radio Operator Certificate',
                'image' => 'images/Form1-02_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-02.pdf',
            ],
            [ //2
                'formType' => '1-03',
                'title' => 'Form No. NTC 1-03 - Application for Amateur Radio Operator Certificate/AmateurRadio Station License',
                'image' => 'images/Form1-03_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-03.pdf',
            ],
            [ //3
                'formType' => '1-09',
                'title' => 'Form No. NTC 1-09 - Aplication for Permit to Purchase/Possess/Sell/Transfer',
                'image' => 'images/Form1-09_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-09.pdf',
            ],
            [ //4
                'formType' => '1-11',
                'title' => 'Form No. NTC 1-11 - Application for Construction Permit/Radio Station License',
                'image' => 'images/Form1-11_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-11.pdf',
            ],
            [ //5
                'formType' => '1-13',
                'title' => 'Form No. NTC 1-13 - Form D (For Modification)',
                'image' => 'images/Form1-13_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-13.pdf',
            ],
            [ //6
                'formType' => '1-14',
                'title' => 'Form No. NTC 1-14 - Application for Temporary Permit to Propagate/Demonstrate',
                'image' => 'images/Form1-14_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-14.pdf',
            ],
            [ //7
                'formType' => '1-16',
                'title' => 'Form No. NTC 1-16 - Application for Permit to Transport Radio Transmitter/Transceiver',
                'image' => 'images/Form1-16_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-16.pdf',
            ],
            [ //8
                'formType' => '1-18',
                'title' => 'Form No. NTC 1-18 - Application for Dealer/Manufacturer/Service/Center/Retailer/Reseller/Permit/CPE
                                Supplier Accreditation',
                'image' => 'images/Form1-18_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-18.pdf',
            ],
            [ //9
                'formType' => '1-19',
                'title' => 'Form No. NTC 1-19 - Application for Certificate of Registration (WDN/SRD/RFID/SRRS/Public Trunk Radio)',
                'image' => 'images/Form1-19_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-19.pdf',
            ],
            [ //10
                'formType' => '1-20',
                'title' => 'Form No. NTC 1-20 - Application for Certificate of Registration - Value Added Services',
                'image' => 'images/Form1-20_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-20.pdf',
            ],
            [ //11
                'formType' => '1-21',
                'title' => 'Form No. NTC 1-21 - Application for Duplicate of Permit/License/Certificate',
                'image' => 'images/Form1-21_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-21.pdf',
            ],
            [ //12
                'formType' => '1-22',
                'title' => 'Form No. NTC 1-22 - Application for TVRO Registration Certificate/TVRO/Station License/CATV Station
                                License',
                'image' => 'images/Form1-22_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-22.pdf',
            ],
            [ //13
                'formType' => '1-24',
                'title' => 'Form No. NTC 1-24 - Affidavit of Ownership and Loss with Undertaking',
                'image' => 'images/Form1-24_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-24.pdf',
            ],
            [ //14
                'formType' => '1-25',
                'title' => 'Form No. NTC 1-25 - Complaint Form',
                'image' => 'images/Form1-25_image.png',
                'pdf' => 'forms/Form-No.-NTC-1-25.pdf',
            ],
            [ //15
                'formType' => '1-26',
                'title' => 'Form No. NTC 1-25 - Complaint on Text Message',
                'image' => 'images/Form1-25-text-message.png',
                'pdf' => 'forms/Form-No.-NTC-1-25-text-message.pdf',
            ],
        ];

        return view('displayForms', compact('forms'));
    }


    public function show($formType)
    {
        if (self::userHasFormTransaction()) {
            return redirect()->route('transactions.index')->with('message', 'You already have existing Form. Please finish the process first before signing up a new form.');
        }
        // Get all session keys
        $sessionKeys = array_keys(session()->all());

        // Check if any key starts with 'form_'
        $hasFormSession = collect($sessionKeys)->contains(function ($key) {
            return str_starts_with($key, 'form_');
        });
        if ($hasFormSession) {
            $formType = "";
            $formToken = "";

            foreach ($sessionKeys as $key) {
                if (str_starts_with($key, 'form')) {

                    $formType = substr($key, 5, 4);
                    $formToken = substr($key, 10);
                }
            }
            $form = session('form_' . $formType . '_' . $formToken);
            return redirect()->route('forms.validation', ['formType' => $formType, 'token' => $formToken])->with('message', 'Please finish your current form before signing up a new form');
        } else {
            return view("clientside.forms.Form{$formType}", compact('formType'));
        }
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
        $formToken = $request->input('token');
        $paymentMethod = $request->input('payment_method');

        // Form
        $validated = session('form_' . $formType . '_' . $request->input('token'));
        if (!$validated) {
            return back()->withErrors(['message' => 'No form data found in session.']);
        }

        // User email
        $user = $this->getUser();

        // $status = $request->input('status', 'draft');
        // $transactionData = ['status' => $status];

        // Save using FormManager
        $result = FormManager::saveForm('form' . $formType, $formToken, $validated, $user->_id, $paymentMethod);

        // if ($status === 'submitted') {
        //     session()->forget("form101_" . $formToken);
        // }

        //Forget Form Key session
        $sessionKeys = array_keys(session()->all());
        $formKey = collect($sessionKeys)->first(function ($key) {
            return str_starts_with($key, 'form_');
        });
        session()->forget($formKey);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Form ' . $formType . ' saved',
                'form_token' => $formToken,
                'form' => $result['form'],
                'meta' => $result['meta'],
            ]);
        }

        return redirect()->route('transactions.index')->with('message', 'Form created successfully');
    }

    public function preview(Request $request, $formType)
    {
        // Verify Google reCAPTCHA first
        if (!$this->verifyRecaptcha($request)) {
            // dd($request); // for debugging
            return back()->with('captcha_error', 'Please verify that you are not a robot.')
                ->withInput();
        }

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
            // //  Dump the validation errors (for debugging)
            // dd('Validation failed:', $e->errors(), $e->getMessage());

            // // or log it instead of dumping:
            // Log::error('Validation failed', ['errors' => $e->errors()]);

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
        return redirect()->route('forms.validation', ['formType' => $formType, 'token' => $formToken]);
    }

    /**
     * Show Validation page using latest data from DB.
     */
    public function showValidation(Request $request, $formType)
    {
        $form = session('form_' . $formType . '_' . $request->input('token'));

        // If no form is found, redirect safely
        if (!$form) {
            return redirect()->route('homepage')->with('message', 'No form found in session.');
        }

        // Return view with no-cache headers
        return response()
            ->view('clientside.forms.Validation', [
                'form' => $form,
                'formType' => $formType,
            ])
            ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }

    /**
     * Show Form Preview page with filled data
     */
    public function showPreview(Request $request, $formType)
    {
        $token = $request->query('token') ?: $request->input('token');
        if (!$token) {
            return redirect()->route('forms.show', ['formType' => $formType])->withErrors('Missing form token.');
        }

        $form = session('form_' . $formType . '_' . $token);
        if (!$form) {
            return redirect()->route('forms.show', ['formType' => $formType])->withErrors('Form not found.');
        }

        // Check if user is viewing his/her own form
        $sessionEmail = session('email_verified');
        $user = User::where('email', $sessionEmail)->first();
        if (!$user || (string) $form['user_id'] !== (string) $user->_id) {
            return redirect()->route('forms.show', ['formType' => $formType])->withErrors('Unauthorized access to this form.');
        }

        return view('clientside.forms.FormPreview', [
            'form' => $form,
            'formType' => $formType,
            'formToken' => $token,
        ]);
    }

    /**
     * Generate PDF for the form preview (Paki validate if oks)
     */
    public function generatePDF(Request $request, $formType)
    {
        $token = $request->query('token');
        if (!$token) {
            return response()->json(['error' => 'Missing form token'], 400);
        }

        $form = session('form_' . $formType . '_' . $token);
        if (!$form) {
            return response()->json(['error' => 'Form not found'], 404);
        }

        // Check if user is authorized
        $sessionEmail = session('email_verified');
        $user = User::where('email', $sessionEmail)->first();
        if (!$user || (string) $form['user_id'] !== (string) $user->_id) {
            return response()->json(['error' => 'Unauthorized access'], 403);
        }

        try {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('clientside.forms.FormPDF', [
                'form' => $form,
                'formType' => $formType,
                'formToken' => $token,
            ]);

            $pdf->setPaper('A4', 'portrait');
            $pdf->setOptions([
                'defaultFont' => 'Arial',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => false,
                'debugKeepTemp' => false,
                'debugCss' => false,
                'debugLayout' => false,
                'debugLayoutLines' => false,
                'debugLayoutBlocks' => false,
                'debugLayoutInline' => false,
                'debugLayoutPaddingBox' => false,
            ]);

            return $pdf->download("NTC_Form_{$formType}_" . date('Y-m-d') . ".pdf");
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate PDF: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Generate PDF using template-based approach with FPDF/FPDI
     */
    public function generateTemplatePDF(Request $request, $formType)
    {
        $token = $request->query('token');
        if (!$token) {
            return response()->json(['error' => 'Missing form token'], 400);
        }

        $form = session('form_' . $formType . '_' . $token);
        if (!$form) {
            return response()->json(['error' => 'Form not found'], 404);
        }

        // Check if user is authorized
        $sessionEmail = session('email_verified');
        $user = User::where('email', $sessionEmail)->first();
        if (!$user || (string) $form['user_id'] !== (string) $user->_id) {
            return response()->json(['error' => 'Unauthorized access'], 403);
        }

        try {
            $pdfGenerator = new \App\Services\PDFGenerator();

            // Check if template exists
            if (!$pdfGenerator->templateExists($formType)) {
                return response()->json(['error' => "Template not found for form type: {$formType}"], 404);
            }

            // Check if form data exists for this token
            if (!$pdfGenerator->formDataExists($formType, $token)) {
                return response()->json(['error' => "Form data not found for token: {$token}"], 404);
            }

            // Generate PDF using form token to retrieve data
            $pdf = $pdfGenerator->generatePDFFromToken($formType, $token);

            // Generate filename
            $filename = "NTC_Form_{$formType}_" . date('Y-m-d_H-i-s') . ".pdf";

            // Stream inline when preview=1, otherwise force download
            $destination = $request->boolean('preview') ? 'I' : 'D';
            $pdf->Output($destination, $filename);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate PDF: ' . $e->getMessage()], 500);
        }
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

    public function verifyRecaptcha(Request $request)
    {
        $token = $request->input('g-recaptcha-response');

        if (!$token) {
            return false; // No token means CAPTCHA was not completed
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $token,
            'remoteip' => $request->ip(),
        ]);
        // dd($response); // for debugging (security checking eg. Local IP address on handlerstats)

        $result = $response->json();
        // dd($result); // for debugging (whether the CAPTCHA was successful or not)
        return isset($result['success']) && $result['success'] === true;
    }

    public function userHasFormTransaction()
    {
        $user = self::getUser();
        return $user->hasFormTransaction();
    }
}
