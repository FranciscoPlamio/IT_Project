<x-admin-layout :title="'Verify Certificate'">
    <x-slot:head>
        @vite(['resources/css/adminside/req-management.css', 'resources/js/adminside/req-management.js'])
        <style>
            /* Card styling */
            .verify-cert-card {
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                background-color: #fff;
            }

            .verify-cert-header h2 {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            /* Search bar */
            .verify-cert-search-bar {
                display: flex;
                gap: 5px;
                margin-bottom: 15px;
            }

            .verify-cert-search-bar input[type="text"] {
                flex: 1;
                padding: 8px 12px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 14px;
            }

            .verify-cert-search-bar button {
                padding: 8px 16px;
                border: none;
                background-color: #007bff;
                color: #fff;
                font-weight: bold;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.2s;
            }

            .verify-cert-search-bar button:hover {
                background-color: #0056b3;
            }

            /* Table styling */
            .verify-cert-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .verify-cert-table thead tr {
                background-color: #007bff;
                color: #ffffff;
                text-align: left;
            }

            .verify-cert-table th,
            .verify-cert-table td {
                padding: 10px 12px;
                border: 1px solid #ddd;
            }

            .verify-cert-table tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .verify-cert-table tbody tr:hover {
                background-color: #f1f1f1;
            }

            .verify-cert-table td a {
                color: #007bff;
                text-decoration: none;
                font-weight: bold;
            }

            .verify-cert-table td a img {
                vertical-align: middle;
                margin-left: 5px;
                width: 16px;
                height: 16px;
            }

            /* Status badges */
            .verify-cert-badge {
                display: inline-block;
                padding: 4px 10px;
                border-radius: 12px;
                font-size: 12px;
                font-weight: bold;
                color: #fff;
                text-align: center;
            }

            .verify-cert-badge.active {
                background-color: #28a745;
            }

            /* green */
            .verify-cert-badge.expired {
                background-color: #fd7e14;
            }

            /* orange */

            /* Error messages */
            .verify-cert-errors {
                font-size: 14px;
                color: red;
                margin-bottom: 10px;
            }
        </style>
    </x-slot:head>

    <div class="main">
        <h1>Verify Certificate</h1>

        <div class="verify-cert-card">
            <section class="verify-cert-section">
                <div class="verify-cert-header">
                    <h2>Certificate Verification</h2>
                    <div class="verify-cert-search-bar">
                        <form action="{{ route('admin.certificates.verify.submit') }}" method="POST"
                            style="width:100%; display:flex; gap:5px;">
                            @csrf
                            <input type="text" name="certificate_no" placeholder="Enter Certificate No"
                                value="{{ old('certificate_no') }}" required>
                            <button type="submit">Verify</button>
                        </form>
                    </div>
                </div>

                <div class="verify-cert-table-container">
                    @if ($errors->any())
                        <div class="verify-cert-errors">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    @if (isset($certificate))
                        @php
                            $status = 'Active';
                            if (\Carbon\Carbon::parse($certificate->valid_until)->isPast()) {
                                $status = 'Expired';
                            }
                        @endphp

                        <table class="verify-cert-table">
                            <thead>
                                <tr>
                                    <th>Certificate No</th>
                                    <th>Holder Name</th>
                                    <th>Certificate Type</th>
                                    <th>Date Issued</th>
                                    <th>Valid Until</th>
                                    <th>Status</th>
                                    <th>PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $certificate->certificate_no }}</td>
                                    <td>{{ $certificate->holder_name ?? $certificate->name }}</td>
                                    <td>{{ $certificate->certificate_type }}</td>
                                    <td>{{ \Carbon\Carbon::parse($certificate->date_issued)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($certificate->valid_until)->format('d M Y') }}</td>
                                    <td>
                                        <span class="verify-cert-badge {{ strtolower($status) }}">
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td>
                                        @if (isset($pdfUrl))
                                            <a href="{{ $pdfUrl }}" target="_blank">
                                                View PDF <img src="{{ asset('images/see-icon.png') }}" alt="View">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
