<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>NTC Official Receipt</title>

    <style>
        body {
            font-family: Arial, sans-serif;
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

        .no-border td {
            border: 0;
            padding: 3px 0;
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

        <!-- NTC HEADER -->
        <div class="header">
            <img src="{{ public_path('images/ntc-logo.png') }}" alt="NTC Logo">
            <div>Republic of the Philippines</div>
            <div>National Telecommunications Commission</div>
            <div>{{ $data['ntc_region'] ?? 'Central Office' }}</div>
        </div>

        <div class="title">OFFICIAL RECEIPT</div>

        <!-- OR INFO -->
        <table class="no-border">
            <tr>
                <td><strong>OR No:</strong> {{ $data['or_number'] ?? 'N/A' }}</td>
                <td class="right"><strong>Date:</strong> {{ $data['or_date'] ?? 'N/A' }}</td>
            </tr>
        </table>

        <div class="section">
            <strong>Received From:</strong> {{ $data['cash_received_from'] ?? 'N/A' }} <br>
            <strong>Address:</strong> {{ $data['address'] ?? 'N/A' }} <br>
            @if (isset($data['transaction_type']))
                <strong>Transaction Type:</strong> {{ ucfirst($data['transaction_type']) }} <br>
            @endif
            @if (isset($data['form_type']))
                <strong>Form Type:</strong> {{ $data['form_type'] }} <br>
            @endif
        </div>

        <div class="section">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th class="right">Qty</th>
                        <th class="right">Unit Price</th>
                        <th class="right">Amount</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data['items'] as $item)
                        <tr>
                            <td>{{ $item['description'] }}</td>
                            <td class="right">{{ $item['qty'] ?? 1 }}</td>
                            <td class="right">{{ number_format($item['unit_price'] ?? $item['amount'], 2) }}</td>
                            <td class="right">{{ number_format($item['amount'], 2) }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="3" class="right bold">TOTAL AMOUNT</td>
                        <td class="right bold">{{ number_format($data['total_amount'], 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <strong>Payment Method:</strong> {{ strtoupper($data['payment_method'] ?? 'N/A') }} <br>
            <strong>Collected by:</strong> {{ $data['collecting_officer'] ?? 'N/A' }}
        </div>

        @if (isset($data['remarks']))
            <div class="section">
                <strong>Remarks:</strong> {{ $data['remarks'] }}
            </div>
        @endif

        <div class="section" style="text-align:center; margin-top:25px;">
            *** THIS IS A SYSTEM GENERATED OFFICIAL RECEIPT ***
        </div>

    </div>
</body>

</html>
