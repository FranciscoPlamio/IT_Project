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
                            {{-- <th class="actions-header">Actions</th> --}}
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
                                        @if ($transactions->payment_status == 'paid')
                                            <span
                                                class="status-badge bg-green-500 text-white">{{ $transactions->payment_status }}</span>
                                        @elseif ($transactions->status == 'processing')
                                            <span class="status-badge pending">{{ $transactions->status }}</span>
                                        @elseif ($transactions->status == 'pending')
                                            <span class="status-badge pending">{{ $transactions->status }}</span>
                                        @endif
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Purpose:</span>
                                        <span class="purpose-text">MULTI-PURPOSE CLEARANCE PROCESSING</span>
                                    </div>
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
                            {{-- delete feature db forms_transaction
                            @if ($transactions->status != 'pending')
                                <td class="actions-cell">
                                    <form action="{{ route('transactions.delete') }}" method="POST" id="cancel-btn">
                                        @csrf
                                        @method('DELETE')

                                        <button id="cancel-btn" class="cancel-btn">
                                            <span class="cancel-icon">✕</span>
                                            <span class="cancel-text">CANCEL</span>
                                        </button>

                                    </form>
                                </td>
                            @endif --}}
                        </tr>
                    </tbody>
                </table>
            @endif


        </div>

        <!-- Payment Method Section -->
        <div class="payment-method-section">
            @if (optional($transactions)->payment_method === 'gcash')
                <!-- Steps Indicator (GCash) -->
                <div class="steps steps-gcash">
                    <ol id="gcash-steps">
                        @if (strtolower($transactions->payment_status ?? 'pending') === 'paid')
                            <li data-step="1" class="step-item completed">PLEASE WAIT FOR VALIDATION</li>
                            <li data-step="2" class="step-item completed">Payment</li>
                            <li data-step="3" class="step-item active">Payment successful email with PDF download</li>
                        @elseif (isset($transactions->payment_amount) && $transactions->payment_amount > 0 && $transactions->status === 'processing')
                            <li data-step="1" class="step-item completed">PLEASE WAIT FOR VALIDATION</li>
                            <li data-step="2" class="step-item active">Payment</li>
                            <li data-step="3" class="step-item">Payment successful email with PDF download</li>
                        @else
                            <li data-step="1" class="step-item active">PLEASE WAIT FOR VALIDATION</li>
                            <li data-step="2" class="step-item">Payment</li>
                            <li data-step="3" class="step-item">Payment successful email with PDF download</li>
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
                    <div class="gcash-header">
                        <div class="gcash-header-content">
                            <img src="{{ asset('images/white-gcash.png') }}" alt="GCash Logo" class="gcash-logo-img">
                        </div>
                    </div>

                    <!-- GCash Payment Card -->
                    <div class="gcash-card">
                        <p class="gcash-note">Securely complete the payment with your GCash app</p>
                        <p class="gcash-subnote">Log in to GCash and scan this QR with the QR Scanner.</p>
                        <p class="gcash-name"><b>NTC CAR | 09491191100</b></p>

                        <div class="gcash-qr">
                            <img src="{{ asset('images/qr_code.png') }}" alt="GCash QR Code">
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
                <div id="gcash-confirm" class="validation-wait-message"
                    style="display:{{ strtolower($transactions->payment_status ?? 'pending') === 'paid' ? 'block' : 'none' }}; text-align:center; margin:24px 0;">
                    <h2 style="font-size:28px;">PAYMENT SUCCESSFUL</h2>
                    <p>Your payment has been confirmed. An email with the PDF download has been sent to your email.
                    </p>
                    <div class="flex justify-center">

                        <button class="form1-01-btn" type="button" id="downloadPDFBtn"
                            style="background-color: #28a745; margin: 0 10px;">Download Form
                        </button>
                    </div>
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
                            <li data-step="3" class="step-item active">Payment successful email with PDF download
                            </li>
                        @elseif (isset($transactions->payment_amount) && $transactions->payment_amount > 0 && $transactions->status === 'processing')
                            <li data-step="1" class="step-item completed">PLEASE WAIT FOR VALIDATION</li>
                            <li data-step="2" class="step-item active">Payment</li>
                            <li data-step="3" class="step-item">Payment successful email with PDF download</li>
                        @else
                            <li data-step="1" class="step-item active">PLEASE WAIT FOR VALIDATION</li>
                            <li data-step="2" class="step-item">Payment</li>
                            <li data-step="3" class="step-item">Payment successful email with PDF download</li>
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
                    style="display:{{ strtolower($transactions->payment_status ?? 'pending') === 'paid' ? 'block' : 'none' }}; text-align:center; margin:24px 0;">
                    <h2 style="font-size:28px;">PAYMENT SUCCESSFUL</h2>
                    <p>Your payment has been confirmed. An email with the PDF download has been sent to your email.
                    </p>
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
