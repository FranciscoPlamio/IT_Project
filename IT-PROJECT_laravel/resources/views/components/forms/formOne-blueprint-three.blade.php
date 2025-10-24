@props([
    'form' => [
        'dob' => '',
        'sex' => '',
        'nationality' => '',
    ],
])

<div class="form-grid-3">
    <div class="form-field">
        <label class="form-label">Date of Birth <span class="required-asterisk">*</span>
            <small class="field-hint">(mm/dd/yy)</small>
        </label>
        <input class="form1-01-input" type="date" name="dob" required max="{{ date('Y-m-d') }}"
            value="{{ old('dob', $form['dob'] ?? '') }}"
            data-validation="date">
        @error('dob')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">Sex <span class="required-asterisk">*</span></label>
        <div class="inline-radio">
            <label>
                <input type="radio" name="sex" value="male" required
                    {{ old('sex', $form['sex'] ?? '') === 'male' ? 'checked' : '' }}
                    data-validation="radio">
                Male
            </label>
            <label>
                <input type="radio" name="sex" value="female" required
                    {{ old('sex', $form['sex'] ?? '') === 'female' ? 'checked' : '' }}
                    data-validation="radio">
                Female
            </label>
        </div>
        @error('sex')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-field">
        <label class="form-label">Nationality <span class="required-asterisk">*</span></label>
        <select class="form1-01-input address-select" name="nationality" id="nationalitySelect" required
            data-old-value="{{ old('nationality', $form['nationality'] ?? '') }}"
            data-validation="select">
            <option value="">Select Nationality</option>
        </select>
        @error('nationality')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        class NationalityManager {
            constructor() {
                this.nationalityData = null;
                this.nationalitySelect = document.getElementById('nationalitySelect');

                this.remoteUrl =
                    'https://gist.githubusercontent.com/tiveor/5444753e9919ffe74b41/raw/47e48c7575189ef7ee228e40153a1fa57b5864b1/nationalities.json';
                this.localUrl = '/nationalities.json';

                this.init();
            }

            async init() {
                try {
                    await this.loadData();
                    this.populateNationalities();
                    this.restoreValue();
                } catch (error) {
                    console.error('Failed to initialize nationality manager:', error);
                    this.showError('Failed to load nationality data. Please refresh the page.');
                }
            }

            async loadData() {
                try {
                    this.nationalityData = await this.fetchData(this.remoteUrl, this.localUrl);
                    console.log('Nationality data loaded successfully');
                } catch (error) {
                    console.error('Failed to load nationality data:', error);
                    throw error;
                }
            }

            async fetchData(remoteUrl, localUrl) {
                try {
                    // Try remote first
                    const response = await fetch(remoteUrl);
                    if (response.ok) {
                        const data = await response.json();
                        console.log(`Successfully loaded data from remote: ${remoteUrl}`);
                        return data;
                    }
                    throw new Error(`Remote fetch failed: ${response.status}`);
                } catch (error) {
                    console.warn(`Remote fetch failed, trying local: ${error.message}`);

                    try {
                        // Fallback to local
                        const response = await fetch(localUrl);
                        if (response.ok) {
                            const data = await response.json();
                            console.log(`Successfully loaded data from local: ${localUrl}`);
                            return data;
                        }
                        throw new Error(`Local fetch failed: ${response.status}`);
                    } catch (localError) {
                        console.error(`Both remote and local fetch failed: ${localError.message}`);
                        throw localError;
                    }
                }
            }

            populateNationalities() {
                this.nationalitySelect.innerHTML = '<option value="">Select Nationality</option>';

                if (this.nationalityData && Array.isArray(this.nationalityData)) {
                    // Sort nationalities alphabetically
                    const sortedNationalities = [...this.nationalityData].sort();

                    sortedNationalities.forEach(nationality => {
                        const option = document.createElement('option');
                        option.value = nationality;
                        option.textContent = nationality;
                        this.nationalitySelect.appendChild(option);
                    });
                }
            }

            restoreValue() {
                // Restore form value if it exists from data attribute
                const oldNationality = this.nationalitySelect.getAttribute('data-old-value');

                if (oldNationality && oldNationality.trim() !== '') {
                    this.nationalitySelect.value = oldNationality;
                }
            }

            showError(message) {
                // Create error display
                const errorDiv = document.createElement('div');
                errorDiv.className = 'address-error';
                errorDiv.style.cssText = `
                background: #fee;
                border: 1px solid #fcc;
                color: #c33;
                padding: 10px;
                margin: 10px 0;
                border-radius: 4px;
            `;
                errorDiv.textContent = message;

                // Insert error before the nationality field
                const nationalityField = document.querySelector('#nationalitySelect').closest(
                    '.form-field');
                if (nationalityField && nationalityField.parentNode) {
                    nationalityField.parentNode.insertBefore(errorDiv, nationalityField);
                }
            }
        }

        // Initialize the nationality manager
        new NationalityManager();
    });
</script>
