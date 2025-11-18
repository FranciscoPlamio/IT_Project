<x-layout :title="'Application for Radio Operator Examination (Form 1-01)'" :form-header="['formNo' => 'NTC 1-01', 'revisionNo' => '03', 'revisionDate' => '03/31/2023']">
    <main>


        <form class="form1-01-container" id="form101" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            <a href="{{ route('display.forms') }}" class="inline-flex items-center hover:underline">
                &#8592; Back
            </a>
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">APPLICATION FOR RADIO OPERATOR EXAMINATION</div>

            <div class="form1-01-warning">
                <div class="form1-01-warning-title">WARNING:</div>
                Ensure that all details in the name and date of birth fields are correct. We cannot edit those fields on
                site and you will need to set a new appointment.
                <div class="form1-01-agree"><label><input type="checkbox" id="warning-agreement" /> I agree / Malinaw sa
                        akin</label></div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList01" style="pointer-events: none;">
                        <li class="step-item active" data-step="application">Application Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="applicant">Applicant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="assistance">Request for Assistance <span
                                class="step-status">&nbsp;</span></li>
                        {{-- <li class="step-item" data-step="declaration">Declaration <span
                                class="step-status">&nbsp;</span></li> --}}
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-application">

                        <!-- Error header -->
                        <x-forms.error-header />

                        <fieldset class="fieldset-compact">
                            <legend>Instructions</legend>
                            <ol style="margin:8px 0 0 20px;font-size:0.97rem;">
                                <li>Accomplish this application form properly, in ALL CAPS, handwritten or
                                    computer-printed.</li>
                                <li>Attach the complete requirements including supporting documents. For the List of
                                    requirements, please refer to the <u>NTC Citizen's Charter</u> at the NTC website:
                                    <a href="https://ntc.gov.ph" target="_blank" rel="noopener">ntc.gov.ph</a>
                                </li>
                                <li>Check (✓) appropriate box. Indicate "N/A" for items not applicable.</li>
                            </ol>
                        </fieldset>
                        @php
                            $examTypeValue = old('exam_type', $form['exam_type'] ?? null);
                        @endphp


                        <legend>Examination Type <span class="text-red">*</span></legend>
                        @error('exam_type')
                            <p class="text-red text-lg text-center w-full">{{ $message }}</p>
                        @enderror
                        <fieldset class="fieldset-compact">
                            <legend>Radiotelegraphy</legend>
                            <div class="form-field">

                                <label>
                                    <input type="radio" name="exam_type" value="1rtg_e1256_code25"
                                        {{ $examTypeValue == '1rtg_e1256_code25' ? 'checked' : '' }}>
                                    1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)
                                </label>
                                <label>
                                    <input type="radio" name="exam_type" value="1rtg_code25"
                                        {{ $examTypeValue == '1rtg_code25' ? 'checked' : '' }}>
                                    1RTG - Code (25/20 wpm)
                                </label>
                                <label>
                                    <input type="radio" name="exam_type" value="2rtg_e1256_code16"
                                        {{ $examTypeValue == '2rtg_e1256_code16' ? 'checked' : '' }}>
                                    2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)
                                </label>
                                <label>
                                    <input type="radio" name="exam_type" value="2rtg_code16"
                                        {{ $examTypeValue == '2rtg_code16' ? 'checked' : '' }}>
                                    2RTG - Code (16wpm)
                                </label>
                                <label>
                                    <input type="radio" name="exam_type" value="3rtg_e125_code16"
                                        {{ $examTypeValue == '3rtg_e125_code16' ? 'checked' : '' }}>
                                    3RTG - Elements 1, 2, 5 & Code (16 wpm)
                                </label>
                                <label>
                                    <input type="radio" name="exam_type" value="3rtg_code16"
                                        {{ $examTypeValue == '3rtg_code16' ? 'checked' : '' }}>
                                    3RTG - Code (16wpm)
                                </label>
                            </div>
                        </fieldset>
                        <fieldset class="fieldset-compact">
                            <legend>Amateur</legend>
                            @php
                                $amateurValues = [];
                            @endphp

                            <div class="form-field">
                                <label>
                                    <input type="radio" name="exam_type" value="class_a_e8910_code5"
                                        {{ $examTypeValue == 'class_a_e8910_code5' ? 'checked' : '' }}>
                                    Class A - Elements 8, 9, 10 & Code (5 wpm)
                                </label>
                                <label>
                                    <input type="radio" name="exam_type" value="class_a_code5_only"
                                        {{ $examTypeValue == 'class_a_code5_only' ? 'checked' : '' }}>
                                    Class A - Code (5 wpm) Only
                                </label>
                                <label>
                                    <input type="radio" name="exam_type" value="class_b_e567"
                                        {{ $examTypeValue == 'class_b_e567' ? 'checked' : '' }}>
                                    Class B - Elements 5, 6 & 7
                                </label>
                                <label>
                                    <input type="radio" name="exam_type" value="class_b_e2"
                                        {{ $examTypeValue == 'class_b_e2' ? 'checked' : '' }}>
                                    Class B - Element 2
                                </label>
                                <label>
                                    <input type="radio" name="exam_type" value="class_c_e234"
                                        {{ $examTypeValue == 'class_c_e234' ? 'checked' : '' }}>
                                    Class C - Elements 2, 3 & 4
                                </label>
                                <label>
                                    <input type="radio" name="exam_type" value="class_d_e2"
                                        {{ $examTypeValue == 'class_d_e2' ? 'checked' : '' }}>
                                    Class D - Element 2
                                </label>
                            </div>
                        </fieldset>
                        <div class="form-grid-3">
                            <fieldset class="fieldset-compact">
                                <legend>Radiotelephony</legend>
                                <div class="form-field">
                                    <label>
                                        <input type="radio" name="exam_type" value="1phn_e1234"
                                            {{ $examTypeValue == '1phn_e1234' ? 'checked' : '' }}>
                                        1PHN - Elements 1, 2, 3 & 4
                                    </label>
                                    <label>
                                        <input type="radio" name="exam_type" value="2phn_e123"
                                            {{ $examTypeValue == '2phn_e123' ? 'checked' : '' }}>
                                        2PHN - Elements 1, 2 & 3
                                    </label>
                                    <label>
                                        <input type="radio" name="exam_type" value="3phn_e12"
                                            {{ $examTypeValue == '3phn_e12' ? 'checked' : '' }}>
                                        3PHN - Elements 1 & 2
                                    </label>

                                </div>
                            </fieldset>
                            <fieldset class="fieldset-compact">
                                <legend>Restricted Radiotelephone</legend>
                                <div class="form-field">
                                    <label>
                                        <input type="radio" name="exam_type" value="rroc_aircraft_e1"
                                            {{ $examTypeValue == 'rroc_aircraft_e1' ? 'checked' : '' }}>
                                        RROC - Aircraft - Element 1
                                    </label>
                                </div>
                            </fieldset>
                            {{-- <div class="form-field">
                                <label class="form-label">DATE OF EXAM (mm/dd/yy)</label>
                                <input class="form1-01-input" type="date" name="date_of_exam"
                                    max="{{ date('Y-m-d') }}"
                                    value="{{ isset($form['date_of_exam']) ? $form['date_of_exam'] : '' }}">
                            </div> --}}
                        </div>
                        <div class="step-actions">
                            <button type="button" class="btn-primary" data-next>Next</button>
                        </div>
                    </section>

                    <section class="step-content" id="step-applicant">
                        <fieldset>
                            <legend>Applicant's Details</legend>

                            <!-- Name fields-->
                            <x-forms.name-fields :form="$form ?? []" />

                            <!-- formOne-blueprint-three fields -->
                            <x-forms.formOne-blueprint-three :form="$form ?? []" />

                            <!-- address fields format -->
                            <x-forms.address-fields :form="$form ?? []" />


                            <div class="form-field">
                                <label class="form-label">School Attended <span class="text-red">*</span></label>
                                <input class="form1-01-input" type="text" name="school_attended"
                                    value="{{ old('school_attended', $form['school_attended'] ?? '') }}">
                                @error('school_attended')
                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-grid-3">
                                <div class="form-field">
                                    <label class="form-label">Course Taken <span class="text-red">*</span></label>
                                    <select class="form1-01-input" name="course_taken" id="course_taken" required>
                                        <x-forms.course-lists-options />
                                    </select>

                                    {{-- Hidden text input for "Other" --}}
                                    <input type="text" id="other_course" name="other_course"
                                        class="form1-01-input mt-2" placeholder="Please specify"
                                        style="display: none;"
                                        value="{{ old('other_course', $form['other_course'] ?? '') }}">

                                    </select>

                                    @error('course_taken')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Year Graduated <span class="text-red">*</span></label>
                                    <select class="form1-01-input" name="year_graduated">
                                        <option value="">
                                            Select Year
                                        </option>
                                        @php
                                            $currentYear = date('Y');
                                            $startYear = $currentYear - 70; // allows up to 70 years back
                                        @endphp

                                        @for ($year = $currentYear; $year >= $startYear; $year--)
                                            <option value="{{ $year }}"
                                                {{ old('year_graduated', $form['year_graduated'] ?? '') == $year ? 'selected' : '' }}>
                                                {{ $year }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('year_graduated')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-assistance">
                        <fieldset class="fieldset-compact">
                            <legend>Applicant's Request for Assistance</legend>
                            <div class="form-grid-3">
                                <div class="form-field" style="grid-column:span 1;">
                                    <label class="form-label">Do you have any special needs and/or requests during the
                                        examination? <span class="text-red">*</span></label>
                                    <div class="inline-radio">
                                        <label>
                                            <input id="needs_yes" type="radio" name="needs" value="1"
                                                {{ old('needs', $form['needs'] ?? '') === '1' ? 'checked' : '' }}>
                                            Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="needs" value="0" id="needs_no"
                                                {{ old('needs', $form['needs'] ?? '') === '0' ? 'checked' : '' }}>
                                            No
                                        </label>

                                    </div>
                                    @error('needs')
                                        <p class="text-red text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-field" style="grid-column:span 2;">
                                    <label class="form-label">If yes, please indicate your specific needs and/or
                                        request.</label>
                                    <input id="needs_details" class="form1-01-input" type="text"
                                        name="needs_details"
                                        value="{{ old('needs_details', $form['needs_details'] ?? '') }}" disabled>
                                    @error('needs_details')
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
                            <div class="step-actions">
                                <button type="button" class="btn-secondary" data-prev>Back</button>
                                <button class="form1-01-btn" type="button" id="validateBtn">Proceed to
                                    Validation</button>
                            </div>
                        </fieldset>
                    </section>

                    {{-- <section class="step-content" id="step-declaration">
                        <fieldset>
                            <legend>DECLARATION</legend>
                            <div class="form1-01-declaration">
                                I hereby declare that all the above entries are true and correct. Under the Revised
                                Penal Code, I shall be held liable for any willful false statement(s) or
                                misrepresentation(s) made in this application form that may serve as a valid ground for
                                the denial of this application and/or cancellation/revocation of the permit
                                issued/granted. Further, I am freely giving full consent for the collection and
                                processing of personal information in accordance with Republic Act No. 73, Data
                                Privacy Act of 2012.
                            </div>
                            <div class="form1-01-signature-row">
                                <div class="form1-01-signature-col">
                                    <input class="signature-line-input" type="text" name="signature_name"
                                        placeholder="Signature over Printed Name of Applicant"
                                        value="{{ $form['signature_name'] ?? '' }}" />
                                    <input class="form1-01-input" type="date" name="date_accomplished"
                                        placeholder="Date Accomplished"
                                        value="{{ $form['date_accomplished'] ?? '' }}"
                                        style="max-width:180px;width:100%;" />
                                </div>
                                <div class="form1-01-signature-col"
                                    style="border:1px dashed #aaa;padding:12px 8px;min-width:180px;">
                                    <div style="font-size:0.97rem;margin-bottom:6px;">OR No.:</div>
                                    <input class="form1-01-input" type="text" name="or_no"
                                        value="{{ $form['or_no'] ?? '' }}" style="margin-bottom:6px;" />
                                    <div style="font-size:0.97rem;margin-bottom:6px;">Date:</div>
                                    <input class="form1-01-input" type="date" name="or_date"
                                        value="{{ $form['or_date'] ?? '' }}" style="margin-bottom:6px;" />
                                    <div style="font-size:0.97rem;margin-bottom:6px;">Amount:</div>
                                    <input class="form1-01-input" type="number" name="or_amount" step="0.01"
                                        min="0" inputmode="decimal" value="{{ $form['or_amount'] ?? '' }}"
                                        style="margin-bottom:6px;" />
                                    <div style="font-size:0.97rem;margin-bottom:6px;">Collecting Officer</div>
                                </div>
                            </div>
                            <div style="text-align:center;font-size:0.97rem;margin-top:8px;">THIS FORM IS NOT FOR SALE
                                AND CAN BE REPRODUCED</div>

                            <fieldset style="margin-top:16px;">
                                <legend>EXAMINATION ADMISSION SLIP</legend>
                                <div class="form-field" style="margin-bottom:8px;">TO: THE CHAIRPERSON, Radio
                                    Operators Examination Committee</div>
                                <div class="form-field" style="margin-bottom:8px;">Please admit Mr. / Ms. <input
                                        class="form1-01-input" type="text" name="admit_name"
                                        value="{{ $form['admit_name'] ?? '' }}" style="max-width:320px;">, with
                                    mailing address at <input class="form1-01-input" type="text"
                                        name="mailing_address" value="{{ $form['mailing_address'] ?? '' }}"
                                        style="max-width:420px;"></div>
                                <div class="form-field" style="margin-bottom:8px;">in the examination for <input
                                        class="form1-01-input" type="text" name="exam_for"
                                        style="max-width:500px;"></div>
                                <div class="form-grid-3">
                                    <div class="form-field"><label class="form-label">Place of Exam:</label><input
                                            class="form1-01-input" type="text" name="place_of_exam"
                                            value="{{ $form['place_of_exam'] ?? '' }}"></div>
                                    <div class="form-field"><label class="form-label">Date of Exam
                                            (mm/dd/yy):</label><input class="form1-01-input" type="date"
                                            name="admission_date" value="{{ $form['admission_date'] ?? '' }}">
                                    </div>
                                    <div class="form-field"><label class="form-label">Time of Exam:</label><input
                                            class="form1-01-input" type="text" name="time_of_exam"
                                            value="{{ $form['time_of_exam'] ?? '' }}"></div>
                                </div>
                                <div style="display:flex;gap:16px;align-items:flex-end;margin-top:8px;">
                                    <div style="flex:1;"></div>
                                    <div style="min-width:180px;text-align:center;">
                                        <div style="border-top:1px solid #999;padding-top:6px;">Authorized Officer
                                        </div>
                                    </div>
                                    <div style="min-width:160px;border:1px dashed #bbb;padding:8px;text-align:center;">
                                        <div style="font-size:0.95rem;">1"x1" ID<br>Picture</div>
                                    </div>
                                </div>
                                <div class="form1-01-note" style="margin-top:12px;">INSTRUCTIONS TO THE EXAMINEE:
                                </div>
                                <ol style="margin:4px 0 0 20px;font-size:0.97rem;">
                                    <li>Examinees shall present this Admission Slip and any valid government issued ID
                                        with picture or School ID, for students. (No Admission Slip and ID, No Exam.)
                                    </li>
                                    <li>Examinees who are late for more than 30 minutes shall not be allowed to take the
                                        examination.</li>
                                    <li>Request for re-schedule of examination must be filed at least 1 week before the
                                        date of examination.</li>
                                    <li>In case of suspension / cancellation of work in government offices due to force
                                        majeure, the scheduled regular examination shall be conducted on the next
                                        regular working day.</li>
                                </ol>
                                <div style="text-align:center;font-size:0.97rem;margin-top:8px;">THIS FORM IS NOT FOR
                                    SALE AND CAN BE REPRODUCED</div>
                            </fieldset>
                        </fieldset>
                    </section> --}}
                </div>
            </div>
        </form>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                (function() {
                    const stepsOrder = ['application', 'applicant', 'assistance']; // declaration removed
                    const stepsList = document.getElementById('stepsList01');
                    const form = document.getElementById('form101');
                    const validationLink = document.getElementById('validationLink');
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

                        stepsList.querySelectorAll('.step-item').forEach(li => {
                            li.classList.toggle('active', li.dataset.step === step);
                        });
                        document.querySelectorAll('.step-content').forEach(s => {
                            s.classList.toggle('active', s.id === `step-${step}`);
                        });
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

                    function validateGroups(section) {
                        let ok = true;
                        section.querySelectorAll('[data-require-one]').forEach(group => {
                            const selector = group.getAttribute('data-require-one');
                            const items = group.querySelectorAll(selector);
                            const anyChecked = Array.from(items).some(el => (el.type === 'checkbox' || el
                                .type ===
                                'radio') ? el.checked : Boolean(el.value));
                            if (!anyChecked) ok = false;
                        });
                        return ok;
                    }

                    function validateActiveStep() {
                        const step = currentStep();
                        const section = document.getElementById(`step-${step}`);
                        let valid = true;

                        // Check required fields
                        section.querySelectorAll('input[required], select[required], textarea[required]').forEach(
                            el => {
                                if (el.type === 'radio') {
                                    const name = el.name;
                                    const group = section.querySelectorAll(`input[type=radio][name="${name}"]`);
                                    const anyChecked = Array.from(group).some(r => r.checked);
                                    if (!anyChecked) valid = false;
                                } else if (!el.value) {
                                    valid = false;
                                }
                            });

                        // Special validation for exam type selection in application step
                        if (step === 'application') {
                            const examTypeSelected = section.querySelector('input[name="exam_type"]:checked');
                            if (!examTypeSelected) {
                                valid = false;
                            }
                        }

                        // Note: All exam types are now in a single radio group, so no group validation needed

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

                        // Only allow navigation to application step if checkbox not checked
                        if (!warningCheckbox.checked && li.dataset.step !== 'application') {
                            alert('Please check the agreement checkbox first before proceeding.');
                            return;
                        }

                        showStep(li.dataset.step);
                    });

                    document.querySelectorAll('[data-next]').forEach(btn => btn.addEventListener('click', () => {
                        if (validateActiveStep()) {
                            go(1);
                        } else {
                            // Show validation error for current step
                            const currentStepName = currentStep();
                            let errorMessage = 'Please complete all required fields before proceeding.';

                            if (currentStepName === 'application') {
                                errorMessage = 'Please select an exam type before proceeding.';
                            }

                            const errorDiv = document.createElement('p');
                            errorDiv.className = 'text-red text-sm mt-1 text-right';
                            errorDiv.textContent = errorMessage;

                            let x = document.querySelector(`#step-${currentStepName} .step-actions`)
                                .parentElement
                            const existingError = x.querySelector('p.text-red');

                            if (existingError) existingError.remove();
                            document.querySelector(`#step-${currentStepName} .step-actions`)
                                .parentElement
                                .appendChild(errorDiv);;
                        }
                    }));
                    document.querySelectorAll('[data-prev]').forEach(btn => btn.addEventListener('click', () => {
                        if (!warningCheckbox.checked) {
                            alert('Please check the agreement checkbox first before proceeding.');
                            return;
                        }
                        go(-1);
                    }));

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
                            if (!validateActiveStep()) {
                                // Show validation error message
                                const errorDiv = document.createElement('p');
                                errorDiv.className = 'text-red text-sm mt-1';
                                errorDiv.textContent =
                                    'Please complete all required fields before proceeding.';
                                const existingError = document.querySelector('.step-actions .text-red');
                                if (existingError) existingError.remove();
                                document.querySelector('.step-actions').appendChild(errorDiv);
                                return;
                            }
                            try {
                                if (window.grecaptcha) {
                                    const captchaResponse = window.grecaptcha.getResponse();
                                    if (!captchaResponse) {
                                        const errorDiv = document.createElement('p');
                                        errorDiv.className = 'text-red text-sm mt-1';
                                        errorDiv.textContent =
                                            'Please complete the CAPTCHA before proceeding.';
                                        document.querySelector('.g-recaptcha').parentNode.appendChild(
                                            errorDiv);
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
                            //         localStorage.setItem('active-form', '1-01');
                            //         if (validationLink) {
                            //             const token = json && json.form_token ? json.form_token : (localStorage
                            //                 .getItem('form_token') || '');
                            //             const url = new URL(validationLink.href, window.location.origin);
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

                    // Toggle enable/disable for needs_details based on Yes/No selection
                    const needsYes = document.getElementById('needs_yes');
                    const needsNo = document.getElementById('needs_no');
                    const needsDetails = document.getElementById('needs_details');

                    function updateNeedsDetails() {
                        if (!needsDetails) return;
                        const isYes = !!(needsYes && needsYes.checked);
                        needsDetails.disabled = !isYes;
                        if (!isYes) {
                            needsDetails.value = '';
                        }
                    }
                    if (needsYes) needsYes.addEventListener('change', updateNeedsDetails);
                    if (needsNo) needsNo.addEventListener('change', updateNeedsDetails);
                    // Initialize state on load (handles prefilled values)
                    updateNeedsDetails();

                    showStep(stepsOrder[0]);
                })();

                //Course taken - Other option
                const courseSelect = document.getElementById('course_taken');
                const otherInput = document.getElementById('other_course');
                console.log(courseSelect, otherInput);

                function toggleOtherInput() {
                    console.log(1);
                    if (courseSelect.value === 'Other') {
                        otherInput.style.display = 'block';
                        otherInput.required = true;
                    } else {
                        otherInput.style.display = 'none';
                        otherInput.required = false;
                        otherInput.value = '';
                    }
                }

                // Run when loaded + when changed
                toggleOtherInput();
                courseSelect.addEventListener('change', toggleOtherInput);

                // Filter course options based on examination type
                // Store all original course options
                let allCourseOptions = [];
                let initiallySelectedValue = '';

                function storeOriginalOptions() {
                    allCourseOptions = Array.from(courseSelect.options).map(option => ({
                        value: option.value,
                        text: option.text.trim(), // Trim whitespace
                        html: option.innerHTML, // Store HTML to preserve formatting
                        selected: option.selected // Store initial selected state
                    }));

                    // Store the initially selected value
                    const selectedOption = allCourseOptions.find(opt => opt.selected);
                    if (selectedOption) {
                        initiallySelectedValue = selectedOption.value;
                    }
                }

                // Store options on page load
                storeOriginalOptions();

                // Courses allowed for radiotelegraphy
                const radiotelegraphyCourses = [
                    'General Radio Communication Operator (GRCO)',
                    'Industrial Electronics Technician Course (IETC)',
                    'Communications Technician Course (CTC)',
                    'Bachelor of Science in Avionics Technology (BS AVTECH)',
                    'Bachelor of Science in Electronics and Communications Engineering / Bachelor of Science in Electronics Engineering (BS ECE)'
                ];

                // Courses allowed for amateur
                const amateurCourses = [
                    'Radio Enthusiast',
                    'Registered ECE or Commercial Operator',
                    'Licensed Amateur (for upgrading)'
                ];

                // Courses allowed for restricted radiotelephone
                const restrictedRadiotelephoneCourses = [
                    'Commercial Pilot',
                    'Student Pilot'
                ];

                function filterCourseOptions() {
                    const examTypeRadios = document.querySelectorAll('input[name="exam_type"]');
                    const selectedExamType = Array.from(examTypeRadios).find(radio => radio.checked);

                    // Store currently selected value before filtering
                    // Use current value if set, otherwise use the initially selected value
                    let currentSelectedValue = courseSelect.value || initiallySelectedValue;

                    // Clear current options
                    courseSelect.innerHTML = '';

                    // Determine which courses to show based on exam type
                    let allowedCourses = [];
                    let isFilteredCategory = false;

                    if (selectedExamType) {
                        if (selectedExamType.value.includes('rtg')) {
                            // Radiotelegraphy selected
                            isFilteredCategory = true;
                            allowedCourses = radiotelegraphyCourses;
                        } else if (selectedExamType.value.includes('phn')) {
                            // Radiotelephony selected - same courses as Radiotelegraphy
                            isFilteredCategory = true;
                            allowedCourses = radiotelegraphyCourses;
                        } else if (selectedExamType.value.startsWith('class_')) {
                            // Amateur selected (all amateur exam types start with "class_")
                            isFilteredCategory = true;
                            allowedCourses = amateurCourses;
                        } else if (selectedExamType.value.includes('rroc')) {
                            // Restricted Radiotelephone selected
                            isFilteredCategory = true;
                            allowedCourses = restrictedRadiotelephoneCourses;
                        }
                    }

                    if (isFilteredCategory) {
                        // Filtered exam type selected - show only allowed courses
                        // Add "Select Course" option
                        const defaultOption = document.createElement('option');
                        defaultOption.value = '';
                        defaultOption.textContent = 'Select Course';
                        courseSelect.appendChild(defaultOption);

                        // Add allowed courses
                        allCourseOptions.forEach(option => {
                            if (allowedCourses.includes(option.value)) {
                                const newOption = document.createElement('option');
                                newOption.value = option.value;
                                // Use innerHTML to preserve any formatting (like line breaks)
                                newOption.innerHTML = option.html || option.text;
                                // Preserve selection if it was the selected value
                                if (currentSelectedValue === option.value) {
                                    newOption.selected = true;
                                }
                                courseSelect.appendChild(newOption);
                            }
                        });

                        // Add "Other" option if it was in the original list
                        const otherOption = allCourseOptions.find(opt => opt.value === 'Other');
                        if (otherOption) {
                            const newOption = document.createElement('option');
                            newOption.value = 'Other';
                            newOption.textContent = 'Other';
                            if (currentSelectedValue === 'Other') {
                                newOption.selected = true;
                            }
                            courseSelect.appendChild(newOption);
                        }

                        // Clear selection if the previously selected value is not in the filtered list
                        if (currentSelectedValue && !allowedCourses.includes(currentSelectedValue) &&
                            currentSelectedValue !== 'Other') {
                            courseSelect.value = '';
                            // Also clear the other_course input if it was visible
                            if (otherInput) {
                                otherInput.value = '';
                                otherInput.style.display = 'none';
                                otherInput.required = false;
                            }
                        }
                    } else {
                        // Other exam type selected - show all courses
                        allCourseOptions.forEach(option => {
                            const newOption = document.createElement('option');
                            newOption.value = option.value;
                            // Use innerHTML to preserve formatting
                            newOption.innerHTML = option.html || option.text;
                            // Preserve selection if it was the selected value
                            if (currentSelectedValue === option.value) {
                                newOption.selected = true;
                            }
                            courseSelect.appendChild(newOption);
                        });
                    }

                    // Re-trigger the toggleOtherInput to handle "Other" option visibility
                    toggleOtherInput();
                }

                // Listen for changes on exam type radio buttons
                document.querySelectorAll('input[name="exam_type"]').forEach(radio => {
                    radio.addEventListener('change', filterCourseOptions);
                });

                // Initialize on page load if an exam type is already selected
                filterCourseOptions();
            });
        </script>
    </main>
</x-layout>
