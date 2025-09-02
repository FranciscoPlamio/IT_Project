<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Complaint Form (Form 1-25)</title>
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
        <div><b>Form No.</b> <u>NTC 1-25</u></div>
        <div><b>Revision No.</b> <u>02</u></div>
        <div><b>Revision Date</b> <u>03/31/2023</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container" id="form125">
      <div class="form1-01-header">COMPLAINT FORM</div>
      <div class="form1-01-note"><strong>NOTE:</strong> Indicate "N/A" for items not applicable.</div>

      <div class="form-layout">
        <aside class="steps-sidebar">
          <div class="steps-sidebar-header">Individual Appointment</div>
          <ul class="steps-list" id="stepsList25">
            <li class="step-item active" data-step="complainant">Complainant Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="provider">Service Provider <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="complaint">Nature of Complaint <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="details">Complaint Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="documents">Supporting Documents <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="signature">Signature & Date <span class="step-status">&nbsp;</span></li>
          </ul>
        </aside>

        <div>
          <section class="step-content active" id="step-complainant">
            <fieldset>
              <legend>Complainant's Details</legend>
              <div class="form-field">
                <label class="form-label">Name</label>
                <input class="form1-01-input" type="text" name="complainant_name" required>
              </div>
              <div class="form-field">
                <label class="form-label">Postal Address</label>
                <input class="form1-01-input" type="text" name="postal_address" required>
              </div>
              <div class="form-grid-2">
                <div class="form-field">
                  <label class="form-label">Email Address</label>
                  <input class="form1-01-input" type="email" name="email_address">
                </div>
                <div class="form-field">
                  <label class="form-label">Contact Number</label>
                  <input class="form1-01-input" type="text" name="contact_number">
                </div>
              </div>
              <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-provider">
            <fieldset>
              <legend>Particulars of Service Provider</legend>
              <div class="form-field">
                <label class="form-label">Business Name</label>
                <input class="form1-01-input" type="text" name="business_name" required>
              </div>
              <div class="form-field">
                <label class="form-label">Business Address</label>
                <input class="form1-01-input" type="text" name="business_address" required>
              </div>
              <div class="form-field">
                <label class="form-label">Contact Number</label>
                <input class="form1-01-input" type="text" name="provider_contact_number">
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-complaint">
            <fieldset>
              <legend>Nature of Complaint</legend>
              <div class="form-grid-2" data-require-one="input[type=checkbox]">
                <div class="form-field">
                  <label><input type="checkbox" name="complaint_type" value="billing"> Billing Complaint</label>
                  <label><input type="checkbox" name="complaint_type" value="spam"> Spam</label>
                  <label><input type="checkbox" name="complaint_type" value="scam"> Scam</label>
                  <label><input type="checkbox" name="complaint_type" value="fair_use"> Fair Use</label>
                </div>
                <div class="form-field">
                  <label><input type="checkbox" name="complaint_type" value="poor_service"> Poor Service (Technical Service/Customer Service)</label>
                  <label><input type="checkbox" name="complaint_type" value="denial_subscription"> Denial of Subscription Plan</label>
                  <label><input type="checkbox" name="complaint_type" value="others"> Others, please specify:</label>
                  <input class="form1-01-input" type="text" name="complaint_type_others" placeholder="Specify other complaint type">
                </div>
              </div>
              <div class="form-grid-2">
                <div class="form-field">
                  <label class="form-label">Date of incident/transaction</label>
                  <input class="form1-01-input" type="date" name="incident_date" required>
                </div>
                <div class="form-field">
                  <label class="form-label">Time of incident/transaction</label>
                  <input class="form1-01-input" type="time" name="incident_time">
                </div>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-details">
            <fieldset>
              <legend>State Briefly the Details of Complaint</legend>
              <div class="form-field">
                <textarea class="form1-01-input" name="complaint_details" rows="6" style="resize:vertical;width:100%;max-width:none;" placeholder="Please provide detailed information about your complaint..." required></textarea>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-documents">
            <fieldset>
              <legend>Attached Proof/Supporting Documents</legend>
              <div class="form-field">
                <textarea class="form1-01-input" name="supporting_documents" rows="4" style="resize:vertical;width:100%;max-width:none;" placeholder="Please list all supporting documents attached to this complaint..."></textarea>
              </div>
              <fieldset style="margin-top:16px;">
                <legend>Note</legend>
                <div class="form1-01-declaration">
                  Complete information regarding the complaint, with the required supporting documents shall be provided for the Commission to determine the merit of the complaint, otherwise, it may cause delay in, or prevent the Commission from taking action on the complaint. The Commission may endorse the complaint to the concerned government agencies, if warranted. Information provided shall be used only in matters relative to the complaint.
                </div>
              </fieldset>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-signature">
            <fieldset>
              <legend>Signature and Date</legend>
              <div class="form1-01-signature-row">
                <div class="form1-01-signature-col">
                <input class="signature-line-input" type="text" name="signature_name" placeholder="Signature over Printed Name of Applicant" />
                  <input class="form1-01-input" type="date" name="date_accomplished" placeholder="Date Accomplished" style="max-width:180px;width:100%;" required />
                </div>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button class="form1-01-btn" type="button" id="validateBtn25">Proceed to Validation</button></div>
            </fieldset>
          </section>
        </div>
      </div>
    </form>
    <a id="validationLink25" href="{{ route('forms.1-01.validation') }}" style="display:none;">Validation</a>
    <script>
      (function() {
        const stepsOrder = ['complainant','provider','complaint','details','documents','signature'];
        const stepsList = document.getElementById('stepsList25');
        const form = document.getElementById('form125');

        function showStep(step) {
          stepsList.querySelectorAll('.step-item').forEach(li => li.classList.toggle('active', li.dataset.step === step));
          document.querySelectorAll('.step-content').forEach(s => s.classList.toggle('active', s.id === `step-${step}`));
        }
        function currentStep() { const a = stepsList.querySelector('.step-item.active'); return a ? a.dataset.step : stepsOrder[0]; }
        function go(d) { const i = stepsOrder.indexOf(currentStep()); const n = Math.max(0, Math.min(stepsOrder.length-1, i+d)); showStep(stepsOrder[n]); }

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
          section.querySelectorAll('input[required], select[required], textarea[required]').forEach(el => { if (!el.value) valid = false; });
          if (!validateGroups(section)) valid = false;
          const li = stepsList.querySelector(`.step-item[data-step="${step}"]`);
          if (valid) { li.classList.add('completed'); li.querySelector('.step-status').textContent = 'Done'; }
          else { li.classList.remove('completed'); li.querySelector('.step-status').textContent = ''; }
          return valid;
        }

        stepsList.addEventListener('click', (e) => { const li = e.target.closest('.step-item'); if (!li) return; showStep(li.dataset.step); });
        document.querySelectorAll('[data-next]').forEach(b => b.addEventListener('click', () => { if (validateActiveStep()) go(1); }));
        document.querySelectorAll('[data-prev]').forEach(b => b.addEventListener('click', () => go(-1)));

        const validateBtn = document.getElementById('validateBtn25');
        if (validateBtn) {
          validateBtn.addEventListener('click', () => {
            if (!validateActiveStep()) return;
            const formData = new FormData(form);
            const entries = {};
            for (const [key, value] of formData.entries()) {
              if (value instanceof File) entries[key] = value.name || '';
              else {
                if (entries[key]) { if (Array.isArray(entries[key])) entries[key].push(value); else entries[key] = [entries[key], value]; }
                else entries[key] = value;
              }
            }
            localStorage.setItem('form1-25-data', JSON.stringify(entries));
            localStorage.setItem('active-form', '1-25');
            if (validationLink25) {
              window.location.href = validationLink25.href;
            }
          });
        }
        showStep(stepsOrder[0]);
      })();
    </script>
  </main>
</body>
</html> 