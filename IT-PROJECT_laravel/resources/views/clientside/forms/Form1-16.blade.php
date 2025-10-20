<x-layout :title="'Application for Permit to Transport Radio Transmitter(s)/Transceiver(s) (Form 1-16)'" :form-header="['formNo' => 'NTC 1-16', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']">

    <main>
        <form class="form1-01-container" id="form116" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR PERMIT TO TRANSPORT RADIO TRANSMITTER(S)/TRANSCEIVER(S)
            </div>
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
                    <ul class="steps-list" id="stepsList16">
                        <li class="step-item active" data-step="transport">Transport Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="personal">Applicant Information <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="equipment">Proposed Equipment <span
                                class="step-status">&nbsp;</span></li>
                        {{-- <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li> --}}
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-transport">
                        <fieldset class="fieldset-compact">
                            <legend>Transport Details</legend>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Place of Origin</label>
                                    <input class="form1-01-input" type="text" name="place_of_origin" required
                                        value="{{ old('place_of_origin', $form['place_of_origin'] ?? '') }}">
                                    @error('place_of_origin')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Destination</label>
                                    <input class="form1-01-input" type="text" name="destination" required
                                        value="{{ old('destination', $form['destination'] ?? '') }}">
                                    @error('destination')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Purpose</label>
                                    <input class="form1-01-input" type="text" name="purpose" required
                                        value="{{ old('purpose', $form['purpose'] ?? '') }}">
                                    @error('purpose')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
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
                                    <label class="form-label">Validity</label>
                                    <input class="form1-01-input" type="date" name="validity"
                                        value="{{ old('validity', $form['validity'] ?? '') }}">
                                    @error('validity')
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
                            <!-- address fields -->
                            <x-forms.address-fields :form="$form ?? []" />
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>
                    <section class="step-content" id="step-equipment">
                        <fieldset>
                            <legend>Particulars of Proposed Equipment</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Equipment</th>
                                            <th>Equipment</th>
                                            <th>Equipment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="table-input" type="text" name="equipment1_make"
                                                    value="{{ old('equipment1_make', $form['equipment1_make'] ?? '') }}">
                                                @error('equipment1_make')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="table-input" type="text" name="equipment1_serial"
                                                    value="{{ old('equipment1_serial', $form['equipment1_serial'] ?? '') }}">
                                                @error('equipment1_serial')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="table-input" type="text" name="equipment2_make"
                                                    value="{{ old('equipment2_make', $form['equipment2_make'] ?? '') }}">
                                                @error('equipment2_make')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="table-input" type="text" name="equipment2_serial"
                                                    value="{{ old('equipment2_serial', $form['equipment2_serial'] ?? '') }}">
                                                @error('equipment2_serial')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror

                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="table-input" type="text" name="equipment3_make"
                                                    value="{{ old('equipment3_make', $form['equipment3_make'] ?? '') }}">
                                                @error('equipment3_make')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="table-input" type="text" name="equipment3_serial"
                                                    value="{{ old('equipment3_serial', $form['equipment3_serial'] ?? '') }}">
                                                @error('equipment3_serial')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                const stepsOrder = ['transport', 'personal', 'equipment']; //'ntc', declaration removed
                const stepsList = document.getElementById('stepsList16');
                const form = document.getElementById('form116');
                const validationLink16 = document.getElementById('validationLink16');

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

                function validateActiveStep() {
                    const step = currentStep();
                    const section = document.getElementById(`step-${step}`);
                    let valid = true;
                    section.querySelectorAll('input[required], select[required], textarea[required]').forEach(el => {
                        if (!el.value) valid = false;
                    });
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
                        //         localStorage.setItem('active-form', '1-16');
                        //         if (validationLink16) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink16.href, window.location.origin);
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
