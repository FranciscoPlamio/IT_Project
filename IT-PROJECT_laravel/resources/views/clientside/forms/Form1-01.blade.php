<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Application for Radio Operator Examination (Form 1-01)</title>
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
        <div><b>Form No.</b> <u>NTC 1-01</u></div>
        <div><b>Revision No.</b> <u>03</u></div>
        <div><b>Revision Date</b> <u>03/31/2023</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container">
      <div class="form1-01-header">APPLICATION FOR RADIO OPERATOR EXAMINATION</div>
      <div class="form1-01-section-title">INSTRUCTIONS:</div>
      <ol style="font-size:0.97rem;margin-bottom:10px;">
        <li>Accomplish this application form properly, in ALL CAPS, handwritten or computer-printed.</li>
        <li>Attach the complete requirements including supporting documents. For the List of requirements, please refer to the <a href="https://ntc.gov.ph" target="_blank">NTC Citizen's Charter</a> at the NTC website: ntc.gov.ph</li>
        <li>Check (✓) appropriate box. Indicate "N/A" for items not applicable.</li>
      </ol>
      <fieldset style="margin-bottom:18px;">
        <legend>EXAM TYPE</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <div class="form1-01-label">Radiotelegraphy</div>
            <label><input type="checkbox" name="exam_type" value="1RTG"> 1RTG - Elements 1, 2, 5, 6 & Code (25/20 wpm)</label>
            <label><input type="checkbox" name="exam_type" value="1RTG-25"> 1RTG - Code (25/20 wpm)</label>
            <label><input type="checkbox" name="exam_type" value="2RTG"> 2RTG - Elements 1, 2, 5, 6 & Code (16 wpm)</label>
            <label><input type="checkbox" name="exam_type" value="2RTG-16"> 2RTG - Code (16 wpm)</label>
            <label><input type="checkbox" name="exam_type" value="3RTG"> 3RTG - Elements 1, 2, 5 & Code (16 wpm)</label>
            <label><input type="checkbox" name="exam_type" value="3RTG-16"> 3RTG - Code (16 wpm)</label>
          </div>
          <div class="form1-01-col">
            <div class="form1-01-label">Amateur</div>
            <label><input type="checkbox" name="exam_type" value="amateur-a"> Class A - Elements 8, 9, 10 & Code (5 wpm)</label>
            <label><input type="checkbox" name="exam_type" value="amateur-a"> Class A - Elements 8, 9, 10 & Code (5 wpm)</label>
            <label><input type="checkbox" name="exam_type" value="amateur-a-code"> Class A - Code (5 wpm) Only</label>
            <label><input type="checkbox" name="exam_type" value="amateur-b"> Class B - Elements 5, 6 & 7</label>
            <label><input type="checkbox" name="exam_type" value="amateur-b2"> Class B - Element 2</label>
            <label><input type="checkbox" name="exam_type" value="amateur-c"> Class C - Elements 2, 3 & 4</label>
            <label><input type="checkbox" name="exam_type" value="amateur-d"> Class D - Element 2</label>
          </div>
          <div class="form1-01-col">
            <div class="form1-01-label">Radiotelephony</div>
            <label><input type="checkbox" name="exam_type" value="1PHN"> 1PHN - Elements 1, 2, 3 & 4</label>
            <label><input type="checkbox" name="exam_type" value="2PHN"> 2PHN - Elements 1, 2 & 3</label>
            <label><input type="checkbox" name="exam_type" value="3PHN"> 3PHN - Elements 1 & 2</label>
            <div class="form1-01-label" style="margin-top:10px;">Restricted Radiotelephony</div>
            <label><input type="checkbox" name="exam_type" value="rroc-aircraft"> RROC - Aircraft - Element 1</label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Date of Exam (mm/dd/yy): <input class="form1-01-input" type="date" name="date_of_exam"></label>
          </div>
          <div class="form1-01-col" style="align-items:flex-end;">
            <label class="form1-01-label">1"x1" ID Picture: <input class="form1-01-input" type="file" name="id_picture" accept="image/*"></label>
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
            <label class="form1-01-label">Date of Birth: <input class="form1-01-input" type="date" name="dob" required></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Sex:
              <input type="radio" name="sex" value="male"> Male
              <input type="radio" name="sex" value="female"> Female
            </label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Nationality: <input class="form1-01-input" type="text" name="nationality"></label>
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
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">School Attended: <input class="form1-01-input" type="text" name="school_attended"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Course Taken: <input class="form1-01-input" type="text" name="course_taken"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Year Graduated: <input class="form1-01-input" type="text" name="year_graduated"></label>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>APPLICANT'S REQUEST FOR ASSISTANCE <span style="font-weight:normal;font-size:0.97rem;">(for persons with disabilities, senior citizens, pregnant women or persons with special needs)</span></legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label>Do you have any special needs and/or requests during the examination?
              <input type="radio" name="special_needs" value="yes"> Yes
              <input type="radio" name="special_needs" value="no"> No
            </label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label>If yes, please indicate your specific needs and/or request:
              <textarea class="form1-01-input" name="special_needs_details" rows="2" style="resize:vertical;"></textarea>
            </label>
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

      <!-- BEFORE KO GAWIN SA LAHAT PA DOUBLE CHECK LANG IF INCLUDED ITONG PART SA BABA -->
      <fieldset style="margin-top:32px;">
        <legend>EXAMINATION ADMISSION SLIP</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label>Please admit Mr./Ms. <input class="form1-01-input" type="text" name="admit_name"> with mailing address at <input class="form1-01-input" type="text" name="admit_address"> in the examination for</label>
            <label>Place of Exam: <input class="form1-01-input" type="text" name="admit_exam_place"></label>
            <label>Date of Exam: <input class="form1-01-input" type="date" name="admit_exam_date"></label>
            <label>Time of Exam: <input class="form1-01-input" type="text" name="admit_exam_time"></label>
          </div>
          <div class="form1-01-col" style="align-items:flex-end;">
            <label class="form1-01-label" style="margin-bottom:16px;">1"x1" ID Picture: <input class="form1-01-input" type="file" name="admit_id_picture" accept="image/*"></label>
            <div style="height:18px;"></div>
            <div style="display:flex;flex-direction:column;align-items:center;margin-top:24px;width:100%;">
              <div style="width:220px;border-bottom:2px solid #222;height:24px;"></div>
              <span style="font-size:0.97rem;margin-top:4px;">Authorized Officer</span>
            </div>
          </div>
        </div>
        <div style="font-size:0.97rem;margin-top:12px;">
          <ol>
            <li>Examinees shall present this Admission Slip and any valid government issued ID with picture or School ID, for students. (No Admission Slip and ID, No Exam.)</li>
            <li>Examinees who are late for more than 30 minutes shall not be allowed to take the examination.</li>
            <li>Request for re-schedule of examination must be filed at least 1 week before the date of examination.</li>
            <li>In case of suspension / cancellation of work in government offices due to force majeure, the scheduled regular examination shall be conducted on the next regular working day.</li>
          </ol>
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
        localStorage.setItem('form1-01-data', JSON.stringify(entries));
        window.location.href = 'Validation.html';
      };
    </script>
  </main>
</body>
</html> 