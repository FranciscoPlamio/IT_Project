<x-layout :title="'Application for TVRO Registration Certificate/TVRO Station License/CATV Station License (Form 1-22)'" :form-header="['formNo' => 'NTC 1-22', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form122">
            <div class="form1-01-header">APPLICATION FOR TVRO REGISTRATION CERTIFICATE/TVRO STATION LICENSE/CATV
                STATION LICENSE</div>
            <div class="form1-01-note"><strong>NOTE:</strong> Indicate "N/A" for items not applicable.</div>
            <div class="form1-01-warning">
                <div class="form1-01-warning-title">WARNING:</div>
                Ensure that all details in the name and date of birth fields are correct. We cannot edit those
                fields on site and you will need to set a new appointment.
                <div class="form1-01-agree"><label><input type="checkbox" id="warning-agreement" /> I agree / Malinaw sa
                        akin</label></div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList22">
                        <li class="step-item active" data-step="application">Application Type <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="applicant">Applicant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="equipment">Equipment Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="antenna">Antenna System <span class="step-status">&nbsp;</span>
                        </li>
                        <li class="step-item" data-step="signal">Signal Details <span class="step-status">&nbsp;</span>
                        </li>
                        <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-application">
                        <fieldset class="fieldset-compact">
                            <legend>Type of Application</legend>
                            <div class="form-field" data-require-one="input[type=checkbox]">
                                <label><input type="checkbox" name="application_type" value="new"> NEW</label>
                                <label><input type="checkbox" name="application_type" value="renewal">
                                    RENEWAL</label>
                                <label><input type="checkbox" name="application_type" value="modification">
                                    Modification, use Form B</label>
                            </div>
                        </fieldset>
                        <fieldset class="fieldset-compact">
                            <legend>Type of License/Certificate</legend>
                            <div class="form-field" data-require-one="input[type=checkbox]">
                                <label><input type="checkbox" name="license_type" value="tvro_registration"> TVRO
                                    REGISTRATION CERTIFICATE</label>
                                <label><input type="checkbox" name="license_type" value="tvro_station"> TVRO STATION
                                    LICENSE</label>
                                <label><input type="checkbox" name="license_type" value="catv_station"> CATV STATION
                                    LICENSE</label>
                            </div>
                        </fieldset>
                        <fieldset class="fieldset-compact">
                            <legend>Classification of Applicant</legend>
                            <div class="form-grid-2">
                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    <div class="form-label">Classification</div>
                                    <label><input type="checkbox" name="applicant_classification" value="commercial">
                                        COMMERCIAL</label>
                                    <label><input type="checkbox" name="applicant_classification"
                                            value="non_commercial"> NON-COMMERCIAL</label>
                                </div>
                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    <div class="form-label">Service Type</div>
                                    <label><input type="checkbox" name="service_type" value="broadcasting">
                                        BROADCASTING</label>
                                    <label><input type="checkbox" name="service_type" value="catv"> CATV</label>
                                    <label><input type="checkbox" name="service_type" value="others"> OTHERS,
                                        specify</label>
                                    <input class="form1-01-input" type="text" name="others_service"
                                        placeholder="Specify">
                                </div>
                            </div>
                            <div class="form-field">
                                <label class="form-label">No. of Years</label>
                                <input class="form1-01-input" type="number" name="no_of_years"
                                    placeholder="Number of years">
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
                                        class="form1-01-input" type="text" name="contact_number" required>
                                </div>
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
                                <div class="form-field"><label class="form-label">Validity</label><input
                                        class="form1-01-input" type="date" name="validity"></div>
                                <div class="form-field"><label class="form-label">PA/CA No.</label><input
                                        class="form1-01-input" type="text" name="pa_ca_no"></div>
                            </div>
                            <div class="form-field"><label class="form-label">Service Area</label><input
                                    class="form1-01-input" type="text" name="service_area"></div>
                            <div class="form-field"><label class="form-label">Exact Location of TVRO
                                    System</label><input class="form1-01-input" type="text" name="exact_location">
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Longitude
                                        (deg-min-sec)</label><input class="form1-01-input" type="text"
                                        name="longitude"></div>
                                <div class="form-field"><label class="form-label">Latitude
                                        (deg-min-sec)</label><input class="form1-01-input" type="text"
                                        name="latitude"></div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-equipment">
                        <fieldset>
                            <legend>Particulars of Equipment (For Multiple Equipment, Use Form G)</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>LNA/LNB</th>
                                            <th>RECEIVERS</th>
                                            <th>COMBINER(S)</th>
                                            <th>MODULATORS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="lna_lnb_make">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="lna_lnb_serial">
                                                <div class="table-field-label"><strong>Frequency Range:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="lna_lnb_frequency">
                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="receivers_make">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="receivers_serial">
                                                <div class="table-field-label"><strong>Frequency Range:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="receivers_frequency">
                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="combiners_make">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="combiners_serial">
                                                <div class="table-field-label"><strong>Frequency Range:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="combiners_frequency">
                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="modulators_make">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="modulators_serial">
                                                <div class="table-field-label"><strong>Frequency Range:</strong>
                                                </div>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="modulators_frequency">
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

                    <section class="step-content" id="step-antenna">
                        <fieldset>
                            <legend>Particulars of Antenna System (For Multiple Antenna, Use Form G)</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Make/Type/Model</th>
                                            <th>Dish Diameter</th>
                                            <th>Polarization</th>
                                            <th>Azimuth</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="antenna_make">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="dish_diameter">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="polarization">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="azimuth">
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

                    <section class="step-content" id="step-signal">
                        <fieldset>
                            <legend>Particulars of Signal to be Received (For Multiple Signal, Use Form G)</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Satellite</th>
                                            <th>Received Frequency</th>
                                            <th>Polarization</th>
                                            <th>Name of Programs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="satellite">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="received_frequency">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="signal_polarization">
                                            </td>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="name_of_programs">
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

                    <!-- Declaration fields component -->
                    <x-forms.declaration-field :form="$form ?? []" />
                </div>
            </div>
        </form>

        <script>
            (function() {
                const stepsOrder = ['application', 'applicant', 'equipment', 'antenna', 'signal', 'declaration'];
                const stepsList = document.getElementById('stepsList22');
                const form = document.getElementById('form122');
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
                    if (!warningCheckbox.checked && step !== 'application') {
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
                    // Only allow navigation if warning checkbox is checked
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    showStep(li.dataset.step);
                });
                document.querySelectorAll('[data-next]').forEach(btn => btn.addEventListener('click', () => {
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    if (validateActiveStep()) go(1);
                }));
                document.querySelectorAll('[data-prev]').forEach(btn => btn.addEventListener('click', () => {
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    go(-1);
                }));

                const validateBtn = document.getElementById('validateBtn22');
                if (validateBtn) {
                    validateBtn.addEventListener('click', () => {
                        if (!warningCheckbox.checked) {
                            alert('Please check the agreement checkbox first before proceeding.');
                            return;
                        }
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
                        localStorage.setItem('form1-22-data', JSON.stringify(entries));
                        localStorage.setItem('active-form', '1-22');
                        if (validationLink22) {
                            window.location.href = validationLink22.href;
                        }
                    });
                }
                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
