<x-admin-layout :title="'Request Management'">

    <x-slot:head>
        @vite(['resources/css/adminside/req-management.css', 'resources/js/adminside/req-management.js'])
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .action-placeholder {
                font-size: 0.9rem;
                color: #65686d;
            }

            .action-cell {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

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

            .status-badge a {
                color: inherit;
                text-decoration: underline;
            }

            .confirm-modal {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 999;
            }
            .confirm-modal h3 {
                margin-bottom: 15px;
            }
            .confirm-modal p {
                margin-bottom: 15px;
            }

            .confirm-modal__content {
                background: white;
                padding: 20px 25px;
                border-radius: 10px;
                width: 420px;
                text-align: center;
            }

            .btn-secondary,
            .btn-primary {
                border: none;
                border-radius: 10px;
                padding: 10px 18px;
                font-weight: 600;
                cursor: pointer;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .btn-secondary {
                background: #e5e7eb;
                color: #374151;
            }

            .btn-primary {
                background: #213c78;
                color: #fff;
            }

            .btn-secondary:hover,
            .btn-primary:hover {
                transform: translateY(-1px);
                box-shadow: 0 8px 20px -15px rgba(15, 23, 42, 0.8);
            }
        </style>
    </x-slot:head>


    <!-- Main Content -->
    <div class="main">
        <div id="flash-message"
            style="
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 12px 20px;
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.5s;
    pointer-events: none;
">
        </div>


        <h1>Request Management</h1>

        <div class="card full-page">
            <!-- Latest Request Section -->
            <section class="half-section">
                <div class="card-header">
                    <h2>Latest Request</h2>
                    <div class="actions">
                        <div class="search-bar">
                            <input type="text" id="latestSearch" placeholder="Search">
                            <img src="{{ asset('images/search-icon.png') }}" alt="Search">
                        </div>
                        <div class="filter-bar">
                            <img src="{{ asset('images/filter-icon.png') }}" alt="Filter" id="latestFilterIcon">
                            <div class="filter-dropdown" id="latestFilterDropdown">
                                <h4>Filter by:</h4>

                                <label for="latestDateFilter">Date Range</label>
                                <select id="latestDateFilter">
                                    <option value="all">All Dates</option>
                                    <option value="week">This Week</option>
                                    <option value="month">This Month</option>
                                    <option value="3months">Last 3 Months</option>
                                    <option value="6months">Last 6 Months</option>
                                    <option value="year">This Year</option>
                                </select>

                                <label for="latestFormFilter">Form Type</label>
                                <div class="form-list">
                                    <select id="latestFormFilter" size="5">
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

                                <button id="applyLatestFilter">Apply Filter</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-container">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Reference Number</th>
                                <th>Request Type</th>
                                <th>Request Date</th>
                                <th>Attachment</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Remarks</th>
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

                                    <td class="see-more">
                                        <a
                                            href="{{ route('admin.req.attachments', ['formToken' => $req->form_token]) }}">
                                            See
                                            more <img src="{{ asset('images/see-icon.png') }}" alt="See"></a>

                                    </td>

                                    <td>
                                        {{ $req->form->last_name }} {{ $req->form->first_name }}
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
                                            default:
                                                $statusClass = 'pending';
                                                $statusLabel = ucwords($rawStatus);
                                                break;
                                        }
                                    @endphp
                                    @php
                                        $managedStatuses = ['pending', 'processing', 'declined'];
                                        $isManagedStatus = in_array($status, $managedStatuses);
                                    @endphp
                                    <td class="status-cell {{ $statusClass }}">
                                        @if ($isManagedStatus)
                                            <select class="status-select" data-request-id="{{ $req->_id }}"
                                                data-current-status="{{ $status }}">
                                                <option value="pending" @selected($status === 'pending')>Pending
                                                </option>
                                                <option value="processing" @selected($status === 'processing')>Processing
                                                </option>
                                                <option value="declined" @selected($status === 'declined')>Decline
                                                </option>
                                            </select>

                                            @if ($req->payment_status == 'paid')
                                                <div class="status-badge done">
                                                    <img src="{{ asset('images/Done.png') }}">
                                                    <span><a
                                                            href="{{ route('admin.req.attachments', ['formToken' => $req->form_token]) }}">Proof
                                                            of Payment Received!</a></span>
                                                </div>
                                            @else
                                                @if ($req->status != 'pending')
                                                    <div class="status-badge progress">
                                                        <img src="{{ asset('images/In-prog.png') }}">
                                                        <span>Waiting for Payment</span>
                                                    </div>
                                                @endif
                                            @endif
                                            <x-admin.req-management-status :req="$req" />
                                        @else
                                            <span class="status-label">{{ $statusLabel }}</span>
                                        @endif
                                    </td>
                                    <td>

                                        <form action="{{ route('admin.remarks.save', ['formId' => $req->_id]) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="1">
                                            <!-- ID of the row/user -->
                                            <input type="text" name="remarks" placeholder="Enter remarks">
                                            <button type="submit">Send</button>
                                        </form>
                                        <span class="action-placeholder">{{ $req->remarks }}</span>
                                    </td>
                                    <td class="action-cell">
                                        @if ($req->form_type === 'form1-01')
                                            @if ($req->form->admission_slip && $req->form->or)
                                                <button class="badge-btn progress"
                                                    onclick="openConfirmApproveModal('{{ $req->_id }}')"
                                                    title="Approve Request">
                                                    Approve
                                                </button>
                                            @else
                                                <span class="muted-text">—</span>
                                            @endif
                                        @elseif($req->form_type === 'form1-02' || $req->form_type === 'form1-03')
                                            @php
                                                // Check if certificate has been generated (exists in attachments folder)
                                                $certificateExists = false;
                                                try {
                                                    $files = Storage::disk('local')->files("forms/{$req->form_token}");
                                                    foreach ($files as $file) {
                                                        if (Str::startsWith(basename($file), 'certificate_')) {
                                                            $certificateExists = true;
                                                            break;
                                                        }
                                                    }
                                                } catch (\Exception $e) {
                                                    $certificateExists = false;
                                                }
                                            @endphp
                                            @if ($req->form->or && $certificateExists)
                                                <button class="badge-btn progress"
                                                    onclick="openConfirmApproveModal('{{ $req->_id }}')"
                                                    title="Approve Request">
                                                    Approve
                                                </button>
                                            @else
                                                <span class="muted-text">—</span>
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
    <div class="confirm-modal" id="confirmApproveModal" style="display:none;">
    <div class="confirm-modal__content">
        <h3>Approve Request</h3>
        <p>Type <strong>"Confirm"</strong> to appove request</p>

        <input type="text" id="confirmInput" placeholder="Type Confirm" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; justify-content: center;">

        <p id="confirmWarning" style="color: red; font-size: 0.9rem; display:none; margin-top:8px;">
            Incorrect input. Please type "Confirm".
        </p>

        <div class="confirm-actions" style="margin-top: 15px;">
            <button id="confirmApproveCancel" class="btn-secondary">Cancel</button>

            <button id="confirmApproveYes" class="btn-primary" disabled>Approve</button>
        </div>
    </div>
</div>
    <script>
        let approveId = null;

function openConfirmApproveModal(id) {
    approveId = id;
    document.getElementById("confirmApproveModal").style.display = "flex";

    // Reset input and button state
    document.getElementById("confirmInput").value = "";
    document.getElementById("confirmWarning").style.display = "none";
    document.getElementById("confirmApproveYes").disabled = true;
}

document.addEventListener('DOMContentLoaded', () => {

    const confirmInput = document.getElementById("confirmInput");
    const confirmButton = document.getElementById("confirmApproveYes");
    const warning = document.getElementById("confirmWarning");

    // Live validation
    confirmInput.addEventListener("input", () => {
        if (confirmInput.value.trim() === "Confirm") {
            confirmButton.disabled = false;
            warning.style.display = "none";
        } else {
            confirmButton.disabled = true;

            // Only show warning when input is NOT empty
            warning.style.display = confirmInput.value.trim() !== "" ? "block" : "none";
        }
    });

    // Cancel Modal
    document.getElementById("confirmApproveCancel").addEventListener("click", () => {
        document.getElementById("confirmApproveModal").style.display = "none";
        approveId = null;
    });

    // Confirm Approve
    confirmButton.addEventListener("click", () => {
        document.getElementById("confirmApproveModal").style.display = "none";
        approveRequest(approveId);
    });
});
    </script>
</x-admin-layout>
