<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Application for Temporary Permit to Propagate/Demonstrate (Form 1-14)</title>
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
        <div><b>Form No.</b> <u>NTC 1-14</u></div>
        <div><b>Revision No.</b> <u>02</u></div>
        <div><b>Revision Date</b> <u>03/31/2023</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container" id="form114">
      <div class="form1-01-header">APPLICATION FOR TEMPORARY PERMIT TO PROPAGATE/DEMONSTRATE</div>
      <div class="form1-01-note"><strong>NOTE:</strong> Indicate "N/A" for items not applicable.</div>

      <div class="form-layout">
        <aside class="steps-sidebar">
          <div class="steps-sidebar-header">Individual Appointment</div>
          <ul class="steps-list" id="stepsList14">
            <li class="step-item active" data-step="nature">Nature of Service <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="class">Class of Station <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="service">Radio Service <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="personal">Applicant Information <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="particulars">Station/Equipment <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="declaration">Declaration <span class="step-status">&nbsp;</span></li>
          </ul>
        </aside>

        <div>
          <section class="step-content active" id="step-nature">
            <fieldset class="fieldset-compact">
              <legend>Nature of Service</legend>
              <div class="form-field" data-require-one="input[type=checkbox]">
                <label><input type="checkbox" name="nature_service" value="cv_private"> CV (PRIVATE)</label>
                <input class="form1-01-input" type="text" name="cv_private_details" placeholder="Details">
                <label><input type="checkbox" name="nature_service" value="co_government"> CO (GOVERNMENT)</label>
                <input class="form1-01-input" type="text" name="co_government_details" placeholder="Details">
                <label><input type="checkbox" name="nature_service" value="cp_public"> CP (PUBLIC CORRESPONDENCE)</label>
                <input class="form1-01-input" type="text" name="cp_public_details" placeholder="Details">
          </div>
              <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button></div>
      </fieldset>
          </section>
          <section class="step-content" id="step-class">
            <fieldset class="fieldset-compact">
              <legend>Class of Station (indicate units)</legend>
              <div class="form-grid-2" data-require-one="input[type=checkbox]">
                <div class="form-field">
                  <label><input type="checkbox" name="station_class" value="rt"> RT</label>
                  <input class="form1-01-input" type="text" name="rt_units" placeholder="Units">
                  <label><input type="checkbox" name="station_class" value="fx"> FX</label>
                  <input class="form1-01-input" type="text" name="fx_units" placeholder="Units">
                  <label><input type="checkbox" name="station_class" value="fb"> FB</label>
                  <input class="form1-01-input" type="text" name="fb_units" placeholder="Units">
                  <label><input type="checkbox" name="station_class" value="ml"> ML</label>
                  <input class="form1-01-input" type="text" name="ml_units" placeholder="Units">
                  <label><input type="checkbox" name="station_class" value="p"> P</label>
                  <input class="form1-01-input" type="text" name="p_units" placeholder="Units">
                  <label><input type="checkbox" name="station_class" value="bc"> BC</label>
                  <input class="form1-01-input" type="text" name="bc_units" placeholder="Units">
          </div>
                <div class="form-field">
                  <label><input type="checkbox" name="station_class" value="fa"> FA</label>
                  <input class="form1-01-input" type="text" name="fa_units" placeholder="Units">
                  <label><input type="checkbox" name="station_class" value="ma"> MA</label>
                  <input class="form1-01-input" type="text" name="ma_units" placeholder="Units">
                  <label><input type="checkbox" name="station_class" value="tc"> TC</label>
                  <input class="form1-01-input" type="text" name="tc_units" placeholder="Units">
                  <label><input type="checkbox" name="station_class" value="others"> OTHERS, specify</label>
                  <input class="form1-01-input" type="text" name="others_station_specify" placeholder="Type">
          </div>
        </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
      </fieldset>
          </section>
          <section class="step-content" id="step-service">
            <fieldset class="fieldset-compact">
              <legend>Type of Radio Service</legend>
              <div class="form-field" data-require-one="input[type=checkbox]">
                <label><input type="checkbox" name="radio_service" value="fixed_land_mobile"> FIXED AND LAND MOBILE</label>
                <input class="form1-01-input" type="text" name="fixed_land_mobile_details" placeholder="Details">
                <label><input type="checkbox" name="radio_service" value="aeronautical"> AERONAUTICAL</label>
                <input class="form1-01-input" type="text" name="aeronautical_details" placeholder="Details">
                <label><input type="checkbox" name="radio_service" value="broadcast"> BROADCAST</label>
                <input class="form1-01-input" type="text" name="broadcast_details" placeholder="Details">
                <label><input type="checkbox" name="radio_service" value="others"> OTHERS, specify</label>
                <input class="form1-01-input" type="text" name="others_radio_specify" placeholder="Specify">
          </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
      </fieldset>
          </section>
          <section class="step-content" id="step-personal">
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
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>
          <section class="step-content" id="step-particulars">
            <fieldset>
              <legend>Particulars of Station / Equipment</legend>
              <div class="form-grid-3">
                <div class="form-field"><label class="form-label">Exact Location</label><input class="form1-01-input" type="text" name="exact_location"></div>
                <div class="form-field"><label class="form-label">Long (deg-min-sec)</label><input class="form1-01-input" type="text" name="longitude"></div>
                <div class="form-field"><label class="form-label">Lat (deg-min-sec)</label><input class="form1-01-input" type="text" name="latitude"></div>
          </div>
              <div class="form-grid-3">
                <div class="form-field"><label class="form-label">Points of Comm/Service Area</label><input class="form1-01-input" type="text" name="points_of_comm"></div>
                <div class="form-field"><label class="form-label">Proposed Freq.</label><input class="form1-01-input" type="text" name="proposed_freq"></div>
                <div class="form-field"><label class="form-label">BW & Emission</label><input class="form1-01-input" type="text" name="bw_emission"></div>
        </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Data Rate</label><input class="form1-01-input" type="text" name="data_rate"></div>
                <div class="form-field"><label class="form-label">Others, specify</label><input class="form1-01-input" type="text" name="others_station"></div>
          </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Make/Type/Model</label><input class="form1-01-input" type="text" name="make_type_model"></div>
                <div class="form-field"><label class="form-label">Serial Number</label><input class="form1-01-input" type="text" name="serial_number"></div>
          </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Power Output</label><input class="form1-01-input" type="text" name="power_output"></div>
                <div class="form-field"><label class="form-label">Frequency Range</label><input class="form1-01-input" type="text" name="frequency_range"></div>
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
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button class="form1-01-btn" type="button" id="validateBtn14">Proceed to Validation</button></div>
      </fieldset>
          </section>
        </div>
      </div>
    </form>
    <script>
      (function() {
        const stepsOrder = ['nature','class','service','personal','particulars','declaration'];
        const stepsList = document.getElementById('stepsList14');
        const form = document.getElementById('form114');

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

        const validateBtn = document.getElementById('validateBtn14');
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
            localStorage.setItem('form1-14-data', JSON.stringify(entries));
            window.location.href = 'Validation.html';
          });
        }
        showStep(stepsOrder[0]);
      })();
    </script>
  </main>
</body>
</html> 