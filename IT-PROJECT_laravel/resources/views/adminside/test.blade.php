<x-admin-layout :title="'Admision Slip Requests'">
    <x-slot:head>
        @vite(['resources/css/adminside/dashboard.css', 'resources/css/adminside/declaration.css', 'resources/js/adminside/declaration.js'])
        <style>
            .error-message {
                color: red;
                font-size: 13px;
                margin-top: 2px;
                display: block;
            }
        </style>
    </x-slot:head>

    <main class="main declaration-main">
        <h1>Admision Slip</h1>

        <section class="declaration-table-card">
            <div class="card-header">
                <div>
                    <h2>Admision Slip Requests</h2>
                </div>
                <div class="table-meta">
                    <span>Total Items: {{ count($latestRequests) }}</span>
                </div>
            </div>

            <div class="table-container">
                <table class="styled-table declaration-table">
                    <thead>
                        <tr>
                            <th>Reference Number</th>
                            <th>Applicant</th>
                            <th>Form Type</th>
                            <th>Date Submitted</th>
                            <th>Attachment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestRequests as $req)
                            <tr>
                                <td>{{ $req->payment_reference }}</td>
                                <td>
                                    {{ $req->form->last_name }} {{ $req->form->first_name }}
                                </td>
                                <td>{{ ucfirst($req->form_type ?? 'N/A') }}</td>
                                <td>{{ $req->created_at ? $req->created_at->format('d M Y') : 'N/A' }}</td>
                                <td class="see-more">
                                    <a href="{{ route('admin.req.attachments', ['formToken' => $req->form_token]) }}">
                                        See
                                        more </a>
                                </td>
                                <td>
                                    @if ($req->form->admission_slip)
                                        <span class="status-chip"> For Release Admission Slip</span>
                                    @else
                                        <span class="status-chip"> Pending Admission Slip</span>
                                    @endif
                                </td>
                                <td class="action-cell">
                                    @if ($req->form->admission_slip)
                                    @else
                                        <button id="orBtn"class="receipt-btn open-receipt-btn"
                                            data-reference="{{ $req->payment_reference }}"
                                            data-applicant="{{ $req->form->last_name }} {{ $req->form->first_name }}"
                                            data-form="{{ ucfirst($req->form_type ?? 'N/A') }}"
                                            data-formtoken="{{ $req->form_token }}">
                                            Create Admission Slip
                                        </button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </main>

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
                    <button type="submit" class="btn-primary" id="saveBtn">Save Details</button>
                </div>
            </form>
        </div>
    </div>

    <script>
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
                const lettersOnly = /^[A-Za-z\s]+$/;

                // Letters & numbers regex
                const lettersNumbers = /^[A-Za-z0-9\s]+$/;

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
                    form.submit();
                }
            })
        });
    </script>
</x-admin-layout>
