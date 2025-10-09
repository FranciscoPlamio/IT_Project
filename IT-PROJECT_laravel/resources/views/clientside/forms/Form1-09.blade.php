<x-layout :title="'Application for Permit to Purchase/Possess/Sell/Transfer (Form 1-09)'" :form-header="['formNo' => 'NTC 1-09', 'revisionNo' => '03', 'revisionDate' => '03/31/2023']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form109" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
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
                                <div class="form-field">
                                    <label class="form-label">Applicant</label>
                                    <input class="form1-01-input" type="text" name="applicant" required
                                        value="{{ old('applicant', $form['applicant'] ?? '') }}">
                                    @error('applicant')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">CPC/CPCN/PA/RSL No.</label>
                                    <input class="form1-01-input" type="text" name="cpc_cpcn_pa_rsl_no"
                                        value="{{ old('cpc_cpcn_pa_rsl_no', $form['cpc_cpcn_pa_rsl_no'] ?? '') }}">
                                    @error('cpc_cpcn_pa_rsl_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Validity</label>
                                    <input class="form1-01-input" type="date" name="validity"
                                        value="{{ old('validity', $form['validity'] ?? '') }}">
                                    @error('validity')
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
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Contact Number</label>
                                    <input class="form1-01-input" type="text" name="contact_number" required
                                        value="{{ old('contact_number', $form['contact_number'] ?? '') }}">
                                    @error('contact_number')
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
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-application">
                        @php
                            $applicationTypeValue = old('application_type', $form['application_type'] ?? []);
                            if (!is_array($applicationTypeValue)) {
                                $applicationTypeValue = [];
                            }
                        @endphp
                        <fieldset class="fieldset-compact">
                            <legend>Application Details</legend>
                            <div class="form-grid-2">
                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    <label class="form-label">Type of Application</label>
                                    <label><input type="checkbox" name="application_type" value="purchase"
                                        {{ in_array('purchase', $applicationTypeValue) ? 'checked' : '' }}>
                                        PURCHASE</label>
                                    <label><input type="checkbox" name="application_type" value="possess"
                                        {{ in_array('possess', $applicationTypeValue) ? 'checked' : '' }}>
                                        POSSESS</label>
                                    <label><input type="checkbox" name="application_type" value="sell_transfer"
                                        {{ in_array('sell_transfer', $applicationTypeValue) ? 'checked' : '' }}>
                                        SELL/TRANSFER</label>
                                    @error('application_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                @php
                                    $radioServiceValue = old('radio_service', $form['radio_service'] ?? []);
                                    if (!is_array($radioServiceValue)) {
                                        $radioServiceValue = [];
                                    }
                                @endphp
                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    <label class="form-label">Type of Radio Service</label>
                                    <label><input type="checkbox" name="radio_service" value="fixed_land_mobile"
                                        {{ in_array('fixed_land_mobile', $radioServiceValue) ? 'checked' : '' }}>
                                        FIXED AND LAND MOBILE</label>
                                    <label><input type="checkbox" name="radio_service" value="aeronautical"
                                        {{ in_array('aeronautical', $radioServiceValue) ? 'checked' : '' }}>
                                        AERONAUTICAL</label>
                                    <label><input type="checkbox" name="radio_service" value="maritime"
                                        {{ in_array('maritime', $radioServiceValue) ? 'checked' : '' }}>
                                        MARITIME</label>
                                    <label><input type="checkbox" name="radio_service" value="broadcast"
                                        {{ in_array('broadcast', $radioServiceValue) ? 'checked' : '' }}>
                                        BROADCAST</label>
                                    <label><input type="checkbox" name="radio_service" value="amateur"
                                        {{ in_array('amateur', $radioServiceValue) ? 'checked' : '' }}>
                                        AMATEUR</label>
                                    <label>OTHERS, specify</label>
                                    <input class="form1-01-input" type="text" name="others_specify"
                                        value="{{ old('others_specify', $form['others_specify'] ?? '') }}">
                                    @error('radio_service')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    @error('others_specify')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
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
                                <div class="form-field">
                                    <label class="form-label">Exact Location</label>
                                    <input class="form1-01-input" type="text" name="exact_location" required
                                        value="{{ old('exact_location', $form['exact_location'] ?? '') }}">
                                    @error('exact_location')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Longitude
                                        (deg-min-sec)</label>
                                    <input class="form1-01-input" type="text" name="longitude"
                                        value="{{ old('longitude', $form['longitude'] ?? '') }}">
                                    @error('longitude')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Latitude
                                        (deg-min-sec)</label>
                                    <input class="form1-01-input" type="text" name="latitude"
                                        value="{{ old('latitude', $form['latitude'] ?? '') }}">
                                    @error('latitude')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
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
                                    <label class="form-label">Frequency</label>
                                    <input class="form1-01-input" type="text" name="frequency"
                                        value="{{ old('frequency', $form['frequency'] ?? '') }}">
                                    @error('frequency')
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
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Bandwidth &
                                        Emission</label>
                                    <input class="form1-01-input" type="text" name="bandwidth_emission"
                                        value="{{ old('bandwidth_emission', $form['bandwidth_emission'] ?? '') }}">
                                    @error('bandwidth_emission')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
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

                    <section class="step-content" id="step-source">
                        <fieldset class="fieldset-compact">
                            <legend>Source of Equipment</legend>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Name of Dealer</label>
                                    <input class="form1-01-input" type="text" name="dealer_name"
                                        value="{{ old('dealer_name', $form['dealer_name'] ?? '') }}">
                                    @error('dealer_name')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Authorized
                                        Seller/Buyer</label>
                                    <input class="form1-01-input" type="text" name="authorized_seller_buyer"
                                        value="{{ old('authorized_seller_buyer', $form['authorized_seller_buyer'] ?? '') }}">
                                    @error('authorized_seller_buyer')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">OR/Invoice No.</label>
                                    <input class="form1-01-input" type="text" name="or_invoice_no"
                                        value="{{ old('or_invoice_no', $form['or_invoice_no'] ?? '') }}">
                                    @error('or_invoice_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Permit/RSL No.</label>
                                    <input class="form1-01-input" type="text" name="permit_rsl_no"
                                        value="{{ old('permit_rsl_no', $form['permit_rsl_no'] ?? '') }}">
                                    @error('permit_rsl_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-intended">
                        <fieldset class="fieldset-compact">
                            <legend>Intended Use of Equipment</legend>
                            @php
                                $intendedUseValue = old('intended_use', $form['intended_use'] ?? []);
                                if (!is_array($intendedUseValue)) {
                                    $intendedUseValue = [];
                                }
                            @endphp
                            <div class="form-field" data-require-one="input[type=checkbox]">
                                <label><input type="checkbox" name="intended_use" value="new_radio_station"
                                    {{ in_array('new_radio_station', $intendedUseValue) ? 'checked' : '' }}> New
                                    Radio Station</label>
                                <label><input type="checkbox" name="intended_use" value="additional_radio_station"
                                    {{ in_array('additional_radio_station', $intendedUseValue) ? 'checked' : '' }}>
                                    Additional Radio Station</label>
                                <label><input type="checkbox" name="intended_use" value="change_equipment"
                                    {{ in_array('change_equipment', $intendedUseValue) ? 'checked' : '' }}>
                                    Change of Equipment</label>
                                <label><input type="checkbox" name="intended_use" value="additional_equipment"
                                    {{ in_array('additional_equipment', $intendedUseValue) ? 'checked' : '' }}>
                                    Additional Equipment</label>
                                <label><input type="checkbox" name="intended_use" value="storage"
                                    {{ in_array('storage', $intendedUseValue) ? 'checked' : '' }}> Storage
                                    at:</label>
                                <input class="form1-01-input" type="text" name="storage_location"
                                    placeholder="Location"
                                    value="{{ old('storage_location', $form['storage_location'] ?? '') }}">
                                <label><input type="checkbox" name="intended_use" value="others_use"
                                    {{ in_array('others_use', $intendedUseValue) ? 'checked' : '' }}> Others,
                                    specify</label>
                                <input class="form1-01-input" type="text" name="others_use_specify"
                                    placeholder="Specify"
                                    value="{{ old('others_use_specify', $form['others_use_specify'] ?? '') }}">
                                @error('intended_use')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
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
                                        placeholder="Signature over Printed Name of Applicant"
                                        value="{{ old('signature_name', $form['signature_name'] ?? '') }}" />
                                    @error('signature_name')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <input class="form1-01-input" type="date" name="date_accomplished"
                                        placeholder="Date Accomplished" style="max-width:180px;width:100%;"
                                        value="{{ old('date_accomplished', $form['date_accomplished'] ?? '') }}" />
                                    @error('date_accomplished')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form1-01-signature-col"
                                    style="border:1px dashed #aaa;padding:12px 8px;min-width:180px;">
                                    <div style="font-size:0.97rem;margin-bottom:6px;">OR No.:</div>
                                    <input class="form1-01-input" type="text" name="or_no"
                                        style="margin-bottom:6px;"
                                        value="{{ old('or_no', $form['or_no'] ?? '') }}" />
                                    @error('or_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <div style="font-size:0.97rem;margin-bottom:6px;">Date:</div>
                                    <input class="form1-01-input" type="date" name="or_date"
                                        style="margin-bottom:6px;"
                                        value="{{ old('or_date', $form['or_date'] ?? '') }}" />
                                    @error('or_date')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <div style="font-size:0.97rem;margin-bottom:6px;">Amount:</div>
                                    <input class="form1-01-input" type="text" name="or_amount"
                                        style="margin-bottom:6px;"
                                        value="{{ old('or_amount', $form['or_amount'] ?? '') }}" />
                                    @error('or_amount')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
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
                        //         localStorage.setItem('active-form', '1-09');
                        //         if (validationLink09) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink09.href, window.location.origin);
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
