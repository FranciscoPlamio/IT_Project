import "./bootstrap";
import { createAttachments } from "./attachmentHelper.js";

document.addEventListener("DOMContentLoaded", () => {
    //   const form = document.getElementById('emailAuthForm');
    //   if (!form) return;
    //   form.addEventListener('submit', (e) => {
    //     e.preventDefault();
    //     const url = form.getAttribute('data-redirect-url') || '/';
    //     window.location.href = url;
    //   });
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
