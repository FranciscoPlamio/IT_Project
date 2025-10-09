@props([
    'form' => [
        'unit' => '',
        'street' => '',
        'barangay' => '',
        'city' => '',
        'province' => '',
        'zip_code' => '',
        'contact_number' => '',
        'email' => '',
    ],
])

<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">Unit/Rm/House/Bldg No.</label>
        <input class="form1-01-input" type="text" name="unit" value="{{ old('unit', $form['unit'] ?? '') }}">
        @error('unit')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">Street</label>
        <input class="form1-01-input" type="text" name="street" value="{{ old('street', $form['street'] ?? '') }}">
        @error('street')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">Barangay</label>
        <input class="form1-01-input" type="text" name="barangay"
            value="{{ old('barangay', $form['barangay'] ?? '') }}">
        @error('barangay')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">City/Municipality</label>
        <input class="form1-01-input" type="text" name="city" value="{{ old('city', $form['city'] ?? '') }}">
        @error('city')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">Province</label>
        <input class="form1-01-input" type="text" name="province"
            value="{{ old('province', $form['province'] ?? '') }}">
        @error('province')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">Zip Code</label>
        <input class="form1-01-input" type="text" name="zip_code"
            value="{{ old('zip_code', $form['zip_code'] ?? '') }}">
        @error('zip_code')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">Contact Number</label>
        <input class="form1-01-input" type="text" name="contact_number"
            value="{{ old('contact_number', $form['contact_number'] ?? '') }}">
        @error('contact_number')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">Email Address</label>
        <input class="form1-01-input" type="email" name="email" value="{{ old('email', $form['email'] ?? '') }}">
        @error('email')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
