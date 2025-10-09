@props([
    'form' => [
        'signature_name' => '',
        'date_accomplished' => '',
        'or_no' => '',
        'or_date' => '',
        'or_amount' => '',
    ],
])

<section class="step-content" id="step-declaration">
    <fieldset>
        <legend>DECLARATION</legend>
        <div class="form1-01-declaration">I hereby declare that all the above entries are true
            and correct. Under the Revised Penal Code, I shall be held liable for any willful
            false statement(s) or misrepresentation(s) made in this application form that may
            serve as a valid ground for the denial of this application and/or
            cancellation/revocation of the permit issued/granted. Further, I am freely giving
            full consent for the collection and processing of personal information in accordance
            with Republic Act No. 10173, Data Privacy Act of 2012.</div>
        <div class="form1-01-signature-row">
            <div class="form1-01-signature-col">
                <input class="signature-line-input" type="text" name="signature_name"
                    placeholder="Signature over Printed Name of Applicant"
                    value="{{ old('signature_name', $form['signature_name'] ?? '') }}" />
                @error('signature_name')
                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                @enderror
                <input class="form1-01-input" type="date" name="date_accomplished" placeholder="Date Accomplished"
                    style="max-width:180px;width:100%;"
                    value="{{ old('date_accomplished', $form['date_accomplished'] ?? '') }}" />
                @error('date_accomplished')
                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form1-01-signature-col" style="border:1px dashed #aaa;padding:12px 8px;min-width:180px;">
                <div style="font-size:0.97rem;margin-bottom:6px;">OR No.:</div>
                <input class="form1-01-input" type="text" name="or_no" style="margin-bottom:6px;"
                    value="{{ old('or_no', $form['or_no'] ?? '') }}" />
                @error('or_no')
                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                @enderror
                <div style="font-size:0.97rem;margin-bottom:6px;">Date:</div>
                <input class="form1-01-input" type="date" name="or_date" style="margin-bottom:6px;"
                    value="{{ old('or_date', $form['or_date'] ?? '') }}" />
                @error('or_date')
                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                @enderror
                <div style="font-size:0.97rem;margin-bottom:6px;">Amount:</div>
                <input class="form1-01-input" type="text" name="or_amount" style="margin-bottom:6px;"
                    value="{{ old('or_amount', $form['or_amount'] ?? '') }}" />
                @error('or_amount')
                    <p class="text-red text-sm mt-1">{{ $message }}</p>
                @enderror
                <div style="font-size:0.97rem;margin-bottom:6px;">Collecting Officer</div>
            </div>
        </div>
        <div class="step-actions"><button type="button" class="btn-secondary" data-prev>Back</button><button
                class="form1-01-btn" type="button" id="validateBtn03">Proceed to Validation</button></div>
    </fieldset>
</section>
