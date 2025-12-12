<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>NTC Examination Official Receipt</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 13px;
            color: #000;
        }

        .container {
            width: 100%;
            padding: 20px;
            border: 1px solid #000;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header img {
            width: 80px;
        }

        .title {
            text-align: center;
            margin: 5px 0;
            font-weight: bold;
            font-size: 18px;
        }

        .section {
            margin-top: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        table td,
        table th {
            border: 1px solid black;
            padding: 6px;
        }

        .right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- Header -->
        <div class="header">
            <img src="{{ public_path('images/ntc-logo.png') }}" alt="NTC Logo">
            <div>Republic of the Philippines</div>
            <div>National Telecommunications Commission</div>
            <div>{{ $data['ntc_region'] }}</div>
        </div>

        <div class="title">OFFICIAL RECEIPT (EXAMINATION)</div>

        <!-- OR Info -->
        <div class="section">
            <strong>OR No:</strong> {{ $data['or_number'] }} <br>
            <strong>Date:</strong> {{ $data['or_date'] }}
        </div>

        <!-- Payer Info -->
        <div class="section">
            <strong>Received From:</strong> {{ $data['cash_received_from'] }} <br>
            <strong>Address:</strong> {{ $data['address'] }} <br>
            <strong>Transaction Type:</strong> Examination <br>
        </div>

        <!-- Fee Table -->
        <div class="section">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th class="right">Amount (PHP)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Examination Fee (EXF)</td>
                        <td class="right">₱{{ number_format($data['exam_amount'], 2) }}</td>
                    </tr>
                    <tr>
                        <td class="right bold">TOTAL AMOUNT</td>
                        <td class="right bold">₱{{ number_format($data['exam_amount'], 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Payment Info -->
        <div class="section">
            <strong>Payment Method:</strong> {{ $data['payment_method'] }} <br>
            <strong>Collected by:</strong> {{ $data['collecting_officer'] }}
        </div>

        <div class="section" style="text-align:center; margin-top:25px;">
            *** THIS IS A SYSTEM GENERATED OFFICIAL RECEIPT ***
        </div>
    </div>
</body>

</html>
