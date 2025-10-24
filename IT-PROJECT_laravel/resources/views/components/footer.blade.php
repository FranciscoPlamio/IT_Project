<footer class="footer">
    <!-- Main footer content -->
    <div class="footer-content">
        <div class="footer-section footer-main">
            <div class="footer-logo-section">
                <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="footer-logo">
                <div class="footer-text-content">
                    <h3 class="footer-title">NTC CAR Baguio</h3>
                    <p class="footer-description">
                        Your automated certification platform for telecommunications services in the Cordillera
                        Administrative
                        Region.
                        Streamline your applications, access forms efficiently, and achieve your regulatory goals.
                    </p>
                </div>
            </div>
        </div>

        <div class="footer-section">
            <h4 class="footer-subtitle">Services</h4>
            <ul class="footer-links">
                <li><a href="{{ route('forms.display') }}">Forms</a></li>
                <li><a href="{{ route('email-auth') }}">Apply Online</a></li>
                <li><a href="{{ route('requirements') }}">Requirements</a></li>
                <li><a href="https://car.ntc.gov.ph/category/announcements/examination/schedule/" target="_blank"
                        rel="noopener">Schedules</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4 class="footer-subtitle">Organization</h4>
            <ul class="footer-links">
                <li><a href="https://car.ntc.gov.ph/i-announcements-and-news/mandate-mission-vision/" target="_blank"
                        rel="noopener">About Us</a></li>
                <li><a href="https://car.ntc.gov.ph/list-of-officials-position-designation-and-contact-information/"
                        target="_blank" rel="noopener">Contact</a></li>
                <li><a href="https://car.ntc.gov.ph/category/announcements/news-and-updates/" target="_blank"
                        rel="noopener">News</a></li>
                <li><a href="https://car.ntc.gov.ph/category/announcements/" target="_blank"
                        rel="noopener">Announcements</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4 class="footer-subtitle">Legal</h4>
            <ul class="footer-links">
                <li><a href="https://car.ntc.gov.ph/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a>
                </li>
                <li><a href="https://car.ntc.gov.ph/terms-of-service/" target="_blank" rel="noopener">Terms of
                        Service</a></li>
                <li><a href="https://car.ntc.gov.ph/data-protection/" target="_blank" rel="noopener">Data Protection</a>
                </li>
                <li><a href="https://car.ntc.gov.ph/accessibility/" target="_blank" rel="noopener">Accessibility</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Separator line -->
    <hr class="footer-separator">

    <!-- Copyright notice -->
    <div class="footer-copyright">
        <p>&copy; {{ date('Y') }} NTC CAR Baguio. All rights reserved.</p>
    </div>
</footer>
