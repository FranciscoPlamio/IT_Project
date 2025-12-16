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

                        @if (str_contains($category, 'renew-mod') || str_contains($category, 'modification'))
                            <div class="form-grid-3">

                                <div class="form-field">
                                    <label class="form-label">Call Sign <span class="text-red">*</span></label>
                                    <input class="form1-01-input" type="text" name="call_sign"
                                        value="{{ old('call_sign', $form['call_sign'] ?? '') }}" required>
                                    @error('call_sign')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">ATROC/ARSL No. <span class="text-red">*</span></label>
                                    <input class="form1-01-input" type="text" name="atroc_arsl_no"
                                        value="{{ old('atroc_arsl_no', $form['atroc_arsl_no'] ?? '') }}" required>
                                    @error('atroc_arsl_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Validity <span class="text-red">*</span></label>
                                    <input class="form1-01-input" type="date" name="validity"
                                        value="{{ old('validity', $form['validity'] ?? '') }}" min="{{ date('Y-m-d') }}"
                                        required>
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
                        $permitTypeValue = old('certificate_type', $form['certificate_type'] ?? null);
                        $stationClassValue = old('station_class', $form['station_class'] ?? null);
                    @endphp

                    <div class="form-grid-2">
                        <fieldset class="fieldset-compact">
                            <legend>Type of Application <span class="text-red">*</span></legend>
                            <!-- Application type fields -->
                            <div class="form-field">

                                @if (str_contains($category, 'renew-mod') || str_contains($category, 'modification'))
                                    @if (str_contains($category, 'renew-mod'))
                                        <label>
                                            <input type="radio" name="application_type" value="renewal"
                                                {{ old('application_type', $form['application_type'] ?? '') === 'renewal' ? 'checked' : '' }}>
                                            RENEWAL</label>
                                    @endif
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
                                    @if ($category === 'temporary-foreign' || $category === 'special-event-call')
                                        <label class="form-label">No. of Years <span class="text-red">*</span></label>
                                        <select name="years" class="form1-01-input w-full border rounded px-3 py-2"
                                            value="{{ old('years', $form['years'] ?? '') }}">
                                            <option value="1"
                                                {{ old('years', $form['years'] ?? '') == 1 ? 'selected' : '' }}
                                                selected>1
                                            </option>
                                        </select>
                                        @error('years')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    @elseif(str_contains($category, 'at-lifetime'))
                                    @else
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
                    <input type="hidden" name="certificate_type" value="{{ $category }}">

                    <div class="step-actions">
                        <button type="button" class="btn-secondary" data-prev>Back
                        </button>
                        <button type="button" class="btn-primary" data-next>
                            Next
                        </button>
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
                        <div class="step-actions">
                            <button type="button" class="btn-secondary" data-prev>Back</button>

                            <x-forms.proceed-validation-btn class="form1-01-btn bg-blue-600 text-white px-4 py-2">
                                Proceed to Validation
                            </x-forms.proceed-validation-btn>
                        </div>
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
                const stepsOrder = ['personal', 'application', 'exam', 'equipment'];
                const stepsList = document.getElementById('stepsList03');
                const form = document.getElementById('form103');
                const warningCheckbox = document.getElementById('warning-agreement');

                // Enable/disable all fields except hidden and warning checkbox
                function toggleFormFields(enabled) {
                    const fields = form.querySelectorAll('input, select, textarea, button');
                    fields.forEach(f => {
                        if (f.type === 'hidden' || f.id === 'warning-agreement') return;
                        f.disabled = !enabled;
                    });
                }

                toggleFormFields(false);

                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', () => {
                        toggleFormFields(warningCheckbox.checked);
                        toggleModificationReason();
                        togglePermitDependentFields();
                    });
                }

                // Step navigation
                function showStep(step) {
                    if (!warningCheckbox.checked && step !== 'personal') return;
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

                // Validation
                function validateGroups(section) {
                    let ok = true;
                    section.querySelectorAll('[data-require-one]').forEach(group => {
                        const selector = group.getAttribute('data-require-one');
                        const items = group.querySelectorAll(selector);
                        const anyChecked = Array.from(items).some(el =>
                            (el.type === 'radio' || el.type === 'checkbox') ? el.checked : Boolean(el.value)
                        );
                        if (!anyChecked) ok = false;
                    });
                    return ok;
                }

                function validateActiveStep() {
                    const step = currentStep();
                    const section = document.getElementById(`step-${step}`);
                    let valid = true;

                    // Remove old error messages
                    section.querySelectorAll('.step-error').forEach(e => e.remove());

                    section.querySelectorAll('input[required], select[required], textarea[required]').forEach(el => {
                        if (el.type === 'radio') {
                            const group = section.querySelectorAll(`input[type=radio][name="${el.name}"]`);
                            if (!Array.from(group).some(r => r.checked)) valid = false;
                        } else if (!el.value) {
                            valid = false;
                        }
                    });

                    if (!validateGroups(section)) valid = false;

                    // Update step status
                    const li = stepsList.querySelector(`.step-item[data-step="${step}"]`);
                    if (valid) {
                        li.classList.add('completed');
                        li.querySelector('.step-status').textContent = 'Done';
                    } else {
                        li.classList.remove('completed');
                        li.querySelector('.step-status').textContent = '';
                    }

                    if (!valid) {
                        const errorDiv = document.createElement('p');
                        errorDiv.className = 'step-error text-red text-sm mt-1 text-right';
                        errorDiv.textContent = 'Please complete all required fields before proceeding.';
                        const actionsContainer = section.querySelector('.step-actions');
                        if (actionsContainer) actionsContainer.parentElement.appendChild(errorDiv);
                    }

                    return valid;
                }

                // Disable sidebar click
                stepsList.addEventListener('click', e => e.preventDefault());

                // Next / Prev buttons
                document.addEventListener('click', e => {
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

                // --- Conditional fields ---
                function toggleModificationReason() {
                    const modReason = form.querySelector('input[name="modification_reason"]');
                    const isModification = form.querySelector('input[name="application_type"][value="modification"]');
                    if (!modReason || !isModification) return;
                    modReason.disabled = !isModification.checked;
                    if (!isModification.checked) modReason.value = '';
                }

                function togglePermitDependentFields() {
                    const selectedPermit = form.querySelector('input[name="certificate_type"]:checked');
                    const clubName = form.querySelector('input[name="club_name"]');
                    const assignedFreq = form.querySelector('input[name="assigned_frequency"]');
                    const preferredCallSign = form.querySelector('input[name="preferred_call_sign"]');

                    if (!clubName || !assignedFreq || !preferredCallSign) return;

                    const isClub = selectedPermit && selectedPermit.value === 'club_station';
                    const enablePreferred = selectedPermit && ['temporary_foreign', 'special_vanity'].includes(
                        selectedPermit.value);

                    clubName.disabled = !isClub;
                    assignedFreq.disabled = !isClub;
                    if (!isClub) {
                        clubName.value = '';
                        assignedFreq.value = '';
                    }

                    preferredCallSign.disabled = !enablePreferred;
                    if (!enablePreferred) preferredCallSign.value = '';
                }

                form.querySelectorAll('input[name="application_type"]').forEach(r => r.addEventListener('change',
                    toggleModificationReason));
                form.querySelectorAll('input[name="certificate_type"]').forEach(r => r.addEventListener('change',
                    togglePermitDependentFields));

                toggleModificationReason();
                togglePermitDependentFields();

                function startLoading(btn) {
                    btn.disabled = true;
                    btn.querySelector('.btn-text')?.classList.add('hidden');
                    btn.querySelector('.spinner')?.classList.remove('hidden');
                }

                function stopLoading(btn) {
                    btn.disabled = false;
                    btn.querySelector('.btn-text')?.classList.remove('hidden');
                    btn.querySelector('.spinner')?.classList.add('hidden');
                }
                // Final validation button
                const validateBtn = document.getElementById('validateBtn');
                if (validateBtn) {
                    validateBtn.addEventListener('click', () => {
                        if (!warningCheckbox.checked) {
                            alert('Please check the agreement checkbox first before proceeding.');
                            return;
                        }
                        if (!validateActiveStep()) return;

                        const recaptchaResponse = grecaptcha.getResponse();
                        if (!recaptchaResponse) {
                            alert('Please complete the reCAPTCHA verification.');
                            return;
                        }

                        form.submit();
                        startLoading(validateBtn);
                    });
                }

                showStep(stepsOrder[0]);
            })();
        </script>

    </main>
</x-layout>
