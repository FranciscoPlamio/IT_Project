@props([
    'form' => [
        'last_name' => '',
        'first_name' => '',
        'middle_name' => '',
    ],
])

<div class="form-grid-3">
    <div class="form-field">
        <label class="form-label">Last Name <span class="text-red">*</span>
            <small class="text-gray-500 ms-1">(Letters only)</small>
        </label>
        <input class="form1-01-input" type="text" name="last_name" data-validate="name" minlength="2" maxlength="50"
            pattern="[A-Za-zÀ-ÖØ-öø-ÿÑñ\s'\-]+" title="Only letters, spaces, hyphens, and apostrophes are allowed"
            value="{{ old('last_name', $form['last_name'] ?? '') }}" required>
        @error('last_name')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">First Name <span class="text-red">*</span>
            <small class="text-gray-500 ms-1">(Letters only)</small>
        </label>
        <input class="form1-01-input" type="text" name="first_name" data-validate="name" minlength="2"
            maxlength="50" pattern="[A-Za-zÀ-ÖØ-öø-ÿÑñ\s'\-]+"
            title="Only letters, spaces, hyphens, and apostrophes are allowed"
            value="{{ old('first_name', $form['first_name'] ?? '') }}" required>
        @error('first_name')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">Middle Name
            <small class="text-gray-500 ms-1">(Letters only)</small>
        </label>
        <input class="form1-01-input" type="text" name="middle_name" data-validate="name" minlength="1"
            maxlength="50" pattern="[A-Za-zÀ-ÖØ-öø-ÿÑñ\s'\-]*"
            title="Only letters, spaces, hyphens, and apostrophes are allowed"
            value="{{ old('middle_name', $form['middle_name'] ?? '') }}" required>
        @error('middle_name')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
