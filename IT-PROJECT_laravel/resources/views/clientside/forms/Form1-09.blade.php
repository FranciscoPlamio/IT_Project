<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Application for Permit to Purchase/Possess/Sell/Transfer (Form 1-09)</title>
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
        <div><b>Form No.</b> <u>NTC 1-09</u></div>
        <div><b>Revision No.</b> <u>03</u></div>
        <div><b>Revision Date</b> <u>03/31/2023</u></div>
      </div>
    </div>
  </header>
  <main>
    <form class="form1-01-container">
      <div class="form1-01-header">APPLICATION FOR PERMIT TO PURCHASE/POSSESS/SELL/TRANSFER</div>
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
            <label><input type="checkbox" name="application_type" value="purchase"> PURCHASE</label>
            <label><input type="checkbox" name="application_type" value="possess"> POSSESS</label>
            <label><input type="checkbox" name="application_type" value="sell_transfer"> SELL/TRANSFER</label>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>TYPE OF RADIO SERVICE</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="radio_service" value="fixed_land_mobile"> FIXED AND LAND MOBILE</label>
            <label><input type="checkbox" name="radio_service" value="aeronautical"> AERONAUTICAL</label>
            <label><input type="checkbox" name="radio_service" value="maritime"> MARITIME</label>
            <label><input type="checkbox" name="radio_service" value="broadcast"> BROADCAST</label>
            <label><input type="checkbox" name="radio_service" value="amateur"> AMATEUR</label>
            <label><input type="checkbox" name="radio_service" value="others"> OTHERS, specify <input class="form1-01-input" type="text" name="others_specify" style="display:inline-block;width:150px;margin-left:8px;"></label>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>NATURE OF SERVICE</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="nature_service" value="cv_private"> CV (PRIVATE)</label>
            <label><input type="checkbox" name="nature_service" value="co_government"> CO (GOVERNMENT)</label>
            <label><input type="checkbox" name="nature_service" value="cp_public"> CP (PUBLIC CORRESPONDENCE)</label>
          </div>
        </div>
      </fieldset>
      <fieldset style="margin-bottom:18px;">
        <legend>CLASS OF STATION (Indicate number of units in the box)</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="station_class" value="rt"> RT (Radio Telephone) <input class="form1-01-input" type="text" name="rt_units" style="display:inline-block;width:60px;margin-left:8px;"></label>
            <label><input type="checkbox" name="station_class" value="fx"> FX (Fixed) <input class="form1-01-input" type="text" name="fx_units" style="display:inline-block;width:60px;margin-left:8px;"></label>
            <label><input type="checkbox" name="station_class" value="fb"> FB (Fixed Base) <input class="form1-01-input" type="text" name="fb_units" style="display:inline-block;width:60px;margin-left:8px;"></label>
            <label><input type="checkbox" name="station_class" value="ml"> ML (Mobile Land) <input class="form1-01-input" type="text" name="ml_units" style="display:inline-block;width:60px;margin-left:8px;"></label>
            <label><input type="checkbox" name="station_class" value="p"> P (Portable) <input class="form1-01-input" type="text" name="p_units" style="display:inline-block;width:60px;margin-left:8px;"></label>
            <label><input type="checkbox" name="station_class" value="bc"> BC (Broadcast) <input class="form1-01-input" type="text" name="bc_units" style="display:inline-block;width:60px;margin-left:8px;"></label>
          </div>
          <div class="form1-01-col">
            <label><input type="checkbox" name="station_class" value="fc"> FC (Fixed Commercial) <input class="form1-01-input" type="text" name="fc_units" style="display:inline-block;width:60px;margin-left:8px;"></label>
            <label><input type="checkbox" name="station_class" value="fa"> FA (Fixed Aeronautical) <input class="form1-01-input" type="text" name="fa_units" style="display:inline-block;width:60px;margin-left:8px;"></label>
            <label><input type="checkbox" name="station_class" value="ma"> MA (Mobile Aeronautical) <input class="form1-01-input" type="text" name="ma_units" style="display:inline-block;width:60px;margin-left:8px;"></label>
            <label><input type="checkbox" name="station_class" value="tc"> TC (Temporary Commercial) <input class="form1-01-input" type="text" name="tc_units" style="display:inline-block;width:60px;margin-left:8px;"></label>
            <label><input type="checkbox" name="station_class" value="others_station"> OTHERS, specify <input class="form1-01-input" type="text" name="others_station_specify" style="display:inline-block;width:100px;margin-left:8px;"> <input class="form1-01-input" type="text" name="others_station_units" style="display:inline-block;width:60px;margin-left:8px;"></label>
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
            <label class="form1-01-label">CPC/CPCN/PA/RSL No.: <input class="form1-01-input" type="text" name="cpc_cpcn_pa_rsl_no"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Unit/Rm/Bldg No.: <input class="form1-01-input" type="text" name="unit_no"></label>
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
          <div class="form1-01-col">
            <label class="form1-01-label">Validity (mm/dd/yy): <input class="form1-01-input" type="date" name="validity"></label>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>PARTICULARS OF PROPOSED STATION/EQUIPMENT (FOR MULTIPLE STATIONS/EQUIPMENT, USE FORM C)</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Exact Location: <input class="form1-01-input" type="text" name="exact_location"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Longitude (deg-min-sec): <input class="form1-01-input" type="text" name="longitude"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Latitude (deg-min-sec): <input class="form1-01-input" type="text" name="latitude"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Points of Comm/Service Area: <input class="form1-01-input" type="text" name="points_of_comm"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Frequency: <input class="form1-01-input" type="text" name="frequency"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Make/Type/Model: <input class="form1-01-input" type="text" name="make_type_model"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Serial Number: <input class="form1-01-input" type="text" name="serial_number"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Bandwidth & Emission: <input class="form1-01-input" type="text" name="bandwidth_emission"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Power Output: <input class="form1-01-input" type="text" name="power_output"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Frequency Range: <input class="form1-01-input" type="text" name="frequency_range"></label>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>SOURCE OF EQUIPMENT</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">Name of Dealer: <input class="form1-01-input" type="text" name="dealer_name"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Authorized Seller/Buyer: <input class="form1-01-input" type="text" name="authorized_seller_buyer"></label>
          </div>
        </div>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label class="form1-01-label">OR/Invoice No.: <input class="form1-01-input" type="text" name="or_invoice_no"></label>
          </div>
          <div class="form1-01-col">
            <label class="form1-01-label">Permit/RSL No.: <input class="form1-01-input" type="text" name="permit_rsl_no"></label>
          </div>
        </div>
      </fieldset>
      <fieldset>
        <legend>INTENDED USE OF EQUIPMENT</legend>
        <div class="form1-01-row">
          <div class="form1-01-col">
            <label><input type="checkbox" name="intended_use" value="new_radio_station"> New Radio Station</label>
            <label><input type="checkbox" name="intended_use" value="additional_radio_station"> Additional Radio Station</label>
            <label><input type="checkbox" name="intended_use" value="change_equipment"> Change of Equipment</label>
            <label><input type="checkbox" name="intended_use" value="additional_equipment"> Additional Equipment</label>
            <label><input type="checkbox" name="intended_use" value="storage"> Storage at: <input class="form1-01-input" type="text" name="storage_location" style="display:inline-block;width:200px;margin-left:8px;"></label>
            <label><input type="checkbox" name="intended_use" value="others_use"> Others, specify <input class="form1-01-input" type="text" name="others_use_specify" style="display:inline-block;width:200px;margin-left:8px;"></label>
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
        localStorage.setItem('form1-09-data', JSON.stringify(entries));
        window.location.href = 'Validation.html';
      };
    </script>
  </main>
</body>
</html> 