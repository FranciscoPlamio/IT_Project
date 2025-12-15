import "./bootstrap";
import initSharedValidator from "./forms/sharedValidator";
import { createAttachments } from "./attachmentHelper.js";

document.addEventListener("DOMContentLoaded", () => {
    // Initialize shared validator for forms other than Form1-01
    try {
        initSharedValidator();
    } catch (e) {
        // Fail gracefully in case of runtime errors
        // eslint-disable-next-line no-console
        console.error("Shared validator init failed", e);
    }

    // Existing placeholder for page specific DOM hooks
    // const form = document.getElementById('emailAuthForm');
    // if (!form) return;
    // form.addEventListener('submit', (e) => {
    //   e.preventDefault();
    //   const url = form.getAttribute('data-redirect-url') || '/';
    //   window.location.href = url;
    // });
    setTimeout(() => {
        const banner = document.getElementById("top-banner");
        if (banner) {
            banner.classList.add("opacity-0"); // fade effect (Tailwind)
            // After fade, hide it completely
            setTimeout(() => (banner.style.display = "none"), 500);
        }
    }, 4000);

    const container = document.getElementById("attachments-container");
    if (container) {
        const formType = container.dataset.formType;
        createAttachments(formType, "attachments-container");
    }
});
