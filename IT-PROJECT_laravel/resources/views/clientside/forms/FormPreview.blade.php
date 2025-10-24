<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Preview - {{ $formType }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .form-preview-container {
            max-width: var(--form-max-width, 90%);
            margin: 40px auto;
            background: #fff;
            border-radius: var(--form-radius, 12px);
            box-shadow: var(--form-shadow, 0 0 8px rgba(0, 0, 0, 0.07));
            padding: var(--form-padding, 32px 24px 24px 24px);
            font-size: var(--form-font-size, 1.13rem);
            font-family: "Poppins", sans-serif;
        }

        .form-preview-header {
            text-align: center;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .form-preview-header h1 {
            font-size: 1.7rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-preview-header p {
            font-size: 1rem;
            opacity: 0.9;
            margin: 0;
        }

        .form-preview-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 18px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.2s ease;
            font-family: "Poppins", sans-serif;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-success {
            background: #6ee7b7;
            color: white;
        }

        .btn-success:hover {
            background: #34d399;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(110, 231, 183, 0.3);
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #111827;
        }

        .btn-secondary:hover {
            background: #d1d5db;
            transform: translateY(-1px);
        }

        .form-preview-content {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .form-preview-title {
            text-align: center;
            font-size: 1.7rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #1e3a8a;
        }

        .form-section {
            margin-bottom: 25px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 20px;
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .section-title {
            font-size: 1.22rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #3b82f6;
        }

        .form-field {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .field-label {
            font-weight: 600;
            min-width: 200px;
            color: #374151;
            font-size: 1.08rem;
        }

        .field-value {
            flex: 1;
            padding: 12px 16px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            min-height: 20px;
            font-size: 1rem;
            color: #111827;
        }

        .field-value.empty {
            color: #9ca3af;
            font-style: italic;
        }

        .checkbox-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 8px 12px;
            background: #ecfdf5;
            border: 1px solid #6ee7b7;
            border-radius: 6px;
            font-size: 0.95rem;
        }

        .checkbox-item::before {
            content: "✓";
            color: #059669;
            font-weight: bold;
        }

        .file-field {
            color: #3b82f6;
            font-weight: 600;
        }

        .signature-section {
            margin-top: 30px;
            padding: 24px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
        }

        .signature-row {
            display: flex;
            gap: 24px;
            align-items: flex-end;
            margin-bottom: 20px;
        }

        .signature-field {
            flex: 1;
        }

        .signature-line {
            border-bottom: 1px solid #374151;
            height: 30px;
            margin-top: 8px;
            padding: 0 8px;
            font-size: 1rem;
        }

        .officer-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 20px;
        }

        .officer-signature {
            text-align: center;
            min-width: 200px;
        }

        .officer-line {
            border-top: 1px solid #374151;
            padding-top: 8px;
            margin-top: 60px;
            font-size: 0.95rem;
            color: #6b7280;
        }

        .id-picture-placeholder {
            width: 100px;
            height: 100px;
            border: 2px dashed #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f9fafb;
            color: #9ca3af;
            font-size: 0.85rem;
            text-align: center;
            border-radius: 6px;
        }

        @media (max-width: 768px) {
            .form-preview-container {
                margin: 20px auto;
                padding: 20px 16px;
            }

            .form-preview-actions {
                flex-direction: column;
                gap: 12px;
            }

            .btn {
                width: 100%;
                max-width: 300px;
            }

            .form-field {
                flex-direction: column;
                gap: 8px;
            }

            .field-label {
                min-width: auto;
                font-size: 1rem;
            }

            .signature-row {
                flex-direction: column;
                gap: 15px;
            }

            .officer-section {
                flex-direction: column;
                gap: 20px;
                align-items: center;
            }
        }

        @media print {
            .form-preview-actions {
                display: none;
            }
            
            .form-preview-container {
                padding: 0;
                margin: 0;
                box-shadow: none;
                border-radius: 0;
            }
            
            .form-preview-content {
                border: none;
                box-shadow: none;
                padding: 0;
            }

            .form-preview-header {
                background: #1e3a8a !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="top-bar">
            <a href="{{ route('homepage') }}" aria-label="Go to homepage">
                <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
            </a>
            <div class="title">
                <p>Republic of the Philippines</p>
                <h1>National Telecommunication Commission<br><span>BIR Road, East Triangle, Diliman, Quezon City</span></h1>
            </div>
        </div>
    </header>

    <main>
        <div class="form-preview-container">
            <div class="form-preview-header">
                <h1>Form Preview - NTC {{ $formType }}</h1>
                <p>Review your completed form before proceeding to payment</p>
            </div>

            <div class="form-preview-actions">
                <button class="btn btn-primary" onclick="window.print()">Print Form</button>
                <a href="{{ route('forms.pdf', ['formType' => $formType, 'token' => $formToken]) }}" class="btn btn-success" target="_blank">Save as PDF</a>
                <a href="{{ route('forms.validation', ['formType' => $formType, 'token' => $formToken]) }}" class="btn btn-secondary">Back to Edit</a>
                <form id="proceedPaymentForm" action="{{ route('forms.submit', ['formType' => $formType]) }}" method="POST" style="display: inline;">
                    @csrf
                    <input type="hidden" name="form_token" value="{{ $formToken }}">
                    <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                </form>
            </div>

            <div class="form-preview-content" id="formContent">
                <div class="form-preview-title">
                    APPLICATION FOR RADIO OPERATOR EXAMINATION<br>
                    <small>Form No. NTC {{ $formType }} - Revision No. 03 - Revision Date: 03/31/2023</small>
                </div>

                @if($formType === '1-01')
                    @include('clientside.forms.preview.Form1-01-preview', ['form' => $form])
                @elseif($formType === '1-02')
                    @include('clientside.forms.preview.Form1-02-preview', ['form' => $form])
                @elseif($formType === '1-03')
                    @include('clientside.forms.preview.Form1-03-preview', ['form' => $form])
                @else
                    <!-- Generic form preview for other forms -->
                    <div class="form-section">
                        <div class="section-title">Form Data</div>
                        @foreach($form as $key => $value)
                            @if(!in_array($key, ['_id', 'user_id', 'form_token', 'created_at', 'updated_at']))
                                <div class="form-field">
                                    <div class="field-label">{{ ucfirst(str_replace('_', ' ', $key)) }}:</div>
                                    <div class="field-value {{ empty($value) ? 'empty' : '' }}">
                                        {{ $value ?? 'Not provided' }}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif

                <div class="signature-section">
                    <div class="section-title">Declaration & Signature</div>
                    <div class="signature-row">
                        <div class="signature-field">
                            <div>Signature over Printed Name of Applicant:</div>
                            <div class="signature-line">{{ $form['signature_name'] ?? '' }}</div>
                        </div>
                        <div class="signature-field">
                            <div>Date Accomplished:</div>
                            <div class="signature-line">{{ $form['date_accomplished'] ?? '' }}</div>
                        </div>
                    </div>
                    
                    <div class="officer-section">
                        <div></div>
                        <div class="officer-signature">
                            <div class="officer-line">Authorized Officer</div>
                        </div>
                        <div class="id-picture-placeholder">
                            1"x1"<br>ID Picture
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Handle print
        window.addEventListener('beforeprint', function() {
            document.title = 'NTC Form {{ $formType }} - {{ date("Y-m-d") }}';
        });
    </script>
</body>

</html>
