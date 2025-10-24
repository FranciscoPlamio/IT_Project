<script>
    (function(){
        const form = document.getElementById('{{ $formId }}');
        const stepsList = document.getElementById('{{ $stepsListId }}');
        const stepsOrder = {!! json_encode($stepsOrder) !!};
        if (!form || !stepsList || !stepsOrder) return;

        function showStep(step) {
            const currentStepIndex = stepsOrder.indexOf(step);
            if (currentStepIndex === -1) return;
            
            // Only show the target step if all previous steps are completed
            for (let i = 0; i < currentStepIndex; i++) {
                const prevStep = stepsList.querySelector(`.step-item[data-step="${stepsOrder[i]}"]`);
                if (!prevStep.classList.contains('completed')) {
                    showStep(stepsOrder[i]);
                    return;
                }
            }

            stepsList.querySelectorAll('.step-item').forEach(li => {
                const isActive = li.dataset.step === step;
                li.classList.toggle('active', isActive);
            });

            document.querySelectorAll('.step-content').forEach(s => {
                s.classList.toggle('active', s.id === `step-${step}`);
            });
        }

        function currentStep() {
            const activeItem = stepsList.querySelector('.step-item.active');
            return activeItem ? activeItem.dataset.step : stepsOrder[0];
        }

        function validateSection(section) {
            if (!section) return true;

            // Prevent re-entrant validation
            if (section._validating) return false;
            section._validating = true;

            try {
                let valid = true;
                const fields = Array.from(section.querySelectorAll('input:not([type=hidden]), select, textarea'));
                const invalidFields = [];

                // Validate each field
                fields.forEach(field => {
                    if (!field.required && !field.value.trim()) return;

                    if (field.type === 'radio') {
                        const name = field.name;
                        const group = section.querySelectorAll(`input[type=radio][name="${name}"]`);
                        if (field === group[0]) {
                            const anyChecked = Array.from(group).some(r => r.checked);
                            if (field.required && !anyChecked) {
                                valid = false;
                                invalidFields.push(field);
                            }
                        }
                    } else if (field.required && !field.value.trim()) {
                        valid = false;
                        invalidFields.push(field);
                        field.classList.add('invalid-field');
                    } else {
                        field.classList.remove('invalid-field');
                    }
                });

                // Validate groups that require at least one selection
                section.querySelectorAll('[data-require-one]').forEach(group => {
                    const selector = group.getAttribute('data-require-one');
                    const items = group.querySelectorAll(selector);
                    const anyChecked = Array.from(items).some(el => 
                        (el.type === 'checkbox' || el.type === 'radio') ? el.checked : Boolean(el.value.trim())
                    );
                    if (!anyChecked) {
                        valid = false;
                        if (items[0]) invalidFields.push(items[0]);
                    }
                });

                // Remove any existing validation messages
                section.querySelectorAll('.validation-message').forEach(el => el.remove());

                // Show validation message if invalid
                if (!valid) {
                    const summary = document.createElement('div');
                    summary.className = 'validation-message';
                    summary.style.cssText = 'background-color:#f8d7da;border:2px solid #dc3545;border-radius:6px;padding:12px;margin:12px 0;color:#dc3545;font-weight:600;';
                    const labels = invalidFields.map(field => {
                        const label = field.closest('.form-field')?.querySelector('label')?.textContent.replace('*','').trim() || 'Required field';
                        return label;
                    });
                    summary.innerHTML = `<strong>Please complete these required fields:</strong><br>${labels.join(', ')}`;
                    section.insertBefore(summary, section.firstChild);

                    if (invalidFields[0]) invalidFields[0].focus();
                }

                // Update step status
                const stepItem = stepsList.querySelector(`.step-item[data-step="${currentStep()}"]`);
                if (stepItem) {
                    if (valid) {
                        stepItem.classList.add('completed');
                        stepItem.querySelector('.step-status').textContent = 'Done';
                    } else {
                        stepItem.classList.remove('completed');
                        stepItem.querySelector('.step-status').textContent = '';
                    }
                }

                return valid;
            } finally {
                setTimeout(() => { section._validating = false; }, 250);
            }
        }

        function validateActiveStep() {
            const step = currentStep();
            const section = document.getElementById(`step-${step}`);
            return validateSection(section);
        }

        // Navigation click handlers
        stepsList.addEventListener('click', (e) => {
            const li = e.target.closest('.step-item');
            if (!li) return;

            const targetStep = li.dataset.step;
            const targetIndex = stepsOrder.indexOf(targetStep);
            const currentIndex = stepsOrder.indexOf(currentStep());

            // Only allow navigation to completed steps or the next incomplete step
            if (targetIndex <= currentIndex || li.classList.contains('completed')) {
                showStep(targetStep);
            } else {
                // If trying to jump ahead, validate all steps up to the target
                let valid = true;
                for (let i = 0; i <= currentIndex; i++) {
                    const step = stepsOrder[i];
                    const section = document.getElementById(`step-${step}`);
                    if (!validateSection(section)) {
                        valid = false;
                        showStep(step);
                        break;
                    }
                }
                if (valid) showStep(targetStep);
            }
        });

        document.querySelectorAll('[data-next]').forEach(btn => 
            btn.addEventListener('click', () => {
                const currentIndex = stepsOrder.indexOf(currentStep());
                if (validateActiveStep()) {
                    const nextStep = stepsOrder[currentIndex + 1];
                    if (nextStep) showStep(nextStep);
                }
            })
        );

        document.querySelectorAll('[data-prev]').forEach(btn =>
            btn.addEventListener('click', () => {
                const currentIndex = stepsOrder.indexOf(currentStep());
                const prevStep = stepsOrder[currentIndex - 1];
                if (prevStep) showStep(prevStep);
            })
        );

        // Initialize at first step
        showStep(stepsOrder[0]);
    })();
</script>