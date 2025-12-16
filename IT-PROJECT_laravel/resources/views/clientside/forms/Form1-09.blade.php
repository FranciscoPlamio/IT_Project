<x-layout :title="'Application for Permit to Purchase/Possess/Sell/Transfer (Form 1-09)'" :form-header="['formNo' => 'NTC 1-09', 'revisionNo' => '03', 'revisionDate' => '03/31/2023']">

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
                    class="form1-01-agree"><label><input type="checkbox" id="warning-agreement" /> I agree / Malinaw sa
                        akin</label></div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList09">
                        <li class="step-item active" data-step="personal">Applicant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="application">Application Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="station">Station/Equipment Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="source">Source of Equipment <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="intended">Intended Use <span class="step-status">&nbsp;</span>
                        </li>
                        {{-- <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li> --}}
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-personal">

                        <!-- Error header -->
                        <x-forms.error-header />

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
                                        value="{{ old('validity', $form['validity'] ?? '') }}"
                                        min="{{ date('Y-m-d') }}">
                                    @error('validity')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- address fields format -->
                            <x-forms.address-fields :form="$form ?? []" />

                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-application">
                        @php
                            $applicationTypeValue = old('application_type', $form['application_type'] ?? '');
                        @endphp

                        <div class="form-grid-2">
                            <div class="form-field" data-require-one="input[type=radio]">
                                <fieldset class="sub-fieldset form-field">
                                    <legend>Type of Application</legend>
                                    @if (str_contains($category, 'purchase-possess') ||
                                            $category === 'at-lifetime' ||
                                            str_contains($category, 'at-club-rsl'))
                                        <label><input type="radio" name="application_type" value="purchase"
                                                {{ $applicationTypeValue == 'purchase' ? 'checked' : '' }}>
                                            PURCHASE</label>
                                        <label><input type="radio" name="application_type" value="possess"
                                                {{ $applicationTypeValue == 'possess' ? 'checked' : '' }}>
                                            POSSESS</label>
                                    @elseif(str_contains($category, 'sell-transfer'))
                                        <label><input type="radio" name="application_type" value="sell_transfer"
                                                {{ $applicationTypeValue == 'sell_transfer' ? 'checked' : '' }}
                                                checked>
                                            SELL/TRANSFER</label>
                                    @elseif($category === 'storage-permit')
                                        <label><input type="radio" name="application_type" value="possess"
                                                {{ $applicationTypeValue == 'possess' ? 'checked' : '' }} checked>
                                            POSSESS</label>
                                    @endif
                                    @error('application_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>
                            @php
                                $radioServiceValue = old('radio_service', $form['radio_service'] ?? '');
                            @endphp
                            <div class="form-field" data-require-one="input[type=radio]">
                                <fieldset class="sub-fieldset form-field">
                                    <legend>Type of Radio Service</legend>
                                    @if (str_contains($category, 'at-rsl') ||
                                            str_contains($category, 'at-lifetime') ||
                                            str_contains($category, 'at-club-rsl') ||
                                            $category === 'storage-permit')
                                        <label><input type="radio" name="radio_service" value="amateur"
                                                {{ $radioServiceValue == 'amateur' ? 'checked' : '' }} checked>
                                            AMATEUR</label>
                                    @endif
                                    {{-- <label><input type="radio" name="radio_service" value="fixed_land_mobile"
                                            {{ $radioServiceValue == 'fixed_land_mobile' ? 'checked' : '' }}>
                                        FIXED AND LAND MOBILE</label>
                                    <label><input type="radio" name="radio_service" value="aeronautical"
                                            {{ $radioServiceValue == 'aeronautical' ? 'checked' : '' }}>
                                        AERONAUTICAL</label>
                                    <label><input type="radio" name="radio_service" value="maritime"
                                            {{ $radioServiceValue == 'maritime' ? 'checked' : '' }}>
                                        MARITIME</label>
                                    <label><input type="radio" name="radio_service" value="broadcast"
                                            {{ $radioServiceValue == 'broadcast' ? 'checked' : '' }}>
                                        BROADCAST</label>
                                    <label><input type="radio" name="radio_service" value="amateur"
                                            {{ $radioServiceValue == 'amateur' ? 'checked' : '' }}>
                                        AMATEUR</label>
                                    <label><input type="radio" name="radio_service" value="others"
                                            {{ $radioServiceValue == 'others' ? 'checked' : '' }}>
                                        OTHERS, specify</label> --}}
                                    @error('radio_service')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-grid-2">
                            @php
                                $natureServiceValue = old('nature_service', $form['nature_service'] ?? '');
                            @endphp
                            <div class="form-field" data-require-one="input[type=radio]">
                                <fieldset class="sub-fieldset form-field">
                                    <legend>Nature of Service</legend>
                                    <label><input type="radio" name="nature_service" value="cv_private"
                                            {{ $natureServiceValue == 'cv_private' ? 'checked' : '' }} checked> CV
                                        (PRIVATE)</label>
                                    @error('nature_service')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="form-field">
                                <fieldset class="sub-fieldset form-field">
                                    <!-- Class of Station field -->
                                    <legend>Class of Station (indicate units)</legend>
                                    @if ($errors->has('units'))
                                        <p class="text-red-500 text-sm mb-2">
                                            {{ $errors->first('units') }}
                                        </p>
                                    @endif
                                    @if (str_contains($category, 'at-club'))
                                        <div class="form-grid-2">
                                            <div class="form-field">
                                                <label class="form-label">RT (Radio Telephone)</label>
                                                <select class="form1-01-input" name="rt_units">
                                                    <option value="">Select Units</option>
                                                    @for ($i = 1; $i <= 3; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ old('rt_units', $form['rt_units'] ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                @error('rt_units')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-field">
                                                <label class="form-label">FX (Fixed)</label>
                                                <select class="form1-01-input" name="fx_units">
                                                    <option value="">Select Units</option>
                                                    @for ($i = 1; $i <= 3; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ old('fx_units', $form['fx_units'] ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                @error('fx_units')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-grid-2">
                                            <!-- FB (Base Station) -->
                                            <div class="form-field">
                                                <label class="form-label">FB (Land Base)</label>
                                                <select class="form1-01-input" name="fb_units">
                                                    <option value="">Select Units</option>
                                                    @for ($i = 1; $i <= 3; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ old('fb_units', $form['fb_units'] ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                @error('fb_units')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    @elseif(str_contains($category, 'at-rsl') || $category === 'at-lifetime' || $category === 'storage-permit')
                                        <div class="form-grid-2">
                                            <!-- FB (Base Station) -->
                                            <div class="form-field">
                                                <label class="form-label">FB (Land Base)</label>
                                                <select class="form1-01-input" name="fb_units">
                                                    <option value="">Select Units</option>
                                                    @for ($i = 1; $i <= 3; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ old('fb_units', $form['fb_units'] ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                @error('fb_units')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- ML (Mobile Land) -->
                                            <div class="form-field">
                                                <label class="form-label">ML (Mobile Land)</label>
                                                <select class="form1-01-input" name="ml_units">
                                                    <option value="">Select Units</option>
                                                    @for ($i = 1; $i <= 3; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ old('ml_units', $form['ml_units'] ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                @error('ml_units')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-grid-2">
                                            <!-- P (Portable/Handheld) -->
                                            <div class="form-field">
                                                <label class="form-label">P (Portable/Handheld)</label>
                                                <select class="form1-01-input" name="p_units">
                                                    <option value="">Select Units</option>
                                                    @for ($i = 1; $i <= 3; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ old('p_units', $form['p_units'] ?? '') == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                @error('p_units')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif



                                </fieldset>
                            </div>
                            <input type="hidden" name="permit_type" value="{{ $category }}">
                        </div>
                        <div class="form-field">
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </div>
                    </section>

                    <section class="step-content" id="step-station">
                        <fieldset class="fieldset-compact">
                            <legend>Particulars of Proposed Station/Equipment</legend>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Exact Location</label>
                                    <input class="form1-01-input" type="text" name="exact_location" required
                                        value="{{ old('exact_location', $form['exact_location'] ?? '') }}">
                                    @error('exact_location')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Longitude (deg-min-sec)</label>
                                    <input class="form1-01-input" type="text" name="longitude"
                                        value="{{ old('longitude', $form['longitude'] ?? '') }}">
                                    @error('longitude')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Latitude (deg-min-sec)</label>
                                    <input class="form1-01-input" type="text" name="latitude"
                                        value="{{ old('latitude', $form['latitude'] ?? '') }}">
                                    @error('latitude')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Points of Comm/Service Area</label>
                                    <input class="form1-01-input" type="text" name="points_of_comm"
                                        value="{{ old('points_of_comm', $form['points_of_comm'] ?? '') }}">
                                    @error('points_of_comm')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Frequency</label>
                                    <input class="form1-01-input" type="text" name="frequency"
                                        value="{{ old('frequency', $form['frequency'] ?? '') }}">
                                    @error('frequency')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Make/Type/Model</label>
                                    <input class="form1-01-input" type="text" name="make_type_model"
                                        value="{{ old('make_type_model', $form['make_type_model'] ?? '') }}">
                                    @error('make_type_model')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Serial Number</label>
                                    <input class="form1-01-input" type="text" name="serial_number"
                                        value="{{ old('serial_number', $form['serial_number'] ?? '') }}">
                                    @error('serial_number')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Bandwidth & Emission</label>
                                    <input class="form1-01-input" type="text" name="bandwidth_emission"
                                        value="{{ old('bandwidth_emission', $form['bandwidth_emission'] ?? '') }}">
                                    @error('bandwidth_emission')
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
                            @error('intended_use')
                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                            @enderror
                            @php
                                $intendedUseValue = old('intended_use', $form['intended_use'] ?? '');
                            @endphp
                            <div class="form-field" data-require-one="input[type=radio]">
                                @if (str_contains($category, 'purchase-possess'))
                                    <label><input type="radio" name="intended_use" value="new_radio_station"
                                            {{ $intendedUseValue == 'new_radio_station' ? 'checked' : '' }}> New
                                        Radio Station</label>
                                    <label><input type="radio" name="intended_use" value="change_equipment"
                                            {{ $intendedUseValue == 'change_equipment' ? 'checked' : '' }}>
                                        Change of Equipment</label>
                                    <label><input type="radio" name="intended_use" value="additional_equipment"
                                            {{ $intendedUseValue == 'additional_equipment' ? 'checked' : '' }}>
                                        Additional Equipment</label>
                                @elseif (str_contains($category, 'sell-transfer'))
                                    <label><input type="radio" name="intended_use" value="sell_transfer"
                                            {{ $intendedUseValue == 'sell_transfer' ? 'checked' : '' }} checked>
                                        Sell/Transfer</label>
                                @elseif ($category === 'at-lifetime')
                                    <label><input type="radio" name="intended_use" value="additional_equipment"
                                            {{ $intendedUseValue == 'additional_equipment' ? 'checked' : '' }} checked>
                                        Additional Equipment</label>
                                @elseif($category === 'storage-permit')
                                    <label><input type="radio" name="intended_use" value="storage"
                                            {{ $intendedUseValue == 'storage' ? 'checked' : '' }} checked> Storage
                                        at:</label>
                                    @error('storage_location')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <input class="form1-01-input" type="text" name="storage_location"
                                        placeholder="Location"
                                        value="{{ old('storage_location', $form['storage_location'] ?? '') }}">
                                @elseif($category == 'at-club-rsl')
                                    <label><input type="radio" name="intended_use" value="new_radio_station"
                                            {{ $intendedUseValue == 'new_radio_station' ? 'checked' : '' }}> New
                                        Radio Station</label>
                                    <label><input type="radio" name="intended_use" value="change_equipment"
                                            {{ $intendedUseValue == 'change_equipment' ? 'checked' : '' }}>
                                        Change of Equipment</label>
                                    <label><input type="radio" name="intended_use" value="additional_equipment"
                                            {{ $intendedUseValue == 'additional_equipment' ? 'checked' : '' }}>
                                        Additional Equipment</label>
                                    <label><input type="radio" name="intended_use" value="storage"
                                            {{ $intendedUseValue == 'storage' ? 'checked' : '' }}> Storage
                                        at:</label>
                                    @error('storage_location')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <input class="form1-01-input" type="text" name="storage_location"
                                        placeholder="Location"
                                        value="{{ old('storage_location', $form['storage_location'] ?? '') }}">
                                @elseif (str_contains($category, 'sell-transfer'))
                                    <label><input type="radio" name="intended_use" value="sell_transfer"
                                            {{ $intendedUseValue == 'sell_transfer' ? 'checked' : '' }} checked>
                                        Sell/Transfer</label>
                                @endif

                                {{-- <label><input type="radio" name="intended_use" value="additional_radio_station"
                                        {{ $intendedUseValue == 'additional_radio_station' ? 'checked' : '' }}>
                                    Additional Radio Station</label>

                                <label><input type="radio" name="intended_use" value="storage"
                                        {{ $intendedUseValue == 'storage' ? 'checked' : '' }}> Storage
                                    at:</label>
                                <input class="form1-01-input" type="text" name="storage_location"
                                    placeholder="Location"
                                    value="{{ old('storage_location', $form['storage_location'] ?? '') }}">
                                @error('storage_location')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <label><input type="radio" name="intended_use" value="others_use"
                                        {{ $intendedUseValue == 'others_use' ? 'checked' : '' }}> Others,
                                    specify</label>

                                <input class="form1-01-input" type="text" name="others_use_specify"
                                    placeholder="Specify"
                                    value="{{ old('others_use_specify', $form['others_use_specify'] ?? '') }}">
                                @error('others_use_specify')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror --}}
                            </div>
                            <!-- CAPTCHA fields -->
                            <div class="form-field"
                                style="margin:12px 0; display:flex; flex-direction:column; align-items:center;">
                                <div class="g-recaptcha"
                                    data-sitekey="{{ env('RECAPTCHA_SITE_KEY', 'your_site_key') }}"></div>
                                @if (session('captcha_error'))
                                    <p class="text-red text-sm mt-1">{{ session('captcha_error') }}</p>
                                @endif
                            </div>
                            <div class="step-actions">
                                <button type="button" class="btn-secondary" data-prev>Back</button>

                                <x-forms.proceed-validation-btn class="form1-01-btn bg-blue-600 text-white px-4 py-2">
                                    Proceed to Validation
                                </x-forms.proceed-validation-btn>
                            </div>
                        </fieldset>
                    </section>

                    {{-- <!-- Declaration fields component -->
                    <x-forms.declaration-field :form="$form ?? []" /> --}}
                </div>
            </div>
        </form>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            (function() {
                const stepsOrder = ['personal', 'application', 'station', 'source', 'intended'];
                const stepsList = document.getElementById('stepsList09');
                const form = document.getElementById('form109');
                const warningCheckbox = document.getElementById('warning-agreement');

                // Enable/disable all form fields
                function toggleFormFields(enabled) {
                    const formFields = form.querySelectorAll('input, select, textarea, button');
                    formFields.forEach(field => {
                        if (field.id === 'warning-agreement' || field.type === 'hidden') return;
                        field.disabled = !enabled;
                    });
                }

                // Initially disable all fields
                toggleFormFields(false);

                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', function() {
                        toggleFormFields(this.checked);
                        toggleRadioServiceOthers();
                        toggleIntendedUseDependents();
                    });
                }

                // Show specific step
                function showStep(step) {
                    if (!warningCheckbox.checked && step !== 'personal') return;

                    stepsList.querySelectorAll('.step-item').forEach(li => li.classList.toggle('active', li.dataset.step ===
                        step));
                    document.querySelectorAll('.step-content').forEach(s => s.classList.toggle('active', s.id ===
                        `step-${step}`));
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

                // Validate groups with data-require-one
                function validateGroups(section) {
                    let ok = true;
                    section.querySelectorAll('[data-require-one]').forEach(group => {
                        const selector = group.getAttribute('data-require-one');
                        const items = group.querySelectorAll(selector);
                        const anyChecked = Array.from(items).some(el => (el.type === 'radio' || el.type ===
                            'checkbox') ? el.checked : Boolean(el.value));
                        if (!anyChecked) ok = false;
                    });
                    return ok;
                }

                // Validate active step
                function validateActiveStep() {
                    const step = currentStep();
                    const section = document.getElementById(`step-${step}`);
                    let valid = true;

                    // Remove previous error messages
                    section.querySelectorAll('p.text-red').forEach(el => el.remove());

                    // Required fields
                    section.querySelectorAll('input[required], select[required], textarea[required]').forEach(el => {
                        if (el.type === 'radio') {
                            const group = section.querySelectorAll(`input[type=radio][name="${el.name}"]`);
                            if (!Array.from(group).some(r => r.checked)) valid = false;
                        } else if (!el.value) {
                            valid = false;
                        }
                    });

                    // Validate custom groups
                    if (!validateGroups(section)) valid = false;

                    // Update step status
                    const li = stepsList.querySelector(`.step-item[data-step="${step}"]`);
                    if (valid) {
                        li.classList.add('completed');
                        li.querySelector('.step-status').textContent = 'Done';
                    } else {
                        li.classList.remove('completed');
                        li.querySelector('.step-status').textContent = '';
                    }

                    if (!valid) {
                        const errorDiv = document.createElement('p');
                        errorDiv.className = 'text-red text-sm mt-1 text-right';
                        errorDiv.textContent = 'Please complete all required fields before proceeding.';
                        const actionsContainer = section.querySelector('.step-actions');
                        if (actionsContainer) actionsContainer.parentElement.appendChild(errorDiv);
                    }

                    return valid;
                }

                // Disable sidebar navigation
                stepsList.addEventListener('click', e => e.preventDefault());

                // Next / Prev buttons
                document.addEventListener('click', e => {
                    if (e.target.matches('[data-next]')) {
                        if (!warningCheckbox.checked) {
                            alert('Please check the agreement checkbox first before proceeding.');
                            return;
                        }
                        if (validateActiveStep()) go(1);
                    }
                    if (e.target.matches('[data-prev]')) {
                        if (!warningCheckbox.checked) {
                            alert('Please check the agreement checkbox first before proceeding.');
                            return;
                        }
                        go(-1);
                    }
                });

                // --- Conditional fields ---
                function toggleRadioServiceOthers() {
                    const othersRadio = form.querySelector('input[name="radio_service"][value="others"]');
                    const othersSpecify = form.querySelector('input[name="others_specify"]');
                    if (!othersRadio || !othersSpecify) return;
                    const enabled = othersRadio.checked;
                    othersSpecify.disabled = !enabled;
                    if (!enabled) othersSpecify.value = '';
                }

                function toggleIntendedUseDependents() {
                    const selectedUse = form.querySelector('input[name="intended_use"]:checked');
                    const storageLocation = form.querySelector('input[name="storage_location"]');
                    const othersUseSpecify = form.querySelector('input[name="others_use_specify"]');
                    if (!storageLocation || !othersUseSpecify) return;
                    const isStorage = selectedUse && selectedUse.value === 'storage';
                    const isOthers = selectedUse && selectedUse.value === 'others_use';
                    storageLocation.disabled = !isStorage;
                    othersUseSpecify.disabled = !isOthers;
                    if (!isStorage) storageLocation.value = '';
                    if (!isOthers) othersUseSpecify.value = '';
                }

                form.querySelectorAll('input[name="radio_service"]').forEach(r => r.addEventListener('change',
                    toggleRadioServiceOthers));
                form.querySelectorAll('input[name="intended_use"]').forEach(r => r.addEventListener('change',
                    toggleIntendedUseDependents));

                // Initialize conditional fields
                toggleRadioServiceOthers();
                toggleIntendedUseDependents();

                function startLoading(btn) {
                    btn.disabled = true;
                    btn.querySelector('.btn-text')?.classList.add('hidden');
                    btn.querySelector('.spinner')?.classList.remove('hidden');
                }

                function stopLoading(btn) {
                    btn.disabled = false;
                    btn.querySelector('.btn-text')?.classList.remove('hidden');
                    btn.querySelector('.spinner')?.classList.add('hidden');
                }

                // Validate & submit
                const validateBtn = document.getElementById('validateBtn');
                if (validateBtn) {
                    validateBtn.addEventListener('click', () => {
                        if (!warningCheckbox.checked) {
                            alert('Please check the agreement checkbox first before proceeding.');
                            return;
                        }

                        if (!validateActiveStep()) return;

                        // reCAPTCHA check
                        try {
                            if (window.grecaptcha) {
                                const captchaResponse = window.grecaptcha.getResponse();
                                if (!captchaResponse) {
                                    const errorDiv = document.createElement('p');
                                    errorDiv.className = 'text-red text-sm mt-1';
                                    errorDiv.textContent = 'Please complete the CAPTCHA before proceeding.';
                                    document.querySelector('.g-recaptcha').parentNode.appendChild(errorDiv);
                                    return;
                                }
                            }
                        } catch (e) {}

                        form.submit();
                        startLoading(validateBtn);
                    });
                }

                // Initialize first step
                showStep(stepsOrder[0]);
            })();
        </script>

    </main>
</x-layout>
