<x-layout :title="'Application for Temporary Permit to Propagate/Demonstrate (Form 1-14)'" :form-header="['formNo' => 'NTC 1-14', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form114" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR TEMPORARY PERMIT TO PROPAGATE/DEMONSTRATE</div>
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
                    <ul class="steps-list" id="stepsList14">
                        <li class="step-item active" data-step="nature">Nature of Service <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="class">Class of Station <span class="step-status">&nbsp;</span>
                        </li>
                        <li class="step-item" data-step="service">Radio Service <span class="step-status">&nbsp;</span>
                        </li>
                        <li class="step-item" data-step="personal">Applicant Information <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="particulars">Station/Equipment <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-nature">
                        <fieldset class="fieldset-compact">
                            <legend>Nature of Service</legend>
                            @php
                                $natureServiceValue = old('nature_service', $form['nature_service'] ?? []);
                                if (!is_array($natureServiceValue)) {
                                    $natureServiceValue = [];
                                }
                            @endphp
                            <div class="form-field" data-require-one="input[type=checkbox]">
                                <label><input type="checkbox" name="nature_service" value="cv_private"
                                    {{ in_array('cv_private', $natureServiceValue) ? 'checked' : '' }}> CV
                                    (PRIVATE)</label>
                                <input class="form1-01-input" type="text" name="cv_private_details"
                                    placeholder="Details"
                                    value="{{ old('cv_private_details', $form['cv_private_details'] ?? '') }}">
                                <label><input type="checkbox" name="nature_service" value="co_government"
                                    {{ in_array('co_government', $natureServiceValue) ? 'checked' : '' }}> CO
                                    (GOVERNMENT)</label>
                                <input class="form1-01-input" type="text" name="co_government_details"
                                    placeholder="Details"
                                    value="{{ old('co_government_details', $form['co_government_details'] ?? '') }}">
                                <label><input type="checkbox" name="nature_service" value="cp_public"
                                    {{ in_array('cp_public', $natureServiceValue) ? 'checked' : '' }}> CP (PUBLIC
                                    CORRESPONDENCE)</label>
                                <input class="form1-01-input" type="text" name="cp_public_details"
                                    placeholder="Details"
                                    value="{{ old('cp_public_details', $form['cp_public_details'] ?? '') }}">
                                @error('nature_service')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-class">
                        <fieldset class="fieldset-compact">
                            <legend>Class of Station (indicate units)</legend>
                            @php
                                $stationClassValue = old('station_class', $form['station_class'] ?? []);
                                if (!is_array($stationClassValue)) {
                                    $stationClassValue = [];
                                }
                            @endphp
                            <div class="form-grid-2" data-require-one="input[type=checkbox]">
                                <div class="form-field">
                                    <label><input type="checkbox" name="station_class" value="rt"
                                        {{ in_array('rt', $stationClassValue) ? 'checked' : '' }}> RT</label>
                                    <input class="form1-01-input" type="text" name="rt_units" placeholder="Units"
                                        value="{{ old('rt_units', $form['rt_units'] ?? '') }}">
                                    <label><input type="checkbox" name="station_class" value="fx"
                                        {{ in_array('fx', $stationClassValue) ? 'checked' : '' }}> FX</label>
                                    <input class="form1-01-input" type="text" name="fx_units" placeholder="Units"
                                        value="{{ old('fx_units', $form['fx_units'] ?? '') }}">
                                    <label><input type="checkbox" name="station_class" value="fb"
                                        {{ in_array('fb', $stationClassValue) ? 'checked' : '' }}> FB</label>
                                    <input class="form1-01-input" type="text" name="fb_units" placeholder="Units"
                                        value="{{ old('fb_units', $form['fb_units'] ?? '') }}">
                                    <label><input type="checkbox" name="station_class" value="ml"
                                        {{ in_array('ml', $stationClassValue) ? 'checked' : '' }}> ML</label>
                                    <input class="form1-01-input" type="text" name="ml_units" placeholder="Units"
                                        value="{{ old('ml_units', $form['ml_units'] ?? '') }}">
                                    <label><input type="checkbox" name="station_class" value="p"
                                        {{ in_array('p', $stationClassValue) ? 'checked' : '' }}> P</label>
                                    <input class="form1-01-input" type="text" name="p_units" placeholder="Units"
                                        value="{{ old('p_units', $form['p_units'] ?? '') }}">
                                    <label><input type="checkbox" name="station_class" value="bc"
                                        {{ in_array('bc', $stationClassValue) ? 'checked' : '' }}> BC</label>
                                    <input class="form1-01-input" type="text" name="bc_units"
                                        placeholder="Units"
                                        value="{{ old('bc_units', $form['bc_units'] ?? '') }}">
                                </div>
                                <div class="form-field">
                                    <label><input type="checkbox" name="station_class" value="fa"
                                        {{ in_array('fa', $stationClassValue) ? 'checked' : '' }}> FA</label>
                                    <input class="form1-01-input" type="text" name="fa_units"
                                        placeholder="Units"
                                        value="{{ old('fa_units', $form['fa_units'] ?? '') }}">
                                    <label><input type="checkbox" name="station_class" value="ma"
                                        {{ in_array('ma', $stationClassValue) ? 'checked' : '' }}> MA</label>
                                    <input class="form1-01-input" type="text" name="ma_units"
                                        placeholder="Units"
                                        value="{{ old('ma_units', $form['ma_units'] ?? '') }}">
                                    <label><input type="checkbox" name="station_class" value="tc"
                                        {{ in_array('tc', $stationClassValue) ? 'checked' : '' }}> TC</label>
                                    <input class="form1-01-input" type="text" name="tc_units"
                                        placeholder="Units"
                                        value="{{ old('tc_units', $form['tc_units'] ?? '') }}">
                                    <label><input type="checkbox" name="station_class" value="others"
                                        {{ in_array('others', $stationClassValue) ? 'checked' : '' }}> OTHERS,
                                        specify</label>
                                    <input class="form1-01-input" type="text" name="others_station_specify"
                                        placeholder="Type"
                                        value="{{ old('others_station_specify', $form['others_station_specify'] ?? '') }}">
                                </div>
                            </div>
                            @error('station_class')
                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-service">
                        <fieldset class="fieldset-compact">
                            <legend>Type of Radio Service</legend>
                            @php
                                $radioServiceValue = old('radio_service', $form['radio_service'] ?? []);
                                if (!is_array($radioServiceValue)) {
                                    $radioServiceValue = [];
                                }
                            @endphp
                            <div class="form-field" data-require-one="input[type=checkbox]">
                                <label><input type="checkbox" name="radio_service" value="fixed_land_mobile"
                                    {{ in_array('fixed_land_mobile', $radioServiceValue) ? 'checked' : '' }}>
                                    FIXED AND LAND MOBILE</label>
                                <input class="form1-01-input" type="text" name="fixed_land_mobile_details"
                                    placeholder="Details"
                                    value="{{ old('fixed_land_mobile_details', $form['fixed_land_mobile_details'] ?? '') }}">
                                <label><input type="checkbox" name="radio_service" value="aeronautical"
                                    {{ in_array('aeronautical', $radioServiceValue) ? 'checked' : '' }}>
                                    AERONAUTICAL</label>
                                <input class="form1-01-input" type="text" name="aeronautical_details"
                                    placeholder="Details"
                                    value="{{ old('aeronautical_details', $form['aeronautical_details'] ?? '') }}">
                                <label><input type="checkbox" name="radio_service" value="broadcast"
                                    {{ in_array('broadcast', $radioServiceValue) ? 'checked' : '' }}>
                                    BROADCAST</label>
                                <input class="form1-01-input" type="text" name="broadcast_details"
                                    placeholder="Details"
                                    value="{{ old('broadcast_details', $form['broadcast_details'] ?? '') }}">
                                <label><input type="checkbox" name="radio_service" value="others"
                                    {{ in_array('others', $radioServiceValue) ? 'checked' : '' }}> OTHERS,
                                    specify</label>
                                <input class="form1-01-input" type="text" name="others_radio_specify"
                                    placeholder="Specify"
                                    value="{{ old('others_radio_specify', $form['others_radio_specify'] ?? '') }}">
                                @error('radio_service')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-personal">
                        <fieldset>
                            <legend>Applicant's Details</legend>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Applicant</label>
                                    <input class="form1-01-input" type="text" name="applicant" required
                                        value="{{ old('applicant', $form['applicant'] ?? '') }}">
                                    @error('applicant')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Email Address</label>
                                    <input class="form1-01-input" type="email" name="email" required
                                        value="{{ old('email', $form['email'] ?? '') }}">
                                    @error('email')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Contact Number</label>
                                    <input class="form1-01-input" type="text" name="contact_number" required
                                        value="{{ old('contact_number', $form['contact_number'] ?? '') }}">
                                    @error('contact_number')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Unit/Rm/Bldg No.</label>
                                    <input class="form1-01-input" type="text" name="unit_no"
                                        value="{{ old('unit_no', $form['unit_no'] ?? '') }}">
                                    @error('unit_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Street</label>
                                    <input class="form1-01-input" type="text" name="street"
                                        value="{{ old('street', $form['street'] ?? '') }}">
                                    @error('street')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Barangay</label>
                                    <input class="form1-01-input" type="text" name="barangay"
                                        value="{{ old('barangay', $form['barangay'] ?? '') }}">
                                    @error('barangay')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">City/Municipality</label>
                                    <input class="form1-01-input" type="text" name="city"
                                        value="{{ old('city', $form['city'] ?? '') }}">
                                    @error('city')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Province</label>
                                    <input class="form1-01-input" type="text" name="province"
                                        value="{{ old('province', $form['province'] ?? '') }}">
                                    @error('province')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Zip Code</label>
                                    <input class="form1-01-input" type="text" name="zip_code"
                                        value="{{ old('zip_code', $form['zip_code'] ?? '') }}">
                                    @error('zip_code')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-particulars">
                        <fieldset>
                            <legend>Particulars of Station / Equipment</legend>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Exact Location</label>
                                    <input class="form1-01-input" type="text" name="exact_location"
                                        value="{{ old('exact_location', $form['exact_location'] ?? '') }}">
                                    @error('exact_location')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Long (deg-min-sec)</label>
                                    <input class="form1-01-input" type="text" name="longitude"
                                        value="{{ old('longitude', $form['longitude'] ?? '') }}">
                                    @error('longitude')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Lat (deg-min-sec)</label>
                                    <input class="form1-01-input" type="text" name="latitude"
                                        value="{{ old('latitude', $form['latitude'] ?? '') }}">
                                    @error('latitude')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Points of Comm/Service
                                        Area</label>
                                    <input class="form1-01-input" type="text" name="points_of_comm"
                                        value="{{ old('points_of_comm', $form['points_of_comm'] ?? '') }}">
                                    @error('points_of_comm')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Proposed Freq.</label>
                                    <input class="form1-01-input" type="text" name="proposed_freq"
                                        value="{{ old('proposed_freq', $form['proposed_freq'] ?? '') }}">
                                    @error('proposed_freq')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">BW & Emission</label>
                                    <input class="form1-01-input" type="text" name="bw_emission"
                                        value="{{ old('bw_emission', $form['bw_emission'] ?? '') }}">
                                    @error('bw_emission')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Data Rate</label>
                                    <input class="form1-01-input" type="text" name="data_rate"
                                        value="{{ old('data_rate', $form['data_rate'] ?? '') }}">
                                    @error('data_rate')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Others, specify</label>
                                    <input class="form1-01-input" type="text" name="others_station"
                                        value="{{ old('others_station', $form['others_station'] ?? '') }}">
                                    @error('others_station')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Make/Type/Model</label>
                                    <input class="form1-01-input" type="text" name="make_type_model"
                                        value="{{ old('make_type_model', $form['make_type_model'] ?? '') }}">
                                    @error('make_type_model')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Serial Number</label>
                                    <input class="form1-01-input" type="text" name="serial_number"
                                        value="{{ old('serial_number', $form['serial_number'] ?? '') }}">
                                    @error('serial_number')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Power Output</label>
                                    <input class="form1-01-input" type="text" name="power_output"
                                        value="{{ old('power_output', $form['power_output'] ?? '') }}">
                                    @error('power_output')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Frequency Range</label>
                                    <input class="form1-01-input" type="text" name="frequency_range"
                                        value="{{ old('frequency_range', $form['frequency_range'] ?? '') }}">
                                    @error('frequency_range')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>
                    <!-- Existing declaration section commented out (pj)-->
                    <!-- <section class="step-content" id="step-declaration">
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
                                    id="validateBtn14">Proceed to Validation</button></div>
                        </fieldset>
                    </section> -->
                </div>
            </div>
        </form>

        <script>
            (function() {
                const stepsOrder = ['nature', 'class', 'service', 'personal', 'particulars', 'declaration'];
                const stepsList = document.getElementById('stepsList14');
                const form = document.getElementById('form114');
                const validationLink14 = document.getElementById('validationLink14');

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

                const validateBtn = document.getElementById('validateBtn14');
                if (validateBtn) {
                    validateBtn.addEventListener('click', async () => {
                        const formData = new FormData(form);
                        formData.forEach((value, key) => {
                            console.log(`${key}: ${value}`);
                        });
                        if (!validateActiveStep()) return;
                        form.submit();

                        // -- commented AJAX for now--
                        // -- uncomment if fixed -Richmond

                        //const formData = new FormData(form);
                        // try {
                        //     const res = await fetch(form.action, {
                        //         method: 'POST',
                        //         headers: {
                        //             'Content-Type': 'application/json',
                        //             'Accept': 'application/json'
                        //         },
                        //         body: formData
                        //     });
                        //     const text = await res.text();
                        //     console.log(text);
                        //     let json = null;
                        //     try {
                        //         json = JSON.parse(text);
                        //     } catch (e) {}
                        //     if (res.ok) {
                        //         if (json.form_token) {
                        //             localStorage.setItem('form_token', json.form_token);
                        //         }
                        //         localStorage.setItem('active-form', '1-14');
                        //         if (validationLink14) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink14.href, window.location.origin);
                        //             if (token) url.searchParams.set('token', token);
                        //             window.location.href = url.toString();
                        //         }
                        //     } else {
                        //         console.error('Save failed payload:', json || text);
                        //         alert('Failed to save. Details logged to console.');
                        //     }
                        // } catch (e) {
                        //     console.error('Network error:', e);
                        //     alert('Network error. Please try again.');
                        // }
                    });
                }
                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
