<x-layout :title="'Application for Amateur Radio Operator Certificate/Amateur Radio Station License (Form 1-03)'" :form-header="['formNo' => 'NTC 1-03', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form103">
            <div class="form1-01-header">APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE/AMATEUR RADIO STATION
                LICENSE</div>
            <div class="form1-01-note"><strong>NOTE:</strong> The system asks for additional info when applicant is
                a minor.</div>
            <div class="form1-01-warning">
                <div class="form1-01-warning-title">WARNING:</div> Ensure that all details in the name and date of
                birth fields are correct. We cannot edit those fields on site and you will need to set a new
                appointment.<div class="form1-01-agree"><label><input type="checkbox" /> I agree / Malinaw sa
                        akin</label></div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList03">
                        <li class="step-item active" data-step="personal">Personal Information <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="application">Application/Permit <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="class">Class of Station <span class="step-status">&nbsp;</span>
                        </li>
                        <li class="step-item" data-step="exam">Examination Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="equipment">Equipment Particulars <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-personal">
                        <fieldset>
                            <legend>Applicant's Details</legend>
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">Last Name</label><input
                                        class="form1-01-input" type="text" name="last_name" required></div>
                                <div class="form-field"><label class="form-label">First Name</label><input
                                        class="form1-01-input" type="text" name="first_name" required></div>
                                <div class="form-field"><label class="form-label">Middle Name</label><input
                                        class="form1-01-input" type="text" name="middle_name"></div>
                            </div>
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">Call Sign</label><input
                                        class="form1-01-input" type="text" name="call_sign"></div>
                                <div class="form-field"><label class="form-label">ATROC/ARSL No.</label><input
                                        class="form1-01-input" type="text" name="atroc_arsl_no"></div>
                                <div class="form-field"><label class="form-label">Date of Birth</label><input
                                        class="form1-01-input" type="date" name="dob" required></div>
                            </div>
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">Sex</label>
                                    <div class="inline-radio"><label><input type="radio" name="sex" value="male"
                                                required> Male</label><label><input type="radio" name="sex"
                                                value="female"> Female</label></div>
                                </div>
                                <div class="form-field"><label class="form-label">Nationality</label><input
                                        class="form1-01-input" type="text" name="nationality"></div>
                                <div class="form-field"><label class="form-label">Validity</label><input
                                        class="form1-01-input" type="date" name="validity"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Unit/Rm/House/Bldg
                                        No.</label><input class="form1-01-input" type="text" name="unit_no">
                                </div>
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
                                <div class="form-field"><label class="form-label">Contact Number</label><input
                                        class="form1-01-input" type="text" name="contact_number" required>
                                </div>
                                <div class="form-field"><label class="form-label">Email</label><input
                                        class="form1-01-input" type="email" name="email" required></div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-application">
                        <fieldset class="fieldset-compact">
                            <legend>Type of Application</legend>
                            <div class="form-field" data-require-one="input[type=checkbox]">
                                <label><input type="checkbox" name="application_type" value="new"> NEW</label>
                                <label><input type="checkbox" name="application_type" value="renewal">
                                    RENEWAL</label>
                                <label><input type="checkbox" name="application_type" value="modification">
                                    MODIFICATION due to</label>
                                <input class="form1-01-input" type="text" name="modification_reason"
                                    placeholder="Reason (if modification)">
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-class">
                        <fieldset class="fieldset-compact">
                            <legend>Type of Permit/License/Certificate and Class of Station</legend>
                            <div class="form-grid-2">
                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    <label><input type="checkbox" name="permit_type" value="amateur_operator">
                                        Amateur Radio Operator Certificate</label>
                                    <label><input type="checkbox" name="permit_type" value="amateur_station">
                                        Amateur Radio Station License</label>
                                    <label><input type="checkbox" name="permit_type" value="club_station"> Club
                                        Radio Station License</label>
                                    <div style="margin-left:12px;margin-top:8px;">
                                        <label class="form-label">Name of Club</label>
                                        <input class="form1-01-input" type="text" name="club_name">
                                        <label class="form-label">Assigned Freq.</label>
                                        <input class="form1-01-input" type="text" name="assigned_frequency">
                                    </div>
                                    <label><input type="checkbox" name="permit_type" value="temporary_foreign">
                                        Temporary Permit for Foreign Visitor</label>
                                    <label><input type="checkbox" name="permit_type" value="special_vanity">
                                        Special Permit for Vanity/Special Call Sign</label>
                                    <label class="form-label">Preferred Call Sign/s</label>
                                    <input class="form1-01-input" type="text" name="preferred_call_sign">
                                </div>
                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    <label><input type="checkbox" name="station_class" value="class_a"> Class
                                        A</label>
                                    <label><input type="checkbox" name="station_class" value="class_b"> Class
                                        B</label>
                                    <label><input type="checkbox" name="station_class" value="class_c"> Class
                                        C</label>
                                    <label><input type="checkbox" name="station_class" value="class_d"> Class
                                        D</label>
                                    <label class="form-label">No. of Years</label>
                                    <input class="form1-01-input" type="text" name="years"
                                        placeholder="e.g., 2">
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-exam">
                        <fieldset class="fieldset-compact">
                            <legend>Examination Details</legend>
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">Place of Exam</label><input
                                        class="form1-01-input" type="text" name="exam_place" required></div>
                                <div class="form-field"><label class="form-label">Date</label><input
                                        class="form1-01-input" type="date" name="exam_date" required></div>
                                <div class="form-field"><label class="form-label">Rating</label><input
                                        class="form1-01-input" type="text" name="rating"></div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-equipment">
                        <fieldset>
                            <legend>Particulars of Equipment (Use separate sheet/s, if necessary)</legend>
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
                                            <td><input class="table-input" type="text" name="equipment_make_1">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_type_1">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_serial_1">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_freq_1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment_make_2">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_type_2">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_serial_2">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_freq_2">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment_make_3">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_type_3">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_serial_3">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_freq_3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment_make_4">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_type_4">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_serial_4">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_freq_4">
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
                                    id="validateBtn03">Proceed to Validation</button></div>
                        </fieldset>
                    </section>
                </div>
            </div>
        </form>

        <script>
            (function() {
                const stepsOrder = ['personal', 'application', 'class', 'exam', 'equipment', 'declaration'];
                const stepsList = document.getElementById('stepsList03');
                const form = document.getElementById('form103');
                const validationLink03 = document.getElementById('validationLink03');

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
                document.querySelectorAll('[data-next]').forEach(b => b.addEventListener('click', () => {
                    if (validateActiveStep()) go(1);
                }));
                document.querySelectorAll('[data-prev]').forEach(b => b.addEventListener('click', () => go(-1)));

                const validateBtn = document.getElementById('validateBtn03');
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
                        localStorage.setItem('form1-03-data', JSON.stringify(entries));
                        localStorage.setItem('active-form', '1-03');
                        if (validationLink03) {
                            window.location.href = validationLink03.href;
                        }
                    });
                }
                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
