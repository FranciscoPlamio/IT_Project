<x-layout :title="'Application for Permit to Purchase/Possess/Sell/Transfer (Form 1-09)'" :form-header="['formNo' => 'NTC 1-09', 'revisionNo' => '03', 'revisionDate' => '03/31/2023']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form109">
            <div class="form1-01-header">APPLICATION FOR PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER</div>
            <div class="form1-01-note"><strong>NOTE:</strong> The system asks for additional info when applicant is
                a minor.</div>
            <div class="form1-01-warning">
                <div class="form1-01-warning-title">WARNING:</div> Ensure that all details in critical
                identification fields are correct. Incorrect entries may require setting a new appointment.<div
                    class="form1-01-agree"><label><input type="checkbox" /> I agree / Malinaw sa akin</label></div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList09">
                        <li class="step-item active" data-step="personal">Personal Information <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="application">Application Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="station">Station/Equipment Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="source">Source of Equipment <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="intended">Intended Use <span class="step-status">&nbsp;</span>
                        </li>
                        <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-personal">
                        <fieldset>
                            <legend>Applicant's Details</legend>
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">Applicant</label><input
                                        class="form1-01-input" type="text" name="applicant" required></div>
                                <div class="form-field"><label class="form-label">CPC/CPCN/PA/RSL No.</label><input
                                        class="form1-01-input" type="text" name="cpc_cpcn_pa_rsl_no"></div>
                                <div class="form-field"><label class="form-label">Validity</label><input
                                        class="form1-01-input" type="date" name="validity"></div>
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
                                <div class="form-field"><label class="form-label">Contact Number</label><input
                                        class="form1-01-input" type="text" name="contact_number" required></div>
                                <div class="form-field"><label class="form-label">Email Address</label><input
                                        class="form1-01-input" type="email" name="email" required></div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-application">
                        <fieldset class="fieldset-compact">
                            <legend>Application Details</legend>
                            <div class="form-grid-2">
                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    <label class="form-label">Type of Application</label>
                                    <label><input type="checkbox" name="application_type" value="purchase">
                                        PURCHASE</label>
                                    <label><input type="checkbox" name="application_type" value="possess">
                                        POSSESS</label>
                                    <label><input type="checkbox" name="application_type" value="sell_transfer">
                                        SELL/TRANSFER</label>
                                </div>
                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    <label class="form-label">Type of Radio Service</label>
                                    <label><input type="checkbox" name="radio_service" value="fixed_land_mobile">
                                        FIXED AND LAND MOBILE</label>
                                    <label><input type="checkbox" name="radio_service" value="aeronautical">
                                        AERONAUTICAL</label>
                                    <label><input type="checkbox" name="radio_service" value="maritime">
                                        MARITIME</label>
                                    <label><input type="checkbox" name="radio_service" value="broadcast">
                                        BROADCAST</label>
                                    <label><input type="checkbox" name="radio_service" value="amateur">
                                        AMATEUR</label>
                                    <label>OTHERS, specify</label>
                                    <input class="form1-01-input" type="text" name="others_specify">
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    <label class="form-label">Nature of Service</label>
                                    <label><input type="checkbox" name="nature_service" value="cv_private"> CV
                                        (PRIVATE)</label>
                                    <label><input type="checkbox" name="nature_service" value="co_government"> CO
                                        (GOVERNMENT)</label>
                                    <label><input type="checkbox" name="nature_service" value="cp_public"> CP
                                        (PUBLIC CORRESPONDENCE)</label>
                                </div>
                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    <label class="form-label">Class of Station (indicate units)</label>
                                    <label><input type="checkbox" name="station_class" value="rt"> RT (Radio
                                        Telephone)</label>
                                    <input class="form1-01-input" type="text" name="rt_units"
                                        placeholder="Units">
                                    <label><input type="checkbox" name="station_class" value="fx"> FX
                                        (Fixed)</label>
                                    <input class="form1-01-input" type="text" name="fx_units"
                                        placeholder="Units">
                                    <label><input type="checkbox" name="station_class" value="fb"> FB (Fixed
                                        Base)</label>
                                    <input class="form1-01-input" type="text" name="fb_units"
                                        placeholder="Units">
                                    <label><input type="checkbox" name="station_class" value="ml"> ML (Mobile
                                        Land)</label>
                                    <input class="form1-01-input" type="text" name="ml_units"
                                        placeholder="Units">
                                    <label><input type="checkbox" name="station_class" value="p"> P
                                        (Portable)</label>
                                    <input class="form1-01-input" type="text" name="p_units" placeholder="Units">
                                    <label><input type="checkbox" name="station_class" value="bc"> BC
                                        (Broadcast)</label>
                                    <input class="form1-01-input" type="text" name="bc_units"
                                        placeholder="Units">
                                    <label><input type="checkbox" name="station_class" value="fc"> FC (Fixed
                                        Commercial)</label>
                                    <input class="form1-01-input" type="text" name="fc_units"
                                        placeholder="Units">
                                    <label><input type="checkbox" name="station_class" value="fa"> FA (Fixed
                                        Aeronautical)</label>
                                    <input class="form1-01-input" type="text" name="fa_units"
                                        placeholder="Units">
                                    <label><input type="checkbox" name="station_class" value="ma"> MA (Mobile
                                        Aeronautical)</label>
                                    <input class="form1-01-input" type="text" name="ma_units"
                                        placeholder="Units">
                                    <label><input type="checkbox" name="station_class" value="tc"> TC
                                        (Temporary Commercial)</label>
                                    <input class="form1-01-input" type="text" name="tc_units"
                                        placeholder="Units">
                                    <label><input type="checkbox" name="station_class" value="others_station">
                                        OTHERS, specify</label>
                                    <input class="form1-01-input" type="text" name="others_station_specify"
                                        placeholder="Type">
                                    <input class="form1-01-input" type="text" name="others_station_units"
                                        placeholder="Units">
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-station">
                        <fieldset class="fieldset-compact">
                            <legend>Particulars of Proposed Station/Equipment</legend>
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">Exact Location</label><input
                                        class="form1-01-input" type="text" name="exact_location" required>
                                </div>
                                <div class="form-field"><label class="form-label">Longitude
                                        (deg-min-sec)</label><input class="form1-01-input" type="text"
                                        name="longitude"></div>
                                <div class="form-field"><label class="form-label">Latitude
                                        (deg-min-sec)</label><input class="form1-01-input" type="text"
                                        name="latitude"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Points of Comm/Service
                                        Area</label><input class="form1-01-input" type="text"
                                        name="points_of_comm"></div>
                                <div class="form-field"><label class="form-label">Frequency</label><input
                                        class="form1-01-input" type="text" name="frequency"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Make/Type/Model</label><input
                                        class="form1-01-input" type="text" name="make_type_model"></div>
                                <div class="form-field"><label class="form-label">Serial Number</label><input
                                        class="form1-01-input" type="text" name="serial_number"></div>
                            </div>
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">Bandwidth &
                                        Emission</label><input class="form1-01-input" type="text"
                                        name="bandwidth_emission"></div>
                                <div class="form-field"><label class="form-label">Power Output</label><input
                                        class="form1-01-input" type="text" name="power_output"></div>
                                <div class="form-field"><label class="form-label">Frequency Range</label><input
                                        class="form1-01-input" type="text" name="frequency_range"></div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-source">
                        <fieldset class="fieldset-compact">
                            <legend>Source of Equipment</legend>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Name of Dealer</label><input
                                        class="form1-01-input" type="text" name="dealer_name"></div>
                                <div class="form-field"><label class="form-label">Authorized
                                        Seller/Buyer</label><input class="form1-01-input" type="text"
                                        name="authorized_seller_buyer"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">OR/Invoice No.</label><input
                                        class="form1-01-input" type="text" name="or_invoice_no"></div>
                                <div class="form-field"><label class="form-label">Permit/RSL No.</label><input
                                        class="form1-01-input" type="text" name="permit_rsl_no"></div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-intended">
                        <fieldset class="fieldset-compact">
                            <legend>Intended Use of Equipment</legend>
                            <div class="form-field" data-require-one="input[type=checkbox]">
                                <label><input type="checkbox" name="intended_use" value="new_radio_station"> New
                                    Radio Station</label>
                                <label><input type="checkbox" name="intended_use" value="additional_radio_station">
                                    Additional Radio Station</label>
                                <label><input type="checkbox" name="intended_use" value="change_equipment">
                                    Change of Equipment</label>
                                <label><input type="checkbox" name="intended_use" value="additional_equipment">
                                    Additional Equipment</label>
                                <label><input type="checkbox" name="intended_use" value="storage"> Storage
                                    at:</label>
                                <input class="form1-01-input" type="text" name="storage_location"
                                    placeholder="Location">
                                <label><input type="checkbox" name="intended_use" value="others_use"> Others,
                                    specify</label>
                                <input class="form1-01-input" type="text" name="others_use_specify"
                                    placeholder="Specify">
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
                                    id="validateBtn09">Proceed to Validation</button></div>
                        </fieldset>
                    </section>
                </div>
            </div>
        </form>

        <script>
            (function() {
                const stepsOrder = ['personal', 'application', 'station', 'source', 'intended', 'declaration'];
                const stepsList = document.getElementById('stepsList09');
                const form = document.getElementById('form109');
                const validationLink09 = document.getElementById('validationLink09');

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

                const validateBtn = document.getElementById('validateBtn09');
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
                        localStorage.setItem('form1-09-data', JSON.stringify(entries));
                        localStorage.setItem('active-form', '1-09');
                        if (validationLink09) {
                            window.location.href = validationLink09.href;
                        }
                    });
                }
                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
