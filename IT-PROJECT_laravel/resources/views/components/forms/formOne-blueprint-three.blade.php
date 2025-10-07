@props([
    'form' => [
        'dob' => '',
        'sex' => '',
        'nationality' => '',
    ],
])

<div class="form-grid-3">
    <div class="form-field">
        <label class="form-label">Date of Birth
            (mm/dd/yy)
        </label>
        <input class="form1-01-input" type="date" name="dob" max="{{ date('Y-m-d') }}"
            value="{{ old('dob', $form['dob'] ?? '') }}">
        @error('dob')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field"><label class="form-label">Sex</label>
        <div class="inline-radio">
            <label>
                <input type="radio" name="sex" value="male"
                    {{ old('sex', $form['sex'] ?? '') === 'male' ? 'checked' : '' }}>
                Male
            </label>
            <label>
                <input type="radio" name="sex" value="female"
                    {{ old('sex', $form['sex'] ?? '') === 'female' ? 'checked' : '' }}>
                Female
            </label>
        </div>
        @error('sex')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-field">
        <label class="form-label">Nationality</label>
        <input class="form1-01-input" type="text" name="nationality"
            value="{{ old('nationality', $form['nationality'] ?? '') }}">
        @error('nationality')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
