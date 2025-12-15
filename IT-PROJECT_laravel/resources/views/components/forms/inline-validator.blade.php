<script>
    (function(){
        // Blade variable: $formId (e.g. 'form102')
        const form = document.getElementById('{{ $formId }}');
        if (!form) return;

        function showFieldValidation(field, msg){
            if (!field) return;
            field.classList.remove('field-success');
            field.classList.add('field-error');
            field.style.border = '2px solid #dc3545';
            field.style.backgroundColor = '#fff5f5';
            const existing = field.parentNode.querySelector('.field-error-message');
            if (existing) existing.remove();
            const div = document.createElement('div');
            div.className = 'field-error-message';
            div.style.color = '#dc3545';
            div.style.marginTop = '6px';
            div.style.fontWeight = '600';
            div.textContent = msg;
            field.parentNode.appendChild(div);
        }

        function clearFieldError(field){
            if (!field) return;
            field.classList.remove('field-error');
            field.style.border = '';
            field.style.backgroundColor = '';
            const existing = field.parentNode.querySelector('.field-error-message');
            if (existing) existing.remove();
        }

        function getFieldLabel(field){
            const label = field.parentNode ? field.parentNode.querySelector('label') : null;
            if (label) return label.textContent.replace('*','').trim();
            return field.name || 'This field';
        }

        function validateField(field){
            if (!field || field.disabled) return true;
            const value = (field.value || '').toString().trim();
            const name = (field.name||'').toLowerCase();
            const labelEl = field.parentNode ? field.parentNode.querySelector('label') : null;
            const labelText = labelEl ? (labelEl.textContent||'') : '';
            const labelRequired = (labelText && labelText.indexOf('*') !== -1);
            const isRequired = Boolean(field.required) || labelRequired;

            if (isRequired && !value) {
                showFieldValidation(field, `${getFieldLabel(field)} is required.`);
                return false;
            }

            // email
            if ((field.type==='email' || name.includes('email')) && value){
                const p = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!p.test(value)) { showFieldValidation(field,'Please enter a valid email address.'); return false; }
            }

            // phone
            if ((field.type==='tel' || name.includes('phone') || name.includes('contact')) && value){
                const p = /^(\+63|0)?[0-9]{10}$/;
                if (!p.test(value)) { showFieldValidation(field,'Please enter a valid Philippine phone number (e.g., 09123456789).'); return false; }
            }

            // zipcode
            if ((name.includes('zip') || name.includes('zipcode')) && value){
                const p = /^\d{4}$/;
                if (!p.test(value)) { showFieldValidation(field,'Please enter a valid 4-digit ZIP code (e.g., 1000).'); return false; }
            }

            clearFieldError(field);
            return true;
        }

        function validateSection(section){
            if (!section) return true;

            // prevent re-entrant validation for the same section
            if (section._validating) return false;
            section._validating = true;

            try {
                const fields = Array.from(section.querySelectorAll('input, select, textarea'));
                const invalid = [];

                fields.forEach(f=>{
                    if (f.type==='file') return;
                    if ((f.type==='radio' || f.type==='checkbox') && f.name){
                        const group = section.querySelectorAll(`input[name="${f.name}"]`);
                        if (group && group.length>0 && group[0]===f){
                            const any = Array.from(group).some(g=> g.checked || (g.value && g.value.toString().trim() !== ''));
                            const isRequired = f.required || (f.closest('.form-field') && f.closest('.form-field').querySelector('label') && f.closest('.form-field').querySelector('label').textContent.includes('*'));
                            if ((isRequired || f.hasAttribute('data-validation')) && !any){ showFieldValidation(f, `${getFieldLabel(f)} is required.`); invalid.push(f); }
                            else group.forEach(g=>clearFieldError(g));
                        }
                        return;
                    }
                    if (!validateField(f)) invalid.push(f);
                });

                // remove any existing summary in this section to avoid duplicates
                const existingSummary = section.querySelectorAll('.validation-summary');
                existingSummary.forEach(el => el.remove());

                if (invalid.length>0){
                    // Notify listeners about the validation failure. Listeners may call
                    // event.preventDefault() to indicate they've handled the UI.
                    const labels = invalid.slice(0,10).map(f=>getFieldLabel(f));
                    const ev = new CustomEvent('form:validationFailed', { detail: { labels, invalid }, cancelable: true });
                    const dispatched = form.dispatchEvent(ev);

                    // If no listener handled the event (not prevented), render a fallback summary
                    if (!ev.defaultPrevented) {
                        const summary = document.createElement('div');
                        summary.className = 'validation-summary';
                        summary.style.cssText = 'background-color:#f8d7da;border:2px solid #dc3545;border-radius:6px;padding:12px;margin:12px 0;color:#dc3545;font-weight:600;';
                        summary.innerHTML = `<strong>Please complete the following required fields:</strong><br>${labels.join(', ')}`;
                        if (section.firstChild) section.insertBefore(summary, section.firstChild);
                    }

                    const firstInvalid = invalid[0] instanceof Element ? invalid[0] : section.querySelector('input.field-error, select.field-error, textarea.field-error');
                    if (firstInvalid) firstInvalid.focus();
                    return false;
                }

                return true;
            } finally {
                // clear the lock after a short delay to prevent rapid duplicate clicks creating duplicates
                setTimeout(()=>{ section._validating = false; }, 250);
            }
        }

        // live clear
        form.querySelectorAll('input, select, textarea').forEach(f=>{ f.addEventListener('input', ()=>validateField(f)); f.addEventListener('change', ()=>validateField(f)); });

        // submit
        form.addEventListener('submit', function(e){
            const fields = Array.from(form.querySelectorAll('input, select, textarea'));
            const invalid = [];
            fields.forEach(f=>{
                if (f.type==='file') return;
                if ((f.type==='radio' || f.type==='checkbox') && f.name){
                    const group = form.querySelectorAll(`input[name="${f.name}"]`);
                    if (group && group.length>0 && group[0]===f){
                        const any = Array.from(group).some(g=> g.checked || (g.value && g.value.toString().trim() !== ''));
                        const isRequired = f.required || (f.closest('.form-field') && f.closest('.form-field').querySelector('label') && f.closest('.form-field').querySelector('label').textContent.includes('*'));
                        if ((isRequired || f.hasAttribute('data-validation')) && !any){ showFieldValidation(f, `${getFieldLabel(f)} is required.`); invalid.push(f); }
                        else group.forEach(g=>clearFieldError(g));
                    }
                    return;
                }
                if (!validateField(f)) invalid.push(f);
            });
            if (invalid.length>0){
                e.preventDefault(); e.stopImmediatePropagation();

                const labels = invalid.slice(0,10).map(f=> getFieldLabel(f instanceof Element && f.closest ? (f.closest('.form-field')?.querySelector('label') || f) : f) || 'Required field');
                const ev = new CustomEvent('form:validationFailed', { detail: { labels, invalid }, cancelable: true });
                form.dispatchEvent(ev);

                // Fallback if nobody handled the event
                if (!ev.defaultPrevented) {
                    const summaryDiv = form.querySelector('.validation-summary'); if (summaryDiv) summaryDiv.remove();
                    const summary = document.createElement('div'); summary.className = 'validation-summary'; summary.style.cssText = 'background-color:#f8d7da;border:2px solid #dc3545;border-radius:6px;padding:12px;margin:12px 0;color:#dc3545;font-weight:600;';
                    summary.innerHTML = `<strong>Please complete the following required fields:</strong><br>${labels.join(', ')}`; form.insertBefore(summary, form.firstChild);
                }

                const firstInvalid = invalid[0] instanceof Element ? invalid[0] : form.querySelector('input.field-error, select.field-error, textarea.field-error'); if (firstInvalid) firstInvalid.focus(); }
        });

        // Next buttons
        form.querySelectorAll('[data-next]').forEach(btn=> btn.addEventListener('click', function(e){ const active = form.querySelector('.step-content.active') || btn.closest('.step-content') || form; const ok = validateSection(active); if (!ok){ if (e && typeof e.preventDefault==='function') e.preventDefault(); if (e && typeof e.stopImmediatePropagation==='function') e.stopImmediatePropagation(); return false; } return true; }));
    })();
</script>
