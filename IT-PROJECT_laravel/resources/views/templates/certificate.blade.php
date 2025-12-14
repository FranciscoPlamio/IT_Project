<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>NTC Radio Operator Certificate</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #000;
        }

        .container {
            width: 420px;
            padding: 18px;
            border: 1px solid #000;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header img {
            width: 80px;
            margin-bottom: 5px;
        }

        .title-main {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin-top: 10px;
        }

        .sub-title {
            text-align: center;
            font-size: 14px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            border: 1px solid black;
            padding: 6px;
            vertical-align: top;
        }

        .label {
            font-size: 12px;
            color: #444;
        }

        .value {
            font-weight: bold;
            font-size: 14px;
        }

        .signature-section {
            margin-top: 20px;
            text-align: center;
        }

        .officer {
            margin-top: 5px;
            font-size: 12px;
        }

        .serial {
            margin-top: 10px;
            font-weight: bold;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- HEADER -->
        <div class="header">
            <img src="{{ public_path('images/ntc-logo.png') }}" alt="NTC Logo">
            <div>Republic of the Philippines</div>
            <div>National Telecommunications Commission</div>
            <div>{{ $certificate['ntc_region'] }}</div>
            <div><strong>{{ strtoupper($certificate['certificate_type']) }}</strong></div>
        </div>

        <!-- TITLE -->
        <div class="title-main">{{ strtoupper($certificate['title']) }}</div>
        <div class="sub-title">{{ strtoupper($certificate['radio_service']) }}</div>

        <!-- NAME & ADDRESS -->
        <div class="label">Name:</div>
        <div class="value">{{ $certificate['name'] }}</div>

        <div class="label" style="margin-top: 10px;">Address:</div>
        <div class="value">{{ $certificate['address'] }}</div>

        <!-- INFO TABLE -->
        <table>
            <tr>
                <td>
                    <span class="label">Date of Birth</span><br>
                    <span class="value">{{ $certificate['dob'] }}</span>
                </td>
                <td>
                    <span class="label">Citizenship</span><br>
                    <span class="value">{{ $certificate['citizenship'] }}</span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="label">Sex</span><br>
                    <span class="value">{{ $certificate['sex'] }}</span>
                </td>
                <td>
                    <span class="label">Height / Weight</span><br>
                    <span class="value">{{ $certificate['height'] }} cm / {{ $certificate['weight'] }} kg</span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="label">Date Issued</span><br>
                    <span class="value">{{ $certificate['date_issued'] }}</span>
                </td>
                <td>
                    <span class="label">Valid Until</span><br>
                    <span class="value">{{ $certificate['valid_until'] }}</span>
                </td>
            </tr>
        </table>

        <!-- SIGNATURE -->
        <div class="signature-section">
            <div class="label">For the Commission:</div>
            <div class="value">{{ $certificate['officer_name'] }}</div>
            <div class="officer">{{ $certificate['officer_title'] }}</div>
        </div>

        <!-- SERIAL NO -->
        <div class="serial">{{ $certificate['certificate_no'] }}</div>

        <div class="section" style="text-align:center; margin-top:25px;">
            *** THIS IS A SYSTEM GENERATED CERTIFICATE ***
        </div>
    </div>

</body>

</html>
