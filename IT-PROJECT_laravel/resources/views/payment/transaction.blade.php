<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Standard Website Header -->
    <header>
        <div class="top-bar">
            <a href="{{ route('homepage') }}" aria-label="Go to homepage">
                <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
            </a>
            <div class="title">
                <p>Republic of the Philippines</p>
                <h1>National Telecommunication Commission<br><span>Cordillera Administrative Region, Baguio City Philippines</span></h1>
            </div>
        </div>
        
        <!-- Navigation Bar -->
        <nav>
            <button class="menu-toggle" id="menuToggle">☰</button>
            <ul id="navList">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="https://car.ntc.gov.ph/category/announcements/news-and-updates/" target="_blank" rel="noopener">News</a></li>
                <li><a href="{{ route('forms.display') }}">Forms</a></li>
                <li><a id="navApplyLink" href="{{ route('email-auth') }}">Apply</a></li>
                <li><a href="https://car.ntc.gov.ph/i-announcements-and-news/mandate-mission-vision/" target="_blank" rel="noopener">About us</a></li>
                <li><a href="https://car.ntc.gov.ph/list-of-officials-position-designation-and-contact-information/" target="_blank" rel="noopener">Contact us</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="form1-01-container">
            <div class="form1-01-header">TRANSACTION DETAILS</div>
            
            <!-- Transaction Table -->
            <div class="transaction-table-container">
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
                                <span class="reference-number">NTC-TXN-{{ date('Y') }}-{{ str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT) }}</span>
                            </td>
                            <td class="details-cell">
                                <div class="transaction-details">
                                    <div class="detail-row">
                                        <span class="detail-label">Status:</span>
                                        <span class="status-badge pending">Pending</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Purpose:</span>
                                        <span class="purpose-text">MULTI-PURPOSE CLEARANCE PROCESSING</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Transaction Date:</span>
                                        <span class="date-text">{{ date('F d, Y H:i:s') }}</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Payment Date:</span>
                                        <span class="date-text">-</span>
                                    </div>
                                    <div class="detail-row">
                                        <span class="detail-label">Appointment Date:</span>
                                        <span class="date-text">{{ date('F d, Y H:i:s', strtotime('+22 days')) }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="actions-cell">
                                <button class="cancel-btn" onclick="cancelTransaction()">
                                    <span class="cancel-icon">✕</span>
                                    <span class="cancel-text">CANCEL</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Action Buttons -->
            <div class="transaction-actions">
                <a href="{{ route('forms.list') }}" class="btn-primary">Continue to Forms</a>
            </div>
        </div>
    </main>

    <script>
        function cancelTransaction() {
            if (confirm('Are you sure you want to cancel this transaction?')) {
                // In a real application, this would make an API call to cancel the transaction
                alert('Transaction has been cancelled.');
                // Redirect back to payment method selection
                window.location.href = '{{ route("payment.method") }}';
            }
        }

        // Mobile menu toggle functionality
        const toggle = document.getElementById("menuToggle");
        const navList = document.getElementById("navList");

        if (toggle && navList) {
            toggle.addEventListener("click", () => {
                navList.classList.toggle("open");
            });
        }
    </script>
</body>
</html>
