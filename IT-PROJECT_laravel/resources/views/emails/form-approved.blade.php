<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Approved</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 30px 20px 10px 20px;
            background-color: #003366;
            color: #ffffff;
        }

        .header img {
            max-width: 120px;
            margin-bottom: 15px;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
        }

        .header p {
            margin: 5px 0 0 0;
            font-size: 14px;
            color: #c0c0c0;
        }

        .content {
            padding: 30px 20px;
        }

        .content h2 {
            color: #003366;
            font-size: 20px;
        }

        .content p {
            line-height: 1.6;
            font-size: 15px;
            margin: 15px 0;
        }

        .details-box {
            background-color: #f1f3f5;
            padding: 15px;
            border-radius: 6px;
            margin: 15px 0;
        }

        .details-box ul {
            padding-left: 20px;
            margin: 0;
        }

        .details-box li {
            margin-bottom: 8px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888888;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ $message->embed(public_path() . '/images/logo.png') }}" alt="NTC Logo">
            <h1>National Telecommunication Commission</h1>
            <p>Cordillera Administrative Region, Baguio City Philippines</p>
        </div>

        <div class="content">
            <h2>Your Form Has Been Approved</h2>
            <p>Hello {{ $form->last_name }} {{ $form->first_name }},</p>
            <p>Your payment was successful. Your transaction has been recorded successfully.</p>
            <p>Your application <strong>{{ $transaction->payment_reference }}</strong> has been approved. Below are
                the details:
            </p>
            <!-- Existing Payment Details -->
            <div class="details-box">
                <p><strong>Reference Number:</strong> {{ $transaction->payment_reference }}</p>
                <p><strong>Method:</strong> {{ ucfirst($transaction->payment_method ?? '—') }}</p>
                <p><strong>Amount:</strong>
                    {{ $transaction->payment_amount ? '₱' . number_format($transaction->payment_amount, 2) : '—' }}
                </p>
            </div>

            <div class="details-box">
                <h3>OR Details</h3>
                <ul>
                    <li>OR Number: {{ $form->or['or_no'] ?? '-' }}</li>
                    <li>OR Amount: {{ $form->or['or_amount'] ?? '-' }}</li>
                    <li>Collecting Officer: {{ $form->or['collecting_officer'] ?? '-' }}</li>
                    <li>Date: {{ $form->or['or_date'] ?? '-' }}</li>
                </ul>

                <h3>Admission Slip Details</h3>
                @php
                    use Carbon\Carbon;

                    // Format date
                    $examDate = $form->admission_slip['date_of_exam'] ?? null;
                    if ($examDate) {
                        $formattedDate = Carbon::parse($examDate)->format('F j, Y'); // e.g., November 4, 2025
                    } else {
                        $formattedDate = '-';
                    }

                    // Format time
                    $examTime = $form->admission_slip['time_of_exam'] ?? null;
                    if ($examTime) {
                        // Append seconds to parse correctly if missing
                        $formattedTime = Carbon::createFromFormat('H:i', $examTime)->format('g:i A'); // e.g., 10:49 AM
                    } else {
                        $formattedTime = '-';
                    }
                @endphp
                <ul>
                    <li>Name: {{ $form->last_name }} {{ $form->first_name }}</li>
                    <li>Exam For: {{ $form->exam_type }}</li>
                    <li>Place of Exam: {{ $form->admission_slip['place_of_exam'] ?? '-' }}</li>
                    <li>Date: {{ $form->admission_slip['date_of_exam'] ?? '-' }}</li>
                    <li>Time: {{ $form->admission_slip['time_of_exam'] ?? '-' }}</li>
                    <li>Authorized Officer: {{ $form->admission_slip['authorized_officer'] ?? '-' }}</li>
                </ul>
            </div>
            <div
                style="background-color:#fff3cd; border:1px solid #ffeeba; padding:20px; border-radius:8px; margin:20px 0; font-weight:bold; font-size:16px; line-height:1.6;">
                <p style="font-size:18px; margin-bottom:10px;">📌 <strong>Please take note of your exam
                        schedule:</strong></p>
                <p>
                    <strong>Place of Exam:</strong> {{ $form->admission_slip['place_of_exam'] ?? '-' }}<br>
                    <strong>Date and Time:</strong> {{ $formattedDate ?? '-' }}
                    {{ $formattedTime ?? '-' }}<br>
                </p>

            </div>

            <hr style="border: none; border-top: 1px solid #e1e1e1; margin: 25px 0;">

            <p style="font-size:14px; line-height:1.6;">
                If you have any questions or concerns, feel free to contact us at
                <strong>car.admin@ntc.gov.ph</strong>.
            </p>
            <p>Thank you for using the NTC Forms System.</p>
        </div>

        <div class="footer">
            <p>This is an automated message from the NTC Forms System.</p>
            <p>© {{ date('Y') }} National Telecommunication Commission - CAR</p>
        </div>
    </div>
</body>

</html>
