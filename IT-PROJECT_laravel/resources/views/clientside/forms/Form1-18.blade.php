<x-layout :title="'Application for Dealer/Manufacturer/Service Center/Retailer/Reseller Permit/CPE Supplier Accreditation (Form 1-18)'" :form-header="['formNo' => 'NTC 1-18', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']">

    <main>
        <form class="form1-01-container" id="form118" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR DEALER/MANUFACTURER/SERVICE CENTER/RETAILER/RESELLER
                PERMIT/CPE SUPPLIER ACCREDITATION</div>
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
                    <ul class="steps-list" id="stepsList18">
                        <li class="step-item active" data-step="application">Type of Application <span
                                class="step-status">&nbsp;</span></li>

                        <li class="step-item" data-step="applicant">Applicant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="personnel">Personnel Required <span
                                class="step-status">&nbsp;</span></li>
                        {{-- <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li> --}}
                    </ul>
                </aside>

                @php
                    $applicationType = old('application_type', $form['application_type'] ?? null);
                    $permitTypeValue = old('permit_type', $form['permit_type'] ?? null);
                @endphp
                <div>
                    <section class="step-content active" id="step-application">

                        <!-- Error header -->
                        <x-forms.error-header />

                        <fieldset class="fieldset-compact">
                            <legend>Type of Application</legend>
                            <x-forms.application-type-fields :form="$form101 ?? []" :applicationType="$applicationType" :permitTypeValue="$permitTypeValue"
                                :show-years="false" />
                        </fieldset>

                        <fieldset class="fieldset-compact">
                            <legend>Application Categories</legend>
                            @php
                                $categoryValue = old('category', $form['category'] ?? null);
                                $rceCategoryValue = old('rce_category', $form['rce_category'] ?? null);
                                $dealerTypeValue = old('dealer_type', $form['dealer_type'] ?? null);
                                $mobileCategoryValue = old('mobile_category', $form['mobile_category'] ?? null);
                                $cpeCategoryValue = old('cpe_category', $form['cpe_category'] ?? null);

                                // Handle legacy array format if it exists
                                if (is_array($categoryValue) && !empty($categoryValue)) {
                                    $categoryValue = $categoryValue[0] ?? null;
                                }
                                if (is_array($rceCategoryValue) && !empty($rceCategoryValue)) {
                                    $rceCategoryValue = $rceCategoryValue[0] ?? null;
                                }
                                if (is_array($dealerTypeValue) && !empty($dealerTypeValue)) {
                                    $dealerTypeValue = $dealerTypeValue[0] ?? null;
                                }
                                if (is_array($mobileCategoryValue) && !empty($mobileCategoryValue)) {
                                    $mobileCategoryValue = $mobileCategoryValue[0] ?? null;
                                }
                                if (is_array($cpeCategoryValue) && !empty($cpeCategoryValue)) {
                                    $cpeCategoryValue = $cpeCategoryValue[0] ?? null;
                                }
                            @endphp
                            <div class="form-grid-1">
                                <div class="form-field" data-require-one="input[type=radio]">
                                    {{-- RCE --}}
                                    <label>
                                        <input type="radio" name="category" value="rce"
                                            {{ $categoryValue == 'rce' ? 'checked' : '' }}
                                            onclick="updateFinalCategory('rce')">
                                        Radio Communications Equipment (RCE)
                                    </label>

                                    <div style="margin-left: 20px;">
                                        <label>
                                            <input type="radio" name="rce_category" value="dealer"
                                                {{ $rceCategoryValue == 'dealer' ? 'checked' : '' }}
                                                {{ $categoryValue != 'rce' ? 'disabled' : '' }}
                                                onclick="updateFinalCategory('dealer')">
                                            Dealer
                                        </label>

                                        <div class="dealer-options" style="margin-left: 40px;">
                                            <label style="display: block; margin-bottom: 8px;">
                                                <input type="radio" name="dealer_type" value="radio_transmitter"
                                                    {{ $dealerTypeValue == 'radio_transmitter' ? 'checked' : '' }}
                                                    {{ $categoryValue != 'rce' || $rceCategoryValue != 'dealer' ? 'disabled' : '' }}
                                                    onclick="updateFinalCategory('radio_transmitter')">
                                                Radio Transmitter/Transceiver
                                            </label>
                                            <label style="display: block;">
                                                <input type="radio" name="dealer_type" value="wdn_indoor"
                                                    {{ $dealerTypeValue == 'wdn_indoor' ? 'checked' : '' }}
                                                    {{ $categoryValue != 'rce' || $rceCategoryValue != 'dealer' ? 'disabled' : '' }}
                                                    onclick="updateFinalCategory('wdn_indoor')">
                                                WDN Indoor/SRD/RFID
                                            </label>
                                        </div>

                                        <label>
                                            <input type="radio" name="rce_category" value="manufacturer"
                                                {{ $rceCategoryValue == 'manufacturer' ? 'checked' : '' }}
                                                {{ $categoryValue != 'rce' ? 'disabled' : '' }}
                                                onclick="updateFinalCategory('manufacturer')">
                                            Manufacturer
                                        </label><br>

                                        <label>
                                            <input type="radio" name="rce_category" value="service_center"
                                                {{ $rceCategoryValue == 'service_center' ? 'checked' : '' }}
                                                {{ $categoryValue != 'rce' ? 'disabled' : '' }}
                                                onclick="updateFinalCategory('service_center')">
                                            Service Center
                                        </label>
                                    </div>

                                    <br>

                                    {{-- MOBILE --}}
                                    <label>
                                        <input type="radio" name="category" value="mobile"
                                            {{ $categoryValue == 'mobile' ? 'checked' : '' }}
                                            onclick="updateFinalCategory('mobile')">
                                        Mobile Phone
                                    </label>

                                    <div style="margin-left: 20px;">
                                        <label>
                                            <input type="radio" name="mobile_category" value="dealer_mpdp"
                                                {{ $mobileCategoryValue == 'dealer_mpdp' ? 'checked' : '' }}
                                                {{ $categoryValue != 'mobile' ? 'disabled' : '' }}
                                                onclick="updateFinalCategory('dealer_mpdp')">
                                            Dealer (MPDP)
                                        </label><br>

                                        <label>
                                            <input type="radio" name="mobile_category" value="retailer_reseller"
                                                {{ $mobileCategoryValue == 'retailer_reseller' ? 'checked' : '' }}
                                                {{ $categoryValue != 'mobile' ? 'disabled' : '' }}
                                                onclick="updateFinalCategory('retailer_reseller')">
                                            Retailer/Reseller (MPRR)
                                        </label><br>

                                        <label>
                                            <input type="radio" name="mobile_category" value="service_center_mpscp"
                                                {{ $mobileCategoryValue == 'service_center_mpscp' ? 'checked' : '' }}
                                                {{ $categoryValue != 'mobile' ? 'disabled' : '' }}
                                                onclick="updateFinalCategory('service_center_mpscp')">
                                            Service Center (MPSCP)
                                        </label>
                                    </div>

                                    <br>

                                    {{-- CPE --}}
                                    <label>
                                        <input type="radio" name="category" value="cpe"
                                            {{ $categoryValue == 'cpe' ? 'checked' : '' }}
                                            onclick="updateFinalCategory('cpe')">
                                        Customer Premises Equipment (CPE) Supplier Accreditation
                                    </label>

                                    <!-- Single field for the final selected value -->
                                    <input type="hidden" name="application_category" id="categoryFinal" value="">

                                    @error('application_category')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </fieldset>
                        <div class="step-actions"><button type="button" class="btn-secondary"
                                data-prev>Back</button><button type="button" class="btn-primary"
                                data-next>Next</button></div>
                    </section>

                    <section class="step-content" id="step-categories">

                    </section>

                    <section class="step-content" id="step-applicant">
                        <fieldset>
                            <legend>Applicant's Details</legend>
                            <div class="child-note"><strong>NOTE:</strong> Business name appearing in the
                                SEC/DTI
                                Registration or Business/Mayor's Permit</div>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Applicant*</label>
                                    <input class="form1-01-input" type="text" name="applicant" required
                                        value="{{ old('applicant', $form['applicant'] ?? '') }}">
                                    @error('applicant')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Permit No.</label>
                                    <input class="form1-01-input" type="text" name="permit_no"
                                        value="{{ old('permit_no', $form['permit_no'] ?? '') }}">
                                    @error('permit_no')
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
                                    <label class="form-label">Type of Entity</label>
                                    <div class="radio-vertical">
                                        <label>
                                            <input type="radio" name="entity_type" value="corporation"
                                                {{ old('entity_type', $form['entity_type'] ?? '') == 'corporation' ? 'checked' : '' }}>
                                            Corporation
                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" name="entity_type" value="single_proprietorship"
                                                {{ old('entity_type', $form['entity_type'] ?? '') == 'single_proprietorship' ? 'checked' : '' }}>
                                            Single Proprietorship
                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" name="entity_type" value="partnership"
                                                {{ old('entity_type', $form['entity_type'] ?? '') == 'partnership' ? 'checked' : '' }}>
                                            Partnership
                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" name="entity_type" value="others"
                                                id="others_radio"
                                                {{ old('entity_type', $form['entity_type'] ?? '') == 'others' ? 'checked' : '' }}>
                                            Others
                                        </label>
                                    </div>
                                    <input class="form1-01-input" type="text" name="others_entity"
                                        id="others_input" placeholder="If others, specify" disabled
                                        value="{{ old('others_entity', $form['others_entity'] ?? '') }}">
                                    @error('entity_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- address fields format -->
                            <x-forms.address-fields :form="$form ?? []" />
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-personnel">
                        <fieldset>
                            <legend>Personnel Required (Not Applicable for WDN Indoor/SRD/RFID and Mobile Phone)
                            </legend>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <div class="form-label">Supervising Engineer</div>
                                    <label class="form-label">Name</label>
                                    <input class="form1-01-input" type="text" name="supervising_engineer_name"
                                        value="{{ old('supervising_engineer_name', $form['supervising_engineer_name'] ?? '') }}">
                                    @error('supervising_engineer_name')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <label class="form-label">PECE/ECE No.</label>
                                    <input class="form1-01-input" type="text" name="supervising_engineer_pece"
                                        value="{{ old('supervising_engineer_pece', $form['supervising_engineer_pece'] ?? '') }}">
                                    @error('supervising_engineer_pece')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <label class="form-label">Validity</label>
                                    <input class="form1-01-input" type="date" name="supervising_engineer_validity"
                                        value="{{ old('supervising_engineer_validity', $form['supervising_engineer_validity'] ?? '') }}">
                                    @error('supervising_engineer_validity')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <div class="form-label">Technician</div>
                                    <label class="form-label">Name</label>
                                    <input class="form1-01-input" type="text" name="technician_name"
                                        value="{{ old('technician_name', $form['technician_name'] ?? '') }}">
                                    @error('technician_name')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <label class="form-label">Certificate/ECT No.</label>
                                    <input class="form1-01-input" type="text" name="technician_certificate"
                                        value="{{ old('technician_certificate', $form['technician_certificate'] ?? '') }}">
                                    @error('technician_certificate')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <label class="form-label">Validity</label>
                                    <input class="form1-01-input" type="date" name="technician_validity"
                                        value="{{ old('technician_validity', $form['technician_validity'] ?? '') }}">
                                    @error('technician_validity')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
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
                            <div class="step-actions"><button class="form1-01-btn" type="button"
                                    id="validateBtn">Proceed to Validation</button></div>
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
                const stepsOrder = ['application', 'applicant', 'personnel']; // declaration removed
                const stepsList = document.getElementById('stepsList18');
                const form = document.getElementById('form118');
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
                        // Check if any main category is selected
                        const categoryRadios = document.querySelectorAll('input[name="category"]');
                        const anyCategoryChecked = Array.from(categoryRadios).some(radio => radio.checked);

                        if (!anyCategoryChecked) {
                            ok = false;
                            return;
                        }

                        // Check if sub-categories are selected based on main category
                        const rceRadio = document.querySelector('input[name="category"][value="rce"]');
                        const mobileRadio = document.querySelector('input[name="category"][value="mobile"]');
                        const cpeRadio = document.querySelector('input[name="category"][value="cpe"]');

                        // Only validate sub-categories if RCE or Mobile is selected
                        // CPE doesn't have sub-categories, so no additional validation needed
                        if (rceRadio && rceRadio.checked) {
                            const rceCategoryRadios = document.querySelectorAll('input[name="rce_category"]');
                            const anyRceCategoryChecked = Array.from(rceCategoryRadios).some(radio => radio
                                .checked);

                            if (!anyRceCategoryChecked) {
                                ok = false;
                            } else {
                                // Check dealer sub-options if dealer is selected
                                const dealerRadio = document.querySelector(
                                    'input[name="rce_category"][value="dealer"]');
                                if (dealerRadio && dealerRadio.checked) {
                                    const dealerTypeRadios = document.querySelectorAll('input[name="dealer_type"]');
                                    const anyDealerTypeChecked = Array.from(dealerTypeRadios).some(radio => radio
                                        .checked);
                                    if (!anyDealerTypeChecked) {
                                        ok = false;
                                    }
                                }
                            }
                        }

                        if (mobileRadio && mobileRadio.checked) {
                            const mobileCategoryRadios = document.querySelectorAll('input[name="mobile_category"]');
                            const anyMobileCategoryChecked = Array.from(mobileCategoryRadios).some(radio => radio
                                .checked);

                            if (!anyMobileCategoryChecked) {
                                ok = false;
                            }
                        }

                        // CPE is a standalone category with no sub-categories
                        // No additional validation needed for CPE
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
                    e.preventDefault();
                    const li = e.target.closest('.step-item');
                    if (!li) return;
                });
                document.querySelectorAll('[data-next]').forEach(b => b.addEventListener('click', () => {
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

                // --- Conditional enable/disable fields ---
                function toggleModificationReason() {
                    const modReason = form.querySelector('input[name="modification_reason"]');
                    const modRadio = form.querySelector('input[name="application_type"][value="modification"]');
                    if (!modReason || !modRadio) return;
                    const enabled = modRadio.checked;
                    modReason.disabled = !enabled;
                    if (!enabled) modReason.value = '';
                }

                function toggleEntityOthers() {
                    const othersRadio = form.querySelector('input[name="entity_type"][value="others"]');
                    const othersInput = document.getElementById('others_input');
                    if (!othersInput || !othersRadio) return;
                    const enabled = othersRadio.checked && !othersRadio.disabled;
                    othersInput.disabled = !enabled;
                    if (!enabled) othersInput.value = '';
                }

                // Bind listeners for application_type
                form.querySelectorAll('input[name="application_type"]').forEach(r => {
                    r.addEventListener('change', toggleModificationReason);
                });

                // Bind listeners for entity_type
                form.querySelectorAll('input[name="entity_type"]').forEach(r => {
                    r.addEventListener('change', toggleEntityOthers);
                });

                // Initialize on load
                toggleModificationReason();
                toggleEntityOthers();

                // Keep in sync when agreement toggles overall enabled state
                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', function() {
                        toggleModificationReason();
                        toggleEntityOthers();
                    });
                }

                // Handle category sub-options state (disable/enable only)
                function handleCategoryOptions() {
                    const rceRadio = document.querySelector('input[name="category"][value="rce"]');
                    const mobileRadio = document.querySelector('input[name="category"][value="mobile"]');
                    const cpeRadio = document.querySelector('input[name="category"][value="cpe"]');

                    const dealerRadio = document.querySelector('input[name="rce_category"][value="dealer"]');
                    const dealerTypeRadios = document.querySelectorAll('input[name="dealer_type"]');
                    const rceCategoryRadios = document.querySelectorAll('input[name="rce_category"]');
                    const mobileCategoryRadios = document.querySelectorAll('input[name="mobile_category"]');

                    // Handle RCE category options
                    if (rceRadio) {
                        const rceOptions = rceCategoryRadios;
                        if (rceRadio.checked) {
                            rceOptions.forEach(radio => radio.disabled = false);
                        } else {
                            rceOptions.forEach(radio => {
                                radio.checked = false;
                                radio.disabled = true;
                            });
                            // Also clear and disable dealer type options
                            dealerTypeRadios.forEach(radio => {
                                radio.checked = false;
                                radio.disabled = true;
                            });
                        }
                    }

                    // Handle Mobile category options
                    if (mobileRadio) {
                        const mobileOptions = mobileCategoryRadios;
                        if (mobileRadio.checked) {
                            mobileOptions.forEach(radio => radio.disabled = false);
                        } else {
                            mobileOptions.forEach(radio => {
                                radio.checked = false;
                                radio.disabled = true;
                            });
                        }
                    }

                    // Handle dealer sub-options
                    if (dealerRadio && dealerTypeRadios.length > 0) {
                        if (dealerRadio.checked && rceRadio && rceRadio.checked) {
                            dealerTypeRadios.forEach(radio => radio.disabled = false);
                        } else {
                            dealerTypeRadios.forEach(radio => {
                                radio.checked = false;
                                radio.disabled = true;
                            });
                        }
                    }
                }

                // Add event listeners for category changes
                document.querySelectorAll('input[name="category"]').forEach(radio => {
                    radio.addEventListener('change', handleCategoryOptions);
                });

                // Add event listeners for RCE category changes (for dealer sub-options)
                document.querySelectorAll('input[name="rce_category"]').forEach(radio => {
                    radio.addEventListener('change', handleCategoryOptions);
                });

                // Initialize category options state
                handleCategoryOptions();

                // Legacy specific listeners for others entity retained but superseded by toggleEntityOthers
                const othersRadio = document.getElementById('others_radio');
                const othersInput = document.getElementById('others_input');
                if (othersRadio) {
                    othersRadio.addEventListener('change', function() {
                        if (this.checked && this.disabled === false) {
                            othersInput.disabled = false;
                        } else {
                            othersInput.disabled = true;
                        }
                    });
                }
                // Initialize legacy state
                if (othersInput && othersRadio) {
                    othersInput.disabled = !othersRadio.checked;
                }

                const validateBtn = document.getElementById('validateBtn');
                if (validateBtn) {
                    validateBtn.addEventListener('click', async () => {
                        if (!warningCheckbox.checked) {
                            alert('Please check the agreement checkbox first before proceeding.');
                            return;
                        }

                        const formData = new FormData(form);
                        formData.forEach((value, key) => {
                            console.log(`${key}: ${value}`);
                        });
                        if (!validateActiveStep()) return;
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
                        //         localStorage.setItem('active-form', '1-18');
                        //         if (validationLink18) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink18.href, window.location.origin);
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

            function updateFinalCategory(value) {
                document.getElementById('categoryFinal').value = value;
            }
        </script>
    </main>
</x-layout>
