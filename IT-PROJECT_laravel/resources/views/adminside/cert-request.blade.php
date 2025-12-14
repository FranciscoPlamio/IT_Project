<x-admin-layout :title="'Request History'">
    <x-slot:head>
        @vite(['resources/css/adminside/req-management.css', 'resources/js/adminside/req-management.js'])
        <style>
            .status-badge {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 6px 12px;
                border-radius: 20px;
                font-size: 11px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                white-space: nowrap;
            }

            .status-badge.done {
                background: #f0fdf4;
                color: #22c55e;
                border: 1px solid #bbf7d0;
            }

            .status-badge.progress {
                background: #fffbeb;
                color: #f59e0b;
                border: 1px solid #fed7aa;
            }

            .status-badge img {
                width: 14px;
                height: 14px;
            }
        </style>
    </x-slot:head>

    <!-- Main Content -->
    <div class="main">
        <h1>Certification & Permit Request</h1>

        <div class="card full-page">
            <section class="half-section">
                <div class="card-header">
                    <div class="actions">
                        <div class="search-bar">
                            <input type="text" id="searchLatest" placeholder="Search">
                            <img src="{{ asset('images/search-icon.png') }}" alt="Search">
                        </div>
                        <div class="filter-bar">
                            <img src="{{ asset('images/filter-icon.png') }}" alt="Filter">
                            <div class="filter-dropdown" id="filterDropdownLatest">
                                <h4>Filter by:</h4>

                                <label for="historyDateType">Filter Date Type</label>
                                <select id="historyDateType">
                                    <option value="request">Request Date</option>
                                    <option value="release">Release Date</option>
                                </select>

                                <label for="dateFilterLatest">Date Range</label>
                                <select id="dateFilterLatest">
                                    <option value="all">All Dates</option>
                                    <option value="week">This Week</option>
                                    <option value="month">This Month</option>
                                    <option value="3months">Last 3 Months</option>
                                    <option value="6months">Last 6 Months</option>
                                    <option value="year">This Year</option>
                                </select>

                                <label for="formFilterLatest">Form Type</label>
                                <div class="form-list">
                                    <select id="formFilterLatest" size="5">
                                        <option value="all">All Forms</option>
                                        <option value="Form1-01">Form1-01</option>
                                        <option value="Form1-02">Form1-02</option>
                                        <option value="Form1-03">Form1-03</option>
                                        <option value="Form1-09">Form1-09</option>
                                        <option value="Form1-11">Form1-11</option>
                                        <option value="Form1-13">Form1-13</option>
                                        <option value="Form1-14">Form1-14</option>
                                        <option value="Form1-16">Form1-16</option>
                                        <option value="Form1-18">Form1-18</option>
                                        <option value="Form1-19">Form1-19</option>
                                        <option value="Form1-20">Form1-20</option>
                                        <option value="Form1-21">Form1-21</option>
                                        <option value="Form1-22">Form1-22</option>
                                        <option value="Form1-24">Form1-24</option>
                                        <option value="Form1-25">Form1-25</option>
                                        <option value="Form1-26">Form1-26</option>
                                    </select>
                                </div>

                                <button id="applyFilterLatest">Apply Filter</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-container1">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Request Type</th>
                                <th>Request Date</th>
                                <th>Release Date</th>
                                <th>Attachment</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestRequests as $req)
                                <tr
                                    class="request-row {{ isset($highlight) && $highlight == $req->payment_reference ? 'highlighted' : '' }}">
                                    <td>{{ $req->payment_reference }}</td>
                                    <td>{{ ucfirst($req->form_type ?? 'N/A') }}</td>
                                    <td>{{ $req->created_at ? $req->created_at->format('d M Y') : 'N/A' }}</td>
                                    <td>{{ $req->updated_at ? $req->updated_at->format('d M Y') : 'N/A' }}</td>
                                    <td class="see-more">
                                        <a
                                            href="{{ route('admin.req.attachments', ['formToken' => $req->form_token]) }}">
                                            See
                                            more <img src="{{ asset('images/see-icon.png') }}" alt="See"></a>

                                    </td>
                                    <td>
                                        @if ($req->form->applicant)
                                            {{ $req->form->applicant }}
                                        @else
                                            {{ $req->form->last_name }} {{ $req->form->first_name }}
                                        @endif
                                    </td>

                                    </td>
                                    @php
                                        $rawStatus = $req->status ?? 'Pending';
                                        $status = strtolower(trim($rawStatus));
                                        switch ($status) {
                                            case 'done':
                                                $statusClass = 'paid';
                                                $statusLabel = 'Done';
                                                break;
                                            case 'cancel':
                                            case 'cancelled':
                                                $statusClass = 'failed';
                                                $statusLabel = 'Cancelled';
                                                break;
                                            case 'declined':
                                                $statusClass = 'failed';
                                                $statusLabel = 'Declined';
                                                break;
                                            default:
                                                $statusClass = 'pending';
                                                $statusLabel = ucwords($rawStatus);
                                                break;
                                        }
                                    @endphp
                                    <td>
                                        @php
                                            $certificateExists = false;

                                            if (
                                                strtolower($req->form_type) === 'form1-02' ||
                                                strtolower($req->form_type) === 'form1-03'
                                            ) {
                                                try {
                                                    // Check if a certificate record exists for this form token
                                                    $certificateExists = \App\Models\Certificate::where(
                                                        'form_token',
                                                        $req->form_token,
                                                    )->exists();
                                                } catch (\Exception $e) {
                                                    $certificateExists = false;
                                                }
                                            }
                                        @endphp

                                        @if ($certificateExists)
                                            <div class="status-badge done">
                                                <img src="{{ asset('images/Done.png') }}">
                                                <span>Certificate Generated</span>
                                            </div>
                                        @elseif ($req->form->or)
                                            <div class="status-badge progress">
                                                <img src="{{ asset('images/In-prog.png') }}">
                                                <span>Pending Certificate</span>
                                            </div>
                                        @else
                                            <div class="status-badge progress">
                                                <img src="{{ asset('images/In-prog.png') }}">
                                                <span>Waiting for Official Receipt</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if (strtolower($req->form_type) === 'form1-02' || strtolower($req->form_type) === 'form1-03')
                                            @if (!$certificateExists)
                                                <button onclick="openCertificateModal('{{ $req->form_token }}')"
                                                    class="btn btn-primary btn-sm"
                                                    style="background:#28a745;color:#fff;text-decoration:none;padding:6px 12px;border-radius:4px;display:inline-block;font-size:12px;border:none;cursor:pointer;">
                                                    Generate Certificate
                                                </button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <!-- Certificate Validation Modal -->
    <div class="certificate-modal" id="certificateModal" style="display:none;">
        <div class="certificate-modal__content">
            <h3 style="margin-bottom:20px;font-size:20px;font-weight:600;">Certificate Information</h3>
            <p style="margin-bottom:15px;color:#64748b;">Please verify the information before generating the
                certificate.</p>

            <div style="margin-bottom:20px;">
                <div style="margin-bottom:12px;">
                    <label style="display:block;font-weight:600;margin-bottom:4px;font-size:14px;">Last Name:</label>
                    <span id="cert_last_name"
                        style="display:block;padding:8px;background:#f1f5f9;border-radius:6px;"></span>
                </div>
                <div style="margin-bottom:12px;">
                    <label style="display:block;font-weight:600;margin-bottom:4px;font-size:14px;">First Name:</label>
                    <span id="cert_first_name"
                        style="display:block;padding:8px;background:#f1f5f9;border-radius:6px;"></span>
                </div>
                <div style="margin-bottom:12px;">
                    <label style="display:block;font-weight:600;margin-bottom:4px;font-size:14px;">Middle Name:</label>
                    <span id="cert_middle_name"
                        style="display:block;padding:8px;background:#f1f5f9;border-radius:6px;"></span>
                </div>
                <div style="margin-bottom:12px;">
                    <label style="display:block;font-weight:600;margin-bottom:4px;font-size:14px;">Certificate
                        Class:</label>
                    <span id="cert_type" style="display:block;padding:8px;background:#f1f5f9;border-radius:6px;"></span>
                </div>
                <div style="margin-bottom:12px;">
                    <label style="display:block;font-weight:600;margin-bottom:4px;font-size:14px;">Issuance
                        Date:</label>
                    <span id="cert_issuance_date"
                        style="display:block;padding:8px;background:#f1f5f9;border-radius:6px;"></span>
                </div>
                <div style="margin-bottom:12px;">
                    <label style="display:block;font-weight:600;margin-bottom:4px;font-size:14px;">Expiry Date:</label>
                    <span id="cert_expiry_date"
                        style="display:block;padding:8px;background:#f1f5f9;border-radius:6px;"></span>
                </div>
            </div>

            <div style="display:flex;gap:10px;justify-content:flex-end;">
                <button id="closeCertModal"
                    style="border:none;border-radius:8px;padding:10px 18px;font-weight:600;cursor:pointer;background:#e5e7eb;color:#374151;">
                    Cancel
                </button>
                <button id="previewCertificate"
                    style="border:none;border-radius:8px;padding:10px 18px;font-weight:600;cursor:pointer;background:#3b82f6;color:#fff;">
                    Preview Certificate
                </button>
                <button id="generateCertificate"
                    style="border:none;border-radius:8px;padding:10px 18px;font-weight:600;cursor:pointer;background:#28a745;color:#fff;">
                    Generate Certificate
                </button>
            </div>
        </div>
    </div>

    <style>
        .certificate-modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .certificate-modal__content {
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            width: 500px;
            max-width: 90%;
        }

        .certificate-modal button:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px -15px rgba(15, 23, 42, 0.8);
        }
    </style>

    <script>
        let currentCertificateToken = null;

        function openCertificateModal(token) {
            currentCertificateToken = token;

            // Fetch form data
            fetch(`/admin/get-certificate-data/${token}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert('Error: ' + data.error);
                        return;
                    }

                    document.getElementById('cert_last_name').textContent = data.last_name || '—';
                    document.getElementById('cert_first_name').textContent = data.first_name || '—';
                    document.getElementById('cert_middle_name').textContent = data.middle_name || '—';
                    document.getElementById('cert_type').textContent = data.certificate_type || '—';
                    document.getElementById('cert_issuance_date').textContent = data.issuance_date || '—';
                    document.getElementById('cert_expiry_date').textContent = data.expiry_date || '—';

                    document.getElementById('certificateModal').style.display = 'flex';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to load form data');
                });
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('closeCertModal').addEventListener('click', () => {
                document.getElementById('certificateModal').style.display = 'none';
                currentCertificateToken = null;
            });

            document.getElementById('previewCertificate').addEventListener('click', () => {
                if (currentCertificateToken) {
                    window.open(`/admin/generate-certificate?token=${currentCertificateToken}&preview=1`,
                        '_blank');
                }
            });

            document.getElementById('generateCertificate').addEventListener('click', () => {
                if (currentCertificateToken) {
                    window.location.href =
                        `/admin/generate-certificate?token=${currentCertificateToken}&preview=0`;
                    // Close modal and reload page after download starts
                    setTimeout(() => {
                        document.getElementById('certificateModal').style.display = 'none';
                        currentCertificateToken = null;
                        // Reload page to update status
                        location.reload();
                    }, 1000);
                }
            });
        });
    </script>
</x-admin-layout>
