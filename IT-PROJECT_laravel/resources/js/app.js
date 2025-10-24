import "./bootstrap";
import initSharedValidator from './forms/sharedValidator';

document.addEventListener("DOMContentLoaded", () => {
    // Initialize shared validator for forms other than Form1-01
    try {
        initSharedValidator();
    } catch (e) {
        // Fail gracefully in case of runtime errors
        // eslint-disable-next-line no-console
        console.error('Shared validator init failed', e);
    }

    // Existing placeholder for page specific DOM hooks
    // const form = document.getElementById('emailAuthForm');
    // if (!form) return;
    // form.addEventListener('submit', (e) => {
    //   e.preventDefault();
    //   const url = form.getAttribute('data-redirect-url') || '/';
    //   window.location.href = url;
    // });
});
