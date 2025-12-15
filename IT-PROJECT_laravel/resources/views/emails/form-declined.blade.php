<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Declined</title>
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
            color: #e5cccc;
        }

        .content {
            padding: 30px 20px;
        }

        .content h2 {
            color: #660000;
            font-size: 20px;
        }

        .content p {
            line-height: 1.6;
            font-size: 15px;
            margin: 15px 0;
        }

        .details-box {
            background-color: #f8d7da;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #f5c6cb;
            margin: 15px 0;
        }

        .details-box p,
        .details-box ul {
            margin: 0;
        }

        .details-box ul {
            padding-left: 20px;
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
            <h2>Your Form Has Been Declined</h2>

            <p>Hello {{ $form->last_name }} {{ $form->first_name }},</p>

            <p>
                We regret to inform you that your application
                <strong>{{ $transaction->payment_reference }}</strong> has been
                <span style="color:#b30000; font-weight:bold;">declined</span>.
            </p>

            <p>Please review the remarks below for the reason:</p>

            <!-- Decline reason -->
            <div class="details-box">
                <h3 style="margin-top:0;">Remarks / Reason for Decline</h3>
                <p style="font-size:15px;">
                    {{ $transaction->remarks ?? 'No remarks provided.' }}
                </p>
            </div>

            <p style="font-size:14px;">
                If you believe this was an error or you need clarification, you may contact us at
                <strong>car.admin@ntc.gov.ph</strong>.
            </p>

            <p>
                You may correct your application and resubmit it through the NTC Forms System.
            </p>
        </div>

        <div class="footer">
            <p>This is an automated message from the NTC Forms System.</p>
            <p>© {{ date('Y') }} National Telecommunication Commission - CAR</p>
        </div>
    </div>
</body>

</html>
