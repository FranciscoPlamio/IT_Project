<x-admin-layout :title="'Request Management'">

    <x-slot:head>
        @vite(['resources/css/adminside/req-management.css', 'resources/js/adminside/req-management.js'])
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .receipt-btn {
                border: none;
                border-radius: 999px;
                padding: 10px 18px;
                font-weight: 600;
                font-size: 0.95rem;
                background: #213c78;
                color: #fff;
                cursor: pointer;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
                align-self: flex-start;
            }

            .receipt-btn:hover {
                transform: translateY(-1px);
                box-shadow: 0 10px 20px -15px rgba(33, 60, 120, 0.9);
            }

            .receipt-modal {
                position: fixed;
                inset: 0;
                background: rgba(15, 23, 42, 0.5);
                display: none;
                align-items: center;
                justify-content: center;
                padding: 24px;
                z-index: 1000;
            }

            .receipt-modal__content {
                background: #fff;
                border-radius: 18px;
                max-width: 520px;
                width: 100%;
                padding: 32px;
                position: relative;
                box-shadow: 0 25px 60px -30px rgba(15, 23, 42, 0.6);
            }

            .receipt-modal__close {
                position: absolute;
                right: 12px;
                top: 12px;
                background: none;
                border: none;
                font-size: 1.5rem;
                cursor: pointer;
                color: #6b7280;
            }

            .receipt-modal__header h3 {
                margin-bottom: 4px;
            }

            .receipt-modal__header p {
                color: #6b7280;
                font-size: 0.95rem;
            }

            .receipt-form {
                margin-top: 20px;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .receipt-form .form-grid {
                display: grid;
                gap: 18px;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }

            .receipt-form label {
                display: flex;
                flex-direction: column;
                gap: 8px;
                font-size: 0.9rem;
                color: #4b5563;
                font-weight: 600;
            }

            .receipt-form input {
                border: 1px solid #d1d5db;
                border-radius: 10px;
                padding: 10px 12px;
                font-size: 0.95rem;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
            }

            .receipt-form input:focus {
                outline: none;
                border-color: #213c78;
                box-shadow: 0 0 0 3px rgba(33, 60, 120, 0.15);
            }

            .receipt-form__actions {
                display: flex;
                justify-content: flex-end;
                gap: 12px;
            }

            .status-chip {
                display: inline-block;
                padding: 6px 14px;
                border-radius: 999px;
                background: #ecfdf5;
                color: #065f46;
                font-size: 0.9rem;
                font-weight: 600;
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

            .error-message {
                color: red;
                font-size: 13px;
                margin-top: 2px;
                display: block;
            }

            /* Flex for button content */
            .btn-primary {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                /* space between text and spinner */
                position: relative;
            }

            /* Spinner styles */
            .spinner {
                width: 16px;
                height: 16px;
                border: 2px solid #fff;
                /* main color */
                border-top: 2px solid transparent;
                /* makes the spinning effect */
                border-radius: 50%;
                display: inline-block;
                animation: spin 0.8s linear infinite;
            }

            .hidden {
                display: none;
            }

            /* Spinner animation */
            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
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


        <h1>Declaration </h1>

        <div class="card full-page">
            <!-- Latest Request Section -->
            <section class="half-section">
                <div class="card-header">
                    <h2>Declaration Request</h2>
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
                                        @if ($req->form->applicant)
                                            {{ $req->form->applicant }}
                                        @else
                                            {{ $req->form->last_name }} {{ $req->form->first_name }}
                                        @endif

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
                                    <td>
                                        @if ($req->form->or)
                                            <div class="status-badge done">
                                                <img src="{{ asset('images/Done.png') }}">
                                                <span>For Release Official Receipt</span>
                                            </div>
                                        @else
                                            <div class="status-badge progress">
                                                <img src="{{ asset('images/In-prog.png') }}">
                                                <span>Pending Official Receipt</span>
                                            </div>
                                        @endif
                                    </td>

                                    <td class="action-cell">
                                        @if ($req->form->or)
                                            <span>-</span>
                                        @else
                                            <button id="orBtn"class="receipt-btn open-receipt-btn"
                                                data-reference="{{ $req->payment_reference }}"
                                                data-applicant="{{ $req->form->last_name }} {{ $req->form->first_name }}"
                                                data-form="{{ ucfirst($req->form_type ?? 'N/A') }}"
                                                data-formtoken="{{ $req->form_token }}"
                                                data-amount="{{ $req->payment_amount }}">
                                                Create Official Receipt
                                            </button>
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

    <div class="receipt-modal" id="receiptModal">
        <div class="receipt-modal__content">
            <button class="receipt-modal__close" id="receiptModalClose" aria-label="Close modal">&times;</button>
            <div class="receipt-modal__header">
                <h3>Official Receipt</h3>
                <p id="receiptModalSubtitle">Select a request to populate the details.</p>
            </div>
            <form action="{{ route('admin.declaration.submit') }}"id="receiptForm" class="receipt-form" method="POST">
                @csrf
                <input type="hidden" name="form_token">
                <input type="hidden" name="form_type">
                <div class="form-grid">

                    <label>
                        <span>OR No.</span>
                        <input type="text" name="or_no" id="or_no"placeholder="Enter official receipt number">
                        <small class="error-message" id="error-or-no"></small>
                    </label>

                    <label>
                        <span>OR Amount</span>
                        <input type="text" name="or_amount" id="or_amount" disabled>
                        <small class="error-message" id="error-or-amount"></small>
                    </label>
                    <label>
                        <span>Collecting Officer</span>
                        <input type="text" name="collecting_officer" id="collecting_officer"
                            placeholder="Enter name">
                        <small class="error-message" id="error-officer"></small>
                    </label>
                </div>
                <div class="receipt-form__actions">
                    <button type="button" class="btn-secondary" id="receiptCancelBtn">Cancel</button>

                    <button type="submit" class="btn-primary" id="saveBtn">
                        <span class="btn-text">Save Details</span>
                        <span class="spinner hidden"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const logoutLink = document.getElementById("logout-link");
            const logoutModal = document.getElementById("logout-modal");
            const confirmLogout = document.getElementById("confirm-logout");
            const cancelLogout = document.getElementById("cancel-logout");
            const logoutForm = document.getElementById("logout-form");

            if (logoutLink && logoutModal) {
                logoutLink.addEventListener("click", (event) => {
                    event.preventDefault();
                    logoutModal.style.display = "flex";
                });
            }

            if (cancelLogout && logoutModal) {
                cancelLogout.addEventListener("click", () => {
                    logoutModal.style.display = "none";
                });
            }

            if (confirmLogout && logoutForm) {
                confirmLogout.addEventListener("click", (event) => {
                    event.preventDefault();
                    logoutForm.submit();
                });
            }

            if (logoutModal) {
                logoutModal.addEventListener("click", (event) => {
                    if (event.target === logoutModal) {
                        logoutModal.style.display = "none";
                    }
                });
            }

            // Official receipt modal logic
            const receiptModal = document.getElementById("receiptModal");
            const receiptClose = document.getElementById("receiptModalClose");
            const receiptSubtitle = document.getElementById("receiptModalSubtitle");
            const receiptCancelBtn = document.getElementById("receiptCancelBtn");
            const receiptForm = document.getElementById("receiptForm");

            const openReceiptModal = (reference = "", applicant = "", form = "", or_amount) => {
                if (!receiptModal) return;
                if (receiptSubtitle) {
                    const details = [reference, applicant, form]
                        .filter(Boolean)
                        .join(" • ");
                    receiptSubtitle.textContent = details || "Official receipt entry";

                }

                if (receiptForm) {
                    receiptForm.reset();
                }


                const orAmountInput = document.getElementById('or_amount');
                orAmountInput.value = parseFloat(or_amount).toFixed(2);


                receiptModal.style.display = "flex";
                receiptModal.setAttribute("aria-hidden", "false");
            };

            const closeReceiptModal = () => {
                if (!receiptModal) return;
                receiptModal.style.display = "none";
                receiptModal.setAttribute("aria-hidden", "true");
            };

            document.querySelectorAll(".open-receipt-btn").forEach((button) => {
                button.addEventListener("click", () => {
                    const reference = button.dataset.reference || "";
                    const applicant = button.dataset.applicant || "";
                    const form = button.dataset.form || "";
                    const or_amount = button.dataset.amount;
                    openReceiptModal(reference, applicant, form, or_amount);
                });
            });

            [receiptClose, receiptCancelBtn].forEach((el) => {
                if (!el) return;
                el.addEventListener("click", (event) => {
                    event.preventDefault();
                    closeReceiptModal();
                });
            });

            if (receiptModal) {
                receiptModal.addEventListener("click", (event) => {
                    if (event.target === receiptModal) {
                        closeReceiptModal();
                    }
                });
            }

            document.addEventListener("keydown", (event) => {
                if (event.key === "Escape") {
                    closeReceiptModal();
                }
            });

            if (receiptForm) {
                receiptForm.addEventListener("submit", (event) => {
                    event.preventDefault();
                    // Placeholder for persistence logic
                    closeReceiptModal();
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('orBtn');
            let formToken;
            let formType;
            btn.addEventListener('click', function() {

                formToken = this.dataset.formtoken;
                formType = this.dataset.form;

            });

            const form = document.getElementById('receiptForm');

            const saveBtn = document.getElementById('saveBtn');
            saveBtn.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.error-message').forEach(el => el.textContent = "");

                let valid = true;

                const orNo = document.getElementById('or_no');
                const orAmount = document.getElementById('or_amount');
                const officer = document.getElementById('collecting_officer');

                // Validate OR No
                if (!/^[A-Za-z0-9]+$/.test(orNo.value.trim())) {
                    document.getElementById('error-or-no').textContent =
                        "OR Number must contain only letters and numbers.";
                    valid = false;
                }

                // Validate OR Amount (numbers + optional decimal)
                if (!/^[0-9]+(\.[0-9]+)?$/.test(orAmount.value.trim())) {
                    document.getElementById('error-or-amount').textContent = "OR Amount must be numeric.";
                    valid = false;
                }

                // Validate Collecting Officer (letters + spaces)
                if (!/^[A-Za-z\s]+$/.test(officer.value.trim())) {
                    document.getElementById('error-officer').textContent =
                        "Name must contain letters only.";
                    valid = false;
                }

                if (!valid) {
                    // If invalid, hide spinner (if it was shown)
                    saveBtn.querySelector('.spinner').classList.add('hidden');
                    saveBtn.querySelector('.btn-text').classList.remove('hidden');
                    return; // stop here
                }

                // All valid → show spinner and submit form
                saveBtn.disabled = true;

                // Enable OR Amount input if disabled
                orAmount.disabled = false;

                // Submit the form
                const form = saveBtn.closest('form');
                if (form) {
                    document.querySelector('input[name="form_token"]').value = formToken;
                    document.querySelector('input[name="form_type"]').value = formType;
                    document.getElementById('or_amount').disabled = false;

                    saveBtn.querySelector('.btn-text').classList.add('hidden');
                    saveBtn.querySelector('.spinner').classList.remove('hidden');
                    form.submit();
                }

            })
        });
    </script>
</x-admin-layout>
