<x-layout :title="'Payment Method Selection'">
    <x-slot:head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .payment-method-container {
                max-width: 600px;
                margin: 40px auto;
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 0 8px rgba(0, 0, 0, 0.07);
                padding: 40px 32px 32px 32px;
                text-align: center;
            }

            .payment-method-container h2 {
                margin: 0 0 8px 0;
                font-size: 2rem;
                font-weight: 700;
                color: #1e3a8a;
            }

            .payment-method-container p {
                margin: 0 0 32px 0;
                color: #6b7280;
                font-size: 1rem;
                line-height: 1.5;
            }

            .payment-options {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 24px;
                margin-bottom: 32px;
            }

            .payment-option {
                background: #f8fafc;
                border: 2px solid #e5e7eb;
                border-radius: 12px;
                padding: 24px 20px;
                cursor: pointer;
                transition: all 0.3s ease;
                text-decoration: none;
                color: inherit;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 16px;
                position: relative;
                overflow: hidden;
            }

            .payment-option:hover {
                transform: translateY(-4px);
                box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
                border-color: #3b82f6;
                background: #e0f2fe;
            }

            .payment-option.selected {
                border-color: #3b82f6;
                background: #e0f2fe;
                box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
            }

            .payment-option-icon {
                width: 64px;
                height: 64px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 28px;
                font-weight: bold;
                color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .cash-icon {
                background: linear-gradient(135deg, #10b981, #059669);
            }

            .gcash-icon {
                background: linear-gradient(135deg, #0057d8, #003d99);
            }

            .payment-option-title {
                font-size: 1.2rem;
                font-weight: 600;
                color: #1e3a8a;
                margin: 0;
            }

            .payment-option-description {
                font-size: 0.9rem;
                color: #6b7280;
                margin: 0;
                text-align: center;
                line-height: 1.4;
            }

            .payment-option-check {
                position: absolute;
                top: 12px;
                right: 12px;
                width: 24px;
                height: 24px;
                background: #3b82f6;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                font-size: 14px;
                opacity: 0;
                transform: scale(0);
                transition: all 0.3s ease;
            }

            .payment-option.selected .payment-option-check {
                opacity: 1;
                transform: scale(1);
            }

            .continue-btn {
                background: #3b82f6;
                color: #fff;
                border: none;
                border-radius: 24px;
                padding: 14px 32px;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                width: 100%;
                max-width: 300px;
                margin: 0 auto;
                display: block;
            }

            .continue-btn:hover {
                background: #1e40af;
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
            }

            .continue-btn:disabled {
                background: #9ca3af;
                cursor: not-allowed;
                transform: none;
                box-shadow: none;
            }

            .loading-spinner {
                display: none;
                width: 20px;
                height: 20px;
                border: 2px solid #ffffff;
                border-top: 2px solid transparent;
                border-radius: 50%;
                animation: spin 1s linear infinite;
                margin-right: 8px;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            .continue-btn.loading .loading-spinner {
                display: inline-block;
            }

            .continue-btn.loading {
                pointer-events: none;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .payment-method-container {
                    max-width: 95%;
                    margin: 20px auto;
                    padding: 30px 20px;
                }
                
                .payment-method-container h2 {
                    font-size: 1.6rem;
                }
                
                .payment-options {
                    grid-template-columns: 1fr;
                    gap: 16px;
                }
                
                .payment-option {
                    padding: 20px 16px;
                }
                
                .payment-option-icon {
                    width: 56px;
                    height: 56px;
                    font-size: 24px;
                }
                
                .payment-option-title {
                    font-size: 1.1rem;
                }
                
                .payment-option-description {
                    font-size: 0.85rem;
                }
                
                .continue-btn {
                    padding: 12px 24px;
                    font-size: 1rem;
                }
            }

            @media (max-width: 480px) {
                .payment-method-container {
                    max-width: 98%;
                    margin: 15px auto;
                    padding: 20px 15px;
                }
                
                .payment-method-container h2 {
                    font-size: 1.4rem;
                }
                
                .payment-method-container p {
                    font-size: 0.9rem;
                    margin-bottom: 24px;
                }
                
                .payment-option {
                    padding: 16px 12px;
                }
                
                .payment-option-icon {
                    width: 48px;
                    height: 48px;
                    font-size: 20px;
                }
                
                .payment-option-title {
                    font-size: 1rem;
                }
                
                .payment-option-description {
                    font-size: 0.8rem;
                }
                
                .continue-btn {
                    padding: 10px 20px;
                    font-size: 0.95rem;
                }
            }
        </style>
    </x-slot:head>

    <main>
        <div class="payment-method-container">
            <h2>Choose Payment Method</h2>
            <p>Select your preferred payment method to proceed with your application.</p>

            <div class="payment-options">
                <div class="payment-option" data-method="cash" id="cashOption">
                    <div class="payment-option-check">✓</div>
                    <div class="payment-option-icon cash-icon">₱</div>
                    <div>
                        <h3 class="payment-option-title">Cash Payment</h3>
                        <p class="payment-option-description">Pay in cash at our office during business hours</p>
                    </div>
                </div>

                <div class="payment-option" data-method="gcash" id="gcashOption">
                    <div class="payment-option-check">✓</div>
                    <div class="payment-option-icon gcash-icon">G</div>
                    <div>
                        <h3 class="payment-option-title">GCash Payment</h3>
                        <p class="payment-option-description">Pay securely online using your GCash account</p>
                    </div>
                </div>
            </div>

            <button class="continue-btn" id="continueBtn" disabled>
                <span class="loading-spinner"></span>
                <span class="btn-text">Continue</span>
            </button>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cashOption = document.getElementById('cashOption');
            const gcashOption = document.getElementById('gcashOption');
            const continueBtn = document.getElementById('continueBtn');
            const btnText = document.querySelector('.btn-text');

            let selectedMethod = null;

            // Payment option click handlers
            cashOption.addEventListener('click', function() {
                selectPaymentMethod('cash');
            });

            gcashOption.addEventListener('click', function() {
                selectPaymentMethod('gcash');
            });

            function selectPaymentMethod(method) {
                // Remove previous selection
                document.querySelectorAll('.payment-option').forEach(option => {
                    option.classList.remove('selected');
                });

                // Add selection to clicked option
                if (method === 'cash') {
                    cashOption.classList.add('selected');
                } else if (method === 'gcash') {
                    gcashOption.classList.add('selected');
                }

                selectedMethod = method;
                continueBtn.disabled = false;
            }

            // Continue button handler
            continueBtn.addEventListener('click', function() {
                if (!selectedMethod) return;

                // Show loading state
                continueBtn.classList.add('loading');
                continueBtn.disabled = true;
                btnText.textContent = 'Processing...';

                // Simulate processing delay (remove in production)
                setTimeout(() => {
                    if (selectedMethod === 'gcash') {
                        // Redirect to GCash payment page
                        window.location.href = '{{ route("payment.gcash") }}';
                    } else if (selectedMethod === 'cash') {
                        // Redirect to cash payment confirmation or next step
                        // You can customize this route based on your application flow
                        window.location.href = '{{ route("payment.cash") }}';
                    }
                }, 1000);
            });

            // Add keyboard navigation support
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    if (document.activeElement === cashOption || document.activeElement === gcashOption) {
                        document.activeElement.click();
                    } else if (document.activeElement === continueBtn && !continueBtn.disabled) {
                        continueBtn.click();
                    }
                }
            });

            // Make options focusable for keyboard navigation
            cashOption.setAttribute('tabindex', '0');
            gcashOption.setAttribute('tabindex', '0');
            continueBtn.setAttribute('tabindex', '0');

            // Add focus styles
            const style = document.createElement('style');
            style.textContent = `
                .payment-option:focus {
                    outline: 2px solid #3b82f6;
                    outline-offset: 2px;
                }
                .continue-btn:focus {
                    outline: 2px solid #3b82f6;
                    outline-offset: 2px;
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</x-layout>
