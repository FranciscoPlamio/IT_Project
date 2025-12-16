<x-layout :title="'Application for Radio Operator Certificate (Form 1-02)'" :form-header="['formNo' => 'NTC 1-02', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']">
    <main>
        <form class="form1-01-container" id="form102" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf

            <div class="form1-01-header">APPLICATION FOR RADIO OPERATOR CERTIFICATE</div>
            <div class="form1-01-note">
                <strong>NOTE:</strong> The system asks for additional info when applicant is a minor.
            </div>
            <div class="form1-01-warning">
                <div class="form1-01-warning-title">WARNING:</div>
                Ensure that all details in the name and date of birth fields are correct. We cannot edit those
                fields on site and you will need to set a new appointment.
                <div class="form1-01-agree"><label><input type="checkbox" id="warning-agreement" /> I agree / Malinaw sa
                        akin</label></div>
            </div>
            {{-- style="pointer-events: none; --}}
            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList02">
                        <li class="step-item active" data-step="personal">Personal Information <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="application">Application Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="exam">Exam/Seminar Details <span
                                class="step-status">&nbsp;</span></li>
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

                            <!-- Name fields-->
                            <x-forms.name-fields :form="$form ?? []" />

                            <!-- formOne-blueprint-three fields -->
                            <x-forms.formOne-blueprint-three :form="$form ?? []" />


                            <div class="form-grid-3">

                                <div class="form-field">
                                    <label class="form-label">Weight (kg)<span class="text-red"> *</span></label>
                                    <input class="form1-01-input" type="text" name="weight"
                                        value="{{ old('weight', $form['weight'] ?? '') }}" required>
                                    @error('weight')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Height (cm)<span class="text-red"> *</span></label>
                                    <input class="form1-01-input" type="text" name="height"
                                        value="{{ old('height', $form['height'] ?? '') }}" required>
                                    @error('height')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Employment Status</label>
                                    <div class="inline-radio">
                                        <label>
                                            <input type="radio" name="employment_status" value="employed"
                                                {{ old('employment_status', $form['employment_status'] ?? '') === 'employed' ? 'checked' : '' }}
                                                required>
                                            Employed
                                        </label>
                                        <label>
                                            <input type="radio" name="employment_status" value="unemployed"
                                                {{ old('employment_status', $form['employment_status'] ?? '') === 'unemployed' ? 'checked' : '' }}
                                                required>
                                            Unemployed
                                        </label>

                                    </div>
                                    @error('employment_status')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">If Employed</label>
                                    <div class="inline-radio">
                                        <label>
                                            <input type="radio" name="employment_type" value="local"
                                                {{ old('employment_type', $form['employment_type'] ?? '') === 'local' ? 'checked' : '' }}
                                                required>
                                            Local
                                        </label>
                                        <label>
                                            <input type="radio" name="employment_type" value="foreign"
                                                {{ old('employment_type', $form['employment_type'] ?? '') === 'foreign' ? 'checked' : '' }}
                                                required>
                                            Foreign
                                        </label>
                                    </div>
                                    @error('employment_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- address fields format -->
                            <x-forms.address-fields :form="$form ?? []" />

                            <div class="step-actions">
                                <button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-application">
                        <fieldset class="fieldset-compact">
                            <legend>Type of Application & Certificate<span class="text-red"> *</span></legend>

                            @php
                                $applicationType = old('application_type', $form['application_type'] ?? null);
                            @endphp

                            <div class="form-grid-2">

                                <fieldset class="fieldset-compact">
                                    <!-- Application type fields -->
                                    <div class="form-field">

                                        @if ($category === 'mod')
                                            <label>
                                                <input type="radio" name="application_type" value="modification"
                                                    {{ old('application_type', $form['application_type'] ?? '') === 'modification' ? 'checked' : '' }}checked>MODIFICATION
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
                                                    {{ old('application_type', $form['application_type'] ?? '') === 'new' ? 'checked' : '' }}>
                                                NEW
                                            </label>
                                            <label>
                                                <input type="radio" name="application_type" value="renewal"
                                                    {{ old('application_type', $form['application_type'] ?? '') === 'renewal' ? 'checked' : '' }}>
                                                RENEWAL</label>
                                        @endif
                                        @if ($category !== 'mod')
                                            <label class="form-label">No. of Years</label>
                                            <select name="years"
                                                class="form1-01-input w-full border rounded px-3 py-2"
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

                                <div class="form-field" data-require-one="input[type=radio]">
                                    @error('certificate_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <label class="form-label">Type of Certificate<span class="text-red">
                                            *</span></label>
                                    @php
                                        $certificateType = old('certificate_type', $form['certificate_type'] ?? null);
                                    @endphp
                                    @if ($category === 'roc')
                                        <label>
                                            <input type="radio" name="certificate_type" value="1RTG"
                                                {{ $certificateType == 'new' ? 'checked' : '' }}>
                                            1RTG (First-class Radiotelegraph Operator Certificate)
                                        </label>
                                        <label><input type="radio" name="certificate_type"
                                                value="2RTG"{{ $certificateType == '2RTG' ? 'checked' : '' }}>
                                            2RTG (Second-class Radiotelegraph Operator Certificate)
                                        </label>
                                        <label><input type="radio" name="certificate_type"
                                                value="3RTG"{{ $certificateType == '3RTG' ? 'checked' : '' }}>
                                            3RTG (Third-class Radiotelegraph Operator Certificate)
                                        </label>
                                        <label><input type="radio" name="certificate_type"
                                                value="1PHN"{{ $certificateType == '1PHN' ? 'checked' : '' }}>
                                            1PHN (First-class Radiotelephone Operator Certificate)
                                        </label>
                                        <label><input type="radio" name="certificate_type"
                                                value="2PHN"{{ $certificateType == '2PHN' ? 'checked' : '' }}>
                                            2PHN (Second-class Radiotelephone Operator Certificate)
                                        </label>
                                        <label><input type="radio" name="certificate_type"
                                                value="3PHN"{{ $certificateType == '3PHN' ? 'checked' : '' }}>
                                            3PHN (Third-class Radiotelephone Operator Certificate)
                                        </label>
                                    @elseif ($category === 'rroc')
                                        <label>
                                            <input type="radio" name="certificate_type"
                                                value="RROC-Aircraft"{{ $certificateType == 'RROC-Aircraft' ? 'checked' : '' }}
                                                checked>
                                            RROC-Aircraft (Restricted Radiotelephone Operator’s Certificate – Aircraft)
                                        </label>
                                    @elseif ($category === 'tprroc')
                                        <label><input type="radio" name="certificate_type"
                                                value="TP RROC-Aircraft"{{ $certificateType == 'TP RROC-Aircraft' ? 'checked' : '' }}
                                                checked>
                                            TP RROC-Aircraft (Foreign Pilot)
                                        </label>
                                    @elseif ($category === 'srop')
                                        <label><input type="radio" name="certificate_type"
                                                value="SROP"{{ $certificateType == 'SROP' ? 'checked' : '' }}
                                                checked>
                                            SROP (Special Radio Operator's Permit)</label>
                                    @elseif ($category === 'groc')
                                        <label><input type="radio" name="certificate_type"
                                                value="GROC"{{ $certificateType == 'GROC' ? 'checked' : '' }}
                                                checked>
                                            GROC
                                            (Government Radio Operator Certificate)
                                        </label>
                                    @elseif ($category === 'rrocrlm')
                                        <label>
                                            <input type="radio" name="certificate_type"
                                                value="RROC-Land Mobile"{{ $certificateType == 'RROC-Land Mobile' ? 'checked' : '' }}
                                                checked>
                                            RROC-Land Mobile (Restricted Radiotelephone Operator’s Certificate for
                                            Land Mobile Station )</label>
                                    @elseif ($category === 'mod')
                                        <label>
                                            <input type="radio" name="certificate_type" value="1RTG"
                                                {{ $certificateType == 'new' ? 'checked' : '' }}>
                                            1RTG (First-class Radiotelegraph Operator Certificate)</label>
                                        <label><input type="radio" name="certificate_type"
                                                value="2RTG"{{ $certificateType == '2RTG' ? 'checked' : '' }}>
                                            2RTG (Second-class Radiotelegraph Operator Certificate)</label>
                                        <label><input type="radio" name="certificate_type"
                                                value="3RTG"{{ $certificateType == '3RTG' ? 'checked' : '' }}>
                                            3RTG (Third-class Radiotelegraph Operator Certificate)</label>
                                        <label><input type="radio" name="certificate_type"
                                                value="1PHN"{{ $certificateType == '1PHN' ? 'checked' : '' }}>
                                            1PHN (First-class Radiotelephone Operator Certificate)</label>
                                        <label><input type="radio" name="certificate_type"
                                                value="2PHN"{{ $certificateType == '2PHN' ? 'checked' : '' }}>
                                            2PHN (Second-class Radiotelephone Operator Certificate)</label>
                                        <label><input type="radio" name="certificate_type"
                                                value="3PHN"{{ $certificateType == '3PHN' ? 'checked' : '' }}>
                                            3PHN (Third-class Radiotelephone Operator Certificate)</label>
                                        <label>
                                            <input type="radio" name="certificate_type"
                                                value="RROC-Aircraft"{{ $certificateType == 'RROC-Aircraft' ? 'checked' : '' }}>
                                            RROC-Aircraft (Restricted Radiotelephone Operator’s Certificate – Aircraft)
                                        </label>
                                        <label><input type="radio" name="certificate_type"
                                                value="TP RROC-Aircraft"{{ $certificateType == 'TP RROC-Aircraft' ? 'checked' : '' }}>
                                            TP RROC-Aircraft (Foreign Pilot)
                                        </label>
                                        <label><input type="radio" name="certificate_type"
                                                value="SROP"{{ $certificateType == 'SROP' ? 'checked' : '' }}>
                                            SROP (Special Radio Operator's Permit)</label>
                                        <label><input type="radio" name="certificate_type"
                                                value="GROC"{{ $certificateType == 'GROC' ? 'checked' : '' }}>
                                            GROC
                                            (Government Radio Operator Certificate)
                                        </label>
                                        <label>
                                            <input type="radio" name="certificate_type"
                                                value="RROC-Land Mobile"{{ $certificateType == 'RROC-Land Mobile' ? 'checked' : '' }}>
                                            RROC-Land Mobile (Restricted Radiotelephone Operator’s Certificate for
                                            Land Mobile Station )</label>
                                    @endif




                                    {{-- <label><input type="radio" name="certificate_type"
                                            value="others"{{ $certificateType == 'others' ? 'checked' : '' }}>
                                        OTHERS,
                                        specify</label>
                                    <input class="form1-01-input" type="text" name="others_specify"
                                        placeholder="Specify if others"> --}}
                                </div>
                            </div>
                            <div class="step-actions">
                                <button type="button" class="btn-secondary" data-prev>Back</button>
                                <button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-exam">
                        <fieldset class="fieldset-compact">
                            <legend>Exam/Seminar Details</legend>

                            <!-- Exam fields -->
                            <div class="form-grid-3">
                                <x-forms.exam-fields :form="$form ?? []" />
                                <!-- CAPTCHA fields -->
                                <div class="form-field"
                                    style="margin:12px 0; display:flex; flex-direction:column; align-items:center;">
                                    <div class="g-recaptcha"
                                        data-sitekey="{{ env('RECAPTCHA_SITE_KEY', 'your_site_key') }}"></div>
                                    @if (session('captcha_error'))
                                        <p class="text-red text-sm mt-1">{{ session('captcha_error') }}</p>
                                    @endif
                                </div>
                                <div class="step-actions">
                                    <button type="button" class="btn-secondary" data-prev>Back</button><button
                                        class="form1-01-btn" type="button" id="validateBtn">Proceed to
                                        Validation</button>
                                </div>

                            </div>
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
                const stepsOrder = ['personal', 'application', 'exam'];
                const stepsList = document.getElementById('stepsList02');
                const form = document.getElementById('form102');
                const warningCheckbox = document.getElementById('warning-agreement');

                // --- Enable/Disable all form fields except warning ---
                function toggleFormFields(enabled) {
                    const fields = form.querySelectorAll('input, select, textarea, button');
                    fields.forEach(f => {
                        if (f.id === 'warning-agreement' || f.type === 'hidden') return;
                        f.disabled = !enabled;
                    });
                }

                // --- Conditional fields ---
                function toggleModificationReason() {
                    const modReason = form.querySelector('input[name="modification_reason"]');
                    const isModification = form.querySelector('input[name="application_type"][value="modification"]');
                    if (!modReason || !isModification) return;
                    modReason.disabled = !isModification.checked;
                    modReason.required = isModification.checked; // dynamically required
                    if (!isModification.checked) modReason.value = '';
                }

                function toggleOthersSpecify() {
                    const othersSpecify = form.querySelector('input[name="others_specify"]');
                    const othersRadio = form.querySelector('input[name="certificate_type"][value="others"]');
                    if (!othersSpecify || !othersRadio) return;
                    othersSpecify.disabled = !othersRadio.checked;
                    othersSpecify.required = othersRadio.checked;
                    if (!othersRadio.checked) othersSpecify.value = '';
                }

                // --- Show / Hide steps ---
                function showStep(step) {
                    if (!warningCheckbox.checked && step !== 'personal') return;
                    stepsList.querySelectorAll('.step-item').forEach(li => {
                        li.classList.toggle('active', li.dataset.step === step);
                    });
                    document.querySelectorAll('.step-content').forEach(sec => {
                        sec.classList.toggle('active', sec.id === `step-${step}`);
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

                // --- Validation ---
                function validateGroups(section) {
                    let ok = true;
                    section.querySelectorAll('[data-require-one]').forEach(group => {
                        const selector = group.getAttribute('data-require-one');
                        const items = group.querySelectorAll(selector);
                        const anyChecked = Array.from(items).some(el => !el.disabled && ((el.type === 'checkbox' ||
                            el.type === 'radio') ? el.checked : Boolean(el.value)));
                        if (!anyChecked) ok = false;
                    });
                    return ok;
                }

                function validateActiveStep() {
                    const step = currentStep();
                    const section = document.getElementById(`step-${step}`);
                    let valid = true;

                    // Remove old errors
                    section.querySelectorAll('p.text-red').forEach(el => el.remove());

                    // Required fields (only enabled ones)
                    section.querySelectorAll('input[required], select[required], textarea[required]').forEach(el => {
                        if (el.disabled) return;
                        if (el.type === 'radio') {
                            const name = el.name;
                            const group = section.querySelectorAll(`input[type=radio][name="${name}"]`);
                            const anyChecked = Array.from(group).some(r => !r.disabled && r.checked);
                            if (!anyChecked) valid = false;
                        } else if (!el.value) {
                            valid = false;
                        }
                    });

                    // Validate data-require-one groups
                    if (!validateGroups(section)) valid = false;

                    // Show error if invalid
                    if (!valid) {
                        const errorDiv = document.createElement('p');
                        errorDiv.className = 'text-red text-sm mt-1 text-right';
                        errorDiv.textContent = 'Please complete all required fields before proceeding.';
                        const actionsContainer = section.querySelector('.step-actions');
                        actionsContainer.parentElement.appendChild(errorDiv);
                    }

                    // Update step status
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

                // --- Event bindings ---
                // Warning checkbox toggles everything
                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', () => {
                        toggleFormFields(warningCheckbox.checked);
                        toggleModificationReason();
                        toggleOthersSpecify();
                    });
                }

                // Conditional field listeners
                form.querySelectorAll('input[name="application_type"]').forEach(r => r.addEventListener('change',
                    toggleModificationReason));
                form.querySelectorAll('input[name="certificate_type"]').forEach(r => r.addEventListener('change',
                    toggleOthersSpecify));

                // Next button
                document.querySelectorAll('[data-next]').forEach(btn => btn.addEventListener('click', () => {
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }

                    if (!validateActiveStep()) return;
                    go(1);
                }));

                // Previous button
                document.querySelectorAll('[data-prev]').forEach(btn => btn.addEventListener('click', () => {
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    go(-1);
                }));

                // Final submit / validation button
                const validateBtn = document.getElementById('validateBtn');
                if (validateBtn) {
                    validateBtn.addEventListener('click', () => {
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

                // Disable clicking steps manually
                stepsList.addEventListener('click', e => e.preventDefault());

                // Initialize
                toggleFormFields(false);
                toggleModificationReason();
                toggleOthersSpecify();
                showStep(stepsOrder[0]);

            })();
        </script>

    </main>
</x-layout>
