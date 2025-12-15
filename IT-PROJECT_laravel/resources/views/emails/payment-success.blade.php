<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
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
            padding: 12px 14px;
            border-radius: 6px;
            font-size: 14px;
        }

        .button {
            display: inline-block;
            background-color: #28a745;
            color: #fff !important;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: bold;
            margin: 20px 0;
        }

        .button:hover {
            background-color: #218838;
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
            <h2>Your payment was successful</h2>
            <p>Thank you for your payment. Your transaction has been recorded successfully.</p>

            <div class="details-box">
                <p><strong>Reference:</strong> {{ $reference }}</p>
                <p><strong>Method:</strong> {{ ucfirst($paymentMethod ?? '—') }}</p>
                <p><strong>Amount:</strong> {{ $amount ? '₱' . number_format($amount, 2) : '—' }}</p>
            </div>

            <!-- optional (since may download button na sa payment PJ) -->
            {{-- <p>You can download your PDF document using the button below:</p>
            <div style="text-align:center;">
                <a href="{{ $download_url }}" class="button" target="_blank" rel="noopener"
                    download="NTC_Form_{{ $reference }}_{{ date('Y-m-d') }}.pdf">Download PDF</a>
            </div> --}}
            <p>If you didn't request this authentication, you can safely ignore this email</p>
            <p>Thank you for using the NTC Forms System.</p>
        </div>
        <div class="footer">
            <p>This is an automated message from the NTC Forms System.</p>
            <p>© {{ date('Y') }} National Telecommunication Commission - CAR</p>
        </div>
    </div>
</body>

</html>
