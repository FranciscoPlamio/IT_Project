<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forms\Form1_01\Form101ApplicationDetails;

class ValidationController extends Controller
{
    /**
     * Generic validation page that loads the latest data from DB
     * based on form code and token.
     */
    public function show(Request $request)
    {
        $code = $request->query('code');
        $token = $request->query('token');

        if (!$code || !$token) {
            return redirect()->route('forms.list')->withErrors('Missing form code or token.');
        }

        $serverData = [];

        if ($code === '1-01') {
            $app = Form101ApplicationDetails::with(['applicantDetails','requestAssistance','declaration'])
                ->where('form_token', $token)
                ->first();
            if ($app) {
                $serverData = [
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
            }
        }

        return view('clientside.forms.Validation', [
            'serverData' => $serverData,
            'activeForm' => $code,
        ]);
    }
}


