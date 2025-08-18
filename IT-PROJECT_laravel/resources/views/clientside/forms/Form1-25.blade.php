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
    <form class="form1-01-container">
      <div class="form1-01-header">COMPLAINT FORM</div>
      <div class="form1-01-section-title">INSTRUCTIONS:</div>
      <ol style="font-size:0.97rem;margin-bottom:10px;">
        <li>Accomplish this application form properly, handwritten or computer-printed.</li>
        <li>Attach the complete requirements including supporting documents. For the List of requirements, please refer to the <a href="https://ntc.gov.ph" target="_blank">NTC Citizen's Charter</a> at the NTC website: ntc.gov.ph</li>
        <li>Check (✓) appropriate box. Indicate "N/A" for items not applicable.</li>
      </ol>
      <fieldset style="margin-bottom:18px;">
        <legend>COMPLAINANT'S DETAILS</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Name: <input class="form1-01-input" type="text" name="complainant_name" required></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Postal Address: <input class="form1-01-input" type="text" name="postal_address" required></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Email Address: <input class="form1-01-input" type="email" name="email_address"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Contact Number: <input class="form1-01-input" type="text" name="contact_number"></label>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>PARTICULARS OF SERVICE PROVIDER</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Business Name: <input class="form1-01-input" type="text" name="business_name" required></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Business Address: <input class="form1-01-input" type="text" name="business_address" required></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Contact Number: <input class="form1-01-input" type="text" name="provider_contact_number"></label>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>NATURE OF COMPLAINT</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="complaint_type" value="billing"> Billing Complaint</label>
            <label><input type="checkbox" name="complaint_type" value="spam"> Spam</label>
            <label><input type="checkbox" name="complaint_type" value="scam"> Scam</label>
            <label><input type="checkbox" name="complaint_type" value="fair_use"> Fair Use</label>
          </div>
          <div class="form1-01-col">
            <label><input type="checkbox" name="complaint_type" value="poor_service"> Poor Service (Technical Service/Customer Service)</label>
            <label><input type="checkbox" name="complaint_type" value="denial_subscription"> Denial of Subscription Plan</label>
            <label><input type="checkbox" name="complaint_type" value="others"> Others, please specify:</label>
            <input class="form1-01-input" type="text" name="complaint_type_others" style="margin-top:8px;">
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Date of incident/transaction (mm/dd/yy): <input class="form1-01-input" type="date" name="incident_date" required></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Time of incident/transaction (hh:mm): <input class="form1-01-input" type="time" name="incident_time"></label>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>STATE BRIEFLY THE DETAILS OF COMPLAINT</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <textarea class="form1-01-input" name="complaint_details" rows="6" style="resize:vertical;width:100%;max-width:none;" placeholder="Please provide detailed information about your complaint..." required></textarea>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>ATTACHED PROOF/SUPPORTING DOCUMENTS</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <textarea class="form1-01-input" name="supporting_documents" rows="4" style="resize:vertical;width:100%;max-width:none;" placeholder="Please list all supporting documents attached to this complaint..."></textarea>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>NOTE</legend>
        <div class="form1-01-declaration">
          Complete information regarding the complaint, with the required supporting documents shall be provided for the Commission to determine the merit of the complaint, otherwise, it may cause delay in, or prevent the Commission from taking action on the complaint. The Commission may endorse the complaint to the concerned government agencies, if warranted. Information provided shall be used only in matters relative to the complaint.
        </div>
      </fieldset>
      <fieldset>
        <legend>SIGNATURE AND DATE</legend>
        <div class="form1-01-signature-row">
          <div class="form1-01-signature-col">
            <input class="form1-01-input" type="text" name="complainant_signature" placeholder="Signature over Printed Name of the Complainant" style="margin-bottom:16px;max-width:260px;width:100%;" required />
            <input class="form1-01-input" type="date" name="date_accomplished" placeholder="Date Accomplished" style="max-width:180px;width:100%;" required />
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
        localStorage.setItem('form1-25-data', JSON.stringify(entries));
        window.location.href = 'Validation.html';
      };
    </script>
  </main>
</body>
</html> 