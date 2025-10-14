<x-layout :title="'Application for Temporary Permit to Propagate/Demonstrate (Form 1-14)'" :form-header="['formNo' => 'NTC 1-14', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form114" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR TEMPORARY PERMIT TO PROPAGATE/DEMONSTRATE</div>
            <div class="form1-01-note"><strong>NOTE:</strong> Indicate "N/A" for items not applicable.</div>
            <div class="form1-01-warning">
                <div class="form1-01-warning-title">WARNING:</div>
                Ensure that all details in the name and date of birth fields are correct. We cannot edit those
                fields on site and you will need to set a new appointment.
                <div class="form1-01-agree"><label><input type="checkbox" id="warning-agreement" /> I agree / Malinaw sa
                        akin</label></div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList14">
                        <li class="step-item active" data-step="nature">Application Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="personal">Applicant Information <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="particulars">Station/Equipment <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div class="form-layout-content">
                    <section class="step-content active" id="step-nature">
                        <div class="form-grid-2">
                            <fieldset class="fieldset-compact">
                                <legend>Nature of Service</legend>
                                @php
                                    $natureServiceValue = old('nature_service', $form['nature_service'] ?? '');
                                @endphp
                                <div class="form-field" data-require-one="input[type=radio]">
                                    <label>
                                        <input type="radio" name="nature_service" value="cv_private"
                                            {{ $natureServiceValue == 'cv_private' ? 'checked' : '' }}>
                                        CV (PRIVATE)
                                    </label>
                                    <label>
                                        <input type="radio" name="nature_service" value="co_government"
                                            {{ $natureServiceValue == 'co_government' ? 'checked' : '' }}>
                                        CO (GOVERNMENT)
                                    </label>
                                    <label>
                                        <input type="radio" name="nature_service" value="cp_public"
                                            {{ $natureServiceValue == 'cp_public' ? 'checked' : '' }}>
                                        CP (PUBLIC CORRESPONDENCE)
                                    </label>
                                    @error('nature_service')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </fieldset>
                            <fieldset class="fieldset-compact">
                                <legend>Type of Radio Service</legend>
                                @php
                                    $radioServiceValue = old('radio_service', $form['radio_service'] ?? '');
                                @endphp
                                <div class="form-field" data-require-one="input[type=radio]">
                                    <label><input type="radio" name="radio_service" value="fixed_land_mobile"
                                            {{ $radioServiceValue == 'fixed_land_mobile' ? 'checked' : '' }}>
                                        FIXED AND LAND MOBILE</label>
                                    <label><input type="radio" name="radio_service" value="aeronautical"
                                            {{ $radioServiceValue == 'aeronautical' ? 'checked' : '' }}>
                                        AERONAUTICAL</label>
                                    <label><input type="radio" name="radio_service" value="broadcast"
                                            {{ $radioServiceValue == 'broadcast' ? 'checked' : '' }}>
                                        BROADCAST</label>
                                    <label><input type="radio" name="radio_service" value="others"
                                            {{ $radioServiceValue == 'others' ? 'checked' : '' }}> OTHERS,
                                        specify</label>
                                    <input class="form1-01-input" type="text" name="others_radio_specify"
                                        placeholder="Specify"
                                        value="{{ old('others_radio_specify', $form['others_radio_specify'] ?? '') }}">
                                    @error('radio_service')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </fieldset>
                        </div>
                        <fieldset class="fieldset-compact">
                            <!-- Class of Station field -->
                            <x-forms.class-station-field :form="$form ?? []" />
                        </fieldset>
                        <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                        </div>
                    </section>
                    <section class="step-content" id="step-personal">
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
                                    <label class="form-label">Email Address</label>
                                    <input class="form1-01-input" type="email" name="email" required
                                        value="{{ old('email', $form['email'] ?? '') }}">
                                    @error('email')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Contact Number</label>
                                    <input class="form1-01-input" type="text" name="contact_number" required
                                        value="{{ old('contact_number', $form['contact_number'] ?? '') }}">
                                    @error('contact_number')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Unit/Rm/Bldg No.</label>
                                    <input class="form1-01-input" type="text" name="unit_no"
                                        value="{{ old('unit_no', $form['unit_no'] ?? '') }}">
                                    @error('unit_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Street</label>
                                    <input class="form1-01-input" type="text" name="street"
                                        value="{{ old('street', $form['street'] ?? '') }}">
                                    @error('street')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Barangay</label>
                                    <input class="form1-01-input" type="text" name="barangay"
                                        value="{{ old('barangay', $form['barangay'] ?? '') }}">
                                    @error('barangay')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">City/Municipality</label>
                                    <input class="form1-01-input" type="text" name="city"
                                        value="{{ old('city', $form['city'] ?? '') }}">
                                    @error('city')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Province</label>
                                    <input class="form1-01-input" type="text" name="province"
                                        value="{{ old('province', $form['province'] ?? '') }}">
                                    @error('province')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Zip Code</label>
                                    <input class="form1-01-input" type="text" name="zip_code"
                                        value="{{ old('zip_code', $form['zip_code'] ?? '') }}">
                                    @error('zip_code')
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
                            <legend>Particulars of Station / Equipment</legend>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Exact Location</label>
                                    <input class="form1-01-input" type="text" name="exact_location"
                                        value="{{ old('exact_location', $form['exact_location'] ?? '') }}">
                                    @error('exact_location')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
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
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Points of Comm/Service
                                        Area</label>
                                    <input class="form1-01-input" type="text" name="points_of_comm"
                                        value="{{ old('points_of_comm', $form['points_of_comm'] ?? '') }}">
                                    @error('points_of_comm')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Proposed Freq.</label>
                                    <input class="form1-01-input" type="text" name="proposed_freq"
                                        value="{{ old('proposed_freq', $form['proposed_freq'] ?? '') }}">
                                    @error('proposed_freq')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">BW & Emission</label>
                                    <input class="form1-01-input" type="text" name="bw_emission"
                                        value="{{ old('bw_emission', $form['bw_emission'] ?? '') }}">
                                    @error('bw_emission')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
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
                                    <label class="form-label">Others, specify</label>
                                    <input class="form1-01-input" type="text" name="others_station"
                                        value="{{ old('others_station', $form['others_station'] ?? '') }}">
                                    @error('others_station')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
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
                    <!-- Declaration fields component -->
                    <x-forms.declaration-field :form="$form ?? []" />
                </div>
            </div>
        </form>

        <script>
            (function() {
                const stepsOrder = ['nature', 'class', 'service', 'personal', 'particulars', 'declaration'];
                const stepsList = document.getElementById('stepsList14');
                const form = document.getElementById('form114');
                const validationLink14 = document.getElementById('validationLink14');
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
                    if (!warningCheckbox.checked && step !== 'nature') {
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
                        if (!el.value) valid = false;
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

                    // Only allow navigation to nature step if checkbox not checked
                    if (!warningCheckbox.checked && li.dataset.step !== 'nature') {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }

                    showStep(li.dataset.step);
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

                const validateBtn = document.getElementById('validateBtn14');
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
                        //         localStorage.setItem('active-form', '1-14');
                        //         if (validationLink14) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink14.href, window.location.origin);
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
