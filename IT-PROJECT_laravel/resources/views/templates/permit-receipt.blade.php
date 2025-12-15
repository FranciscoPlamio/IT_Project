<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>NTC Official Receipt (Permit)</title>

    <style>
        @page {
            size: 250mm 185mm;
            margin: 5mm;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 13px;
            color: #000;
            width: 100%;
            overflow: hidden;
        }

        .container {
            max-width: 200mm;
            width: 100%;
            padding: 20px;
            border: 1px solid #000;
            margin: 0 auto;
            page-break-inside: avoid;
            page-break-after: avoid;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header img {
            width: 80px;
            margin-bottom: 5px;
        }

        .title {
            text-align: center;
            margin: 5px 0 15px 0;
            font-weight: bold;
            font-size: 18px;
        }

        .section {
            margin-top: 15px;
            page-break-inside: avoid;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            page-break-inside: avoid;
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

        .left {
            text-align: left;
        }

        .bold {
            font-weight: bold;
        }

        .center {
            text-align: center;
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
                <td class="left"><strong>OR No:</strong> {{ $data['or_number'] ?? 'N/A' }}</td>
                <td class="center"><strong>Date:</strong> {{ $data['or_date'] ?? 'N/A' }}</td>
            </tr>
        </table>

        <!-- Payee Info -->
        <div class="section">
            <div><strong>Received From:</strong> {{ $data['cash_received_from'] ?? 'N/A' }}</div>
            <div><strong>Address:</strong> {{ $data['address'] ?? 'N/A' }}</div>
            @if (isset($data['transaction_type']))
                <div><strong>Transaction Type:</strong> {{ ucfirst($data['transaction_type']) }}</div>
            @endif
            <!-- Permit Type row -->
            @php
                $permitNames = [
                    'at-club-rsl' => 'Amateur Club Radio Station License',
                    'at-lifetime' => 'Amateur Lifetime Permit',
                    'purchase-possess' => 'Amateur Purchase/Possess Permit',
                    'sell-transfer' => 'Amateur Sell/Transfer Permit',
                    'storage-permit' => 'Amateur Storage Permit',
                    'at-rsl' => 'Amateur Radio Station License',
                    // add more mappings here if needed
                ];

                $permitName = $permitNames[$data['permit_type']] ?? ($data['permit_type'] ?? 'N/A');
            @endphp

            @if (isset($data['permit_type']))
                <div><strong>Permit Type:</strong> {{ $permitName }}</div>
            @endif
        </div>

        <!-- Fee Items Table -->
        <div class="section">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['items'] as $item)
                        <tr>
                            <td>{{ $item['description'] }}</td>
                            <td>{{ $item['qty'] ?? 1 }}</td>
                            <td>₱{{ number_format($item['unit_price'] ?? $item['amount'], 2) }}</td>
                            <td>₱{{ number_format($item['amount'], 2) }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="3" class="bold">TOTAL AMOUNT</td>
                        <td class="bold">₱{{ number_format($data['total_amount'], 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Payment Method -->
        <div class="section">
            <div><strong>Payment Method:</strong> {{ strtoupper($data['payment_method'] ?? 'N/A') }}</div>
            <div><strong>Collected by:</strong> {{ $data['collecting_officer'] ?? 'N/A' }}</div>
        </div>

        <!-- Remarks -->
        @if (isset($data['remarks']))
            <div class="section">
                <div><strong>Remarks:</strong> {{ $data['remarks'] }}</div>
            </div>
        @endif

        <!-- Footer Note -->
        <div class="section center" style="margin-top:25px;">
            *** THIS IS A SYSTEM GENERATED OFFICIAL RECEIPT ***
        </div>

    </div>
</body>

</html>
