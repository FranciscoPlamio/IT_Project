<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTC Form {{ $formType }}</title>
    <style>
        @page {
            size: A4;
            margin: 0.5in;
        }
        
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.3;
            color: #000;
            margin: 0;
            padding: 0;
            background: #fff;
        }
        
        .form-container {
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 0;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        
        .form-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        
        .form-subtitle {
            font-size: 10px;
            margin: 0;
        }
        
        .form-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 10px;
        }
        
        .form-section {
            margin-bottom: 15px;
            border: 1px solid #000;
            padding: 8px;
        }
        
        .section-title {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 8px;
            text-decoration: underline;
            text-transform: uppercase;
        }
        
        .form-row {
            display: flex;
            margin-bottom: 6px;
            align-items: flex-start;
        }
        
        .form-label {
            font-weight: bold;
            min-width: 120px;
            margin-right: 8px;
        }
        
        .form-value {
            flex: 1;
            border-bottom: 1px solid #000;
            min-height: 15px;
            padding: 2px 4px;
            margin-bottom: 2px;
        }
        
        .form-value.empty {
            border-bottom: 1px dotted #666;
        }
        
        .checkbox-section {
            margin-bottom: 10px;
        }
        
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 6px;
        }
        
        .checkbox-item {
            display: flex;
            align-items: center;
            font-size: 10px;
        }
        
        .checkbox-box {
            width: 12px;
            height: 12px;
            border: 1px solid #000;
            margin-right: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .checkbox-checked {
            font-size: 8px;
            font-weight: bold;
        }
        
        .signature-section {
            margin-top: 20px;
            border: 1px solid #000;
            padding: 10px;
        }
        
        .signature-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        .signature-field {
            flex: 1;
            margin-right: 15px;
        }
        
        .signature-field:last-child {
            margin-right: 0;
        }
        
        .signature-line {
            border-bottom: 1px solid #000;
            height: 20px;
            margin-top: 5px;
            padding: 0 5px;
        }
        
        .officer-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 15px;
        }
        
        .officer-signature {
            text-align: center;
            min-width: 150px;
        }
        
        .officer-line {
            border-top: 1px solid #000;
            padding-top: 5px;
            margin-top: 40px;
            font-size: 10px;
        }
        
        .id-picture {
            width: 80px;
            height: 80px;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
            text-align: center;
            background: #f5f5f5;
        }
        
        .form-footer {
            text-align: center;
            margin-top: 10px;
            font-size: 9px;
            font-style: italic;
        }
        
        .declaration-text {
            font-size: 10px;
            margin: 10px 0;
            text-align: justify;
            line-height: 1.4;
        }
        
        .admission-slip {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 15px;
            background: #f9f9f9;
        }
        
        .admission-title {
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
            text-decoration: underline;
            text-transform: uppercase;
        }
        
        .admission-text {
            font-size: 10px;
            margin-bottom: 8px;
            line-height: 1.3;
        }
        
        .admission-field {
            display: inline-block;
            border-bottom: 1px solid #000;
            min-width: 100px;
            padding: 2px 4px;
            margin: 0 4px;
        }
        
        .or-section {
            border: 1px dashed #000;
            padding: 8px;
            margin-top: 10px;
            min-width: 120px;
        }
        
        .or-label {
            font-size: 9px;
            margin-bottom: 3px;
        }
        
        .or-input {
            border-bottom: 1px solid #000;
            height: 15px;
            margin-bottom: 6px;
            padding: 2px 4px;
        }
        
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <!-- Form Header -->
        <div class="form-header">
            <div class="form-title">Republic of the Philippines</div>
            <div class="form-title">National Telecommunication Commission</div>
            <div class="form-subtitle">BIR Road, East Triangle, Diliman, Quezon City</div>
            <div class="form-title" style="margin-top: 10px;">APPLICATION FOR RADIO OPERATOR EXAMINATION</div>
        </div>
        
        <div class="form-info">
            <div><strong>Form No. NTC {{ $formType }}</strong></div>
            <div><strong>Revision No. 03</strong></div>
            <div><strong>Revision Date: 03/31/2023</strong></div>
        </div>

        @if($formType === '1-01')
            @include('clientside.forms.pdf.Form1-01-pdf', ['form' => $form])
        @elseif($formType === '1-02')
            @include('clientside.forms.pdf.Form1-02-pdf', ['form' => $form])
        @elseif($formType === '1-03')
            @include('clientside.forms.pdf.Form1-03-pdf', ['form' => $form])
        @else
            <!-- Generic form for other types -->
            <div class="form-section">
                <div class="section-title">Application Details</div>
                @foreach($form as $key => $value)
                    @if(!in_array($key, ['_id', 'user_id', 'form_token', 'created_at', 'updated_at']))
                        <div class="form-row">
                            <div class="form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}:</div>
                            <div class="form-value {{ empty($value) ? 'empty' : '' }}">
                                {{ $value ?? '' }}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif

        <!-- Declaration Section -->
        <div class="signature-section">
            <div class="section-title">Declaration</div>
            <div class="declaration-text">
                I hereby declare that all the above entries are true and correct. Under the Revised Penal Code, I shall be held liable for any willful false statement(s) or misrepresentation(s) made in this application form that may serve as a valid ground for the denial of this application and/or cancellation/revocation of the permit issued/granted. Further, I am freely giving full consent for the collection and processing of personal information in accordance with Republic Act No. 73, Data Privacy Act of 2012.
            </div>
            
            <div class="signature-row">
                <div class="signature-field">
                    <div style="font-size: 10px;">Signature over Printed Name of Applicant:</div>
                    <div class="signature-line">{{ $form['signature_name'] ?? '' }}</div>
                </div>
                <div class="signature-field">
                    <div style="font-size: 10px;">Date Accomplished:</div>
                    <div class="signature-line">{{ $form['date_accomplished'] ?? '' }}</div>
                </div>
            </div>
            
            <div class="officer-section">
                <div style="flex: 1;"></div>
                <div class="officer-signature">
                    <div class="officer-line">Authorized Officer</div>
                </div>
                <div class="id-picture">
                    1"x1"<br>ID Picture
                </div>
            </div>
        </div>
        
        <div class="form-footer">
            THIS FORM IS NOT FOR SALE AND CAN BE REPRODUCED
        </div>
    </div>
</body>
</html>
