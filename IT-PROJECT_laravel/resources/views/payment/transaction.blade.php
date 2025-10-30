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
                            <th class="actions-header">Actions</th>
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
                                        <span class="status-badge pending">{{ $transactions->payment_status }}</span>
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

                                    @if (optional($transactions)->payment_method === 'gcash')
                                        <div class="detail-row">
                                            <span class="detail-label">Payment Amount:</span>
                                            <span class="date-text">-</span>
                                        </div>
                                    @endif

                                    <div class="detail-row">
                                        <span class="detail-label">Payment Due Date:</span>
                                        <span class="date-text">{{ date('F d, Y H:i:s', strtotime('+22 days')) }}</span>
                                    </div>
                                </div>
                            </td>
                            {{-- delete feature db forms_transaction --}}
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
                        </tr>
                    </tbody>
                </table>
            @endif


        </div>

        <!-- Payment Method Section -->
        <div class="payment-method-section">
            @if (optional($transactions)->payment_method === 'gcash')
                <!-- Steps Indicator (GCash) -->
                <div class="steps steps-gcash" style="margin:16px 0;">
                    <ol id="gcash-steps" style="display:flex;gap:10px;flex-wrap:wrap;padding:0;list-style:none;">
                        <li data-step="1" class="step-item">Step 1: PLEASE WAIT FOR VALIDATION</li>
                        <li data-step="2" class="step-item">Step 2: Current Page</li>
                        <li data-step="3" class="step-item">Step 3: Wait for payment confirmation (email will be sent)
                        </li>
                        <li data-step="4" class="step-item">Step 4: Payment successful email with PDF download
                            (optional if download button is added in payment PJ)</li>
                    </ol>
                    <div style="margin-top:8px;display:flex;gap:8px;">
                        <button id="gcash-finish" type="button" class="btn-primary" style="display:none;">Send Success
                            Email</button>
                    </div>
                </div>
                <!-- GCash Step 1: Wait for Validation -->
                <div id="gcash-wait" class="validation-wait-message"
                    style="display:none; text-align:center; margin:24px 0;">
                    <h2 style="font-size:28px;">PLEASE WAIT FOR VALIDATION</h2>
                </div>
                <!-- GCash Payment Interface -->
                <div class="gcash-payment-interface">
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
                </div>
                <!-- GCash Step 3: Wait for Confirmation Message -->
                <div id="gcash-confirm" class="validation-wait-message"
                    style="display:none; text-align:center; margin:24px 0;">
                    <h2 style="font-size:28px;">PLEASE WAIT FOR PAYMENT CONFIRMATION</h2>
                    <p>You will receive an email once the payment is confirmed.</p>
                </div>
                <!-- Action Buttons -->
                <div class="transaction-actions">
                    <a href="{{ route('display.forms') }}" class="btn-primary">Continue to Forms</a>
                </div>
            @elseif(optional($transactions)->payment_method === 'cash')
                <!-- Steps Indicator (Cash) -->
                <div class="steps steps-cash" style="margin:16px 0;">
                    <ol id="cash-steps" style="display:flex;gap:10px;flex-wrap:wrap;padding:0;list-style:none;">
                        <li data-step="1" class="step-item">Step 1: PLEASE WAIT FOR VALIDATION</li>
                        <li data-step="2" class="step-item">Step 2: Current Page</li>
                        <li data-step="3" class="step-item">Step 3: Payment successful email with PDF download
                            (optional if download button is added in payment PJ)</li>
                    </ol>
                    <div style="margin-top:8px;display:flex;gap:8px;">
                        <button id="cash-finish" type="button" class="btn-primary" style="display:none;">Send Success
                            Email</button>
                    </div>
                </div>
                <!-- Step 1: Wait for Validation Message -->
                <div id="cash-wait" class="validation-wait-message"
                    style="display:none; text-align:center; margin:24px 0;">
                    <h2 style="font-size:28px;">PLEASE WAIT FOR VALIDATION</h2>
                </div>
                <!-- Cash Payment Interface -->
                <div class="cash-payment-interface">
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
                                        <span class="info-value amount-value">₱500.00</span>
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
                <!-- Action Buttons -->
                <div class="transaction-actions">
                    <a href="{{ route('display.forms') }}" class="btn-primary">Continue to Forms</a>
                </div>
            @endif
        </div>


    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.getElementById('cancel-btn')
            console.log(form);
            form.addEventListener("submit", (e) => {
                e.preventDefault();
                // Show confirmation
                const confirmCancel = confirm("Are you sure you want to cancel this transaction?");

                if (confirmCancel) {
                    form.submit();
                }
            });
            // Simple stepper for testing only
            const reference = "{{ optional($transactions)->payment_reference }}";
            const method = "{{ optional($transactions)->payment_method }}";

            function initStepper(prefix, totalSteps) {
                const stepsEl = document.getElementById(prefix + '-steps');
                if (!stepsEl) return;
                const nextBtn = document.getElementById(prefix + '-next');
                const finishBtn = document.getElementById(prefix + '-finish');
                const storageKey = prefix + '-step-' + reference;
                let current = parseInt(sessionStorage.getItem(storageKey) || '1', 10);

                function render() {
                    stepsEl.querySelectorAll('.step-item').forEach(li => {
                        const step = parseInt(li.getAttribute('data-step'), 10);
                        li.style.padding = '6px 10px';
                        li.style.borderRadius = '6px';
                        li.style.border = '1px solid #e0e0e0';
                        li.style.background = step <= current ? '#e6f0ff' : '#f8f9fa';
                        li.style.fontWeight = step === current ? '600' : '400';
                        li.style.cursor = 'pointer';
                    });
                    if (nextBtn) nextBtn.style.display = current < totalSteps ? 'inline-block' : 'none';
                    finishBtn.style.display = current === totalSteps ? 'inline-block' : 'none';

                    // Cash-specific UI toggles
                    if (prefix === 'cash') {
                        const waitEl = document.getElementById('cash-wait');
                        const cashInterface = document.querySelector('.cash-payment-interface');
                        if (waitEl) waitEl.style.display = (current === 1) ? 'block' : 'none';
                        if (cashInterface) cashInterface.style.display = (current === 2) ? 'block' : 'none';
                    }

                    // GCash-specific UI toggles
                    if (prefix === 'gcash') {
                        const gcashWait = document.getElementById('gcash-wait');
                        const gcashInterface = document.querySelector('.gcash-payment-interface');
                        const gcashConfirm = document.getElementById('gcash-confirm');
                        if (gcashWait) gcashWait.style.display = (current === 1) ? 'block' : 'none';
                        if (gcashInterface) gcashInterface.style.display = (current === 2) ? 'block' : 'none';
                        if (gcashConfirm) gcashConfirm.style.display = (current === 3) ? 'block' : 'none';
                    }
                }

                nextBtn?.addEventListener('click', () => {
                    if (current < totalSteps) {
                        current++;
                        sessionStorage.setItem(storageKey, String(current));
                        render();
                    }
                });

                finishBtn?.addEventListener('click', async () => {
                    // Mirror email auth UX: disable during request
                    finishBtn.disabled = true;
                    try {
                        const res = await fetch("{{ route('transactions.complete') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                payment_reference: reference
                            })
                        });
                        const data = await res.json();
                        // If email was sent successfully, redirect to homepage
                        if (data && data.success) {
                            window.location.href = "{{ url('/') }}";
                        } else {
                            alert(data.message || 'Done');
                        }
                    } catch (e) {
                        alert('Failed to complete transaction.');
                    } finally {
                        finishBtn.disabled = false;
                    }
                });

                // Allow selecting steps by clicking list items
                stepsEl.addEventListener('click', (event) => {
                    const target = event.target.closest('.step-item');
                    if (!target) return;
                    const clickedStep = parseInt(target.getAttribute('data-step'), 10);
                    if (!Number.isNaN(clickedStep)) {
                        current = Math.min(Math.max(clickedStep, 1), totalSteps);
                        sessionStorage.setItem(storageKey, String(current));
                        render();
                    }
                });

                render();
            }

            if (method === 'gcash') {
                initStepper('gcash', 4);
            } else if (method === 'cash') {
                initStepper('cash', 3);
            }
        })
    </script>
</x-layout>
