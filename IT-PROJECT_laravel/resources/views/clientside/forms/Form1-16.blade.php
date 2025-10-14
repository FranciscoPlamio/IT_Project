<x-layout :title="'Application for Permit to Transport Radio Transmitter(s)/Transceiver(s) (Form 1-16)'" :form-header="['formNo' => 'NTC 1-16', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']" :show-navbar="false">

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
                <div class="form1-01-agree"><label><input type="checkbox" id="warning-agreement" /> I agree / Malinaw sa
                        akin</label></div>
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
                        {{-- <li class="step-item" data-step="ntc">NTC Purposes <span class="step-status">&nbsp;</span> </li> --}}
                        <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li>
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
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="table-input" type="text" name="equipment1_serial"
                                                    value="{{ old('equipment1_serial', $form['equipment1_serial'] ?? '') }}">
                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="table-input" type="text" name="equipment2_make"
                                                    value="{{ old('equipment2_make', $form['equipment2_make'] ?? '') }}">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="table-input" type="text" name="equipment2_serial"
                                                    value="{{ old('equipment2_serial', $form['equipment2_serial'] ?? '') }}">
                                            </td>
                                            <td>
                                                <div class="table-field-label"><strong>Make/Type/Model:</strong>
                                                </div>
                                                <input class="table-input" type="text" name="equipment3_make"
                                                    value="{{ old('equipment3_make', $form['equipment3_make'] ?? '') }}">
                                                <div class="table-field-label"><strong>Serial No.:</strong></div>
                                                <input class="table-input" type="text" name="equipment3_serial"
                                                    value="{{ old('equipment3_serial', $form['equipment3_serial'] ?? '') }}">
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
                    <!-- NTC Purposes fields component (possible admin side only) -->
                    {{-- <section class="step-content" id="step-ntc">
                         <fieldset>
                            <legend>For NTC Purposes Only</legend>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Permit No.</label>
                                    <input class="form1-01-input" type="text" name="permit_no"
                                        value="{{ old('permit_no', $form['permit_no'] ?? '') }}">
                                    @error('permit_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Date Issued</label>
                                    <input class="form1-01-input" type="date" name="date_issued"
                                        value="{{ old('date_issued', $form['date_issued'] ?? '') }}">
                                    @error('date_issued')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">FOR THE COMMISSION</label>
                                    <input class="form1-01-input" type="text" name="for_commission_signature"
                                        value="{{ old('for_commission_signature', $form['for_commission_signature'] ?? '') }}">
                                    @error('for_commission_signature')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div style="font-size:0.97rem;margin-top:12px;color:#666;">This PERMIT shall be valid
                                for a period of fifteen (15) days from the date of issuance. Note: This PERMIT is
                                valid only when the payment of the required fees is included.</div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset> 
                    </section> --}}

                    <!-- Declaration fields component -->
                    <x-forms.declaration-field :form="$form ?? []" />
                </div>
            </div>
        </form>

        <script>
            (function() {
                const stepsOrder = ['transport', 'personal', 'equipment', 'declaration']; //'ntc' removed for now
                const stepsList = document.getElementById('stepsList16');
                const form = document.getElementById('form116');
                const validationLink16 = document.getElementById('validationLink16');
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
                    if (!warningCheckbox.checked && step !== 'transport') {
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

                    // Only allow navigation to transport step if checkbox not checked
                    if (!warningCheckbox.checked && li.dataset.step !== 'transport') {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }

                    showStep(li.dataset.step);
                });
                document.querySelectorAll('[data-next]').forEach(b => b.addEventListener('click', () => {
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    if (validateActiveStep()) go(1);
                }));
                document.querySelectorAll('[data-prev]').forEach(b => b.addEventListener('click', () => {
                    if (!warningCheckbox.checked) {
                        alert('Please check the agreement checkbox first before proceeding.');
                        return;
                    }
                    go(-1);
                }));

                const validateBtn = document.getElementById('validateBtn16');
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
