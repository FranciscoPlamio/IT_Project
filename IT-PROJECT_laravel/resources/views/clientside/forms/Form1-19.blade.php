<x-layout :title="'Application for Certificate of Registration (Form 1-19)'" :form-header="['formNo' => 'NTC 1-19', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form119">
            <div class="form1-01-header">APPLICATION FOR CERTIFICATE OF REGISTRATION</div>
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
                    <ul class="steps-list" id="stepsList19">
                        <li class="step-item active" data-step="equipment">Type of Equipment/Device <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="applicant">Applicant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="particulars">Equipment & Devices <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-equipment">
                        <fieldset class="fieldset-compact">
                            <legend>Type of Equipment/Device</legend>
                            <div class="form-field" data-require-one="input[type=checkbox]">
                                <label><input type="checkbox" name="equipment_type" value="wdn_indoor"> WIRELESS
                                    DATA NETWORK (WDN) DEVICES - INDOOR</label>
                                <label><input type="checkbox" name="equipment_type" value="srd"> SHORT RANGE
                                    DEVICES (SRD)</label>
                                <label><input type="checkbox" name="equipment_type" value="rfid"> RADIO FREQUENCY
                                    IDENTIFICATION (RFID) DEVICES</label>
                                <label><input type="checkbox" name="equipment_type" value="srrs"> SHORT RANGE
                                    RADIO SERVICE (SRRS) DEVICES</label>
                                <label><input type="checkbox" name="equipment_type" value="public_trunked"> PUBLIC
                                    TRUNKED RADIO EQUIPMENT (MOBILE/PORTABLE)</label>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-applicant">
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
                                <div class="form-field"><label class="form-label">City/Municipality</label><input
                                        class="form1-01-input" type="text" name="city"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Province</label><input
                                        class="form1-01-input" type="text" name="province"></div>
                                <div class="form-field"><label class="form-label">Zip Code</label><input
                                        class="form1-01-input" type="text" name="zip_code"></div>
                            </div>
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">Validity</label><input
                                        class="form1-01-input" type="date" name="validity"></div>
                                <div class="form-field"><label class="form-label">Permit to Import
                                        No.</label><input class="form1-01-input" type="text"
                                        name="permit_import_no"></div>
                                <div class="form-field"><label class="form-label">Invoice No.</label><input
                                        class="form1-01-input" type="text" name="invoice_no"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">CPCN/PA/RSL No.</label><input
                                        class="form1-01-input" type="text" name="cpcn_pa_rsl_no"></div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-particulars">
                        <fieldset>
                            <legend>Particulars of Equipment & Devices</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Make/Type/Model</th>
                                            <th>Quantity</th>
                                            <th>Serial Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment1_make">
                                            </td>
                                            <td><input class="table-input" type="number" name="equipment1_quantity">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment1_serial">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment2_make">
                                            </td>
                                            <td><input class="table-input" type="number" name="equipment2_quantity">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment2_serial">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment3_make">
                                            </td>
                                            <td><input class="table-input" type="number" name="equipment3_quantity">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment3_serial">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment4_make">
                                            </td>
                                            <td><input class="table-input" type="number" name="equipment4_quantity">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment4_serial">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment5_make">
                                            </td>
                                            <td><input class="table-input" type="number" name="equipment5_quantity">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment5_serial">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-grid-2" style="margin-top:12px;">
                                <div class="form-field"><label class="form-label">TOTAL</label><input
                                        class="form1-01-input" type="number" name="total_quantity"></div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>
                    <!-- Declaration fields component -->
                    <x-forms.declaration-field :form="$form ?? []" />
        </form>

        <script>
            (function() {
                const stepsOrder = ['equipment', 'applicant', 'particulars', 'declaration'];
                const stepsList = document.getElementById('stepsList19');
                const form = document.getElementById('form119');

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
                        const entries = {};
                        for (const [key, value] of formData.entries()) {
                            if (value instanceof File) {
                                // Save the file name if a file is selected, otherwise empty string
                                entries[key] = value.name || '';
                            } else {
                                if (entries[key]) {
                                    if (Array.isArray(entries[key])) {
                                        entries[key].push(value);
                                    } else {
                                        entries[key] = [entries[key], value];
                                    }
                                } else {
                                    entries[key] = value;
                                }
                            }
                        }
                        localStorage.setItem('form1-19-data', JSON.stringify(entries));
                        localStorage.setItem('active-form', '1-19');
                        if (validationLink19) {
                            window.location.href = validationLink19.href;
                        }
                    });
                }

                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
