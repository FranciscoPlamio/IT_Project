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
        <label class="form-label">Province <span class="required-asterisk">*</span></label>
        <select class="form1-01-input address-select" name="province" id="provinceSelect" required
            data-old-value="{{ old('province', $form['province'] ?? '') }}"
            data-validation="select">
            <option value="">Select Province</option>
        </select>
        @error('province')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">City/Municipality <span class="required-asterisk">*</span></label>
        <select class="form1-01-input address-select" name="city" id="citySelect" disabled required
            data-old-value="{{ old('city', $form['city'] ?? '') }}"
            data-validation="select">
            <option value="">Select City/Municipality</option>
        </select>
        @error('city')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">Barangay <span class="required-asterisk">*</span></label>
        <select class="form1-01-input address-select" name="barangay" id="barangaySelect" disabled required
            data-old-value="{{ old('barangay', $form['barangay'] ?? '') }}"
            data-validation="select">
            <option value="">Select Barangay</option>
        </select>
        @error('barangay')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">ZIP Code <span class="required-asterisk">*</span></label>
        <select class="form1-01-input address-select" name="zip_code" id="zipCodeSelect" disabled required
            data-old-value="{{ old('zip_code', $form['zip_code'] ?? '') }}"
            data-validation="select">
            <option value="">Select ZIP Code</option>
        </select>
        @error('zip_code')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">Unit/Rm/House/Bldg No.</label>
        <input class="form1-01-input" type="text" name="unit" 
            value="{{ old('unit', $form['unit'] ?? '') }}"
            placeholder="Unit number (optional)"
            data-validation="text">
        @error('unit')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">Street</label>
        <input class="form1-01-input" type="text" name="street" 
            value="{{ old('street', $form['street'] ?? '') }}"
            placeholder="Street name (optional)"
            data-validation="text">
        @error('street')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="form-grid-2">
    <div class="form-field">
        <label class="form-label">Contact Number <span class="required-asterisk">*</span></label>
        <input class="form1-01-input" type="tel" name="contact_number" required
            value="{{ old('contact_number', $form['contact_number'] ?? '') }}"
            placeholder="e.g., 09123456789 or +639123456789"
            data-validation="phone">
        @error('contact_number')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-field">
        <label class="form-label">Email Address <span class="required-asterisk">*</span></label>
        <input class="form1-01-input" type="email" name="email" required
            value="{{ old('email', $form['email'] ?? '') }}"
            placeholder="Enter your email address"
            data-validation="email">
        @error('email')
            <p class="text-red text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        class PhilippineAddressManager {
            constructor() {
                this.provinceData = null;
                this.zipCodeData = null;
                this.currentProvince = null;
                this.currentCity = null;
                this.currentBarangay = null;

                this.provinceSelect = document.getElementById('provinceSelect');
                this.citySelect = document.getElementById('citySelect');
                this.barangaySelect = document.getElementById('barangaySelect');
                this.zipCodeSelect = document.getElementById('zipCodeSelect');

                this.remoteUrls = {
                    provinceData: 'https://raw.githubusercontent.com/flores-jacob/philippine-regions-provinces-cities-municipalities-barangays/refs/heads/master/philippine_provinces_cities_municipalities_and_barangays_2019v2.json',
                    zipCodeData: 'https://raw.githubusercontent.com/arnellebalane/zipcodes-ph/refs/heads/master/source/zipcodes.json'
                };

                this.localUrls = {
                    provinceData: '/philippine_provinces_cities_municipalities_and_barangays_2019v2.json',
                    zipCodeData: '/ph-zipcodes.json'
                };

                this.init();
            }

            async init() {
                try {
                    await this.loadData();
                    this.setupEventListeners();
                    this.populateProvinces();
                    this.restoreValues();
                } catch (error) {
                    console.error('Failed to initialize address manager:', error);
                    this.showError('Failed to load address data. Please refresh the page.');
                }
            }

            async loadData() {
                // Try to load province data
                try {
                    this.provinceData = await this.fetchData(this.remoteUrls.provinceData, this.localUrls
                        .provinceData);
                    console.log('Province data loaded successfully');
                } catch (error) {
                    console.error('Failed to load province data:', error);
                    throw error;
                }

                // Try to load zip code data
                try {
                    this.zipCodeData = await this.fetchData(this.remoteUrls.zipCodeData, this.localUrls
                        .zipCodeData);
                    console.log('Zip code data loaded successfully');
                } catch (error) {
                    console.warn('Failed to load zip code data:', error);
                    this.zipCodeData = {};
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

            setupEventListeners() {
                this.provinceSelect.addEventListener('change', (e) => {
                    this.onProvinceChange(e.target.value);
                });

                this.citySelect.addEventListener('change', (e) => {
                    this.onCityChange(e.target.value);
                });

                this.barangaySelect.addEventListener('change', (e) => {
                    this.onBarangayChange(e.target.value);
                });
            }

            populateProvinces() {
                this.provinceSelect.innerHTML = '<option value="">Select Province</option>';

                if (this.provinceData) {
                    const provinces = [];
                    Object.values(this.provinceData).forEach(region => {
                        if (region.province_list) {
                            Object.keys(region.province_list).forEach(provinceName => {
                                provinces.push(provinceName);
                            });
                        }
                    });

                    // Sort provinces alphabetically
                    provinces.sort();

                    provinces.forEach(provinceName => {
                        const option = document.createElement('option');
                        option.value = provinceName;
                        option.textContent = provinceName;
                        this.provinceSelect.appendChild(option);
                    });
                }
            }

            onProvinceChange(provinceName) {
                this.currentProvince = provinceName;
                this.currentCity = null;
                this.currentBarangay = null;

                // Reset dependent fields
                this.citySelect.innerHTML = '<option value="">Select City/Municipality</option>';
                this.barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                this.zipCodeSelect.innerHTML = '<option value="">Select ZIP Code</option>';

                if (!provinceName) {
                    this.citySelect.disabled = true;
                    this.barangaySelect.disabled = true;
                    this.zipCodeSelect.disabled = true;
                    return;
                }

                // Enable city select and populate cities
                this.citySelect.disabled = false;
                this.barangaySelect.disabled = true;
                this.zipCodeSelect.disabled = true;

                // Find cities in the selected province
                if (this.provinceData) {
                    const cities = [];
                    Object.values(this.provinceData).forEach(region => {
                        if (region.province_list && region.province_list[provinceName]) {
                            const cityList = region.province_list[provinceName].municipality_list;
                            if (cityList) {
                                Object.keys(cityList).forEach(cityName => {
                                    cities.push(cityName);
                                });
                            }
                        }
                    });

                    // Sort cities alphabetically
                    cities.sort();

                    cities.forEach(cityName => {
                        const option = document.createElement('option');
                        option.value = cityName;
                        option.textContent = cityName;
                        this.citySelect.appendChild(option);
                    });
                }
            }

            onCityChange(cityName) {
                this.currentCity = cityName;
                this.currentBarangay = null;

                // Reset dependent fields
                this.barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
                this.zipCodeSelect.innerHTML = '<option value="">Select ZIP Code</option>';

                if (!cityName || !this.currentProvince) {
                    this.barangaySelect.disabled = true;
                    this.zipCodeSelect.disabled = true;
                    return;
                }

                // Enable barangay select and populate barangays
                this.barangaySelect.disabled = false;
                this.zipCodeSelect.disabled = true;

                // Find barangays in the selected city
                if (this.provinceData) {
                    const barangays = [];
                    Object.values(this.provinceData).forEach(region => {
                        if (region.province_list && region.province_list[this.currentProvince]) {
                            const cities = region.province_list[this.currentProvince]
                                .municipality_list;
                            if (cities && cities[cityName]) {
                                const barangayList = cities[cityName].barangay_list;
                                if (barangayList) {
                                    barangayList.forEach(barangayName => {
                                        barangays.push(barangayName);
                                    });
                                }
                            }
                        }
                    });

                    // Sort barangays alphabetically
                    barangays.sort();

                    barangays.forEach(barangayName => {
                        const option = document.createElement('option');
                        option.value = barangayName;
                        option.textContent = barangayName;
                        this.barangaySelect.appendChild(option);
                    });
                }

                // Populate zip codes for the selected city
                this.suggestZipCode(cityName);
            }

            onBarangayChange(barangayName) {
                this.currentBarangay = barangayName;
                // Barangay selection doesn't cascade to other fields
            }

            suggestZipCode(cityName) {
                if (!this.zipCodeData || !this.zipCodeSelect) return;

                const matchingZipCodes = [];

                // Search for zip codes that match the city name
                Object.entries(this.zipCodeData).forEach(([zipCode, areas]) => {
                    if (Array.isArray(areas)) {
                        areas.forEach(area => {
                            if (area.toLowerCase().includes(cityName.toLowerCase()) ||
                                cityName.toLowerCase().includes(area.toLowerCase())) {
                                matchingZipCodes.push(zipCode);
                            }
                        });
                    } else if (typeof areas === 'string') {
                        if (areas.toLowerCase().includes(cityName.toLowerCase()) ||
                            cityName.toLowerCase().includes(areas.toLowerCase())) {
                            matchingZipCodes.push(zipCode);
                        }
                    }
                });

                // If we found matching zip codes, populate the select
                if (matchingZipCodes.length > 0) {
                    this.zipCodeSelect.innerHTML = '<option value="">Select ZIP Code</option>';
                    matchingZipCodes.sort();
                    matchingZipCodes.forEach(zipCode => {
                        const option = document.createElement('option');
                        option.value = zipCode;
                        option.textContent = zipCode;
                        this.zipCodeSelect.appendChild(option);
                    });
                    this.zipCodeSelect.disabled = false;
                } else {
                    this.zipCodeSelect.innerHTML = '<option value="">No matching ZIP codes found</option>';
                    this.zipCodeSelect.disabled = true;
                }
            }

            restoreValues() {
                // Restore form values if they exist from data attributes
                const oldProvince = this.provinceSelect.getAttribute('data-old-value');
                const oldCity = this.citySelect.getAttribute('data-old-value');
                const oldBarangay = this.barangaySelect.getAttribute('data-old-value');
                const oldZipCode = this.zipCodeSelect.getAttribute('data-old-value');

                if (oldProvince && oldProvince.trim() !== '') {
                    this.provinceSelect.value = oldProvince;
                    this.onProvinceChange(oldProvince);

                    if (oldCity && oldCity.trim() !== '') {
                        setTimeout(() => {
                            this.citySelect.value = oldCity;
                            this.onCityChange(oldCity);

                            if (oldBarangay && oldBarangay.trim() !== '') {
                                setTimeout(() => {
                                    this.barangaySelect.value = oldBarangay;
                                    this.onBarangayChange(oldBarangay);
                                }, 100);
                            }
                        }, 100);
                    }
                }
                if (oldZipCode && oldZipCode.trim() !== '') {
                    this.zipCodeSelect.value = oldZipCode;
                    this.suggestZipCode(this.currentCity); // Re-suggest based on current city
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

                // Insert error before the first form field
                const firstField = document.querySelector('.form-grid-2');
                if (firstField && firstField.parentNode) {
                    firstField.parentNode.insertBefore(errorDiv, firstField);
                }
            }
        }

        // Initialize the address manager
        new PhilippineAddressManager();
    });
</script>
