{{-- Universal form validation styles --}}
<style>
/* Base form field styles */
.form-field {
    position: relative;
    margin-bottom: 1rem;
}

/* Required field indicator */
.form-field .form-label:has(+ input:required)::after,
.form-field .form-label:has(+ select:required)::after,
.form-field .form-label:has(+ textarea:required)::after {
    content: "*";
    color: #dc3545;
    margin-left: 4px;
}

/* Invalid field styles */
.form-field.invalid input,
.form-field.invalid select,
.form-field.invalid textarea,
.form-field input:invalid,
.form-field select:invalid,
.form-field textarea:invalid {
    border-color: #dc3545 !important;
    background-color: rgba(220, 53, 69, 0.05) !important;
}

/* Invalid field indicator */
.form-field.invalid::after,
.form-field:has(input:invalid)::after,
.form-field:has(select:invalid)::after,
.form-field:has(textarea:invalid)::after {
    content: "Required";
    position: absolute;
    right: 0;
    top: 0;
    font-size: 12px;
    color: #dc3545;
    font-weight: 600;
}

/* Radio/checkbox group validation */
[data-require-one].invalid {
    padding: 8px;
    border: 1px solid #dc3545;
    border-radius: 4px;
    background-color: rgba(220, 53, 69, 0.05);
}

/* Hide all validation messages */
.validation-message,
.validation-summary,
.address-error,
.text-red,
.field-error-message {
    display: none !important;
}

/* Step completion indicators */
.step-item.completed {
    color: #28a745;
}

.step-item.completed .step-status::after {
    content: "✓";
    color: #28a745;
    font-weight: bold;
}

/* Required fields subtle indication */
.form-field input:required,
.form-field select:required,
.form-field textarea:required {
    background-color: rgba(0, 0, 0, 0.02);
}

/* Success state */
.form-field.valid input,
.form-field.valid select,
.form-field.valid textarea,
.form-field input:valid:not(:placeholder-shown),
.form-field select:valid:not(:placeholder-shown),
.form-field textarea:valid:not(:placeholder-shown) {
    border-color: #28a745;
    background-color: rgba(40, 167, 69, 0.05);
}

/* Disable existing error styles */
.field-error {
    border-color: inherit !important;
    background-color: inherit !important;
}

/* Focus styles */
.form-field input:focus,
.form-field select:focus,
.form-field textarea:focus {
    border-color: #007bff !important;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
    background-color: #fff !important;
}
</style>

{{-- Universal form validation script --}}
<script>
(function() {
    // Helper to find form elements
    function findForms() {
        return document.querySelectorAll('form[id^="form"]');
    }

    function setupFormValidation(form) {
        if (!form) return;

        // Validation state tracking
        const validationState = {
            isValidating: false,
            timer: null
        };

        // Field validation
        function validateField(field, showError = true) {
            if (!field || field.type === 'hidden') return true;
            
            const formField = field.closest('.form-field');
            if (!formField) return true;

            // Clear existing validation state
            formField.classList.remove('invalid', 'valid');

            // Get field value
            const value = field.value.trim();
            
            // Check if field is required
            const isRequired = field.required || field.closest('.form-field')?.querySelector('label')?.textContent.includes('*');
            
            // Skip optional empty fields
            if (!isRequired && !value) return true;

            // Radio/checkbox validation
            if (field.type === 'radio' || field.type === 'checkbox') {
                if (!field.name) return true;
                const group = form.querySelectorAll(`input[name="${field.name}"]`);
                if (!group.length || field !== group[0]) return true;
                
                const anyChecked = Array.from(group).some(input => input.checked);
                if (isRequired && !anyChecked) {
                    if (showError) formField.classList.add('invalid');
                    return false;
                }
                if (anyChecked) formField.classList.add('valid');
                return true;
            }

            // Required field validation
            if (isRequired && !value) {
                if (showError) formField.classList.add('invalid');
                return false;
            }

            // Email validation
            if (field.type === 'email' || field.name.includes('email')) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (value && !emailPattern.test(value)) {
                    if (showError) formField.classList.add('invalid');
                    return false;
                }
            }

            // Phone validation
            if (field.type === 'tel' || field.name.includes('phone') || field.name.includes('contact')) {
                const phonePattern = /^(\+63|0)?[0-9]{10}$/;
                if (value && !phonePattern.test(value)) {
                    if (showError) formField.classList.add('invalid');
                    return false;
                }
            }

            // Field is valid
            formField.classList.add('valid');
            return true;
        }

        // Section validation
        function validateSection(section) {
            if (!section) return true;
            
            // Prevent concurrent validation
            if (validationState.isValidating) return false;
            validationState.isValidating = true;

            // Clear any pending validation timer
            if (validationState.timer) {
                clearTimeout(validationState.timer);
            }

            try {
                let isValid = true;

                // Validate all fields in section
                section.querySelectorAll('input:not([type="hidden"]), select, textarea').forEach(field => {
                    if (!validateField(field, true)) {
                        isValid = false;
                    }
                });

                // Validate groups that require at least one selection
                section.querySelectorAll('[data-require-one]').forEach(group => {
                    const selector = group.getAttribute('data-require-one');
                    const items = group.querySelectorAll(selector);
                    const anyValid = Array.from(items).some(el => 
                        el.type === 'checkbox' || el.type === 'radio' ? el.checked : Boolean(el.value.trim())
                    );
                    if (!anyValid) {
                        group.classList.add('invalid');
                        isValid = false;
                    } else {
                        group.classList.remove('invalid');
                    }
                });

                // Update step completion status
                const stepId = section.id.replace('step-', '');
                const stepItem = document.querySelector(`.step-item[data-step="${stepId}"]`);
                if (stepItem) {
                    stepItem.classList.toggle('completed', isValid);
                }

                // Focus first invalid field
                if (!isValid) {
                    const firstInvalid = section.querySelector('.form-field.invalid input, .form-field.invalid select, .form-field.invalid textarea, [data-require-one].invalid input');
                    if (firstInvalid) {
                        firstInvalid.focus();
                    }
                }

                return isValid;
            } finally {
                // Reset validation lock after delay
                validationState.timer = setTimeout(() => {
                    validationState.isValidating = false;
                }, 300);
            }
        }

        // Live validation
        form.addEventListener('input', (e) => {
            if (e.target.matches('input:not([type="hidden"]), select, textarea')) {
                validateField(e.target, false);
            }
        });

        form.addEventListener('change', (e) => {
            if (e.target.matches('input:not([type="hidden"]), select, textarea')) {
                const section = e.target.closest('.step-content');
                if (section) {
                    validateSection(section);
                }
            }
        });

        // Export validation methods to form
        form.validateField = validateField;
        form.validateSection = validateSection;
    }

    // Initialize all forms
    findForms().forEach(setupFormValidation);
})();
</script>