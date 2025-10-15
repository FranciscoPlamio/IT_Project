<x-layout :title="'Application for Radio Operator Certificate (Form 1-02)'" :form-header="['formNo' => 'NTC 1-02', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']" :show-navbar="false">
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
                <div class="form1-01-agree">
                    <label><input type="checkbox" /> I agree / Malinaw sa akin</label>
                </div>
            </div>

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
                        <fieldset>
                            <legend>Applicant's Details</legend>

                            <!-- Name fields-->
                            <x-forms.name-fields :form="$form ?? []" />

                            <!-- formOne-blueprint-three fields -->
                            <x-forms.formOne-blueprint-three :form="$form ?? []" />


                            <div class="form-grid-3">

                                <div class="form-field">
                                    <label class="form-label">Weight (kg)</label>
                                    <input class="form1-01-input" type="text" name="weight"
                                        value="{{ old('weight', $form['weight'] ?? '') }}">
                                    @error('weight')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Height (cm)</label>
                                    <input class="form1-01-input" type="text" name="height"
                                        value="{{ old('height', $form['height'] ?? '') }}">
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
                                                {{ old('employment_status', $form['employment_status'] ?? '') === 'employed' ? 'checked' : '' }}>
                                            Employed
                                        </label>
                                        <label>
                                            <input type="radio" name="employment_status" value="unemployed"
                                                {{ old('employment_status', $form['employment_status'] ?? '') === 'unemployed' ? 'checked' : '' }}>
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
                                                {{ old('employment_type', $form['employment_type'] ?? '') === 'local' ? 'checked' : '' }}>
                                            Local
                                        </label>
                                        <label>
                                            <input type="radio" name="employment_type" value="foreign"
                                                {{ old('employment_type', $form['employment_type'] ?? '') === 'foreign' ? 'checked' : '' }}>
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
                            <legend>Type of Application & Certificate</legend>

                            @php
                                $applicationType = old('application_type', $form['application_type'] ?? null);
                            @endphp

                            <div class="form-grid-2">

                                <fieldset class="fieldset-compact">
                                    <!-- Application type fields -->
                                    <x-forms.application-type-fields :form="$form101 ?? []" :application-type="$applicationType" />
                                </fieldset>

                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    @error('certificate_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <label class="form-label">Type of Certificate</label>
                                    @php
                                        $certificateType = old('certificate_type', $form['certificate_type'] ?? null);
                                    @endphp

                                    <label>
                                        <input type="radio" name="certificate_type" value="1RTG"
                                            {{ $certificateType == 'new' ? 'checked' : '' }}>
                                        1RTG</label>
                                    <label><input type="radio" name="certificate_type"
                                            value="2RTG"{{ $certificateType == '2RTG' ? 'checked' : '' }}>
                                        2RTG</label>
                                    <label><input type="radio" name="certificate_type"
                                            value="3RTG"{{ $certificateType == '3RTG' ? 'checked' : '' }}>
                                        3RTG</label>
                                    <label><input type="radio" name="certificate_type"
                                            value="1PHN"{{ $certificateType == '1PHN' ? 'checked' : '' }}>
                                        1PHN</label>
                                    <label><input type="radio" name="certificate_type"
                                            value="2PHN"{{ $certificateType == '2PHN' ? 'checked' : '' }}>
                                        2PHN</label>
                                    <label><input type="radio" name="certificate_type"
                                            value="3PHN"{{ $certificateType == '3PHN' ? 'checked' : '' }}>
                                        3PHN</label>
                                    <label><input type="radio" name="certificate_type"
                                            value="SROP"{{ $certificateType == 'SROP' ? 'checked' : '' }}>
                                        SROP</label>
                                    <label><input type="radio" name="certificate_type"
                                            value="RROC-Land Mobile"{{ $certificateType == 'RROC-Land Mobile' ? 'checked' : '' }}>
                                        RROC-Land Mobile (RLM)</label>
                                    <label><input type="radio" name="certificate_type"
                                            value="RROC-Aircraft"{{ $certificateType == 'RROC-Aircraft' ? 'checked' : '' }}>
                                        RROC-Aircraft</label>
                                    <label><input type="radio" name="certificate_type"
                                            value="GROC"{{ $certificateType == 'GROC' ? 'checked' : '' }}> GROC
                                        (Government)</label>
                                    <label><input type="radio" name="certificate_type"
                                            value="TP RROC-Aircraft"{{ $certificateType == 'TP RROC-Aircraft' ? 'checked' : '' }}>
                                        TP RROC-Aircraft (Foreign Pilot)</label>
                                    <label><input type="radio" name="certificate_type"
                                            value="others"{{ $certificateType == 'others' ? 'checked' : '' }}>
                                        OTHERS,
                                        specify</label>
                                    <input class="form1-01-input" type="text" name="others_specify"
                                        placeholder="Specify if others">
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
                                <div class="form-field">
                                    <label class="form-label">Place of Exam/Seminar</label>
                                    <x-forms.exam-fields :form="$form ?? []" />
                                    <div class="step-actions"><button class="form1-01-btn" type="button"
                                            id="validateBtn">Proceed to Validation</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </section>

                    {{-- <!-- Declaration fields component -->
                    <x-forms.declaration-field :form="$form ?? []" /> --}}
                </div>
            </div>
        </form>

        <script>
            (function() {
                const stepsOrder = ['personal', 'application', 'exam', ]; // declaration removed
                const stepsList = document.getElementById('stepsList02');
                const form = document.getElementById('form102');
                const validationLink02 = document.getElementById('validationLink02');

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
                    validateBtn.addEventListener('click', () => {
                        if (!validateActiveStep()) return;
                        const formData = new FormData(form);
                        form.submit();

                        // const entries = {};
                        // for (const [key, value] of formData.entries()) {
                        //     if (value instanceof File) {
                        //         entries[key] = value.name || '';
                        //     } else {
                        //         if (entries[key]) {
                        //             if (Array.isArray(entries[key])) entries[key].push(value);
                        //             else entries[key] = [entries[key], value];
                        //         } else {
                        //             entries[key] = value;
                        //         }
                        //     }
                        // }
                        // localStorage.setItem('form1-02-data', JSON.stringify(entries));
                        // localStorage.setItem('active-form', '1-02');
                        // if (validationLink02) {
                        //     window.location.href = validationLink02.href;
                        // }
                    });
                }

                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
