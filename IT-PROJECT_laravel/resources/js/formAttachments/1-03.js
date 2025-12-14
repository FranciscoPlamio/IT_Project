export default function attachmentsForm102(containerId, form) {
    console.log(form);
    const examType = (form?.certificate_type || "").toLowerCase();
    const applicationType = form.application_type;
    console.log(examType, applicationType);

    const container = document.getElementById(containerId);
    if (!container) return;

    const fieldsHost =
        container.querySelector("[data-role='attachment-fields']") || container;
    const statusPill = document.getElementById("attachmentStatusPill");
    const statusMessage = document.getElementById("attachmentStatusMessage");
    const paymentInput = document.getElementById("paymentMethodInput");

    const baseCardClasses = [
        "rounded-2xl",
        "border",
        "border-gray-200",
        "bg-white",
        "p-4",
        "shadow-sm",
        "transition",
        "hover:-translate-y-0.5",
        "hover:border-emerald-400/70",
        "focus-within:border-emerald-500",
        "space-y-3",
    ];

    const defaultLabels = {
        id_picture: "ID picture (1” x 1”) taken within the last six (6) months",
    };

    let labels;
    if (examType === "special-event-call") {
        labels = {
            letter_request:
                "Letter Request stating, among others, nature of event, duration of event, etc.",
            photocopy_of_atrsl_or_atroc: "Photocopy of valid AT-RSL or AT-ROC ",
        };
    } else if (examType === "temporary-foreign") {
        labels = {
            id_picture: "Letter of Intent",
            f_valid_amateur_radio_operator_certificate_photocopy:
                "Photocopy of valid Amateur Radio Operator Certificate issued by country of citizenship",
            reciprocal_privileges_proof:
                "Any proof that the applicant’s country gives reciprocal privileges to Filipino amateurs",
            endorsement_from_a_recognized_national_organization:
                "Endorsement from a recognized national organization (e.g., PARA)",
            id_picture:
                "ID picture (1” x 1”) taken within the last six (6) months",
        };

        //Renewal
    } else if (applicationType == "renewal") {
        if (examType.includes("atroc")) {
            labels = {
                ...defaultLabels,
                amateur_radio_operator_certificate_photocopy:
                    "Photocopy of Amateur Radio Operator Certificate",
                proof_of_amateur_activities: "Proof of Amateur Activity(ies)",
            };
        } else if (examType.includes("at-club-rsl")) {
            labels = {
                photocopy_of_amateur_club_radio_station_license:
                    "Photocopy of Amateur Club Radio Station license",
                list_of_licensed_amateur_club_members:
                    "List of licensed Amateur Club Trustee, Officers, and Members",
            };
        } else if (examType.includes("atrsl")) {
            labels = {
                ...defaultLabels,
                photocopy_of_amateur_radio_station_license:
                    "Photocopy of Amateur Radio Station License",
                proof_of_amateur_activities: "Proof of Amateur Activity(ies)",
            };
        } else if (examType.includes("at-lifetime")) {
            labels = {
                ...defaultLabels,
                // Add the correct label for AT-Lifetime here
                report_of_rating: "Placeholder for AT-Lifetime",
            };
        }
        //New
    } else if (applicationType == "new") {
        if (examType.includes("atroc")) {
            labels = {
                ...defaultLabels,
                report_of_rating: "Photocopy of valid Report of Rating",
            };
        } else if (examType.includes("at-club-rsl")) {
            labels = {
                photocopy_of_valid_permit_to_purchase_possess:
                    "Photocopy of valid Permit to Purchase/Possess",
                equipment_document:
                    "Photocopy of document indicating source of equipment: ",
            };
        } else if (examType.includes("atrsl")) {
            labels = {
                ...defaultLabels,

                photocopy_of_valid_permit_to_purchase_possess:
                    "Photocopy of valid Permit to Purchase/Possess",
                equipment_document:
                    "Photocopy of document indicating source of equipment: ",
            };
        } else if (examType.includes("at-lifetime")) {
            labels = {
                ...defaultLabels,
                // Add the correct label for AT-Lifetime here
                certificate_of_good_standing:
                    "Certificate of Good Standing as a Member from a registered amateur club or association with the NTC",
                photocopy_of_amateur_class_a_radio_station_license:
                    "Photocopy of Amateur Class “A” RSL",
                proof_of_amateur_service:
                    "Proof of amateur service of at least fifteen (15) consecutive years",
                proof_of_identity: "Photocopy of any of the following:",
            };
        }
        //Modification
    } else if (applicationType == "modification") {
        if (examType.includes("atroc")) {
            labels = {
                ...defaultLabels,
                amateur_radio_operator_certificate_photocopy:
                    "Photocopy of Amateur Radio Operator Certificate",
            };
        } else if (examType.includes("at-club-rsl")) {
            labels = {
                photocopy_of_amateur_club_radio_station_license:
                    "Photocopy of Amateur Club Radio Station license",

                photocopy_of_valid_permit_to_purchase_possess:
                    "Photocopy of valid Permit to Purchase/Possess",
                equipment_document:
                    "Photocopy of document indicating source of equipment: ",
                station_location_map:
                    "Map showing the station location with geographical coordinates",
            };
        } else if (examType.includes("atrsl")) {
            labels = {
                ...defaultLabels,
                // Add the correct label for AT-Club-RSL here
                photocopy_of_valid_permit_to_purchase_possess:
                    "Photocopy of valid Permit to Purchase/Possess",
                equipment_document:
                    "Photocopy of document indicating source of equipment: ",
            };
        } else if (examType.includes("at-lifetime")) {
            labels = {
                // Add the correct label for AT-Lifetime here
                photocopy_of_supplementary_certificate:
                    "Photocopy of Supplementary Certificate",
                photocopy_of_valid_permit_to_purchase_possess:
                    "Photocopy of valid Permit to Purchase/Possess",
                equipment_document:
                    "Photocopy of document indicating source of equipment: ",
            };
        }
    }

    if (!labels) {
        labels = defaultLabels;
    }

    const accentMap = [
        "border-emerald-200",
        "border-sky-200",
        "border-amber-200",
    ];
    let accentIndex = 0;

    const proceedPaymentBtn = document.getElementById("proceedPayment");
    if (proceedPaymentBtn) {
        proceedPaymentBtn.disabled = true;
    }

    function updateWrapperAccent(wrapper) {
        wrapper.classList.remove(
            "border-emerald-200",
            "border-sky-200",
            "border-amber-200"
        );
        const accent = accentMap[accentIndex % accentMap.length];
        accentIndex += 1;
        wrapper.classList.add(accent);
    }

    function formatUploadedText(input) {
        if (!input.files || input.files.length === 0) return "No file selected";
        if (input.files.length === 1) return input.files[0].name;
        return `${input.files.length} files selected`;
    }

    function updateFileStatus(wrapper, input) {
        const status = wrapper.querySelector("[data-role='file-status']");
        if (!status) return;

        const hasFiles = !!(input.files && input.files.length);

        status.textContent = formatUploadedText(input);
        status.classList.toggle("text-emerald-600", hasFiles);
        status.classList.toggle("text-gray-500", !hasFiles);
        wrapper.classList.toggle("ring-1", hasFiles);
        wrapper.classList.toggle("ring-emerald-200", hasFiles);
    }

    function updateGlobalStatus(allFilled, uploaded, total, gcashReady) {
        if (statusPill) {
            statusPill.textContent = allFilled
                ? gcashReady
                    ? "Ready to proceed"
                    : "Select GCash to proceed"
                : `Uploaded ${uploaded}/${total}`;
            statusPill.classList.toggle(
                "bg-emerald-100",
                allFilled && gcashReady
            );
            statusPill.classList.toggle(
                "text-emerald-700",
                allFilled && gcashReady
            );
            statusPill.classList.toggle("bg-gray-100", !allFilled);
            statusPill.classList.toggle("text-gray-600", !allFilled);
        }

        if (statusMessage) {
            statusMessage.textContent = allFilled
                ? gcashReady
                    ? "Great! All required documents are attached and GCash is selected."
                    : "Documents look good! Choose GCash to unlock the payment step."
                : "Upload all required documents to unlock the payment step.";
        }
    }

    function buildSpecialContent(name) {
        if (name === "list_of_licensed_amateur_club_members") {
            return `
                <label class="block text-base font-semibold text-gray-900" for="proof_of_identity">
                    List of licensed Amateur Club Trustee, Officers, and Members
                </label>
                <ul class="ml-4 list-disc space-y-1 text-sm text-gray-700">
                    <li>Minimum 25 licensed amateur radio operators</li>
                    <li>Licenses of members will be validated</li>
                    <li>Trustee must be a Class A license holder for at least 5 years</li>
                    <li>Amateur Fixed Station is issued only to the Club Trustee</li>
                </ul>
                <input type="file" name="equipment_document" id="equipment_document"
                    accept=".pdf,.jpg,.png"
                    class="block w-full rounded-xl border border-gray-300 bg-gray-50 p-3 text-sm font-medium text-gray-700 transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
            `;
        }

        if (name === "equipment_document") {
            return `
                <label class="block text-base font-semibold text-gray-900" for="proof_of_identity">
                    Photocopy of document indicating source of equipment: 
                </label>
                <ul class="ml-4 list-disc space-y-1 text-sm text-gray-700">
                    <li>Locally-sourced: Official Receipt or Sales Invoice</li>
                    <li>Imported: Invoice from supplier AND Permit to Import</li>
                </ul>
                <input type="file" name="equipment_document" id="equipment_document"
                    accept=".pdf,.jpg,.png"
                    class="block w-full rounded-xl border border-gray-300 bg-gray-50 p-3 text-sm font-medium text-gray-700 transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
            `;
        }

        if (name === "coa") {
            return `
                <label class="block text-base font-semibold text-gray-900" for="coa">
                    Certificate of attendance of seminar issued by an NTC accredited Amateur Radio Club
                </label>
                <p class="text-sm text-gray-600">Note: Not required for retakers.</p>
                <input type="file" name="coa" id="coa"
                    accept=".pdf,.jpg,.png"
                    class="block w-full rounded-xl border border-gray-300 bg-gray-50 p-3 text-sm font-medium text-gray-700 transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
            `;
        }

        return "";
    }

    function createInput(name, labelText) {
        const wrapper = document.createElement("div");
        wrapper.classList.add(...baseCardClasses);
        wrapper.dataset.requirementName = name;
        updateWrapperAccent(wrapper);

        const specialContent = buildSpecialContent(name);
        if (specialContent) {
            wrapper.innerHTML = specialContent;
        } else {
            const label = document.createElement("label");
            label.textContent = labelText;
            label.setAttribute("for", name);
            label.classList.add(
                "block",
                "text-base",
                "font-semibold",
                "text-gray-900"
            );

            const input = document.createElement("input");
            input.type = "file";
            input.name = name;
            input.id = name;
            input.accept = ".pdf,.jpg,.png";
            input.classList.add(
                "mt-2",
                "block",
                "w-full",
                "rounded-xl",
                "border",
                "border-gray-300",
                "bg-gray-50",
                "p-3",
                "text-sm",
                "font-medium",
                "text-gray-700",
                "transition",
                "focus:border-emerald-500",
                "focus:ring-2",
                "focus:ring-emerald-200"
            );

            wrapper.appendChild(label);
            wrapper.appendChild(input);
        }

        const status = document.createElement("p");
        status.dataset.role = "file-status";
        status.classList.add("text-sm", "font-medium", "text-gray-500");
        status.textContent = "No file selected";
        wrapper.appendChild(status);

        fieldsHost.appendChild(wrapper);

        const input = wrapper.querySelector("input[type='file']");
        if (!input) return;

        input.addEventListener("change", () => {
            updateFileStatus(wrapper, input);
            checkAllFilesUploaded();
        });
    }

    Object.entries(labels).forEach(([name, labelText]) => {
        createInput(name, labelText);
    });

    function checkAllFilesUploaded() {
        const inputs = fieldsHost.querySelectorAll("input[type='file']");
        let filledCount = 0;

        inputs.forEach((input) => {
            if (input.files && input.files.length > 0) {
                filledCount += 1;
            }
        });

        const allFilled = filledCount === inputs.length && inputs.length > 0;
        const gcashReady = paymentInput?.value === "gcash";
        const canProceed = allFilled && gcashReady;

        if (proceedPaymentBtn) {
            proceedPaymentBtn.disabled = !canProceed;
            proceedPaymentBtn.classList.toggle("opacity-50", !canProceed);
            proceedPaymentBtn.classList.toggle(
                "cursor-not-allowed",
                !canProceed
            );
        }

        updateGlobalStatus(
            allFilled,
            filledCount,
            inputs.length || 0,
            gcashReady
        );
        return canProceed;
    }

    // Initial check (in case some inputs are pre-filled)
    checkAllFilesUploaded();

    if (typeof window !== "undefined") {
        window.__revalidateAttachments = checkAllFilesUploaded;
    }
}
