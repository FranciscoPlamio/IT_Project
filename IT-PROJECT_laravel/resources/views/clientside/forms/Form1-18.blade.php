<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Application for Dealer/Manufacturer/Service Center/Retailer/Reseller Permit/CPE Supplier Accreditation (Form 1-18)</title>
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
        <div><b>Form No.</b> <u>NTC 1-18</u></div>
        <div><b>Revision No.</b> <u>02</u></div>
        <div><b>Revision Date</b> <u>03/31/2023</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container" id="form118">
      <div class="form1-01-header">APPLICATION FOR DEALER/MANUFACTURER/SERVICE CENTER/RETAILER/RESELLER PERMIT/CPE SUPPLIER ACCREDITATION</div>
      <div class="form1-01-note"><strong>NOTE:</strong> Indicate "N/A" for items not applicable.</div>

      <div class="form-layout">
        <aside class="steps-sidebar">
          <div class="steps-sidebar-header">Individual Appointment</div>
          <ul class="steps-list" id="stepsList18">
            <li class="step-item active" data-step="application">Type of Application <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="categories">Application Categories <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="applicant">Applicant Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="personnel">Personnel Required <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="declaration">Declaration <span class="step-status">&nbsp;</span></li>
          </ul>
        </aside>

        <div>
          <section class="step-content active" id="step-application">
            <fieldset class="fieldset-compact">
              <legend>Type of Application</legend>
              <div class="form-field" data-require-one="input[type=checkbox]">
                <label><input type="checkbox" name="application_type" value="new"> NEW</label>
                <label><input type="checkbox" name="application_type" value="renewal"> RENEWAL</label>
                <label><input type="checkbox" name="application_type" value="modification"> MODIFICATION due to</label>
                <input class="form1-01-input" type="text" name="modification_reason" placeholder="Reason (if modification)">
              </div>
              <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>
          <section class="step-content" id="step-categories">
            <fieldset class="fieldset-compact">
              <legend>Application Categories</legend>
              <div class="form-grid-2">
                <div class="form-field" data-require-one="input[type=checkbox]">
                  <div class="form-label">Radio Communications Equipment (RCE)</div>
                  <label><input type="checkbox" name="rce_category" value="dealer"> Dealer</label>
                  <label><input type="checkbox" name="rce_category" value="radio_transmitter"> Radio Transmitter/Transceiver</label>
                  <label><input type="checkbox" name="rce_category" value="wdn_indoor"> WDN Indoor/SRD/RFID</label>
                  <label><input type="checkbox" name="rce_category" value="manufacturer"> Manufacturer</label>
                  <label><input type="checkbox" name="rce_category" value="service_center"> Service Center</label>
                </div>
                <div class="form-field" data-require-one="input[type=checkbox]">
                  <div class="form-label">Mobile Phone</div>
                  <label><input type="checkbox" name="mobile_category" value="dealer_mpdp"> Dealer (MPDP)</label>
                  <label><input type="checkbox" name="mobile_category" value="retailer_reseller"> Retailer/Reseller (MPRR)</label>
                  <label><input type="checkbox" name="mobile_category" value="service_center_mpscp"> Service Center (MPSCP)</label>
                  <div class="form-label" style="margin-top:12px;">Customer Premises Equipment (CPE) Supplier Accreditation</div>
                  <label><input type="checkbox" name="cpe_category" value="cpe_supplier"> CPE Supplier Accreditation</label>
                </div>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>
          <section class="step-content" id="step-applicant">
            <fieldset>
              <legend>Applicant's Details</legend>
              <div class="form-grid-3">
                <div class="form-field"><label class="form-label">Applicant*</label><input class="form1-01-input" type="text" name="applicant" required></div>
                <div class="form-field"><label class="form-label">Permit No.</label><input class="form1-01-input" type="text" name="permit_no"></div>
                <div class="form-field"><label class="form-label">Validity</label><input class="form1-01-input" type="date" name="validity"></div>
              </div>
              <div class="form-grid-3">
                <div class="form-field"><label class="form-label">Type of Entity</label>
                  <div class="inline-radio">
                    <label><input type="radio" name="entity_type" value="corporation"> Corporation</label>
                    <label><input type="radio" name="entity_type" value="single_proprietorship"> Single Proprietorship</label>
                    <label><input type="radio" name="entity_type" value="partnership"> Partnership</label>
                    <label><input type="radio" name="entity_type" value="others"> Others</label>
                  </div>
                  <input class="form1-01-input" type="text" name="others_entity" placeholder="If others, specify">
                </div>
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
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Contact Number</label><input class="form1-01-input" type="text" name="contact_number" required></div>
                <div class="form-field"><label class="form-label">Email Address</label><input class="form1-01-input" type="email" name="email" required></div>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>
          <section class="step-content" id="step-personnel">
            <fieldset>
              <legend>Personnel Required (Not Applicable for WDN Indoor/SRD/RFID and Mobile Phone)</legend>
              <div class="form-grid-2">
                <div class="form-field">
                  <div class="form-label">Supervising Engineer</div>
                  <label class="form-label">Name</label><input class="form1-01-input" type="text" name="supervising_engineer_name">
                  <label class="form-label">PECE/ECE No.</label><input class="form1-01-input" type="text" name="supervising_engineer_pece">
                  <label class="form-label">Validity</label><input class="form1-01-input" type="date" name="supervising_engineer_validity">
                </div>
                <div class="form-field">
                  <div class="form-label">Technician</div>
                  <label class="form-label">Name</label><input class="form1-01-input" type="text" name="technician_name">
                  <label class="form-label">Certificate/ECT No.</label><input class="form1-01-input" type="text" name="technician_certificate">
                  <label class="form-label">Validity</label><input class="form1-01-input" type="date" name="technician_validity">
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
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button class="form1-01-btn" type="button" id="validateBtn18">Proceed to Validation</button></div>
            </fieldset>
          </section>
        </div>
      </div>
    </form>
    <a id="validationLink18" href="{{ route('forms.1-01.validation') }}" style="display:none;">Validation</a>
    <script>
      (function() {
        const stepsOrder = ['application','categories','applicant','personnel','declaration'];
        const stepsList = document.getElementById('stepsList18');
        const form = document.getElementById('form118');

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

        const validateBtn = document.getElementById('validateBtn18');
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
            localStorage.setItem('form1-18-data', JSON.stringify(entries));
            localStorage.setItem('active-form', '1-18');
            if (validationLink18) {
              window.location.href = validationLink18.href;
            }
          });
        }
        showStep(stepsOrder[0]);
      })();
    </script>
  </main>
</body>
</html> 