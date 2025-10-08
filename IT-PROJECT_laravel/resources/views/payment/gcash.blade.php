<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Payment</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Full-width Blue Header -->
    <header class="gcash-header">
        <div class="gcash-header-content">
            <img src="{{ asset('images/white-gcash.png') }}" alt="GCash Logo" class="gcash-logo-img">
        </div>
    </header>

    <main class="gcash-main">
        <!-- White Card with QR -->
        <section class="gcash-card">
            <p class="gcash-note">Securely complete the payment with your GCash app</p>
            <p class="gcash-subnote">Log in to GCash and scan this QR with the QR Scanner.</p>
            <p class="gcash-name"><b>NTC CAR    |    09491191100</b></p>

            <div class="gcash-qr">
                <img src="{{ asset('images/qr_code.png') }}" alt="GCash QR Code">
            </div>
        </section>

        <!-- Instructions -->
        <section class="gcash-instructions">
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
            
            <!-- Action Buttons -->
            <div class="gcash-actions">
                <a href="{{ route('payment.method') }}" class="gcash-btn gcash-btn-secondary">Back to Payment Method</a>
                <a href="{{ route('payment.transaction') }}" class="gcash-btn gcash-btn-primary">View Transaction</a>
            </div>
        </section>
    </main>
</body>
</html>
