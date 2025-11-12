export default function attachmentsForm101(containerId, form) {
    const examType = form.exam_type;
    const container = document.getElementById(containerId);
    if (!container) return;

    let labels;

    if (examType.includes("class")) {
        labels = {
            id_picture:
                "ID picture (1” x 1”) taken within the last six (6) months",
            proof_of_identity: "Photocopy of any of the following:",
            coa: "Certificate of attendance of seminar issued by NTC accredited Amateur Radio Club:",
        };
    } else if (examType.includes("rtg")) {
        labels = {
            id_picture:
                "ID picture (1” x 1”) taken within the last six (6) months",
            proof_of_identity: "Photocopy of any of the following:",
            transcript_of_records:
                "Photocopy of Transcript of Records with Special Order (SO)",
        };
    } else if (examType.includes("phn")) {
        labels = {
            id_picture:
                "ID picture (1” x 1”) taken within the last six (6) months",
            proof_of_identity: "Photocopy of any of the following:",
            transcript_of_records:
                "Photocopy of Transcript of Records with Special Order (SO)",
        };
    } else if (examType.includes("rroc")) {
        labels = {
            id_picture:
                "ID picture (1” x 1”) taken within the last six (6) months",
            pilot_license:
                "Aircraft pilot’s license OR Student pilot’s license:",
        };
    }
    // Generate each input
    for (const [name, labelText] of Object.entries(labels)) {
        // Wrapper for spacing between groups
        const wrapper = document.createElement("div");
        wrapper.classList.add("mb-4", "ml-2"); // margin-bottom for spacing
        //Proof of identity
        if (name == "transcript_of_records") {
            wrapper.innerHTML = `<div class="mb-6">
    <label class="block font-semibold mb-2" for="transcript_of_records">
       Photocopy of Transcript of Records with Special Order (SO):
    </label>

    <p class="ml-6 text-gray-600 mb-1">Note 1: The applicant has to show the Original.</p>
    <p class="ml-6 text-gray-600 mb-2">Note 2: SO is not required for State Universities/ Colleges.</p>
    <p class="ml-6 text-gray-600 mb-2">Note 3: This requirement is not applicable for Retakers.</p>
        <input type="file" name="transcript_of_records" id="transcript_of_records"
           accept=".pdf,.jpg,.png" class="border p-2 rounded w-full mb-2">
</div>`;
            container.append(wrapper);
            continue;

            // Transcript of records
        } else if (name == "proof_of_identity") {
            wrapper.innerHTML = `<div class="mb-6">
    <label class="block font-semibold mb-2" for="proof_of_identity">
        Photocopy of ANY of the following:
    </label>


    <ul class="ml-6 list-disc text-gray-700 mb-2">
        <li>National ID</li>
        <li>Birth Certificate</li>
        <li>Baptismal Certificate</li>
        <li>Passport</li>
        <li>Driver’s License OR any document which can serve as the basis for age requirement</li>
    </ul>

    <p class="ml-6 text-gray-600 mb-1">Note 1: The applicant has to show the Original.</p>
    <p class="ml-6 text-gray-600 mb-2">Note 2: This requirement is not applicable for Retakers.</p>
        <input type="file" name="proof_of_identity" id="proof_of_identity"
           accept=".pdf,.jpg,.png" class="border p-2 rounded w-full mb-2">
</div>`;
            container.append(wrapper);
            continue;

            //COA
        } else if (name == "coa") {
            wrapper.innerHTML = `<div class="mb-6">
    <label class="block font-semibold mb-2" for="coa">
        Certificate of attendance of seminar issued by NTC accredited Amateur Radio Club::
    </label>
    <p class="ml-6 text-gray-600 mb-2">Note 1: This requirement is not applicable for Retakers.</p>
        <input type="file" name="coa" id="coa"
           accept=".pdf,.jpg,.png" class="border p-2 rounded w-full mb-2">
</div>`;
            container.append(wrapper);
            continue;
        }
        // Label (on top)
        const label = document.createElement("label");
        label.textContent = labelText;
        label.setAttribute("for", name);
        label.classList.add("block", "font-semibold", "mb-1");
        // "block" puts it on its own line, "mb-1" gives small space below

        // Input (below label)
        const input = document.createElement("input");
        input.type = "file";
        input.name = name;
        input.id = name;
        input.accept = ".pdf,.jpg,.png";
        input.classList.add("border", "p-2", "rounded", "w-full");

        // Put label + input inside wrapper
        wrapper.appendChild(label);
        wrapper.appendChild(input);

        // Add to container
        container.appendChild(wrapper);
    }
}
