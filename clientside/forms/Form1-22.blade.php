<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Application for TVRO Registration Certificate/TVRO Station License/CATV Station License (Form 1-22)</title>
  <link rel="stylesheet" href="../../styles.css"/>
  <link rel="stylesheet" href="form-style.css"/>
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
      <div class="form-header-info">
        <div><b>Form No.</b> <u>NTC 1-22</u></div>
        <div><b>Revision No.</b> <u>02</u></div>
        <div><b>Revision Date</b> <u>03/31/2023</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container">
      <div class="form1-01-header">APPLICATION FOR TVRO REGISTRATION CERTIFICATE/TVRO STATION LICENSE/CATV STATION LICENSE</div>
      <div class="form1-01-section-title">INSTRUCTIONS:</div>
      <ol class="form-instructions">
        <li>Accomplish this application form properly, in ALL CAPS, handwritten or computer-printed.</li>
        <li>Attach the complete requirements including supporting documents. For the List of requirements, please refer to the <a href="https://ntc.gov.ph" target="_blank">NTC Citizen's Charter</a> at the NTC website: ntc.gov.ph</li>
        <li>Check (✓) appropriate box. Indicate "N/A" for items not applicable.</li>
      </ol>
      <fieldset class="fieldset-compact">
        <legend>TYPE OF APPLICATION</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="application_type" value="new"> NEW</label>
            <label><input type="checkbox" name="application_type" value="renewal"> RENEWAL</label>
            <label><input type="checkbox" name="application_type" value="modification"> Modification, use Form B</label>
          </div>
        </div>
      </fieldset>
      <fieldset class="fieldset-compact">
        <legend>TYPE OF LICENSE/CERTIFICATE</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="license_type" value="tvro_registration"> TVRO REGISTRATION CERTIFICATE</label>
            <label><input type="checkbox" name="license_type" value="tvro_station"> TVRO STATION LICENSE</label>
            <label><input type="checkbox" name="license_type" value="catv_station"> CATV STATION LICENSE</label>
          </div>
        </div>
      </fieldset>
      <fieldset class="fieldset-compact">
        <legend>CLASSIFICATION OF APPLICANT</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="applicant_classification" value="commercial"> COMMERCIAL</label>
            <label><input type="checkbox" name="applicant_classification" value="non_commercial"> NON-COMMERCIAL</label>
          </div>
          <div class="form1-01-col">
            <label><input type="checkbox" name="service_type" value="broadcasting"> BROADCASTING</label>
            <label><input type="checkbox" name="service_type" value="catv"> CATV</label>
            <label><input type="checkbox" name="service_type" value="others"> OTHERS, specify <input class="form1-01-input inline-input" type="text" name="others_service"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">NO. OF YEARS: <input class="form1-01-input inline-input-small" type="number" name="no_of_years"></label>
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
          <div class="form1-01-col">
            <label class="form1-01-label">Validity (mm/dd/yy): <input class="form1-01-input" type="date" name="validity"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">PA/CA No.: <input class="form1-01-input" type="text" name="pa_ca_no"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Service Area: <input class="form1-01-input" type="text" name="service_area"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Exact Location of TVRO System: <input class="form1-01-input full-width-input" type="text" name="exact_location"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Longitude (deg-min-sec): <input class="form1-01-input" type="text" name="longitude"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Latitude (deg-min-sec): <input class="form1-01-input" type="text" name="latitude"></label>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>PARTICULARS OF EQUIPMENT (FOR MULTIPLE EQUIPMENT, USE FORM G)</legend>
        <div class="table-container">
          <table class="form-table">
            <thead>
              <tr>
                <th>LNA/LNB</th>
                <th>RECEIVERS</th>
                <th>COMBINER(S)</th>
                <th>MODULATORS</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="table-field-label"><strong>Make/Type/Model:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="lna_lnb_make">
                  <div class="table-field-label"><strong>Serial No.:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="lna_lnb_serial">
                  <div class="table-field-label"><strong>Frequency Range:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="lna_lnb_frequency">
                </td>
                <td>
                  <div class="table-field-label"><strong>Make/Type/Model:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="receivers_make">
                  <div class="table-field-label"><strong>Serial No.:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="receivers_serial">
                  <div class="table-field-label"><strong>Frequency Range:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="receivers_frequency">
                </td>
                <td>
                  <div class="table-field-label"><strong>Make/Type/Model:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="combiners_make">
                  <div class="table-field-label"><strong>Serial No.:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="combiners_serial">
                  <div class="table-field-label"><strong>Frequency Range:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="combiners_frequency">
                </td>
                <td>
                  <div class="table-field-label"><strong>Make/Type/Model:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="modulators_make">
                  <div class="table-field-label"><strong>Serial No.:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="modulators_serial">
                  <div class="table-field-label"><strong>Frequency Range:</strong></div>
                  <input class="form1-01-input table-input" type="text" name="modulators_frequency">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </fieldset>
      <fieldset>
        <legend>PARTICULARS OF ANTENNA SYSTEM (FOR MULTIPLE ANTENNA, USE FORM G)</legend>
        <div class="table-container">
          <table class="form-table">
            <thead>
              <tr>
                <th>Make/Type/Model</th>
                <th>Dish Diameter</th>
                <th>Polarization</th>
                <th>Azimuth</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input class="form1-01-input table-input" type="text" name="antenna_make">
                </td>
                <td>
                  <input class="form1-01-input table-input" type="text" name="dish_diameter">
                </td>
                <td>
                  <input class="form1-01-input table-input" type="text" name="polarization">
                </td>
                <td>
                  <input class="form1-01-input table-input" type="text" name="azimuth">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </fieldset>
      <fieldset>
        <legend>PARTICULARS OF SIGNAL TO BE RECEIVED (FOR MULTIPLE SIGNAL, USE FORM G)</legend>
        <div class="table-container">
          <table class="form-table">
            <thead>
              <tr>
                <th>Satellite</th>
                <th>Received Frequency</th>
                <th>Polarization</th>
                <th>Name of Programs</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input class="form1-01-input table-input" type="text" name="satellite">
                </td>
                <td>
                  <input class="form1-01-input table-input" type="text" name="received_frequency">
                </td>
                <td>
                  <input class="form1-01-input table-input" type="text" name="signal_polarization">
                </td>
                <td>
                  <input class="form1-01-input table-input" type="text" name="name_of_programs">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </fieldset>
      <fieldset>
        <legend>DECLARATION</legend>
        <div class="form1-01-declaration">
          I hereby declare that all the above entries are true and correct. Under the Revised Penal Code, I shall be held liable for any willful false statement(s) or misrepresentation(s) made in this application form that may serve as a valid ground for the denial of this application and/or cancellation/revocation of the permit issued/granted. Further, I am freely giving full consent for the collection and processing of personal information in accordance with Republic Act No. 10173, Data Privacy Act of 2012.
        </div>
        <div class="form1-01-signature-row">
          <div class="form1-01-signature-col">
            <input class="form1-01-input signature-input" type="text" name="signature_name" placeholder="Signature over Printed Name of Applicant / Duly Authorized Signatory/Representative" />
            <input class="form1-01-input date-input" type="date" name="date_accomplished" placeholder="Date Accomplished" />
          </div>
          <div class="form1-01-signature-col or-section">
            <div class="or-label">OR No.:</div>
            <input class="form1-01-input or-input" type="text" name="or_no" />
            <div class="or-label">Date:</div>
            <input class="form1-01-input or-input" type="date" name="or_date" />
            <div class="or-label">Amount:</div>
            <input class="form1-01-input or-input" type="text" name="or_amount" />
            <div class="or-label">Collecting Officer</div>
          </div>
        </div>
      </fieldset>
      <div class="form-footer">THIS FORM IS NOT FOR SALE AND CAN BE REPRODUCED</div>
      <button class="form1-01-btn validate-button" type="button" id="validateBtn">Proceed to Validation</button>
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
        localStorage.setItem('form1-22-data', JSON.stringify(entries));
        window.location.href = 'Validation.html';
      };
    </script>
  </main>
</body>
</html> 