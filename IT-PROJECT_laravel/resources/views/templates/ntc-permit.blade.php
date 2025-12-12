<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NTC Official Permit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #000;
            margin: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 80px;
        }


        .header h2,
        .header h3 {
            margin: 2px;
            text-transform: uppercase;
        }

        .title {
            text-align: center;
            margin: 5px 0 15px 0;
            font-weight: bold;
            font-size: 18px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 6px;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td,
        table th {
            border: 1px solid #000;
            padding: 6px;
            text-transform: uppercase;
        }

        .no-border {
            border: none;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('images/ntc-logo.png') }}" alt="NTC Logo">
        <div>Republic of the Philippines</div>
        <div>National Telecommunications Commission</div>
        <div>NTC – CAR (Baguio)</div>
    </div>

    <div class="title">NTC PERMIT</div>

    <div class="section">
        <div class="section-title">Applicant Information</div>
        <table>
            <tr>
                <td class="bold">Name </td>
                <td>{{ strtoupper($permit['applicant']) }}
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Permit Details</div>
        <table>
            <tr>
                <td class="bold">Permit Type</td>
                <td>{{ strtoupper($permit['permit_type_display'] ?? '-') }}</td>
            </tr>
            <tr>
                <td class="bold">Radio Service</td>
                <td>{{ strtoupper($permit['radio_service'] ?? '-') }}</td>
            </tr>
            <tr>
                <td class="bold">Application Type</td>
                <td>{{ strtoupper($permit['application_type'] ?? '-') }}</td>
            </tr>
            <tr>
                <td class="bold">Intended Use</td>
                <td>{{ strtoupper($permit['intended_use'] ?? '-') }}</td>
            </tr>
            <tr>
                <td class="bold">Issuance Date</td>
                <td>{{ $permit['issuance_date'] ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Units / Equipment</div>
        <table>
            <thead>
                <tr>
                    <th>Station Class</th>
                    <th>Number of Units</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permit['units'] ?? [] as $class => $count)
                    <tr>
                        <td>{{ strtoupper($class) }}</td>
                        <td class="center">{{ $count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section" style="margin-top:40px;">
        <table class="no-border">
            <tr>
                <td class="no-border" style="width:50%;">Issued by: ___________________________</td>
                <td class="no-border center">Date: {{ $permit['issuance_date'] ?? '-' }}</td>
            </tr>
        </table>
    </div>

</body>

</html>
