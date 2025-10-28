<x-layout :title="'Application for TVRO Registration Certificate/TVRO Station License/CATV Station License (Form 1-22)'" :form-header="['formNo' => 'NTC 1-22', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']">

    <main>
        <form class="form1-01-container" id="form122" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR TVRO REGISTRATION CERTIFICATE/TVRO STATION LICENSE/CATV
                STATION LICENSE</div>
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
                    <ul class="steps-list" id="stepsList22">
                        <li class="step-item active" data-step="application">Application Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="applicant">Applicant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="equipment">Equipment Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="antenna">Antenna System <span class="step-status">&nbsp;</span>
                        </li>
                        <li class="step-item" data-step="signal">Signal Details <span class="step-status">&nbsp;</span>
                        </li>
                        {{-- <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li> --}}
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-application">
                        <fieldset class="fieldset-compact">
                            <legend>Type of Application</legend>
                            <!-- Application type fields -->
                            <x-forms.application-type-fields :form="$form ?? []" :showPermit="false" :showYears="false"
                                :showModification="true" />
                        </fieldset>
                        <fieldset class="fieldset-compact">
                            <legend>Type of License/Certificate</legend>
                            <div class="form-field" data-require-one="input[type=radio]">
                                <label><input type="radio" name="license_type" value="tvro_registration"
                                        {{ old('license_type', $form['license_type'] ?? '') === 'tvro_registration' ? 'checked' : '' }}>
                                    TVRO
                                    REGISTRATION CERTIFICATE</label>
                                <label><input type="radio" name="license_type" value="tvro_station"
                                        {{ old('license_type', $form['license_type'] ?? '') === 'tvro_station' ? 'checked' : '' }}>
                                    TVRO STATION
                                    LICENSE</label>
                                <label><input type="radio" name="license_type" value="catv_station"
                                        {{ old('license_type', $form['license_type'] ?? '') === 'catv_station' ? 'checked' : '' }}>
                                    CATV STATION
                                    LICENSE</label>
                                @error('license_type')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </fieldset>
                        <fieldset class="fieldset-compact">
                            <legend>Classification of Applicant</legend>
                            <div class="form-grid-2">
                                <div class="form-field" data-require-one="input[type=radio]">
                                    <div class="form-label">Classification</div>
                                    <label><input type="radio" name="applicant_classification" value="commercial"
                                            {{ old('applicant_classification', $form['applicant_classification'] ?? '') === 'commercial' ? 'checked' : '' }}>
                                        COMMERCIAL</label>
                                    <label><input type="radio" name="applicant_classification" value="non_commercial"
                                            {{ old('applicant_classification', $form['applicant_classification'] ?? '') === 'non_commercial' ? 'checked' : '' }}>
                                        NON-COMMERCIAL</label>
                                    @error('applicant_classification')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field" data-require-one="input[type=radio]">
                                    <div class="form-label">Service Type</div>
                                    <label><input type="radio" name="service_type" value="broadcasting"
                                            {{ old('service_type', $form['service_type'] ?? '') === 'broadcasting' ? 'checked' : '' }}>
                                        BROADCASTING</label>
                                    <label><input type="radio" name="service_type" value="catv"
                                            {{ old('service_type', $form['service_type'] ?? '') === 'catv' ? 'checked' : '' }}>
                                        CATV</label>
                                    <label><input type="radio" name="service_type" value="others"
                                            {{ old('service_type', $form['service_type'] ?? '') === 'others' ? 'checked' : '' }}>
                                        OTHERS,
                                        specify</label>
                                    @error('service_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <input class="form1-01-input" type="text" name="others_service"
                                        placeholder="Specify"
                                        value="{{ old('others_service', $form['others_service'] ?? '') }}">
                                    @error('others_service')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-field">
                                <label class="form-label">No. of Years</label>
                                <input class="form1-01-input" type="number" name="no_of_years"
                                    placeholder="Number of years"
                                    value="{{ old('no_of_years', $form['no_of_years'] ?? '') }}">
                                @error('no_of_years')
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
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Validity</label><input class="form1-01-input"
                                        type="date" name="validity"
                                        value="{{ old('validity', $form['validity'] ?? '') }}">
                                    @error('validity')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">PA/CA No.</label><input class="form1-01-input"
                                        type="text" name="pa_ca_no"
                                        value="{{ old('pa_ca_no', $form['pa_ca_no'] ?? '') }}">
                                    @error('pa_ca_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Service Area</label><input class="form1-01-input"
                                        type="text" name="service_area"
                                        value="{{ old('service_area', $form['service_area'] ?? '') }}">
                                    @error('service_area')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Exact Location of TVRO
                                        System</label><input class="form1-01-input" type="text"
                                        name="exact_location"
                                        value="{{ old('exact_location', $form['exact_location'] ?? '') }}">
                                    @error('exact_location')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Longitude
                                        (deg-min-sec)
                                    </label><input class="form1-01-input" type="text" name="longitude"
                                        value="{{ old('longitude', $form['longitude'] ?? '') }}">
                                    @error('longitude')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Latitude
                                        (deg-min-sec)
                                    </label><input class="form1-01-input" type="text" name="latitude"
                                        value="{{ old('latitude', $form['latitude'] ?? '') }}">
                                    @error('latitude')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <div class="step-actions"><button type="button" class="btn-secondary"
                                data-prev>Back</button><button type="button" class="btn-primary"
                                data-next>Next</button></div>
                    </section>

                    <section class="step-content" id="step-equipment">
                        <fieldset>
                            <legend>Particulars of Equipment (For Multiple Equipment, Use Form G)</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>LNA/LNB</th>
                                            <th>RECEIVERS</th>
                                            <th>COMBINER(S)</th>
                                            <th>MODULATORS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="lna_lnb_make"
                                                    value="{{ old('lna_lnb_make', $form['lna_lnb_make'] ?? '') }}">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="lna_lnb_serial"
                                                    value="{{ old('lna_lnb_serial', $form['lna_lnb_serial'] ?? '') }}">
                                                <div class="table-field-label"><strong>Frequency Range:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="lna_lnb_frequency"
                                                    value="{{ old('lna_lnb_frequency', $form['lna_lnb_frequency'] ?? '') }}">
                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="receivers_make"
                                                    value="{{ old('receivers_make', $form['receivers_make'] ?? '') }}">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="receivers_serial"
                                                    value="{{ old('receivers_serial', $form['receivers_serial'] ?? '') }}">
                                                <div class="table-field-label"><strong>Frequency Range:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="receivers_frequency"
                                                    value="{{ old('receivers_frequency', $form['receivers_frequency'] ?? '') }}">
                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="combiners_make"
                                                    value="{{ old('combiners_make', $form['combiners_make'] ?? '') }}">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="combiners_serial"
                                                    value="{{ old('combiners_serial', $form['combiners_serial'] ?? '') }}">
                                                <div class="table-field-label"><strong>Frequency Range:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="combiners_frequency"
                                                    value="{{ old('combiners_frequency', $form['combiners_frequency'] ?? '') }}">
                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="modulators_make"
                                                    value="{{ old('modulators_make', $form['modulators_make'] ?? '') }}">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="modulators_serial"
                                                    value="{{ old('modulators_serial', $form['modulators_serial'] ?? '') }}">
                                                <div class="table-field-label"><strong>Frequency Range:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="modulators_frequency"
                                                    value="{{ old('modulators_frequency', $form['modulators_frequency'] ?? '') }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-antenna">
                        <fieldset>
                            <legend>Particulars of Antenna System (For Multiple Antenna, Use Form G)</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Make/Type/Model</th>
                                            <th>Dish Diameter</th>
                                            <th>Polarization</th>
                                            <th>Azimuth</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="antenna_make"
                                                    value="{{ old('antenna_make', $form['antenna_make'] ?? '') }}">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="dish_diameter"
                                                    value="{{ old('dish_diameter', $form['dish_diameter'] ?? '') }}">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="polarization"
                                                    value="{{ old('polarization', $form['polarization'] ?? '') }}">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="azimuth"
                                                    value="{{ old('azimuth', $form['azimuth'] ?? '') }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-signal">
                        <fieldset>
                            <legend>Particulars of Signal to be Received (For Multiple Signal, Use Form G)</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Satellite</th>
                                            <th>Received Frequency</th>
                                            <th>Polarization</th>
                                            <th>Name of Programs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="satellite"
                                                    value="{{ old('satellite', $form['satellite'] ?? '') }}">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="received_frequency"
                                                    value="{{ old('received_frequency', $form['received_frequency'] ?? '') }}">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="signal_polarization"
                                                    value="{{ old('signal_polarization', $form['signal_polarization'] ?? '') }}">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="name_of_programs"
                                                    value="{{ old('name_of_programs', $form['name_of_programs'] ?? '') }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                const stepsOrder = ['application', 'applicant', 'equipment', 'antenna', 'signal']; // declaration removed
                const stepsList = document.getElementById('stepsList22');
                const form = document.getElementById('form122');
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
                    if (!warningCheckbox.checked && step !== 'application') {
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
                    // Only allow navigation if warning checkbox is checked
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    showStep(li.dataset.step);
                });
                document.querySelectorAll('[data-next]').forEach(btn => btn.addEventListener('click', () => {
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    if (validateActiveStep()) go(1);
                }));
                document.querySelectorAll('[data-prev]').forEach(btn => btn.addEventListener('click', () => {
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    go(-1);
                }));

                // --- Conditional enable/disable fields for Application Details ---
                function toggleModificationReason() {
                    const modReason = form.querySelector('input[name="modification_reason"]');
                    const modRadio = form.querySelector('input[name="application_type"][value="modification"]');
                    if (!modReason || !modRadio) return;
                    const enabled = modRadio.checked;
                    modReason.disabled = !enabled;
                    if (!enabled) modReason.value = '';
                }

                function toggleServiceTypeOthers() {
                    const othersRadio = form.querySelector('input[name="service_type"][value="others"]');
                    const othersInput = form.querySelector('input[name="others_service"]');
                    if (!othersRadio || !othersInput) return;
                    const enabled = othersRadio.checked;
                    othersInput.disabled = !enabled;
                    if (!enabled) othersInput.value = '';
                }

                // Bind listeners
                form.querySelectorAll('input[name="application_type"]').forEach(r => {
                    r.addEventListener('change', toggleModificationReason);
                });
                form.querySelectorAll('input[name="service_type"]').forEach(r => {
                    r.addEventListener('change', toggleServiceTypeOthers);
                });

                // Initialize on load
                toggleModificationReason();
                toggleServiceTypeOthers();

                // Keep in sync with agreement state
                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', function() {
                        toggleModificationReason();
                        toggleServiceTypeOthers();
                    });
                }

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
                    });
                }
                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
