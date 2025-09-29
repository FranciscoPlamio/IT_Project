<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form D (For Modification) (Form 1-13)</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <header>
    <div class="top-bar">
      <a href="{{ route('homepage') }}" aria-label="Go to homepage">
        <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
      </a>
      <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>Cordillera Administrative Region, Baguio City Philippines</span></h1>
      </div>
      
      <!-- form name in the side of the header it may vary depending on the form -->
      <div style="position:absolute;top:20px;right:40px;text-align:right;font-size:0.97rem;">
        <div><b>Form No.</b> <u>NTC 1-13</u></div>
        <div><b>Revision No.</b> <u>01</u></div>
        <div><b>Revision Date</b> <u>03/31/2021</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container" id="form113">
      <div class="form1-01-header">FORM D (FOR MODIFICATION)</div>
      <div class="form1-01-note"><strong>NOTE:</strong> Indicate "N/A" for items not applicable.</div>
      <div class="form1-01-warning">

      <div class="form-layout">
        <aside class="steps-sidebar">
          <div class="steps-sidebar-header">Individual Appointment</div>
          <ul class="steps-list" id="stepsList13">
            <li class="step-item active" data-step="applicant">Applicant <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="particulars">Particulars <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="sign">Signature <span class="step-status">&nbsp;</span></li>
          </ul>
        </aside>

        <div>
          <section class="step-content active" id="step-applicant">
            <fieldset>
              <legend>Applicant</legend>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Applicant</label><input class="form1-01-input" type="text" name="applicant" required></div>
        </div>
              <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-particulars">
            <fieldset>
              <legend>Particulars</legend>
              <div class="table-container">
                <table class="form-table">
            <thead>
                    <tr>
                      <th>Field</th>
                      <th>Authorized</th>
                      <th>Proposed</th>
              </tr>
            </thead>
            <tbody>
                    <tr><td class="table-field-label" colspan="3"><strong>STATION</strong></td></tr>
                    <tr>
                      <td>EXACT LOCATION</td>
                      <td><input class="table-input" type="text" name="authorized_exact_location"></td>
                      <td><input class="table-input" type="text" name="proposed_exact_location"></td>
              </tr>
              <tr>
                      <td>LONGITUDE (deg-min-sec)</td>
                      <td><input class="table-input" type="text" name="authorized_longitude"></td>
                      <td><input class="table-input" type="text" name="proposed_longitude"></td>
              </tr>
              <tr>
                      <td>LATITUDE (deg-min-sec)</td>
                      <td><input class="table-input" type="text" name="authorized_latitude"></td>
                      <td><input class="table-input" type="text" name="proposed_latitude"></td>
              </tr>
              <tr>
                      <td>POINTS OF COMM/SERVICE AREA</td>
                      <td><input class="table-input" type="text" name="authorized_points_of_comm"></td>
                      <td><input class="table-input" type="text" name="proposed_points_of_comm"></td>
              </tr>
              <tr>
                      <td>ASSIGNED FREQ.</td>
                      <td><input class="table-input" type="text" name="authorized_assigned_freq"></td>
                      <td><input class="table-input" type="text" name="proposed_assigned_freq"></td>
              </tr>
              <tr>
                      <td>BW & EMISSION</td>
                      <td><input class="table-input" type="text" name="authorized_bw_emission"></td>
                      <td><input class="table-input" type="text" name="proposed_bw_emission"></td>
              </tr>
              <tr>
                      <td>CONFIGURATION</td>
                      <td><input class="table-input" type="text" name="authorized_configuration"></td>
                      <td><input class="table-input" type="text" name="proposed_configuration"></td>
              </tr>
              <tr>
                      <td>DATA RATE</td>
                      <td><input class="table-input" type="text" name="authorized_data_rate"></td>
                      <td><input class="table-input" type="text" name="proposed_data_rate"></td>
              </tr>
                    <tr><td class="table-field-label" colspan="3"><strong>EQUIPMENT</strong></td></tr>
                    <tr>
                      <td>MAKE/TYPE/MODEL</td>
                      <td><input class="table-input" type="text" name="authorized_make_type_model"></td>
                      <td><input class="table-input" type="text" name="proposed_make_type_model"></td>
              </tr>
              <tr>
                      <td>SERIAL NO.</td>
                      <td><input class="table-input" type="text" name="authorized_serial_no"></td>
                      <td><input class="table-input" type="text" name="proposed_serial_no"></td>
              </tr>
              <tr>
                      <td>POWER OUTPUT</td>
                      <td><input class="table-input" type="text" name="authorized_power_output"></td>
                      <td><input class="table-input" type="text" name="proposed_power_output"></td>
              </tr>
              <tr>
                      <td>FREQ. RANGE</td>
                      <td><input class="table-input" type="text" name="authorized_freq_range"></td>
                      <td><input class="table-input" type="text" name="proposed_freq_range"></td>
              </tr>
                    <tr><td class="table-field-label" colspan="3"><strong>OTHERS</strong></td></tr>
                    <tr>
                      <td>OTHERS 1</td>
                      <td><input class="table-input" type="text" name="authorized_others_1"></td>
                      <td><input class="table-input" type="text" name="proposed_others_1"></td>
              </tr>
              <tr>
                      <td>OTHERS 2</td>
                      <td><input class="table-input" type="text" name="authorized_others_2"></td>
                      <td><input class="table-input" type="text" name="proposed_others_2"></td>
              </tr>
              <tr>
                      <td>OTHERS 3</td>
                      <td><input class="table-input" type="text" name="authorized_others_3"></td>
                      <td><input class="table-input" type="text" name="proposed_others_3"></td>
              </tr>
            </tbody>
          </table>
        </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
      </fieldset>
          </section>

          <section class="step-content" id="step-sign">
            <fieldset>
              <legend>Signature and Date</legend>
        <div class="form1-01-signature-row">
          <div class="form1-01-signature-col">
          <input class="signature-line-input" type="text" name="signature_name" placeholder="Signature over Printed Name of Applicant" />
            <input class="form1-01-input" type="date" name="date_accomplished" placeholder="Date Accomplished" style="max-width:180px;width:100%;" />
          </div>
        </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button class="form1-01-btn" type="button" id="validateBtn13">Proceed to Validation</button></div>
      </fieldset>
          </section>
        </div>
      </div>
    </form>
    <a id="validationLink13" href="{{ route('forms.1-01.validation') }}" style="display:none;">Validation</a>
    <script>
      (function() {
        const stepsOrder = ['applicant','particulars','sign'];
        const stepsList = document.getElementById('stepsList13');
        const form = document.getElementById('form113');
        const validationLink13 = document.getElementById('validationLink13');

        function showStep(step) {
          stepsList.querySelectorAll('.step-item').forEach(li => li.classList.toggle('active', li.dataset.step === step));
          document.querySelectorAll('.step-content').forEach(s => s.classList.toggle('active', s.id === `step-${step}`));
        }
        function currentStep() { const a = stepsList.querySelector('.step-item.active'); return a ? a.dataset.step : stepsOrder[0]; }
        function go(d) { const i = stepsOrder.indexOf(currentStep()); const n = Math.max(0, Math.min(stepsOrder.length-1, i+d)); showStep(stepsOrder[n]); }

        function validateActiveStep() {
          const step = currentStep();
          const section = document.getElementById(`step-${step}`);
          let valid = true;
          section.querySelectorAll('input[required]').forEach(el => { if (!el.value) valid = false; });
          const li = stepsList.querySelector(`.step-item[data-step="${step}"]`);
          if (valid) { li.classList.add('completed'); li.querySelector('.step-status').textContent = 'Done'; }
          else { li.classList.remove('completed'); li.querySelector('.step-status').textContent = ''; }
          return valid;
        }

        stepsList.addEventListener('click', (e) => { const li = e.target.closest('.step-item'); if (!li) return; showStep(li.dataset.step); });
        document.querySelectorAll('[data-next]').forEach(b => b.addEventListener('click', () => { if (validateActiveStep()) go(1); }));
        document.querySelectorAll('[data-prev]').forEach(b => b.addEventListener('click', () => go(-1)));

        const validateBtn = document.getElementById('validateBtn13');
        if (validateBtn) {
          validateBtn.addEventListener('click', () => {
            if (!validateActiveStep()) return;
        const formData = new FormData(form);
        const entries = {};
        for (const [key, value] of formData.entries()) {
              if (value instanceof File) entries[key] = value.name || '';
              else entries[key] = value;
            }
            localStorage.setItem('form1-13-data', JSON.stringify(entries));
            localStorage.setItem('active-form', '1-13');
            if (validationLink13) {
              window.location.href = validationLink13.href;
            }
          });
        }
        showStep(stepsOrder[0]);
      })();
    </script>
  </main>
</body>
</html> 