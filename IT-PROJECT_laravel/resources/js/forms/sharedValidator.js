export default function initSharedValidator() {
    // Debug: indicate module loaded
    try {
        console.debug("sharedValidator module loaded");
    } catch (e) {}

    document.querySelectorAll("form").forEach((form) => {
        try {
            console.debug(
                "sharedValidator checking form",
                form.id || form.getAttribute("action") || "unnamed"
            );
        } catch (e) {}

        if (form.id === "form101") return;
        try {
            console.debug(
                "sharedValidator initializing for form",
                form.id || form.getAttribute("action") || "unnamed"
            );
        } catch (e) {}

        // Parse optional per-form validation rules provided via data-validation-rules (JSON)
        let formLevelRules = {};
        try {
            const raw = form.getAttribute("data-validation-rules");
            if (raw) {
                formLevelRules = JSON.parse(raw);
                console.debug(
                    "sharedValidator loaded form-level rules for",
                    form.id || form.getAttribute("action") || "unnamed"
                );
            }
        } catch (e) {
            console.warn(
                "sharedValidator: failed to parse data-validation-rules for form",
                form.id,
                e
            );
            formLevelRules = {};
        }

        const validationRules = {
            name: { required: true, pattern: /^[A-Za-z\s]+$/ },
            text: { required: false },
            email: { required: true, type: "email" },
            phone: { required: true, pattern: /^(\+63|0)?[0-9]{10}$/ },
            date: { required: true, type: "date" },
            select: { required: true },
            radio: { required: true },
            year: {
                required: true,
                pattern: /^\d+$/,
            },
            zipcode: { required: true, pattern: /^\d{4}$/ },
        };

        function showFieldValidation(field, errorMessage) {
            if (!field) return;
            field.classList.remove("field-success");
            field.classList.add("field-error");
            field.style.border = "2px solid #dc3545";
            field.style.backgroundColor = "#fff5f5";

            // Remove any existing message
            const existing = field.parentNode.querySelector(
                ".field-error-message"
            );
            if (existing) existing.remove();

            const errorDiv = document.createElement("div");
            errorDiv.className = "field-error-message";
            errorDiv.style.color = "#dc3545";
            errorDiv.style.marginTop = "6px";
            errorDiv.style.fontWeight = "600";
            errorDiv.textContent = errorMessage;
            field.parentNode.appendChild(errorDiv);
        }

        function clearFieldError(field) {
            if (!field) return;
            field.classList.remove("field-error");
            field.style.border = "";
            field.style.backgroundColor = "";
            const existing = field.parentNode.querySelector(
                ".field-error-message"
            );
            if (existing) existing.remove();
        }

        function getFieldLabel(field) {
            const label = field.parentNode
                ? field.parentNode.querySelector("label")
                : null;
            if (label) return label.textContent.replace("*", "").trim();
            return field.name || "This field";
        }

        function validateField(field) {
            if (!field || field.disabled) return true;

            const dataValidation = (
                field.getAttribute("data-validation") || ""
            ).toString();
            const value = (field.value || "").toString().trim();

            // determine label-required marker
            const labelEl = field.parentNode
                ? field.parentNode.querySelector("label")
                : null;
            const labelText = labelEl ? labelEl.textContent || "" : "";
            const labelRequired =
                (labelText && labelText.indexOf("*") !== -1) ||
                Boolean(
                    field
                        .closest(".form-field")
                        ?.querySelector(".required-asterisk")
                );

            // base rule from data-validation attribute
            const baseRule = validationRules[dataValidation] || {};

            // per-form overrides (by field name)
            const name = field.name || "";
            const perForm =
                name && formLevelRules[name] ? formLevelRules[name] : {};

            // infer rules from type/name/attributes when explicit rules absent
            const inferred = {};
            const lname = name.toLowerCase();
            if (field.type === "email" || lname.includes("email"))
                inferred.type = "email";
            if (
                field.type === "date" ||
                lname.includes("dob") ||
                lname.includes("date")
            )
                inferred.type = "date";
            if (
                field.type === "tel" ||
                lname.includes("phone") ||
                lname.includes("contact")
            )
                inferred.pattern = /^(\+63|0)?[0-9]{10}$/;
            if (lname.includes("zip") || lname.includes("zipcode"))
                inferred.pattern = /^\d{4}$/;
            if (lname.includes("year")) inferred.pattern = /^\d+$/;
            if (
                lname.includes("name") ||
                lname.includes("first") ||
                lname.includes("last")
            )
                inferred.pattern = /^[A-Za-z\s]+$/;
            if (field.tagName && field.tagName.toLowerCase() === "select")
                inferred.type = "select";

            // determine required: explicit attribute, per rule, or label marker
            const isRequired =
                Boolean(field.required) ||
                Boolean(baseRule.required) ||
                Boolean(perForm.required) ||
                labelRequired;

            const rule = Object.assign({}, baseRule, inferred, perForm);
            if (isRequired) rule.required = true;

            // required
            if (rule.required && !value) {
                showFieldValidation(
                    field,
                    `${getFieldLabel(field)} is required.`
                );
                return false;
            }

            // type checks
            if (rule.type === "email" && value) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(value)) {
                    showFieldValidation(
                        field,
                        `Please enter a valid email address.`
                    );
                    return false;
                }
            }
            if (rule.type === "date" && value) {
                const date = new Date(value);
                const today = new Date();
                if (isNaN(date.getTime())) {
                    showFieldValidation(field, `Please enter a valid date.`);
                    return false;
                }
                if (date > today) {
                    showFieldValidation(field, `Date cannot be in the future.`);
                    return false;
                }
            }

            // pattern
            if (rule.pattern && value) {
                const pattern =
                    rule.pattern instanceof RegExp
                        ? rule.pattern
                        : new RegExp(rule.pattern);
                if (!pattern.test(value)) {
                    let msg = `Please enter a valid ${getFieldLabel(field)}.`;
                    if (
                        dataValidation === "phone" ||
                        /phone|contact/.test(name)
                    )
                        msg =
                            "Please enter a valid Philippine phone number (e.g., 09123456789).";
                    if (dataValidation === "year" || /year/.test(name))
                        msg = "Please enter a valid 4-digit year (e.g., 2020).";
                    if (
                        dataValidation === "zipcode" ||
                        dataValidation === "zip_code" ||
                        /zip/.test(name)
                    )
                        msg =
                            "Please enter a valid 4-digit ZIP code (e.g., 1000).";
                    showFieldValidation(field, msg);
                    return false;
                }
            }

            // passed
            clearFieldError(field);
            return true;
        }

        function validateForm(e) {
            const fields = Array.from(
                form.querySelectorAll("input, select, textarea")
            );
            const invalid = [];

            // Clear previous summary
            const existingSummary = form.querySelector(".validation-summary");
            if (existingSummary) existingSummary.remove();

            // Validate groups with data-require-one
            const groups = form.querySelectorAll("[data-require-one]");
            groups.forEach((group) => {
                const selector = group.getAttribute("data-require-one");
                if (!selector) return;
                const items = group.querySelectorAll(selector);
                const any = Array.from(items).some((el) => {
                    if (el.type === "checkbox" || el.type === "radio")
                        return el.checked;
                    return Boolean(
                        el.value && el.value.toString().trim() !== ""
                    );
                });
                if (!any) {
                    invalid.push(group);
                }
            });

            fields.forEach((field) => {
                // Skip file inputs for now (could be validated server-side)
                if (field.type === "file") return;

                // For radio and checkbox groups, validate by name (only once)
                if (
                    (field.type === "radio" || field.type === "checkbox") &&
                    field.name
                ) {
                    // Only validate the first element of the group
                    const group = form.querySelectorAll(
                        `input[name="${field.name}"]`
                    );
                    if (group && group.length > 0 && group[0] === field) {
                        const anyChecked = Array.from(group).some(
                            (r) => r.checked
                        );
                        const isRequired =
                            field.required ||
                            field
                                .closest(".form-field")
                                ?.querySelector("label")
                                ?.textContent?.includes("*");
                        if (
                            (isRequired ||
                                field.hasAttribute("data-validation")) &&
                            !anyChecked
                        ) {
                            // apply message to first element's parent
                            showFieldValidation(
                                field,
                                `${getFieldLabel(field)} is required.`
                            );
                            invalid.push(field);
                        } else {
                            group.forEach((f) => clearFieldError(f));
                        }
                    }
                    return;
                }

                if (!validateField(field)) invalid.push(field);
            });

            if (invalid.length > 0) {
                if (e && typeof e.preventDefault === "function")
                    e.preventDefault();
                if (e && typeof e.stopImmediatePropagation === "function")
                    e.stopImmediatePropagation();
                // Create summary
                const summaryDiv = document.createElement("div");
                summaryDiv.className = "validation-summary";
                summaryDiv.style.cssText =
                    "background-color:#f8d7da;border:2px solid #dc3545;border-radius:6px;padding:12px;margin:12px 0;color:#dc3545;font-weight:600;";
                const labels = invalid.slice(0, 10).map((f) => {
                    if (f.getAttribute && f.getAttribute("data-require-one"))
                        return "Required selection";
                    return (
                        getFieldLabel(
                            f instanceof Element && f.closest
                                ? f
                                      .closest(".form-field")
                                      ?.querySelector("label") || f
                                : f
                        ) || "Required field"
                    );
                });
                summaryDiv.innerHTML = `<strong>Please complete the following required fields:</strong><br>${labels.join(
                    ", "
                )}`;
                form.insertBefore(summaryDiv, form.firstChild);

                // Focus first invalid field
                const firstInvalid =
                    invalid[0] instanceof Element
                        ? invalid[0]
                        : form.querySelector(
                              "input.field-error, select.field-error, textarea.field-error"
                          );
                if (firstInvalid) firstInvalid.focus();
            }
        }

        // Validate only a specific section (used by Next buttons)
        function validateSection(section) {
            if (!section) return true;
            const fields = Array.from(
                section.querySelectorAll("input, select, textarea")
            );
            const invalid = [];

            fields.forEach((field) => {
                if (field.type === "file") return;

                if (
                    (field.type === "radio" || field.type === "checkbox") &&
                    field.name
                ) {
                    const group = section.querySelectorAll(
                        `input[name="${field.name}"]`
                    );
                    if (group && group.length > 0 && group[0] === field) {
                        const anyChecked = Array.from(group).some(
                            (r) => r.checked
                        );
                        const isRequired =
                            field.required ||
                            field
                                .closest(".form-field")
                                ?.querySelector("label")
                                ?.textContent?.includes("*");
                        if (
                            (isRequired ||
                                field.hasAttribute("data-validation")) &&
                            !anyChecked
                        ) {
                            showFieldValidation(
                                field,
                                `${getFieldLabel(field)} is required.`
                            );
                            invalid.push(field);
                        } else {
                            group.forEach((f) => clearFieldError(f));
                        }
                    }
                    return;
                }

                if (!validateField(field)) invalid.push(field);
            });

            if (invalid.length > 0) {
                const summaryDiv = document.createElement("div");
                summaryDiv.className = "validation-summary";
                summaryDiv.style.cssText =
                    "background-color:#f8d7da;border:2px solid #dc3545;border-radius:6px;padding:12px;margin:12px 0;color:#dc3545;font-weight:600;";
                const labels = invalid
                    .slice(0, 10)
                    .map((f) => getFieldLabel(f));
                summaryDiv.innerHTML = `<strong>Please complete the following required fields:</strong><br>${labels.join(
                    ", "
                )}`;
                // insert summary at top of the section or form
                if (section.firstChild)
                    section.insertBefore(summaryDiv, section.firstChild);
                const firstInvalid =
                    invalid[0] instanceof Element
                        ? invalid[0]
                        : section.querySelector(
                              "input.field-error, select.field-error, textarea.field-error"
                          );
                if (firstInvalid) firstInvalid.focus();
                return false;
            }

            return true;
        }

        // Add listeners for inputs to clear errors live
        form.querySelectorAll("input, select, textarea").forEach((field) => {
            field.addEventListener("input", () => validateField(field));
            field.addEventListener("change", () => validateField(field));
        });

        // Attach submit handler
        form.addEventListener("submit", validateForm);

        // Intercept Next buttons (data-next) to validate current active step before allowing navigation
        const nextButtons = form.querySelectorAll("[data-next]");
        nextButtons.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                // Find active step within the form
                const activeStep =
                    form.querySelector(".step-content.active") ||
                    btn.closest(".step-content") ||
                    form;
                try {
                    console.debug(
                        "sharedValidator next button clicked, validating section",
                        activeStep
                    );
                } catch (err) {}
                const ok = validateSection(activeStep);
                if (!ok) {
                    if (typeof e.preventDefault === "function")
                        e.preventDefault();
                    if (typeof e.stopImmediatePropagation === "function")
                        e.stopImmediatePropagation();
                    // also stop propagation to other click handlers
                    return false;
                }
                // allow next handlers to run
                return true;
            });
        });
    });
}
