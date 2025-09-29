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
      <a href="{{ route('homepage') }}" aria-label="Go to homepage">
        <img src="{{ asset('images/logo.png') }}" alt="NTC Logo" class="logo">
      </a>
      <div class="title">
        <p>Republic of the Philippines</p>
        <h1>National Telecommunication Commission<br><span>Cordillera Administrative Region, Baguio City Philippines</span></h1>
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
    <form class="form1-01-container" id="form124">
      <div class="form1-01-header">AFFIDAVIT OF OWNERSHIP AND LOSS WITH UNDERTAKING</div>
      <div style="text-align:center;font-size:0.97rem;margin-bottom:20px;">
        <strong>REPUBLIC OF THE PHILIPPINES</strong><br>
        <strong>QUEZON CITY</strong>
        <div class="form1-01-warning">
				<div class="form1-01-warning-title">WARNING:</div>
				Ensure that all details in the name and date of birth fields are correct. We cannot edit those fields on site and you will need to set a new appointment.
				<div class="form1-01-agree"><label><input type="checkbox"/> I agree / Malinaw sa akin</label></div>
			</div>
      </div>

      <div class="form-layout">
        <aside class="steps-sidebar">
          <div class="steps-sidebar-header">Individual Appointment</div>
          <ul class="steps-list" id="stepsList24">
            <li class="step-item active" data-step="affiant">Affiant Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="handset">Handset Blocking <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="sim">SIM Card Blocking <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="documents">Supporting Documents <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="incident">Incident Details <span class="step-status">&nbsp;</span></li>
            <li class="step-item" data-step="signature">Signature & Notary <span class="step-status">&nbsp;</span></li>
          </ul>
        </aside>

        <div>
          <section class="step-content active" id="step-affiant">
            <fieldset>
              <legend>Affiant Information</legend>
      <div class="inline-text-container">
                I, <input class="inline-input-name" type="text" name="affiant_name" required> of legal age, Filipino citizen and presently residing at <input class="inline-input-address" type="text" name="residence_address" required>, with telephone number <input class="inline-input-phone" type="text" name="telephone_number"> and with office address at <input class="inline-input-address" type="text" name="office_address"> and office telephone number <input class="inline-input-phone" type="text" name="office_telephone">, after having been duly sworn to in accordance with law do hereby despose and say:
      </div>
              <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-handset">
            <fieldset>
              <legend>1. Handset Blocking/Unblocking Request</legend>
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
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
      </fieldset>
          </section>

          <section class="step-content" id="step-sim">
            <fieldset>
              <legend>2. SIM Card/Phone Number Blocking Request</legend>
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
              <fieldset style="margin-top:16px;">
                <legend>3. Undertaking Clause</legend>
        <div style="font-size:0.97rem;">
          That I hereby undertake to hold free from any responsibility or shall not hold NTC and the above-mentioned carriers liable for whatever claims, loss or damages that any party may institute by reason of NTC's action to permanently block the aforementioned unit from usage;
        </div>
      </fieldset>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
            </fieldset>
          </section>

          <section class="step-content" id="step-documents">
            <fieldset>
              <legend>4. Supporting Documents and Proof of Ownership</legend>
        <div style="font-size:0.97rem;margin-bottom:12px;">
          That in support of this request and as proof of my ownership of said cell phone unit, I attached hereto the following documents, after making the original available for comparison;
        </div>
              <div class="form-field" data-require-one="input[type=checkbox]">
                <div class="form-label">Supporting Documents</div>
            <label><input type="checkbox" name="supporting_docs" value="govt_id"> Copy of any government-issued ID OR Passport</label>
            <label><input type="checkbox" name="supporting_docs" value="school_id"> Copy of school ID (For students)</label>
            <label><input type="checkbox" name="supporting_docs" value="birth_cert"> Copy of Birth Certificate OR NBI Clearance (for cases when ID is not available)</label>
        </div>
        <div style="font-size:0.97rem;margin-top:16px;margin-bottom:8px;font-weight:bold;">
          Proof of Ownership (ANY of the following):
        </div>
              <div class="form-field" data-require-one="input[type=checkbox]">
            <label><input type="checkbox" name="proof_ownership" value="official_receipt"> Copy of the Official Receipt of the mobile phone</label>
            <label><input type="checkbox" name="proof_ownership" value="phone_box"> Box of the mobile phone with International Mobile Equipment Identity (IMEI)</label>
            <label><input type="checkbox" name="proof_ownership" value="certificate_purchase"> Certificate of Purchase issued by the Authorized Seller with the Name of the Purchaser, Date of Purchase and IMEI</label>
            <label><input type="checkbox" name="proof_ownership" value="affidavit_loss"> In the absence of 2.1, 2.2 & 2.3, Affidavit (of loss, declaring ownership and providing a reference for blocking such as IMEI and attached, if available, the Police Blotter)</label>
          </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
      </fieldset>
          </section>

          <section class="step-content" id="step-incident">
            <fieldset>
              <legend>Additional Information</legend>
              <div class="form-field" data-require-one="input[type=checkbox]">
                <div class="form-label">Type of Incident</div>
            <label><input type="checkbox" name="incident_type" value="lost"> Lost/Misplaced</label>
            <label><input type="checkbox" name="incident_type" value="stolen"> Stolen (Theft/Robbery/Hold-up)</label>
          </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Place of Incident</label><input class="form1-01-input" type="text" name="place_of_incident"></div>
                <div class="form-field"><label class="form-label">Date</label><input class="form1-01-input" type="date" name="incident_date"></div>
        </div>
              <div class="form-grid-2">
                <div class="form-field">
                  <label class="form-label">Sex</label>
                  <div class="inline-radio">
                    <label><input type="radio" name="sex" value="male"> Male</label>
                    <label><input type="radio" name="sex" value="female"> Female</label>
          </div>
        </div>
                <div class="form-field">
                  <label class="form-label">Age</label>
                  <div class="inline-radio">
                    <label><input type="radio" name="age_range" value="below_18"> below 18</label>
                    <label><input type="radio" name="age_range" value="18_29"> 18-29</label>
                    <label><input type="radio" name="age_range" value="30_39"> 30-39</label>
                    <label><input type="radio" name="age_range" value="40_49"> 40-49</label>
                    <label><input type="radio" name="age_range" value="50_59"> 50-59</label>
                    <label><input type="radio" name="age_range" value="60_up"> 60 up</label>
          </div>
          </div>
        </div>
              <div class="form-field" data-require-one="input[type=checkbox]">
                <div class="form-label">Time of Incident</div>
            <label><input type="checkbox" name="time_of_incident" value="daytime"> Daytime</label>
            <label><input type="checkbox" name="time_of_incident" value="nighttime"> Nighttime</label>
          </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button type="button" class="btn-primary" data-next>Next</button></div>
      </fieldset>
          </section>

          <section class="step-content" id="step-signature">
            <fieldset>
              <legend>5. Execution Clause</legend>
        <div style="font-size:0.97rem;">
          That I am executing this affidavit of ownership and loss with undertaking to attest to the veracity and truthfulness of the foregoing declaration and to be used for whatever legal intent and purposes the same may thus serve.
        </div>
        <div style="font-size:0.97rem;margin-top:12px;font-weight:bold;">
          FURTHER AFFIANT SAYETH NONE.
        </div>
      </fieldset>
      <fieldset>
              <legend>Affiant Signature</legend>
              <div class="form-grid-2">
                <div class="form-field">
            <input class="form1-01-input" type="text" name="affiant_signature" placeholder="AFFIANT" style="margin-bottom:16px;max-width:260px;width:100%;" />
            <div style="font-size:0.97rem;text-align:center;">Signature Over Printed Name</div>
          </div>
                <div class="form-field"><label class="form-label">TIN No.</label><input class="form1-01-input" type="text" name="tin_no"></div>
        </div>
      </fieldset>
            <fieldset>
              <legend>Subscription and Sworn</legend>
        <div style="font-size:0.97rem;margin-bottom:12px;">
          Subscribed and sworn before me this <input class="form1-01-input" type="text" name="sworn_day" style="display:inline-block;width:80px;margin:0 8px;"> day of <input class="form1-01-input" type="text" name="sworn_month" style="display:inline-block;width:120px;margin:0 8px;">, 20<input class="form1-01-input" type="text" name="sworn_year" style="display:inline-block;width:60px;margin:0 8px;">.
        </div>
        <div style="font-size:0.97rem;margin-bottom:12px;">
          Affiant exhibited to me his/her Residence Certificate No. <input class="form1-01-input" type="text" name="residence_cert_no" style="display:inline-block;width:150px;margin:0 8px;"> issued at <input class="form1-01-input" type="text" name="residence_cert_place" style="display:inline-block;width:200px;margin:0 8px;"> on <input class="form1-01-input" type="date" name="residence_cert_date" style="display:inline-block;width:150px;margin:0 8px;">.
        </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Doc. No.</label><input class="form1-01-input" type="text" name="doc_no"></div>
                <div class="form-field"><label class="form-label">Page No.</label><input class="form1-01-input" type="text" name="page_no"></div>
          </div>
              <div class="form-grid-2">
                <div class="form-field"><label class="form-label">Book No.</label><input class="form1-01-input" type="text" name="book_no"></div>
                <div class="form-field"><label class="form-label">Series of</label><input class="form1-01-input" type="text" name="series_of"></div>
        </div>
        <div style="text-align:center;font-size:1.1rem;font-weight:bold;margin-top:16px;">
          NOTARY PUBLIC
        </div>
              <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button class="form1-01-btn" type="button" id="validateBtn24">Proceed to Validation</button></div>
      </fieldset>
          </section>
        </div>
      </div>
    </form>
    <a id="validationLink24" href="{{ route('forms.1-01.validation') }}" style="display:none;">Validation</a>
    <script>
      (function() {
        const stepsOrder = ['affiant','handset','sim','documents','incident','signature'];
        const stepsList = document.getElementById('stepsList24');
        const form = document.getElementById('form124');

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

        const validateBtn = document.getElementById('validateBtn24');
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
            localStorage.setItem('form1-24-data', JSON.stringify(entries));
            localStorage.setItem('active-form', '1-24');
            if (validationLink24) {
              window.location.href = validationLink24.href;
            }
          });
        }
        showStep(stepsOrder[0]);
      })();
    </script>
  </main>
</body>
</html> 