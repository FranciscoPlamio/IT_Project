<x-layout :title="'Complaint Form (Form 1-25)'" :form-header="['formNo' => 'NTC 1-25', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form125" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">COMPLAINT FORM</div>
            <div class="form1-01-note"><strong>NOTE:</strong> Indicate "N/A" for items not applicable.</div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList25">
                        <li class="step-item active" data-step="complainant">Complainant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="provider">Service Provider <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="complaint">Nature of Complaint <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="details">Complaint Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="documents">Supporting Documents <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-complainant">
                        <fieldset class="fieldset-compact">
                            <legend>Complainant's Details</legend>
                            <div class="form-field">
                                <label class="form-label">Name</label>
                                <input class="form1-01-input" type="text" name="complainant_name" required
                                    value="{{ old('complainant_name', $form['complainant_name'] ?? '') }}">
                                @error('complainant_name')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label class="form-label">Postal Address</label>
                                <input class="form1-01-input" type="text" name="postal_address" required
                                    value="{{ old('postal_address', $form['postal_address'] ?? '') }}">
                                @error('postal_address')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Email Address</label>
                                    <input class="form1-01-input" type="email" name="email_address"
                                        value="{{ old('email_address', $form['email_address'] ?? '') }}">
                                    @error('email_address')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Contact Number</label>
                                    <input class="form1-01-input" type="text" name="contact_number"
                                        value="{{ old('contact_number', $form['contact_number'] ?? '') }}">
                                    @error('contact_number')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-provider">
                        <fieldset class="fieldset-compact">
                            <legend>Particulars of Service Provider</legend>
                            <div class="form-field">
                                <label class="form-label">Business Name</label>
                                <input class="form1-01-input" type="text" name="business_name" required
                                    value="{{ old('business_name', $form['business_name'] ?? '') }}">
                                @error('business_name')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label class="form-label">Business Address</label>
                                <input class="form1-01-input" type="text" name="business_address" required
                                    value="{{ old('business_address', $form['business_address'] ?? '') }}">
                                @error('business_address')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label class="form-label">Contact Number</label>
                                <input class="form1-01-input" type="text" name="provider_contact_number"
                                    value="{{ old('provider_contact_number', $form['provider_contact_number'] ?? '') }}">
                                @error('provider_contact_number')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-complaint">
                        <fieldset class="fieldset-compact">
                            <legend>Nature of Complaint</legend>
                            <div class="form-grid-2" data-require-one="input[type=radio]">
                                <div class="form-field">
                                    <label><input type="radio" name="complaint_type" value="billing"
                                            {{ old('complaint_type', $form['complaint_type'] ?? '') == 'billing' ? 'checked' : '' }}>
                                        Billing Complaint</label>
                                    <label><input type="radio" name="complaint_type" value="spam"
                                            {{ old('complaint_type', $form['complaint_type'] ?? '') == 'spam' ? 'checked' : '' }}>
                                        Spam</label>
                                    <label><input type="radio" name="complaint_type" value="scam"
                                            {{ old('complaint_type', $form['complaint_type'] ?? '') == 'scam' ? 'checked' : '' }}>
                                        Scam</label>
                                    <label><input type="radio" name="complaint_type" value="fair_use"
                                            {{ old('complaint_type', $form['complaint_type'] ?? '') == 'fair_use' ? 'checked' : '' }}>
                                        Fair Use</label>
                                </div>
                                <div class="form-field">
                                    <label><input type="radio" name="complaint_type" value="poor_service"
                                            {{ old('complaint_type', $form['complaint_type'] ?? '') == 'poor_service' ? 'checked' : '' }}>
                                        Poor Service (Technical Service/Customer Service)</label>
                                    <label><input type="radio" name="complaint_type" value="denial_subscription"
                                            {{ old('complaint_type', $form['complaint_type'] ?? '') == 'denial_subscription' ? 'checked' : '' }}>
                                        Denial of Subscription Plan</label>
                                    <label><input type="radio" name="complaint_type" value="others"
                                            {{ old('complaint_type', $form['complaint_type'] ?? '') == 'others' ? 'checked' : '' }}>
                                        Others, please specify:</label>
                                    <input class="form1-01-input" type="text" name="complaint_type_others"
                                        placeholder="Specify other complaint type"
                                        value="{{ old('complaint_type_others', $form['complaint_type_others'] ?? '') }}">
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Date of incident/transaction</label>
                                    <input class="form1-01-input" type="date" name="incident_date" required
                                        value="{{ old('incident_date', $form['incident_date'] ?? '') }}">
                                    @error('incident_date')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Time of incident/transaction</label>
                                    <input class="form1-01-input" type="time" name="incident_time"
                                        value="{{ old('incident_time', $form['incident_time'] ?? '') }}">
                                    @error('incident_time')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-details">
                        <fieldset class="fieldset-compact">
                            <legend>State Briefly the Details of Complaint</legend>
                            <div class="form-field">
                                <textarea class="form1-01-input" name="complaint_details" rows="6"
                                    style="resize:vertical;width:100%;max-width:none;"
                                    placeholder="Please provide detailed information about your complaint..." required>{{ old('complaint_details', $form['complaint_details'] ?? '') }}</textarea>
                                @error('complaint_details')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-documents">
                        <fieldset class="fieldset-compact">
                            <legend>Attached Proof/Supporting Documents</legend>
                            <div class="form-field">
                                <textarea class="form1-01-input" name="supporting_documents" rows="4"
                                    style="resize:vertical;width:100%;max-width:none;"
                                    placeholder="Please list all supporting documents attached to this complaint...">{{ old('supporting_documents', $form['supporting_documents'] ?? '') }}</textarea>
                                @error('supporting_documents')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <fieldset style="margin-top:16px;">
                                <legend>Note</legend>
                                <div class="form1-01-declaration">
                                    Complete information regarding the complaint, with the required supporting
                                    documents shall be provided for the Commission to determine the merit of the
                                    complaint, otherwise, it may cause delay in, or prevent the Commission from
                                    taking action on the complaint. The Commission may endorse the complaint to the
                                    concerned government agencies, if warranted. Information provided shall be used
                                    only in matters relative to the complaint.
                                </div>
                            </fieldset>
                        </fieldset>
                        <div class="step-actions">
                            <button class="form1-01-btn" type="button" id="validateBtn25">Proceed to
                                Validation</button>
                        </div>
                    </section>
                </div>
            </div>
        </form>

        <script>
            (function() {
                const stepsOrder = ['complainant', 'provider', 'complaint', 'details', 'documents', 'signature'];
                const stepsList = document.getElementById('stepsList25');
                const form = document.getElementById('form125');

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
