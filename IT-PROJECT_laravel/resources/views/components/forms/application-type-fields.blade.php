@props([
    'form' => [
        'modification_reason' => '',
        'years' => '',
    ],
    'applicationType' => '',
])
<fieldset class="fieldset-compact">
    <legend>Type of Permit/License/Certificate </legend>
    <div class="form-field">
        <label class="form-label">Type of Application</label>


        <label>
            <input type="radio" name="application_type" value="new" {{ $applicationType == 'new' ? 'checked' : '' }}>
            NEW
        </label>
        <label>
            <input type="radio" name="application_type" value="renewal"
                {{ $applicationType == 'renewal' ? 'checked' : '' }}>
            RENEWAL</label>
        <label>
            <input type="radio" name="application_type" value="modification"
                {{ $applicationType == 'modification' ? 'checked' : '' }}>
            MODIFICATION due to</label>
        @error('application_type')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror

        <input class="form1-01-input mt-4" type="text" name="modification_reason"
            placeholder="Reason (if modification)"
            value="{{ old('modification_reason', $form['modification_reason'] ?? '') }}">
        @error('modification_reason')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror


        <label class="form-label">No. of Years</label>
        <input class="form1-01-input" type="text" name="years" placeholder="e.g., 2"
            value="{{ old('years', $form['years'] ?? '') }}">
        @error('years')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror


    </div>
</fieldset>
