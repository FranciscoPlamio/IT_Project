@props([
    'form' => [
        'modification_reason' => '',
        'years' => '',
        'permit_type' => '',
        'applicationType' => '',
    ],
    'showPermit' => false,
])

<div class="form-field">
    <label>
        <input type="radio" name="application_type" value="new"
            {{ old('application_type', $form['application_type'] ?? '') === 'new' ? 'checked' : '' }}>
        NEW
    </label>
    <label>
        <input type="radio" name="application_type" value="renewal"
            {{ old('application_type', $form['application_type'] ?? '') === 'renewal' ? 'checked' : '' }}>
        RENEWAL</label>
    <label>
        <input type="radio" name="application_type" value="modification"
            {{ old('application_type', $form['application_type'] ?? '') === 'modification' ? 'checked' : '' }}>
        MODIFICATION due to</label>
    @error('application_type')
        <p class="text-red text-sm mt-1">{{ $message }}</p>
    @enderror

    <input class="form1-01-input mt-4" type="text" name="modification_reason" placeholder="Reason (if modification)"
        value="{{ old('modification_reason', $form['modification_reason'] ?? '') }}">
    @error('modification_reason')
        <p class="text-red text-sm mt-1">{{ $message }}</p>
    @enderror

    @if ($showPermit)
        <label class="form-label" style="margin-top:12px;">Permit Type</label>
        <label><input type="radio" name="permit_type" value="construction_permit"
                {{ old('permit_type', $form['permit_type'] ?? '') === 'construction_permit' ? 'checked' : '' }}>
            CONSTRUCTION PERMIT</label>
        <label><input type="radio" name="permit_type" value="radio_station_license"
                {{ old('permit_type', $form['permit_type'] ?? '') === 'radio_station_license' ? 'checked' : '' }}>
            RADIO STATION LICENSE</label>
        @error('permit_type')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    @endif

    <label class="form-label">No. of Years</label>
    <input class="form1-01-input" type="text" name="years" placeholder="e.g., 2"
        value="{{ old('years', $form['years'] ?? '') }}">
    @error('years')
        <p class="text-red text-sm mt-1">{{ $message }}</p>
    @enderror

</div>
