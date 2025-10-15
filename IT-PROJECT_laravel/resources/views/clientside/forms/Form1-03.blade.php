<x-layout :title="'Application for Amateur Radio Operator Certificate/Amateur Radio Station License (Form 1-03)'" :form-header="['formNo' => 'NTC 1-03', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']">

    <main>
        <form class="form1-01-container" id="form103" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR AMATEUR RADIO OPERATOR CERTIFICATE/AMATEUR RADIO STATION
                LICENSE</div>
            <div class="form1-01-note"><strong>NOTE:</strong> The system asks for additional info when applicant is
                a minor.</div>
            <div class="form1-01-warning">
                <div class="form1-01-warning-title">WARNING:</div> Ensure that all details in the name and date of
                birth fields are correct. We cannot edit those fields on site and you will need to set a new
                appointment.<div class="form1-01-agree"><label><input type="checkbox" /> I agree / Malinaw sa
                        akin</label></div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList03">
                        <li class="step-item active" data-step="personal">Personal Information <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="application">Application Details<span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="exam">Examination Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="equipment">Equipment Particulars <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-personal">
                        <fieldset>
                            <legend>Applicant's Details</legend>
                            <!-- Name fields-->
                            <x-forms.name-fields :form="$form ?? []" />

                            <!-- formOne-blueprint-three fields -->
                            <x-forms.formOne-blueprint-three :form="$form ?? []" />

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
                                    <label class="form-label">ATROC/ARSL No.</label>
                                    <input class="form1-01-input" type="text" name="atroc_arsl_no"
                                        value="{{ old('atroc_arsl_no', $form['atroc_arsl_no'] ?? '') }}">
                                    @error('atroc_arsl_no')
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

                            <!-- address fields format -->
                            <x-forms.address-fields :form="$form ?? []" />

                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-application">
                        @php
                            $applicationType = old('application_type', $form['application_type'] ?? null);
                            $permitTypeValue = old('permit_type', $form['permit_type'] ?? null);
                            $stationClassValue = old('station_class', $form['station_class'] ?? null);
                        @endphp

                        <div class="form-grid-2">
                            <fieldset class="fieldset-compact">
                                <legend>Type of Application</legend>
                                <!-- Application type fields -->
                                <x-forms.application-type-fields :form="$form101 ?? []" :application-type="$applicationType"
                                    :show-years="false" />
                            </fieldset>


                            <fieldset class="fieldset-compact">
                                <legend>Type of Class of Station</legend>
                                <div class="form-field">
                                    <div class="form-field" data-require-one="input[type=radio]">
                                        <label>
                                            <input type="radio" name="station_class" value="class_a"
                                                {{ $stationClassValue == 'class_a' ? 'checked' : '' }}>
                                            Class A
                                        </label>
                                        <label>
                                            <input type="radio" name="station_class" value="class_b"
                                                {{ $stationClassValue == 'class_b' ? 'checked' : '' }}>
                                            Class B
                                        </label>
                                        <label>
                                            <input type="radio" name="station_class" value="class_c"
                                                {{ $stationClassValue == 'class_c' ? 'checked' : '' }}>
                                            Class C
                                        </label>
                                        <label>
                                            <input type="radio" name="station_class" value="class_d"
                                                {{ $stationClassValue == 'class_d' ? 'checked' : '' }}>
                                            Class D
                                        </label>
                                        @error('station_class')
                                            <p class="text-red text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        </fieldset>

                        <fieldset class="fieldset-compact">
                            <legend>Type of Permit/License/Certificate </legend>
                            @error('permit_type')
                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <div class="form-field" data-require-one="input[type=radio]">
                                <label>
                                    <input type="radio" name="permit_type" value="amateur_operator"
                                        {{ $permitTypeValue == 'amateur_operator' ? 'checked' : '' }}>
                                    Amateur Radio Operator Certificate
                                </label>
                                <label>
                                    <input type="radio" name="permit_type" value="amateur_station"
                                        {{ $permitTypeValue == 'amateur_station' ? 'checked' : '' }}>
                                    Amateur Radio Station License
                                </label>
                                <label>
                                    <input type="radio" name="permit_type" value="club_station"
                                        {{ $permitTypeValue == 'club_station' ? 'checked' : '' }}>
                                    Club Radio Station License
                                </label>
                                <div style="margin-left:12px;margin-top:8px;">
                                    <label class="form-label">Name of Club</label>
                                    <input class="form1-01-input" type="text" name="club_name"
                                        value="{{ old('club_name', $form['club_name'] ?? '') }}">
                                    <label class="form-label">Assigned Freq.</label>
                                    <input class="form1-01-input" type="text" name="assigned_frequency"
                                        value="{{ old('assigned_frequency', $form['assigned_frequency'] ?? '') }}">
                                </div>
                                <label>
                                    <input type="radio" name="permit_type" value="temporary_foreign"
                                        {{ $permitTypeValue == 'temporary_foreign' ? 'checked' : '' }}>
                                    Temporary Permit for Foreign Visitor
                                </label>
                                <label>
                                    <input type="radio" name="permit_type" value="special_vanity"
                                        {{ $permitTypeValue == 'special_vanity' ? 'checked' : '' }}>
                                    Special Permit for Vanity/Special Call Sign
                                </label>
                                <label class="form-label">Preferred Call Sign/s</label>
                                <input class="form1-01-input" type="text" name="preferred_call_sign"
                                    value="{{ old('preferred_call_sign', $form['preferred_call_sign'] ?? '') }}">

                            </div>
                        </fieldset>
                        <div class="step-actions"><button type="button" class="btn-secondary"
                                data-prev>Back</button><button type="button" class="btn-primary"
                                data-next>Next</button></div>
                    </section>

                    <section class="step-content" id="step-exam">
                        <fieldset class="fieldset-compact">
                            <legend>Examination Details</legend>

                            <!-- Exam fields -->
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Place of Exam</label>
                                    <x-forms.exam-fields :form="$form ?? []" />

                        </fieldset>
                    </section>

                    <section class="step-content" id="step-equipment">
                        <fieldset>
                            <legend>Particulars of Equipment</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Make</th>
                                            <th>Type/Model</th>
                                            <th>Serial Number</th>
                                            <th>Frequency Range</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment_make_1"
                                                    value="{{ old('equipment_make_1', $form['equipment_make_1'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_type_1"
                                                    value="{{ old('equipment_type_1', $form['equipment_type_1'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_serial_1"
                                                    value="{{ old('equipment_serial_1', $form['equipment_serial_1'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_freq_1"
                                                    value="{{ old('equipment_freq_1', $form['equipment_freq_1'] ?? '') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment_make_2"
                                                    value="{{ old('equipment_make_2', $form['equipment_make_2'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_type_2"
                                                    value="{{ old('equipment_type_2', $form['equipment_type_2'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_serial_2"
                                                    value="{{ old('equipment_serial_2', $form['equipment_serial_2'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_freq_2"
                                                    value="{{ old('equipment_freq_2', $form['equipment_freq_2'] ?? '') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment_make_3"
                                                    value="{{ old('equipment_make_3', $form['equipment_make_3'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_type_3"
                                                    value="{{ old('equipment_type_3', $form['equipment_type_3'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_serial_3"
                                                    value="{{ old('equipment_serial_3', $form['equipment_serial_3'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_freq_3"
                                                    value="{{ old('equipment_freq_3', $form['equipment_freq_3'] ?? '') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="table-input" type="text" name="equipment_make_4"
                                                    value="{{ old('equipment_make_4', $form['equipment_make_4'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_type_4"
                                                    value="{{ old('equipment_type_4', $form['equipment_type_4'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_serial_4"
                                                    value="{{ old('equipment_serial_4', $form['equipment_serial_4'] ?? '') }}">
                                            </td>
                                            <td><input class="table-input" type="text" name="equipment_freq_4"
                                                    value="{{ old('equipment_freq_4', $form['equipment_freq_4'] ?? '') }}">
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

                    <!-- Declaration fields component -->
                    <x-forms.declaration-field :form="$form ?? []" />
                </div>
            </div>
        </form>

        <script>
            (function() {
                const stepsOrder = ['personal', 'application', 'exam', 'equipment', 'declaration'];
                const stepsList = document.getElementById('stepsList03');
                const form = document.getElementById('form103');
                const validationLink03 = document.getElementById('validationLink03');

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
                        const anyChecked = Array.from(items).some(el => (el.type === 'radio') ? el.checked :
                            Boolean(el.value));
                        if (!anyChecked) ok = false;
                    });
                    return ok;
                }

                function validateActiveStep() {
                    const step = currentStep();
                    const section = document.getElementById(`step-${step}`);
                    let valid = true;

                    // Get all required fields in the current section, regardless of fieldset
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

                    // Validate groups anywhere in the section
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

                // Handle step navigation via sidebar
                stepsList.addEventListener('click', (e) => {
                    const li = e.target.closest('.step-item');
                    if (!li) return;
                    showStep(li.dataset.step);
                });

                // Handle next/prev buttons anywhere in the form
                document.addEventListener('click', (e) => {
                    if (e.target.matches('[data-next]')) {
                        go(1)
                        if (validateActiveStep());
                    } else if (e.target.matches('[data-prev]')) {
                        go(-1);
                    }
                });

                const validateBtn = document.getElementById('validateBtn');
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
                        //         localStorage.setItem('active-form', '1-03');
                        //         if (validationLink03) {
                        //             const token = json && json.form_token ? json.form_token : (localStorage
                        //                 .getItem('form_token') || '');
                        //             const url = new URL(validationLink03.href, window.location.origin);
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
