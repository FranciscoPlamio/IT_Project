<x-layout :title="'Email Authentication'">
    <x-slot:head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .email-auth-instructions {
                background-color: #f8f9fa;
                border: 1px solid #e9ecef;
                border-radius: 8px;
                padding: 20px;
                margin: 20px 0;
            }

            .email-auth-instructions h3 {
                color: #495057;
                font-size: 16px;
                font-weight: 600;
                margin: 0 0 12px 0;
            }

            .instruction-steps {
                margin: 0;
                padding-left: 0;
                color: #6c757d;
                font-size: 14px;
                line-height: 1.6;
                list-style-position: inside;
            }

            .instruction-steps li {
                margin-bottom: 8px;
                padding-left: 0;
            }

            .instruction-steps li:last-child {
                margin-bottom: 0;
            }
        </style>
    </x-slot:head>

    <main>
        <div class="email-auth-container">
            <h2>Enter your E-mail</h2>
            <p>Please provide the information.</p>

            <!-- Instructions -->
            <div class="email-auth-instructions">
                <h3>How to get started:</h3>
                <ol class="instruction-steps">
                    <li>1.Please enter an email</li>
                    <li>2.Please check your email or spam folder</li>
                </ol>
            </div>

            <!-- Resend button message -->
            <div id="auth-sent" style="display:none; margin-top:24px;">
                <p style="color:#28a745;font-weight:600;">Authentication email sent! Please check your inbox or spam
                    folder and click the verification link.</p>
            </div>

            <!-- Form -->
            <form class="email-auth-form" id="emailAuthForm" data-redirect-url="{{ route('display.forms') }}">
                <label class="email-auth-label" for="email">Email address</label>
                <input class="email-auth-input" type="email" id="email" name="email"
                    placeholder="Enter your email" required />
                <button class="email-auth-btn" type="submit" id="submitBtn">Continue</button>
            </form>
            <a class="email-auth-resend" href="#" id="resendLink" style="display:none;">Resend</a>
            <span id="resendCountdown" style="display:none; color:#6c757d; font-size:14px;"></span>
            <div id="auth-success" style="display:none; margin-top:24px;">
                <p style="color:#22b573;font-weight:600;">Email authenticated! Proceed to the forms list:</p>
                <a href="{{ route('display.forms') }}" class="email-auth-btn"
                    style="display:inline-block;width:auto;padding:10px 32px;">Go to Forms List</a>
            </div>
            <div id="auth-error" style="display:none; margin-top:24px;">
                <p style="color:#dc3545;font-weight:600;" id="errorMessage"></p>
            </div>
            <div id="auth-loading" style="display:none; margin-top:24px;">
                <p style="color:#007bff;font-weight:600;">Sending authentication email...</p>
            </div>
            <!-- Resend button message -->
            <div id="auth-sent" style="display:none; margin-top:24px;">
                <p style="color:#28a745;font-weight:600;">Authentication email sent! Please check your inbox or spam
                    folder and click the verification link.</p>
            </div>
        </div>
    </main>

    <!-- Disclaimer Modal -->
    <div id="disclaimerModal"
        style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:1000;align-items:center;justify-content:center;padding:16px;">
        <div
            style="background:#fff;max-width:820px;width:96%;border-radius:14px;box-shadow:0 22px 60px rgba(0,0,0,0.28);overflow:hidden;border:1px solid #e6e8eb;">
            <div
                style="position:relative;padding:18px 56px 18px 24px;border-bottom:1px solid #e9ecef;background:linear-gradient(180deg,#253243,#1c2633);color:#fff;">
                <h3 style="margin:0;font-size:22px;line-height:1.3;">Data Privacy Notice</h3>
                <p style="margin:6px 0 0 0;font-size:13px;opacity:.9;">Please review and accept our terms and
                    conditions
                </p>
                <button id="closeDisclaimerBtn" type="button" aria-label="Close"
                    style="position:absolute;right:12px;top:12px;background:transparent;border:none;color:#fff;cursor:pointer;font-size:22px;line-height:1;">×</button>
            </div>
            <div style="padding:26px 30px;color:#2b2b2b;line-height:1.7;max-height:65vh;overflow:auto;">
                <p style="margin:0 0 14px 0;font-size:16px;text-align:justify;">The National Telecommunications
                    Commission (NTC), in
                    its
                    commitment to uphold the data privacy rights of individuals under the Data Privacy Act of 2012
                    (Republic Act No. 10173), hereby adopts this Privacy Policy. All personal information collected
                    shall be processed in full compliance with the requirements of the law and its Implementing
                    Rules
                    and Regulations. By using NTC services or providing personal information, individuals consent to
                    the
                    collection, use, and disclosure of their information by the NTC. The NTC is committed to ensure
                    personal information is kept secure, accurate, and confidential. Your personal information will
                    be
                    handled responsibly by the NTC in accordance with the Data Privacy Act of 2012.</p>
                <div
                    style="background:#fff5f5;border:1px solid #f5c2c2;border-left:4px solid #c0392b;border-radius:6px;padding:14px 16px;margin:0 0 14px 0;">
                    <p style="margin:0 0 8px 0;font-size:14px;font-weight:600;color:#c0392b;">⚠ Important Conditions:
                    </p>
                    <ul style="margin:0 0 0 18px;font-size:15px;color:#5c1a1a;">
                        <li style="margin:6px 0;">We collect only necessary information to process your application.
                        </li>
                        <li style="margin:6px 0;">Your email will be used for authentication and official
                            communications.
                        </li>
                        <li style="margin:6px 0;">You may contact NTC for questions or to exercise your data rights.
                        </li>
                    </ul>
                </div>
                <label
                    style="display:flex;gap:10px;align-items:flex-start;margin-top:12px;cursor:pointer;font-size:15px;">
                    <input id="agreeCheckbox" type="checkbox" style="margin-top:4px;min-width:16px;">
                    <span>I have read and agree to the terms and conditions and consent to the processing of my
                        personal
                        data for the purposes described.</span>
                </label>
            </div>
            <div
                style="padding:14px 24px;border-top:1px solid #e9ecef;display:flex;gap:12px;justify-content:flex-end;background:#fafafa;">
                <button id="cancelDisclaimerBtn" type="button"
                    style="background:#ffffff;color:#222;border:1px solid #d0d7de;padding:10px 16px;border-radius:8px;cursor:pointer;">Cancel</button>
                <button id="agreeDisclaimerBtn" type="button" disabled
                    style="background:#222e3a;color:#fff;border:none;padding:10px 18px;border-radius:8px;cursor:not-allowed;opacity:.7;">Agree
                    & Continue</button>
            </div>
        </div>
    </div>

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

            // Disclaimer modal elements
            const disclaimerModal = document.getElementById('disclaimerModal');
            const agreeCheckbox = document.getElementById('agreeCheckbox');
            const agreeBtn = document.getElementById('agreeDisclaimerBtn');
            const cancelBtn = document.getElementById('cancelDisclaimerBtn');
            const closeBtn = document.getElementById('closeDisclaimerBtn');

            let countdownTimer = null;

            // Show disclaimer modal on page load only if not already agreed
            if (!sessionStorage.getItem('privacyNoticeAgreed')) {
                showDisclaimer();
            } else {
                // If already agreed, enable the form immediately
                enableEmailForm();
            }

            // Disclaimer modal functions
            function showDisclaimer() {
                if (!disclaimerModal) return;
                disclaimerModal.style.display = 'flex';
                agreeCheckbox.checked = false;
                agreeBtn.disabled = true;
                agreeBtn.style.cursor = 'not-allowed';
                agreeBtn.style.opacity = '.6';

                // Disable email form until user agrees
                emailInput.disabled = true;
                submitBtn.disabled = true;
                submitBtn.style.background = '#6c757d';
                submitBtn.style.cursor = 'not-allowed';
            }

            function closeDisclaimer() {
                if (!disclaimerModal) return;
                disclaimerModal.style.display = 'none';
            }

            function enableEmailForm() {
                emailInput.disabled = false;
                submitBtn.disabled = false;
                submitBtn.style.background = '';
                submitBtn.style.cursor = '';
            }

            // Disclaimer event listeners
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
                    // Set session storage to remember user agreed
                    sessionStorage.setItem('privacyNoticeAgreed', 'true');
                    closeDisclaimer();
                    enableEmailForm();
                });
            }

            if (cancelBtn) {
                cancelBtn.addEventListener('click', function() {
                    // Redirect back to homepage if user cancels
                    window.location.href = '{{ url('/') }}';
                });
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    // Redirect back to homepage if user closes
                    window.location.href = '{{ url('/') }}';
                });
            }

            // Close when clicking outside the dialog content
            if (disclaimerModal) {
                disclaimerModal.addEventListener('click', function(e) {
                    if (e.target === disclaimerModal) {
                        // Redirect back to homepage if user clicks outside
                        window.location.href = '{{ url('/') }}';
                    }
                });
            }

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
                if (resendLink.style.color === 'rgb(108, 117, 125)' || resendLink.style.pointerEvents ===
                    'none') {
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

                fetch('{{ route('email-auth.submit') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute(
                                'content') || ''
                        },
                        body: JSON.stringify({
                            email: email
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
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
                fetch('{{ route('email-auth.status') }}')
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
                    fetch('{{ route('email-auth.status') }}')
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
                        resendCountdown.textContent =
                            `Resend available in ${minutes}:${seconds.toString().padStart(2, '0')}`;
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
</x-layout>
