<x-layout :title="'Cash Payment Confirmation'">
    <x-slot:head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .cash-payment-container {
                max-width: 600px;
                margin: 40px auto;
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 0 8px rgba(0, 0, 0, 0.07);
                padding: 40px 32px 32px 32px;
                text-align: center;
            }

            .cash-payment-container h2 {
                margin: 0 0 8px 0;
                font-size: 2rem;
                font-weight: 700;
                color: #1e3a8a;
            }

            .cash-payment-container p {
                margin: 0 0 32px 0;
                color: #6b7280;
                font-size: 1rem;
                line-height: 1.5;
            }

            .payment-info {
                background: #f8fafc;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 24px;
                margin-bottom: 32px;
                text-align: left;
            }

            .payment-info h3 {
                margin: 0 0 16px 0;
                font-size: 1.2rem;
                font-weight: 600;
                color: #1e3a8a;
            }

            .info-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 12px 0;
                border-bottom: 1px solid #e5e7eb;
            }

            .info-item:last-child {
                border-bottom: none;
            }

            .info-label {
                font-weight: 500;
                color: #374151;
            }

            .info-value {
                color: #1e3a8a;
                font-weight: 600;
            }

            .office-hours {
                background: #e0f2fe;
                border: 1px solid #3b82f6;
                border-radius: 8px;
                padding: 20px;
                margin: 24px 0;
            }

            .office-hours h4 {
                margin: 0 0 12px 0;
                color: #1e40af;
                font-size: 1.1rem;
                font-weight: 600;
            }

            .office-hours p {
                margin: 0 0 8px 0;
                color: #1e40af;
                font-size: 0.95rem;
            }

            .office-hours p:last-child {
                margin-bottom: 0;
            }

            .action-buttons {
                display: flex;
                gap: 16px;
                justify-content: center;
                margin-top: 32px;
            }

            .btn {
                padding: 12px 24px;
                border-radius: 24px;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-block;
                text-align: center;
                min-width: 120px;
            }

            .btn-primary {
                background: #3b82f6;
                color: #fff;
                border: none;
            }

            .btn-primary:hover {
                background: #1e40af;
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
            }

            .btn-secondary {
                background: #f3f4f6;
                color: #374151;
                border: 1px solid #d1d5db;
            }

            .btn-secondary:hover {
                background: #e5e7eb;
                transform: translateY(-2px);
            }

            .success-icon {
                width: 64px;
                height: 64px;
                background: linear-gradient(135deg, #10b981, #059669);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 24px auto;
                font-size: 28px;
                color: #fff;
            }

            /* Responsive Design */
            @media (max-width: 768px) {
                .cash-payment-container {
                    max-width: 95%;
                    margin: 20px auto;
                    padding: 30px 20px;
                }
                
                .cash-payment-container h2 {
                    font-size: 1.6rem;
                }
                
                .payment-info {
                    padding: 20px;
                }
                
                .office-hours {
                    padding: 16px;
                }
                
                .action-buttons {
                    flex-direction: column;
                    gap: 12px;
                }
                
                .btn {
                    width: 100%;
                    max-width: 300px;
                }
            }

            @media (max-width: 480px) {
                .cash-payment-container {
                    max-width: 98%;
                    margin: 15px auto;
                    padding: 20px 15px;
                }
                
                .cash-payment-container h2 {
                    font-size: 1.4rem;
                }
                
                .cash-payment-container p {
                    font-size: 0.9rem;
                }
                
                .payment-info {
                    padding: 16px;
                }
                
                .info-item {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 4px;
                }
                
                .office-hours {
                    padding: 12px;
                }
                
                .btn {
                    padding: 10px 20px;
                    font-size: 0.95rem;
                }
            }
        </style>
    </x-slot:head>

    <main>
        <div class="cash-payment-container">
            <div class="success-icon">✓</div>
            <h2>Cash Payment Selected</h2>
            <p>You have chosen to pay in cash. Please visit our office during business hours to complete your payment.</p>

            <div class="payment-info">
                <h3>Payment Information</h3>
                <div class="info-item">
                    <span class="info-label">Payment Method:</span>
                    <span class="info-value">Cash</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Amount:</span>
                    <span class="info-value">₱500.00</span>
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

            <div class="action-buttons">
                <a href="{{ route('forms.list') }}" class="btn btn-primary">
                    Continue to Forms
                </a>
                <a href="{{ route('payment.method') }}" class="btn btn-secondary">
                    Change Payment Method
                </a>
            </div>
        </div>
    </main>
</x-layout>
