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
      <img src="../../images/logo.png" alt="NTC Logo" class="logo">
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
    <form class="form1-01-container">
      <div class="form1-01-header">APPLICATION FOR RADIO OPERATOR CERTIFICATE</div>
      <div class="form1-01-section-title">INSTRUCTIONS:</div>
      <ol style="font-size:0.97rem;margin-bottom:10px;">
        <li>Accomplish this application form properly, in ALL CAPS, handwritten or computer-printed.</li>
        <li>Attach the complete requirements including supporting documents. For the List of requirements, please refer to the <a href="https://ntc.gov.ph" target="_blank">NTC Citizen's Charter</a> at the NTC website: ntc.gov.ph</li>
        <li>Check (✓) appropriate box. Indicate "N/A" for items not applicable.</li>
      </ol>
      <fieldset style="margin-bottom:18px;">
        <legend>TYPE OF APPLICATION</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="application_type" value="new"> NEW</label>
            <label><input type="checkbox" name="application_type" value="renewal"> RENEWAL</label>
            <label><input type="checkbox" name="application_type" value="modification"> MODIFICATION due to <input class="form1-01-input" type="text" name="modification_reason" style="display:inline-block;width:200px;margin-left:8px;"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">NO. OF YEARS: <input class="form1-01-input" type="text" name="years" style="display:inline-block;width:80px;margin-left:8px;"></label>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>TYPE OF CERTIFICATE</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="certificate_type" value="1RTG"> 1RTG</label>
            <label><input type="checkbox" name="certificate_type" value="2RTG"> 2RTG</label>
            <label><input type="checkbox" name="certificate_type" value="3RTG"> 3RTG</label>
            <label><input type="checkbox" name="certificate_type" value="1PHN"> 1PHN</label>
            <label><input type="checkbox" name="certificate_type" value="2PHN"> 2PHN</label>
            <label><input type="checkbox" name="certificate_type" value="3PHN"> 3PHN</label>
          </div>
          <div class="form1-01-col">
            <label><input type="checkbox" name="certificate_type" value="SROP"> SROP</label>
            <label><input type="checkbox" name="certificate_type" value="RROC-Land Mobile"> RROC-Land Mobile (RLM)</label>
            <label><input type="checkbox" name="certificate_type" value="RROC-Aircraft"> RROC-Aircraft</label>
            <label><input type="checkbox" name="certificate_type" value="GROC"> GROC (Government)</label>
            <label><input type="checkbox" name="certificate_type" value="TP RROC-Aircraft"> TP RROC-Aircraft (Foreign Pilot)</label>
            <label><input type="checkbox" name="certificate_type" value="others"> OTHERS, specify <input class="form1-01-input" type="text" name="others_specify" style="display:inline-block;width:150px;margin-left:8px;"></label>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>APPLICANT'S DETAILS</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Last Name: <input class="form1-01-input" type="text" name="last_name" required></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">First Name: <input class="form1-01-input" type="text" name="first_name" required></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Middle Name: <input class="form1-01-input" type="text" name="middle_name"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Date of Birth (mm/dd/yy): <input class="form1-01-input" type="date" name="dob" required></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Weight (kg): <input class="form1-01-input" type="text" name="weight"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Height (cm): <input class="form1-01-input" type="text" name="height"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Sex:
              <input type="radio" name="sex" value="male"> Male
              <input type="radio" name="sex" value="female"> Female
            </label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Nationality: <input class="form1-01-input" type="text" name="nationality"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Status of Employment:
              <input type="radio" name="employment_status" value="employed"> Employed
              <input type="radio" name="employment_status" value="unemployed"> Unemployed
            </label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">If Employed:
              <input type="radio" name="employment_type" value="local"> Local
              <input type="radio" name="employment_type" value="foreign"> Foreign
            </label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Unit/Rm/House/Bldg No.: <input class="form1-01-input" type="text" name="unit_no"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Street: <input class="form1-01-input" type="text" name="street"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Barangay: <input class="form1-01-input" type="text" name="barangay"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">City/Municipality: <input class="form1-01-input" type="text" name="city"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Province: <input class="form1-01-input" type="text" name="province"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Zip Code: <input class="form1-01-input" type="text" name="zip_code"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Contact Number: <input class="form1-01-input" type="text" name="contact_number"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Email Address: <input class="form1-01-input" type="email" name="email"></label>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>EXAM/SEMINAR DETAILS</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Place of Exam/Seminar: <input class="form1-01-input" type="text" name="exam_place"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Date (mm/dd/yy): <input class="form1-01-input" type="date" name="exam_date"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Rating: <input class="form1-01-input" type="text" name="rating"></label>
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
            <input class="form1-01-input" type="text" name="signature_name" placeholder="Signature Over Printed Name of Applicant" style="margin-bottom:16px;max-width:260px;width:100%;" />
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
        localStorage.setItem('form1-02-data', JSON.stringify(entries));
        window.location.href = 'Validation.html';
      };
    </script>
  </main>
</body>
</html> 