import attachmentsForm101 from "./formAttachments/1-01.js";

const attachmentHandlers = {
    "1-01": attachmentsForm101,
};

export function createAttachments(formType, containerId) {
    const handler = attachmentHandlers[formType];
    let form;
    if (window.formData) {
        form = window.formData;
    }
    if (handler) handler(containerId, form);
    else console.warn(`No attachment handler for form type: ${formType}`);
}
