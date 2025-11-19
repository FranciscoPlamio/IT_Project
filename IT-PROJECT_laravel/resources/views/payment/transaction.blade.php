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
                                        @elseif ($transactions->payment_status == 'paid')
                                            <span
                                                class="status-badge bg-green-500 text-white">{{ $transactions->payment_status }}</span>
                                        @elseif ($transactions->status == 'pending')
                                            <span class="status-badge pending">Pending Application</span>
                                        @elseif ($transactions->status == 'declined')
                                            <span class="status-badge pending">Declined</span>
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
            @endif


        </div>
        @if ($transactions->status === 'declined')
            <div style="text-align:center">
                Application has been denied.
                <a href="/display-forms" style="color:blue; text-decoration:underline;">Click here to apply a new
                    one</a>.
            </div>
        @endif

        <!-- Payment Method Section -->
        <div class="payment-method-section">
            @if (optional($transactions)->payment_method === 'gcash' && $transactions->status !== 'declined')
                <!-- Steps Indicator (GCash) -->
                <div class="steps steps-gcash">
                    <ol id="gcash-steps">
                        @if (strtolower($transactions->payment_status ?? 'pending') === 'paid' && $transactions->status === 'done')
                            <li data-step="1" class="step-item completed">PLEASE WAIT FOR VALIDATION</li>
                            <li data-step="2" class="step-item completed">Payment</li>
                            <li data-step="3" class="step-item completed">Approved Application</li>
                        @elseif (isset($transactions->payment_amount) &&
                                $transactions->payment_amount > 0 &&
                                $transactions->status === 'processing' &&
                                $transactions->payment_status === 'paid')
                            <li data-step="1" class="step-item completed">PLEASE WAIT FOR VALIDATION</li>
                            <li data-step="2" class="step-item completed">Payment</li>
                            <li data-step="3" class="step-item active">Processing Application</li>
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
                        <button id="gcash-finish" type="button" class="btn-primary" style="display:none;">Send Success
                            Email</button>
                    </div>
                </div>
                <!-- GCash Step 1: Wait for Validation -->
                @if ($transactions->status === 'pending')
                    <div id="gcash-wait" class="validation-wait-message"
                        style="display:block; text-align:center; margin:24px 0;">
                        <h2 style="font-size:28px;">PLEASE WAIT FOR VALIDATION</h2>
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

                    <!-- GCash Payment Card -->
                    <div class="gcash-card">
                        <p class="gcash-note">Securely complete the payment with your GCash app</p>
                        <p class="gcash-subnote">Log in to GCash and scan this QR with the QR Scanner.</p>

                        <div class="gcash-qr">
                            <img src="{{ asset('images/Gcash-Form1-01.png') }}" alt="GCash QR Code">
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
                        <div id="attachments-container" class="mb-6 flex flex-col justify-center items-center ">

                            <label class="block font-semibold mb-2" for="transcript_of_records">
                                Send Proof of Payment
                            </label>
                            <input type="file" name="proof_of_payment" accept=".pdf,.jpg,.png"
                                class="border p-2 rounded mb-2">
                            @csrf
                            <button id="submitBtn"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition  disabled:bg-gray-400 disabled:cursor-not-allowed transition"
                                disabled>
                                Submit
                            </button>
                            <!-- Hidden input to pass transaction id -->
                            <input type="hidden" name="form_token" value="{{ $transactions->form_token }}">
                        </div>
                    </form>

                </div>
                <!-- GCash Step 3: Payment Success Message -->
                @if ($transactions->status === 'processing')
                    <div id="gcash-confirm" class="validation-wait-message"
                        style="display:{{ strtolower($transactions->payment_status ?? 'pending') === 'paid' ? 'block' : 'none' }}; text-align:center; margin:24px 0;">
                        @if (strtolower($transactions->payment_status ?? 'pending') === 'paid')
                            <h2 style="font-size:28px;">PAYMENT SENT</h2>
                            <p>Your payment was sent successfully!
                                Please wait while we process your application

                                You can download your form by clicking the button below.
                            </p>
                            <div class="flex justify-center">
                                <button class="form1-01-btn" type="button" id="downloadPDFBtn"
                                    style="background-color: #28a745; margin: 0 10px;">Download Form
                                </button>
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
                                <h2 class="text-2xl font-semibold text-blue-900 mb-4">Your Form Has Been Approved</h2>

                                <p class="text-base mb-4">Hello {{ $form->last_name }} {{ $form->first_name }},</p>

                                <p class="text-base mb-4">
                                    Your payment was successful. Your transaction has been recorded successfully.
                                </p>

                                <p class="text-base mb-4">
                                    Your application <strong>{{ $transactions->payment_reference }}</strong> has been
                                    approved.
                                    Below are the details:
                                </p>

                                <!-- Payment Details -->
                                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                                    <p><strong>Reference Number:</strong> {{ $transactions->payment_reference }}</p>
                                    <p><strong>Method:</strong> {{ ucfirst($transactions->payment_method ?? '—') }}</p>
                                    <p>
                                        <strong>Amount:</strong>
                                        {{ $transactions->payment_amount ? '₱' . number_format($transactions->payment_amount, 2) : '—' }}
                                    </p>
                                </div>

                                <!-- OR + Admission Details -->
                                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                                    <h3 class="text-lg font-semibold mb-2">OR Details</h3>
                                    <ul class="list-disc pl-5 space-y-1">
                                        <li>OR Number: {{ $form->or['or_no'] ?? '-' }}</li>
                                        <li>OR Amount: {{ $form->or['or_amount'] ?? '-' }}</li>
                                        <li>Collecting Officer: {{ $form->or['collecting_officer'] ?? '-' }}</li>
                                        <li>Date: {{ $form->or['or_date'] ?? '-' }}</li>
                                    </ul>

                                    <h3 class="text-lg font-semibold mt-4 mb-2">Admission Slip Details</h3>
                                    <ul class="list-disc pl-5 space-y-1">
                                        <li>Name: {{ $form->last_name }} {{ $form->first_name }}</li>
                                        <li>Exam For: {{ $form->exam_type }}</li>
                                        <li>Place of Exam: {{ $form->admission_slip['place_of_exam'] ?? '-' }}</li>
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
                                        $formattedDate = \Carbon\Carbon::parse($examDate)->format('F j, Y'); // e.g., November 4, 2025
                                    } else {
                                        $formattedDate = '-';
                                    }

                                    // Format time
                                    $examTime = $form->admission_slip['time_of_exam'] ?? null;
                                    if ($examTime) {
                                        // Append seconds to parse correctly if missing
                                        $formattedTime = \Carbon\Carbon::createFromFormat('H:i', $examTime)->format(
                                            'g:i A',
                                        ); // e.g., 10:49 AM
                                    } else {
                                        $formattedTime = '-';
                                    }
                                @endphp
                                <!-- Schedule Warning -->
                                <div class="bg-yellow-100 border border-yellow-300 p-5 rounded-lg mb-6">
                                    <p class="text-lg font-bold mb-2">📌 Please take note of your exam schedule:</p>
                                    <p class="text-base leading-relaxed">
                                        <strong>Place of Exam:</strong>
                                        {{ $form->admission_slip['place_of_exam'] ?? '-' }} <br>
                                        <strong>Date and Time:</strong> {{ $formattedDate ?? '-' }}
                                        {{ $formattedTime ?? '-' }}
                                    </p>
                                </div>

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

                    // Get form type
                    let formType = "{{ $transactions?->form_type }}";
                    formType = formType.substring(4);

                    // Create download URL
                    const baseUrl = "{{ route('forms.template-pdf', ['formType' => 'PLACEHOLDER']) }}";
                    const downloadUrl = baseUrl.replace('PLACEHOLDER', formType) + `?token=${token}`;

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

            function checkAllFilesUploaded() {
                const container = document.getElementById("attachments-container");
                const inputs = container.querySelectorAll("input[type='file']");

                container.addEventListener("change", (e) => {

                    if (checkAllFilesUploaded()) {
                        submitBtn.removeAttribute('disabled');
                        submitBtn.style.opacity = '1';
                        submitBtn.style.cursor = 'pointer';
                    }
                });
                let allFilled = true;

                inputs.forEach((input) => {

                    if (!input.files || input.files.length === 0) {
                        allFilled = false;
                    }
                });
                console.log(allFilled);
                return allFilled;
            }
            checkAllFilesUploaded();
        })
    </script>
</x-layout>
