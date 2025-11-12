<x-layout :title="'Validation'" :showNavbar=false>
    <div class="form1-01-container">
        <div class="form1-01-header">Validation Phase: Review Your Application</div>
        <div class="validation-section-title">Please review your details before final submission:</div>
        <dl class="validation-list" id="validationList"></dl>

        {{-- Payment Method Selection --}}
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

        </div>
        <div class="validation-btns">
            <a class="form1-01-btn" id="backToEditBtn" href="#">Back to Edit</a>
            <x-forms.cancel-validation />
            <a class="form1-01-btn" id="proceedPayment" href="" disabled>Proceed to Payment</a>
            <form id="paymentForm" action="{{ route('forms.submit', ['formType' => $formType]) }}" method="POST"
                style="display:none;">
                @csrf
                <input type="hidden" name="payment_method" id="paymentMethodInput">
            </form>
        </div>
    </div>
    </div>

    <script>
        // No in-page canvas preview; use inline preview via new tab

        function formatKey(key) {
            let newKey = key.replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
            if (newKey == "Dob") {
                newKey = "Date of Birth";
                return newKey;
            }
            return newKey;
        }

        // Map of checkbox values -> human-readable labels from Form1-01
        const checkboxLabelMaps = {
            rtg: {
                '1rtg_e1256_code25': '1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)',
                '1rtg_code25': '1RTG - Code (25/20 wpm)',
                '2rtg_e1256_code16': '2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)',
                '2rtg_code16': '2RTG - Code (16 wpm)',
                '3rtg_e125_code16': '3RTG - Elements 1, 2, 5 & Code (16 wpm)',
                '3rtg_code16': '3RTG - Code (16 wpm)'
            },
            amateur: {
                'class_a_e8910_code5': 'Class A - Elements 8, 9, 10 & Code (5 wpm)',
                'class_a_code5_only': 'Class A - Code (5 wpm) Only',
                'class_b_e567': 'Class B - Elements 5, 6 & 7',
                'class_b_e2': 'Class B - Element 2',
                'class_c_e234': 'Class C - Elements 2, 3 & 4',
                'class_d_e2': 'Class D - Element 2'
            },
            rphn: {
                '1phn_e1234': '1PHN - Elements 1, 2, 3 & 4',
                '2phn_e123': '2PHN - Elements 1, 2 & 3',
                '3phn_e12': '3PHN - Elements 1 & 2'
            },
            rroc: {
                'rroc_aircraft_e1': 'RROC - Aircraft - Element 1'
            }
        };

        function formatValue(key, rawValue) {
            // If the field is a file input, show just the file name
            if (key === 'id_picture' || key === 'admit_id_picture') {
                if (!rawValue) return 'No file selected';
                if (Array.isArray(rawValue)) {
                    return rawValue.map(v => (v && typeof v === 'string' ? v.split('\\').pop().split('/').pop() : ''))
                        .filter(Boolean)
                        .join(', ');
                }
                return typeof rawValue === 'string' && rawValue.length > 0 ?
                    rawValue.split('\\').pop().split('/').pop() :
                    'No file selected';
            }

            // Map checkbox values to their labels when applicable
            const map = checkboxLabelMaps[key];
            if (map) {
                if (Array.isArray(rawValue)) {
                    return rawValue.map(v => map[v] || v).join(', ');
                }
                return map[rawValue] || rawValue || '';
            }

            // Default formatting
            if (Array.isArray(rawValue)) return rawValue.join(', ');
            return rawValue ?? '';
        }

        const server101 = JSON.parse('{!! json_encode(isset($form) ? $form : null) !!}');
        const data = {}; // always prefer server; keep empty to avoid localStorage conflicts
        const list = document.getElementById('validationList');


        // Render textual summary list for quick review
        function renderFormData(formData, formType = '1-01') {
            const titleEl = document.querySelector('.validation-section-title');
            if (titleEl) {
                titleEl.textContent = `Form ${formType} Details:`;
            }

            list.innerHTML = '';
            if (!formData || typeof formData !== 'object') {
                const dt = document.createElement('dt');
                dt.textContent = 'No Data';
                const dd = document.createElement('dd');
                dd.textContent = 'No form data available';
                list.appendChild(dt);
                list.appendChild(dd);
                return;
            }

            for (const key in formData) {
                if (key === 'form_token' || key === '_id' || key === 'user_id' || key === 'created_at' || key ===
                    'updated_at') continue;
                const value = formatValue(key, formData[key]);
                if (value === '' || value === null || value === undefined) continue;
                const dt = document.createElement('dt');
                dt.textContent = formatKey(key);
                console.log(dt.textContent);
                const dd = document.createElement('dd');
                dd.textContent = value;
                list.appendChild(dt);
                list.appendChild(dd);
            }
        }


        // Wire Back to Edit with token
        (function wireBackToEdit() {
            try {

                const btn = document.getElementById('backToEditBtn');
                if (!btn) return;
                const tokenFromServer = server101 && server101.form_token ? server101.form_token : '';
                const tokenFromQuery = new URLSearchParams(window.location.search).get('token');
                const storedToken = localStorage.getItem('form_token') || '';
                const token = tokenFromServer || tokenFromQuery || storedToken;

                const formType = @json($formType);
                const urlString = @json(route('forms.edit', ['formType' => $formType]));
                const url = new URL(urlString, window.location.origin);

                if (token) url.searchParams.set('token', token);
                btn.href = url.toString();
            } catch (e) {
                /* noop */
            }
        })();

        const link = document.getElementById('proceedPayment');
        const form = document.getElementById('paymentForm');

        // Get token from URL
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token');

        if (token) {
            // Create hidden input dynamically
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'token';
            input.value = token;
            form.appendChild(input);
        }

        link.addEventListener('click', function(event) {
            event.preventDefault(); // prevent normal link behavior

            // Check if payment method is selected
            if (!selectedPaymentMethod) {
                alert('Please select a payment method before proceeding.');
                return;
            }

            // Redirect to transaction page with payment method
            form.submit();
        });

        // Payment Method Selection JavaScript
        const cashOption = document.getElementById('cashOption');
        const gcashOption = document.getElementById('gcashOption');
        const proceedPaymentBtn = document.getElementById('proceedPayment');

        let selectedPaymentMethod = null;

        // Payment option click handlers
        if (cashOption) {
            cashOption.addEventListener('click', function() {
                selectPaymentMethod('cash');
            });
        }

        if (gcashOption) {
            gcashOption.addEventListener('click', function() {
                selectPaymentMethod('gcash');
            });
        }
        const paymentInput = document.getElementById('paymentMethodInput');

        function selectPaymentMethod(method) {
            // Remove previous selection
            document.querySelectorAll('.payment-option').forEach(option => {
                option.classList.remove('selected');
            });
            // Add selection to clicked option
            if (method === 'cash' && cashOption) {
                cashOption.classList.add('selected');
                paymentInput.value = method;
            } else if (method === 'gcash' && gcashOption) {
                gcashOption.classList.add('selected');
                paymentInput.value = method;
            }

            selectedPaymentMethod = method;
            if (proceedPaymentBtn) {
                proceedPaymentBtn.removeAttribute('disabled');
                proceedPaymentBtn.style.opacity = '1';
                proceedPaymentBtn.style.cursor = 'pointer';
            }
        }

        // Add keyboard navigation support for payment options
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                if (document.activeElement === cashOption || document.activeElement === gcashOption) {
                    document.activeElement.click();
                }
            }
        });

        // Make payment options focusable for keyboard navigation
        if (cashOption) cashOption.setAttribute('tabindex', '0');
        if (gcashOption) gcashOption.setAttribute('tabindex', '0');

        // Add focus styles for payment options
        const paymentStyle = document.createElement('style');
        paymentStyle.textContent = `
                .payment-option:focus {
                    outline: 2px solid #3b82f6;
                    outline-offset: 2px;
                }
                #proceedPayment:disabled {
                    opacity: 0.5;
                    cursor: not-allowed;
                }
            `;
        document.head.appendChild(paymentStyle);

        // Show only the active form (fallback to whichever has data)
        renderFormData(server101, @json($formType));
    </script>
</x-layout>
