@props([
    'form' => [
        'modification_reason' => '',
        'years' => '',
        'permit_type' => '',
        'applicationType' => '',
    ],
    'showPermit' => false,
    'showYears' => true,
    'showModification' => false,
    'category' => '',
])

<div class="form-field">

    @if ($category === 'mod')
        <label>
            <input type="radio" name="application_type" value="modification"
                {{ old('application_type', $form['application_type'] ?? '') === 'modification' ? 'checked' : '' }}checked>MODIFICATION
        </label>
        @error('application_type')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
        <input class="form1-01-input mt-4" type="text" name="modification_reason" placeholder="Reason"
            value="{{ old('modification_reason', $form['modification_reason'] ?? '') }}">
        @error('modification_reason')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    @else
        <label>
            <input type="radio" name="application_type" value="new"
                {{ old('application_type', $form['application_type'] ?? '') === 'new' ? 'checked' : '' }}>
            NEW
        </label>
        <label>
            <input type="radio" name="application_type" value="renewal"
                {{ old('application_type', $form['application_type'] ?? '') === 'renewal' ? 'checked' : '' }}>
            RENEWAL</label>
    @endif
    {{-- @if ($showModification)
        <label>
            <input type="radio" name="application_type" value="modification"
                {{ old('application_type', $form['application_type'] ?? '') === 'modification' ? 'checked' : '' }}>
            MODIFICATION (Use form B)
        </label>
        @error('application_type')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
        <input class="form1-01-input mt-4" type="text" name="modification_reason" placeholder="Use form B"
            value="{{ old('modification_reason', $form['modification_reason'] ?? '') }}">
        @error('modification_reason')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    @else
        <label>
            <input type="radio" name="application_type" value="modification"
                {{ old('application_type', $form['application_type'] ?? '') === 'modification' ? 'checked' : '' }}>MODIFICATION
            due to
        </label>
        @error('application_type')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
        <input class="form1-01-input mt-4" type="text" name="modification_reason"
            placeholder="Reason (if modification)"
            value="{{ old('modification_reason', $form['modification_reason'] ?? '') }}">
        @error('modification_reason')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    @endif --}}



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
    @if ($category !== 'mod')
        <label class="form-label">No. of Years</label>
        <select name="years" class="form1-01-input w-full border rounded px-3 py-2"
            value="{{ old('years', $form['years'] ?? '') }}">
            <option value="" disabled selected>Select years</option>
            <option value="1" {{ old('years', $form['years'] ?? '') == 1 ? 'selected' : '' }}>1</option>
            <option value="2" {{ old('years', $form['years'] ?? '') == 2 ? 'selected' : '' }}>2</option>
            <option value="3" {{ old('years', $form['years'] ?? '') == 3 ? 'selected' : '' }}>3</option>
        </select>
        @error('years')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    @endif
</div>
