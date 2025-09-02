<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Application for Radio Operator Certificate (Form 1-02)</title>
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
        <div><b>Form No.</b> <u>NTC 1-02</u></div>
        <div><b>Revision No.</b> <u>02</u></div>
        <div><b>Revision Date</b> <u>03/31/2023</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container" id="form102">
      <div class="form1-01-header">APPLICATION FOR RADIO OPERATOR CERTIFICATE</div>
      <div class="form1-01-note">
        <strong>NOTE:</strong> The system asks for additional info when applicant is a minor.
          </div>
      <div class="form1-01-warning">
        <div class="form1-01-warning-title">WARNING:</div>
        Ensure that all details in the name and date of birth fields are correct. We cannot edit those fields on site and you will need to set a new appointment.
        <div class="form1-01-agree">
          <label><input type="checkbox"/> I agree / Malinaw sa akin</label>
        </div>
      </div>

      <div class="form-layout">
        <aside class="steps-sidebar">
          <div class="steps-sidebar-header">Individual Appointment</div>
          <ul class="steps-list" id="stepsList02">
            <li class="step-item active" data-step="personal">Personal Information <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="application">Application Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="exam">Exam/Seminar Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="declaration">Declaration <span class="step-status">&nbsp;</span></li>
          </ul>
        </aside>

        <div>
          <section class="step-content active" id="step-personal">
            <fieldset>
              <legend>Applicant's Details</legend>
              <div class="form-grid-3">
                <div class="form-field">
                  <label class="form-label">Last Name</label>
                  <input class="form1-01-input" type="text" name="last_name" required>
                </div>
                <div class="form-field">
                  <label class="form-label">First Name</label>
                  <input class="form1-01-input" type="text" name="first_name" required>
                </div>
                <div class="form-field">
                  <label class="form-label">Middle Name</label>
                  <input class="form1-01-input" type="text" name="middle_name">
                </div>
              </div>
              <div class="form-grid-3">
                <div class="form-field">
                  <label class="form-label">Date of Birth</label>
                  <input class="form1-01-input" type="date" name="dob" required>
                </div>
                <div class="form-field">
                  <label class="form-label">Weight (kg)</label>
                  <input class="form1-01-input" type="text" name="weight">
                </div>
                <div class="form-field">
                  <label class="form-label">Height (cm)</label>
                  <input class="form1-01-input" type="text" name="height">
                </div>
              </div>
              <div class="form-grid-3">
                <div class="form-field">
                  <label class="form-label">Sex</label>
                  <div class="inline-radio">
                    <label><input type="radio" name="sex" value="male" required> Male</label>
                    <label><input type="radio" name="sex" value="female"> Female</label>
                  </div>
                </div>
                <div class="form-field">
                  <label class="form-label">Nationality</label>
                  <input class="form1-01-input" type="text" name="nationality">
                </div>
                <div class="form-field">
                  <label class="form-label">Employment Status</label>
                  <div class="inline-radio">
                    <label><input type="radio" name="employment_status" value="employed"> Employed</label>
                    <label><input type="radio" name="employment_status" value="unemployed"> Unemployed</label>
                  </div>
                </div>
              </div>
              <div class="form-grid-2">
                <div class="form-field">
                  <label class="form-label">If Employed</label>
                  <div class="inline-radio">
                    <label><input type="radio" name="employment_type" value="local"> Local</label>
                    <label><input type="radio" name="employment_type" value="foreign"> Foreign</label>
                  </div>
                </div>
              </div>
              <div class="form-grid-2">
                <div class="form-field">
                  <label class="form-label">Unit/Rm/House/Bldg No.</label>
                  <input class="form1-01-input" type="text" name="unit_no">
                </div>
                <div class="form-field">
                  <label class="form-label">Street</label>
                  <input class="form1-01-input" type="text" name="street">
                </div>
              </div>
              <div class="form-grid-2">
                <div class="form-field">
                  <label class="form-label">Barangay</label>
                  <input class="form1-01-input" type="text" name="barangay">
                </div>
                <div class="form-field">
                  <label class="form-label">City/Municipality</label>
                  <input class="form1-01-input" type="text" name="city">
                </div>
              </div>
              <div class="form-grid-2">
                <div class="form-field">
                  <label class="form-label">Province</label>
                  <input class="form1-01-input" type="text" name="province">
                </div>
                <div class="form-field">
                  <label class="form-label">Zip Code</label>
                  <input class="form1-01-input" type="text" name="zip_code">
                </div>
              </div>
              <div class="form-grid-2">
                <div class="form-field">
                  <label class="form-label">Contact Number</label>
                  <input class="form1-01-input" type="text" name="contact_number" required>
                </div>
                <div class="form-field">
                  <label class="form-label">Email Address</label>
                  <input class="form1-01-input" type="email" name="email" required>
                </div>
          </div>
              <div class="step-actions">
                <button type="button" class="btn-primary" data-next>Next</button>
        </div>
      </fieldset>
          </section>

          <section class="step-content" id="step-application">
            <fieldset class="fieldset-compact">
              <legend>Type of Application & Certificate</legend>
              <div class="form-grid-2">
                <div class="form-field" data-require-one="input[type=checkbox]">
                  <label class="form-label">Type of Application</label>
                  <label><input type="checkbox" name="application_type" value="new"> NEW</label>
                  <label><input type="checkbox" name="application_type" value="renewal"> RENEWAL</label>
                  <label><input type="checkbox" name="application_type" value="modification"> MODIFICATION due to</label>
                  <input class="form1-01-input" type="text" name="modification_reason" placeholder="Reason (if modification)">
                  <label class="form-label">No. of Years</label>
                  <input class="form1-01-input" type="text" name="years" placeholder="e.g., 2">
                </div>
                <div class="form-field" data-require-one="input[type=checkbox]">
                  <label class="form-label">Type of Certificate</label>
            <label><input type="checkbox" name="certificate_type" value="1RTG"> 1RTG</label>
            <label><input type="checkbox" name="certificate_type" value="2RTG"> 2RTG</label>
            <label><input type="checkbox" name="certificate_type" value="3RTG"> 3RTG</label>
            <label><input type="checkbox" name="certificate_type" value="1PHN"> 1PHN</label>
            <label><input type="checkbox" name="certificate_type" value="2PHN"> 2PHN</label>
            <label><input type="checkbox" name="certificate_type" value="3PHN"> 3PHN</label>
            <label><input type="checkbox" name="certificate_type" value="SROP"> SROP</label>
            <label><input type="checkbox" name="certificate_type" value="RROC-Land Mobile"> RROC-Land Mobile (RLM)</label>
            <label><input type="checkbox" name="certificate_type" value="RROC-Aircraft"> RROC-Aircraft</label>
            <label><input type="checkbox" name="certificate_type" value="GROC"> GROC (Government)</label>
            <label><input type="checkbox" name="certificate_type" value="TP RROC-Aircraft"> TP RROC-Aircraft (Foreign Pilot)</label>
                  <label><input type="checkbox" name="certificate_type" value="others"> OTHERS, specify</label>
                  <input class="form1-01-input" type="text" name="others_specify" placeholder="Specify if others">
          </div>
        </div>
              <div class="step-actions">
                <button type="button" class="btn-secondary" data-prev>Back</button>
                <button type="button" class="btn-primary" data-next>Next</button>
        </div>
      </fieldset>
          </section>

          <section class="step-content" id="step-exam">
            <fieldset class="fieldset-compact">
              <legend>Exam/Seminar Details</legend>
              <div class="form-grid-3">
                <div class="form-field">
                  <label class="form-label">Place of Exam/Seminar</label>
                  <input class="form1-01-input" type="text" name="exam_place" required>
          </div>
                <div class="form-field">
                  <label class="form-label">Date</label>
                  <input class="form1-01-input" type="date" name="exam_date" required>
          </div>
                <div class="form-field">
                  <label class="form-label">Rating</label>
                  <input class="form1-01-input" type="text" name="rating">
          </div>
        </div>
              <div class="step-actions">
                <button type="button" class="btn-secondary" data-prev>Back</button>
                <button type="button" class="btn-primary" data-next>Next</button>
        </div>
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
              <div class="step-actions">
                <button type="button" class="btn-secondary" data-prev>Back</button>
                <button class="form1-01-btn" type="button" id="validateBtn02">Proceed to Validation</button>
        </div>
      </fieldset>
          </section>
        </div>
      </div>
    </form>
    <a id="validationLink02" href="{{ route('forms.1-01.validation') }}" style="display:none;">Validation</a>
    <script>
      (function() {
        const stepsOrder = ['personal','application','exam','declaration'];
        const stepsList = document.getElementById('stepsList02');
        const form = document.getElementById('form102');
        const validationLink02 = document.getElementById('validationLink02');

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

        const validateBtn = document.getElementById('validateBtn02');
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
        localStorage.setItem('form1-02-data', JSON.stringify(entries));
        localStorage.setItem('active-form', '1-02');
        if (validationLink02) {
          window.location.href = validationLink02.href;
        }
          });
        }

        showStep(stepsOrder[0]);
      })();
    </script>
  </main>
</body>
</html> 