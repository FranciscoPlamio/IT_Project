<x-layout :title="'Application for Certificate of Registration - Value Added Services (Form 1-20)'" :form-header="['formNo' => 'NTC 1-20', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']">
    <main>
        <form class="form1-01-container" id="form120" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR CERTIFICATE OF REGISTRATION</div>
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
                    <ul class="steps-list" id="stepsList20">
                        <li class="step-item active" data-step="categories">Application Type & Services <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="applicant">Applicant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="vas">Value Added Services <span
                                class="step-status">&nbsp;</span></li>
                        {{-- <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li> --}}
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-categories">

                        <!-- Error header -->
                        <x-forms.error-header />

                        <fieldset class="fieldset-compact">
                            <legend>Application Type</legend>
                            <div class="form-grid-1">
                                <div class="form-field" data-require-one="input[type=radio]">
                                    <x-forms.application-type-fields :form="$form ?? []" :showPermit="false"
                                        :showYears="false" />
                                </div>
                            </div>
                        </fieldset class="fieldset-compact">

                        <fieldset>
                            <legend>Service Categories</legend>

                            <div class="form-field" data-require-one="input[type=radio]">
                                <label>
                                    <input type="radio" name="service_category" value="vas_provider"
                                        {{ old('service_category', $form['service_category'] ?? '') === 'vas_provider' ? 'checked' : '' }}
                                        onclick="updateServiceCategory('vas_provider')">
                                    VALUE-ADDED SERVICE (VAS) PROVIDER
                                </label>

                                <label>
                                    <input type="radio" name="service_category" value="pcsotsp"
                                        {{ old('service_category', $form['service_category'] ?? '') === 'pcsotsp' ? 'checked' : '' }}
                                        onclick="updateServiceCategory('pcsotsp')">
                                    PUBLIC CALLING STATION/OFFICE / TELECENTER SERVICE PROVIDER (PCSOTSP)
                                </label>

                                <label>
                                    <input type="radio" name="service_category" value="voip" id="voip_radio"
                                        {{ old('service_category', $form['service_category'] ?? '') === 'voip' ? 'checked' : '' }}
                                        onclick="toggleVoipOptions(true); updateServiceCategory('voip')">
                                    VOICE OVER INTERNET PROTOCOL (VOIP)
                                </label>

                                <div style="margin-left:12px;" id="voip_options"
                                    class="{{ old('service_category', $form['service_category'] ?? '') === 'voip' ? '' : 'hidden' }}">
                                    <label>
                                        <input type="radio" name="voip_type" value="voip_provider"
                                            {{ old('voip_type', $form['voip_type'] ?? '') === 'voip_provider' ? 'checked' : '' }}
                                            onclick="updateServiceCategory('voip_provider')">
                                        PROVIDER
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="voip_type" value="voip_reseller"
                                            {{ old('voip_type', $form['voip_type'] ?? '') === 'voip_reseller' ? 'checked' : '' }}
                                            onclick="updateServiceCategory('voip_reseller')">
                                        RESELLER
                                    </label>
                                </div>
                                @error('service_category')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror

                                <!-- Hidden field to store the final chosen value -->
                                <input type="hidden" name="service_category_final" id="serviceCategoryFinal"
                                    value="{{ old('service_category_final', $form['service_category_final'] ?? '') }}">
                            </div>
                        </fieldset>
                        <div class="step-actions">
                            <button type="button" class="btn-primary" data-next>Next</button>
                        </div>
                    </section>
                    <section class="step-content" id="step-applicant">
                        <fieldset>
                            <legend>Applicant's Details</legend>
                            <div class="form-grid-1">
                                <div class="form-field">
                                    <label class="form-label">Applicant</label>
                                    <input class="form1-01-input" type="text" name="applicant" required
                                        value="{{ old('applicant', $form['applicant'] ?? '') }}">
                                    @error('applicant')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- address fields format -->
                            <x-forms.address-fields :form="$form ?? []" />
                            <div class="form-grid-3">
                                <div class="form-field"><label class="form-label">CPCN/PA/CA No.</label><input
                                        class="form1-01-input" type="text" name="cpcn_pa_ca_no"
                                        value="{{ old('cpcn_pa_ca_no', $form['cpcn_pa_ca_no'] ?? '') }}">
                                    @error('cpcn_pa_ca_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field"><label class="form-label">CPCN Validity</label>
                                    <input class="form1-01-input" type="date" name="cpcn_validity"
                                        value="{{ old('cpcn_validity', $form['cpcn_validity'] ?? '') }}">
                                    @error('cpcn_validity')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field"><label class="form-label">COR No.</label>
                                    <input class="form1-01-input" type="text" name="cor_no"
                                        value="{{ old('cor_no', $form['cor_no'] ?? '') }}">
                                    @error('cor_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">COR Validity</label>
                                    <input class="form1-01-input" type="date" name="cor_validity"
                                        value="{{ old('cor_validity', $form['cor_validity'] ?? '') }}">
                                    @error('cor_validity')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field"><label class="form-label">Is applicant known by another
                                        name?</label>
                                    <div class="inline-radio"
                                        style="width:100%; display:flex; align-items:center; gap:14px;">
                                        <label>
                                            <input type="radio" name="known_by_another_name" value="yes"
                                                {{ old('known_by_another_name', $form['known_by_another_name'] ?? '') === 'yes' ? 'checked' : '' }}
                                                onclick="toggleFormerName('yes')">
                                            Yes</label>
                                        <label>
                                            <input type="radio" name="known_by_another_name" value="no"
                                                {{ old('known_by_another_name', $form['known_by_another_name'] ?? '') === 'no' ? 'checked' : '' }}
                                                onclick="toggleFormerName('no')">
                                            No</label>
                                        <input class="form1-01-input" type="text" name="former_name"
                                            id="former_name" placeholder="If yes, indicate former name"
                                            value="{{ old('former_name', $form['former_name'] ?? '') }}"
                                            style="flex:1; min-width:0;"
                                            {{ old('known_by_another_name', $form['known_by_another_name'] ?? '') === 'yes' ? '' : 'disabled' }}>
                                    </div>
                                    @error('known_by_another_name')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    @error('former_name')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-vas">
                        <fieldset class="fieldset-compact">
                            <legend>List of Value Added Services</legend>
                            <div class="form-grid-2" data-require-one="input[type=radio]">
                                <div class="form-field">
                                    <label><input type="radio" name="vas_services" value="messaging"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'messaging' ? 'checked' : '' }}>
                                        Messaging service</label>
                                    <label><input type="radio" name="vas_services" value="audio_conferencing"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'audio_conferencing' ? 'checked' : '' }}>
                                        Audio conferencing</label>
                                    <label><input type="radio" name="vas_services" value="audio_video_conferencing"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'audio_video_conferencing' ? 'checked' : '' }}>
                                        Audio and Video Conferencing</label>
                                    <label><input type="radio" name="vas_services" value="voice_mail"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'voice_mail' ? 'checked' : '' }}>
                                        Voice mail service</label>
                                    <label><input type="radio" name="vas_services" value="electronic_mail"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'electronic_mail' ? 'checked' : '' }}>
                                        Electronic mail service</label>
                                    <label><input type="radio" name="vas_services" value="information_service"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'information_service' ? 'checked' : '' }}>
                                        Information service</label>
                                    <label><input type="radio" name="vas_services" value="application_service"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'application_service' ? 'checked' : '' }}>
                                        Application service</label>
                                </div>
                                <div class="form-field">
                                    <label><input type="radio" name="vas_services" value="content_program"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'content_program' ? 'checked' : '' }}>
                                        Content and Program service</label>
                                    <label><input type="radio" name="vas_services" value="audiotext"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'audiotext' ? 'checked' : '' }}>
                                        Audiotext service</label>
                                    <label><input type="radio" name="vas_services" value="facsimile"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'facsimile' ? 'checked' : '' }}>
                                        Facsimile service</label>
                                    <label><input type="radio" name="vas_services" value="virtual_private_network"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'virtual_private_network' ? 'checked' : '' }}>
                                        Virtual Private Network service</label>
                                    <label><input type="radio" name="vas_services" value="hosting"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'hosting' ? 'checked' : '' }}>
                                        Hosting service</label>
                                    <label><input type="radio" name="vas_services" value="electronic_gaming"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'electronic_gaming' ? 'checked' : '' }}>
                                        Electronic Gaming Services, except gambling</label>
                                    <label><input type="radio" name="vas_services" value="others"
                                            {{ old('vas_services', $form['vas_services'] ?? '') === 'others' ? 'checked' : '' }}>
                                        Others, specify</label>
                                    <input class="form1-01-input" type="text" name="others_vas"
                                        placeholder="Specify"
                                        value="{{ old('others_vas', $form['others_vas'] ?? '') }}">
                                    @error('others_vas')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                @error('vas_services')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
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
                const stepsOrder = ['categories', 'applicant', 'vas']; // Declaration removed
                const stepsList = document.getElementById('stepsList20');
                const form = document.getElementById('form120');
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
                    if (!warningCheckbox.checked && step !== 'categories') {
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
                    e.preventDefault();
                    const li = e.target.closest('.step-item');
                    if (!li) return;
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

                // --- Conditional fields ---
                function toggleModificationReason() {
                    const modReason = form.querySelector('input[name="modification_reason"]');
                    const modRadio = form.querySelector('input[name="application_type"][value="modification"]');
                    if (!modReason || !modRadio) return;
                    const enabled = modRadio.checked;
                    modReason.disabled = !enabled;
                    if (!enabled) modReason.value = '';
                }

                function toggleFormerNameInline() {
                    const yesRadio = form.querySelector('input[name="known_by_another_name"][value="yes"]');
                    const formerInput = document.getElementById('former_name');
                    if (!formerInput || !yesRadio) return;
                    const enabled = yesRadio.checked;
                    formerInput.disabled = !enabled;
                    if (!enabled) formerInput.value = '';
                }

                // Bind listeners
                form.querySelectorAll('input[name="application_type"]').forEach(r => {
                    r.addEventListener('change', toggleModificationReason);
                });
                form.querySelectorAll('input[name="known_by_another_name"]').forEach(r => {
                    r.addEventListener('change', toggleFormerNameInline);
                });

                // Initialize on load
                toggleModificationReason();
                toggleFormerNameInline();

                // Keep in sync when agreement toggles overall enabled state
                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', function() {
                        toggleModificationReason();
                        toggleFormerNameInline();
                    });
                }

                // --- Value Added Services: enable 'others_vas' only when 'vas_services=others' ---
                function toggleVasOthersSpecify() {
                    const othersRadio = form.querySelector('input[name="vas_services"][value="others"]');
                    const othersInput = form.querySelector('input[name="others_vas"]');
                    if (!othersRadio || !othersInput) return;
                    const enabled = othersRadio.checked;
                    othersInput.disabled = !enabled;
                    if (!enabled) othersInput.value = '';
                }

                form.querySelectorAll('input[name="vas_services"]').forEach(r => {
                    r.addEventListener('change', toggleVasOthersSpecify);
                });

                // Initialize on load
                toggleVasOthersSpecify();

                if (warningCheckbox) {
                    warningCheckbox.addEventListener('change', function() {
                        toggleVasOthersSpecify();
                    });
                }

                const validateBtn = document.getElementById('validateBtn');
                if (validateBtn) {
                    validateBtn.addEventListener('click', async () => {
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
                    });
                }
                showStep(stepsOrder[0]);
            })();


            //child radio button trigger when parent radio button clicked script
            document.addEventListener('DOMContentLoaded', function() {
                const voipRadio = document.getElementById('voip_radio');
                const voipOptions = document.getElementById('voip_options');
                const serviceCategoryRadios = document.getElementsByName('service_category');

                // Initial check
                voipOptions.style.display = voipRadio.checked ? 'block' : 'none';

                // Add listeners to all service category radios
                serviceCategoryRadios.forEach(radio => {
                    radio.addEventListener('change', function() {
                        voipOptions.style.display = voipRadio.checked ? 'block' : 'none';

                        // Clear voip_type selection when VOIP is not selected
                        if (!voipRadio.checked) {
                            document.getElementsByName('voip_type').forEach(radio => {
                                radio.checked = false;
                            });
                        }
                    });
                });

                function updateServiceCategory(value) {
                    document.getElementById('serviceCategoryFinal').value = value;
                }

                function toggleVoipOptions(show) {
                    document.getElementById('voip_options').classList.toggle('hidden', !show);
                }
            });

            // toggle former name input
            function toggleFormerName(value) {
                const formerNameInput = document.getElementById('former_name');
                formerNameInput.style.display = value === 'yes' ? 'block' : 'none';
                if (value === 'no') {
                    formerNameInput.value = '';
                }
            }

            // Initialize on page load
            document.addEventListener('DOMContentLoaded', function() {
                const selectedValue = document.querySelector('input[name="known_by_another_name"]:checked')?.value;
                if (selectedValue) {
                    toggleFormerName(selectedValue);
                }
            });
        </script>
    </main>
</x-layout>
