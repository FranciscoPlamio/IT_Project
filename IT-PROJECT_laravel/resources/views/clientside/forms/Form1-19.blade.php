<x-layout :title="'Application for Certificate of Registration (Form 1-19)'" :form-header="['formNo' => 'NTC 1-19', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']">

    <main>
        <form class="form1-01-container" id="form119" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR CERTIFICATE OF REGISTRATION</div>
            <div class="form1-01-note"><strong>NOTE:</strong> Indicate "N/A" for items not applicable.</div>
            <div class="form1-01-warning">
                <div class="form1-01-warning-title">WARNING:</div>
                Ensure that all details in the name and date of birth fields are correct. We cannot edit those
                fields on site and you will need to set a new appointment.
                <div class="form1-01-agree"><label><input type="checkbox" /> I agree / Malinaw sa akin</label></div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList19">
                        <li class="step-item active" data-step="equipment">Type of Equipment/Device <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="applicant">Applicant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="particulars">Equipment & Devices <span
                                class="step-status">&nbsp;</span></li>
                        {{-- <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li> --}}
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-equipment">
                        <fieldset class="fieldset-compact">
                            <legend>Type of Equipment/Device</legend>
                            @php
                                $equipmentTypeValue = old('equipment_type', $form['equipment_type'] ?? '');
                            @endphp
                            <div class="form-field">
                                <label><input type="radio" name="equipment_type" value="wdn_indoor"
                                        {{ $equipmentTypeValue == 'wdn_indoor' ? 'checked' : '' }}> WIRELESS
                                    DATA NETWORK (WDN) DEVICES - INDOOR</label>
                                <label><input type="radio" name="equipment_type" value="srd"
                                        {{ $equipmentTypeValue == 'srd' ? 'checked' : '' }}> SHORT RANGE
                                    DEVICES (SRD)</label>
                                <label><input type="radio" name="equipment_type" value="rfid"
                                        {{ $equipmentTypeValue == 'rfid' ? 'checked' : '' }}> RADIO FREQUENCY
                                    IDENTIFICATION (RFID) DEVICES</label>
                                <label><input type="radio" name="equipment_type" value="srrs"
                                        {{ $equipmentTypeValue == 'srrs' ? 'checked' : '' }}> SHORT RANGE
                                    RADIO SERVICE (SRRS) DEVICES</label>
                                <label><input type="radio" name="equipment_type" value="public_trunked"
                                        {{ $equipmentTypeValue == 'public_trunked' ? 'checked' : '' }}> PUBLIC
                                    TRUNKED RADIO EQUIPMENT (MOBILE/PORTABLE)</label>
                                @error('equipment_type')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-applicant">
                        <fieldset>
                            <legend>Applicant's Details</legend>
                            <div class="form-grid-1">
                                <div class="form-field">
                                    <label class="form-label">Applicant</label>
                                    <input class="form1-01-input" type="text" name="applicant" required
                                        value="{{ old('applicant', $form['applicant'] ?? '') }}">
                                    @error('applicant')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- address fields -->
                            <x-forms.address-fields :form="$form ?? []" />

                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Validity</label>
                                    <input class="form1-01-input" type="date" name="validity"
                                        value="{{ old('validity', $form['validity'] ?? '') }}">
                                    @error('validity')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Permit to Import No.</label>
                                    <input class="form1-01-input" type="text" name="permit_import_no"
                                        value="{{ old('permit_import_no', $form['permit_import_no'] ?? '') }}">
                                    @error('permit_import_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Invoice No.</label>
                                    <input class="form1-01-input" type="text" name="invoice_no"
                                        value="{{ old('invoice_no', $form['invoice_no'] ?? '') }}">
                                    @error('invoice_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">CPCN/PA/RSL No.</label>
                                    <input class="form1-01-input" type="text" name="cpcn_pa_rsl_no"
                                        value="{{ old('cpcn_pa_rsl_no', $form['cpcn_pa_rsl_no'] ?? '') }}">
                                    @error('cpcn_pa_rsl_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-particulars">
                        <fieldset>
                            <legend>Particulars of Equipment & Devices</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Make/Type/Model</th>
                                            <th>Quantity</th>
                                            <th>Serial Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment1_make"
                                                    value="{{ old('equipment1_make', $form['equipment1_make'] ?? '') }}">
                                                @error('equipment1_make')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="number" name="equipment1_quantity"
                                                    value="{{ old('equipment1_quantity', $form['equipment1_quantity'] ?? '') }}">
                                                @error('equipment1_quantity')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment1_serial"
                                                    value="{{ old('equipment1_serial', $form['equipment1_serial'] ?? '') }}">
                                                @error('equipment1_serial')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment2_make"
                                                    value="{{ old('equipment2_make', $form['equipment2_make'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="number" name="equipment2_quantity"
                                                    value="{{ old('equipment2_quantity', $form['equipment2_quantity'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment2_serial"
                                                    value="{{ old('equipment2_serial', $form['equipment2_serial'] ?? '') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment3_make"
                                                    value="{{ old('equipment3_make', $form['equipment3_make'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="number" name="equipment3_quantity"
                                                    value="{{ old('equipment3_quantity', $form['equipment3_quantity'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment3_serial"
                                                    value="{{ old('equipment3_serial', $form['equipment3_serial'] ?? '') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment4_make"
                                                    value="{{ old('equipment4_make', $form['equipment4_make'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="number" name="equipment4_quantity"
                                                    value="{{ old('equipment4_quantity', $form['equipment4_quantity'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment4_serial"
                                                    value="{{ old('equipment4_serial', $form['equipment4_serial'] ?? '') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment5_make"
                                                    value="{{ old('equipment5_make', $form['equipment5_make'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="number" name="equipment5_quantity"
                                                    value="{{ old('equipment5_quantity', $form['equipment5_quantity'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment5_serial"
                                                    value="{{ old('equipment5_serial', $form['equipment5_serial'] ?? '') }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- TOTAL of Quantity (Form1-19 )-->

                            <!-- CAPTCHA fields -->
                            <div class="form-field"
                                style="margin:12px 0; display:flex; flex-direction:column; align-items:center;">
                                <div class="g-recaptcha"
                                    data-sitekey="{{ env('RECAPTCHA_SITE_KEY', 'your_site_key') }}"></div>
                                @if (session('captcha_error'))
                                    <p class="text-red text-sm mt-1">{{ session('captcha_error') }}</p>
                                @endif
                            </div>
                            <div class="step-actions"><button class="form1-01-btn" type="button"
                                    id="validateBtn">Proceed to Validation</button></div>
                        </fieldset>
                    </section>
                    {{-- <!-- Declaration fields component -->
                    <x-forms.declaration-field :form="$form ?? []" /> --}}
        </form>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            (function() {
                const stepsOrder = ['equipment', 'applicant', 'particulars']; // declaration removed
                const stepsList = document.getElementById('stepsList19');
                const form = document.getElementById('form119');

                function showStep(step) {
                    stepsList.querySelectorAll('.step-item').forEach(li => {
                        li.classList.toggle('active', li.dataset.step === step);
                    });
                    document.querySelectorAll('.step-content').forEach(s => {
                        s.classList.toggle('active', s.id === `step-${step}`);
                    });
                }

                function currentStep() {
                    const active = stepsList.querySelector('.step-item.active');
                    return active ? active.dataset.step : stepsOrder[0];
                }

                function go(delta) {
                    const idx = stepsOrder.indexOf(currentStep());
                    const nextIdx = Math.max(0, Math.min(stepsOrder.length - 1, idx + delta));
                    showStep(stepsOrder[nextIdx]);
                }

                function validateGroups(section) {
                    let ok = true;
                    section.querySelectorAll('[data-require-one]').forEach(group => {
                        const selector = group.getAttribute('data-require-one');
                        const items = group.querySelectorAll(selector);
                        const anyChecked = Array.from(items).some(el => (el.type === 'checkbox' || el.type ===
                            'radio') ? el.checked : Boolean(el.value));
                        if (!anyChecked) ok = false;
                    });
                    return ok;
                }

                function validateActiveStep() {
                    const step = currentStep();
                    const section = document.getElementById(`step-${step}`);
                    let valid = true;
                    section.querySelectorAll('input[required], select[required], textarea[required]').forEach(el => {
                        if (el.type === 'radio') {
                            const name = el.name;
                            const group = section.querySelectorAll(`input[type=radio][name="${name}"]`);
                            const anyChecked = Array.from(group).some(r => r.checked);
                            if (!anyChecked) valid = false;
                        } else if (!el.value) {
                            valid = false;
                        }
                    });
                    if (!validateGroups(section)) valid = false;

                    const li = stepsList.querySelector(`.step-item[data-step="${step}"]`);
                    if (valid) {
                        li.classList.add('completed');
                        li.querySelector('.step-status').textContent = 'Done';
                    } else {
                        li.classList.remove('completed');
                        li.querySelector('.step-status').textContent = '';
                    }
                    return valid;
                }

                stepsList.addEventListener('click', (e) => {
                    const li = e.target.closest('.step-item');
                    if (!li) return;
                    showStep(li.dataset.step);
                });

                document.querySelectorAll('[data-next]').forEach(btn => btn.addEventListener('click', () => {
                    if (validateActiveStep()) go(1);
                }));
                document.querySelectorAll('[data-prev]').forEach(btn => btn.addEventListener('click', () => go(-1)));

                const validateBtn = document.getElementById('validateBtn');
                if (validateBtn) {
                    validateBtn.addEventListener('click', async () => {
                        const formData = new FormData(form);
                        formData.forEach((value, key) => {
                            console.log(`${key}: ${value}`);
                        });
                        if (!validateActiveStep()) return;
                        try {
                            if (window.grecaptcha) {
                                const captchaResponse = window.grecaptcha.getResponse();
                                if (!captchaResponse) {
                                    const errorDiv = document.createElement('p');
                                    errorDiv.className = 'text-red text-sm mt-1';
                                    errorDiv.textContent = 'Please complete the CAPTCHA before proceeding.';
                                    document.querySelector('.g-recaptcha').parentNode.appendChild(errorDiv);
                                    return;
                                }
                            }
                        } catch (e) {}
                        form.submit();

                        // -- commented AJAX for now--
                        // -- uncomment if fixed -Richmond

                        //const formData = new FormData(form);
                        // try {
                        //     const res = await fetch(form.action, {
                        //         method: 'POST',
                        //         headers: {
                        //             'Content-Type': 'application/json',
                        //             'Accept': 'application/json'
                        //         },
                        //         body: formData
                        //     });
                        //     const text = await res.text();
                        //     console.log(text);
                        //     let json = null;
                        //     try {
                        //         json = JSON.parse(text);
                        //     } catch (e) {}
                        //     if (res.ok) {
                        //         if (json.form_token) {
                        //             localStorage.setItem('form_token', json.form_token);
                        //         }
                        //         localStorage.setItem('active-form', '1-19');
                        //         if (validationLink19) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink19.href, window.location.origin);
                        //             if (token) url.searchParams.set('token', token);
                        //             window.location.href = url.toString();
                        //         }
                        //     } else {
                        //         console.error('Save failed payload:', json || text);
                        //         alert('Failed to save. Details logged to console.');
                        //     }
                        // } catch (e) {
                        //     console.error('Network error:', e);
                        //     alert('Network error. Please try again.');
                        // }
                    });
                }

                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
