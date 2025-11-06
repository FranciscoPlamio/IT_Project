<x-layout :title="'Application for Permit to Purchase/Possess/Sell/Transfer (Form 1-09)'" :form-header="['formNo' => 'NTC 1-09', 'revisionNo' => '03', 'revisionDate' => '03/31/2023']">

    <main>
        <form class="form1-01-container" id="form109" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER</div>
            <div class="form1-01-note"><strong>NOTE:</strong> The system asks for additional info when applicant is
                a minor.</div>
            <div class="form1-01-warning">
                <div class="form1-01-warning-title">WARNING:</div> Ensure that all details in critical
                identification fields are correct. Incorrect entries may require setting a new appointment.<div
                    class="form1-01-agree"><label><input type="checkbox" id="warning-agreement" /> I agree / Malinaw sa
                        akin</label></div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList09">
                        <li class="step-item active" data-step="personal">Applicant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="application">Application Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="station">Station/Equipment Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="source">Source of Equipment <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="intended">Intended Use <span class="step-status">&nbsp;</span>
                        </li>
                        {{-- <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li> --}}
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-personal">

                        <!-- Error header -->
                        <x-forms.error-header />

                        <fieldset>
                            <legend>Applicant's Details</legend>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Applicant</label>
                                    <input class="form1-01-input" type="text" name="applicant" required
                                        value="{{ old('applicant', $form['applicant'] ?? '') }}">
                                    @error('applicant')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">CPC/CPCN/PA/RSL No.</label>
                                    <input class="form1-01-input" type="text" name="cpc_cpcn_pa_rsl_no"
                                        value="{{ old('cpc_cpcn_pa_rsl_no', $form['cpc_cpcn_pa_rsl_no'] ?? '') }}">
                                    @error('cpc_cpcn_pa_rsl_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Validity</label>
                                    <input class="form1-01-input" type="date" name="validity"
                                        value="{{ old('validity', $form['validity'] ?? '') }}">
                                    @error('validity')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- address fields format -->
                            <x-forms.address-fields :form="$form ?? []" />

                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-application">
                        @php
                            $applicationTypeValue = old('application_type', $form['application_type'] ?? '');
                        @endphp

                        <div class="form-grid-2">
                            <div class="form-field" data-require-one="input[type=radio]">
                                <fieldset class="sub-fieldset form-field">
                                    <legend>Type of Application</legend>
                                    <label><input type="radio" name="application_type" value="purchase"
                                            {{ $applicationTypeValue == 'purchase' ? 'checked' : '' }}>
                                        PURCHASE</label>
                                    <label><input type="radio" name="application_type" value="possess"
                                            {{ $applicationTypeValue == 'possess' ? 'checked' : '' }}>
                                        POSSESS</label>
                                    <label><input type="radio" name="application_type" value="sell_transfer"
                                            {{ $applicationTypeValue == 'sell_transfer' ? 'checked' : '' }}>
                                        SELL/TRANSFER</label>
                                    @error('application_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>
                            @php
                                $radioServiceValue = old('radio_service', $form['radio_service'] ?? '');
                            @endphp
                            <div class="form-field" data-require-one="input[type=radio]">
                                <fieldset class="sub-fieldset form-field">
                                    <legend>Type of Radio Service</legend>
                                    <label><input type="radio" name="radio_service" value="fixed_land_mobile"
                                            {{ $radioServiceValue == 'fixed_land_mobile' ? 'checked' : '' }}>
                                        FIXED AND LAND MOBILE</label>
                                    <label><input type="radio" name="radio_service" value="aeronautical"
                                            {{ $radioServiceValue == 'aeronautical' ? 'checked' : '' }}>
                                        AERONAUTICAL</label>
                                    <label><input type="radio" name="radio_service" value="maritime"
                                            {{ $radioServiceValue == 'maritime' ? 'checked' : '' }}>
                                        MARITIME</label>
                                    <label><input type="radio" name="radio_service" value="broadcast"
                                            {{ $radioServiceValue == 'broadcast' ? 'checked' : '' }}>
                                        BROADCAST</label>
                                    <label><input type="radio" name="radio_service" value="amateur"
                                            {{ $radioServiceValue == 'amateur' ? 'checked' : '' }}>
                                        AMATEUR</label>
                                    <label><input type="radio" name="radio_service" value="others"
                                            {{ $radioServiceValue == 'others' ? 'checked' : '' }}>
                                        OTHERS, specify</label>
                                    @error('radio_service')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <input class="form1-01-input" type="text" name="others_specify"
                                        value="{{ old('others_specify', $form['others_specify'] ?? '') }}">
                                    @error('others_specify')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-grid-2">
                            @php
                                $natureServiceValue = old('nature_service', $form['nature_service'] ?? '');
                            @endphp
                            <div class="form-field" data-require-one="input[type=radio]">
                                <fieldset class="sub-fieldset form-field">
                                    <legend>Nature of Service</legend>
                                    <label><input type="radio" name="nature_service" value="cv_private"
                                            {{ $natureServiceValue == 'cv_private' ? 'checked' : '' }}> CV
                                        (PRIVATE)</label>
                                    <label><input type="radio" name="nature_service" value="co_government"
                                            {{ $natureServiceValue == 'co_government' ? 'checked' : '' }}> CO
                                        (GOVERNMENT)</label>
                                    <label><input type="radio" name="nature_service" value="cp_public"
                                            {{ $natureServiceValue == 'cp_public' ? 'checked' : '' }}> CP
                                        (PUBLIC CORRESPONDENCE)</label>
                                    @error('nature_service')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="form-field">
                                <fieldset class="sub-fieldset form-field">
                                    <!-- Class of Station field -->
                                    <x-forms.class-station-field :form="$form ?? []" />
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-field">
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </div>
                    </section>

                    <section class="step-content" id="step-station">
                        <fieldset class="fieldset-compact">
                            <legend>Particulars of Proposed Station/Equipment</legend>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Exact Location</label>
                                    <input class="form1-01-input" type="text" name="exact_location" required
                                        value="{{ old('exact_location', $form['exact_location'] ?? '') }}">
                                    @error('exact_location')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Longitude (deg-min-sec)</label>
                                    <input class="form1-01-input" type="text" name="longitude"
                                        value="{{ old('longitude', $form['longitude'] ?? '') }}">
                                    @error('longitude')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Latitude (deg-min-sec)</label>
                                    <input class="form1-01-input" type="text" name="latitude"
                                        value="{{ old('latitude', $form['latitude'] ?? '') }}">
                                    @error('latitude')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Points of Comm/Service Area</label>
                                    <input class="form1-01-input" type="text" name="points_of_comm"
                                        value="{{ old('points_of_comm', $form['points_of_comm'] ?? '') }}">
                                    @error('points_of_comm')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Frequency</label>
                                    <input class="form1-01-input" type="text" name="frequency"
                                        value="{{ old('frequency', $form['frequency'] ?? '') }}">
                                    @error('frequency')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Make/Type/Model</label>
                                    <input class="form1-01-input" type="text" name="make_type_model"
                                        value="{{ old('make_type_model', $form['make_type_model'] ?? '') }}">
                                    @error('make_type_model')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Serial Number</label>
                                    <input class="form1-01-input" type="text" name="serial_number"
                                        value="{{ old('serial_number', $form['serial_number'] ?? '') }}">
                                    @error('serial_number')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Bandwidth & Emission</label>
                                    <input class="form1-01-input" type="text" name="bandwidth_emission"
                                        value="{{ old('bandwidth_emission', $form['bandwidth_emission'] ?? '') }}">
                                    @error('bandwidth_emission')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Power Output</label>
                                    <input class="form1-01-input" type="text" name="power_output"
                                        value="{{ old('power_output', $form['power_output'] ?? '') }}">
                                    @error('power_output')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Frequency Range</label>
                                    <input class="form1-01-input" type="text" name="frequency_range"
                                        value="{{ old('frequency_range', $form['frequency_range'] ?? '') }}">
                                    @error('frequency_range')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-source">
                        <fieldset class="fieldset-compact">
                            <legend>Source of Equipment</legend>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Name of Dealer</label>
                                    <input class="form1-01-input" type="text" name="dealer_name"
                                        value="{{ old('dealer_name', $form['dealer_name'] ?? '') }}">
                                    @error('dealer_name')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Authorized
                                        Seller/Buyer</label>
                                    <input class="form1-01-input" type="text" name="authorized_seller_buyer"
                                        value="{{ old('authorized_seller_buyer', $form['authorized_seller_buyer'] ?? '') }}">
                                    @error('authorized_seller_buyer')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">OR/Invoice No.</label>
                                    <input class="form1-01-input" type="text" name="or_invoice_no"
                                        value="{{ old('or_invoice_no', $form['or_invoice_no'] ?? '') }}">
                                    @error('or_invoice_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Permit/RSL No.</label>
                                    <input class="form1-01-input" type="text" name="permit_rsl_no"
                                        value="{{ old('permit_rsl_no', $form['permit_rsl_no'] ?? '') }}">
                                    @error('permit_rsl_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-intended">
                        <fieldset class="fieldset-compact">
                            <legend>Intended Use of Equipment</legend>
                            @error('intended_use')
                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                            @enderror
                            @php
                                $intendedUseValue = old('intended_use', $form['intended_use'] ?? '');
                            @endphp
                            <div class="form-field" data-require-one="input[type=radio]">
                                <label><input type="radio" name="intended_use" value="new_radio_station"
                                        {{ $intendedUseValue == 'new_radio_station' ? 'checked' : '' }}> New
                                    Radio Station</label>
                                <label><input type="radio" name="intended_use" value="additional_radio_station"
                                        {{ $intendedUseValue == 'additional_radio_station' ? 'checked' : '' }}>
                                    Additional Radio Station</label>
                                <label><input type="radio" name="intended_use" value="change_equipment"
                                        {{ $intendedUseValue == 'change_equipment' ? 'checked' : '' }}>
                                    Change of Equipment</label>
                                <label><input type="radio" name="intended_use" value="additional_equipment"
                                        {{ $intendedUseValue == 'additional_equipment' ? 'checked' : '' }}>
                                    Additional Equipment</label>
                                <label><input type="radio" name="intended_use" value="storage"
                                        {{ $intendedUseValue == 'storage' ? 'checked' : '' }}> Storage
                                    at:</label>
                                <input class="form1-01-input" type="text" name="storage_location"
                                    placeholder="Location"
                                    value="{{ old('storage_location', $form['storage_location'] ?? '') }}">
                                @error('storage_location')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <label><input type="radio" name="intended_use" value="others_use"
                                        {{ $intendedUseValue == 'others_use' ? 'checked' : '' }}> Others,
                                    specify</label>

                                <input class="form1-01-input" type="text" name="others_use_specify"
                                    placeholder="Specify"
                                    value="{{ old('others_use_specify', $form['others_use_specify'] ?? '') }}">
                                @error('others_use_specify')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
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
                </div>
            </div>
        </form>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            (function() {
                const stepsOrder = ['personal', 'application', 'station', 'source', 'intended']; // declaration removed
                const stepsList = document.getElementById('stepsList09');
                const form = document.getElementById('form109');
                const validationLink09 = document.getElementById('validationLink09');
                const warningCheckbox = document.getElementById('warning-agreement');

                // Function to disable/enable all form fields
                function toggleFormFields(enabled) {
                    const formFields = form.querySelectorAll('input, select, textarea, button');
                    formFields.forEach(field => {
                        // Skip the warning checkbox itself and hidden inputs
                        if (field.id === 'warning-agreement' || field.type === 'hidden') {
                            return;
                        }
                        field.disabled = !enabled;
                    });
                }

                // Initially disable all form fields
                toggleFormFields(false);

                // Add event listener to warning checkbox
                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', function() {
                        toggleFormFields(this.checked);
                    });
                }

                function showStep(step) {
                    // Only allow navigation if warning checkbox is checked
                    if (!warningCheckbox.checked && step !== 'personal') {
                        return;
                    }

                    stepsList.querySelectorAll('.step-item').forEach(li => li.classList.toggle('active', li.dataset.step ===
                        step));
                    document.querySelectorAll('.step-content').forEach(s => s.classList.toggle('active', s.id ===
                        `step-${step}`));
                }

                function currentStep() {
                    const a = stepsList.querySelector('.step-item.active');
                    return a ? a.dataset.step : stepsOrder[0];
                }

                function go(d) {
                    const i = stepsOrder.indexOf(currentStep());
                    const n = Math.max(0, Math.min(stepsOrder.length - 1, i + d));
                    showStep(stepsOrder[n]);
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
                    e.preventDefault();
                    const li = e.target.closest('.step-item');
                    if (!li) return;
                });
                document.querySelectorAll('[data-next]').forEach(b => b.addEventListener('click', () => {
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    if (validateActiveStep()) go(1);
                }));
                document.querySelectorAll('[data-prev]').forEach(b => b.addEventListener('click', () => {
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    go(-1);
                }));

                // --- Conditional enable/disable fields ---
                function toggleRadioServiceOthers() {
                    const othersRadio = form.querySelector('input[name="radio_service"][value="others"]');
                    const othersSpecify = form.querySelector('input[name="others_specify"]');
                    if (!othersRadio || !othersSpecify) return;
                    const enabled = othersRadio.checked;
                    othersSpecify.disabled = !enabled;
                    if (!enabled) othersSpecify.value = '';
                }

                function toggleIntendedUseDependents() {
                    const selectedUse = form.querySelector('input[name="intended_use"]:checked');
                    const storageLocation = form.querySelector('input[name="storage_location"]');
                    const othersUseSpecify = form.querySelector('input[name="others_use_specify"]');
                    if (!storageLocation || !othersUseSpecify) return;
                    const isStorage = selectedUse && selectedUse.value === 'storage';
                    const isOthers = selectedUse && selectedUse.value === 'others_use';
                    storageLocation.disabled = !isStorage;
                    if (!isStorage) storageLocation.value = '';
                    othersUseSpecify.disabled = !isOthers;
                    if (!isOthers) othersUseSpecify.value = '';
                }

                // Bind listeners
                form.querySelectorAll('input[name="radio_service"]').forEach(r => {
                    r.addEventListener('change', toggleRadioServiceOthers);
                });
                form.querySelectorAll('input[name="intended_use"]').forEach(r => {
                    r.addEventListener('change', toggleIntendedUseDependents);
                });

                // Initialize on load
                toggleRadioServiceOthers();
                toggleIntendedUseDependents();

                // Keep in sync when agreement toggles overall enabled state
                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', function() {
                        toggleRadioServiceOthers();
                        toggleIntendedUseDependents();
                    });
                }

                const validateBtn = document.getElementById('validateBtn');
                if (validateBtn) {
                    validateBtn.addEventListener('click', async () => {
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
                        const formData = new FormData(form);
                        formData.forEach((value, key) => {
                            console.log(`${key}: ${value}`);
                        });
                        if (!validateActiveStep()) return;
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
                        //         localStorage.setItem('active-form', '1-09');
                        //         if (validationLink09) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink09.href, window.location.origin);
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
