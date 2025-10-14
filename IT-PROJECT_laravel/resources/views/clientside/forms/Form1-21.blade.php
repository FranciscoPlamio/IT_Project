<x-layout :title="'Application for Duplicate of Permit/License/Certificate (Form 1-21)'" :form-header="['formNo' => 'NTC 1-21', 'revisionNo' => '01', 'revisionDate' => '03/31/2021']" :show-navbar="false">
    <main>
        <form class="form1-01-container" id="form121" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR DUPLICATE OF PERMIT/LICENSE/CERTIFICATE</div>
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
                    <ul class="steps-list" id="stepsList21">
                        <li class="step-item active" data-step="applicant">Applicant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="permit">Permit/License Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="circumstances">Circumstances <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-applicant">
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
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-permit">
                        <fieldset>
                            <legend>Particulars of Permit/License/Certificate</legend>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Permit/License/Certificate
                                        No.</label><input class="form1-01-input" type="text"
                                        name="permit_license_certificate_no" required
                                        value="{{ old('permit_license_certificate_no', $form['permit_license_certificate_no'] ?? '') }}">
                                    @error('permit_license_certificate_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field"><label class="form-label">Validity</label><input
                                        class="form1-01-input" type="date" name="validity"
                                        value="{{ old('validity', $form['validity'] ?? '') }}">
                                    @error('validity')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-circumstances">
                        <fieldset>
                            <legend>State Briefly Circumstances Relating to the Lost/Mutilation of
                                Permit/License/Certificate</legend>
                            <div class="form-field">
                                <textarea class="form1-01-input" name="circumstances" rows="6" style="resize:vertical;width:100%;max-width:none;"
                                    placeholder="Please provide detailed explanation of how the permit/license/certificate was lost or mutilated..."
                                    required>{{ old('circumstances', $form['circumstances'] ?? '') }}</textarea>
                            </div>
                            @error('circumstances')
                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                            @enderror
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
                const stepsOrder = ['applicant', 'permit', 'circumstances', 'declaration'];
                const stepsList = document.getElementById('stepsList21');
                const form = document.getElementById('form121');

                function showStep(step) {
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
                    showStep(li.dataset.step);
                });
                document.querySelectorAll('[data-next]').forEach(b => b.addEventListener('click', () => {
                    if (validateActiveStep()) go(1);
                }));
                document.querySelectorAll('[data-prev]').forEach(b => b.addEventListener('click', () => go(-1)));

                const validateBtn = document.getElementById('validateBtn');
                if (validateBtn) {
                    validateBtn.addEventListener('click', async () => {
                        const formData = new FormData(form);
                        formData.forEach((value, key) => {
                            console.log(`${key}: ${value}`);
                        });
                        if (!validateActiveStep()) return;
                        form.submit();
                    });
                }
                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
