<x-layout :title="'Transaction Details'">
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
                <!-- Action Buttons -->
                <div class="transaction-actions">
                    <a href="{{ route('display.forms') }}" class="btn-primary">Continue to Forms</a>
                </div>
            @elseif(optional($transactions)->payment_method === 'cash')
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
        })
    </script>
</x-layout>
