/**
 * Real-time Form Validation Module
 * 
 * Provides instant field validation with visual feedback.
 * Validates fields on blur and input events, showing errors in real-time.
 */
class FormValidator {
    constructor(formId, formType, options = {}) {
        this.form = document.getElementById(formId);
        this.formType = formType;
        this.debounceTimers = {};
        this.validatedFields = new Set();
        
        // Configuration options
        this.options = {
            validateOnBlur: true,
            validateOnInput: true,
            immediateValidation: true, // Show errors immediately without debounce
            debounceDelay: 0, // No delay - instant validation
            showSuccessState: true,
            apiEndpoint: '/api/validate/field',
            ...options
        };

        // Client-side validation patterns
        this.patterns = {
            // Names: Only letters (including accented), spaces, hyphens, apostrophes
            name: /^[A-Za-zÀ-ÖØ-öø-ÿÑñ\s'\-]+$/,
            // Philippine mobile: starts with 09, followed by 9 digits
            phMobile: /^09\d{9}$/,
            // General contact: 10-11 digits only
            contactNumber: /^\d{10,11}$/,
            // Email: Gmail, Yahoo, Outlook only
            email: /^[A-Za-z0-9](?:[A-Za-z0-9.]{4,28}[A-Za-z0-9])@(gmail|yahoo|outlook)\.com$/i,
            // Integers only
            integer: /^-?\d+$/,
            // Numeric (with decimals)
            numeric: /^-?\d+(\.\d+)?$/,
            // Coordinates
            coordinate: /^-?\d+(\.\d+)?$/,
            // Rating: 1-100 only, no decimals, no leading zeros
            rating: /^(100|[1-9][0-9]?)$/
        };

        // Field type mappings
        this.fieldTypes = {
            'last_name': 'name',
            'first_name': 'name',
            'middle_name': 'name',
            'signature_name': 'name',
            'admit_name': 'name',
            'applicant': 'name',
            'contact_number': 'phMobile',
            'email': 'email',
            'rating': 'rating',
            'height': 'numeric',
            'weight': 'numeric',
            'or_amount': 'numeric',
            'rsl_no': 'numeric',
            'years': 'integer',
            'rt_units': 'integer',
            'fx_units': 'integer',
            'fb_units': 'integer',
            'ml_units': 'integer',
            'p_units': 'integer',
            'bc_units': 'integer',
            'fc_units': 'integer',
            'fa_units': 'integer',
            'ma_units': 'integer',
            'tc_units': 'integer',
            'others_station_units': 'integer',
            'longitude': 'coordinate',
            'latitude': 'coordinate'
        };

        // Error messages for client-side validation
        this.messages = {
            name: 'This field must contain only letters, spaces, hyphens, or apostrophes. Numbers are not allowed.',
            phMobile: 'Please enter a valid 11-digit Philippine mobile number starting with 09 (e.g., 09171234567).',
            contactNumber: 'Please enter a valid contact number with 10-11 digits.',
            email: 'Please enter a valid Gmail, Yahoo, or Outlook email address.',
            integer: 'This field must be a whole number.',
            numeric: 'This field must be a number.',
            coordinate: 'Please enter a valid coordinate value.',
            rating: 'Please enter a rating between 1 and 100 (whole numbers only).',
            required: 'This field is required.',
            minLength: 'This field must be at least {min} characters.',
            maxLength: 'This field must not exceed {max} characters.'
        };

        if (this.form) {
            this.init();
        }
    }

    init() {
        this.attachEventListeners();
        this.createStyles();
    }

    /**
     * Get field type from name or data-validate attribute
     */
    getFieldType(input) {
        // First check data-validate attribute
        const dataValidate = input.getAttribute('data-validate');
        if (dataValidate && this.patterns[dataValidate]) {
            return dataValidate;
        }
        // Fall back to field name mapping
        return this.fieldTypes[input.name] || null;
    }

    /**
     * Attach blur and input event listeners to form fields
     */
    attachEventListeners() {
        const inputs = this.form.querySelectorAll('input, select, textarea');
        
        inputs.forEach(input => {
            const fieldName = input.name;
            if (!fieldName) return;

            const fieldType = this.getFieldType(input);

            // Blur event - validate when field loses focus
            if (this.options.validateOnBlur) {
                input.addEventListener('blur', (e) => {
                    this.validateField(fieldName, input.value, input);
                });
            }

            // Input event - ALWAYS validate immediately and block invalid characters
            input.addEventListener('input', (e) => {
                const currentFieldType = this.getFieldType(input);
                if (currentFieldType) {
                    // Block invalid characters by removing them immediately
                    const sanitized = this.sanitizeInput(currentFieldType, input.value);
                    if (sanitized !== input.value) {
                        // Invalid character was typed - show error and remove it
                        const invalidChar = this.findInvalidCharacter(currentFieldType, input.value);
                        input.value = sanitized;
                        this.showFieldError(input, this.getImmediateErrorMessage(currentFieldType, invalidChar));
                        return;
                    }
                }
                
                // Regular validation for other checks
                this.validateFieldInstant(fieldName, input.value, input);
            });

            // Keypress event - prevent invalid characters before they're typed
            if (fieldType === 'name') {
                input.addEventListener('keypress', (e) => {
                    const char = String.fromCharCode(e.which);
                    if (!/^[A-Za-zÀ-ÖØ-öø-ÿÑñ\s'\-]$/.test(char) && !e.ctrlKey && !e.metaKey) {
                        e.preventDefault();
                        this.showFieldError(input, 'Numbers and special characters are not allowed. Use only letters.');
                    }
                });

                // Handle paste events
                input.addEventListener('paste', (e) => {
                    const pastedText = (e.clipboardData || window.clipboardData).getData('text');
                    if (!/^[A-Za-zÀ-ÖØ-öø-ÿÑñ\s'\-]*$/.test(pastedText)) {
                        e.preventDefault();
                        // Allow paste but sanitize it
                        const sanitized = pastedText.replace(/[^A-Za-zÀ-ÖØ-öø-ÿÑñ\s'\-]/g, '');
                        const start = input.selectionStart;
                        const end = input.selectionEnd;
                        input.value = input.value.substring(0, start) + sanitized + input.value.substring(end);
                        this.showFieldError(input, 'Invalid characters were removed. Only letters are allowed.');
                    }
                });
            }

            if (fieldType === 'integer') {
                input.addEventListener('keypress', (e) => {
                    const char = String.fromCharCode(e.which);
                    if (!/^[\d-]$/.test(char) && !e.ctrlKey && !e.metaKey) {
                        e.preventDefault();
                        this.showFieldError(input, 'Only whole numbers are allowed. Letters are not permitted.');
                    }
                });
            }

            if (fieldType === 'numeric' || fieldType === 'coordinate') {
                input.addEventListener('keypress', (e) => {
                    const char = String.fromCharCode(e.which);
                    if (!/^[\d.\-]$/.test(char) && !e.ctrlKey && !e.metaKey) {
                        e.preventDefault();
                        this.showFieldError(input, 'Only numbers are allowed.');
                    }
                });
            }

            if (fieldType === 'phMobile' || fieldType === 'contactNumber') {
                input.addEventListener('keypress', (e) => {
                    const char = String.fromCharCode(e.which);
                    if (!/^\d$/.test(char) && !e.ctrlKey && !e.metaKey) {
                        e.preventDefault();
                        this.showFieldError(input, 'Only numbers are allowed for contact number.');
                    }
                });
            }

            if (fieldType === 'rating') {
                input.addEventListener('keypress', (e) => {
                    const char = String.fromCharCode(e.which);
                    // Only allow digits
                    if (!/^\d$/.test(char) && !e.ctrlKey && !e.metaKey) {
                        e.preventDefault();
                        this.showFieldError(input, 'Only whole numbers (1-100) are allowed for rating.');
                    }
                });
            }
        });
    }

    /**
     * Sanitize input by removing invalid characters based on field type
     */
    sanitizeInput(fieldType, value) {
        switch (fieldType) {
            case 'name':
                return value.replace(/[^A-Za-zÀ-ÖØ-öø-ÿÑñ\s'\-]/g, '');
            case 'integer':
                // Allow minus at start only, then digits
                let intVal = value.replace(/[^0-9\-]/g, '');
                // Remove minus signs that are not at the start
                if (intVal.indexOf('-') > 0) {
                    intVal = intVal.charAt(0) + intVal.substring(1).replace(/-/g, '');
                }
                return intVal;
            case 'numeric':
            case 'coordinate':
                // Allow digits, one decimal, minus at start
                let numVal = value.replace(/[^0-9.\-]/g, '');
                // Keep only first decimal point
                const parts = numVal.split('.');
                if (parts.length > 2) {
                    numVal = parts[0] + '.' + parts.slice(1).join('');
                }
                return numVal;
            case 'rating':
                // Only allow digits, no decimals
                let ratingVal = value.replace(/[^0-9]/g, '');
                // Remove leading zeros (except if it's just "0")
                ratingVal = ratingVal.replace(/^0+/, '');
                // Limit to 3 characters max (for 100)
                if (ratingVal.length > 3) {
                    ratingVal = ratingVal.substring(0, 3);
                }
                // If value is greater than 100, cap it at 100
                if (parseInt(ratingVal) > 100) {
                    ratingVal = '100';
                }
                return ratingVal;
            case 'phMobile':
            case 'contactNumber':
                return value.replace(/[^0-9]/g, '');
            default:
                return value;
        }
    }

    /**
     * Find the invalid character that was typed
     */
    findInvalidCharacter(fieldType, value) {
        switch (fieldType) {
            case 'name':
                const nameMatch = value.match(/[^A-Za-zÀ-ÖØ-öø-ÿÑñ\s'\-]/);
                return nameMatch ? nameMatch[0] : '';
            case 'integer':
            case 'numeric':
            case 'coordinate':
                const numMatch = value.match(/[^0-9.\-]/);
                return numMatch ? numMatch[0] : '';
            case 'phMobile':
            case 'contactNumber':
            case 'rating':
                const phoneMatch = value.match(/[^0-9]/);
                return phoneMatch ? phoneMatch[0] : '';
            default:
                return '';
        }
    }

    /**
     * Get immediate error message based on field type and invalid character
     */
    getImmediateErrorMessage(fieldType, invalidChar) {
        const charDesc = invalidChar ? ` "${invalidChar}"` : '';
        switch (fieldType) {
            case 'name':
                if (/\d/.test(invalidChar)) {
                    return `Numbers are not allowed in this field. Please use only letters.`;
                }
                return `Invalid character${charDesc} removed. Only letters, spaces, hyphens, and apostrophes are allowed.`;
            case 'integer':
                return `Invalid character${charDesc} removed. Only whole numbers are allowed.`;
            case 'numeric':
            case 'coordinate':
                return `Invalid character${charDesc} removed. Only numbers are allowed.`;
            case 'phMobile':
            case 'contactNumber':
                return `Invalid character${charDesc} removed. Only digits are allowed for phone numbers.`;
            case 'rating':
                return `Invalid input removed. Only whole numbers between 1-100 are allowed.`;
            default:
                return `Invalid character${charDesc} removed.`;
        }
    }

    /**
     * Debounced validation to prevent excessive API calls
     */
    debouncedValidate(fieldName, value, input) {
        if (this.debounceTimers[fieldName]) {
            clearTimeout(this.debounceTimers[fieldName]);
        }

        this.debounceTimers[fieldName] = setTimeout(() => {
            this.validateField(fieldName, value, input);
        }, this.options.debounceDelay);
    }

    /**
     * Instant validation for immediate error feedback (client-side only)
     * Shows errors immediately as the user types without waiting
     */
    validateFieldInstant(fieldName, value, input) {
        // Perform instant client-side validation
        const clientValidation = this.validateClientSide(fieldName, value, input);
        
        if (!clientValidation.valid) {
            this.showFieldError(input, clientValidation.message);
            this.validatedFields.delete(fieldName);
            return false;
        }

        // If client-side passes, show success immediately
        // Server validation will happen on blur for complete validation
        this.showFieldSuccess(input);
        return true;
    }

    /**
     * Validate a single field
     */
    async validateField(fieldName, value, input) {
        // First, do client-side validation
        const clientValidation = this.validateClientSide(fieldName, value, input);
        
        if (!clientValidation.valid) {
            this.showFieldError(input, clientValidation.message);
            return false;
        }

        // If client-side passes, validate with server for complex rules
        try {
            const response = await fetch(this.options.apiEndpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    field: fieldName,
                    value: value,
                    form_type: this.formType
                })
            });

            const result = await response.json();

            if (result.valid) {
                this.showFieldSuccess(input);
                this.validatedFields.add(fieldName);
                return true;
            } else {
                this.showFieldError(input, result.message);
                this.validatedFields.delete(fieldName);
                return false;
            }
        } catch (error) {
            // If server validation fails, rely on client-side validation
            console.warn('Server validation failed, using client-side only:', error);
            if (clientValidation.valid) {
                this.showFieldSuccess(input);
                return true;
            }
            return false;
        }
    }

    /**
     * Client-side validation for instant feedback
     * Validates immediately as user types - catches invalid characters right away
     */
    validateClientSide(fieldName, value, input) {
        // Skip validation for empty optional fields
        const isRequired = input.hasAttribute('required') || 
                          input.closest('.form-field')?.querySelector('.text-red');
        
        if (!value || value.trim() === '') {
            if (isRequired) {
                return { valid: false, message: this.messages.required };
            }
            return { valid: true, message: null };
        }

        // Get field type for validation
        const fieldType = this.fieldTypes[fieldName];

        // Immediate character-by-character validation for specific field types
        if (fieldType) {
            const charValidation = this.validateCharacters(fieldType, value);
            if (!charValidation.valid) {
                return charValidation;
            }
        }
        
        // Full pattern validation (for complete values like email, phone)
        if (fieldType && this.patterns[fieldType]) {
            const pattern = this.patterns[fieldType];
            // For partial input (typing), only validate full pattern on certain field types
            const requiresFullMatch = ['email', 'phMobile', 'contactNumber'];
            
            if (!requiresFullMatch.includes(fieldType)) {
                // For name, integer, numeric - validate the pattern immediately
                if (!pattern.test(value)) {
                    return { valid: false, message: this.messages[fieldType] };
                }
            } else if (value.length >= this.getMinLengthForType(fieldType)) {
                // For email/phone - only validate pattern when minimum length reached
                if (!pattern.test(value)) {
                    return { valid: false, message: this.messages[fieldType] };
                }
            }
        }

        // Check min/max length from input attributes
        const minLength = input.getAttribute('minlength');
        const maxLength = input.getAttribute('maxlength');

        if (minLength && value.length < parseInt(minLength)) {
            return { 
                valid: false, 
                message: this.messages.minLength.replace('{min}', minLength) 
            };
        }

        if (maxLength && value.length > parseInt(maxLength)) {
            return { 
                valid: false, 
                message: this.messages.maxLength.replace('{max}', maxLength) 
            };
        }

        return { valid: true, message: null };
    }

    /**
     * Validate individual characters for immediate feedback
     * Catches invalid characters as soon as they're typed
     */
    validateCharacters(fieldType, value) {
        switch (fieldType) {
            case 'name':
                // Check if any character is not a letter, space, hyphen, or apostrophe
                if (/\d/.test(value)) {
                    return { 
                        valid: false, 
                        message: 'Numbers are not allowed in name fields. Please use only letters.' 
                    };
                }
                if (/[^A-Za-zÀ-ÖØ-öø-ÿÑñ\s'\-]/.test(value)) {
                    return { 
                        valid: false, 
                        message: 'Special characters are not allowed. Use only letters, spaces, hyphens, or apostrophes.' 
                    };
                }
                break;
                
            case 'integer':
                // Check if any character is not a digit (or minus sign at start)
                if (/[^0-9\-]/.test(value) || (value.indexOf('-') > 0)) {
                    return { 
                        valid: false, 
                        message: 'Only whole numbers are allowed. Please remove any letters or special characters.' 
                    };
                }
                break;
                
            case 'numeric':
            case 'coordinate':
                // Check if any character is not a digit, decimal point, or minus sign
                if (/[^0-9.\-]/.test(value)) {
                    return { 
                        valid: false, 
                        message: 'Only numbers are allowed. Letters and special characters are not permitted.' 
                    };
                }
                // Check for multiple decimal points
                if ((value.match(/\./g) || []).length > 1) {
                    return { 
                        valid: false, 
                        message: 'Only one decimal point is allowed.' 
                    };
                }
                break;
                
            case 'phMobile':
            case 'contactNumber':
                // Check if any character is not a digit
                if (/[^0-9]/.test(value)) {
                    return { 
                        valid: false, 
                        message: 'Only numbers are allowed for contact number. Please remove any letters.' 
                    };
                }
                break;

            case 'rating':
                // Check if any character is not a digit
                if (/[^0-9]/.test(value)) {
                    return { 
                        valid: false, 
                        message: 'Only whole numbers are allowed for rating (1-100).' 
                    };
                }
                // Check for leading zeros
                if (/^0\d/.test(value)) {
                    return { 
                        valid: false, 
                        message: 'Leading zeros are not allowed. Enter a number between 1 and 100.' 
                    };
                }
                // Check if value is in valid range (1-100)
                const ratingNum = parseInt(value, 10);
                if (value && (ratingNum < 1 || ratingNum > 100)) {
                    return { 
                        valid: false, 
                        message: 'Rating must be between 1 and 100.' 
                    };
                }
                break;
                
            case 'email':
                // Check for obviously invalid characters in email
                if (/[^A-Za-z0-9@._\-]/.test(value)) {
                    return { 
                        valid: false, 
                        message: 'Invalid character in email address.' 
                    };
                }
                break;
        }
        
        return { valid: true, message: null };
    }

    /**
     * Get minimum length before full pattern validation kicks in
     */
    getMinLengthForType(fieldType) {
        const minLengths = {
            'email': 10,      // user@a.com minimum
            'phMobile': 11,   // 09xxxxxxxxx
            'contactNumber': 10
        };
        return minLengths[fieldType] || 1;
    }

    /**
     * Show error state for a field
     */
    showFieldError(input, message) {
        this.clearFieldState(input);
        
        input.classList.add('field-error');
        input.classList.remove('field-success');

        // Find or create error message element
        const formField = input.closest('.form-field');
        if (formField) {
            let errorEl = formField.querySelector('.realtime-error');
            if (!errorEl) {
                errorEl = document.createElement('p');
                errorEl.className = 'realtime-error text-red text-sm mt-1';
                
                // Insert after the input
                if (input.nextSibling) {
                    input.parentNode.insertBefore(errorEl, input.nextSibling);
                } else {
                    input.parentNode.appendChild(errorEl);
                }
            }
            errorEl.innerHTML = message;
            errorEl.style.display = 'block';
        }
    }

    /**
     * Show success state for a field
     */
    showFieldSuccess(input) {
        this.clearFieldState(input);
        
        if (this.options.showSuccessState) {
            input.classList.add('field-success');
            input.classList.remove('field-error');
        }
    }

    /**
     * Clear field validation state
     */
    clearFieldState(input) {
        input.classList.remove('field-error', 'field-success');
        
        const formField = input.closest('.form-field');
        if (formField) {
            const errorEl = formField.querySelector('.realtime-error');
            if (errorEl) {
                errorEl.style.display = 'none';
            }
        }
    }

    /**
     * Create CSS styles for validation states
     */
    createStyles() {
        if (document.getElementById('form-validator-styles')) return;

        const styles = document.createElement('style');
        styles.id = 'form-validator-styles';
        styles.textContent = `
            .field-error {
                border-color: #dc2626 !important;
                background-color: #fef2f2 !important;
                box-shadow: 0 0 0 2px rgba(220, 38, 38, 0.2) !important;
            }
            
            .field-success {
                border-color: #16a34a !important;
                background-color: #f0fdf4 !important;
                box-shadow: 0 0 0 2px rgba(22, 163, 74, 0.2) !important;
            }
            
            .realtime-error {
                color: #dc2626;
                font-size: 0.875rem;
                margin-top: 0.25rem;
                animation: shake 0.3s ease-in-out;
            }
            
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                75% { transform: translateX(5px); }
            }
            
            .field-error:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.3) !important;
            }
            
            .field-success:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.3) !important;
            }
        `;
        document.head.appendChild(styles);
    }

    /**
     * Manually trigger validation for all fields
     */
    async validateAll() {
        const inputs = this.form.querySelectorAll('input, select, textarea');
        const results = [];

        for (const input of inputs) {
            if (input.name) {
                const result = await this.validateField(input.name, input.value, input);
                results.push({ field: input.name, valid: result });
            }
        }

        return results.every(r => r.valid);
    }

    /**
     * Reset all validation states
     */
    reset() {
        const inputs = this.form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => this.clearFieldState(input));
        this.validatedFields.clear();
    }
}

// Export for use as module or attach to window
if (typeof module !== 'undefined' && module.exports) {
    module.exports = FormValidator;
} else {
    window.FormValidator = FormValidator;
}

/**
 * Auto-initialize FormValidator for forms with data-form-type attribute
 * This runs when the script loads, ensuring validation works immediately
 */
(function autoInitialize() {
    function initForms() {
        // Find all forms with data-form-type attribute
        const forms = document.querySelectorAll('form[data-form-type]');
        forms.forEach(form => {
            if (!form._formValidator) {
                const formType = form.getAttribute('data-form-type');
                form._formValidator = new FormValidator(form.id, formType, {
                    validateOnBlur: true,
                    validateOnInput: true,
                    immediateValidation: true,
                    debounceDelay: 0,
                    showSuccessState: true
                });
            }
        });

        // Also look for common form IDs and auto-initialize them
        const formConfigs = {
            'form101': '1-01',
            'form102': '1-02',
            'form103': '1-03',
            'form109': '1-09',
            'form111': '1-11',
            'form113': '1-13',
            'form114': '1-14',
            'form116': '1-16',
            'form118': '1-18',
            'form119': '1-19',
            'form120': '1-20',
            'form121': '1-21',
            'form122': '1-22',
            'form124': '1-24',
            'form125': '1-25'
        };

        Object.entries(formConfigs).forEach(([formId, formType]) => {
            const form = document.getElementById(formId);
            if (form && !form._formValidator) {
                form._formValidator = new FormValidator(formId, formType, {
                    validateOnBlur: true,
                    validateOnInput: true,
                    immediateValidation: true,
                    debounceDelay: 0,
                    showSuccessState: true
                });
                // Store reference globally
                window[`${formId}Validator`] = form._formValidator;
            }
        });
    }

    // Initialize immediately if DOM is ready, otherwise wait for it
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initForms);
    } else {
        // DOM already loaded, init immediately
        initForms();
    }

    // Also re-initialize when navigating back (for SPA-like behavior)
    window.addEventListener('pageshow', initForms);
})();

