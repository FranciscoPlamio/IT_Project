<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>NTC Certificate Official Receipt</title>

    <style>
        @page {
            size: 250mm 180mm;
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
        }

        .title {
            text-align: center;
            margin: 5px 0;
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

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .italic {
            font-style: italic;
            color: #555;
        }
    </style>
</head>

<body>
    @php
        $acronyms = [
            'ff' => 'Filing Fee (FF)',
            'af' => 'Application Fee (AF)',
            'sem' => 'Seminar Fee (SEM)',
        ];

        // Add acronym automatically if the text contains the fee name
        function withAcronym($label, $acronyms)
        {
            foreach ($acronyms as $full => $short) {
                if (stripos($label, $full) !== false) {
                    return $short;
                }
            }
            return $label;
        }
    @endphp
    <div class="container">

        <!-- NTC HEADER -->
        <div class="header">
            <img src="{{ public_path('images/ntc-logo.png') }}" alt="NTC Logo">
            <div>Republic of the Philippines</div>
            <div>National Telecommunications Commission</div>
            <div>{{ $data['ntc_region'] ?? 'NTC – CAR (Baguio)' }}</div>
        </div>

        <div class="title">OFFICIAL RECEIPT</div>

        <!-- OR INFO -->
        <table class="no-border">
            <tr>
                <td class="left"><strong>OR No:</strong> {{ $data['or_number'] }}</td>
                <td class="center"><strong>Date:</strong> {{ $data['or_date'] }}</td>
            </tr>
        </table>
        @php
            // Certificate names
            $certificateNames = [
                '1RTG' => 'First-class Radiotelegraph Operator Certificate',
                '2RTG' => 'Second-class Radiotelegraph Operator Certificate',
                '3RTG' => 'Third-class Radiotelegraph Operator Certificate',
                '1PHN' => 'First-class Radiotelephone Operator Certificate',
                '2PHN' => 'Second-class Radiotelephone Operator Certificate',
                '3PHN' => 'Third-class Radiotelephone Operator Certificate',
                'RROC-AIRCRAFT' => 'Radio Operator\'s Certificate for Aircraft',
                'SROP' => 'Ship Radio Operator\'s Permit',
                'GROC' => 'General Radiotelegraph Operator Certificate',
                'RROC-RLM' => 'Radio Operator\'s Certificate (RLM)',

                // --- FORM 1-03 (AMATEUR RADIO SERVICES) ---
                'ATROC' => 'Amateur Radio Operator Certificate',
                'AT-LIFETIME' => 'Amateur Radio Operator Certificate – Lifetime',
                'AT-CLUB-RSL' => 'Amateur Club Radio Station License',
                'TEMP-A' => 'Temporary Amateur Radio Station Permit – Type A',
                'TEMP-B' => 'Temporary Amateur Radio Station Permit – Type B',
                'TEMP-C' => 'Temporary Amateur Radio Station Permit – Type C',
                'SPECIAL-EVENT-CALL' => 'Special Event Call Sign',
                'VANITY-CALL' => 'Vanity Call Sign',
            ];

            $rawType = strtoupper($data['certificate_type'] ?? ($data['category'] ?? 'UNKNOWN'));
            $stationClass = strtoupper($data['station_class'] ?? '');

            // Form 1-03 with station class (ATRSL, TEMP)
            if (Str::contains($rawType, 'ATRSL') || Str::contains($rawType, 'TEMP')) {
                $classSuffix = $stationClass ? ' - ' . $stationClass : '';
                $certificateFullName =
                    ($certificateNames[$rawType] ?? ucwords(str_replace(['-', '_'], ' ', $rawType))) . $classSuffix;
            } else {
                // Form 1-02 or other Form 1-03 types without station class
                $certificateFullName = $certificateNames[$rawType] ?? ucwords(str_replace(['-', '_'], ' ', $rawType));
            }
        @endphp
        <div class="section">
            <strong>Received From:</strong> {{ $data['cash_received_from'] }} <br>
            <strong>Address:</strong> {{ $data['address'] }} <br>
            <strong>Certificate Type:</strong>
            {{ $certificateFullName }}<br>
            <strong>Application: </strong> {{ strtoupper($data['application_type']) }} <br>
        </div>


        {{-- 
        @if (!empty($data['per_year_roc']))
            <div class="section">
                <table class="no-border">
                    <tr>
                        <td class="italic">
                            Certificate Fee per Year ({{ $certificateFullName }})
                        </td>
                        <td class="right italic">
                            ₱{{ number_format($data['per_year_roc'], 2) }}
                        </td>
                    </tr>
                </table>
            </div>
        @endif --}}


        <div class="section">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th class="right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['items'] as $item)
                        <tr>
                            <td>{{ withAcronym($item['description'], $acronyms) }}</td>
                            <td class="right">₱{{ number_format($item['amount'], 2) }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td class="right bold">TOTAL AMOUNT</td>
                        <td class="right bold">₱{{ number_format($data['total_amount'], 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <strong>Payment Method:</strong> {{ strtoupper($data['payment_method'] ?? 'Cash') }} <br>
            <strong>Collected by:</strong> {{ $data['collecting_officer'] ?? 'N/A' }}
        </div>

        @if (!empty($data['remarks']))
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
