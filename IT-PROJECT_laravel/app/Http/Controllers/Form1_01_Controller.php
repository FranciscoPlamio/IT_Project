<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Forms\Form1_01\Form101ApplicationDetails;
use App\Models\Forms\Form1_01\ApplicantDetails;
use App\Models\Forms\Form1_01\RequestAssistance;
use App\Models\Forms\Form1_01\Declaration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Form1_01_Controller extends Controller
{
    /**
     * Store Application Details section (Form 1-01) into the database.
     */
    public function storeApplication(Request $request)
    {
        $validated = $request->validate([
            'date_of_exam' => ['nullable','date'],
            'rtg' => ['nullable','array'],
            'amateur' => ['nullable','array'],
            'rphn' => ['nullable','array'],
            'rroc' => ['nullable','array'],
        ]);

        $formToken = $request->input('form_token');
        if (!$formToken) {
            $formToken = (string) Str::uuid();
        }

        $record = Form101ApplicationDetails::updateOrCreate(
            ['form_token' => $formToken],
            [
                'rtg' => $validated['rtg'] ?? null,
                'amateur' => $validated['amateur'] ?? null,
                'rphn' => $validated['rphn'] ?? null,
                'rroc' => $validated['rroc'] ?? null,
                'date_of_exam' => $validated['date_of_exam'] ?? null,
            ]
        );

        // If the request expects JSON (AJAX), return the token and saved data.
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Application Details saved',
                'form_token' => $record->form_token,
                'data' => $record->toArray(),
            ]);
        }

        // Otherwise redirect back with token in session for linking next steps
        return redirect()->back()->with([
            'status' => 'Application Details saved',
            'form_token' => $record->form_token,
        ]);
    }

    /**
     * Store the entire Form 1-01 (all sections) in one request.
     */
    public function storeAll(Request $request)
    {
        try {
        $validated = $request->validate([
            // Application Details
            'date_of_exam' => ['nullable','date'],
            'rtg' => ['nullable','array'],
            'amateur' => ['nullable','array'],
            'rphn' => ['nullable','array'],
            'rroc' => ['nullable','array'],

            // Applicant Details
            'last_name' => ['nullable','string'],
            'first_name' => ['nullable','string'],
            'middle_name' => ['nullable','string'],
            'dob' => ['nullable','date'],
            'sex' => ['nullable','string'],
            'nationality' => ['nullable','string'],
            'unit' => ['nullable','string'],
            'street' => ['nullable','string'],
            'barangay' => ['nullable','string'],
            'city' => ['nullable','string'],
            'province' => ['nullable','string'],
            'zip_code' => ['nullable','string'],
            'contact_number' => ['nullable','string'],
            'email' => ['nullable','email'],
            'school_attended' => ['nullable','string'],
            'course_taken' => ['nullable','string'],
            'year_graduated' => ['nullable','string'],

            // Assistance
            'needs' => ['nullable','boolean'],
            'needs_details' => ['nullable','string'],

            // Declaration
            'signature_name' => ['nullable','string'],
            'date_accomplished' => ['nullable','date'],
            'or_no' => ['nullable','string'],
            'or_date' => ['nullable','date'],
            'or_amount' => ['nullable','numeric'],
            'admit_name' => ['nullable','string'],
            'mailing_address' => ['nullable','string'],
            'exam_for' => ['nullable','string'],
            'place_of_exam' => ['nullable','string'],
            'admission_date' => ['nullable','date'],
            'time_of_exam' => ['nullable','string'],
        ]);

        $formToken = $request->input('form_token');
        if (!$formToken) {
            $formToken = (string) Str::uuid();
        }

        DB::transaction(function () use ($validated, $formToken) {
            Form101ApplicationDetails::updateOrCreate(
                ['form_token' => $formToken],
                [
                    'rtg' => $validated['rtg'] ?? null,
                    'amateur' => $validated['amateur'] ?? null,
                    'rphn' => $validated['rphn'] ?? null,
                    'rroc' => $validated['rroc'] ?? null,
                    'date_of_exam' => $validated['date_of_exam'] ?? null,
                ]
            );

            ApplicantDetails::updateOrCreate(
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
                ]
            );

            RequestAssistance::updateOrCreate(
                ['form_token' => $formToken],
                [
                    'needs' => $validated['needs'] ?? null,
                    'needs_details' => $validated['needs_details'] ?? null,
                ]
            );

            Declaration::updateOrCreate(
                ['form_token' => $formToken],
                [
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
                ]
            );
        });

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Form 1-01 saved',
                'form_token' => $formToken,
                'payload' => $validated,
            ]);
        }

        return redirect()->back()->with([
            'status' => 'Form 1-01 saved',
            'form_token' => $formToken,
        ]);
        } catch (\Throwable $e) {
            Log::error('Form 1-01 save failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Failed to save Form 1-01',
                    'error' => $e->getMessage(),
                ], 500);
            }
            return redirect()->back()->withErrors('Failed to save Form 1-01: ' . $e->getMessage());
        }
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

        $app = Form101ApplicationDetails::with(['applicantDetails','requestAssistance','declaration'])
            ->where('form_token', $token)
            ->first();

        if (!$app) {
            return redirect()->route('forms.1-01')->withErrors('Form not found for the provided token.');
        }

        $payload = [
            'form_token' => $token,
            'rtg' => $app->rtg,
            'amateur' => $app->amateur,
            'rphn' => $app->rphn,
            'rroc' => $app->rroc,
            'date_of_exam' => optional($app->date_of_exam)->toDateString(),
            'last_name' => optional($app->applicantDetails)->last_name,
            'first_name' => optional($app->applicantDetails)->first_name,
            'middle_name' => optional($app->applicantDetails)->middle_name,
            'dob' => optional(optional($app->applicantDetails)->dob)->toDateString(),
            'sex' => optional($app->applicantDetails)->sex,
            'nationality' => optional($app->applicantDetails)->nationality,
            'unit' => optional($app->applicantDetails)->unit,
            'street' => optional($app->applicantDetails)->street,
            'barangay' => optional($app->applicantDetails)->barangay,
            'city' => optional($app->applicantDetails)->city,
            'province' => optional($app->applicantDetails)->province,
            'zip_code' => optional($app->applicantDetails)->zip_code,
            'contact_number' => optional($app->applicantDetails)->contact_number,
            'email' => optional($app->applicantDetails)->email,
            'school_attended' => optional($app->applicantDetails)->school_attended,
            'course_taken' => optional($app->applicantDetails)->course_taken,
            'year_graduated' => optional($app->applicantDetails)->year_graduated,
            'needs' => optional($app->requestAssistance)->needs,
            'needs_details' => optional($app->requestAssistance)->needs_details,
            'signature_name' => optional($app->declaration)->signature_name,
            'date_accomplished' => optional(optional($app->declaration)->date_accomplished)->toDateString(),
            'or_no' => optional($app->declaration)->or_no,
            'or_date' => optional(optional($app->declaration)->or_date)->toDateString(),
            'or_amount' => optional($app->declaration)->or_amount,
            'admit_name' => optional($app->declaration)->admit_name,
            'mailing_address' => optional($app->declaration)->mailing_address,
            'exam_for' => optional($app->declaration)->exam_for,
            'place_of_exam' => optional($app->declaration)->place_of_exam,
            'admission_date' => optional(optional($app->declaration)->admission_date)->toDateString(),
            'time_of_exam' => optional($app->declaration)->time_of_exam,
        ];

        return view('clientside.forms.Validation', [
            'form101' => $payload,
            'activeForm' => '1-01',
        ]);
    }
}
