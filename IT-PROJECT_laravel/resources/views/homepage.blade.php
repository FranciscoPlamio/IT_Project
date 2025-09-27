<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NTC CAR Baguio</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <header>
    <div class="top-bar">
      <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
      <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>Cordillera Administrative Region, Baguio City Philippines</span></h1>
      </div>
    </div>

    <nav>
      <button class="menu-toggle" id="menuToggle">☰</button>
      <ul id="navList">
        <li class="active"><a href="{{ url('/') }}">Home</a></li>
        <li><a href="https://car.ntc.gov.ph/category/announcements/news-and-updates/" target="_blank" rel="noopener">News</a></li>
        <li><a href="{{ route('forms.display') }}">Forms</a></li>
        <li><a href="https://car.ntc.gov.ph/i-announcements-and-news/mandate-mission-vision/" target="_blank" rel="noopener">About us</a></li>
        <li><a href="https://car.ntc.gov.ph/list-of-officials-position-designation-and-contact-information/" target="_blank" rel="noopener">Contact us</a></li>
      </ul>
    </nav>
  </header>

  <section class="banner">
    <img src="{{ asset('images/ntc-home.png') }}" alt="Campaign Banner" />
  </section>

  <section class="quick-links">
    <a href="https://car.ntc.gov.ph/category/announcements/examination/schedule/" target="_blank" rel="noopener" style="text-decoration:none;color:inherit;">
      <div class="card">
        <img src="{{ asset('images/icon-schedule.png') }}" alt="Schedule Icon"/>
        <p>Schedules</p>
      </div>
    </a>
    <a id="applyLink" href="#" data-target-url="{{ route('email-auth') }}" style="text-decoration:none;color:inherit;">
      <div class="card">
        <img src="{{ asset('images/icon-forms.png') }}" alt="Forms Icon"/>
        <p>Apply</p>
      </div>
    </a>
    <a href="https://car.ntc.gov.ph/wp-content/uploads/2025/05/NTC-CAR-Citizens-Charter-2025.png" target="_blank" rel="noopener" style="text-decoration:none;color:inherit;">
      <div class="card">
        <img src="{{ asset('images/icon-requirements.png') }}" alt="Requirements Icon"/>
        <p>Requirements</p>
      </div>
    </a>
  </section>

  <!-- Disclaimer Modal -->
  <div id="disclaimerModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:1000;align-items:center;justify-content:center;padding:16px;">
    <div style="background:#fff;max-width:820px;width:96%;border-radius:14px;box-shadow:0 22px 60px rgba(0,0,0,0.28);overflow:hidden;border:1px solid #e6e8eb;">
      <div style="position:relative;padding:18px 56px 18px 24px;border-bottom:1px solid #e9ecef;background:linear-gradient(180deg,#253243,#1c2633);color:#fff;">
        <h3 style="margin:0;font-size:22px;line-height:1.3;">Data Privacy Notice</h3>
        <p style="margin:6px 0 0 0;font-size:13px;opacity:.9;">Please review and accept our terms and conditions</p>
        <button id="closeDisclaimerBtn" type="button" aria-label="Close" style="position:absolute;right:12px;top:12px;background:transparent;border:none;color:#fff;cursor:pointer;font-size:22px;line-height:1;">×</button>
      </div>
      <div style="padding:26px 30px;color:#2b2b2b;line-height:1.7;max-height:65vh;overflow:auto;">
        <p style="margin:0 0 14px 0;font-size:16px;">The National Telecommunications Commission (NTC), in its commitment to uphold the data privacy rights of individuals under the Data Privacy Act of 2012 (Republic Act No. 10173), hereby adopts this Privacy Policy. All personal information collected shall be processed in full compliance with the requirements of the law and its Implementing Rules and Regulations. By using NTC services or providing personal information, individuals consent to the collection, use, and disclosure of their information by the NTC. The NTC is committed to ensure personal information is kept secure, accurate, and confidential. Your personal information will be handled  responsibly by the NTC in accordance with the Data Privacy Act of 2012.</p>
        <ul style="margin:0 0 14px 18px;font-size:15px;color:#424242;">
          <li style="margin:6px 0;">We collect only necessary information to process your application.</li>
          <li style="margin:6px 0;">Your email will be used for authentication and official communications.</li>
          <li style="margin:6px 0;">You may contact NTC for questions or to exercise your data rights.</li>
        </ul>
        <label style="display:flex;gap:10px;align-items:flex-start;margin-top:12px;cursor:pointer;font-size:15px;">
          <input id="agreeCheckbox" type="checkbox" style="margin-top:4px;min-width:16px;">
          <span>I have read and agree to the terms and conditions and consent to the processing of my personal data for the purposes described.</span>
        </label>
      </div>
      <div style="padding:14px 24px;border-top:1px solid #e9ecef;display:flex;gap:12px;justify-content:flex-end;background:#fafafa;">
        <button id="cancelDisclaimerBtn" type="button" style="background:#ffffff;color:#222;border:1px solid #d0d7de;padding:10px 16px;border-radius:8px;cursor:pointer;">Cancel</button>
        <button id="agreeDisclaimerBtn" type="button" disabled style="background:#222e3a;color:#fff;border:none;padding:10px 18px;border-radius:8px;cursor:not-allowed;opacity:.7;">Agree & Continue</button>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; {{ date('Y') }} National Telecommunications Commission - Cordillera Administrative Region. All rights reserved.</p>
  </footer>

  <script>
    const toggle = document.getElementById("menuToggle");
    const navList = document.getElementById("navList");

    toggle.addEventListener("click", () => {
      navList.classList.toggle("open");
    });

    // Disclaimer gating before Email Authentication
    const applyLink = document.getElementById('applyLink');
    const disclaimerModal = document.getElementById('disclaimerModal');
    const agreeCheckbox = document.getElementById('agreeCheckbox');
    const agreeBtn = document.getElementById('agreeDisclaimerBtn');
    const cancelBtn = document.getElementById('cancelDisclaimerBtn');

    function openDisclaimer() {
      if (!disclaimerModal) return;
      disclaimerModal.style.display = 'flex';
      agreeCheckbox.checked = false;
      agreeBtn.disabled = true;
      agreeBtn.style.cursor = 'not-allowed';
      agreeBtn.style.opacity = '.6';
    }

    function closeDisclaimer() {
      if (!disclaimerModal) return;
      disclaimerModal.style.display = 'none';
    }

    if (applyLink) {
      applyLink.addEventListener('click', function(e) {
        e.preventDefault();
        openDisclaimer();
      });
    }

    if (agreeCheckbox) {
      agreeCheckbox.addEventListener('change', function() {
        const enabled = this.checked;
        agreeBtn.disabled = !enabled;
        agreeBtn.style.cursor = enabled ? 'pointer' : 'not-allowed';
        agreeBtn.style.opacity = enabled ? '1' : '.6';
      });
    }

    if (agreeBtn) {
      agreeBtn.addEventListener('click', function() {
        if (agreeBtn.disabled) return;
        const targetUrl = applyLink?.getAttribute('data-target-url');
        if (targetUrl) {
          window.location.href = targetUrl;
        }
      });
    }

    if (cancelBtn) {
      cancelBtn.addEventListener('click', function() {
        closeDisclaimer();
      });
    }

    const closeBtn = document.getElementById('closeDisclaimerBtn');
    if (closeBtn) {
      closeBtn.addEventListener('click', function() {
        closeDisclaimer();
      });
    }

    // Close when clicking outside the dialog content
    if (disclaimerModal) {
      disclaimerModal.addEventListener('click', function(e) {
        if (e.target === disclaimerModal) {
          closeDisclaimer();
        }
      });
    }
  </script>
</body>
</html>
