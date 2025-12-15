<x-layout :title="'Validation'" :showNavbar=false>
    <div class="form1-01-container">
        <div class="form1-01-header">Validation Phase: Review Your Application</div>
        <div class="validation-section-title">Please review your details before final submission:</div>
        <dl class="validation-list" id="validationList"></dl>
        <hr>
        <div id="attachments-container" data-form-type="{{ $formType }}" class="mt-8">
            <div class="rounded-2xl border border-gray-200 bg-white/80 p-6 shadow-sm">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-lg font-semibold text-gray-900">Upload Requirements</p>
                        <p class="text-sm text-gray-600">
                            Attach the documents requested below. Accepted formats: PDF, JPG, PNG (max 10&nbsp;MB per
                            file).
                        </p>
                    </div>
                    <span id="attachmentStatusPill"
                        class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                        Waiting for files
                    </span>
                </div>

                <ul class="mt-4 grid gap-2 text-sm text-gray-600 sm:grid-cols-2">
                    <li class="flex items-start gap-2">
                        <span class="mt-1 h-2 w-2 rounded-full bg-emerald-400"></span>
                        Gather clear scans or photos before uploading.
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1 h-2 w-2 rounded-full bg-sky-400"></span>
                        Click each file field to attach the required document.
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1 h-2 w-2 rounded-full bg-amber-400"></span>
                        You may replace an upload anytime before payment.
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1 h-2 w-2 rounded-full bg-rose-400"></span>
                        Proceed to payment unlocks once all uploads are complete.
                    </li>
                </ul>

                <div data-role="attachment-fields" class="mt-6 space-y-5" aria-live="polite"></div>
                <p id="attachmentStatusMessage" class="mt-4 text-sm text-gray-600">No files uploaded yet.</p>
            </div>
        </div>
        {{-- Payment Method Selection --}}
        <div class="payment-method-container">
            <h2>Choose Payment Method</h2>
            <p>Select your preferred payment method to proceed with your application.</p>

            <div class="payment-options">


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
            <x-forms.cancel-validation :formType="$targetFormType" />
            <button class="form1-01-btn" id="proceedPayment" href="">Proceed to
                Payment</button>
            <form id="paymentForm" enctype="multipart/form-data"
                action="{{ route('forms.submit', ['formType' => $formType]) }}" method="POST" style="display:none;">
                @csrf
                <input type="hidden" name="payment_method" id="paymentMethodInput">
            </form>
        </div>
    </div>
    </div>

    <script type="module">
        // No in-page canvas preview; use inline preview via new tab

        function formatKey(key) {
            let newKey = key.replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
            if (newKey == "Dob") {
                newKey = "Date of Birth";
                return newKey;
            }
            if (newKey == "Needs") {
                newKey = "Special Needs/ Requests during examination"
            }
            return newKey;
        }

        // Map of checkbox values -> human-readable labels from Form1-01
        const checkboxLabelMaps = {
            "class_a_e8910_code5": "Class A - Elements 8, 9, 10 & Code (5 wpm)",
            "class_a_code5_only": "Class A - Code (5 wpm) Only",
            "class_b_e567": "Class B - Elements 5, 6 & 7",
            "class_b_e2": "Class B - Element 2",
            "class_c_e234": "Class C - Elements 2, 3 & 4",
            "class_d_e2": "Class D - Element 2",
            "1rtg_e1256_code25": "1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)",
            "1rtg_code25": "1RTG - Code (25/20 wpm)",
            "2rtg_e1256_code16": "2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)",
            "2rtg_code16": "2RTG - Code (16 wpm)",
            "3rtg_e125_code16": "3RTG - Elements 1, 2, 5 & Code (16 wpm)",
            "3rtg_code16": "3RTG - Code (16 wpm)",
            "1phn_e1234": "1PHN - Elements 1, 2, 3 & 4",
            "2phn_e123": "2PHN - Elements 1, 2 & 3",
            "3phn_e12": "3PHN - Elements 1 & 2",
            "rroc_aircraft_e1": "RROC - Aircraft - Element 1"
        };

        // Function to capitalize first letter of each word
        function capitalizeFirstLetter(str) {
            if (!str || typeof str !== 'string') return str;
            // Split by spaces, capitalize first letter of each word, then join
            return str.split(' ').map(word => {
                if (word.length === 0) return word;
                return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
            }).join(' ');
        }

        function formatValue(key, rawValue) {
            // If the field is a file input, show just the file name
            if (key === 'id_picture' || key === 'admit_id_picture') {
                if (!rawValue) return 'No file selected';
                if (Array.isArray(rawValue)) {
                    const fileNames = rawValue.map(v => (v && typeof v === 'string' ? v.split('\\').pop().split('/').pop() :
                            ''))
                        .filter(Boolean)
                        .join(', ');
                    return capitalizeFirstLetter(fileNames);
                }
                const fileName = typeof rawValue === 'string' && rawValue.length > 0 ?
                    rawValue.split('\\').pop().split('/').pop() :
                    'No file selected';
                return capitalizeFirstLetter(fileName);
            }

            // Map checkbox values to their labels when applicable
            const map = checkboxLabelMaps[rawValue];
            if (key === 'exam_type') {
                if (map) {
                    return map; // Already properly formatted
                }
            }

            if (key === 'needs') {
                if (rawValue === '0') {
                    return 'None';
                } else if (rawValue === '1') {
                    return 'Yes';
                }
            }

            // Default formatting
            if (Array.isArray(rawValue)) {
                const joined = rawValue.join(', ');
                return capitalizeFirstLetter(joined);
            }
            const value = rawValue ?? '';
            return capitalizeFirstLetter(String(value));
        }

        const server101 = JSON.parse('{!! json_encode(isset($form) ? $form : null) !!}');
        window.formData = server101; // now available globally
        const data = {}; // always prefer server; keep empty to avoid localStorage conflicts
        const list = document.getElementById('validationList');


        // Render textual summary list for quick review
        function renderFormData(formData, formType) {
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
                dt.classList.add('inline', 'font-semibold', 'mr-1'); // inline + bold + small space after
                dt.textContent = formatKey(key) + ":"; // add the colon

                const dd = document.createElement('dd');
                dd.classList.add('inline'); // inline so it stays on the same line
                dd.textContent = value;

                const wrapper = document.createElement('div'); // wrapper for each pair
                wrapper.classList.add('mb-2'); // vertical spacing between pairs

                list.appendChild(dt);
                list.appendChild(dd);
                list.appendChild(wrapper); // append wrapper instead of br
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
            const inputs = document.querySelectorAll("input[type='file']");
            console.log(inputs);

            // Check if payment method is selected
            if (!selectedPaymentMethod) {
                alert('Please select a payment method before proceeding.');
                return;
            }

            inputs.forEach((input) => {
                form.appendChild(input);
            })
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

            if (typeof window.__revalidateAttachments === 'function') {
                window.__revalidateAttachments();
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
