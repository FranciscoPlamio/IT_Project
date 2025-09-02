<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Application for Radio Operator Examination (Form 1-01)</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <header>
    <div class="top-bar">
      <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
      <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>BIR Road, East Triangle, Diliman, Quezon City</span></h1>
      </div>
      
      <!-- form name in the side of the header it may vary depending on the form -->
      <div style="position:absolute;top:20px;right:40px;text-align:right;font-size:0.97rem;">
        <div><b>Form No.</b> <u>NTC 1-01</u></div>
        <div><b>Revision No.</b> <u>03</u></div>
        <div><b>Revision Date</b> <u>03/31/2023</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container" id="form101">
      <div class="form1-01-header">APPLICATION FOR RADIO OPERATOR EXAMINATION</div>

      <div class="form-layout">
        <aside class="steps-sidebar">
          <div class="steps-sidebar-header">Individual Appointment</div>
          <ul class="steps-list" id="stepsList01">
            <li class="step-item active" data-step="application">Application Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="applicant">Applicant Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="assistance">Request for Assistance <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="declaration">Declaration <span class="step-status">&nbsp;</span></li>
          </ul>
        </aside>

        <div>
          <section class="step-content active" id="step-application">
            <fieldset class="fieldset-compact">
              <legend>Instructions</legend>
              <ol style="margin:8px 0 0 20px;font-size:0.97rem;">
                <li>Accomplish this application form properly, in ALL CAPS, handwritten or computer-printed.</li>
                <li>Attach the complete requirements including supporting documents. For the List of requirements, please refer to the <u>NTC Citizen's Charter</u> at the NTC website: <a href="https://ntc.gov.ph" target="_blank" rel="noopener">ntc.gov.ph</a></li>
                <li>Check (✓) appropriate box. Indicate "N/A" for items not applicable.</li>
              </ol>
            </fieldset>
            <fieldset class="fieldset-compact">
              <legend>Radiotelegraphy</legend>
              <div class="form-field" data-require-one="input[type=checkbox]">
                <label><input type="checkbox" name="rtg" value="1rtg_e1256_code25"> 1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)</label>
                <label><input type="checkbox" name="rtg" value="1rtg_code25"> 1RTG - Code (25/20 wpm)</label>
                <label><input type="checkbox" name="rtg" value="2rtg_e1256_code16"> 2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)</label>
                <label><input type="checkbox" name="rtg" value="2rtg_code16"> 2RTG - Code (16wpm)</label>
                <label><input type="checkbox" name="rtg" value="3rtg_e125_code16"> 3RTG - Elements 1, 2, 5 & Code (16 wpm)</label>
                <label><input type="checkbox" name="rtg" value="3rtg_code16"> 3RTG - Code (16wpm)</label>
              </div>
            </fieldset>
            <fieldset class="fieldset-compact">
              <legend>Amateur</legend>
              <div class="form-field" data-require-one="input[type=checkbox]">
                <label><input type="checkbox" name="amateur" value="class_a_e8910_code5"> Class A - Elements 8, 9, 10 & Code (5 wpm)</label>
                <label><input type="checkbox" name="amateur" value="class_a_code5_only"> Class A - Code (5 wpm) Only</label>
                <label><input type="checkbox" name="amateur" value="class_b_e567"> Class B - Elements 5, 6 & 7</label>
                <label><input type="checkbox" name="amateur" value="class_b_e2"> Class B - Element 2</label>
                <label><input type="checkbox" name="amateur" value="class_c_e234"> Class C - Elements 2, 3 & 4</label>
                <label><input type="checkbox" name="amateur" value="class_d_e2"> Class D - Element 2</label>
              </div>
            </fieldset>
            <div class="form-grid-3">
              <fieldset class="fieldset-compact">
                <legend>Radiotelephony</legend>
                <div class="form-field" data-require-one="input[type=checkbox]">
                  <label><input type="checkbox" name="rphn" value="1phn_e1234"> 1PHN - Elements 1, 2, 3 & 4</label>
                  <label><input type="checkbox" name="rphn" value="2phn_e123"> 2PHN - Elements 1, 2 & 3</label>
                  <label><input type="checkbox" name="rphn" value="3phn_e12"> 3PHN - Elements 1 & 2</label>
                </div>
              </fieldset>
              <fieldset class="fieldset-compact">
                <legend>Restricted Radiotelephone</legend>
                <div class="form-field" data-require-one="input[type=checkbox]">
                  <label><input type="checkbox" name="rroc" value="rroc_aircraft_e1"> RROC - Aircraft - Element 1</label>
                </div>
              </fieldset>
              <div class="form-field">
                <label class="form-label">DATE OF EXAM (mm/dd/yy)</label>
                <input class="form1-01-input" type="date" name="date_of_exam">
              </div>
            </div>
            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button></div>
          </section>

          <section class="step-content" id="step-applicant">
            <fieldset>
              <legend>Applicant's Details</legend>
              <div class="form-grid-3">
                <div class="form-field"><label class="form-label">Last Name</label><input class="form1-01-input" type="text" name="last_name" required></div>
                <div class="form-field"><label class="form-label">First Name</label><input class="form1-01-input" type="text" name="first_name" required></div>
                <div class="form-field"><label class="form-label">Middle Name</label><input class="form1-01-input" type="text" name="middle_name"></div>
              </div>
              <div class="form-grid-3">
                <div class="form-field"><label class="form-label">Date of Birth (mm/dd/yy)</label><input class="form1-01-input" type="date" name="dob" required></div>
                <div class="form-field"><label class="form-label">Sex</label><div class="inline-radio"><label><input type="radio" name="sex" value="male" required> Male</label> <label><input type="radio" name="sex" value="female"> Female</label></div></div>
                <div class="form-field"><label class="form-label">Nationality</label><input class="form1-01-input" type="text" name="nationality"></div>
              </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Unit/Rm/House/Bldg No.</label><input class="form1-01-input" type="text" name="unit"></div>
                <div class="form-field"><label class="form-label">Street</label><input class="form1-01-input" type="text" name="street"></div>
              </div>
              <div class="form-grid-3">
                <div class="form-field"><label class="form-label">Barangay</label><input class="form1-01-input" type="text" name="barangay"></div>
                <div class="form-field"><label class="form-label">City/Municipality</label><input class="form1-01-input" type="text" name="city"></div>
                <div class="form-field"><label class="form-label">Province</label><input class="form1-01-input" type="text" name="province"></div>
              </div>
              <div class="form-grid-3">
                <div class="form-field"><label class="form-label">Zip Code</label><input class="form1-01-input" type="text" name="zip_code"></div>
                <div class="form-field"><label class="form-label">Contact Number</label><input class="form1-01-input" type="text" name="contact_number"></div>
                <div class="form-field"><label class="form-label">Email Address</label><input class="form1-01-input" type="email" name="email"></div>
              </div>
              <div class="form-field"><label class="form-label">School Attended</label><input class="form1-01-input" type="text" name="school_attended"></div>
              <div class="form-grid-3">
                <div class="form-field"><label class="form-label">Course Taken</label><input class="form1-01-input" type="text" name="course_taken"></div>
                <div class="form-field"><label class="form-label">Year Graduated</label><input class="form1-01-input" type="text" name="year_graduated"></div>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-assistance">
            <fieldset class="fieldset-compact">
              <legend>Applicant's Request for Assistance</legend>
              <div class="form-grid-3">
                <div class="form-field" style="grid-column:span 1;">
                  <label class="form-label">Do you have any special needs and/or requests during the examination?</label>
                  <div class="inline-radio"><label><input type="radio" name="needs" value="yes"> Yes</label> <label><input type="radio" name="needs" value="no"> No</label></div>
                </div>
                <div class="form-field" style="grid-column:span 2;">
                  <label class="form-label">If yes, please indicate your specific needs and/or request.</label>
                  <input class="form1-01-input" type="text" name="needs_details">
                </div>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-declaration">
            <fieldset>
              <legend>DECLARATION</legend>
              <div class="form1-01-declaration">
                I hereby declare that all the above entries are true and correct. Under the Revised Penal Code, I shall be held liable for any willful false statement(s) or misrepresentation(s) made in this application form that may serve as a valid ground for the denial of this application and/or cancellation/revocation of the permit issued/granted. Further, I am freely giving full consent for the collection and processing of personal information in accordance with Republic Act No. 10173, Data Privacy Act of 2012.
              </div>
              <div class="form1-01-signature-row">
                <div class="form1-01-signature-col">
                  <input class="signature-line-input" type="text" name="signature_name" placeholder="Signature over Printed Name of Applicant" />
                  <input class="form1-01-input" type="date" name="date_accomplished" placeholder="Date Accomplished" style="max-width:180px;width:100%;" />
                </div>
                <div class="form1-01-signature-col" style="border:1px dashed #aaa;padding:12px 8px;min-width:180px;">
                  <div style="font-size:0.97rem;margin-bottom:6px;">OR No.:</div>
                  <input class="form1-01-input" type="text" name="or_no" style="margin-bottom:6px;" />
                  <div style="font-size:0.97rem;margin-bottom:6px;">Date:</div>
                  <input class="form1-01-input" type="date" name="or_date" style="margin-bottom:6px;" />
                  <div style="font-size:0.97rem;margin-bottom:6px;">Amount:</div>
                  <input class="form1-01-input" type="text" name="or_amount" style="margin-bottom:6px;" />
                  <div style="font-size:0.97rem;margin-bottom:6px;">Collecting Officer</div>
                </div>
              </div>
              <div style="text-align:center;font-size:0.97rem;margin-top:8px;">THIS FORM IS NOT FOR SALE AND CAN BE REPRODUCED</div>

              <fieldset style="margin-top:16px;">
                <legend>EXAMINATION ADMISSION SLIP</legend>
                <div class="form-field" style="margin-bottom:8px;">TO: THE CHAIRPERSON, Radio Operators Examination Committee</div>
                <div class="form-field" style="margin-bottom:8px;">Please admit Mr. / Ms. <input class="form1-01-input" type="text" name="admit_name" style="max-width:320px;">, with mailing address at <input class="form1-01-input" type="text" name="mailing_address" style="max-width:420px;"></div>
                <div class="form-field" style="margin-bottom:8px;">in the examination for <input class="form1-01-input" type="text" name="exam_for" style="max-width:500px;"></div>
                <div class="form-grid-3">
                  <div class="form-field"><label class="form-label">Place of Exam:</label><input class="form1-01-input" type="text" name="place_of_exam"></div>
                  <div class="form-field"><label class="form-label">Date of Exam (mm/dd/yy):</label><input class="form1-01-input" type="date" name="admission_date"></div>
                  <div class="form-field"><label class="form-label">Time of Exam:</label><input class="form1-01-input" type="text" name="time_of_exam"></div>
                </div>
                <div style="display:flex;gap:16px;align-items:flex-end;margin-top:8px;">
                  <div style="flex:1;"></div>
                  <div style="min-width:180px;text-align:center;">
                    <div style="border-top:1px solid #999;padding-top:6px;">Authorized Officer</div>
                  </div>
                  <div style="min-width:160px;border:1px dashed #bbb;padding:8px;text-align:center;">
                    <div style="font-size:0.95rem;">1"x1" ID<br>Picture</div>
                  </div>
                </div>
                <div class="form1-01-note" style="margin-top:12px;">INSTRUCTIONS TO THE EXAMINEE:</div>
                <ol style="margin:4px 0 0 20px;font-size:0.97rem;">
                  <li>Examinees shall present this Admission Slip and any valid government issued ID with picture or School ID, for students. (No Admission Slip and ID, No Exam.)</li>
                  <li>Examinees who are late for more than 30 minutes shall not be allowed to take the examination.</li>
                  <li>Request for re-schedule of examination must be filed at least 1 week before the date of examination.</li>
                  <li>In case of suspension / cancellation of work in government offices due to force majeure, the scheduled regular examination shall be conducted on the next regular working day.</li>
                </ol>
                <div style="text-align:center;font-size:0.97rem;margin-top:8px;">THIS FORM IS NOT FOR SALE AND CAN BE REPRODUCED</div>
              </fieldset>

              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button class="form1-01-btn" type="button" id="validateBtn">Proceed to Validation</button><a id="validationLink" href="{{ route('forms.1-01.validation') }}" style="display:none;">Validation</a></div>
            </fieldset>
          </section>
        </div>
      </div>
    </form>
    <script>
      (function() {
        const stepsOrder = ['application','applicant','assistance','declaration'];
        const stepsList = document.getElementById('stepsList01');
        const form = document.getElementById('form101');
        const validationLink = document.getElementById('validationLink');

        function showStep(step) {
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
            const anyChecked = Array.from(items).some(el => (el.type === 'checkbox' || el.type === 'radio') ? el.checked : Boolean(el.value));
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

        document.querySelectorAll('[data-next]').forEach(btn => btn.addEventListener('click', () => {
          if (validateActiveStep()) go(1);
        }));
        document.querySelectorAll('[data-prev]').forEach(btn => btn.addEventListener('click', () => go(-1)));

        const validateBtn = document.getElementById('validateBtn');
        if (validateBtn) {
          validateBtn.addEventListener('click', () => {
            if (!validateActiveStep()) return;
            const formData = new FormData(form);
            const entries = {};
            for (const [key, value] of formData.entries()) {
              if (value instanceof File) {
                entries[key] = value.name || '';
              } else {
                if (entries[key]) {
                  if (Array.isArray(entries[key])) entries[key].push(value);
                  else entries[key] = [entries[key], value];
                } else {
                  entries[key] = value;
                }
              }
            }
            localStorage.setItem('form1-01-data', JSON.stringify(entries));
            localStorage.setItem('active-form', '1-01');
            if (validationLink) {
              window.location.href = validationLink.href;
            }
          });
        }

        showStep(stepsOrder[0]);
      })();
    </script>
  </main>
</body>
</html> 