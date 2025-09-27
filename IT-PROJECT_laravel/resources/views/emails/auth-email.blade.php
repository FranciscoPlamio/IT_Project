<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
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
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
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
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff !important;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: bold;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .link-box {
            word-break: break-all;
            background-color: #f1f3f5;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
        }
        .warning {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
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
            <h2>Verify your email address</h2>
            <p>Welcome to NTC Forms System!</p>
            <p>You are almost there! If you have requested access to the NTC Forms System, please verify your email address by clicking the button below:</p>
            <div style="text-align:center;">
                <a href="{{ $verification_url }}" class="button">Verify Email Address</a>
            </div>
            <div class="warning">
                <strong>Important:</strong> This verification link will expire in 15 minutes for security reasons.
            </div>

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
