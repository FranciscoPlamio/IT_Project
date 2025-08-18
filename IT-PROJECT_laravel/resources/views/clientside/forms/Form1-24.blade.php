<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Affidavit of Ownership and Loss with Undertaking (Form 1-24)</title>
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
        <div><b>Form No.</b> <u>NTC 1-24</u></div>
        <div><b>Revision No.</b> <u>02</u></div>
        <div><b>Revision Date</b> <u>03/31/2023</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container">
      <div class="form1-01-header">AFFIDAVIT OF OWNERSHIP AND LOSS WITH UNDERTAKING</div>
      <div style="text-align:center;font-size:0.97rem;margin-bottom:20px;">
        <strong>REPUBLIC OF THE PHILIPPINES</strong><br>
        <strong>QUEZON CITY</strong>
      </div>
      <div class="inline-text-container">
        I, <input class="inline-input-name" type="text" name="affiant_name" required> of legal age, Filipino citizen and presently residing at <input class="inline-input-address" type="text" name="residence_address">, with telephone number <input class="inline-input-phone" type="text" name="telephone_number"> and with office address at <input class="inline-input-address" type="text" name="office_address"> and office telephone number <input class="inline-input-phone" type="text" name="office_telephone">, after having been duly sworn to in accordance with law do hereby despose and say:
      </div>
      <fieldset style="margin-bottom:18px;">
        <legend>1. HANDSET BLOCKING/UNBLOCKING REQUEST</legend>
        <div style="font-size:0.97rem;margin-bottom:12px;">
          That I am requesting all CMTS carriers to 
          <label><input type="checkbox" name="request_type" value="block"> BLOCK</label>
          <label><input type="checkbox" name="request_type" value="unblock"> UNBLOCK</label>
          the GSM handset that was lost/stolen in my possession by an unidentified person/s as owner thereof with particulars as follows:
        </div>
        <div style="overflow-x:auto;">
          <table style="width:100%;border-collapse:collapse;margin-top:12px;">
            <thead>
              <tr style="background-color:#f5f5f5;">
                <th style="border:1px solid #ddd;padding:8px;text-align:left;font-size:0.97rem;width:40%;">Make/Model/Type</th>
                <th style="border:1px solid #ddd;padding:8px;text-align:left;font-size:0.97rem;width:60%;">International Mobile Equipment Identification (IMEI)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="border:1px solid #ddd;padding:8px;">
                  <input class="form1-01-input" type="text" name="phone1_make" style="border:none;width:100%;padding:4px;">
                </td>
                <td style="border:1px solid #ddd;padding:8px;">
                  <div style="display:flex;gap:2px;">
                    <input class="form1-01-input" type="text" name="imei1_1" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_2" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_3" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_4" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_5" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_6" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_7" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_8" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_9" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_10" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_11" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_12" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_13" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_14" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei1_15" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                  </div>
                </td>
              </tr>
              <tr>
                <td style="border:1px solid #ddd;padding:8px;">
                  <input class="form1-01-input" type="text" name="phone2_make" style="border:none;width:100%;padding:4px;">
                </td>
                <td style="border:1px solid #ddd;padding:8px;">
                  <div style="display:flex;gap:2px;">
                    <input class="form1-01-input" type="text" name="imei2_1" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_2" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_3" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_4" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_5" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_6" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_7" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_8" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_9" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_10" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_11" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_12" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_13" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_14" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei2_15" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                  </div>
                </td>
              </tr>
              <tr>
                <td style="border:1px solid #ddd;padding:8px;">
                  <input class="form1-01-input" type="text" name="phone3_make" style="border:none;width:100%;padding:4px;">
                </td>
                <td style="border:1px solid #ddd;padding:8px;">
                  <div style="display:flex;gap:2px;">
                    <input class="form1-01-input" type="text" name="imei3_1" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_2" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_3" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_4" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_5" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_6" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_7" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_8" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_9" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_10" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_11" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_12" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_13" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_14" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="imei3_15" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>2. SIM CARD/PHONE NUMBER BLOCKING REQUEST</legend>
        <div style="font-size:0.97rem;margin-bottom:12px;">
          That I am also requesting to block the Subscriber Identity Module (SIM) card/cell phone number contained in the lost/stolen cell phone mentioned above;
        </div>
        <div style="overflow-x:auto;">
          <table style="width:100%;border-collapse:collapse;margin-top:12px;">
            <tbody>
              <tr>
                <td style="border:1px solid #ddd;padding:8px;">
                  <div style="display:flex;gap:2px;">
                    <input class="form1-01-input" type="text" name="phone1_1" value="0" readonly style="width:20px;text-align:center;padding:2px;background:#f0f0f0;">
                    <input class="form1-01-input" type="text" name="phone1_2" value="9" readonly style="width:20px;text-align:center;padding:2px;background:#f0f0f0;">
                    <input class="form1-01-input" type="text" name="phone1_3" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone1_4" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone1_5" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone1_6" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone1_7" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone1_8" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone1_9" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone1_10" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone1_11" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                  </div>
                </td>
              </tr>
              <tr>
                <td style="border:1px solid #ddd;padding:8px;">
                  <div style="display:flex;gap:2px;">
                    <input class="form1-01-input" type="text" name="phone2_1" value="0" readonly style="width:20px;text-align:center;padding:2px;background:#f0f0f0;">
                    <input class="form1-01-input" type="text" name="phone2_2" value="9" readonly style="width:20px;text-align:center;padding:2px;background:#f0f0f0;">
                    <input class="form1-01-input" type="text" name="phone2_3" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone2_4" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone2_5" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone2_6" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone2_7" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone2_8" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone2_9" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone2_10" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                    <input class="form1-01-input" type="text" name="phone2_11" maxlength="1" style="width:20px;text-align:center;padding:2px;">
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>3. UNDERTAKING CLAUSE</legend>
        <div style="font-size:0.97rem;">
          That I hereby undertake to hold free from any responsibility or shall not hold NTC and the above-mentioned carriers liable for whatever claims, loss or damages that any party may institute by reason of NTC's action to permanently block the aforementioned unit from usage;
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>4. SUPPORTING DOCUMENTS AND PROOF OF OWNERSHIP</legend>
        <div style="font-size:0.97rem;margin-bottom:12px;">
          That in support of this request and as proof of my ownership of said cell phone unit, I attached hereto the following documents, after making the original available for comparison;
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="supporting_docs" value="govt_id"> Copy of any government-issued ID OR Passport</label>
            <label><input type="checkbox" name="supporting_docs" value="school_id"> Copy of school ID (For students)</label>
            <label><input type="checkbox" name="supporting_docs" value="birth_cert"> Copy of Birth Certificate OR NBI Clearance (for cases when ID is not available)</label>
          </div>
        </div>
        <div style="font-size:0.97rem;margin-top:16px;margin-bottom:8px;font-weight:bold;">
          Proof of Ownership (ANY of the following):
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="proof_ownership" value="official_receipt"> Copy of the Official Receipt of the mobile phone</label>
            <label><input type="checkbox" name="proof_ownership" value="phone_box"> Box of the mobile phone with International Mobile Equipment Identity (IMEI)</label>
            <label><input type="checkbox" name="proof_ownership" value="certificate_purchase"> Certificate of Purchase issued by the Authorized Seller with the Name of the Purchaser, Date of Purchase and IMEI</label>
            <label><input type="checkbox" name="proof_ownership" value="affidavit_loss"> In the absence of 2.1, 2.2 & 2.3, Affidavit (of loss, declaring ownership and providing a reference for blocking such as IMEI and attached, if available, the Police Blotter)</label>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>ADDITIONAL INFORMATION</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="incident_type" value="lost"> Lost/Misplaced</label>
            <label><input type="checkbox" name="incident_type" value="stolen"> Stolen (Theft/Robbery/Hold-up)</label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Place of Incident: <input class="form1-01-input" type="text" name="place_of_incident"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Date: <input class="form1-01-input" type="date" name="incident_date"></label>
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
            <label class="form1-01-label">Age:
              <input type="radio" name="age_range" value="below_18"> below 18
              <input type="radio" name="age_range" value="18_29"> 18-29
              <input type="radio" name="age_range" value="30_39"> 30-39
              <input type="radio" name="age_range" value="40_49"> 40-49
              <input type="radio" name="age_range" value="50_59"> 50-59
              <input type="radio" name="age_range" value="60_up"> 60 up
            </label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="time_of_incident" value="daytime"> Daytime</label>
            <label><input type="checkbox" name="time_of_incident" value="nighttime"> Nighttime</label>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>5. EXECUTION CLAUSE</legend>
        <div style="font-size:0.97rem;">
          That I am executing this affidavit of ownership and loss with undertaking to attest to the veracity and truthfulness of the foregoing declaration and to be used for whatever legal intent and purposes the same may thus serve.
        </div>
        <div style="font-size:0.97rem;margin-top:12px;font-weight:bold;">
          FURTHER AFFIANT SAYETH NONE.
        </div>
      </fieldset>
      <fieldset>
        <legend>AFFIANT SIGNATURE</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <input class="form1-01-input" type="text" name="affiant_signature" placeholder="AFFIANT" style="margin-bottom:16px;max-width:260px;width:100%;" />
            <div style="font-size:0.97rem;text-align:center;">Signature Over Printed Name</div>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">TIN No.: <input class="form1-01-input" type="text" name="tin_no"></label>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>SUBSCRIPTION AND SWORN</legend>
        <div style="font-size:0.97rem;margin-bottom:12px;">
          Subscribed and sworn before me this <input class="form1-01-input" type="text" name="sworn_day" style="display:inline-block;width:80px;margin:0 8px;"> day of <input class="form1-01-input" type="text" name="sworn_month" style="display:inline-block;width:120px;margin:0 8px;">, 20<input class="form1-01-input" type="text" name="sworn_year" style="display:inline-block;width:60px;margin:0 8px;">.
        </div>
        <div style="font-size:0.97rem;margin-bottom:12px;">
          Affiant exhibited to me his/her Residence Certificate No. <input class="form1-01-input" type="text" name="residence_cert_no" style="display:inline-block;width:150px;margin:0 8px;"> issued at <input class="form1-01-input" type="text" name="residence_cert_place" style="display:inline-block;width:200px;margin:0 8px;"> on <input class="form1-01-input" type="date" name="residence_cert_date" style="display:inline-block;width:150px;margin:0 8px;">.
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Doc. No.: <input class="form1-01-input" type="text" name="doc_no"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Page No.: <input class="form1-01-input" type="text" name="page_no"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Book No.: <input class="form1-01-input" type="text" name="book_no"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Series of: <input class="form1-01-input" type="text" name="series_of"></label>
          </div>
        </div>
        <div style="text-align:center;font-size:1.1rem;font-weight:bold;margin-top:16px;">
          NOTARY PUBLIC
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
        localStorage.setItem('form1-24-data', JSON.stringify(entries));
        window.location.href = 'Validation.html';
      };
    </script>
  </main>
</body>
</html> 