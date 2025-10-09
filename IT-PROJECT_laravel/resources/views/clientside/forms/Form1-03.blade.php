<x-layout :title="'Application for Amateur Radio Operator Certificate/Amateur Radio Station License (Form 1-03)'" :form-header="['formNo' => 'NTC 1-03', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']" :show-navbar="false">

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
                        <li class="step-item" data-step="application">Application/Permit <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="class">Class of Station <span class="step-status">&nbsp;</span>
                        </li>
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
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Last Name</label>
                                    <input class="form1-01-input" type="text" name="last_name" required
                                        value="{{ old('last_name', $form['last_name'] ?? '') }}">
                                    @error('last_name')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">First Name</label>
                                    <input class="form1-01-input" type="text" name="first_name" required
                                        value="{{ old('first_name', $form['first_name'] ?? '') }}">
                                    @error('first_name')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Middle Name</label>
                                    <input class="form1-01-input" type="text" name="middle_name"
                                        value="{{ old('middle_name', $form['middle_name'] ?? '') }}">
                                    @error('middle_name')
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
                                    <label class="form-label">ATROC/ARSL No.</label>
                                    <input class="form1-01-input" type="text" name="atroc_arsl_no"
                                        value="{{ old('atroc_arsl_no', $form['atroc_arsl_no'] ?? '') }}">
                                    @error('atroc_arsl_no')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Date of Birth</label>
                                    <input class="form1-01-input" type="date" name="dob" required
                                        value="{{ old('dob', $form['dob'] ?? '') }}">
                                    @error('dob')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-grid-3">
                                @php
                                    $sexValue = old('sex', $form['sex'] ?? null);
                                @endphp
                                <div class="form-field">
                                    <label class="form-label">Sex</label>
                                    <div class="inline-radio">
                                        <label>
                                            <input type="radio" name="sex" value="male" required
                                                {{ $sexValue == 'male' ? 'checked' : '' }}>
                                            Male
                                        </label>
                                        <label>
                                            <input type="radio" name="sex" value="female"
                                                {{ $sexValue == 'female' ? 'checked' : '' }}>
                                            Female
                                        </label>
                                    </div>
                                    @error('sex')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Nationality</label>
                                    <input class="form1-01-input" type="text" name="nationality"
                                        value="{{ old('nationality', $form['nationality'] ?? '') }}">
                                    @error('nationality')
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
                                    <label class="form-label">Unit/Rm/House/Bldg No.</label>
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
                                    <label class="form-label">Email</label>
                                    <input class="form1-01-input" type="email" name="email" required
                                        value="{{ old('email', $form['email'] ?? '') }}">
                                    @error('email')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-application">
                        @php
                            $applicationTypeValue = old('application_type', $form['application_type'] ?? null);
                        @endphp
                        <fieldset class="fieldset-compact">
                            <legend>Type of Application</legend>
                            <div class="form-field" data-require-one="input[type=radio]">
                                <label>
                                    <input type="radio" name="application_type" value="new"
                                        {{ $applicationTypeValue == 'new' ? 'checked' : '' }}>
                                    NEW
                                </label>
                                <label>
                                    <input type="radio" name="application_type" value="renewal"
                                        {{ $applicationTypeValue == 'renewal' ? 'checked' : '' }}>
                                    RENEWAL
                                </label>
                                <label>
                                    <input type="radio" name="application_type" value="modification"
                                        {{ $applicationTypeValue == 'modification' ? 'checked' : '' }}>
                                    MODIFICATION due to
                                </label>
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
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-class">
                        @php
                            $permitTypeValue = old('permit_type', $form['permit_type'] ?? null);
                            $stationClassValue = old('station_class', $form['station_class'] ?? null);
                        @endphp
                        <fieldset class="fieldset-compact">
                            <legend>Type of Permit/License/Certificate and Class of Station</legend>
                            <div class="form-grid-2">
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
                                    @error('permit_type')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
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
                                    <label class="form-label">No. of Years</label>
                                    <input class="form1-01-input" type="text" name="years"
                                        placeholder="e.g., 2" value="{{ old('years', $form['years'] ?? '') }}">
                                    @error('station_class')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-exam">
                        <fieldset class="fieldset-compact">
                            <legend>Examination Details</legend>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Place of Exam</label>
                                    <input class="form1-01-input" type="text" name="exam_place" required
                                        value="{{ old('exam_place', $form['exam_place'] ?? '') }}">
                                    @error('exam_place')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Date</label>
                                    <input class="form1-01-input" type="date" name="exam_date" required
                                        value="{{ old('exam_date', $form['exam_date'] ?? '') }}">
                                    @error('exam_date')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Rating</label>
                                    <input class="form1-01-input" type="text" name="rating"
                                        value="{{ old('rating', $form['rating'] ?? '') }}">
                                    @error('rating')
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
                            <legend>Particulars of Equipment (Use separate sheet/s, if necessary)</legend>
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
                const stepsOrder = ['personal', 'application', 'class', 'exam', 'equipment', 'declaration'];
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

                const validateBtn = document.getElementById('validateBtn03');
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
