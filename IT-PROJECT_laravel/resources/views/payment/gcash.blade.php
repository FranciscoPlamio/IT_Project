<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>GCash Payment</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <main>
    <div class="gcash-container">
      <header class="gcash-header">
        <div class="gcash-logo">GCash</div>
        <div class="gcash-subtitle">Scan to pay or send via mobile number</div>
      </header>

      <section class="gcash-card">
        <div class="gcash-merchant">NTC CAR</div>
        <div class="gcash-number">0999-XXX-1234</div>
        <div class="gcash-qr">
          <img src="{{ asset('images/GCASH_MOCKUP.png') }}" alt="GCash QR Code" />
        </div>
        <a class="gcash-btn" href="gcash:pay">Open GCash</a>
      </section>

      <section class="gcash-instructions">
        <h2>How to pay</h2>
        <ol>
          <li>Open the GCash app and log in to your account.</li>
          <li>Choose <b>Pay QR</b> and tap <b>Scan QR</b>, then point your camera at the QR above.</li>
          <li>Enter the amount to pay and review the details.</li>
          <li>Tap <b>Pay</b> to complete the transaction.</li>
        </ol>
        <div class="gcash-alt">
          <div class="gcash-alt-title">Alternative: Pay via mobile number</div>
          <ol>
            <li>In GCash, tap <b>Send</b> → <b>Express Send</b>.</li>
            <li>Enter the mobile number <b>0999-XXX-1234</b>.</li>
            <li>Input the amount and an optional note/reference.</li>
            <li>Confirm to send payment.</li>
          </ol>
        </div>
      </section>

      <footer class="gcash-footer">
        <a class="gcash-link" href="{{ route('homepage') }}">Back to Home</a>
      </footer>
    </div>
  </main>
</body>
</html>


