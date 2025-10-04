<x-layout :title="'Application for Duplicate of Permit/License/Certificate (Form 1-21)'" :form-header="['formNo' => 'NTC 1-21', 'revisionNo' => '01', 'revisionDate' => '03/31/2021']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form121">
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
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">Applicant</label><input
                                        class="form1-01-input" type="text" name="applicant" required></div>
                                <div class="form-field"><label class="form-label">Email Address</label><input
                                        class="form1-01-input" type="email" name="email" required></div>
                                <div class="form-field"><label class="form-label">Contact Number</label><input
                                        class="form1-01-input" type="text" name="contact_number" required></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Unit/Rm/Bldg No.</label><input
                                        class="form1-01-input" type="text" name="unit_no"></div>
                                <div class="form-field"><label class="form-label">Street</label><input
                                        class="form1-01-input" type="text" name="street"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Barangay</label><input
                                        class="form1-01-input" type="text" name="barangay"></div>
                                <div class="form-field"><label class="form-label">Municipality/City</label><input
                                        class="form1-01-input" type="text" name="city"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Province</label><input
                                        class="form1-01-input" type="text" name="province"></div>
                                <div class="form-field"><label class="form-label">Zip Code</label><input
                                        class="form1-01-input" type="text" name="zip_code"></div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-permit">
                        <fieldset>
                            <legend>Particulars of Permit/License/Certificate</legend>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Permit/License/Certificate
                                        No.</label><input class="form1-01-input" type="text"
                                        name="permit_license_certificate_no" required></div>
                                <div class="form-field"><label class="form-label">Validity</label><input
                                        class="form1-01-input" type="date" name="validity"></div>
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
                                <textarea class="form1-01-input" name="circumstances" rows="6"
                                    style="resize:vertical;width:100%;max-width:none;"
                                    placeholder="Please provide detailed explanation of how the permit/license/certificate was lost or mutilated..."
                                    required></textarea>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-declaration">
                        <fieldset>
                            <legend>DECLARATION</legend>
                            <div class="form1-01-declaration">I hereby declare that all the above entries are true
                                and correct. Under the Revised Penal Code, I shall be held liable for any willful
                                false statement(s) or misrepresentation(s) made in this application form that may
                                serve as a valid ground for the denial of this application and/or
                                cancellation/revocation of the permit issued/granted. Further, I am freely giving
                                full consent for the collection and processing of personal information in accordance
                                with Republic Act No. 10173, Data Privacy Act of 2012.</div>
                            <div class="form1-01-signature-row">
                                <div class="form1-01-signature-col">
                                    <input class="signature-line-input" type="text" name="signature_name"
                                        placeholder="Signature over Printed Name of Applicant" />
                                    <input class="form1-01-input" type="date" name="date_accomplished"
                                        placeholder="Date Accomplished" style="max-width:180px;width:100%;" />
                                </div>
                                <div class="form1-01-signature-col"
                                    style="border:1px dashed #aaa;padding:12px 8px;min-width:180px;">
                                    <div style="font-size:0.97rem;margin-bottom:6px;">OR No.:</div>
                                    <input class="form1-01-input" type="text" name="or_no"
                                        style="margin-bottom:6px;" />
                                    <div style="font-size:0.97rem;margin-bottom:6px;">Date:</div>
                                    <input class="form1-01-input" type="date" name="or_date"
                                        style="margin-bottom:6px;" />
                                    <div style="font-size:0.97rem;margin-bottom:6px;">Amount:</div>
                                    <input class="form1-01-input" type="text" name="or_amount"
                                        style="margin-bottom:6px;" />
                                    <div style="font-size:0.97rem;margin-bottom:6px;">Collecting Officer</div>
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button class="form1-01-btn" type="button"
                                    id="validateBtn21">Proceed to Validation</button></div>
                        </fieldset>
                    </section>
                </div>
            </div>
        </form>
        <a id="validationLink21" href="{{ route('forms.1-01.validation') }}" style="display:none;">Validation</a>
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

                const validateBtn = document.getElementById('validateBtn21');
                if (validateBtn) {
                    validateBtn.addEventListener('click', () => {
                        if (!validateActiveStep()) return;
                        const formData = new FormData(form);
                        const entries = {};
                        for (const [key, value] of formData.entries()) {
                            if (value instanceof File) entries[key] = value.name || '';
                            else {
                                if (entries[key]) {
                                    if (Array.isArray(entries[key])) entries[key].push(value);
                                    else entries[key] = [entries[key], value];
                                } else entries[key] = value;
                            }
                        }
                        localStorage.setItem('form1-21-data', JSON.stringify(entries));
                        localStorage.setItem('active-form', '1-21');
                        if (validationLink21) {
                            window.location.href = validationLink21.href;
                        }
                    });
                }
                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
