<x-admin-layout :title="'Declaration & Compliance'">
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
        <h1>Declaration</h1>

        <section class="declaration-table-card">
            <div class="card-header">
                <div>
                    <h2>Declaration Tracking</h2>
                    <p>Monitor recent submissions that need official receipt validation.</p>
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
                                    @if ($req->form->or)
                                        <span class="status-chip"> For Release Official Receipt</span>
                                    @else
                                        <span class="status-chip"> Pending Official Receipt</span>
                                    @endif
                                </td>
                                <td class="action-cell">
                                    @if ($req->form->or)
                                    @else
                                        <button id="orBtn"class="receipt-btn open-receipt-btn"
                                            data-reference="{{ $req->payment_reference }}"
                                            data-applicant="{{ $req->form->last_name }} {{ $req->form->first_name }}"
                                            data-form="{{ ucfirst($req->form_type ?? 'N/A') }}"
                                            data-formtoken="{{ $req->form_token }}">
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
    </main>

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
                        <input type="text" name="or_amount" id="or_amount"placeholder="₱0.00">
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

                if (valid) {
                    document.querySelector('input[name="form_token"]').value = formToken;
                    document.querySelector('input[name="form_type"]').value = formType;
                    form.submit();
                }
            })
        });
    </script>
</x-admin-layout>
