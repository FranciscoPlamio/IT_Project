<x-layout :title="'Application for Permit to Transport Radio Transmitter(s)/Transceiver(s) (Form 1-16)'" :form-header="['formNo' => 'NTC 1-16', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form116">
            <div class="form1-01-header">APPLICATION FOR PERMIT TO TRANSPORT RADIO TRANSMITTER(S)/TRANSCEIVER(S)
            </div>
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
                    <ul class="steps-list" id="stepsList16">
                        <li class="step-item active" data-step="transport">Transport Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="personal">Applicant Information <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="equipment">Proposed Equipment <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="ntc">NTC Purposes <span class="step-status">&nbsp;</span>
                        </li>
                        <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-transport">
                        <fieldset class="fieldset-compact">
                            <legend>Transport Details</legend>
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">Place of Origin</label><input
                                        class="form1-01-input" type="text" name="place_of_origin" required></div>
                                <div class="form-field"><label class="form-label">Destination</label><input
                                        class="form1-01-input" type="text" name="destination" required></div>
                                <div class="form-field"><label class="form-label">Purpose</label><input
                                        class="form1-01-input" type="text" name="purpose" required></div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-personal">
                        <fieldset>
                            <legend>Applicant's Details</legend>
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">Applicant</label><input
                                        class="form1-01-input" type="text" name="applicant" required></div>
                                <div class="form-field"><label class="form-label">Validity</label><input
                                        class="form1-01-input" type="date" name="validity"></div>
                                <div class="form-field"><label class="form-label">Permit/RSL No.</label><input
                                        class="form1-01-input" type="text" name="permit_rsl_no"></div>
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
                                <div class="form-field"><label class="form-label">City/Municipality</label><input
                                        class="form1-01-input" type="text" name="city"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Province</label><input
                                        class="form1-01-input" type="text" name="province"></div>
                                <div class="form-field"><label class="form-label">Zip Code</label><input
                                        class="form1-01-input" type="text" name="zip_code"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Email Address</label><input
                                        class="form1-01-input" type="email" name="email" required></div>
                                <div class="form-field"><label class="form-label">Contact Number</label><input
                                        class="form1-01-input" type="text" name="contact_number" required>
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-equipment">
                        <fieldset>
                            <legend>Particulars of Proposed Equipment</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Equipment</th>
                                            <th>Equipment</th>
                                            <th>Equipment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="table-input" type="text" name="equipment1_make">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="table-input" type="text" name="equipment1_serial">
                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="table-input" type="text" name="equipment2_make">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="table-input" type="text" name="equipment2_serial">
                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="table-input" type="text" name="equipment3_make">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="table-input" type="text" name="equipment3_serial">
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
                    <section class="step-content" id="step-ntc">
                        <fieldset>
                            <legend>For NTC Purposes Only</legend>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Permit No.</label><input
                                        class="form1-01-input" type="text" name="permit_no"></div>
                                <div class="form-field"><label class="form-label">Date Issued</label><input
                                        class="form1-01-input" type="date" name="date_issued"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">OR No.</label><input
                                        class="form1-01-input" type="text" name="or_no"></div>
                                <div class="form-field"><label class="form-label">OR Date</label><input
                                        class="form1-01-input" type="date" name="or_date"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Amount</label><input
                                        class="form1-01-input" type="text" name="or_amount"></div>
                                <div class="form-field"><label class="form-label">FOR THE COMMISSION</label><input
                                        class="form1-01-input" type="text" name="for_commission_signature">
                                </div>
                            </div>
                            <div style="font-size:0.97rem;margin-top:12px;color:#666;">This PERMIT shall be valid
                                for a period of fifteen (15) days from the date of issuance. Note: This PERMIT is
                                valid only when the payment of the required fees is included.</div>
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
                const stepsOrder = ['transport', 'personal', 'equipment', 'ntc', 'declaration'];
                const stepsList = document.getElementById('stepsList16');
                const form = document.getElementById('form116');
                const validationLink16 = document.getElementById('validationLink16');

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

                function validateActiveStep() {
                    const step = currentStep();
                    const section = document.getElementById(`step-${step}`);
                    let valid = true;
                    section.querySelectorAll('input[required], select[required], textarea[required]').forEach(el => {
                        if (!el.value) valid = false;
                    });
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

                const validateBtn = document.getElementById('validateBtn16');
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
                        localStorage.setItem('form1-16-data', JSON.stringify(entries));
                        localStorage.setItem('active-form', '1-16');
                        if (validationLink16) {
                            window.location.href = validationLink16.href;
                        }
                    });
                }
                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
