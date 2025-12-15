@props([
    'form' => [
        'exam_place' => '',
        'exam_date' => '',
        'rating' => '',
    ],
])
<div class="form-field">
    <label class="form-label">Place of Exam <span class="text-red"> *</span></label>
    <select class="form1-01-input address-select" name="exam_place" id="examPlaceSelect" required
        data-old-value="{{ old('exam_place', $form['exam_place'] ?? '') }}">
        <option value="">Place of Exam</option>
    </select>
    @error('exam_place')
        <p class="text-red text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="form-field">
    <label class="form-label">Date<span class="text-red"> *</span></label>
    <input class="form1-01-input" type="date" name="exam_date" required max="{{ date('Y-m-d') }}"
        value="{{ old('exam_date', $form['exam_date'] ?? '') }}">
    @error('exam_date')
        <p class="text-red text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
<div class="form-field">
    <label class="form-label">Rating<span class="text-red"> *</span></label>
    <input class="form1-01-input" type="text" name="rating" value="{{ old('rating', $form['rating'] ?? '') }}">
    @error('rating')
        <p class="text-red text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        class ExamPlaceManager {
            constructor() {
                this.provinceData = null;
                this.examPlaceSelect = document.getElementById('examPlaceSelect');

                this.remoteUrls = {
                    provinceData: '/philippine_provinces_cities_municipalities_and_barangays_2019v2.json',
                };

                this.localUrls = {
                    provinceData: '/philippine_provinces_cities_municipalities_and_barangays_2019v2.json',
                };

                this.init();
            }

            async init() {
                try {
                    await this.loadData();
                    this.populateCities();
                    this.restoreValue();
                } catch (error) {
                    console.error('Failed to initialize exam place manager:', error);
                    this.showError('Failed to load city data. Please refresh the page.');
                }
            }

            async loadData() {
                try {
                    this.provinceData = await this.fetchData(this.remoteUrls.provinceData, this.localUrls
                        .provinceData);
                    console.log('Province data loaded successfully for exam place');
                } catch (error) {
                    console.error('Failed to load province data:', error);
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

            populateCities() {
                this.examPlaceSelect.innerHTML = '<option value="">Select City</option>';

                if (this.provinceData) {
                    const cities = new Set(); // Use Set to avoid duplicates

                    Object.values(this.provinceData).forEach(region => {
                        if (region.province_list) {
                            Object.values(region.province_list).forEach(province => {
                                if (province.municipality_list) {
                                    Object.keys(province.municipality_list).forEach(
                                        cityName => {
                                            cities.add(cityName);
                                        });
                                }
                            });
                        }
                    });

                    // Sort cities alphabetically
                    const sortedCities = Array.from(cities).sort();

                    sortedCities.forEach(cityName => {
                        const option = document.createElement('option');
                        option.value = cityName;
                        option.textContent = cityName;
                        this.examPlaceSelect.appendChild(option);
                    });
                }
            }

            restoreValue() {
                // Restore form value if it exists from data attribute
                const oldValue = this.examPlaceSelect.getAttribute('data-old-value');

                if (oldValue && oldValue.trim() !== '') {
                    // Wait a bit for options to be populated
                    setTimeout(() => {
                        this.examPlaceSelect.value = oldValue;
                    }, 100);
                }
            }

            showError(message) {
                // Create error display
                const errorDiv = document.createElement('div');
                errorDiv.className = 'exam-place-error';
                errorDiv.style.cssText = `
                    background: #fee;
                    border: 1px solid #fcc;
                    color: #c33;
                    padding: 10px;
                    margin: 10px 0;
                    border-radius: 4px;
                `;
                errorDiv.textContent = message;

                // Insert error before the exam place field
                const examPlaceField = this.examPlaceSelect.closest('.form-field');
                if (examPlaceField && examPlaceField.parentNode) {
                    examPlaceField.parentNode.insertBefore(errorDiv, examPlaceField);
                }
            }
        }

        // Initialize the exam place manager
        new ExamPlaceManager();
    });
</script>
