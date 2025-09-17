<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Application for Certificate of Registration - Value Added Services (Form 1-20)</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <header>
    <div class="top-bar">
      <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
      <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>Cordillera Administrative Region, Baguio City Philippines</span></h1>
      </div>
      
      <!-- form name in the side of the header it may vary depending on the form -->
      <div style="position:absolute;top:20px;right:40px;text-align:right;font-size:0.97rem;">
        <div><b>Form No.</b> <u>NTC 1-20</u></div>
        <div><b>Revision No.</b> <u>02</u></div>
        <div><b>Revision Date</b> <u>03/31/2023</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container" id="form120">
      <div class="form1-01-header">APPLICATION FOR CERTIFICATE OF REGISTRATION</div>
      <div class="form1-01-note"><strong>NOTE:</strong> Indicate "N/A" for items not applicable.</div>
      <div class="form1-01-warning">
				<div class="form1-01-warning-title">WARNING:</div>
				Ensure that all details in the name and date of birth fields are correct. We cannot edit those fields on site and you will need to set a new appointment.
				<div class="form1-01-agree"><label><input type="checkbox"/> I agree / Malinaw sa akin</label></div>
			</div>

      <div class="form-layout">
        <aside class="steps-sidebar">
          <div class="steps-sidebar-header">Individual Appointment</div>
          <ul class="steps-list" id="stepsList20">
            <li class="step-item active" data-step="categories">Application Type & Services <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="applicant">Applicant Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="vas">Value Added Services <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="declaration">Declaration <span class="step-status">&nbsp;</span></li>
          </ul>
        </aside>

        <div>
          <section class="step-content active" id="step-categories">
            <fieldset class="fieldset-compact">
              <legend>Application Type / Service Categories</legend>
              <div class="form-grid-2">
                <div class="form-field" data-require-one="input[type=checkbox]">
                  <div class="form-label">Application Type</div>
                  <label><input type="checkbox" name="application_type" value="new"> NEW</label>
                  <label><input type="checkbox" name="application_type" value="renewal"> RENEWAL</label>
                  <label><input type="checkbox" name="application_type" value="modification"> MODIFICATION due to</label>
                  <input class="form1-01-input" type="text" name="modification_reason" placeholder="Reason (if modification)">
                </div>
                <div class="form-field" data-require-one="input[type=checkbox]">
                  <div class="form-label">Service Categories</div>
                  <label><input type="checkbox" name="service_category" value="vas_provider"> VALUE-ADDED SERVICE (VAS) PROVIDER</label>
                  <label><input type="checkbox" name="service_category" value="pcsotsp"> PUBLIC CALLING STATION/OFFICE / TELECENTER SERVICE PROVIDER (PCSOTSP)</label>
                  <label><input type="checkbox" name="service_category" value="voip"> VOICE OVER INTERNET PROTOCOL (VOIP)</label>
                  <div style="margin-left:12px;">
                    <label><input type="checkbox" name="voip_type" value="voip_provider"> PROVIDER</label>
                    <label><input type="checkbox" name="voip_type" value="voip_reseller"> RESELLER</label>
                  </div>
                </div>
              </div>
              <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>
          <section class="step-content" id="step-applicant">
            <fieldset>
              <legend>Applicant's Details</legend>
              <div class="form-grid-3">
                <div class="form-field"><label class="form-label">Applicant</label><input class="form1-01-input" type="text" name="applicant" required></div>
                <div class="form-field"><label class="form-label">Email Address</label><input class="form1-01-input" type="email" name="email" required></div>
                <div class="form-field"><label class="form-label">Contact Number</label><input class="form1-01-input" type="text" name="contact_number" required></div>
              </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Unit/Rm/Bldg No.</label><input class="form1-01-input" type="text" name="unit_no"></div>
                <div class="form-field"><label class="form-label">Street</label><input class="form1-01-input" type="text" name="street"></div>
              </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Barangay</label><input class="form1-01-input" type="text" name="barangay"></div>
                <div class="form-field"><label class="form-label">City/Municipality</label><input class="form1-01-input" type="text" name="city"></div>
              </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Province</label><input class="form1-01-input" type="text" name="province"></div>
                <div class="form-field"><label class="form-label">Zip Code</label><input class="form1-01-input" type="text" name="zip_code"></div>
              </div>
              <div class="form-grid-3">
                <div class="form-field"><label class="form-label">CPCN/PA/CA No.</label><input class="form1-01-input" type="text" name="cpcn_pa_ca_no"></div>
                <div class="form-field"><label class="form-label">CPCN Validity</label><input class="form1-01-input" type="date" name="cpcn_validity"></div>
                <div class="form-field"><label class="form-label">COR No.</label><input class="form1-01-input" type="text" name="cor_no"></div>
              </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">COR Validity</label><input class="form1-01-input" type="date" name="cor_validity"></div>
                <div class="form-field"><label class="form-label">Known by another name?</label>
                  <div class="inline-radio">
                    <label><input type="radio" name="known_by_another_name" value="yes"> Yes</label>
                    <label><input type="radio" name="known_by_another_name" value="no"> No</label>
                  </div>
                  <input class="form1-01-input" type="text" name="former_name" placeholder="Former name if Yes">
                </div>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>
          <section class="step-content" id="step-vas">
            <fieldset class="fieldset-compact">
              <legend>List of Value Added Services</legend>
              <div class="form-grid-2" data-require-one="input[type=checkbox]">
                <div class="form-field">
                  <label><input type="checkbox" name="vas_services" value="messaging"> Messaging service</label>
                  <label><input type="checkbox" name="vas_services" value="audio_conferencing"> Audio conferencing</label>
                  <label><input type="checkbox" name="vas_services" value="audio_video_conferencing"> Audio and Video Conferencing</label>
                  <label><input type="checkbox" name="vas_services" value="voice_mail"> Voice mail service</label>
                  <label><input type="checkbox" name="vas_services" value="electronic_mail"> Electronic mail service</label>
                  <label><input type="checkbox" name="vas_services" value="information_service"> Information service</label>
                  <label><input type="checkbox" name="vas_services" value="application_service"> Application service</label>
                </div>
                <div class="form-field">
                  <label><input type="checkbox" name="vas_services" value="content_program"> Content and Program service</label>
                  <label><input type="checkbox" name="vas_services" value="audiotext"> Audiotext service</label>
                  <label><input type="checkbox" name="vas_services" value="facsimile"> Facsimile service</label>
                  <label><input type="checkbox" name="vas_services" value="virtual_private_network"> Virtual Private Network service</label>
                  <label><input type="checkbox" name="vas_services" value="hosting"> Hosting service</label>
                  <label><input type="checkbox" name="vas_services" value="electronic_gaming"> Electronic Gaming Services, except gambling</label>
                  <label><input type="checkbox" name="vas_services" value="others"> Others, specify</label>
                  <input class="form1-01-input" type="text" name="others_vas" placeholder="Specify">
                </div>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>
          <section class="step-content" id="step-declaration">
            <fieldset>
              <legend>DECLARATION</legend>
              <div class="form1-01-declaration">I hereby declare that all the above entries are true and correct. Under the Revised Penal Code, I shall be held liable for any willful false statement(s) or misrepresentation(s) made in this application form that may serve as a valid ground for the denial of this application and/or cancellation/revocation of the permit issued/granted. Further, I am freely giving full consent for the collection and processing of personal information in accordance with Republic Act No. 10173, Data Privacy Act of 2012.</div>
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
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button class="form1-01-btn" type="button" id="validateBtn20">Proceed to Validation</button></div>
            </fieldset>
          </section>
        </div>
      </div>
    </form>
    <a id="validationLink20" href="{{ route('forms.1-01.validation') }}" style="display:none;">Validation</a>
    <script>
      (function() {
        const stepsOrder = ['categories','applicant','vas','declaration'];
        const stepsList = document.getElementById('stepsList20');
        const form = document.getElementById('form120');

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

        const validateBtn = document.getElementById('validateBtn20');
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
            localStorage.setItem('form1-20-data', JSON.stringify(entries));
            localStorage.setItem('active-form', '1-20');
            if (validationLink20) {
              window.location.href = validationLink20.href;
            }
          });
        }
        showStep(stepsOrder[0]);
      })();
    </script>
  </main>
</body>
</html> 