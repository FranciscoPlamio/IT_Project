<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Application for Certificate of Registration (Form 1-19)</title>
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
        <div><b>Form No.</b> <u>NTC 1-19</u></div>
        <div><b>Revision No.</b> <u>02</u></div>
        <div><b>Revision Date</b> <u>03/31/2023</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container" id="form119">
      <div class="form1-01-header">APPLICATION FOR CERTIFICATE OF REGISTRATION</div>
      <div class="form1-01-note"><strong>NOTE:</strong> Indicate "N/A" for items not applicable.</div>

      <div class="form-layout">
        <aside class="steps-sidebar">
          <div class="steps-sidebar-header">Individual Appointment</div>
          <ul class="steps-list" id="stepsList19">
            <li class="step-item active" data-step="equipment">Type of Equipment/Device <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="applicant">Applicant Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="particulars">Equipment & Devices <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="declaration">Declaration <span class="step-status">&nbsp;</span></li>
          </ul>
        </aside>

        <div>
          <section class="step-content active" id="step-equipment">
            <fieldset class="fieldset-compact">
              <legend>Type of Equipment/Device</legend>
              <div class="form-field" data-require-one="input[type=checkbox]">
                <label><input type="checkbox" name="equipment_type" value="wdn_indoor"> WIRELESS DATA NETWORK (WDN) DEVICES - INDOOR</label>
                <label><input type="checkbox" name="equipment_type" value="srd"> SHORT RANGE DEVICES (SRD)</label>
                <label><input type="checkbox" name="equipment_type" value="rfid"> RADIO FREQUENCY IDENTIFICATION (RFID) DEVICES</label>
                <label><input type="checkbox" name="equipment_type" value="srrs"> SHORT RANGE RADIO SERVICE (SRRS) DEVICES</label>
                <label><input type="checkbox" name="equipment_type" value="public_trunked"> PUBLIC TRUNKED RADIO EQUIPMENT (MOBILE/PORTABLE)</label>
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
                <div class="form-field"><label class="form-label">Validity</label><input class="form1-01-input" type="date" name="validity"></div>
                <div class="form-field"><label class="form-label">Permit to Import No.</label><input class="form1-01-input" type="text" name="permit_import_no"></div>
                <div class="form-field"><label class="form-label">Invoice No.</label><input class="form1-01-input" type="text" name="invoice_no"></div>
              </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">CPCN/PA/RSL No.</label><input class="form1-01-input" type="text" name="cpcn_pa_rsl_no"></div>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>
          <section class="step-content" id="step-particulars">
            <fieldset>
              <legend>Particulars of Equipment & Devices</legend>
              <div class="table-container">
                <table class="form-table">
                  <thead>
                    <tr>
                      <th>Make/Type/Model</th>
                      <th>Quantity</th>
                      <th>Serial Number</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input class="table-input" type="text" name="equipment1_make"></td>
                      <td><input class="table-input" type="number" name="equipment1_quantity"></td>
                      <td><input class="table-input" type="text" name="equipment1_serial"></td>
                    </tr>
                    <tr>
                      <td><input class="table-input" type="text" name="equipment2_make"></td>
                      <td><input class="table-input" type="number" name="equipment2_quantity"></td>
                      <td><input class="table-input" type="text" name="equipment2_serial"></td>
                    </tr>
                    <tr>
                      <td><input class="table-input" type="text" name="equipment3_make"></td>
                      <td><input class="table-input" type="number" name="equipment3_quantity"></td>
                      <td><input class="table-input" type="text" name="equipment3_serial"></td>
                    </tr>
                    <tr>
                      <td><input class="table-input" type="text" name="equipment4_make"></td>
                      <td><input class="table-input" type="number" name="equipment4_quantity"></td>
                      <td><input class="table-input" type="text" name="equipment4_serial"></td>
                    </tr>
                    <tr>
                      <td><input class="table-input" type="text" name="equipment5_make"></td>
                      <td><input class="table-input" type="number" name="equipment5_quantity"></td>
                      <td><input class="table-input" type="text" name="equipment5_serial"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="form-grid-2" style="margin-top:12px;">
                <div class="form-field"><label class="form-label">TOTAL</label><input class="form1-01-input" type="number" name="total_quantity"></div>
              </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>
      <fieldset>
        <legend>DECLARATION</legend>
        <div class="form1-01-declaration">
          I hereby declare that all the above entries are true and correct. Under the Revised Penal Code, I shall be held liable for any willful false statement(s) or misrepresentation(s) made in this application form that may serve as a valid ground for the denial of this application and/or cancellation/revocation of the permit issued/granted. Further, I am freely giving full consent for the collection and processing of personal information in accordance with Republic Act No. 10173, Data Privacy Act of 2012.
        </div>
        <div class="form1-01-signature-row">
          <div class="form1-01-signature-col">
            <input class="form1-01-input" type="text" name="signature_name" placeholder="Signature over Printed Name of Applicant / Duly Authorized Signatory/Representative" style="margin-bottom:16px;max-width:260px;width:100%;" />
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
      </fieldset>
      <div style="text-align:center;font-size:0.97rem;margin-top:8px;">THIS FORM IS NOT FOR SALE AND CAN BE REPRODUCED</div>
      <button class="form1-01-btn" type="button" id="validateBtn" style="display:block;margin:32px auto 0 auto;">Proceed to Validation</button>
    </form>
    <script>
      document.getElementById('validateBtn').onclick = function() {
        const form = document.querySelector('.form1-01-container');
        const formData = new FormData(form);
        const entries = {};
        for (const [key, value] of formData.entries()) {
          if (value instanceof File) {
            // Save the file name if a file is selected, otherwise empty string
            entries[key] = value.name || '';
          } else {
            if (entries[key]) {
              if (Array.isArray(entries[key])) {
                entries[key].push(value);
              } else {
                entries[key] = [entries[key], value];
              }
            } else {
              entries[key] = value;
            }
          }
        }
        localStorage.setItem('form1-19-data', JSON.stringify(entries));
        window.location.href = 'Validation.html';
      };
    </script>
  </main>
</body>
</html> 