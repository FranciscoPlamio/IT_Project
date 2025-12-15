<?php
/**
 * Strict Form Validator and Navigation Component
 * 
 * This component enforces strict page-by-page validation, requiring users to complete
 * each section before moving forward.
 * 
 * Required parameters:
 * - formId: The ID of the form element
 * - stepsListId: The ID of the steps list element
 * - steps: Array of step IDs in order
 */
?>
<style>
/* Import progress steps styles */
@import url('{{ asset("components/forms/progress-steps.css") }}');

/* Additional styles for validation */
.validation-message {
    display: none;
    animation: fadeIn 0.3s ease-in-out forwards;
}

.validation-message.show {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.invalid-field {
    border-color: #dc3545 !important;
    background-color: #fff5f5 !important;
}

/* Ensure steps list items are non-interactive */
.steps-list .step-item {
    pointer-events: none !important;
    cursor: default !important;
}

.steps-list .step-item:hover {
    background-color: transparent !important;
    cursor: default !important;
}
<script>
    (function(){
        const form = document.getElementById('{{ $formId }}');
        const stepsList = document.getElementById('{{ $stepsListId }}');
        const stepsOrder = {!! json_encode($steps) !!};
        
        if (!form || !stepsList || !stepsOrder || !stepsOrder.length) return;

        // Track completed steps
        const completedSteps = new Set();
        
        function getStepElement(step) {
            return document.getElementById(`step-${step}`);
        }

        function showStep(step) {
            // Only allow showing steps that are completed or the next incomplete step
            const targetIndex = stepsOrder.indexOf(step);
            if (targetIndex === -1) return;

            // Validate all previous steps are complete
            for (let i = 0; i < targetIndex; i++) {
                const prevStep = stepsOrder[i];
                if (!completedSteps.has(prevStep)) {
                    const prevStepEl = getStepElement(prevStep);
                    if (prevStepEl && !validateSection(prevStepEl)) {
                        updateStepsList(stepsOrder[i]);
                        return;
                    }
                }
            }

            updateStepsList(step);
        }

        function updateStepsList(activeStep) {
            // Update step list UI
            stepsList.querySelectorAll('.step-item').forEach(li => {
                const stepId = li.dataset.step;
                const isActive = stepId === activeStep;
                const isCompleted = completedSteps.has(stepId);
                
                li.classList.toggle('active', isActive);
                li.classList.toggle('completed', isCompleted);
                
                const status = li.querySelector('.step-status');
                if (status) {
                    status.textContent = isCompleted ? 'Done' : '';
                }
            });

            // Update section visibility
            document.querySelectorAll('.step-content').forEach(section => {
                const isActive = section.id === `step-${activeStep}`;
                section.classList.toggle('active', isActive);
                if (isActive) {
                    // Always validate when showing a new section
                    setTimeout(() => validateSection(section, true), 100);
                }
            });
            const activeSection = getStepElement(activeStep);
            if (activeSection) {
                const firstInvalid = activeSection.querySelector('.invalid-field');
                if (firstInvalid) firstInvalid.focus();
            }
        }

        function currentStep() {
            const activeItem = stepsList.querySelector('.step-item.active');
            return activeItem ? activeItem.dataset.step : stepsOrder[0];
        }

        function validateField(field) {
            if (!field || field.disabled || field.type === 'hidden') return true;
            
            const value = field.value.trim();
            const isRequired = field.required || field.closest('.form-field')?.querySelector('label')?.textContent.includes('*');
            
            // Skip optional empty fields
            if (!isRequired && !value) return true;

            // For radio/checkbox groups, validate as a group
            if (field.type === 'radio' || field.type === 'checkbox') {
                const name = field.name;
                const group = field.form.querySelectorAll(`input[name="${name}"]`);
                // Only validate once per group using the first element
                if (field !== group[0]) return true;
                
                const anyChecked = Array.from(group).some(g => g.checked);
                if (isRequired && !anyChecked) {
                    field.classList.add('invalid-field');
                    return false;
                }
                field.classList.remove('invalid-field');
                return true;
            }

            // Required field validation
            if (isRequired && !value) {
                field.classList.add('invalid-field');
                return false;
            }

            // Pattern validation if present
            if (field.pattern && value) {
                const pattern = new RegExp(field.pattern);
                if (!pattern.test(value)) {
                    field.classList.add('invalid-field');
                    return false;
                }
            }

            // Type-specific validation
            switch (field.type) {
                case 'email':
                    if (value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                        field.classList.add('invalid-field');
                        return false;
                    }
                    break;
                case 'tel':
                    if (value && !/^(\+63|0)?[0-9]{10}$/.test(value)) {
                        field.classList.add('invalid-field');
                        return false;
                    }
                    break;
            }

            field.classList.remove('invalid-field');
            return true;
        }

        // Track validation state per section
        const sectionValidationState = new Map();

        function clearValidationMessages() {
            // Remove all validation messages and field highlights
            form.querySelectorAll('.validation-message').forEach(el => el.remove());
            form.querySelectorAll('.invalid-field').forEach(field => field.classList.remove('invalid-field'));
        }

        function showValidationMessage(section, invalidFields) {
            // Clear any existing messages in this section
            section.querySelectorAll('.validation-message').forEach(msg => msg.remove());
            
            const message = document.createElement('div');
            message.className = 'validation-message';
            message.style.cssText = 'background-color:#f8d7da;border:2px solid #dc3545;border-radius:6px;padding:12px;margin:12px 0;color:#dc3545;font-weight:600;';
            
            const labels = invalidFields.map(field => {
                const label = field.closest('.form-field')?.querySelector('label')?.textContent.trim().replace('*', '') || 'Required field';
                return label;
            });
            
            message.innerHTML = `<strong>Please complete these required fields:</strong><br>${labels.join(', ')}`;
            section.insertBefore(message, section.firstChild);
            requestAnimationFrame(() => message.classList.add('show'));
        }

        function validateSection(section, showMessage = true) {
            if (!section) return true;

            // Get cached state if available
            const sectionId = section.id;
            if (sectionValidationState.has(sectionId)) {
                const state = sectionValidationState.get(sectionId);
                if (state.timestamp > Date.now() - 250) { // Debounce 250ms
                    return state.valid;
                }
            }

            let valid = true;
            const invalidFields = [];

            // Clear existing validation state for this section
            section.querySelectorAll('.validation-message').forEach(el => el.remove());
            section.querySelectorAll('.invalid-field').forEach(field => field.classList.remove('invalid-field'));

            // Validate all fields in the section
            const fields = Array.from(section.querySelectorAll('input:not([type="hidden"]), select, textarea'));
            fields.forEach(field => {
                if (!validateField(field)) {
                    valid = false;
                    invalidFields.push(field);
                }
            });

                // Handle groups that require at least one selection
                section.querySelectorAll('[data-require-one]').forEach(group => {
                    const selector = group.getAttribute('data-require-one');
                    const items = group.querySelectorAll(selector);
                    const anyValid = Array.from(items).some(el => {
                        if (el.type === 'checkbox' || el.type === 'radio') {
                            return el.checked;
                        }
                        return Boolean(el.value.trim());
                    });
                    if (!anyValid) {
                        valid = false;
                        if (items[0]) invalidFields.push(items[0]);
                    }
                });

                // Cache validation state
                sectionValidationState.set(sectionId, {
                    valid,
                    invalidFields,
                    timestamp: Date.now()
                });

                if (!valid && showMessage) {
                    showValidationMessage(section, invalidFields);
                    if (invalidFields[0]) invalidFields[0].focus();
                }

            // Update step completion status based on validation result
            const stepId = currentStep();
            if (valid) {
                completedSteps.add(stepId);
            } else {
                completedSteps.delete(stepId);
                // Always show validation message for invalid sections
                if (showMessage) {
                    showValidationMessage(section, invalidFields);
                }
                // Focus the first invalid field
                if (invalidFields[0]) {
                    invalidFields[0].focus();
                }
            }

            return valid;
        }

        function validateActiveStep() {
            const step = currentStep();
            const section = getStepElement(step);
            return validateSection(section);
        }

        // Side panel is for progress indication only - no click navigation
        stepsList.addEventListener('click', (e) => {
            // Prevent any navigation via clicks
            e.preventDefault();
            return false;
        });

        // Next/Previous button handlers
        document.querySelectorAll('[data-next]').forEach(btn => {
            btn.addEventListener('click', () => {
                if (validateActiveStep()) {
                    const currentIndex = stepsOrder.indexOf(currentStep());
                    if (currentIndex < stepsOrder.length - 1) {
                        showStep(stepsOrder[currentIndex + 1]);
                    }
                }
            });
        });

        document.querySelectorAll('[data-prev]').forEach(btn => {
            btn.addEventListener('click', () => {
                const currentIndex = stepsOrder.indexOf(currentStep());
                if (currentIndex > 0) {
                    showStep(stepsOrder[currentIndex - 1]);
                }
            });
        });

        // Handle form submission
        form.addEventListener('submit', (e) => {
            // Validate all sections before allowing submit
            let valid = true;
            for (const step of stepsOrder) {
                const section = getStepElement(step);
                if (!validateSection(section)) {
                    valid = false;
                    showStep(step);
                    break;
                }
            }
            if (!valid) {
                e.preventDefault();
                return false;
            }
        });

                // Live field validation
        form.addEventListener('input', (e) => {
            if (e.target.matches('input, select, textarea')) {
                const field = e.target;
                const section = field.closest('.step-content');
                if (!section) return;
                
                // Immediate field validation
                validateField(field);
            }
        });

        form.addEventListener('change', (e) => {
            if (e.target.matches('input, select, textarea')) {
                const section = e.target.closest('.step-content');
                if (section) {
                    validateSection(section, true);
                }
            }
        });        // Initialize
        showStep(stepsOrder[0]);
    })();
</script>