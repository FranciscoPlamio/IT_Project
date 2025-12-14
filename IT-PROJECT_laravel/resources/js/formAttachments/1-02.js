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
    if (examType.includes("tp")) {
        labels = {
            id_picture:
                "ID picture (1” x 1”) taken within the last six (6) months",
            radio_operator_certificate_photocopy:
                "Photocopy of Radio Operator Certificate",
            certificate_of_employment: "Certificate of Employment",
        };

        //Modification
    } else if (applicationType == "modification") {
        labels = {
            id_picture:
                "ID picture (1” x 1”) taken within the last six (6) months",
        };

        //Renewal
    } else if (applicationType == "renewal") {
        if (examType.includes("groc") || examType.includes("rlm")) {
            labels = {
                id_picture:
                    "ID picture (1” x 1”) taken within the last six (6) months",
                radio_operator_certificate_photocopy:
                    "Photocopy of Radio Operator Certificate",
                certificate_of_employment: "Certificate of Employment",
            };
        } else if (
            examType.includes("rtg") ||
            examType.includes("phn") ||
            examType == "rroc-aircraft" ||
            examType.includes("srop")
        ) {
            labels = {
                id_picture:
                    "ID picture (1” x 1”) taken within the last six (6) months",
                radio_operator_certificate_photocopy:
                    "Photocopy of Radio Operator Certificate",
            };
        }
    } else if (applicationType == "new") {
        if (examType.includes("groc")) {
            labels = {
                ...defaultLabels,
                service_record: "Service Record",
                good_moral_certificate: "Certificate of Good Moral Character",
                government_service_radio_operator_certificate_photocopy:
                    "Government service as a radio operator certificate",
            };
        } else if (examType.includes("srop")) {
            labels = {
                ...defaultLabels,
                completion_of_seminar_certificate:
                    "Photocopy of Certificate of Completion of seminar",
            };
        } else if (
            examType.includes("rtg") ||
            examType.includes("phn") ||
            examType == "rroc-aircraft" ||
            examType.includes("rlm")
        ) {
            labels = {
                ...defaultLabels,
                report_of_rating: "Photocopy of valid Report of Rating",
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
        if (name === "transcript_of_records") {
            return `
                <label class="block text-base font-semibold text-gray-900" for="transcript_of_records">
                    Photocopy of Transcript of Records with Special Order (SO)
                </label>
                <p class="text-sm text-gray-600">Note 1: Present the original upon request.</p>
                <p class="text-sm text-gray-600">Note 2: SO is not required for State Universities/Colleges.</p>
                <p class="text-sm text-gray-600">Note 3: Not required for retakers.</p>
                <input type="file" name="transcript_of_records" id="transcript_of_records"
                    accept=".pdf,.jpg,.png"
                    class="block w-full rounded-xl border border-gray-300 bg-gray-50 p-3 text-sm font-medium text-gray-700 transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200">
            `;
        }

        if (name === "proof_of_identity") {
            return `
                <label class="block text-base font-semibold text-gray-900" for="proof_of_identity">
                    Photocopy of ANY of the following:
                </label>
                <ul class="ml-4 list-disc space-y-1 text-sm text-gray-700">
                    <li>National ID</li>
                    <li>Birth Certificate</li>
                    <li>Baptismal Certificate</li>
                    <li>Passport</li>
                    <li>Driver’s License or similar proof for age requirement</li>
                </ul>
                <p class="text-sm text-gray-600">Note 1: Present the original upon request.</p>
                <p class="text-sm text-gray-600">Note 2: Not required for retakers.</p>
                <input type="file" name="proof_of_identity" id="proof_of_identity"
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
