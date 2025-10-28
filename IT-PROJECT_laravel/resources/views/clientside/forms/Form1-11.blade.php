<x-layout :title="'Application for Construction Permit/Radio Station License (Form 1-11)'" :form-header="['formNo' => 'NTC 1-11', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']">

    <main>
        <form class="form1-01-container" id="form111" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR CONSTRUCTION PERMIT / RADIO STATION LICENSE</div>
            <div class="form1-01-note"><strong>NOTE:</strong> The system asks for additional info when applicant is
                a minor.</div>
            <div class="form1-01-warning">
                <div class="form1-01-warning-title">WARNING:</div> Ensure that all details in identification fields
                are correct. Incorrect entries may require a new appointment.
                <div class="form1-01-agree"><label><input type="checkbox" id="warning-agreement" /> I agree / Malinaw sa
                        akin</label></div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList11">
                        <li class="step-item active" data-step="application">Application Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="personal">Applicant Information <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="particulars">Station/Equipment/Antenna <span
                                class="step-status">&nbsp;</span></li>
                        {{-- <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li> --}}
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-application">
                        <div class="form-grid-2">
                            <fieldset class="fieldset-compact">

                                <legend>Type of Application</legend>
                                <!-- Application type fields -->
                                <x-forms.application-type-fields :form="$form ?? []" :show-permit="true" />
                            </fieldset>

                            @php
                                $stationClassValue = old('station_class', $form['station_class'] ?? []);
                                if (!is_array($stationClassValue)) {
                                    $stationClassValue = [];
                                }
                            @endphp
                            <fieldset class="fieldset-compact">
                                <!-- Class of Station field -->
                                <x-forms.class-station-field :form="$form ?? []" />
                                @error('station_class')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </fieldset>
                        </div>

                        <fieldset class="fieldset-compact">
                            <legend>Type of Radio Service</legend>
                            <div class="form-grid-2" data-require-one="input[type=radio]">
                                <div class="form-field">
                                    <label><input type="radio" name="radio_service" value="fixed_land_mobile"
                                            {{ old('radio_service', $form['radio_service'] ?? '') === 'fixed_land_mobile' ? 'checked' : '' }}>
                                        FIXED AND LAND MOBILE</label>
                                    <label><input type="radio" name="radio_service" value="aeronautical"
                                            {{ old('radio_service', $form['radio_service'] ?? '') === 'aeronautical' ? 'checked' : '' }}>
                                        AERONAUTICAL</label>
                                    <label><input type="radio" name="radio_service" value="maritime"
                                            {{ old('radio_service', $form['radio_service'] ?? '') === 'maritime' ? 'checked' : '' }}>
                                        MARITIME
                                        (Public/Private Coastal)</label>
                                </div>
                                <div class="form-field">
                                    <label><input type="radio" name="radio_service" value="broadcast"
                                            {{ old('radio_service', $form['radio_service'] ?? '') === 'broadcast' ? 'checked' : '' }}>
                                        BROADCAST</label>
                                    <label><input type="radio" name="radio_service" value="others"
                                            {{ old('radio_service', $form['radio_service'] ?? '') === 'others' ? 'checked' : '' }}>
                                        OTHERS,
                                        specify</label>
                                    <input class="form1-01-input" type="text" name="others_specify"
                                        placeholder="Specify"
                                        value="{{ old('others_specify', $form['others_specify'] ?? '') }}">
                                    @error('others_specify')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            @error('radio_service')
                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                            @enderror

                        </fieldset>

                        <div class="step-actions"><button type="button" class="btn-secondary"
                                data-prev>Back</button><button type="button" class="btn-primary"
                                data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-personal">
                        <fieldset class="fieldset-compact">
                            <legend>Applicant Information</legend>
                            <div class="form-grid-1">
                                <div class="form-field">
                                    <label class="form-label">Applicant</label>
                                    <input class="form1-01-input" type="text" name="applicant"
                                        value="{{ old('applicant', $form['applicant'] ?? '') }}">
                                    @error('applicant')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- address fields -->
                            <x-forms.address-fields :form="$form ?? []" />
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-particulars">
                        <fieldset>
                            <legend>PARTICULARS OF STATION / EQUIPMENT / ANTENNA (FOR MULTIPLE
                                STATIONS/EQUIPMENT/ANTENNA, USE FORM C)</legend>

                            <!-- STATION and EQUIPMENT sections side by side -->
                            <div class="form-grid-2">
                                <!-- STATION Section (Left Column) -->
                                <div class="station-section">
                                    <div class="section-header">STATION</div>
                                    <div class="form-field">
                                        <label class="form-label">Exact Location</label>
                                        <input class="form1-01-input" type="text" name="exact_location"
                                            value="{{ old('exact_location', $form['exact_location'] ?? '') }}">
                                        @error('exact_location')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-grid-2">
                                        <div class="form-field">
                                            <label class="form-label">Long (deg-min-sec)</label>
                                            <input class="form1-01-input" type="text" name="longitude"
                                                value="{{ old('longitude', $form['longitude'] ?? '') }}">
                                            @error('longitude')
                                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-field">
                                            <label class="form-label">Lat (deg-min-sec)</label>
                                            <input class="form1-01-input" type="text" name="latitude"
                                                value="{{ old('latitude', $form['latitude'] ?? '') }}">
                                            @error('latitude')
                                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">Points of Comm/Service Area</label>
                                        <input class="form1-01-input" type="text" name="points_of_comm"
                                            value="{{ old('points_of_comm', $form['points_of_comm'] ?? '') }}">
                                        @error('points_of_comm')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">Assigned Freq.</label>
                                        <input class="form1-01-input" type="text" name="assigned_freq"
                                            value="{{ old('assigned_freq', $form['assigned_freq'] ?? '') }}">
                                        @error('assigned_freq')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">BW & Emission</label>
                                        <input class="form1-01-input" type="text" name="bandwidth_emission"
                                            value="{{ old('bandwidth_emission', $form['bandwidth_emission'] ?? '') }}">
                                        @error('bandwidth_emission')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">Configuration</label>
                                        <input class="form1-01-input" type="text" name="configuration"
                                            value="{{ old('configuration', $form['configuration'] ?? '') }}">
                                        @error('configuration')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-grid-2">
                                        <div class="form-field">
                                            <label class="form-label">Data Rate</label>
                                            <input class="form1-01-input" type="text" name="data_rate"
                                                value="{{ old('data_rate', $form['data_rate'] ?? '') }}">
                                            @error('data_rate')
                                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-field">
                                            <label class="form-label">Call Sign</label>
                                            <input class="form1-01-input" type="text" name="call_sign"
                                                value="{{ old('call_sign', $form['call_sign'] ?? '') }}">
                                            @error('call_sign')
                                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">RSL No.</label>
                                        <input class="form1-01-input" type="text" name="rsl_no"
                                            value="{{ old('rsl_no', $form['rsl_no'] ?? '') }}">
                                        @error('rsl_no')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">Validity (mm/dd/yy)</label>
                                        <input class="form1-01-input" type="date" name="validity"
                                            value="{{ old('validity', $form['validity'] ?? '') }}">
                                        @error('validity')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">Others, specify</label>
                                        <input class="form1-01-input" type="text" name="others_station"
                                            value="{{ old('others_station', $form['others_station'] ?? '') }}">
                                        @error('others_station')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- EQUIPMENT Section (Right Column) -->
                                <div class="equipment-section">
                                    <div class="section-header">EQUIPMENT</div>
                                    <div class="form-field">
                                        <label class="form-label">Make/Type/Model</label>
                                        <input class="form1-01-input" type="text" name="make_type_model"
                                            value="{{ old('make_type_model', $form['make_type_model'] ?? '') }}">
                                        @error('make_type_model')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">Serial Number</label>
                                        <input class="form1-01-input" type="text" name="serial_number"
                                            value="{{ old('serial_number', $form['serial_number'] ?? '') }}">
                                        @error('serial_number')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
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
                            </div>

                            <!-- ANTENNA Section (Full Width) -->
                            <div class="antenna-section">
                                <div class="section-header">ANTENNA</div>
                                <div class="form-grid-2">
                                    <div class="form-field">
                                        <label class="form-label">Type</label>
                                        <input class="form1-01-input" type="text" name="antenna_type"
                                            value="{{ old('antenna_type', $form['antenna_type'] ?? '') }}">
                                        @error('antenna_type')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">Height (m)</label>
                                        <input class="form1-01-input" type="text" name="antenna_height"
                                            value="{{ old('antenna_height', $form['antenna_height'] ?? '') }}">
                                        @error('antenna_height')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-grid-2">
                                    <div class="form-field">
                                        <label class="form-label">Gain (dB)</label>
                                        <input class="form1-01-input" type="text" name="antenna_gain"
                                            value="{{ old('antenna_gain', $form['antenna_gain'] ?? '') }}">
                                        @error('antenna_gain')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">Directivity</label>
                                        <input class="form1-01-input" type="text" name="antenna_directivity"
                                            value="{{ old('antenna_directivity', $form['antenna_directivity'] ?? '') }}">
                                        @error('antenna_directivity')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-grid-2">
                                    <div class="form-field">
                                        <label class="form-label">Polarization</label>
                                        <input class="form1-01-input" type="text" name="antenna_polarization"
                                            value="{{ old('antenna_polarization', $form['antenna_polarization'] ?? '') }}">
                                        @error('antenna_polarization')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">Beamwidth</label>
                                        <input class="form1-01-input" type="text" name="antenna_beamwidth"
                                            value="{{ old('antenna_beamwidth', $form['antenna_beamwidth'] ?? '') }}">
                                        @error('antenna_beamwidth')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-grid-2">
                                    <div class="form-field">
                                        <label class="form-label">Diameter (for microwave)</label>
                                        <input class="form1-01-input" type="text" name="antenna_diameter"
                                            value="{{ old('antenna_diameter', $form['antenna_diameter'] ?? '') }}">
                                        @error('antenna_diameter')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-field">
                                        <label class="form-label">Others</label>
                                        <input class="form1-01-input" type="text" name="antenna_others"
                                            value="{{ old('antenna_others', $form['antenna_others'] ?? '') }}">
                                        @error('antenna_others')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
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
                const stepsOrder = ['application', 'personal', 'particulars']; // declaration removed
                const stepsList = document.getElementById('stepsList11');
                const form = document.getElementById('form111');
                const validationLink11 = document.getElementById('validationLink11');
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
                    const li = e.target.closest('.step-item');
                    if (!li) return;

                    // Only allow navigation to personal step if checkbox not checked
                    if (!warningCheckbox.checked && li.dataset.step !== 'personal') {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    showStep(li.dataset.step);
                });
                document.querySelectorAll('[data-next]').forEach(b => b.addEventListener('click', () => {
                    // if (validateActiveStep()) go(1);
                    go(1);
                }));
                document.querySelectorAll('[data-prev]').forEach(b => b.addEventListener('click', () => {
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    go(-1);
                }));

                // --- Conditional enable/disable fields ---
                function toggleModificationReason() {
                    const modReason = form.querySelector('input[name="modification_reason"]');
                    const modRadio = form.querySelector('input[name="application_type"][value="modification"]');
                    if (!modReason || !modRadio) return;
                    const enabled = modRadio.checked;
                    modReason.disabled = !enabled;
                    if (!enabled) modReason.value = '';
                }

                function toggleRadioServiceOthers() {
                    const othersRadio = form.querySelector('input[name="radio_service"][value="others"]');
                    const othersSpecify = form.querySelector('input[name="others_specify"]');
                    if (!othersRadio || !othersSpecify) return;
                    const enabled = othersRadio.checked;
                    othersSpecify.disabled = !enabled;
                    if (!enabled) othersSpecify.value = '';
                }

                // Bind listeners
                form.querySelectorAll('input[name="application_type"]').forEach(r => {
                    r.addEventListener('change', toggleModificationReason);
                });
                form.querySelectorAll('input[name="radio_service"]').forEach(r => {
                    r.addEventListener('change', toggleRadioServiceOthers);
                });

                // Initialize on load
                toggleModificationReason();
                toggleRadioServiceOthers();

                // Keep in sync when agreement toggles overall enabled state
                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', function() {
                        toggleModificationReason();
                        toggleRadioServiceOthers();
                    });
                }

                const validateBtn = document.getElementById('validateBtn');
                if (validateBtn) {
                    validateBtn.addEventListener('click', async () => {
                        if (!warningCheckbox.checked) {
                            alert('Please check the agreement checkbox first before proceeding.');
                            return;
                        }
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
                        //         localStorage.setItem('active-form', '1-11');
                        //         if (validationLink11) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink11.href, window.location.origin);
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
