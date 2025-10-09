<x-layout :title="'Application for Construction Permit/Radio Station License (Form 1-11)'" :form-header="['formNo' => 'NTC 1-11', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form111" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR CONSTRUCTION PERMIT / RADIO STATION LICENSE</div>
            <div class="form1-01-note"><strong>NOTE:</strong> The system asks for additional info when applicant is
                a minor.</div>
            <div class="form1-01-warning">
                <div class="form1-01-warning-title">WARNING:</div> Ensure that all details in identification fields
                are correct. Incorrect entries may require a new appointment.<div class="form1-01-agree">
                    <label><input type="checkbox" /> I agree / Malinaw sa akin</label>
                </div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList11">
                        <li class="step-item active" data-step="application">Application Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="service">Radio Service <span class="step-status">&nbsp;</span>
                        </li>
                        <li class="step-item" data-step="station">Class of Station <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="personal">Applicant Information <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="particulars">Station/Equipment/Antenna <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-application">
                        @php
                            $applicationTypeValue = old('application_type', $form['application_type'] ?? []);
                            if (!is_array($applicationTypeValue)) {
                                $applicationTypeValue = [];
                            }
                        @endphp
                        <fieldset class="fieldset-compact">
                            <legend>Type of Application</legend>
                            <div class="form-grid-2">
                                <div class="form-field" data-require-one="input[type=checkbox]">
                                    <label><input type="checkbox" name="application_type" value="new"
                                            {{ in_array('new', $applicationTypeValue) ? 'checked' : '' }}>
                                        NEW</label>
                                    <label><input type="checkbox" name="application_type" value="renewal"
                                            {{ in_array('renewal', $applicationTypeValue) ? 'checked' : '' }}>
                                        RENEWAL</label>
                                    <label><input type="checkbox" name="application_type" value="modification"
                                            {{ in_array('modification', $applicationTypeValue) ? 'checked' : '' }}>
                                        MODIFICATION due to (USE FORM B)</label>
                                    <input class="form1-01-input" type="text" name="modification_reason"
                                        placeholder="Reason (if modification)"
                                        value="{{ old('modification_reason', $form['modification_reason'] ?? '') }}">
                                    @error('application_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    @error('modification_reason')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                @php
                                    $permitTypeValue = old('permit_type', $form['permit_type'] ?? []);
                                    if (!is_array($permitTypeValue)) {
                                        $permitTypeValue = [];
                                    }
                                @endphp
                                <div class="form-field">
                                    <label class="form-label">NO. OF YEARS</label>
                                    <input class="form1-01-input" type="text" name="years" placeholder="e.g., 2"
                                        required value="{{ old('years', $form['years'] ?? '') }}">
                                    @error('years')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <label class="form-label" style="margin-top:12px;">Permit Type</label>
                                    <label><input type="checkbox" name="permit_type" value="construction_permit"
                                            {{ in_array('construction_permit', $permitTypeValue) ? 'checked' : '' }}>
                                        CONSTRUCTION PERMIT</label>
                                    <label><input type="checkbox" name="permit_type" value="radio_station_license"
                                            {{ in_array('radio_station_license', $permitTypeValue) ? 'checked' : '' }}>
                                        RADIO STATION LICENSE</label>
                                    @error('permit_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-service">
                        @php
                            $radioServiceValue = old('radio_service', $form['radio_service'] ?? []);
                            if (!is_array($radioServiceValue)) {
                                $radioServiceValue = [];
                            }
                        @endphp
                        <fieldset class="fieldset-compact">
                            <legend>Type of Radio Service</legend>
                            <div class="form-grid-2" data-require-one="input[type=checkbox]">
                                <div class="form-field">
                                    <label><input type="checkbox" name="radio_service" value="fixed_land_mobile"
                                            {{ in_array('fixed_land_mobile', $radioServiceValue) ? 'checked' : '' }}>
                                        FIXED AND LAND MOBILE</label>
                                    <label><input type="checkbox" name="radio_service" value="aeronautical"
                                            {{ in_array('aeronautical', $radioServiceValue) ? 'checked' : '' }}>
                                        AERONAUTICAL</label>
                                    <label><input type="checkbox" name="radio_service" value="maritime"
                                            {{ in_array('maritime', $radioServiceValue) ? 'checked' : '' }}> MARITIME
                                        (Public/Private Coastal)</label>
                                </div>
                                <div class="form-field">
                                    <label><input type="checkbox" name="radio_service" value="broadcast"
                                            {{ in_array('broadcast', $radioServiceValue) ? 'checked' : '' }}>
                                        BROADCAST</label>
                                    <label><input type="checkbox" name="radio_service" value="others"
                                            {{ in_array('others', $radioServiceValue) ? 'checked' : '' }}> OTHERS,
                                        specify</label>
                                    <input class="form1-01-input" type="text" name="others_specify"
                                        placeholder="Specify"
                                        value="{{ old('others_specify', $form['others_specify'] ?? '') }}">
                                </div>
                            </div>
                            @error('radio_service')
                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-station">
                        @php
                            $stationClassValue = old('station_class', $form['station_class'] ?? []);
                            if (!is_array($stationClassValue)) {
                                $stationClassValue = [];
                            }
                        @endphp
                        <fieldset class="fieldset-compact">
                            <legend>Class of Station</legend>
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
                                </div>
                                <div class="form-field">
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
                                    <input class="form1-01-input" type="text" name="bc_units" placeholder="Units"
                                        value="{{ old('bc_units', $form['bc_units'] ?? '') }}">
                                </div>
                                <div class="form-field">
                                    <label><input type="checkbox" name="station_class" value="fc"
                                            {{ in_array('fc', $stationClassValue) ? 'checked' : '' }}> FC</label>
                                    <input class="form1-01-input" type="text" name="fc_units" placeholder="Units"
                                        value="{{ old('fc_units', $form['fc_units'] ?? '') }}">
                                    <label><input type="checkbox" name="station_class" value="fa"
                                            {{ in_array('fa', $stationClassValue) ? 'checked' : '' }}> FA</label>
                                    <input class="form1-01-input" type="text" name="fa_units" placeholder="Units"
                                        value="{{ old('fa_units', $form['fa_units'] ?? '') }}">
                                    <label><input type="checkbox" name="station_class" value="ma"
                                            {{ in_array('ma', $stationClassValue) ? 'checked' : '' }}> MA</label>
                                    <input class="form1-01-input" type="text" name="ma_units" placeholder="Units"
                                        value="{{ old('ma_units', $form['ma_units'] ?? '') }}">
                                </div>
                                <div class="form-field">
                                    <label><input type="checkbox" name="station_class" value="tc"
                                            {{ in_array('tc', $stationClassValue) ? 'checked' : '' }}> TC</label>
                                    <input class="form1-01-input" type="text" name="tc_units" placeholder="Units"
                                        value="{{ old('tc_units', $form['tc_units'] ?? '') }}">
                                    <label><input type="checkbox" name="station_class" value="others_station"
                                            {{ in_array('others_station', $stationClassValue) ? 'checked' : '' }}>
                                        OTHERS, specify</label>
                                    <input class="form1-01-input" type="text" name="others_station_specify"
                                        placeholder="Type"
                                        value="{{ old('others_station_specify', $form['others_station_specify'] ?? '') }}">
                                    <input class="form1-01-input" type="text" name="others_station_units"
                                        placeholder="Units"
                                        value="{{ old('others_station_units', $form['others_station_units'] ?? '') }}">
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

                    <section class="step-content" id="step-personal">
                        <fieldset>
                            <legend>Applicant Information</legend>
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
                                    <label class="form-label">Contact No.</label>
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
                            <legend>Particulars of Station / Equipment / Antenna</legend>
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
                                    <label class="form-label">Assigned Freq.</label>
                                    <input class="form1-01-input" type="text" name="assigned_freq"
                                        value="{{ old('assigned_freq', $form['assigned_freq'] ?? '') }}">
                                    @error('assigned_freq')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">BW & Emission</label>
                                    <input class="form1-01-input" type="text" name="bw_emission"
                                        value="{{ old('bw_emission', $form['bw_emission'] ?? '') }}">
                                    @error('bw_emission')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Configuration</label>
                                    <input class="form1-01-input" type="text" name="configuration"
                                        value="{{ old('configuration', $form['configuration'] ?? '') }}">
                                    @error('configuration')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Data Rate</label>
                                    <input class="form1-01-input" type="text" name="data_rate"
                                        value="{{ old('data_rate', $form['data_rate'] ?? '') }}">
                                    @error('data_rate')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Call Sign</label>
                                    <input class="form1-01-input" type="text" name="call_sign"
                                        value="{{ old('call_sign', $form['call_sign'] ?? '') }}">
                                    @error('call_sign')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">RSL No.</label>
                                    <input class="form1-01-input" type="text" name="rsl_no"
                                        value="{{ old('rsl_no', $form['rsl_no'] ?? '') }}">
                                    @error('rsl_no')
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
                            <div class="form-grid-3">
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
                                <div class="form-field">
                                    <label class="form-label">Power Output</label>
                                    <input class="form1-01-input" type="text" name="power_output"
                                        value="{{ old('power_output', $form['power_output'] ?? '') }}">
                                    @error('power_output')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Frequency Range</label>
                                    <input class="form1-01-input" type="text" name="frequency_range"
                                        value="{{ old('frequency_range', $form['frequency_range'] ?? '') }}">
                                    @error('frequency_range')
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
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Antenna Type</label>
                                    <input class="form1-01-input" type="text" name="antenna_type"
                                        value="{{ old('antenna_type', $form['antenna_type'] ?? '') }}">
                                    @error('antenna_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Height (m)</label>
                                    <input class="form1-01-input" type="text" name="antenna_height"
                                        value="{{ old('antenna_height', $form['antenna_height'] ?? '') }}">
                                    @error('antenna_height')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Gain (dB)</label>
                                    <input class="form1-01-input" type="text" name="antenna_gain"
                                        value="{{ old('antenna_gain', $form['antenna_gain'] ?? '') }}">
                                    @error('antenna_gain')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Directivity</label>
                                    <input class="form1-01-input" type="text" name="antenna_directivity"
                                        value="{{ old('antenna_directivity', $form['antenna_directivity'] ?? '') }}">
                                    @error('antenna_directivity')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Polarization</label>
                                    <input class="form1-01-input" type="text" name="antenna_polarization"
                                        value="{{ old('antenna_polarization', $form['antenna_polarization'] ?? '') }}">
                                    @error('antenna_polarization')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Beamwidth</label>
                                    <input class="form1-01-input" type="text" name="antenna_beamwidth"
                                        value="{{ old('antenna_beamwidth', $form['antenna_beamwidth'] ?? '') }}">
                                    @error('antenna_beamwidth')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Diameter (for
                                        microwave)</label>
                                    <input class="form1-01-input" type="text" name="antenna_diameter"
                                        value="{{ old('antenna_diameter', $form['antenna_diameter'] ?? '') }}">
                                    @error('antenna_diameter')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
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
                const stepsOrder = ['application', 'service', 'station', 'personal', 'particulars', 'declaration'];
                const stepsList = document.getElementById('stepsList11');
                const form = document.getElementById('form111');
                const validationLink11 = document.getElementById('validationLink11');

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

                const validateBtn = document.getElementById('validateBtn11');
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
                        //         localStorage.setItem('active-form', '1-11');
                        //         if (validationLink11) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink11.href, window.location.origin);
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
