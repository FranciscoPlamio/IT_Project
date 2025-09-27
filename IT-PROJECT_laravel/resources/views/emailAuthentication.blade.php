<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Email Authentication</title>
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
  <main>
    <div class="email-auth-container">
      <h2>Enter your E-mail</h2>
      <p>Please provide the information.</p>
      
      <form class="email-auth-form" id="emailAuthForm" data-redirect-url="{{ route('forms.list') }}">
        <label class="email-auth-label" for="email">Email address</label>
        <input class="email-auth-input" type="email" id="email" name="email" placeholder="Enter your email" required />
        <button class="email-auth-btn" type="submit" id="submitBtn">Continue</button>
      </form>
      <a class="email-auth-resend" href="#" id="resendLink" style="display:none;">Resend</a>
      <span id="resendCountdown" style="display:none; color:#6c757d; font-size:14px;"></span>
      <div id="auth-success" style="display:none; margin-top:24px;">
        <p style="color:#22b573;font-weight:600;">Email authenticated! Proceed to the forms list:</p>
        <a href="{{ route('forms.list') }}" class="email-auth-btn" style="display:inline-block;width:auto;padding:10px 32px;">Go to Forms List</a>
      </div>
      <div id="auth-error" style="display:none; margin-top:24px;">
        <p style="color:#dc3545;font-weight:600;" id="errorMessage"></p>
      </div>
      <div id="auth-loading" style="display:none; margin-top:24px;">
        <p style="color:#007bff;font-weight:600;">Sending authentication email...</p>
      </div>
      <!-- Resend button message -->
      <div id="auth-sent" style="display:none; margin-top:24px;">
        <p style="color:#28a745;font-weight:600;">Authentication email sent! Please check your inbox or spam folder and click the verification link.</p>
      </div>
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('emailAuthForm');
      const submitBtn = document.getElementById('submitBtn');
      const resendLink = document.getElementById('resendLink');
      const resendCountdown = document.getElementById('resendCountdown');
      const authSuccess = document.getElementById('auth-success');
      const authError = document.getElementById('auth-error');
      const authLoading = document.getElementById('auth-loading');
      const authSent = document.getElementById('auth-sent');
      const errorMessage = document.getElementById('errorMessage');
      const emailInput = document.getElementById('email');
      
      let countdownTimer = null;

      // Check if email is already verified
      checkEmailStatus();
      
      // Show resend button immediately but disabled
      resendLink.style.display = 'block';
      resendLink.style.color = '#6c757d'; // Gray color
      resendLink.style.pointerEvents = 'none';
      resendLink.style.cursor = 'not-allowed';
      resendCountdown.style.display = 'none'; // Hide timer initially
      
      // Start countdown immediately to enable button after 30 seconds
      startResendCountdown();

      form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = emailInput.value.trim();
        if (!email) {
          showError('Please enter your email address.');
          return;
        }

        sendAuthEmail(email);
      });

      resendLink.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Check if resend is disabled (gray state)
        if (resendLink.style.color === 'rgb(108, 117, 125)' || resendLink.style.pointerEvents === 'none') {
          return; // Do nothing if disabled
        }
        
        const email = emailInput.value.trim();
        if (email) {
          sendAuthEmail(email);
        }
      });

      function sendAuthEmail(email) {
        showLoading();
        hideError();
        hideSuccess();

        fetch('{{ route("email-auth.submit") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
          },
          body: JSON.stringify({ email: email })
        })
        .then(response => response.json())
        .then(data => {
          hideLoading();
          
          if (data.success) {
            // Show email sent message and resend button
            showEmailSent();
            resendLink.style.display = 'block';
            submitBtn.disabled = true;
            submitBtn.style.background = '#6c757d'; // Gray background
            submitBtn.style.cursor = 'not-allowed'; // Not clickable cursor
            emailInput.disabled = true;
            
            // Start countdown timer for resend link
            startResendCountdown(true);
            
            // Check for email verification periodically
            startVerificationCheck();
          } else {
            showError(data.message || 'Failed to send authentication email.');
          }
        })
        .catch(error => {
          hideLoading();
          showError('An error occurred. Please try again.');
          console.error('Error:', error);
        });
      }

      function checkEmailStatus() {
        fetch('{{ route("email-auth.status") }}')
        .then(response => response.json())
        .then(data => {
          if (data.verified) {
            showSuccess();
            hideEmailSent(); // Hide "email sent" message when authenticated
            emailInput.value = data.email;
            emailInput.disabled = true;
            submitBtn.disabled = true;
          }
        })
        .catch(error => {
          console.error('Error checking email status:', error);
        });
      }

      function startVerificationCheck() {
        const checkInterval = setInterval(() => {
          fetch('{{ route("email-auth.status") }}')
          .then(response => response.json())
          .then(data => {
            if (data.verified) {
              clearInterval(checkInterval);
              showSuccess();
              hideEmailSent(); // Hide "email sent" message when authenticated
              emailInput.disabled = true;
              submitBtn.disabled = true;
            }
          })
          .catch(error => {
            console.error('Error checking verification status:', error);
          });
        }, 3000); // Check every 3 seconds

        // Stop checking after 5 minutes
        setTimeout(() => {
          clearInterval(checkInterval);
        }, 300000);
      }

      function showLoading() {
        authLoading.style.display = 'block';
        submitBtn.disabled = true;
      }

      function hideLoading() {
        authLoading.style.display = 'none';
        submitBtn.disabled = false;
      }

      function showError(message) {
        errorMessage.textContent = message;
        authError.style.display = 'block';
      }

      function hideError() {
        authError.style.display = 'none';
      }

      function showSuccess() {
        authSuccess.style.display = 'block';
      }

      function hideSuccess() {
        authSuccess.style.display = 'none';
      }

      function showEmailSent() {
        authSent.style.display = 'block';
      }

      function hideEmailSent() {
        authSent.style.display = 'none';
      }


      function startResendCountdown(showTimer = false) {
        // Clear any existing timer
        if (countdownTimer) {
          clearInterval(countdownTimer);
        }
        
        let timeLeft = 60; // 1 minutes
        
        // Disable resend link initially
        resendLink.style.color = '#6c757d'; // Gray color
        resendLink.style.pointerEvents = 'none';
        resendLink.style.cursor = 'not-allowed';
        
        // Show timer only when email is sent
        if (showTimer) {
          resendCountdown.style.display = 'inline';
        }
        
        // Update countdown display
        function updateCountdown() {
          if (showTimer) {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            resendCountdown.textContent = `Resend available in ${minutes}:${seconds.toString().padStart(2, '0')}`;
          }
          
          if (timeLeft <= 0) {
            // Enable resend link
            resendLink.style.color = '#2d3fd3'; // Blue color (from CSS)
            resendLink.style.pointerEvents = ''; // Enable pointer events
            resendLink.style.cursor = 'pointer'; // Show pointer cursor
            resendCountdown.style.display = 'none'; // Hide timer
            
            // Disable Continue button when resend becomes available
            submitBtn.disabled = true;
            submitBtn.style.background = '#6c757d'; // Gray background
            submitBtn.style.cursor = 'not-allowed'; // Not clickable cursor
            
            clearInterval(countdownTimer);
            countdownTimer = null;
          } else {
            timeLeft--;
          }
        }
        
        // Update immediately and then every second
        updateCountdown();
        countdownTimer = setInterval(updateCountdown, 1000);
      }
    });
  </script>

</body>
</html>