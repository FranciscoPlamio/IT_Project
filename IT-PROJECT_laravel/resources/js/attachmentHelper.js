import attachmentsForm101 from "./formAttachments/1-01.js";
import attachmentsForm102 from "./formAttachments/1-02.js";
import attachmentsForm103 from "./formAttachments/1-03.js";
import attachmentsForm109 from "./formAttachments/1-09.js";

const attachmentHandlers = {
    "1-01": attachmentsForm101,
    "1-02": attachmentsForm102,
    "1-03": attachmentsForm103,
    "1-09": attachmentsForm109,
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
