@props([
    'form' => [
        'last_name' => '',
        'first_name' => '',
        'middle_name' => '',
    ],
])

<div class="form-grid-3">
    <div class="form-field"><label class="form-label">Last Name <span class="text-red">*</span></label>
        <input class="form1-01-input" type="text" name="last_name"
            value="{{ old('last_name', $form['last_name'] ?? '') }}">
        @error('last_name')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field"><label class="form-label">First Name <span class="text-red">*</span></label>
        <input class="form1-01-input" type="text" name="first_name"
            value="{{ old('first_name', $form['first_name'] ?? '') }}">
        @error('first_name')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field"><label class="form-label">Middle Name</label>
        <input class="form1-01-input" type="text" name="middle_name"
            value="{{ old('middle_name', $form['middle_name'] ?? '') }}">
        @error('middle_name')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
