<x-layout :title="'Form D (For Modification) (Form 1-13))'" :form-header="['formNo' => 'NTC 1-13', 'revisionNo' => '01', 'revisionDate' => '03/31/2021']" :show-navbar="false">

    <main>
        <form class="form1-01-container" id="form113" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">FORM D (FOR MODIFICATION)</div>
            <div class="form1-01-note"><strong>NOTE:</strong> Indicate "N/A" for items not applicable.</div>
            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList13">
                        <li class="step-item active" data-step="applicant">Applicant <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="particulars">Particulars <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="sign">Signature <span class="step-status">&nbsp;</span>
                        </li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-applicant">
                        <fieldset>
                            <legend>Applicant</legend>
                            <div class="form-grid-1">
                                <div class="form-field">
                                    <input class="form1-01-input" type="text" name="applicant"
                                        value="{{ old('applicant', $form['applicant'] ?? '') }}">
                                    @error('applicant')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-particulars">
                        <fieldset>
                            <legend>Particulars</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Field</th>
                                            <th>Authorized</th>
                                            <th>Proposed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="table-field-label" colspan="3">
                                                <strong>STATION</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>EXACT LOCATION</td>
                                            <td><input class="table-input" type="text"
                                                    name="authorized_exact_location"
                                                    value="{{ old('authorized_exact_location', $form['authorized_exact_location'] ?? '') }}">
                                                @error('authorized_exact_location')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_exact_location"
                                                    value="{{ old('proposed_exact_location', $form['proposed_exact_location'] ?? '') }}">
                                                @error('proposed_exact_location')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>LONGITUDE (deg-min-sec)</td>
                                            <td><input class="table-input" type="text" name="authorized_longitude"
                                                    value="{{ old('authorized_longitude', $form['authorized_longitude'] ?? '') }}">
                                                @error('authorized_longitude')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_longitude"
                                                    value="{{ old('proposed_longitude', $form['proposed_longitude'] ?? '') }}">
                                                @error('proposed_longitude')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>LATITUDE (deg-min-sec)</td>
                                            <td><input class="table-input" type="text" name="authorized_latitude"
                                                    value="{{ old('authorized_latitude', $form['authorized_latitude'] ?? '') }}">
                                                @error('authorized_latitude')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_latitude"
                                                    value="{{ old('proposed_latitude', $form['proposed_latitude'] ?? '') }}">
                                                @error('proposed_latitude')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>POINTS OF COMM/SERVICE AREA</td>
                                            <td><input class="table-input" type="text"
                                                    name="authorized_points_of_comm"
                                                    value="{{ old('authorized_points_of_comm', $form['authorized_points_of_comm'] ?? '') }}">
                                                @error('authorized_points_of_comm')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_points_of_comm"
                                                    value="{{ old('proposed_points_of_comm', $form['proposed_points_of_comm'] ?? '') }}">
                                                @error('proposed_points_of_comm')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ASSIGNED FREQ.</td>
                                            <td><input class="table-input" type="text"
                                                    name="authorized_assigned_freq"
                                                    value="{{ old('authorized_assigned_freq', $form['authorized_assigned_freq'] ?? '') }}">
                                                @error('authorized_assigned_freq')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_assigned_freq"
                                                    value="{{ old('proposed_assigned_freq', $form['proposed_assigned_freq'] ?? '') }}">
                                                @error('proposed_assigned_freq')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>BW & EMISSION</td>
                                            <td><input class="table-input" type="text" name="authorized_bw_emission"
                                                    value="{{ old('authorized_bw_emission', $form['authorized_bw_emission'] ?? '') }}">
                                                @error('authorized_bw_emission')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_bw_emission"
                                                    value="{{ old('proposed_bw_emission', $form['proposed_bw_emission'] ?? '') }}">
                                                @error('proposed_bw_emission')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CONFIGURATION</td>
                                            <td><input class="table-input" type="text"
                                                    name="authorized_configuration"
                                                    value="{{ old('authorized_configuration', $form['authorized_configuration'] ?? '') }}">
                                                @error('authorized_configuration')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text"
                                                    name="proposed_configuration"
                                                    value="{{ old('proposed_configuration', $form['proposed_configuration'] ?? '') }}">
                                                @error('proposed_configuration')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>DATA RATE</td>
                                            <td><input class="table-input" type="text" name="authorized_data_rate"
                                                    value="{{ old('authorized_data_rate', $form['authorized_data_rate'] ?? '') }}">
                                                @error('authorized_data_rate')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_data_rate"
                                                    value="{{ old('proposed_data_rate', $form['proposed_data_rate'] ?? '') }}">
                                                @error('proposed_data_rate')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-field-label" colspan="3">
                                                <strong>EQUIPMENT</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>MAKE/TYPE/MODEL</td>
                                            <td><input class="table-input" type="text"
                                                    name="authorized_make_type_model"
                                                    value="{{ old('authorized_make_type_model', $form['authorized_make_type_model'] ?? '') }}">
                                                @error('authorized_exact_location')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text"
                                                    name="proposed_make_type_model"
                                                    value="{{ old('proposed_make_type_model', $form['proposed_make_type_model'] ?? '') }}">
                                                @error('proposed_make_type_model')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SERIAL NO.</td>
                                            <td><input class="table-input" type="text" name="authorized_serial_no"
                                                    value="{{ old('authorized_serial_no', $form['authorized_serial_no'] ?? '') }}">
                                                @error('authorized_serial_no')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_serial_no"
                                                    value="{{ old('proposed_serial_no', $form['proposed_serial_no'] ?? '') }}">
                                                @error('proposed_serial_no')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>POWER OUTPUT</td>
                                            <td><input class="table-input" type="text"
                                                    name="authorized_power_output"
                                                    value="{{ old('authorized_power_output', $form['authorized_power_output'] ?? '') }}">
                                                @error('authorized_power_output')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text"
                                                    name="proposed_power_output"
                                                    value="{{ old('proposed_power_output', $form['proposed_power_output'] ?? '') }}">
                                                @error('proposed_power_output')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>FREQ. RANGE</td>
                                            <td><input class="table-input" type="text"
                                                    name="authorized_freq_range"
                                                    value="{{ old('authorized_freq_range', $form['authorized_freq_range'] ?? '') }}">
                                                @error('authorized_freq_range')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_freq_range"
                                                    value="{{ old('proposed_freq_range', $form['proposed_freq_range'] ?? '') }}">
                                                @error('proposed_freq_range')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-field-label" colspan="3">
                                                <strong>OTHERS</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>OTHERS 1</td>
                                            <td><input class="table-input" type="text" name="authorized_others_1"
                                                    value="{{ old('authorized_others_1', $form['authorized_others_1'] ?? '') }}">
                                                @error('authorized_others_1')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_others_1"
                                                    value="{{ old('proposed_others_1', $form['proposed_others_1'] ?? '') }}">
                                                @error('proposed_others_1')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>OTHERS 2</td>
                                            <td><input class="table-input" type="text" name="authorized_others_2"
                                                    value="{{ old('authorized_others_2', $form['authorized_others_2'] ?? '') }}">
                                                @error('authorized_others_2')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_others_2"
                                                    value="{{ old('proposed_others_2', $form['proposed_others_2'] ?? '') }}">
                                                @error('proposed_others_2')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>OTHERS 3</td>
                                            <td><input class="table-input" type="text" name="authorized_others_3"
                                                    value="{{ old('authorized_others_3', $form['authorized_others_3'] ?? '') }}">
                                                @error('authorized_others_3')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td><input class="table-input" type="text" name="proposed_others_3"
                                                    value="{{ old('proposed_others_3', $form['proposed_others_3'] ?? '') }}">
                                                @error('proposed_others_3')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
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

                    <section class="step-content" id="step-sign">
                        <fieldset>
                            <legend>Signature and Date</legend>
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
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button class="form1-01-btn" type="button"
                                    id="validateBtn13">Proceed to Validation</button></div>
                        </fieldset>
                    </section>
                </div>
        </form>

        <script>
            (function() {
                const stepsOrder = ['applicant', 'particulars', 'sign'];
                const stepsList = document.getElementById('stepsList13');
                const form = document.getElementById('form113');
                const validationLink13 = document.getElementById('validationLink13');

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
                    section.querySelectorAll('input[required]').forEach(el => {
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

                const validateBtn = document.getElementById('validateBtn13');
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
                        //         localStorage.setItem('active-form', '1-13');
                        //         if (validationLink13) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink13.href, window.location.origin);
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
