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
      <img src="../../images/logo.png" alt="NTC Logo" class="logo">
      <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>BIR Road, East Triangle, Diliman, Quezon City</span></h1>
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
    <form class="form1-01-container">
      <div class="form1-01-header">APPLICATION FOR CERTIFICATE OF REGISTRATION</div>
      <div class="form1-01-section-title">INSTRUCTIONS:</div>
      <ol style="font-size:0.97rem;margin-bottom:10px;">
        <li>Accomplish this application form properly, in ALL CAPS, handwritten or computer-printed.</li>
        <li>Attach the complete requirements including supporting documents. For the List of requirements, please refer to the <a href="https://ntc.gov.ph" target="_blank">NTC Citizen's Charter</a> at the NTC website: ntc.gov.ph</li>
        <li>Check (✓) appropriate box. Indicate "N/A" for items not applicable.</li>
      </ol>
      <fieldset style="margin-bottom:18px;">
        <legend>APPLICATION TYPE / SERVICE CATEGORIES</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <div class="form1-01-label" style="font-weight:bold;margin-bottom:8px;">Application Type:</div>
            <label><input type="checkbox" name="application_type" value="new"> NEW</label>
            <label><input type="checkbox" name="application_type" value="renewal"> RENEWAL</label>
            <label><input type="checkbox" name="application_type" value="modification"> MODIFICATION due to <input class="form1-01-input" type="text" name="modification_reason" style="display:inline-block;width:200px;margin-left:8px;"></label>
          </div>
          <div class="form1-01-col">
            <div class="form1-01-label" style="font-weight:bold;margin-bottom:8px;">Service Categories:</div>
            <label><input type="checkbox" name="service_category" value="vas_provider"> VALUE-ADDED SERVICE (VAS) PROVIDER</label>
            <label><input type="checkbox" name="service_category" value="pcsotsp"> PUBLIC CALLING STATION/OFFICE / TELECENTER SERVICE PROVIDER (PCSOTSP)</label>
            <label><input type="checkbox" name="service_category" value="voip"> VOICE OVER INTERNET PROTOCOL (VOIP)</label>
            <div style="margin-left:20px;">
              <label><input type="checkbox" name="voip_type" value="voip_provider"> PROVIDER</label>
              <label><input type="checkbox" name="voip_type" value="voip_reseller"> RESELLER</label>
            </div>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>APPLICANT'S DETAILS</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Applicant: <input class="form1-01-input" type="text" name="applicant" required></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Street: <input class="form1-01-input" type="text" name="street"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Unit/Rm/Bldg No.: <input class="form1-01-input" type="text" name="unit_no"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">City/Municipality: <input class="form1-01-input" type="text" name="city"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Barangay: <input class="form1-01-input" type="text" name="barangay"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Zip Code: <input class="form1-01-input" type="text" name="zip_code"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Province: <input class="form1-01-input" type="text" name="province"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Email Address: <input class="form1-01-input" type="email" name="email"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Contact Number: <input class="form1-01-input" type="text" name="contact_number"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Type of Entity:</label>
            <label><input type="checkbox" name="entity_type" value="corporation"> Corporation</label>
            <label><input type="checkbox" name="entity_type" value="single_proprietorship"> Single Proprietorship</label>
          </div>
          <div class="form1-01-col">
            <label><input type="checkbox" name="entity_type" value="partnership"> Partnership</label>
            <label><input type="checkbox" name="entity_type" value="others"> Others, specify <input class="form1-01-input" type="text" name="others_entity" style="display:inline-block;width:200px;margin-left:8px;"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">CPCN/PA/CA No.: <input class="form1-01-input" type="text" name="cpcn_pa_ca_no"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Validity (mm/dd/yy): <input class="form1-01-input" type="date" name="cpcn_validity"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">COR No.: <input class="form1-01-input" type="text" name="cor_no"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Validity (mm/dd/yy): <input class="form1-01-input" type="date" name="cor_validity"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Is applicant known by another name?</label>
            <label><input type="radio" name="known_by_another_name" value="yes"> Yes, indicate former name <input class="form1-01-input" type="text" name="former_name" style="display:inline-block;width:200px;margin-left:8px;"></label>
            <label><input type="radio" name="known_by_another_name" value="no"> No</label>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>LIST OF VALUE ADDED SERVICES (Use separate sheet/s, if necessary)</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="vas_services" value="messaging"> Messaging service</label>
            <label><input type="checkbox" name="vas_services" value="audio_conferencing"> Audio conferencing</label>
            <label><input type="checkbox" name="vas_services" value="audio_video_conferencing"> Audio and Video Conferencing</label>
            <label><input type="checkbox" name="vas_services" value="voice_mail"> Voice mail service</label>
            <label><input type="checkbox" name="vas_services" value="electronic_mail"> Electronic mail service</label>
            <label><input type="checkbox" name="vas_services" value="information_service"> Information service</label>
            <label><input type="checkbox" name="vas_services" value="application_service"> Application service</label>
          </div>
          <div class="form1-01-col">
            <label><input type="checkbox" name="vas_services" value="content_program"> Content and Program service</label>
            <label><input type="checkbox" name="vas_services" value="audiotext"> Audiotext service</label>
            <label><input type="checkbox" name="vas_services" value="facsimile"> Facsimile service</label>
            <label><input type="checkbox" name="vas_services" value="virtual_private_network"> Virtual Private Network service</label>
            <label><input type="checkbox" name="vas_services" value="hosting"> Hosting service</label>
            <label><input type="checkbox" name="vas_services" value="electronic_gaming"> Electronic Gaming Services, except gambling</label>
            <label><input type="checkbox" name="vas_services" value="others"> Others, specify <input class="form1-01-input" type="text" name="others_vas" style="display:inline-block;width:200px;margin-left:8px;"></label>
          </div>
        </div>
      </fieldset>
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
        localStorage.setItem('form1-20-data', JSON.stringify(entries));
        window.location.href = 'Validation.html';
      };
    </script>
  </main>
</body>
</html> 