<?php

namespace App\Http\Controllers;

use App\Models\Forms\Form1_01;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Forms\Form1_01\Form101ApplicationDetails;
use App\Models\Forms\Form1_01\ApplicantDetails;
use App\Models\Forms\Form1_01\RequestAssistance;
use App\Models\Forms\Form1_01\Declaration;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * I commented some parts after combining the fields of 4 tables into 1 table
 * because some are not yet being used. There are class errors because i deleted
 * the 4 Model of Form1-01 and created a single model for Form1-01 - Richmond
 * 
 * Uncomment or modify any changes if there are any necessary changes need
 * to be done -Richmond
 * 
 * 
 */
class Form1_01_Controller extends Controller
{
    /**
     * Load Form 1-01 for editing using form token or applicant ID.
     */
    public function edit(Request $request)
    {
        // Check token
        $token = $request->query('token') ?: $request->input('token');
        if (!$token) {
            return redirect()->route('forms.1-01')->withErrors('Missing form token.');
        }

        // Check form
        $form = Form1_01::where('form_token', $token)->first();
        if (!$form) {
            return redirect()->route('forms.1-01')->withErrors('Form not found.');
        }

        // Check if user is editing his/her own form.
        $sessionEmail = session('email_verified');
        $user = User::where('email', $sessionEmail)->first();
        if (!$user || (string) $form->user_id !== (string) $user->_id) {
            return redirect()->route('forms.1-01')->withErrors('Unauthorized access to this form.');
        }

        $payload = [
            'form_token' => $token,
            'rtg' => optional($form)->rtg,
            'amateur' => optional($form)->amateur,
            'rphn' => optional($form)->rphn,
            'rroc' => optional($form)->rroc,
            'date_of_exam' => optional($form->date_of_exam)->toDateString(),
            'last_name' => optional($form)->last_name,
            'first_name' => optional($form)->first_name,
            'middle_name' => optional($form)->middle_name,
            'dob' => optional($form->dob)->toDateString(),
            'sex' => optional($form)->sex,
            'nationality' => optional($form)->nationality,
            'unit' => optional($form)->unit,
            'street' => optional($form)->street,
            'barangay' => optional($form)->barangay,
            'city' => optional($form)->city,
            'province' => optional($form)->province,
            'zip_code' => optional($form)->zip_code,
            'contact_number' => optional($form)->contact_number,
            'email' => optional($form)->email,
            'school_attended' => optional($form)->school_attended,
            'course_taken' => optional($form)->course_taken,
            'year_graduated' => optional($form)->year_graduated,
            'needs' => optional($form)->needs,
            'needs_details' => optional($form)->needs_details,
            'signature_name' => optional($form)->signature_name,
            'date_accomplished' => optional($form->date_accomplished)->toDateString(),
            'or_no' => optional($form)->or_no,
            'or_date' => optional($form->or_date)->toDateString(),
            'or_amount' => optional($form)->or_amount,
            'admit_name' => optional($form)->admit_name,
            'mailing_address' => optional($form)->mailing_address,
            'exam_for' => optional($form)->exam_for,
            'place_of_exam' => optional($form)->place_of_exam,
            'admission_date' => optional($form->admission_date)->toDateString(),
            'time_of_exam' => optional($form)->time_of_exam,
        ];

        return view('clientside.forms.Form1-01', [
            'form101' => $payload,
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

        // $record = Form101ApplicationDetails::updateOrCreate(
        //     ['form_token' => $formToken],
        //     [
        //         'rtg' => $validated['rtg'] ?? null,
        //         'amateur' => $validated['amateur'] ?? null,
        //         'rphn' => $validated['rphn'] ?? null,
        //         'rroc' => $validated['rroc'] ?? null,
        //         'date_of_exam' => $validated['date_of_exam'] ?? null,
        //     ]
        // );

        // If the request expects JSON (AJAX), return the token and saved data.
        // if ($request->wantsJson()) {
        //     return response()->json([
        //         'message' => 'Application Details saved',
        //         'form_token' => $record->form_token,
        //         'data' => $record->toArray(),
        //     ]);
        // }

        // Otherwise redirect back with token in session for linking next steps
        return redirect()->back()->with([
            'status' => 'Application Details saved',
            // 'form_token' => $record->form_token,
        ]);
    }

    /**
     * Store the entire Form 1-01 (all sections) in one request.
     */
    public function storeAll(Request $request)
    {

        $validated = $request->validate(
            [
                // Application Details
                'date_of_exam' => ['nullable', 'date'],
                'rtg' => ['nullable', 'array'],
                'amateur' => ['nullable', 'array'],
                'rphn' => ['nullable', 'array'],
                'rroc' => ['nullable', 'array'],

                // Applicant Details
                'last_name' => ['required', 'string', 'min:2'],
                'first_name' => ['required', 'string', 'min:2'],
                'middle_name' => ['required', 'string', 'min:2'],
                'dob' => ['required', 'date'],
                'sex' => ['required', 'string'],
                'nationality' => ['required', 'string'],
                'unit' => ['required', 'string'],
                'street' => ['required', 'string'],
                'barangay' => ['required', 'string'],
                'city' => ['required', 'string'],
                'province' => ['required', 'string'],
                'zip_code' => ['required', 'string'],
                'contact_number' => ['required', 'integer'],
                'email' => ['nullable', 'email'],
                'school_attended' => ['required', 'string'],
                'course_taken' => ['required', 'string'],
                'year_graduated' => ['required', 'string'],

                // Assistance
                'needs' => ['required', 'boolean'],
                'needs_details' => ['required_if:needs,1', 'string', 'nullable'],

                // Declaration
                'signature_name' => ['nullable', 'string'],
                'date_accomplished' => ['nullable', 'date'],
                'or_no' => ['nullable', 'string'],
                'or_date' => ['nullable', 'date'],
                'or_amount' => ['nullable', 'numeric'],
                'admit_name' => ['nullable', 'string'],
                'mailing_address' => ['nullable', 'string'],
                'exam_for' => ['nullable', 'string'],
                'place_of_exam' => ['nullable', 'string'],
                'admission_date' => ['nullable', 'date'],
                'time_of_exam' => ['nullable', 'string'],
            ],
            [
                'needs.required' => 'Please select Yes or No',
                'needs_details.required_if' => 'Please specify your needs',
            ], // custom messages 
            [
                'dob' => 'date of birth', // custom attribute name
            ]
        );

        $formToken = $request->input('form_token');
        if (!$formToken) {
            $formToken = (string) Str::uuid();
        }

        // User email
        $userEmail = session('email_verified');
        $user = User::where('email', $userEmail)->first();

        Form1_01::updateOrCreate(
            ['form_token' => $formToken],
            [
                'last_name' => $validated['last_name'] ?? null,
                'first_name' => $validated['first_name'] ?? null,
                'middle_name' => $validated['middle_name'] ?? null,
                'dob' => $validated['dob'] ?? null,
                'sex' => $validated['sex'] ?? null,
                'nationality' => $validated['nationality'] ?? null,
                'unit' => $validated['unit'] ?? null,
                'street' => $validated['street'] ?? null,
                'barangay' => $validated['barangay'] ?? null,
                'city' => $validated['city'] ?? null,
                'province' => $validated['province'] ?? null,
                'zip_code' => $validated['zip_code'] ?? null,
                'contact_number' => $validated['contact_number'] ?? null,
                'email' => $validated['email'] ?? null,
                'school_attended' => $validated['school_attended'] ?? null,
                'course_taken' => $validated['course_taken'] ?? null,
                'year_graduated' => $validated['year_graduated'] ?? null,
                'rtg' => $validated['rtg'] ?? null,
                'amateur' => $validated['amateur'] ?? null,
                'rphn' => $validated['rphn'] ?? null,
                'rroc' => $validated['rroc'] ?? null,
                'date_of_exam' => $validated['date_of_exam'] ?? null,
                'signature_name' => $validated['signature_name'] ?? null,
                'date_accomplished' => $validated['date_accomplished'] ?? null,
                'or_no' => $validated['or_no'] ?? null,
                'or_date' => $validated['or_date'] ?? null,
                'or_amount' => $validated['or_amount'] ?? null,
                'admit_name' => $validated['admit_name'] ?? null,
                'mailing_address' => $validated['mailing_address'] ?? null,
                'exam_for' => $validated['exam_for'] ?? null,
                'place_of_exam' => $validated['place_of_exam'] ?? null,
                'admission_date' => $validated['admission_date'] ?? null,
                'time_of_exam' => $validated['time_of_exam'] ?? null,
                'needs' => $validated['needs'] ?? null,
                'needs_details' => $validated['needs_details'] ?? null,
                'user_id' => $user->_id,
            ]
        );

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Form 1-01 saved',
                'form_token' => $formToken,
                'payload' => $validated,
            ]);
        }

        return redirect()->route('forms.1-01.validation', ['token' => $formToken])->with([
            'status' => 'Form 1-01 saved',
            'form_token' => $formToken,
        ]);
    }

    /**
     * Show Validation page using latest data from DB.
     */
    public function showValidation(Request $request)
    {
        $token = $request->query('token') ?: $request->input('token');
        if (!$token) {
            return redirect()->route('forms.1-01')->withErrors('Missing form token.');
        }

        $form = Form1_01::where('form_token', $token)->first();
        if (!$form) {
            return redirect()->route('forms.1-01')->withErrors('Form not found for the provided token.');
        }

        return view('clientside.forms.Validation', [
            'form101' => $form,
            'activeForm' => '1-01',
        ]);
    }
}
