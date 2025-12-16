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

            /* Flex layout for button content */
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
                /* spinning effect */
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


        <h1>Admision Slip</h1>

        <div class="card full-page">
            <!-- Latest Request Section -->
            <section class="half-section">
                <div class="card-header">
                    <h2>Admision Slip Requests</h2>
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
                                        {{ $req->form->last_name }} {{ $req->form->first_name }}
                                    </td>

                                    <td>
                                        @if ($req->form->or)
                                            @if ($req->form->admission_slip)
                                                <div class="status-badge done">
                                                    <img src="{{ asset('images/Done.png') }}">
                                                    <span>For Release Admission Slip</span>
                                                </div>
                                            @else
                                                <div class="status-badge progress">
                                                    <img src="{{ asset('images/In-prog.png') }}">
                                                    <span>Pending Admission Slip</span>
                                                </div>
                                            @endif
                                        @else
                                            <div class="status-badge progress">
                                                <img src="{{ asset('images/In-prog.png') }}">
                                                <span>Waiting for Official Receipt</span>
                                            </div>
                                        @endif
                                    </td>

                                    <td class="action-cell">
                                        @if ($req->form->or)
                                            @if ($req->form->admission_slip)
                                                <span>-</span>
                                            @else
                                                <button id="orBtn"class="receipt-btn open-receipt-btn"
                                                    data-reference="{{ $req->payment_reference }}"
                                                    data-applicant="{{ $req->form->last_name }} {{ $req->form->first_name }}"
                                                    data-form="{{ ucfirst($req->form_type ?? 'N/A') }}"
                                                    data-formtoken="{{ $req->form_token }}"
                                                    data-address="{{ $req->form->province }} {{ $req->form->city }} {{ $req->form->barangay }}">
                                                    Create Admission Slip
                                                </button>
                                            @endif
                                        @else
                                            <span>-</span>
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
                <h3>Admission Slip</h3>
                <p id="receiptModalSubtitle">Select a request to populate the details.</p>
            </div>
            <form action="{{ route('admin.admission-slip.submit') }}"id="receiptForm" class="receipt-form"
                method="POST">
                @csrf
                <input type="hidden" name="form_token">
                <input type="hidden" name="form_type">
                <div class="form-grid">

                    <label>
                        <span>Admit Name</span>
                        <input type="text" name="admit_name" id="admit_name" placeholder="Enter full name">
                        <small class="error-message" id="error-admit-name"></small>
                    </label>

                    <label>
                        <span>Mailing Address</span>
                        <input type="text" name="mailing_address" id="mailing_address"
                            placeholder="Enter mailing address">
                        <small class="error-message" id="error-mailing-address"></small>
                    </label>

                    <label>
                        <span>Place of Exam</span>
                        <input type="text" name="place_of_exam" id="place_of_exam" placeholder="Enter exam place">
                        <small class="error-message" id="error-place-of-exam"></small>
                    </label>

                    <label>
                        <span>Date of Exam / <span><a href="https://ntc.gov.ph/examination-schedule-2025/"
                                    target="_blank">(See Schedule)</a></span></span>
                        <input type="date" name="date_of_exam" id="date_of_exam" min="{{ date('Y-m-d') }}">
                        <small class="error-message" id="error-date-of-exam"></small>
                    </label>

                    <label>
                        <span>Time of Exam</span>
                        <input type="time" name="time_of_exam" id="time_of_exam">
                        <small class="error-message" id="error-time-of-exam"></small>
                    </label>

                    <label>
                        <span>Authorized Officer</span>
                        <input type="text" name="authorized_officer" id="authorized_officer"
                            placeholder="Enter name">
                        <small class="error-message" id="error-authorized-officer"></small>
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

            const openReceiptModal = (reference = "", applicant = "", form = "", address, placeOfExam) => {
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
                const mailingAddressInput = document.getElementById('mailing_address');
                mailingAddressInput.value = address;

                const admitNameInput = document.getElementById('admit_name');
                admitNameInput.value = applicant;

                const placeOfExamInput = document.getElementById('place_of_exam');
                placeOfExamInput.value = placeOfExam;


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
                    const address = button.dataset.address;
                    const placeOfExam = "NTC CAR Baguio City"
                    openReceiptModal(reference, applicant, form, address, placeOfExam);
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
                console.log(formToken, formType);
            });

            const form = document.getElementById('receiptForm');
            console.log(form);
            const saveBtn = document.getElementById('saveBtn');
            saveBtn.addEventListener('click', function(e) {
                let valid = true;
                e.preventDefault();
                // Clear previous errors
                document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

                const admitName = document.getElementById('admit_name');
                const mailingAddress = document.getElementById('mailing_address');
                const placeOfExam = document.getElementById('place_of_exam');
                const dateOfExam = document.getElementById('date_of_exam');
                const timeOfExam = document.getElementById('time_of_exam');
                const authorizedOfficer = document.getElementById('authorized_officer');

                // Letters only regex
                const lettersOnly = /^[A-Za-zñÑ\s]+$/;

                const lettersNumbers = /^[A-Za-z0-9ñÑ\s().]+$/;
                // Validate Admin/Admit Name
                if (!admitName.value.trim()) {
                    document.getElementById('error-admit-name').textContent = "Admit Name is required.";
                    valid = false;
                } else if (!lettersOnly.test(admitName.value.trim())) {
                    document.getElementById('error-admit-name').textContent =
                        "Admit Name must contain letters only.";
                    valid = false;
                }

                // Validate Mailing Address
                if (!mailingAddress.value.trim()) {
                    document.getElementById('error-mailing-address').textContent =
                        "Mailing Address is required.";
                    valid = false;
                } else if (!lettersNumbers.test(mailingAddress.value.trim())) {
                    document.getElementById('error-mailing-address').textContent =
                        "Mailing Address can contain letters and numbers only.";
                    valid = false;
                }


                // Validate Place of Exam
                if (!placeOfExam.value.trim()) {
                    document.getElementById('error-place-of-exam').textContent =
                        "Place of Exam is required.";
                    valid = false;
                } else if (!lettersNumbers.test(placeOfExam.value.trim())) {
                    document.getElementById('error-place-of-exam').textContent =
                        "Place of Exam can contain letters and numbers only.";
                    valid = false;
                }

                // Validate Date
                if (!dateOfExam.value) {
                    document.getElementById('error-date-of-exam').textContent = "Date of Exam is required.";
                    valid = false;
                }

                // Validate Time
                if (!timeOfExam.value) {
                    document.getElementById('error-time-of-exam').textContent = "Time of Exam is required.";
                    valid = false;
                }

                // Validate Authorized Officer
                if (!authorizedOfficer.value.trim()) {
                    document.getElementById('error-authorized-officer').textContent =
                        "Authorized Officer is required.";
                    valid = false;
                } else if (!lettersOnly.test(authorizedOfficer.value.trim())) {
                    document.getElementById('error-authorized-officer').textContent =
                        "Authorized Officer must contain letters only.";
                    valid = false;
                }

                // If all valid, submit form
                if (valid) {
                    document.querySelector('input[name="form_token"]').value = formToken;
                    document.querySelector('input[name="form_type"]').value = formType;

                    saveBtn.disabled = true;
                    saveBtn.querySelector('.btn-text').classList.add('hidden');
                    saveBtn.querySelector('.spinner').classList.remove('hidden');
                    form.submit();
                }
            })
        });
    </script>
</x-admin-layout>
