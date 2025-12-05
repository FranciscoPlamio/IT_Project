<x-layout :title="'Application for Amateur Radio Operator Certificate/Amateur Radio Station License (Form 1-03)'" :form-header="['formNo' => 'NTC 1-03', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']">

    <main>
        <form class="form1-01-container" id="form103" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE/AMATEUR RADIO STATION
                LICENSE
            </div>
            <div class="form1-01-note"><strong>NOTE:</strong> The system asks for additional info when applicant is
                a minor.
            </div>
            <div class="form1-01-warning">
                <div class="form1-01-warning-title">
                    WARNING:
                </div> Ensure that all details in the name and date of
                birth fields are correct. We cannot edit those fields on site and you will need to set a new
                appointment.
                <div class="form1-01-agree">
                    <label>
                        <input type="checkbox" id="warning-agreement" />
                        I agree
                        / Malinaw sa
                        akin
                    </label>
                </div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList03">
                        <li class="step-item active" data-step="personal">Personal Information <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="application">Application Details<span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="exam">Examination Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="equipment">Equipment Particulars <span
                                class="step-status">&nbsp;</span></li>
                        {{-- <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li> --}}
                    </ul>
                </aside>


                <section class="step-content active" id="step-personal">

                    <!-- Error header -->
                    <x-forms.error-header />

                    <fieldset>
                        <legend>Applicant's Details</legend>
                        <!-- Name fields-->
                        <x-forms.name-fields :form="$form ?? []" />

                        <!-- formOne-blueprint-three fields -->
                        <x-forms.formOne-blueprint-three :form="$form ?? []" />

                        @if (str_contains($category, 'renew-mod'))
                            <div class="form-grid-3">

                                <div class="form-field">
                                    <label class="form-label">Call Sign <span class="text-red">*</span></label>
                                    <input class="form1-01-input" type="text" name="call_sign"
                                        value="{{ old('call_sign', $form['call_sign'] ?? '') }}">
                                    @error('call_sign')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">ATROC/ARSL No. <span class="text-red">*</span></label>
                                    <input class="form1-01-input" type="text" name="atroc_arsl_no"
                                        value="{{ old('atroc_arsl_no', $form['atroc_arsl_no'] ?? '') }}">
                                    @error('atroc_arsl_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Validity <span class="text-red">*</span></label>
                                    <input class="form1-01-input" type="date" name="validity"
                                        value="{{ old('validity', $form['validity'] ?? '') }}">
                                    @error('validity')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div></div>
                        @endif


                        <!-- address fields format -->
                        <x-forms.address-fields :form="$form ?? []" />

                        <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                        </div>
                    </fieldset>
                </section>

                <section class="step-content" id="step-application">
                    @php
                        $applicationType = old('application_type', $form['application_type'] ?? null);
                        $permitTypeValue = old('permit_type', $form['permit_type'] ?? null);
                        $stationClassValue = old('station_class', $form['station_class'] ?? null);
                    @endphp

                    <div class="form-grid-2">
                        <fieldset class="fieldset-compact">
                            <legend>Type of Application <span class="text-red">*</span></legend>
                            <!-- Application type fields -->
                            <div class="form-field">

                                @if (str_contains($category, 'renew-mod'))
                                    <label>
                                        <input type="radio" name="application_type" value="renewal"
                                            {{ old('application_type', $form['application_type'] ?? '') === 'renewal' ? 'checked' : '' }}>
                                        RENEWAL</label>
                                    <label>
                                        <input type="radio" name="application_type" value="modification"
                                            {{ old('application_type', $form['application_type'] ?? '') === 'modification' ? 'checked' : '' }}>MODIFICATION
                                    </label>
                                    @error('application_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <input class="form1-01-input mt-4" type="text" name="modification_reason"
                                        placeholder="Reason"
                                        value="{{ old('modification_reason', $form['modification_reason'] ?? '') }}">
                                    @error('modification_reason')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                @else
                                    <label>
                                        <input type="radio" name="application_type" value="new"
                                            {{ old('application_type', $form['application_type'] ?? '') === 'new' ? 'checked' : '' }}
                                            checked>
                                        NEW
                                    </label>
                                @endif
                                @if ($category !== 'mod')
                                    <label class="form-label">No. of Years <span class="text-red">*</span></label>
                                    <select name="years" class="form1-01-input w-full border rounded px-3 py-2"
                                        value="{{ old('years', $form['years'] ?? '') }}">
                                        <option value="" disabled selected>Select years</option>
                                        <option value="1"
                                            {{ old('years', $form['years'] ?? '') == 1 ? 'selected' : '' }}>1
                                        </option>
                                        <option value="2"
                                            {{ old('years', $form['years'] ?? '') == 2 ? 'selected' : '' }}>2
                                        </option>
                                        <option value="3"
                                            {{ old('years', $form['years'] ?? '') == 3 ? 'selected' : '' }}>3
                                        </option>
                                    </select>
                                    @error('years')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                @endif
                            </div>
                        </fieldset>

                        @if (str_contains($category, 'atrsl'))
                            <fieldset class="fieldset-compact">
                                <legend>Type of Class of Station <span class="text-red">*</span></legend>
                                <div class="form-field">
                                    <div class="form-field" data-require-one="input[type=radio]">
                                        <label>
                                            <input type="radio" name="station_class" value="class_a"
                                                {{ $stationClassValue == 'class_a' ? 'checked' : '' }}>
                                            Class A
                                        </label>
                                        <label>
                                            <input type="radio" name="station_class" value="class_b"
                                                {{ $stationClassValue == 'class_b' ? 'checked' : '' }}>
                                            Class B
                                        </label>
                                        <label>
                                            <input type="radio" name="station_class" value="class_c"
                                                {{ $stationClassValue == 'class_c' ? 'checked' : '' }}>
                                            Class C
                                        </label>
                                        <label>
                                            <input type="radio" name="station_class" value="class_d"
                                                {{ $stationClassValue == 'class_d' ? 'checked' : '' }}>
                                            Class D
                                        </label>
                                        @error('station_class')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                            </fieldset>
                        @elseif($category === 'temporary-foreign')
                            <fieldset class="fieldset-compact">
                                <legend>Type of Class of Station</legend>
                                <div class="form-field">
                                    <div class="form-field" data-require-one="input[type=radio]">
                                        <label>
                                            <input type="radio" name="station_class" value="class_a"
                                                {{ $stationClassValue == 'class_a' ? 'checked' : '' }}>
                                            Class A
                                        </label>
                                        <label>
                                            <input type="radio" name="station_class" value="class_b"
                                                {{ $stationClassValue == 'class_b' ? 'checked' : '' }}>
                                            Class B
                                        </label>
                                        <label>
                                            <input type="radio" name="station_class" value="class_c"
                                                {{ $stationClassValue == 'class_c' ? 'checked' : '' }}>
                                            Class C
                                        </label>
                                        @error('station_class')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                            </fieldset>
                        @endif
                    </div>
                    <input type="hidden" name="permit_type" value="{{ $category }}">

                    <div class="step-actions"><button type="button" class="btn-secondary"
                            data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button>
                    </div>
                </section>



                <section class="step-content" id="step-equipment">
                    <fieldset>
                        <legend>Particulars of Equipment</legend>
                        <div class="table-container">
                            <table class="form-table">
                                <thead>
                                    <tr>
                                        <th>Make</th>
                                        <th>Type/Model</th>
                                        <th>Serial Number</th>
                                        <th>Frequency Range</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input class="table-input" type="text" name="equipment_make_1"
                                                value="{{ old('equipment_make_1', $form['equipment_make_1'] ?? '') }}">
                                            @error('equipment_make_1')
                                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </td>

                                        <td>
                                            <input class="table-input" type="text" name="equipment_type_1"
                                                value="{{ old('equipment_type_1', $form['equipment_type_1'] ?? '') }}">
                                            @error('equipment_type_1')
                                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </td>

                                        <td>
                                            <input class="table-input" type="text" name="equipment_serial_1"
                                                value="{{ old('equipment_serial_1', $form['equipment_serial_1'] ?? '') }}">
                                            @error('equipment_serial_1')
                                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </td>

                                        <td>
                                            <input class="table-input" type="text" name="equipment_freq_1"
                                                value="{{ old('equipment_freq_1', $form['equipment_freq_1'] ?? '') }}">
                                            @error('equipment_freq_1')
                                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><input class="table-input" type="text" name="equipment_make_2"
                                                value="{{ old('equipment_make_2', $form['equipment_make_2'] ?? '') }}">
                                        </td>
                                        <td><input class="table-input" type="text" name="equipment_type_2"
                                                value="{{ old('equipment_type_2', $form['equipment_type_2'] ?? '') }}">
                                        </td>
                                        <td><input class="table-input" type="text" name="equipment_serial_2"
                                                value="{{ old('equipment_serial_2', $form['equipment_serial_2'] ?? '') }}">
                                        </td>
                                        <td><input class="table-input" type="text" name="equipment_freq_2"
                                                value="{{ old('equipment_freq_2', $form['equipment_freq_2'] ?? '') }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="table-input" type="text" name="equipment_make_3"
                                                value="{{ old('equipment_make_3', $form['equipment_make_3'] ?? '') }}">
                                        </td>
                                        <td><input class="table-input" type="text" name="equipment_type_3"
                                                value="{{ old('equipment_type_3', $form['equipment_type_3'] ?? '') }}">
                                        </td>
                                        <td><input class="table-input" type="text" name="equipment_serial_3"
                                                value="{{ old('equipment_serial_3', $form['equipment_serial_3'] ?? '') }}">
                                        </td>
                                        <td><input class="table-input" type="text" name="equipment_freq_3"
                                                value="{{ old('equipment_freq_3', $form['equipment_freq_3'] ?? '') }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="table-input" type="text" name="equipment_make_4"
                                                value="{{ old('equipment_make_4', $form['equipment_make_4'] ?? '') }}">
                                        </td>
                                        <td><input class="table-input" type="text" name="equipment_type_4"
                                                value="{{ old('equipment_type_4', $form['equipment_type_4'] ?? '') }}">
                                        </td>
                                        <td><input class="table-input" type="text" name="equipment_serial_4"
                                                value="{{ old('equipment_serial_4', $form['equipment_serial_4'] ?? '') }}">
                                        </td>
                                        <td><input class="table-input" type="text" name="equipment_freq_4"
                                                value="{{ old('equipment_freq_4', $form['equipment_freq_4'] ?? '') }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- CAPTCHA fields -->
                        <div class="form-field"
                            style="margin:12px 0; display:flex; flex-direction:column; align-items:center;">
                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY', 'your_site_key') }}">
                            </div>
                            @if (session('captcha_error'))
                                <p class="text-red text-sm mt-1">{{ session('captcha_error') }}</p>
                            @endif
                        </div>
                        <div class="step-actions"><button type="button" class="btn-secondary"
                                data-prev>Back</button><button class="form1-01-btn" type="button"
                                id="validateBtn">Proceed to Validation</button></div>
                    </fieldset>
                </section>
                <section class="step-content" id="step-exam">
                    <fieldset class="fieldset-compact">
                        <legend>Examination Details</legend>

                        <!-- Exam fields -->
                        <div class="form-grid-3">

                            <x-forms.exam-fields :form="$form ?? []" />

                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>

                        </div>
            </div>
            </fieldset>
            </section>

            {{-- <!-- Declaration fields component -->
                    <x-forms.declaration-field :form="$form ?? []" /> --}}
            </div>
        </form>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            (function() {
                const stepsOrder = ['personal', 'application', 'exam', 'equipment']; // declaration removed
                const stepsList = document.getElementById('stepsList03');
                const form = document.getElementById('form103');
                const validationLink03 = document.getElementById('validationLink03');
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
                        const anyChecked = Array.from(items).some(el => (el.type === 'radio') ? el.checked :
                            Boolean(el.value));
                        if (!anyChecked) ok = false;
                    });
                    return ok;
                }

                function validateActiveStep() {
                    const step = currentStep();
                    const section = document.getElementById(`step-${step}`);
                    let valid = true;

                    // Get all required fields in the current section, regardless of fieldset
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

                    // Validate groups anywhere in the section
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

                // Disable step navigation via sidebar; enforce using Next/Back buttons
                stepsList.addEventListener('click', (e) => {
                    const li = e.target.closest('.step-item');
                    if (!li) return;
                    e.preventDefault();
                });

                // Handle next/prev buttons anywhere in the form
                document.addEventListener('click', (e) => {
                    if (e.target.matches('[data-next]')) {
                        if (!warningCheckbox.checked) {
                            alert('Please check the agreement checkbox first before proceeding.');
                            return;
                        }
                        if (validateActiveStep()) go(1);
                    } else if (e.target.matches('[data-prev]')) {
                        if (!warningCheckbox.checked) {
                            alert('Please check the agreement checkbox first before proceeding.');
                            return;
                        }
                        go(-1);
                    }
                });

                // --- Toggle enable/disable for modification reason textbox ---
                function toggleModificationReason() {
                    const modReason = form.querySelector('input[name="modification_reason"]');
                    const isModification = form.querySelector('input[name="application_type"][value="modification"]');
                    if (!modReason || !isModification) return;
                    const enabled = isModification.checked;
                    modReason.disabled = !enabled;
                    if (!enabled) modReason.value = '';
                }

                // Bind change listeners for application_type radios
                form.querySelectorAll('input[name="application_type"]').forEach(r => {
                    r.addEventListener('change', toggleModificationReason);
                });

                // Initialize on load
                toggleModificationReason();

                // Keep in sync when agreement toggles overall enabled state
                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', function() {
                        toggleModificationReason();
                    });
                }

                // --- Toggle enable/disable for club fields and preferred call sign based on permit type ---
                function togglePermitDependentFields() {
                    const selectedPermit = form.querySelector('input[name="permit_type"]:checked');
                    const clubName = form.querySelector('input[name="club_name"]');
                    const assignedFreq = form.querySelector('input[name="assigned_frequency"]');
                    const preferredCallSign = form.querySelector('input[name="preferred_call_sign"]');

                    if (!clubName || !assignedFreq || !preferredCallSign) return;

                    const isClub = selectedPermit && selectedPermit.value === 'club_station';
                    const enablePreferred = selectedPermit && (selectedPermit.value === 'temporary_foreign' ||
                        selectedPermit.value === 'special_vanity');

                    // Club fields
                    clubName.disabled = !isClub;
                    assignedFreq.disabled = !isClub;
                    if (!isClub) {
                        clubName.value = '';
                        assignedFreq.value = '';
                    }

                    // Preferred call sign
                    preferredCallSign.disabled = !enablePreferred;
                    if (!enablePreferred) {
                        preferredCallSign.value = '';
                    }
                }

                // Bind change listeners for permit_type radios
                form.querySelectorAll('input[name="permit_type"]').forEach(r => {
                    r.addEventListener('change', togglePermitDependentFields);
                });

                // Initialize dependent fields on load
                togglePermitDependentFields();

                // Keep in sync when agreement toggles overall enabled state
                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', function() {
                        togglePermitDependentFields();
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

                        // Validate reCAPTCHA
                        const recaptchaResponse = grecaptcha.getResponse();
                        if (!recaptchaResponse) {
                            alert('Please complete the reCAPTCHA verification.');
                            return;
                        }

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
                        //         localStorage.setItem('active-form', '1-03');
                        //         if (validationLink03) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink03.href, window.location.origin);
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
