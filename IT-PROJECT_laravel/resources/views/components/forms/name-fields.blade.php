@props([
    'form' => [
        'last_name' => '',
        'first_name' => '',
        'middle_name' => '',
    ],
])

<div class="form-grid-3">
    <div class="form-field">
        <label class="form-label">Last Name <span class="required-asterisk">*</span></label>
        <input class="form1-01-input" type="text" name="last_name" required
            value="{{ old('last_name', $form['last_name'] ?? '') }}" placeholder="Enter your last name"
            data-validation="name">
        @error('last_name')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">First Name <span class="required-asterisk">*</span></label>
        <input class="form1-01-input" type="text" name="first_name" required
            value="{{ old('first_name', $form['first_name'] ?? '') }}" placeholder="Enter your first name"
            data-validation="name">
        @error('first_name')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">Middle Name</label>
        <input class="form1-01-input" type="text" name="middle_name"
            value="{{ old('middle_name', $form['middle_name'] ?? '') }}" placeholder="Enter your middle name (optional)"
            data-validation="name">
        @error('middle_name')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
