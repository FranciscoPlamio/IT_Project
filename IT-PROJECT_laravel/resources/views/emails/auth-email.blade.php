<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Authentication</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 150px;
            height: auto;
        }
        .content {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        .warning {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
        <h1>National Telecommunication Commission</h1>
        <p>Cordillera Administrative Region, Baguio City Philippines</p>
    </div>

    <div class="content">
        <h2>Email Authentication Required</h2>
        
        <p>Hello,</p>
        
        <p>You have requested access to the NTC Forms System. To proceed, please verify your email address by clicking the button below:</p>
        
        <div style="text-align: center;">
            <a href="{{ $verification_url }}" class="button">Verify Email Address</a>
        </div>
        
        <p>If the button doesn't work, you can copy and paste this link into your browser:</p>
        <p style="word-break: break-all; background-color: #e9ecef; padding: 10px; border-radius: 4px;">
            {{ $verification_url }}
        </p>
        
        <div class="warning">
            <strong>Important:</strong> This verification link will expire in 15 minutes for security reasons.
        </div>
        
        <p>If you didn't request this authentication, please ignore this email.</p>
        
        <p>Thank you for using the NTC Forms System.</p>
    </div>

    <div class="footer">
        <p>This is an automated message from the NTC Forms System.</p>
        <p>© {{ date('Y') }} National Telecommunication Commission - CAR</p>
    </div>
</body>
</html>
