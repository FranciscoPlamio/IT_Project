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
use App\Models\Forms\FormsTransactions;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;

class FormsController extends Controller
{
    // In FormController or a dedicated page controller


    public function index()
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


    public function show(Request $request, $formType)
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
            $oldFormType = "";
            $formToken = "";

            foreach ($sessionKeys as $key) {
                if (str_starts_with($key, 'form')) {

                    $oldFormType = substr($key, 5, 4);
                    $formToken = substr($key, 10);
                }
            }
            $form = session('form_' . $oldFormType . '_' . $formToken);
            return redirect()->route('forms.validation', ['formType' => $oldFormType, 'token' => $formToken, 'targetFormType' => $formType])->with('message', 'Please finish your current form before signing up a new form');
        } else {

            $category = $request->query('category', null);
            return view("clientside.forms.Form{$formType}", compact('formType', 'category'));
        }
    }

    public function showFormInformation($formType)
    {
        return view("clientside.forms.information.FormInformation{$formType}");
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
        $user = $this->getUser();

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
     * Store the entire Form in one request.
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


        $message = $this->validateAndStoreUploadedFile($request, $formToken);

        if ($message) {
            // Validation failed
            return redirect()->back()->with('message', $message);
        }
        // Save using FormManager
        $result = FormManager::saveForm('form' . $formType, $formToken, $validated, $user->_id, $paymentMethod);

        $this->forgetFormKeySession($request);

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

    private function forgetFormKeySession($request)
    {
        //Forget Form Key session
        $sessionKeys = array_keys($request->session()->all());
        $formKey = collect($sessionKeys)->first(function ($key) {
            return str_starts_with($key, 'form_');
        });
        session()->forget($formKey);
    }

    public function cancel(Request $request)
    {
        $this->forgetFormKeySession($request);
        return redirect()->route('homepage')->with('message', 'Draft Form cancelled successfully.');
    }

    private function validateAndStoreUploadedFile($request, $formToken)
    {

        $rules = [];

        foreach ($request->file() as $key => $file) {
            $rules[$key] = 'file|mimes:pdf,jpg,png|max:10240';
        }
        try {
            // Validate dynamically
            $validated = $request->validate($rules);

            // Store files if validation passes
            foreach ($request->file() as $key => $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = $key . '_' . time() . '.' . $extension;
                $path = $file->storeAs('forms/' . $formToken, $fileName, 'local');
            }

            return null;
        } catch (ValidationException $e) {
            dd($e->errors());
            dd(ini_get('post_max_size'), ini_get('upload_max_filesize'));
            $message = "Validation failed: files must be no larger than 10 MB and must be in .png, .jpg, or .pdf";
            return $message;
        }
    }



    private function cleanInput(array $data)
    {
        $clean_recursive = function ($value, $key = null) use (&$clean_recursive) {
            if (is_array($value)) {
                $cleaned = [];
                foreach ($value as $k => $v) {
                    $cleaned[$k] = $clean_recursive($v, $k);
                }
                return $cleaned;
            }

            if (is_string($value)) {
                // Trim and collapse spaces
                $value = preg_replace('/\s+/', ' ', trim($value));

                // Capitalize name fields
                $nameFields = ['first_name', 'middle_name', 'last_name'];
                if ($key && in_array($key, $nameFields)) {
                    $value = ucwords(strtolower($value));
                }
            }

            return $value;
        };

        $cleanedData = [];
        foreach ($data as $key => $value) {
            $cleanedData[$key] = $clean_recursive($value, $key);
        }

        return $cleanedData;
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

        // Clean input before validation

        try {


            $cleaned = $this->cleanInput($request->all());

            $request->replace($cleaned);

            $validated = $request->validate(
                $rules['rules'],
                $rules['messages'],
                $rules['attributes']
            );

            // Custom check: require at least one unit across all station classes
            if ($formType === "1-09") {
                if (
                    empty($request->rt_units) &&
                    empty($request->fx_units) &&
                    empty($request->fb_units) &&
                    empty($request->ml_units) &&
                    empty($request->p_units)
                ) {
                    // Throw a ValidationException manually
                    throw ValidationException::withMessages([
                        'units' => 'You must select at least 1 unit in any station class.'
                    ]);
                }
            }
        } catch (ValidationException $e) {
            //  Dump the validation errors (for debugging)
            dd('Validation failed:', $e->errors(), $e->getMessage());

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
    public function testSaveForm(Request $request)
    {
        // Validate minimal required inputs
        $request->validate([
            'formType' => 'required|string',
            'formToken' => 'required|string',
            'userId' => 'required|string',
            'paymentMethod' => 'required|string',
            'formData' => 'required|array'
        ]);

        // Call FormManager directly using the request's formType and formToken
        $result = FormManager::saveForm(
            $request->input('formType'),
            $request->input('formToken'),
            $request->input('formData'),
            $request->input('userId'),
            $request->input('paymentMethod')
        );

        // Return JSON response for Postman
        return response()->json([
            'message' => 'Form processed successfully',
            'form_token' => $request->input('formToken'),
            'form' => $result['form'],
            'meta' => $result['meta'],
        ], 200);
    }

    /**
     * Show Validation page using latest data from DB.
     */
    public function showValidation(Request $request, $formType)
    {

        $form = session('form_' . $formType . '_' . $request->input('token'));
        // If no form is found, redirect safely
        if (!$form) {
            return redirect()->route('homepage');
        }

        //testing
        // $form["application_type"] = "new";
        // $form["application_type"] = "new";
        // $form["permit_type"] = "temporary-foreign";

        // Return view with no-cache headers
        return response()
            ->view('clientside.forms.Validation', [
                'form' => $form,
                'formType' => $formType,
                'targetFormType' => $request->input('targetFormType')
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
        $user = $this->getUser();
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
        $user = $this->getUser();
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

        $user = $this->getUser();

        // Try to get form data from session first (for in-progress forms)
        $form = session('form_' . $formType . '_' . $token);
        // dd(session()->all());
        // If not in session, retrieve from database
        if (!$form) {
            try {
                $formModel = FormManager::getFormModel('form' . $formType);
                $dbForm = $formModel::where('form_token', $token)->first();

                if (!$dbForm) {
                    return response()->json(['error' => 'Form not found'], 404);
                }

                // Check authorization
                if (!$user || (string) $dbForm->user_id !== (string) $user->_id) {
                    return response()->json(['error' => 'Unauthorized access'], 403);
                }

                // Convert model to array for PDF generation
                $form = $dbForm->toArray();
                // dd($form);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Form not found: ' . $e->getMessage()], 404);
            }
        } else {
            // If in session, check authorization
            if (!$user || (string) $form['user_id'] !== (string) $user->_id) {
                return response()->json(['error' => 'Unauthorized access'], 403);
            }
        }

        try {
            // Ensure form data has required structure for each form type
            $form = $this->normalizeFormData($form, $formType);
            // dd($form);

            $pdfGenerator = new \App\Services\PDFGenerator();

            // Check if template exists
            if (!$pdfGenerator->templateExists($formType)) {
                return response()->json(['error' => "Template not found for form type: {$formType}"], 404);
            }

            // Generate PDF with form data
            $pdf = $pdfGenerator->generatePDF($form, $formType);

            // Generate filename
            $filename = "NTC_Form_{$formType}_" . date('Y-m-d_H-i-s') . ".pdf";

            // Always stream inline (user changed from conditional)
            $pdf->Output('I', $filename);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate PDF: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Normalize form data to ensure all required fields exist for each form type
     * 
     * if theres no values in the form, it will be set to empty string, just add a default value.
     */
    private function normalizeFormData($form, $formType)
    {
        // Common fields that should always exist
        $defaults = [
            'first_name' => '',
            'last_name' => '',
            'middle_name' => '',
            'email' => '',
            'contact_number' => '',
        ];

        // Form-specific defaults
        if ($formType === '1-01') {
            // Form 1-01 specific fields
            $defaults = array_merge($defaults, [
                'exam_type' => '',
                'admission_slip' => [
                    'admit_name' => '',
                    'place_of_exam' => '',
                    'date_of_exam' => '',
                    'time_of_exam' => '',
                    'authorized_officer' => '',
                    'mailing_address' => '',
                ],
            ]);
        } elseif ($formType === '1-02') {
            // Form 1-02 specific fields
            $defaults = array_merge($defaults, [
                'certificate_type' => '',
                'years' => 0,
                'mailing_address' => '',
            ]);
        }

        // Merge defaults with actual form data (actual data takes precedence)
        return array_merge($defaults, $form);
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
        $user = $this->getUser();
        return $user->hasFormTransaction();
    }

    /**
     * Get certificate data for validation modal
     */
    public function getCertificateData($token)
    {
        try {
            $transactionForm = FormsTransactions::where('form_token', $token)->first();
            $formType = substr($transactionForm->form_type, 4);
            $formModel = FormManager::getFormModel('form' . $formType);
            $dbForm = $formModel::where('form_token', $token)->first();

            if (!$dbForm) {
                return response()->json(['error' => 'Form not found'], 404);
            }

            // Get certificate type display name
            $certificateTypeDisplay = $this->formatCertificateType($dbForm->certificate_type ?? '');

            // Calculate dates
            $issuanceDate = date('F j, Y'); // Current date
            $years = isset($dbForm->years) ? (int)$dbForm->years : 0;
            $expiryDate = date('F j, Y', strtotime("+{$years} years"));

            return response()->json([
                'first_name' => $dbForm->first_name,
                'last_name' => $dbForm->last_name,
                'middle_name' => $dbForm->middle_name ?? '',
                'certificate_type' => $certificateTypeDisplay,
                'certificate_type_raw' => $dbForm->certificate_type ?? '',
                'issuance_date' => $issuanceDate,
                'expiry_date' => $expiryDate,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch form data: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Format certificate type for display
     */
    private function formatCertificateType($type)
    {
        $types = [
            '1rtg_e1256_code25' => '1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)',
            '1rtg_code25' => '1RTG - Code (25/20 wpm)',
            '2rtg_e1256_code16' => '2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)',
            '2rtg_code16' => '2RTG - Code (16 wpm)',
            '3rtg_e125_code16' => '3RTG - Elements 1, 2, 5 & Code (16 wpm)',
            '3rtg_code16' => '3RTG - Code (16 wpm)',
            '1phn_e1234' => '1PHN - Elements 1, 2, 3 & 4',
            '2phn_e123' => '2PHN - Elements 1, 2 & 3',
            '3phn_e12' => '3PHN - Elements 1 & 2',
        ];

        return $types[$type] ?? ucwords(str_replace('_', ' ', $type));
    }

    /**
     * Generate certificate PDF for Form 1-02
     */
    public function generateCertificate(Request $request)
    {
        $formToken = $request->query('token');
        $transactionForm = FormsTransactions::where('form_token', $formToken)->first();
        $formType = substr($transactionForm->form_type, 4);

        if (!$formToken) {
            return response()->json(['error' => 'Missing form token'], 400);
        }

        try {
            // Retrieve form data from database
            $formModel = FormManager::getFormModel('form' . $formType);
            $dbForm = $formModel::where('form_token', $formToken)->first();

            if (!$dbForm) {
                return response()->json(['error' => 'Form not found'], 404);
            }

            // Convert model to array for PDF generation
            $formData = $dbForm->toArray();

            // Generate certificate PDF using the Sample_Cert.pdf template
            $pdfGenerator = new \App\Services\PDFCertificateGenerator();
            $pdf = $pdfGenerator->generateCertificate($formData, $formType);

            // Generate filename
            $filename = "Certificate_{$formData['last_name']}_{$formData['first_name']}_" . date('Y-m-d_H-i-s') . ".pdf";

            // Stream inline when preview=1, otherwise save to attachments and download
            if ($request->boolean('preview')) {
                $pdf->Output('I', $filename);
            } else {
                // Save to attachments folder
                $attachmentPath = "forms/{$formToken}/certificate_" . date('Y-m-d_H-i-s') . ".pdf";
                $pdfContent = $pdf->Output('S'); // Get PDF as string
                \Storage::disk('local')->put($attachmentPath, $pdfContent);

                // Download to user
                $pdf->Output('D', $filename);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate certificate: ' . $e->getMessage()], 500);
        }
    }
}
