<x-layout :title="'Affidavit of Ownership and Loss with Undertaking (Form 1-24)'" :form-header="['formNo' => 'NTC 1-24', 'revisionNo' => '02', 'revisionDate' => '03/31/2023']">

    <main>
        <form class="form1-01-container" id="form124" method="POST"
            action="{{ route('forms.preview', ['formType' => $formType]) }}">
            @csrf
            <input type="hidden" name="form_token"
                value="{{ isset($form['form_token']) ? $form['form_token'] : session('form_token') }}">
            <div class="form1-01-header">AFFIDAVIT OF OWNERSHIP AND LOSS WITH UNDERTAKING</div>
            <div style="text-align:left;font-size:0.97rem;margin-bottom:20px;">
                <div class="form1-01-warning">
                    <div class="form1-01-warning-title">WARNING:</div>
                    Ensure that all details in the name and date of birth fields are correct. We cannot edit those
                    fields on site and you will need to set a new appointment.
                    <div class="form1-01-agree"><label><input type="checkbox" /> I agree / Malinaw sa akin</label>
                    </div>
                </div>
            </div>

            <div class="form-layout">
                <aside class="steps-sidebar">
                    <div class="steps-sidebar-header">Individual Appointment</div>
                    <ul class="steps-list" id="stepsList24">
                        <li class="step-item active" data-step="affiant">Affiant Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="handset">Handset Blocking <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="sim">SIM Card Blocking <span class="step-status">&nbsp;</span>
                        </li>
                        <li class="step-item" data-step="documents">Supporting Documents <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="incident">Incident Details <span
                                class="step-status">&nbsp;</span></li>
                        <li class="step-item" data-step="signature">Signature & Notary <span
                                class="step-status">&nbsp;</span></li>
                    </ul>
                </aside>

                <div>
                    <section class="step-content active" id="step-affiant">
                        <fieldset class="fieldset-compact">
                            <legend>Affiant Information</legend>
                            <div class="inline-text-container">
                                I, <input class="inline-input-name" type="text" name="affiant_name" required
                                    value="{{ old('affiant_name', $form['affiant_name'] ?? '') }}"> of
                                legal age, Filipino citizen and presently residing at <input
                                    class="inline-input-address" type="text" name="residence_address" required
                                    value="{{ old('residence_address', $form['residence_address'] ?? '') }}">,
                                with telephone number <input class="inline-input-phone" type="text"
                                    name="telephone_number"
                                    value="{{ old('telephone_number', $form['telephone_number'] ?? '') }}"> and with
                                office address at <input class="inline-input-address" type="text"
                                    name="office_address"
                                    value="{{ old('office_address', $form['office_address'] ?? '') }}"> and office
                                telephone number <input class="inline-input-phone" type="text"
                                    name="office_telephone"
                                    value="{{ old('office_telephone', $form['office_telephone'] ?? '') }}">, after
                                having been duly sworn to in accordance with law
                                do hereby despose and say:
                            </div>
                            <div class="step-actions"><button type="button" class="btn-primary" data-next>Next</button>
                            </div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-handset">
                        <fieldset class="fieldset-compact">
                            <legend>1. Handset Blocking/Unblocking Request</legend>
                            <div class="text-md" style="margin-bottom:12px;">
                                That I am requesting all CMTS carriers to
                                <label><input type="checkbox" name="request_type[]" value="block"
                                        {{ in_array('block', (array) old('request_type', $form['request_type'] ?? [])) ? 'checked' : '' }}>
                                    BLOCK</label>
                                <label><input type="checkbox" name="request_type[]" value="unblock"
                                        {{ in_array('unblock', (array) old('request_type', $form['request_type'] ?? [])) ? 'checked' : '' }}>
                                    UNBLOCK</label>
                                the GSM handset that was lost/stolen in my possession by an unidentified person/s as
                                owner thereof with particulars as follows:
                            </div>
                            <div class="table-container">
                                <table class="form-table">
                                    <thead>
                                        <tr>
                                            <th>Make/Model/Type</th>
                                            <th>International Mobile Equipment Identification (IMEI)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="phone1_make"
                                                    value="{{ old('phone1_make', $form['phone1_make'] ?? '') }}">
                                            </td>
                                            <td>
                                                <div style="display:flex;gap:2px;">
                                                    <input class="form1-01-input" type="text" name="imei1_1"
                                                        maxlength="1" style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_1', $form['imei1_1'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_2"
                                                        maxlength="1" style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_2', $form['imei1_2'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_3"
                                                        maxlength="1" style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_3', $form['imei1_3'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_4"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_4', $form['imei1_4'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_5"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_5', $form['imei1_5'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_6"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_6', $form['imei1_6'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_7"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_7', $form['imei1_7'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_8"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_8', $form['imei1_8'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_9"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_9', $form['imei1_9'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_10"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_10', $form['imei1_10'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_11"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_11', $form['imei1_11'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_12"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_12', $form['imei1_12'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_13"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_13', $form['imei1_13'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_14"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_14', $form['imei1_14'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei1_15"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei1_15', $form['imei1_15'] ?? '') }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="phone2_make"
                                                    value="{{ old('phone2_make', $form['phone2_make'] ?? '') }}">
                                            </td>
                                            <td>
                                                <div style="display:flex;gap:2px;">
                                                    <input class="form1-01-input" type="text" name="imei2_1"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_1', $form['imei2_1'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_2"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_2', $form['imei2_2'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_3"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_3', $form['imei2_3'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_4"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_4', $form['imei2_4'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_5"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_5', $form['imei2_5'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_6"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_6', $form['imei2_6'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_7"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_7', $form['imei2_7'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_8"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_8', $form['imei2_8'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_9"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_9', $form['imei2_9'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_10"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_10', $form['imei2_10'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_11"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_11', $form['imei2_11'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_12"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_12', $form['imei2_12'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_13"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_13', $form['imei2_13'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_14"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_14', $form['imei2_14'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei2_15"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei2_15', $form['imei2_15'] ?? '') }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="form1-01-input table-input" type="text"
                                                    name="phone3_make"
                                                    value="{{ old('phone3_make', $form['phone3_make'] ?? '') }}">
                                            </td>
                                            <td>
                                                <div style="display:flex;gap:2px;">
                                                    <input class="form1-01-input" type="text" name="imei3_1"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_1', $form['imei3_1'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_2"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_2', $form['imei3_2'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_3"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_3', $form['imei3_3'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_4"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_4', $form['imei3_4'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_5"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_5', $form['imei3_5'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_6"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_6', $form['imei3_6'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_7"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_7', $form['imei3_7'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_8"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_8', $form['imei3_8'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_9"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_9', $form['imei3_9'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_10"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_10', $form['imei3_10'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_11"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_11', $form['imei3_11'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_12"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_12', $form['imei3_12'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_13"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_13', $form['imei3_13'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_14"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_14', $form['imei3_14'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="imei3_15"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('imei3_15', $form['imei3_15'] ?? '') }}">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-sim">
                        <fieldset class="fieldset-compact">
                            <legend>2. SIM Card/Phone Number Blocking Request</legend>
                            <div class="text-md" style="margin-bottom:12px;">
                                That I am also requesting to block the Subscriber Identity Module (SIM) card/cell
                                phone number contained in the lost/stolen cell phone mentioned above;
                            </div>
                            <div class="table-container">
                                <table class="form-table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div style="display:flex;gap:2px;">
                                                    <input class="form1-01-input" type="text" name="phone1_1"
                                                        value="0" readonly
                                                        style="width:20px;text-align:center;padding:2px;background:#f0f0f0;">
                                                    <input class="form1-01-input" type="text" name="phone1_2"
                                                        value="9" readonly
                                                        style="width:20px;text-align:center;padding:2px;background:#f0f0f0;">
                                                    <input class="form1-01-input" type="text" name="phone1_3"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone1_3', $form['phone1_3'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone1_4"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone1_4', $form['phone1_4'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone1_5"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone1_5', $form['phone1_5'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone1_6"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone1_6', $form['phone1_6'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone1_7"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone1_7', $form['phone1_7'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone1_8"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone1_8', $form['phone1_8'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone1_9"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone1_9', $form['phone1_9'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone1_10"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone1_10', $form['phone1_10'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone1_11"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone1_11', $form['phone1_11'] ?? '') }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="display:flex;gap:2px;">
                                                    <input class="form1-01-input" type="text" name="phone2_1"
                                                        value="0" readonly
                                                        style="width:20px;text-align:center;padding:2px;background:#f0f0f0;">
                                                    <input class="form1-01-input" type="text" name="phone2_2"
                                                        value="9" readonly
                                                        style="width:20px;text-align:center;padding:2px;background:#f0f0f0;">
                                                    <input class="form1-01-input" type="text" name="phone2_3"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone2_3', $form['phone2_3'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone2_4"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone2_4', $form['phone2_4'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone2_5"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone2_5', $form['phone2_5'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone2_6"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone2_6', $form['phone2_6'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone2_7"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone2_7', $form['phone2_7'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone2_8"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone2_8', $form['phone2_8'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone2_9"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone2_9', $form['phone2_9'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone2_10"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone2_10', $form['phone2_10'] ?? '') }}">
                                                    <input class="form1-01-input" type="text" name="phone2_11"
                                                        maxlength="1"
                                                        style="width:20px;text-align:center;padding:2px;"
                                                        value="{{ old('phone2_11', $form['phone2_11'] ?? '') }}">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <fieldset style="margin-top:16px;">
                                <legend>3. Undertaking Clause</legend>
                                <div style="font-size:0.97rem;">
                                    That I hereby undertake to hold free from any responsibility or shall not hold
                                    NTC and the above-mentioned carriers liable for whatever claims, loss or damages
                                    that any party may institute by reason of NTC's action to permanently block the
                                    aforementioned unit from usage;
                                </div>
                            </fieldset>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-documents">
                        <fieldset class="fieldset-compact">
                            <legend>4. Supporting Documents and Proof of Ownership</legend>
                            <div class="text-md" style="margin-bottom:12px;">
                                That in support of this request and as proof of my ownership of said cell phone
                                unit, I attached hereto the following documents, after making the original available
                                for comparison;
                            </div>
                            <div class="form-field" data-require-one="input[type=radio]">
                                <div class="form-label">Supporting Documents</div>
                                <label><input type="radio" name="supporting_docs" value="govt_id"
                                        {{ old('supporting_docs', $form['supporting_docs'] ?? '') === 'govt_id' ? 'checked' : '' }}>
                                    Copy of any
                                    government-issued ID OR Passport</label>
                                <label><input type="radio" name="supporting_docs" value="school_id"
                                        {{ old('supporting_docs', $form['supporting_docs'] ?? '') === 'school_id' ? 'checked' : '' }}>
                                    Copy of
                                    school ID (For students)</label>
                                <label><input type="radio" name="supporting_docs" value="birth_cert"
                                        {{ old('supporting_docs', $form['supporting_docs'] ?? '') === 'birth_cert' ? 'checked' : '' }}>
                                    Copy of
                                    Birth Certificate OR NBI Clearance (for cases when ID is not available)</label>
                            </div>
                            <div class="text-md" style="margin-top:16px;margin-bottom:8px;font-weight:bold;">
                                Proof of Ownership (ANY of the following):
                            </div>
                            <div class="form-field" data-require-one="input[type=radio]">
                                <label><input type="radio" name="proof_ownership" value="official_receipt"
                                        {{ old('proof_ownership', $form['proof_ownership'] ?? '') === 'official_receipt' ? 'checked' : '' }}>
                                    Copy of the Official Receipt of the mobile phone</label>
                                <label><input type="radio" name="proof_ownership" value="phone_box"
                                        {{ old('proof_ownership', $form['proof_ownership'] ?? '') === 'phone_box' ? 'checked' : '' }}>
                                    Box of
                                    the mobile phone with International Mobile Equipment Identity (IMEI)</label>
                                <label><input type="radio" name="proof_ownership" value="certificate_purchase"
                                        {{ old('proof_ownership', $form['proof_ownership'] ?? '') === 'certificate_purchase' ? 'checked' : '' }}>
                                    Certificate of Purchase issued by the
                                    Authorized Seller with the Name of the Purchaser, Date of Purchase and
                                    IMEI</label>
                                <label><input type="radio" name="proof_ownership" value="affidavit_loss"
                                        {{ old('proof_ownership', $form['proof_ownership'] ?? '') === 'affidavit_loss' ? 'checked' : '' }}>
                                    In
                                    the absence of 2.1, 2.2 & 2.3, Affidavit (of loss, declaring ownership and
                                    providing a reference for blocking such as IMEI and attached, if available, the
                                    Police Blotter)</label>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-incident">
                        <fieldset class="fieldset-compact">
                            <legend>Additional Information</legend>
                            <div class="form-field" data-require-one="input[type=checkbox]">
                                <div class="form-label">Type of Incident</div>
                                <label><input type="checkbox" name="incident_type[]" value="lost"
                                        {{ in_array('lost', (array) old('incident_type', $form['incident_type'] ?? [])) ? 'checked' : '' }}>
                                    Lost/Misplaced</label>
                                <label><input type="checkbox" name="incident_type[]" value="stolen"
                                        {{ in_array('stolen', (array) old('incident_type', $form['incident_type'] ?? [])) ? 'checked' : '' }}>
                                    Stolen
                                    (Theft/Robbery/Hold-up)</label>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Place of Incident</label><input
                                        class="form1-01-input" type="text" name="place_of_incident"
                                        value="{{ old('place_of_incident', $form['place_of_incident'] ?? '') }}">
                                </div>
                                <div class="form-field"><label class="form-label">Date</label><input
                                        class="form1-01-input" type="date" name="incident_date"
                                        value="{{ old('incident_date', $form['incident_date'] ?? '') }}"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <label class="form-label">Sex</label>
                                    <div class="inline-radio">
                                        <label><input type="radio" name="sex" value="male"
                                                {{ old('sex', $form['sex'] ?? '') === 'male' ? 'checked' : '' }}>
                                            Male</label>
                                        <label><input type="radio" name="sex" value="female"
                                                {{ old('sex', $form['sex'] ?? '') === 'female' ? 'checked' : '' }}>
                                            Female</label>
                                    </div>
                                </div>
                                <div class="form-field">
                                    <label class="form-label">Age</label>
                                    <div class="inline-radio">
                                        <label><input type="radio" name="age_range" value="below_18"
                                                {{ old('age_range', $form['age_range'] ?? '') === 'below_18' ? 'checked' : '' }}>
                                            below
                                            18</label>
                                        <label><input type="radio" name="age_range" value="18_29"
                                                {{ old('age_range', $form['age_range'] ?? '') === '18_29' ? 'checked' : '' }}>
                                            18-29</label>
                                        <label><input type="radio" name="age_range" value="30_39"
                                                {{ old('age_range', $form['age_range'] ?? '') === '30_39' ? 'checked' : '' }}>
                                            30-39</label>
                                        <label><input type="radio" name="age_range" value="40_49"
                                                {{ old('age_range', $form['age_range'] ?? '') === '40_49' ? 'checked' : '' }}>
                                            40-49</label>
                                        <label><input type="radio" name="age_range" value="50_59"
                                                {{ old('age_range', $form['age_range'] ?? '') === '50_59' ? 'checked' : '' }}>
                                            50-59</label>
                                        <label><input type="radio" name="age_range" value="60_up"
                                                {{ old('age_range', $form['age_range'] ?? '') === '60_up' ? 'checked' : '' }}>
                                            60
                                            up</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-field" data-require-one="input[type=checkbox]">
                                <div class="form-label">Time of Incident</div>
                                <label><input type="checkbox" name="time_of_incident[]" value="daytime"
                                        {{ in_array('daytime', (array) old('time_of_incident', $form['time_of_incident'] ?? [])) ? 'checked' : '' }}>
                                    Daytime</label>
                                <label><input type="checkbox" name="time_of_incident[]" value="nighttime"
                                        {{ in_array('nighttime', (array) old('time_of_incident', $form['time_of_incident'] ?? [])) ? 'checked' : '' }}>
                                    Nighttime</label>
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button type="button" class="btn-primary"
                                    data-next>Next</button></div>
                        </fieldset>
                    </section>

                    <section class="step-content" id="step-signature">
                        <fieldset class="fieldset-compact">
                            <legend>5. Execution Clause</legend>
                            <div class="text-md">
                                That I am executing this affidavit of ownership and loss with undertaking to attest
                                to the veracity and truthfulness of the foregoing declaration and to be used for
                                whatever legal intent and purposes the same may thus serve.
                            </div>
                            <div class="text-md" style="margin-top:12px;font-weight:bold;">
                                FURTHER AFFIANT SAYETH NONE.
                            </div>
                        </fieldset>
                        <fieldset class="fieldset-compact">
                            <legend>Affiant Signature</legend>
                            <div class="form-grid-2">
                                <div class="form-field">
                                    <input class="form1-01-input" type="text" name="affiant_signature"
                                        placeholder="AFFIANT" style="margin-bottom:16px;max-width:260px;width:100%;"
                                        value="{{ old('affiant_signature', $form['affiant_signature'] ?? '') }}" />
                                    <div style="font-size:0.97rem;text-align:center;">Signature Over Printed Name
                                    </div>
                                </div>
                                <div class="form-field"><label class="form-label">TIN No.</label><input
                                        class="form1-01-input" type="text" name="tin_no"
                                        value="{{ old('tin_no', $form['tin_no'] ?? '') }}"></div>
                            </div>
                        </fieldset>
                        <fieldset class="fieldset-compact">
                            <legend>Subscription and Sworn</legend>
                            <div class="text-md" style="margin-bottom:12px;">
                                Subscribed and sworn before me this <input class="form1-01-input" type="text"
                                    name="sworn_day" style="display:inline-block;width:80px;margin:0 8px;"
                                    value="{{ old('sworn_day', $form['sworn_day'] ?? '') }}"> day of
                                <input class="form1-01-input" type="text" name="sworn_month"
                                    style="display:inline-block;width:120px;margin:0 8px;"
                                    value="{{ old('sworn_month', $form['sworn_month'] ?? '') }}">, 20<input
                                    class="form1-01-input" type="text" name="sworn_year"
                                    style="display:inline-block;width:60px;margin:0 8px;"
                                    value="{{ old('sworn_year', $form['sworn_year'] ?? '') }}">.
                            </div>
                            <div class="text-md" style="margin-bottom:12px;">
                                Affiant exhibited to me his/her Residence Certificate No. <input class="form1-01-input"
                                    type="text" name="residence_cert_no"
                                    style="display:inline-block;width:150px;margin:0 8px;"
                                    value="{{ old('residence_cert_no', $form['residence_cert_no'] ?? '') }}"> issued
                                at <input class="form1-01-input" type="text" name="residence_cert_place"
                                    style="display:inline-block;width:200px;margin:0 8px;"
                                    value="{{ old('residence_cert_place', $form['residence_cert_place'] ?? '') }}">
                                on
                                <input class="form1-01-input" type="date" name="residence_cert_date"
                                    style="display:inline-block;width:150px;margin:0 8px;"
                                    value="{{ old('residence_cert_date', $form['residence_cert_date'] ?? '') }}">.
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Doc. No.</label><input
                                        class="form1-01-input" type="text" name="doc_no"
                                        value="{{ old('doc_no', $form['doc_no'] ?? '') }}"></div>
                                <div class="form-field"><label class="form-label">Page No.</label><input
                                        class="form1-01-input" type="text" name="page_no"
                                        value="{{ old('page_no', $form['page_no'] ?? '') }}"></div>
                            </div>
                            <div class="form-grid-2">
                                <div class="form-field"><label class="form-label">Book No.</label><input
                                        class="form1-01-input" type="text" name="book_no"
                                        value="{{ old('book_no', $form['book_no'] ?? '') }}"></div>
                                <div class="form-field"><label class="form-label">Series of</label><input
                                        class="form1-01-input" type="text" name="series_of"
                                        value="{{ old('series_of', $form['series_of'] ?? '') }}"></div>
                            </div>
                            <div style="text-align:center;font-size:1.1rem;font-weight:bold;margin-top:16px;">
                                NOTARY PUBLIC
                            </div>
                            <!-- CAPTCHA fields -->
                            <div class="form-field"
                                style="margin:12px 0; display:flex; flex-direction:column; align-items:center;">
                                <div class="g-recaptcha"
                                    data-sitekey="{{ env('RECAPTCHA_SITE_KEY', 'your_site_key') }}"></div>
                                @if (session('captcha_error'))
                                    <p class="text-red text-sm mt-1">{{ session('captcha_error') }}</p>
                                @endif
                            </div>
                            <div class="step-actions"><button type="button" class="btn-secondary"
                                    data-prev>Back</button><button class="form1-01-btn" type="button"
                                    id="validateBtn">Proceed to Validation</button></div>
                        </fieldset>
                    </section>
                </div>
            </div>
        </form>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            (function() {
                const stepsOrder = ['affiant', 'handset', 'sim', 'documents', 'incident', 'signature'];
                const stepsList = document.getElementById('stepsList24');
                const form = document.getElementById('form124');
                if (form) {
                    form.addEventListener('form:validationFailed', function(evt){ try{ evt.preventDefault(); }catch(e){} });
                }

                function showStep(step) {
                    stepsList.querySelectorAll('.step-item').forEach(li => li.classList.toggle('active', li.dataset.step ===
                        step));
                    document.querySelectorAll('.step-content').forEach(s => s.classList.toggle('active', s.id ===
                        `step-${step}`));
                }

                function currentStep() {
                    const a = stepsList.querySelector('.step-item.active');
                    return a ? a.dataset.step : stepsOrder[0];
                }

                function go(d) {
                    const i = stepsOrder.indexOf(currentStep());
                    const n = Math.max(0, Math.min(stepsOrder.length - 1, i + d));
                    showStep(stepsOrder[n]);
                }

                function validateGroups(section) {
                    let ok = true;
                    section.querySelectorAll('[data-require-one]').forEach(group => {
                        const selector = group.getAttribute('data-require-one');
                        const items = group.querySelectorAll(selector);
                        const anyChecked = Array.from(items).some(el => (el.type === 'checkbox' || el.type ===
                            'radio') ? el.checked : Boolean(el.value));
                        if (!anyChecked) ok = false;
                    });
                    return ok;
                }

                function validateActiveStep() {
                    const step = currentStep();
                    const section = document.getElementById(`step-${step}`);
                    let valid = true;
                    section.querySelectorAll('input[required], select[required], textarea[required]').forEach(el => {
                        if (!el.value) valid = false;
                    });
                    if (!validateGroups(section)) valid = false;
                    const li = stepsList.querySelector(`.step-item[data-step="${step}"]`);
                    if (valid) {
                        li.classList.add('completed');
                        li.querySelector('.step-status').textContent = 'Done';
                    } else {
                        li.classList.remove('completed');
                        li.querySelector('.step-status').textContent = '';
                    }
                    return valid;
                }

                stepsList.addEventListener('click', (e) => {
                    const li = e.target.closest('.step-item');
                    if (!li) return;
                    showStep(li.dataset.step);
                });
                document.querySelectorAll('[data-next]').forEach(b => b.addEventListener('click', () => {
                    if (validateActiveStep()) go(1);
                }));
                document.querySelectorAll('[data-prev]').forEach(b => b.addEventListener('click', () => go(-1)));

                const validateBtn = document.getElementById('validateBtn');
                if (validateBtn) {
                    validateBtn.addEventListener('click', async () => {
                        const formData = new FormData(form);
                        formData.forEach((value, key) => {
                            console.log(`${key}: ${value}`);
                        });
                        if (!validateActiveStep()) return;
                        try {
                            if (window.grecaptcha) {
                                const captchaResponse = window.grecaptcha.getResponse();
                                if (!captchaResponse) {
                                    const errorDiv = document.createElement('p');
                                    errorDiv.className = 'text-red text-sm mt-1';
                                    errorDiv.textContent = 'Please complete the CAPTCHA before proceeding.';
                                    document.querySelector('.g-recaptcha').parentNode.appendChild(errorDiv);
                                    return;
                                }
                            }
                        } catch (e) {}
                        form.submit();
                    });
                }
                showStep(stepsOrder[0]);
            })();
        </script>
        @include('components.forms.inline-validator', ['formId' => 'form124'])
    </main>
</x-layout>
