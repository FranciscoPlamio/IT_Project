<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Complaint on Text Message (Form 1-25)</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <header>
    <div class="top-bar">
      <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
      <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>ONE STOP PUBLIC ASSISTANCE CENTER</span><br><span>Leonard Wood Road, Pacdal, Baguio City 2600</span><br><span>Telephone Number: (074) 442-9342/304-4876</span></h1>
      </div>
      
      <!-- form name in the side of the header it may vary depending on the form -->
      <div style="position:absolute;top:20px;right:40px;text-align:right;font-size:0.97rem;">
        <div><b>OSPAC No.</b> <u>___________</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container" id="form125text">
      <div class="form1-01-header">COMPLAINT ON TEXT MESSAGE</div>

      <div class="form-layout">
        <aside class="steps-sidebar">
          <div class="steps-sidebar-header">Individual Appointment</div>
          <ul class="steps-list" id="stepsList25text">
            <li class="step-item active" data-step="affiant">Affiant Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="messages">Text Messages <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="complaint">Complaint Against <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="undertaking">Undertaking <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="signature">Signature & Notary <span class="step-status">&nbsp;</span></li>
          </ul>
        </aside>

        <div>
          <section class="step-content active" id="step-affiant">
            <fieldset>
              <legend>Affiant Information</legend>
              <div class="inline-text-container">
                I, <input class="inline-input-name" type="text" name="affiant_name" required>, of legal age, <input class="inline-input-civil-status" type="text" name="civil_status" placeholder="single/married">, Filipino, with residence at <input class="inline-input-address" type="text" name="residence_address" required> after having been sworn to in accordance with law, depose and state, that:
              </div>
              <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-messages">
            <fieldset>
              <legend>Complaint Details</legend>
              <div style="overflow-x:auto;">
                <table style="width:100%;border-collapse:collapse;margin-top:12px;">
                  <thead>
                    <tr style="background-color:#f5f5f5;">
                      <th style="border:1px solid #ddd;padding:8px;text-align:left;font-size:0.97rem;width:25%;">Date/Time Received</th>
                      <th style="border:1px solid #ddd;padding:8px;text-align:left;font-size:0.97rem;width:25%;">Cell Phone No.</th>
                      <th style="border:1px solid #ddd;padding:8px;text-align:left;font-size:0.97rem;width:50%;">MESSAGE</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <input class="form1-01-input" type="datetime-local" name="message1_datetime" style="border:none;width:100%;padding:4px;">
                      </td>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <input class="form1-01-input" type="text" name="message1_phone" style="border:none;width:100%;padding:4px;" placeholder="Cell phone number">
                      </td>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <textarea class="form1-01-input" name="message1_content" rows="3" style="border:none;width:100%;padding:4px;resize:vertical;" placeholder="Message content"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <input class="form1-01-input" type="datetime-local" name="message2_datetime" style="border:none;width:100%;padding:4px;">
                      </td>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <input class="form1-01-input" type="text" name="message2_phone" style="border:none;width:100%;padding:4px;" placeholder="Cell phone number">
                      </td>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <textarea class="form1-01-input" name="message2_content" rows="3" style="border:none;width:100%;padding:4px;resize:vertical;" placeholder="Message content"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <input class="form1-01-input" type="datetime-local" name="message3_datetime" style="border:none;width:100%;padding:4px;">
                      </td>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <input class="form1-01-input" type="text" name="message3_phone" style="border:none;width:100%;padding:4px;" placeholder="Cell phone number">
                      </td>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <textarea class="form1-01-input" name="message3_content" rows="3" style="border:none;width:100%;padding:4px;resize:vertical;" placeholder="Message content"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <input class="form1-01-input" type="datetime-local" name="message4_datetime" style="border:none;width:100%;padding:4px;">
                      </td>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <input class="form1-01-input" type="text" name="message4_phone" style="border:none;width:100%;padding:4px;" placeholder="Cell phone number">
                      </td>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <textarea class="form1-01-input" name="message4_content" rows="3" style="border:none;width:100%;padding:4px;resize:vertical;" placeholder="Message content"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <input class="form1-01-input" type="datetime-local" name="message5_datetime" style="border:none;width:100%;padding:4px;">
                      </td>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <input class="form1-01-input" type="text" name="message5_phone" style="border:none;width:100%;padding:4px;" placeholder="Cell phone number">
                      </td>
                      <td style="border:1px solid #ddd;padding:8px;">
                        <textarea class="form1-01-input" name="message5_content" rows="3" style="border:none;width:100%;padding:4px;resize:vertical;" placeholder="Message content"></textarea>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-complaint">
            <fieldset>
              <legend>Complaint Against</legend>
              <div style="font-size:0.97rem;margin-bottom:12px;">
                In view of the foregoing, I am filing a complaint against <input class="form1-01-input" type="text" name="complaint_against" style="display:inline-block;width:300px;margin:0 8px;" required>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-undertaking">
            <fieldset>
              <legend>Undertaking</legend>
              <div style="font-size:0.97rem;">
                That I hereby undertake to hold free from any responsibility or shall not hold NTC liable for whatever claims, loss or damages any party may institute by reason of NTC's action on sending warning messages to complained number.
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-signature">
            <fieldset>
              <legend>Signature and Notarization</legend>
              <div style="font-size:0.97rem;margin-bottom:12px;">
                Baguio City, <input class="form1-01-input" type="date" name="complaint_date" style="display:inline-block;width:150px;margin:0 8px;"> 2021.
              </div>
              <div class="form1-01-signature-row">
                <div class="form1-01-signature-col">
                  <input class="signature-line-input" type="text" name="affiant_signature" placeholder="SIGNATURE OVER PRINTED NAME" required />
                  <label class="form1-01-label" style="margin-top:16px;">Telephone Number: <input class="form1-01-input" type="text" name="telephone_number"></label>
                </div>
              </div>
              <div style="font-size:0.97rem;margin-top:20px;">
                Subscribed and sworn to before me this <input class="form1-01-input" type="text" name="sworn_day" style="display:inline-block;width:80px;margin:0 8px;"> day of <input class="form1-01-input" type="text" name="sworn_month" style="display:inline-block;width:120px;margin:0 8px;"> 2021.
              </div>
              <div style="text-align:center;font-size:1.1rem;font-weight:bold;margin-top:16px;">
                ADMINISTERING OFFICER
              </div>
              <div style="text-align:center;margin-top:8px;">
                <input class="form1-01-input" type="text" name="administering_officer" placeholder="ADMINISTERING OFFICER" style="max-width:260px;width:100%;" />
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button class="form1-01-btn" type="button" id="validateBtn25text">Proceed to Validation</button></div>
            </fieldset>
          </section>
        </div>
      </div>
    </form>
    <a id="validationLink26text" href="{{ route('forms.1-01.validation') }}" style="display:none;">Validation</a>
    <script>
      (function() {
        const stepsOrder = ['affiant','messages','complaint','undertaking','signature'];
        const stepsList = document.getElementById('stepsList25text');
        const form = document.getElementById('form125text');

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

        const validateBtn = document.getElementById('validateBtn25text');
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
            localStorage.setItem('form1-26-data', JSON.stringify(entries));
            localStorage.setItem('active-form', '1-26');
            if (validationLink26text) {
              window.location.href = validationLink26text.href;
            }
          });
        }
        showStep(stepsOrder[0]);
      })();
    </script>
  </main>
</body>
</html> 