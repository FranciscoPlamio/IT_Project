<x-layout :title="'Complaint on Text Message (Form 1-25)'" :form-header="['formNo' => 'NTC 1-26', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']">

    <main>
        <form class="form1-01-container" id="form125text" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">COMPLAINT ON TEXT MESSAGE</div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList25text">
                        <li class="step-item active" data-step="affiant">Affiant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="messages">Text Messages <span class="step-status">&nbsp;</span>
                        </li>
                        <li class="step-item" data-step="complaint">Complaint Against / Undertaking <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-affiant">
                        <fieldset class="fieldset-compact">
                            <legend>Affiant Information</legend>
                            <div class="inline-text-container">
                                I, <input class="inline-input-name" type="text" name="affiant_name" required
                                    value="{{ old('affiant_name', $form['affiant_name'] ?? '') }}">, of
                                legal age, <input class="inline-input-civil-status" type="text" name="civil_status"
                                    placeholder="single/married"
                                    value="{{ old('civil_status', $form['civil_status'] ?? '') }}">, Filipino, with
                                residence at <input class="inline-input-address" type="text" name="residence_address"
                                    required value="{{ old('residence_address', $form['residence_address'] ?? '') }}">
                                after
                                having been sworn to in accordance with law, depose and state, that:
                            </div>
                            @error('affiant_name')
                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                            @enderror
                            @error('civil_status')
                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                            @enderror
                            @error('residence_address')
                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-messages">
                        <fieldset class="fieldset-compact">
                            <legend>Complaint Details</legend>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Date/Time Received</th>
                                            <th>Cell Phone No.</th>
                                            <th>MESSAGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="table-input" type="datetime-local"
                                                    name="message1_datetime"
                                                    value="{{ old('message1_datetime', $form['message1_datetime'] ?? '') }}">
                                                @error('message1_datetime')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td>
                                                <input class="table-input" type="text" name="message1_phone"
                                                    placeholder="Cell phone number"
                                                    value="{{ old('message1_phone', $form['message1_phone'] ?? '') }}">
                                                @error('message1_phone')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                            <td>
                                                <textarea class="table-input" name="message1_content" rows="3" placeholder="Message content">{{ old('message1_content', $form['message1_content'] ?? '') }}</textarea>
                                                @error('message1_content')
                                                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="table-input" type="datetime-local"
                                                    name="message2_datetime"
                                                    value="{{ old('message2_datetime', $form['message2_datetime'] ?? '') }}">
                                            </td>
                                            <td>
                                                <input class="table-input" type="text" name="message2_phone"
                                                    placeholder="Cell phone number"
                                                    value="{{ old('message2_phone', $form['message2_phone'] ?? '') }}">
                                            </td>
                                            <td>
                                                <textarea class="table-input" name="message2_content" rows="3" placeholder="Message content">{{ old('message2_content', $form['message2_content'] ?? '') }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="table-input" type="datetime-local"
                                                    name="message3_datetime"
                                                    value="{{ old('message3_datetime', $form['message3_datetime'] ?? '') }}">
                                            </td>
                                            <td>
                                                <input class="table-input" type="text" name="message3_phone"
                                                    placeholder="Cell phone number"
                                                    value="{{ old('message3_phone', $form['message3_phone'] ?? '') }}">
                                            </td>
                                            <td>
                                                <textarea class="table-input" name="message3_content" rows="3" placeholder="Message content">{{ old('message3_content', $form['message3_content'] ?? '') }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="table-input" type="datetime-local"
                                                    name="message4_datetime"
                                                    value="{{ old('message4_datetime', $form['message4_datetime'] ?? '') }}">
                                            </td>
                                            <td>
                                                <input class="table-input" type="text" name="message4_phone"
                                                    placeholder="Cell phone number"
                                                    value="{{ old('message4_phone', $form['message4_phone'] ?? '') }}">
                                            </td>
                                            <td>
                                                <textarea class="table-input" name="message4_content" rows="3" placeholder="Message content">{{ old('message4_content', $form['message4_content'] ?? '') }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="table-input" type="datetime-local"
                                                    name="message5_datetime"
                                                    value="{{ old('message5_datetime', $form['message5_datetime'] ?? '') }}">
                                            </td>
                                            <td>
                                                <input class="table-input" type="text" name="message5_phone"
                                                    placeholder="Cell phone number"
                                                    value="{{ old('message5_phone', $form['message5_phone'] ?? '') }}">
                                            </td>
                                            <td>
                                                <textarea class="table-input" name="message5_content" rows="3" placeholder="Message content">{{ old('message5_content', $form['message5_content'] ?? '') }}</textarea>
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

                    <section class="step-content" id="step-complaint">
                        <fieldset class="fieldset-compact">
                            <legend>Complaint Against</legend>
                            <div style="font-size:0.97rem;margin-bottom:12px;">
                                In view of the foregoing, I am filing a complaint against <input class="form1-01-input"
                                    type="text" name="complaint_against" required
                                    value="{{ old('complaint_against', $form['complaint_against'] ?? '') }}"
                                    style="display:inline-block;width:300px;margin:0 8px;"
                                    placeholder="Name of party being complained against">.
                            </div>
                            @error('complaint_against')
                                <p class="text-red text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </fieldset>

                        <fieldset class="fieldset-compact">
                            <legend>Undertaking</legend>
                            <div class="form1-01-declaration">
                                That I hereby undertake to hold free from any responsibility or shall not hold NTC
                                liable for whatever claims, loss or damages any party may institute by reason of NTC's
                                action on sending warning messages to complained number.
                            </div>
                        </fieldset>
                        <div class="step-actions">
                            <button class="form1-01-btn" type="button" id="validateBtn">Proceed to
                                Validation</button>
                        </div>
                    </section>
                </div>
            </div>
        </form>

        <script>
            (function() {
                const stepsOrder = ['affiant', 'messages', 'complaint', 'undertaking'];
                const stepsList = document.getElementById('stepsList25text');
                const form = document.getElementById('form125text');

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
                        form.submit();
                        if (!validateActiveStep()) return;


                    });
                }
                showStep(stepsOrder[0]);
            })();
        </script>
    </main>
</x-layout>
