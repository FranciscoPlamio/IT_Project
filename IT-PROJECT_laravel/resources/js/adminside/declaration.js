document.addEventListener('DOMContentLoaded', () => {
    const logoutLink = document.getElementById('logout-link');
    const logoutModal = document.getElementById('logout-modal');
    const confirmLogout = document.getElementById('confirm-logout');
    const cancelLogout = document.getElementById('cancel-logout');
    const logoutForm = document.getElementById('logout-form');

    if (logoutLink && logoutModal) {
        logoutLink.addEventListener('click', (event) => {
            event.preventDefault();
            logoutModal.style.display = 'flex';
        });
    }

    if (cancelLogout && logoutModal) {
        cancelLogout.addEventListener('click', () => {
            logoutModal.style.display = 'none';
        });
    }

    if (confirmLogout && logoutForm) {
        confirmLogout.addEventListener('click', (event) => {
            event.preventDefault();
            logoutForm.submit();
        });
    }

    if (logoutModal) {
        logoutModal.addEventListener('click', (event) => {
            if (event.target === logoutModal) {
                logoutModal.style.display = 'none';
            }
        });
    }

    // Official receipt modal logic
    const receiptModal = document.getElementById('receiptModal');
    const receiptClose = document.getElementById('receiptModalClose');
    const receiptSubtitle = document.getElementById('receiptModalSubtitle');
    const receiptCancelBtn = document.getElementById('receiptCancelBtn');
    const receiptForm = document.getElementById('receiptForm');

    const openReceiptModal = (reference = '', applicant = '', form = '') => {
        if (!receiptModal) return;
        if (receiptSubtitle) {
            const details = [reference, applicant, form].filter(Boolean).join(' • ');
            receiptSubtitle.textContent = details || 'Official receipt entry';
        }

        if (receiptForm) {
            receiptForm.reset();
        }

        receiptModal.style.display = 'flex';
        receiptModal.setAttribute('aria-hidden', 'false');
    };

    const closeReceiptModal = () => {
        if (!receiptModal) return;
        receiptModal.style.display = 'none';
        receiptModal.setAttribute('aria-hidden', 'true');
    };

    document.querySelectorAll('.open-receipt-btn').forEach((button) => {
        button.addEventListener('click', () => {
            const reference = button.dataset.reference || '';
            const applicant = button.dataset.applicant || '';
            const form = button.dataset.form || '';
            openReceiptModal(reference, applicant, form);
        });
    });

    [receiptClose, receiptCancelBtn].forEach((el) => {
        if (!el) return;
        el.addEventListener('click', (event) => {
            event.preventDefault();
            closeReceiptModal();
        });
    });

    if (receiptModal) {
        receiptModal.addEventListener('click', (event) => {
            if (event.target === receiptModal) {
                closeReceiptModal();
            }
        });
    }

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeReceiptModal();
        }
    });

    if (receiptForm) {
        receiptForm.addEventListener('submit', (event) => {
            event.preventDefault();
            // Placeholder for persistence logic
            closeReceiptModal();
        });
    }
});

