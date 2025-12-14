<x-layout :title="'Transaction Details'">
    <x-slot:head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </x-slot:head>
    <div class="form1-01-container">
        <div class="form1-01-header">TRANSACTION DETAILS</div>
        <div class="transaction-table-container">
            @if (!$transactions)
                <p>No Transactions.</p>
            @else
                <!-- Transaction Table -->
                <table class="transaction-table">
                    <thead>
                        <tr class="transaction-table-header">
                            <th class="ref-number-header">Reference Number</th>
                            <th class="details-header">Details</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="transaction-row">
                            <td class="ref-number-cell">
                                <span class="reference-number">{{ $transactions->payment_reference }}</span>
                            </td>
                            <td class="details-cell">
                                <div class="transaction-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Status:</span>
                                        @if ($transactions->status == 'processing')
                                            <span class="status-badge pending">{{ $transactions->status }}</span>
                                        @elseif ($transactions->status == 'declined')
                                            <span class="status-badge pending">Declined</span>
                                        @elseif ($transactions->status == 'pending')
                                            <span class="status-badge pending">Pending Application</span>
                                        @elseif ($transactions->payment_status == 'paid' && $transactions->status == 'done')
                                            <span
                                                class="status-badge bg-green-500 text-white">{{ $transactions->payment_status }}</span>
                                        @endif
                                    </div>
                                    <!-- hidden since its not dynamic yet (pj)-->
                                    {{-- <div class="detail-row">
                                        <span class="detail-label">Purpose:</span>
                                        <span class="purpose-text">MULTI-PURPOSE CLEARANCE PROCESSING</span>
                                    </div> --}}
                                    <div class="detail-row">
                                        <span class="detail-label">Transaction Date:</span>
                                        <span
                                            class="date-text">{{ $transactions->created_at->format('F d, Y H:i:s') }}</span>
                                    </div>

                                    <div class="detail-row">
                                        <span class="detail-label">Payment Due Date:</span>
                                        <span class="date-text">{{ date('F d, Y H:i:s', strtotime('+3 days')) }}</span>
                                    </div>

                                </div>
                            </td>

                            <td>
                                @if ($transactions->remarks)
                                    <div class="detail-row">
                                        <span class="detail-label">{{ $transactions->remarks }}</span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                @if ($transactions->status === 'declined')
                    <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-lg overflow-hidden">
                        <!-- Header -->
                        <div class="bg-blue-900 text-white text-center px-6 py-8">
                            <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="mx-auto mb-4 max-w-[120px]">
                            <h1 class="text-xl font-semibold">National Telecommunication Commission</h1>
                            <p class="text-gray-200 text-sm mt-1">Cordillera Administrative Region, Baguio City
                                Philippines</p>
                        </div>

                        <!-- Content -->
                        <div class="px-6 py-8">
                            <h2 class="text-red-800 text-lg font-semibold mb-4">Your Form Has Been Declined</h2>

                            <p>Hello <strong>{{ $form->last_name }} {{ $form->first_name }}</strong>,</p>

                            <p class="mt-4">
                                We regret to inform you that your application
                                <strong>{{ $transactions->payment_reference }}</strong> has been
                                <span class="text-red-700 font-bold">declined</span>.
                            </p>

                            <p class="mt-4">Please review the remarks below for the reason:</p>

                            <!-- Remarks Box -->
                            <div class="mt-4 bg-red-100 border border-red-300 p-4 rounded-lg">
                                <h3 class="font-semibold text-red-800 mb-2">Remarks / Reason for Decline</h3>
                                <p class="text-red-700">
                                    {{ $transactions->remarks ?? 'No remarks provided.' }}
                                </p>
                            </div>

                            <!-- Resubmit Button -->
                            <div class="mt-6 text-center">
                                <a href="{{ route('services') }}"
                                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg transition">
                                    Apply Again
                                </a>
                            </div>

                            <p class="mt-6 text-sm">
                                If you believe this was an error or need clarification, contact us at
                                <strong>car.admin@ntc.gov.ph</strong>.
                            </p>
                        </div>

                        <!-- Footer -->
                        <div class="bg-gray-50 text-center text-gray-500 text-xs px-6 py-4">
                            <p>This is an automated message from the NTC Forms System.</p>
                            <p>© {{ date('Y') }} National Telecommunication Commission - CAR</p>
                        </div>
                    </div>
                @endif

                <!-- Payment Method Section -->
                <div class="payment-method-section">
                    @if (optional($transactions)->payment_method === 'gcash' && $transactions->status !== 'declined')
                        <!-- Steps Indicator (GCash) -->
                        <div class="steps steps-gcash">
                            <ol id="gcash-steps">
                                @if (strtolower($transactions->payment_status ?? 'pending') === 'paid' && $transactions->status === 'done')
                                    <li data-step="1" class="step-item completed">
                                        <span class="step-label">Validation Review</span>
                                    </li>
                                    <li data-step="2" class="step-item completed">
                                        <span class="step-label">Payment Confirmed</span>
                                        <span class="step-sub">GCash payment received.</span>
                                    </li>
                                    <li data-step="3" class="step-item completed">
                                        <span class="step-label">Application Approved</span>
                                        <span class="step-sub">Ready for download.</span>
                                    </li>
                                @elseif (isset($transactions->payment_amount) &&
                                        $transactions->payment_amount > 0 &&
                                        $transactions->status === 'processing' &&
                                        $transactions->payment_status === 'paid')
                                    <li data-step="1" class="step-item completed">
                                        <span class="step-label">Validation Review</span>
                                    </li>
                                    <li data-step="2" class="step-item completed">
                                        <span class="step-label">Payment Confirmed</span>
                                        <span class="step-sub">GCash payment received.</span>
                                    </li>
                                    <li data-step="3" class="step-item active">
                                        <span class="step-label">Processing Application</span>
                                        <span class="step-sub">Hang tight, we’re finalizing things.</span>
                                    </li>
                                @elseif (isset($transactions->payment_amount) && $transactions->payment_amount > 0 && $transactions->status === 'processing')
                                    <li data-step="1" class="step-item completed">
                                        <span class="step-label">Validation Review</span>
                                        <span class="step-sub">We’ll notify you shortly.</span>
                                    </li>
                                    <li data-step="2" class="step-item active">
                                        <span class="step-label">Make Payment</span>
                                        <span class="step-sub">Settle the amount via GCash.</span>
                                    </li>
                                    <li data-step="3" class="step-item">
                                        <span class="step-label">Processing Application</span>
                                        <span class="step-sub">Next step after payment.</span>
                                    </li>
                                @else
                                    <li data-step="1" class="step-item active">
                                        <span class="step-label">Validation Review</span>
                                        <span class="step-sub">We’re verifying your submission.</span>
                                    </li>
                                    <li data-step="2" class="step-item">
                                        <span class="step-label">Make Payment</span>
                                        <span class="step-sub">You’ll receive instructions soon.</span>
                                    </li>
                                    <li data-step="3" class="step-item">
                                        <span class="step-label">Processing Application</span>
                                        <span class="step-sub">We’ll update you once done.</span>
                                    </li>
                                @endif
                            </ol>
                            <div>
                                <button id="gcash-finish" type="button" class="btn-primary" style="display:none;">Send
                                    Success
                                    Email</button>
                            </div>
                        </div>
                        <!-- GCash Step 1: Wait for Validation -->
                        @if ($transactions->status === 'pending')
                            <div id="gcash-wait" class="validation-wait-message"
                                style="display:block; text-align:center; margin:24px 0;">
                                <div
                                    class="mx-auto w-full max-w-2xl rounded-3xl border border-amber-100 bg-gradient-to-br from-amber-50 via-white to-white p-6 shadow-[0_20px_60px_rgba(251,191,36,0.25)]">
                                    <div class="flex flex-col items-center text-center gap-4">
                                        <div
                                            class="flex h-16 w-16 items-center justify-center rounded-2xl bg-amber-100 text-amber-600">
                                            <svg class="h-10 w-10" fill="none" stroke="currentColor"
                                                stroke-width="1.6" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 9v3m0 4h.01M12 5a7 7 0 1 0 0 14 7 7 0 0 0 0-14Z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h2 class="text-2xl font-semibold text-amber-700">Please wait for
                                                validation</h2>
                                            <p class="mt-2 text-sm text-amber-600 max-w-xl">
                                                Your payment and application are currently under review by our
                                                processing team.
                                                We will complete the verification process within 2-3 business days and
                                                it will proceed to the next step once validated, there will be remarks
                                                for futher notice. Thank you for
                                                your patience.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- GCash Payment Interface -->
                        <div class="gcash-payment-interface"
                            style="display:{{ isset($transactions->payment_amount) && $transactions->payment_amount > 0 && strtolower($transactions->status ?? 'pending') === 'processing' && $transactions->payment_status !== 'paid' ? 'block' : 'none' }};">
                            <!-- GCash Header -->
                            {{-- <div class="gcash-header">
                        <div class="gcash-header-content">
                            <img src="{{ asset('images/white-gcash.png') }}" alt="GCash Logo" class="gcash-logo-img">
                        </div>
                    </div> --}}

                            <!-- Breakdown ree -->
                            @if ($transactions->form_type === 'form1-01')
                                <x-forms.payment-breakdown.1-01 :form="$form" />
                            @elseif ($transactions->form_type === 'form1-02')
                                <x-forms.payment-breakdown.1-02 :form="$form" />
                            @elseif ($transactions->form_type === 'form1-03')
                                <x-forms.payment-breakdown.1-03 :form="$form" />
                            @elseif ($transactions->form_type === 'form1-09')
                                <x-forms.payment-breakdown.1-09 :form="$form" />
                            @endif

                            <!-- GCash Payment Card -->
                            <div class="gcash-card">
                                <p class="gcash-note">Securely complete the payment with your GCash app</p>
                                <p class="gcash-subnote">Log in to GCash and scan this QR with the QR Scanner.</p>

                                <div class="gcash-qr">
                                    <img src="{{ $paymentQRUrl ?? asset('images/Gcash-BMA-QRcode.jpg') }}"
                                        alt="GCash QR Code">
                                </div>
                            </div>

                            <!-- GCash Instructions -->
                            <div class="gcash-instructions">
                                <h2>How to Pay</h2>
                                <div class="instructions-grid">
                                    <div class="instruction-column">
                                        <h3>Pay via QR code:</h3>
                                        <ol>
                                            <li>Open the GCash app and log in to your account.</li>
                                            <li>Choose <b>Pay QR</b> and tap <b>Scan QR</b>.</li>
                                            <li>Point your camera at the QR above.</li>
                                            <li>Enter the amount to pay and review details.</li>
                                            <li>Tap <b>Pay</b> to complete the transaction.</li>
                                        </ol>
                                    </div>
                                    <div class="instruction-column">
                                        <h3>Pay via Mobile Number:</h3>
                                        <ol>
                                            <li>In GCash, tap <b>Send</b> → <b>Express Send</b>.</li>
                                            <li>Enter the mobile number <b>0999-XXX-1234</b>.</li>
                                            <li>Input the amount and an optional note.</li>
                                            <li>Confirm to send payment.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>


                            <form action="{{ route('transactions.submit.gcash.proof') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div id="attachments-container"
                                    class="mb-8 w-full max-w-2xl mx-auto rounded-3xl border border-blue-100 bg-white/90 shadow-[0_25px_60px_rgba(15,23,42,0.08)] overflow-hidden">
                                    <div
                                        class="bg-gradient-to-r from-blue-600 via-indigo-500 to-sky-500 px-6 py-5 text-white">
                                        <p class="text-sm uppercase tracking-[0.2em] font-semibold">Step 3</p>
                                        <h3 class="text-2xl font-bold mt-1">Upload Proof of GCash Payment</h3>
                                        <p class="text-sm text-blue-50 mt-1">Accepted formats: PDF, JPG, PNG (max
                                            5&nbsp;MB)
                                        </p>
                                    </div>

                                    <div class="p-6 space-y-5">
                                        <p class="text-sm text-slate-500">
                                            Tip: Take a clear screenshot of your successful GCash transaction showing
                                            the
                                            reference number, amount, and date/time. You can re-upload before final
                                            submission
                                            if needed.
                                        </p>

                                        <label class="block text-base font-semibold text-slate-800"
                                            for="proof_of_payment">
                                            Send Proof of Payment
                                        </label>

                                        <div
                                            class="group relative flex flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50/70 px-6 py-8 text-center transition hover:border-blue-300 hover:bg-blue-50/60">
                                            <div
                                                class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-inner">
                                                <svg class="h-8 w-8 text-blue-500" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 16V4m0 0 4 4m-4-4-4 4M6 12H5a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2h-1" />
                                                </svg>
                                            </div>
                                            <p class="text-base font-semibold text-slate-800">
                                                Drop your file here or
                                                <span class="text-blue-600 underline decoration-dotted">browse</span>
                                            </p>
                                            <p class="text-xs text-slate-500 mt-1">Make sure the file clearly shows the
                                                payment
                                                details.</p>
                                            <input type="file" name="proof_of_payment" id="proof_of_payment"
                                                accept=".pdf,.jpg,.png"
                                                class="absolute inset-0 h-full w-full cursor-pointer opacity-0"
                                                required>
                                        </div>

                                        <div id="proofMeta"
                                            class="hidden rounded-2xl border border-slate-100 bg-slate-50 px-4 py-3 text-sm text-slate-600">
                                            <p class="font-medium text-slate-800">Ready to submit</p>
                                            <p class="file-name truncate"></p>
                                        </div>

                                        <ul class="text-sm text-slate-500 space-y-1">
                                            <li>• Only upload once per transaction. Re-submit if you need to replace the
                                                file.
                                            </li>
                                            <li>• Keep your reference number handy for faster validation.</li>
                                        </ul>

                                        <div
                                            class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                            <span id="uploadStatus"
                                                class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                                Waiting for file
                                            </span>

                                            <button id="submitBtn"
                                                class="w-full sm:w-auto rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-500/30 transition hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-500 disabled:cursor-not-allowed disabled:bg-slate-300 disabled:shadow-none"
                                                disabled>
                                                Submit Payment Proof
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Hidden input to pass transaction id -->
                                    <input type="hidden" name="form_token" value="{{ $transactions->form_token }}">
                                </div>
                            </form>

                        </div>
                        <!-- GCash Step 3: Payment Success Message -->
                        @if ($transactions->status === 'processing')
                            <div id="gcash-confirm" class="validation-wait-message"
                                style="display:{{ strtolower($transactions->payment_status ?? 'pending') === 'paid' ? 'block' : 'none' }}; margin:24px 0;">
                                @if (strtolower($transactions->payment_status ?? 'pending') === 'paid')
                                    <div
                                        class="mx-auto w-full max-w-3xl rounded-3xl border border-emerald-100 bg-white p-8 text-center shadow-[0_25px_80px_rgba(16,185,129,0.25)]">
                                        <div
                                            class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-emerald-50 text-emerald-500">
                                            <svg class="h-10 w-10" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 12.75 5.25 5.25L19.5 8.25" />
                                            </svg>
                                        </div>
                                        <h2 class="text-3xl font-semibold text-emerald-600">Payment sent successfully!
                                        </h2>
                                        <p class="mt-3 text-base text-slate-600">
                                            We’ve received your GCash payment and will finish reviewing your application
                                            shortly.
                                            Once approved, you can download your form anytime.
                                        </p>
                                        <div
                                            class="mt-6 flex flex-col items-center gap-3 text-sm text-slate-500 sm:flex-row sm:justify-center">
                                            <span
                                                class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 font-medium text-emerald-600">
                                                Reference: {{ $transactions->payment_reference }}
                                            </span>
                                            <span>Total Cost:
                                                ₱{{ number_format($transactions->payment_amount, 2) }}</span>
                                        </div>
                                        <div class="mt-8 flex flex-wrap justify-center gap-3">
                                            <a href="https://car.ntc.gov.ph/list-of-officials-position-designation-and-contact-information/"
                                                target="_blank" rel="noopener"
                                                class="inline-flex items-center rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-300">
                                                Need help? Contact us
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @elseif ($transactions->status === 'done')
                            <div id="gcash-confirm" class="validation-wait-message"
                                style="display:{{ strtolower($transactions->payment_status ?? 'pending') === 'paid' ? 'block' : 'none' }};  margin:24px 0;">

                                <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
                                    <!-- Header -->
                                    <div class="text-center p-8 bg-blue-900 text-white">
                                        <img src="{{ asset('images/logo.png') }}" alt="NTC Logo"
                                            class="mx-auto mb-4 max-w-[120px]">
                                        <h1 class="text-xl font-semibold">National Telecommunication Commission</h1>
                                        <p class="text-sm text-gray-300">Cordillera Administrative Region, Baguio City
                                            Philippines</p>
                                    </div>

                                    <!-- Content -->
                                    <div class="p-8 text-gray-800">
                                        @if ($transactions->form_type === 'form1-02' || $transactions->form_type === 'form1-03')
                                            {{-- Form 1-02: Certificate Generated --}}
                                            <h2 class="text-2xl font-semibold text-blue-900 mb-4">Your Certificate Has
                                                Been Generated</h2>

                                            <p class="text-base mb-4">Hello {{ $form->last_name }}
                                                {{ $form->first_name }},</p>

                                            <p class="text-base mb-4">
                                                Your payment was successful. Your transaction has been recorded
                                                successfully.
                                            </p>

                                            <p class="text-base mb-4">
                                                Your application
                                                <strong>{{ $transactions->payment_reference }}</strong> has been
                                                approved and your certificate has been generated. Below are the details:
                                            </p>

                                            <!-- Payment Details -->
                                            <div class="bg-gray-100 p-4 rounded-lg mb-6">
                                                <h3 class="text-lg font-semibold mb-2">Payment Details</h3>
                                                <p><strong>Reference Number:</strong>
                                                    {{ $transactions->payment_reference }}</p>
                                                <p><strong>Method:</strong>
                                                    {{ ucfirst($transactions->payment_method ?? '—') }}</p>
                                                <p><strong>Amount:</strong>
                                                    {{ $transactions->payment_amount ? '₱' . number_format($transactions->payment_amount, 2) : '—' }}
                                                </p>
                                            </div>

                                            <!-- Certificate Details -->
                                            <div class="bg-gray-100 p-4 rounded-lg mb-6">
                                                <h3 class="text-lg font-semibold mb-2">Certificate Details</h3>
                                                @php
                                                    // Format certificate type
                                                    $certificateTypes = [
                                                        '1rtg_e1256_code25' =>
                                                            '1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)',
                                                        '1rtg_code25' => '1RTG - Code (25/20 wpm)',
                                                        '2rtg_e1256_code16' =>
                                                            '2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)',
                                                        '2rtg_code16' => '2RTG - Code (16 wpm)',
                                                        '3rtg_e125_code16' => '3RTG - Elements 1, 2, 5 & Code (16 wpm)',
                                                        '3rtg_code16' => '3RTG - Code (16 wpm)',
                                                        '1phn_e1234' => '1PHN - Elements 1, 2, 3 & 4',
                                                        '2phn_e123' => '2PHN - Elements 1, 2 & 3',
                                                        '3phn_e12' => '3PHN - Elements 1 & 2',
                                                    ];
                                                    $certificateTypeDisplay =
                                                        $certificateTypes[$form->certificate_type ?? ''] ??
                                                        ucwords(
                                                            str_replace('_', ' ', $form->certificate_type ?? 'N/A'),
                                                        );

                                                    // Calculate dates
                                                    $issuanceDate = date('F j, Y');
                                                    $years = isset($form->years) ? (int) $form->years : 0;
                                                    $expiryDate = date('F j, Y', strtotime("+{$years} years"));
                                                @endphp
                                                <ul class="list-disc pl-5 space-y-1">
                                                    <li><strong>Name:</strong> {{ $form->last_name }}
                                                        {{ $form->first_name }} {{ $form->middle_name ?? '' }}</li>
                                                    <li><strong>Certificate Type:</strong>
                                                        {{ $certificateTypeDisplay }}</li>
                                                    <li><strong>Date Issued:</strong> {{ $issuanceDate }}</li>
                                                    <li><strong>Expiry Date:</strong> {{ $expiryDate }}</li>
                                                    <li><strong>OR Number:</strong> {{ $form->or['or_no'] ?? '-' }}
                                                    </li>
                                                    <li><strong>OR Date:</strong> {{ $form->or['or_date'] ?? '-' }}
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Success Banner -->
                                            <div class="bg-green-100 border border-green-300 p-5 rounded-lg mb-6">
                                                <p class="text-lg font-bold mb-2">🎉 Congratulations!</p>
                                                <p class="text-base leading-relaxed">
                                                    Your certificate has been successfully generated. Please check your
                                                    email to download it
                                                </p>
                                            </div>
                                        @elseif($transactions->form_type === 'form1-09')
                                            {{-- Form 1-09: Official Permit Generated --}}
                                            <h2 class="text-2xl font-semibold text-blue-900 mb-4">Your Official Permit
                                                Has Been Generated</h2>

                                            <p class="text-base mb-4">Hello {{ $form->applicant }}
                                                ,</p>

                                            <p class="text-base mb-4">
                                                Your payment was successful. Your transaction has been recorded
                                                successfully.
                                            </p>

                                            <p class="text-base mb-4">
                                                Your application
                                                <strong>{{ $transactions->payment_reference }}</strong> has been
                                                approved and your official permit has been generated. Below are the
                                                details:
                                            </p>

                                            <!-- Payment Details -->
                                            <div class="bg-gray-100 p-4 rounded-lg mb-6">
                                                <h3 class="text-lg font-semibold mb-2">Payment Details</h3>
                                                <p><strong>Reference Number:</strong>
                                                    {{ $transactions->payment_reference }}</p>
                                                <p><strong>Method:</strong>
                                                    {{ ucfirst($transactions->payment_method ?? '—') }}</p>
                                                <p><strong>Amount:</strong>
                                                    {{ $transactions->payment_amount ? '₱' . number_format($transactions->payment_amount, 2) : '—' }}
                                                </p>
                                            </div>

                                            <!-- Permit Details -->
                                            <div class="bg-gray-100 p-4 rounded-lg mb-6">
                                                <h3 class="text-lg font-semibold mb-2">Permit Details</h3>
                                                @php
                                                    $permitTypeDisplay = strtoupper($form->permit_type ?? 'N/A');
                                                    $radioService = strtoupper($form->radio_service ?? '-');
                                                    $applicationType = strtoupper($form->application_type ?? '-');
                                                    $intendedUse = ucfirst(
                                                        str_replace('_', ' ', $form->intended_use ?? '-'),
                                                    );
                                                    $issuanceDate = date('F j, Y');
                                                    $expiryDate = date('F j, Y'); // Permits may not have expiry
                                                @endphp
                                                <ul class="list-disc pl-5 space-y-1">
                                                    <li><strong>Name:</strong> {{ $form->applicant }}
                                                    </li>
                                                    <li><strong>Permit Type:</strong> {{ $permitTypeDisplay }}</li>
                                                    <li><strong>Radio Service:</strong> {{ $radioService }}</li>
                                                    <li><strong>Application Type:</strong> {{ $applicationType }}</li>
                                                    <li><strong>Intended Use:</strong> {{ $intendedUse }}</li>
                                                    <li><strong>Date Issued:</strong> {{ $issuanceDate }}</li>

                                                    <li><strong>OR Number:</strong> {{ $form->or['or_no'] ?? '-' }}
                                                    </li>
                                                    <li><strong>OR Date:</strong> {{ $form->or['or_date'] ?? '-' }}
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Success Banner -->
                                            <div class="bg-green-100 border border-green-300 p-5 rounded-lg mb-6">
                                                <p class="text-lg font-bold mb-2">🎉 Congratulations!</p>
                                                <p class="text-base leading-relaxed">
                                                    Your official permit has been successfully generated. Please check
                                                    your email to download it.
                                                </p>
                                            </div>
                                        @else
                                            {{-- Form 1-01: Admission Slip --}}
                                            <h2 class="text-2xl font-semibold text-blue-900 mb-4">Your Form Has Been
                                                Approved</h2>

                                            <p class="text-base mb-4">Hello {{ $form->last_name }}
                                                {{ $form->first_name }},</p>

                                            <p class="text-base mb-4">
                                                Your payment was successful. Your transaction has been recorded
                                                successfully.
                                            </p>

                                            <p class="text-base mb-4">
                                                Your application
                                                <strong>{{ $transactions->payment_reference }}</strong> has been
                                                approved. Below are the details:
                                            </p>

                                            <!-- Payment Details -->
                                            <div class="bg-gray-100 p-4 rounded-lg mb-6">
                                                <p><strong>Reference Number:</strong>
                                                    {{ $transactions->payment_reference }}</p>
                                                <p><strong>Method:</strong>
                                                    {{ ucfirst($transactions->payment_method ?? '—') }}</p>
                                                <p><strong>Amount:</strong>
                                                    {{ $transactions->payment_amount ? '₱' . number_format($transactions->payment_amount, 2) : '—' }}
                                                </p>
                                            </div>

                                            <!-- OR + Admission Details -->
                                            <div class="bg-gray-100 p-4 rounded-lg mb-6">
                                                <h3 class="text-lg font-semibold mb-2">OR Details</h3>
                                                <ul class="list-disc pl-5 space-y-1">
                                                    <li>OR Number: {{ $form->or['or_no'] ?? '-' }}</li>
                                                    <li>OR Amount: {{ $form->or['or_amount'] ?? '-' }}</li>
                                                    <li>Collecting Officer:
                                                        {{ $form->or['collecting_officer'] ?? '-' }}</li>
                                                    <li>Date: {{ $form->or['or_date'] ?? '-' }}</li>
                                                </ul>

                                                <h3 class="text-lg font-semibold mt-4 mb-2">Admission Slip Details</h3>
                                                <ul class="list-disc pl-5 space-y-1">
                                                    <li>Name: {{ $form->last_name }} {{ $form->first_name }}</li>
                                                    <li>Exam For: {{ $form->exam_type }}</li>
                                                    <li>Place of Exam:
                                                        {{ $form->admission_slip['place_of_exam'] ?? '-' }}</li>
                                                    <li>Date: {{ $form->admission_slip['date_of_exam'] ?? '-' }}</li>
                                                    <li>Time: {{ $form->admission_slip['time_of_exam'] ?? '-' }}</li>
                                                    <li>Authorized Officer:
                                                        {{ $form->admission_slip['authorized_officer'] ?? '-' }}</li>
                                                </ul>
                                            </div>

                                            @php
                                                // Format date
                                                $examDate = $form->admission_slip['date_of_exam'] ?? null;
                                                if ($examDate) {
                                                    $formattedDate = \Carbon\Carbon::parse($examDate)->format('F j, Y');
                                                } else {
                                                    $formattedDate = '-';
                                                }

                                                // Format time
                                                $examTime = $form->admission_slip['time_of_exam'] ?? null;
                                                if ($examTime) {
                                                    $formattedTime = \Carbon\Carbon::createFromFormat(
                                                        'H:i',
                                                        $examTime,
                                                    )->format('g:i A');
                                                } else {
                                                    $formattedTime = '-';
                                                }
                                            @endphp
                                            <!-- Schedule Warning -->
                                            <div class="bg-yellow-100 border border-yellow-300 p-5 rounded-lg mb-6">
                                                <p class="text-lg font-bold mb-2">📌 Please take note of your exam
                                                    schedule:</p>
                                                <p class="text-base leading-relaxed">
                                                    <strong>Place of Exam:</strong>
                                                    {{ $form->admission_slip['place_of_exam'] ?? '-' }} <br>
                                                    <strong>Date and Time:</strong> {{ $formattedDate ?? '-' }}
                                                    {{ $formattedTime ?? '-' }}
                                                </p>
                                            </div>
                                        @endif

                                        <hr class="border-gray-300 my-6">

                                        <p class="text-sm leading-6 mb-4">
                                            If you have any questions or concerns, feel free to contact us at
                                            <strong>car.admin@ntc.gov.ph</strong>.
                                        </p>

                                        <p class="text-base">Thank you for using the NTC Forms System.</p>
                                    </div>

                                    <!-- Footer -->
                                    <div class="text-center text-xs text-gray-500 p-6">
                                        <p>This is an automated message from the NTC Forms System.</p>
                                        <p>© {{ date('Y') }} National Telecommunication Commission - CAR</p>
                                    </div>
                                </div>
                                <div class="flex justify-center flex-col items-center mt-6">
                                    <p> You can download your form by clicking the button below.</p>
                                    <button class="form1-01-btn w-50" type="button" id="downloadPDFBtn"
                                        style="background-color: #28a745; margin: 0 10px;">Download Form
                                    </button>
                                </div>
                            </div>
                        @endif
                </div>

                <!-- Action Buttons -->
                <div class="transaction-actions" style="display:none;">
                    <a href="{{ route('display.forms') }}" class="btn-primary">Continue to Forms</a>
                </div>
            @elseif(optional($transactions)->payment_method === 'cash')
                <!-- Steps Indicator (Cash) -->
                <div class="steps steps-cash">
                    <ol id="cash-steps">
                        @if (strtolower($transactions->status ?? 'pending') === 'done')
                            <li data-step="1" class="step-item completed">PLEASE WAIT FOR VALIDATION</li>
                            <li data-step="2" class="step-item completed">Payment</li>
                            <li data-step="3" class="step-item active">Processing Application
                            </li>
                        @elseif (isset($transactions->payment_amount) && $transactions->payment_amount > 0 && $transactions->status === 'processing')
                            <li data-step="1" class="step-item completed">PLEASE WAIT FOR VALIDATION</li>
                            <li data-step="2" class="step-item active">Payment</li>
                            <li data-step="3" class="step-item">Processing Application</li>
                        @else
                            <li data-step="1" class="step-item active">PLEASE WAIT FOR VALIDATION</li>
                            <li data-step="2" class="step-item">Payment</li>
                            <li data-step="3" class="step-item">Processing Application</li>
                        @endif
                    </ol>
                    <div>
                        <button id="cash-finish" type="button" class="btn-primary" style="display:none;">Send
                            Success
                            Email</button>
                    </div>
                </div>
                <!-- Step 1: Wait for Validation Message -->
                @if ($transactions->status === 'pending')
                    <div id="cash-wait" class="validation-wait-message"
                        style="display:block; text-align:center; margin:24px 0;">
                        <h2 style="font-size:28px;">PLEASE WAIT FOR VALIDATION</h2>
                    </div>
                @endif
                <!-- Cash Payment Interface -->
                <div class="cash-payment-interface"
                    style="display:{{ isset($transactions->payment_amount) && $transactions->payment_amount > 0 && strtolower($transactions->status ?? 'pending') === 'processing' && $transactions->payment_status !== 'paid' ? 'block' : 'none' }};">
                    <div class="cash-payment-container">
                        <!-- Top Header -->
                        <div class="cash-header-section">
                            <div class="success-icon">✓</div>
                            <div class="header-content">
                                <h2>Cash Payment Selected</h2>
                                <p>You have chosen to pay in cash. Please visit our office during business hours
                                    to
                                    complete your payment.</p>
                            </div>
                        </div>

                        <!-- Main Content Grid -->
                        <div class="cash-content-grid">
                            <!-- Left Column - Payment Info & Office Hours -->
                            <div class="cash-left-column">
                                <div class="payment-info">
                                    <h3>Payment Information</h3>
                                    <div class="info-item">
                                        <span class="info-label">Payment Method:</span>
                                        <span class="info-value">Cash</span>
                                    </div>
                                    <div class="info-item amount-highlight">
                                        <span class="info-label">Amount:</span>
                                        <span
                                            class="info-value amount-value">₱{{ number_format($transactions->payment_amount ?? 0, 2, '.', ',') }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Status:</span>
                                        <span class="info-value">Pending</span>
                                    </div>
                                </div>

                                <div class="office-hours">
                                    <h4>Office Hours</h4>
                                    <p><strong>Monday - Friday:</strong> 8:00 AM - 5:00 PM</p>
                                    <p><strong>Saturday:</strong> 8:00 AM - 12:00 PM</p>
                                    <p><strong>Sunday:</strong> Closed</p>
                                </div>
                            </div>

                            <!-- Right Column - Google Maps -->
                            <div class="cash-right-column">
                                <div class="office-location">
                                    <h4>Office Location</h4>
                                    <div class="location-content">
                                        <!-- Google Maps Embed -->
                                        <div class="maps-container">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.1691931618943!2d120.61167997460701!3d16.416231330056114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a1543cf37fcf%3A0x643f8ec7f155d470!2sNational%20Telecommunications%20Commission!5e0!3m2!1sen!2sph!4v1761151402669!5m2!1sen!2sph"
                                                width="100%" height="375" style="border:0;" allowfullscreen=""
                                                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cash-bottom-section">
                            <div class="payment-instructions">
                                <h4 style="text-align: center;">How to Pay</h4>
                                <ul class="instruction-list" style="list-style-type: bullet;">
                                    <li>Please bring a valid identification card along with all required
                                        documents.
                                    </li>
                                    <li>Present your reference number upon arrival.</li>
                                    <li>Pay the required amount.</li>
                                    <li>Obtain your official receipt.</li>
                                </ul>
                            </div>

                            <div class="important-notes">
                                <h4 style="text-align: center;">Reminders</h4>
                                <ul class="notes-list" style="list-style-type: bullet;">
                                    <li>Arrive at least 30 minutes prior to closing time.</li>
                                    <li>Your application will be processed only after the payment has been
                                        completed.</li>
                                    <li>For any inquiries, please do not hesitate to contact us.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cash Step 3: Payment Success Message -->
                <div id="cash-confirm" class="validation-wait-message"
                    style="display:{{ strtolower($transactions->payment_status ?? 'pending') === 'paid' ? 'block' : 'none' }}; margin:24px 0;">
                    <h2 style="font-size:28px;">PAYMENT SUCCESSFUL</h2>
                    <p>Your payment has been confirmed. You can now download your form by clicking the button below.
                    </p>
                    <div style="display: flex; justify-content: center;">
                        <button class="form1-01-btn" type="button" id="downloadPDFBtn"
                            style="background-color: #28a745; margin: 0 10px;">Download Form
                        </button>
                    </div>
                </div>
                <!-- Action Buttons -->
                <div class="transaction-actions" style="display:none;">
                    <a href="{{ route('display.forms') }}" class="btn-primary">Continue to Forms</a>

                </div>
            @endif
            @endif


        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            // Auto-refresh functionality for transitions
            @if (
                !isset($transactions->payment_amount) ||
                    $transactions->payment_amount == null ||
                    $transactions->payment_amount == 0)
                startAutoRefreshForAmount();
            @endif

            @if (isset($transactions->payment_amount) &&
                    $transactions->payment_amount > 0 &&
                    strtolower($transactions->payment_status ?? 'pending') !== 'paid')
                startAutoRefreshForPaid();
            @endif

            const form = document.getElementById('cancel-btn')

            if (form) {
                form.addEventListener("submit", (e) => {
                    e.preventDefault();
                    // Show confirmation
                    const confirmCancel = confirm("Are you sure you want to cancel this transaction?");

                    if (confirmCancel) {
                        form.submit();
                    }
                });
            }


            // PDF Download functionality
            const downloadPDFBtn = document.getElementById('downloadPDFBtn');
            if (downloadPDFBtn) {
                downloadPDFBtn.addEventListener('click', function() {
                    downloadPDF();
                });
            }

            function downloadPDF() {
                try {

                    const token = "{{ $transactions?->form_token }}";
                    if (!token) {
                        alert('Form token not found. Please go back and resubmit the form.');
                        return;
                    }

                    // Show loading state
                    const originalText = downloadPDFBtn.textContent;
                    downloadPDFBtn.textContent = 'Generating PDF...';
                    downloadPDFBtn.disabled = true;

                    // Get form type and remove 'form' prefix
                    let formType = "{{ $transactions?->form_type }}";
                    formType = formType.substring(4); // Remove 'form' prefix (e.g., 'form1-02' -> '1-02')

                    // Create download URL for application form template
                    const baseUrl = "{{ route('forms.template-pdf', ['formType' => 'PLACEHOLDER']) }}";
                    const downloadUrl = baseUrl.replace('PLACEHOLDER', formType) + `?token=${token}`;
                    console.log(downloadUrl);

                    // Create a temporary link to trigger download
                    const link = document.createElement('a');
                    link.href = downloadUrl;
                    link.download = `NTC_Form_${formType}_${new Date().toISOString().split('T')[0]}.pdf`;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    // Reset button state after a short delay
                    setTimeout(() => {
                        downloadPDFBtn.textContent = originalText;
                        downloadPDFBtn.disabled = false;
                    }, 2000);

                } catch (error) {
                    console.error('PDF download error:', error);
                    alert('Failed to download PDF. Please try again.');

                    // Reset button state
                    downloadPDFBtn.textContent = 'Download PDF';
                    downloadPDFBtn.disabled = false;
                }
            }



            function updateProgressLine(stepList) {
                if (!stepList) return;

                const steps = Array.from(stepList.querySelectorAll('.step-item'));
                const totalSteps = steps.length;

                if (totalSteps === 0) return;

                // Find the active step index
                let activeIndex = -1;
                let completedCount = 0;

                steps.forEach((step, index) => {
                    if (step.classList.contains('active')) {
                        activeIndex = index;
                    }
                    if (step.classList.contains('completed')) {
                        completedCount++;
                    }
                });

                // Calculate progress percentage
                // Progress should fill completed steps and reach the center of the active step
                let progressPercentage = 0;

                if (totalSteps === 1) {
                    // Single step - if active or completed, show 100%
                    progressPercentage = (steps[0].classList.contains('active') ||
                        steps[0].classList.contains('completed')) ? 100 : 0;
                } else {
                    // Multiple steps
                    if (activeIndex >= 0) {
                        // Progress reaches the center of the active step
                        // For steps positioned at 0%, 33.33%, 66.67%, 100% (for 4 steps)
                        // Active step at index 1 should show progress at ~50% (33.33% + half segment)
                        const segmentWidth = 100 / (totalSteps - 1);
                        progressPercentage = (activeIndex * segmentWidth) + (segmentWidth / 2);

                        // Ensure it doesn't exceed 100%
                        progressPercentage = Math.min(progressPercentage, 100);
                    } else {
                        // No active step - check for completed steps
                        const lastCompletedIndex = steps.map((step, idx) =>
                            step.classList.contains('completed') ? idx : -1
                        ).filter(idx => idx >= 0).pop();

                        if (lastCompletedIndex !== undefined && lastCompletedIndex >= 0) {
                            // Progress fills to the end of the last completed step
                            if (lastCompletedIndex === totalSteps - 1) {
                                // Last step completed
                                progressPercentage = 100;
                            } else {
                                // Progress reaches the end of the completed step
                                const segmentWidth = 100 / (totalSteps - 1);
                                progressPercentage = (lastCompletedIndex + 1) * segmentWidth;
                            }
                        }
                    }
                }

                // Update the progress line width using CSS variable
                // Start at 0% then animate to target for smooth initial load
                stepList.style.setProperty('--progress-width', '0%');

                // Use requestAnimationFrame to ensure the initial 0% is rendered first
                requestAnimationFrame(() => {
                    setTimeout(() => {
                        stepList.style.setProperty('--progress-width', `${progressPercentage}%`);
                    }, 50);
                });
            }

            // Auto-refresh functionality to check for payment_amount changes (Step 1 -> Step 2)
            function startAutoRefreshForAmount() {
                const reference = "{{ $transactions?->payment_reference }}";
                if (!reference) return;

                let refreshInterval;
                let consecutiveErrors = 0;
                const maxErrors = 5;

                function checkStatus() {
                    fetch(`{{ route('transactions.status') }}?reference=${reference}`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                consecutiveErrors = 0; // Reset error count on success

                                // Check if payment_amount has been set
                                if (data.payment_amount && data.payment_amount > 0) {
                                    // Stop polling
                                    if (refreshInterval) {
                                        clearInterval(refreshInterval);
                                    }

                                    // Reload the page to show updated state
                                    console.log('Payment amount detected, reloading page...');
                                    window.location.reload();
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Status check error:', error);
                            consecutiveErrors++;

                            // Stop polling after too many errors
                            if (consecutiveErrors >= maxErrors) {
                                if (refreshInterval) {
                                    clearInterval(refreshInterval);
                                }
                                console.log('Stopped auto-refresh due to multiple errors');
                            }
                        });
                }

                // Start checking every 5 seconds (adjust as needed)
                refreshInterval = setInterval(checkStatus, 5000);

                // Also check immediately
                checkStatus();
            }

            // Auto-refresh functionality to check for payment_status = 'paid' changes (Step 2 -> Step 3)
            function startAutoRefreshForPaid() {
                const reference = "{{ $transactions?->payment_reference }}";
                if (!reference) return;

                let refreshInterval;
                let consecutiveErrors = 0;
                const maxErrors = 5;

                function checkStatus() {
                    fetch(`{{ route('transactions.status') }}?reference=${reference}`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                consecutiveErrors = 0; // Reset error count on success

                                // Check if payment_status has been set to 'paid'
                                if (data.payment_status && data.payment_status.toLowerCase() === 'paid') {
                                    // Stop polling
                                    if (refreshInterval) {
                                        clearInterval(refreshInterval);
                                    }

                                    // Reload the page to show updated state
                                    console.log('Payment status changed to paid, reloading page...');
                                    window.location.reload();
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Status check error:', error);
                            consecutiveErrors++;

                            // Stop polling after too many errors
                            if (consecutiveErrors >= maxErrors) {
                                if (refreshInterval) {
                                    clearInterval(refreshInterval);
                                }
                                console.log('Stopped auto-refresh due to multiple errors');
                            }
                        });
                }

                // Start checking every 5 seconds (adjust as needed)
                refreshInterval = setInterval(checkStatus, 5000);

                // Also check immediately
                checkStatus();
            }
            const submitBtn = document.getElementById("submitBtn");
            const proofInput = document.getElementById("proof_of_payment");
            const uploadStatus = document.getElementById("uploadStatus");
            const proofMeta = document.getElementById("proofMeta");

            function updateProofState() {
                const hasFile = !!(proofInput?.files && proofInput.files.length > 0);
                if (submitBtn) {
                    submitBtn.disabled = !hasFile;
                }

                if (uploadStatus) {
                    uploadStatus.textContent = hasFile ? "File attached" : "Waiting for file";
                    uploadStatus.classList.toggle("bg-emerald-100", hasFile);
                    uploadStatus.classList.toggle("text-emerald-700", hasFile);
                    uploadStatus.classList.toggle("bg-slate-100", !hasFile);
                    uploadStatus.classList.toggle("text-slate-600", !hasFile);
                }

                if (proofMeta) {
                    if (hasFile) {
                        proofMeta.classList.remove("hidden");
                        proofMeta.querySelector(".file-name").textContent = proofInput.files[0].name;
                    } else {
                        proofMeta.classList.add("hidden");
                        const nameEl = proofMeta.querySelector(".file-name");
                        if (nameEl) nameEl.textContent = "";
                    }
                }
            }

            if (proofInput) {
                proofInput.addEventListener("change", updateProofState);
            }
            updateProofState();
        })
    </script>
</x-layout>
