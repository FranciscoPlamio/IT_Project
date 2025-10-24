document.addEventListener("DOMContentLoaded", function () {
    // Payment form validation (if form exists)
    const form = document.querySelector("form.payment-form");

    if (form) {
        form.addEventListener("submit", function (e) {
            let valid = true;
            const name = document.querySelector('input[name="name"]').value.trim();
            const email = document.querySelector('input[name="email"]').value.trim();
            const cardNumber = document.querySelector('input[name="cardNumber"]').value.trim();
            const expiry = document.querySelector('input[name="expiry"]').value.trim();
            const cvv = document.querySelector('input[name="cvv"]').value.trim();
            const amount = document.querySelector('input[name="amount"]').value.trim();

            if (!name || !email || !cardNumber || !expiry || !cvv || !amount) {
                alert("Please fill in all fields.");
                valid = false;
            } else if (!/^\d{13,19}$/.test(cardNumber)) {
                alert("Card number must be 13 to 19 digits.");
                valid = false;
            } else if (!/^\d{3,4}$/.test(cvv)) {
                alert("CVV must be 3 or 4 digits.");
                valid = false;
            } else if (isNaN(amount) || amount <= 0) {
                alert("Please enter a valid amount.");
                valid = false;
            }

            if (!valid) e.preventDefault();
        });
    }

    // Logout Modal Handling
    console.log("JS Loaded (Laravel Bill Pay)");

    const logoutLink = document.querySelector(".bottom-links .menu-item");
    const modal = document.getElementById("logout-modal");
    const confirmBtn = document.getElementById("confirm-logout");
    const cancelBtn = document.getElementById("cancel-logout");
    const logoutForm = document.getElementById("logout-form");

    if (logoutLink && modal) {
        logoutLink.addEventListener("click", (e) => {
            e.preventDefault();
            modal.style.display = "flex";
        });

        confirmBtn.addEventListener("click", (e) => {
            e.preventDefault();
            if (logoutForm) logoutForm.submit();
        });

        cancelBtn.addEventListener("click", () => {
            modal.style.display = "none";
        });

        modal.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        });
    }
});

/* SET PAYMENT AS PAID */
function setPaid(formId, btn) {
    if (!confirm("Mark this payment as Paid?")) return;

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    btn.disabled = true;
    btn.textContent = "Working...";

    fetch("/adminside/set-paid", {  
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": token,
            "Accept": "application/json",
        },
        body: JSON.stringify({ form_id: formId }),
    })
        .then(async (res) => {
            const data = await res.json().catch(() => null);
            if (!res.ok) throw new Error(data?.message || "Server error");
            return data;
        })
        .then((data) => {
            const row = btn.closest("tr");
            if (!row) return;

            const statusCell = row.querySelector(".payment-status");
            const dateCell = row.querySelector(".payment-date");

            if (statusCell) {
                statusCell.textContent = "Paid";
                statusCell.classList.remove("pending", "unpaid");
                statusCell.classList.add("paid");
            }

            // Update payment date if provided
            if (dateCell && data.payment_date) {
                dateCell.textContent = data.payment_date;
            }

            // Replace button with a gray dash
            const actionCell = row.querySelector(".action-cell");
            if (actionCell) {
                actionCell.innerHTML = '<span style="color:gray"></span>';
            }

            // Visual feedback
            row.style.transition = "background 0.5s";
            row.style.background = "#e6ffef";
            setTimeout(() => (row.style.background = ""), 1100);
        })
        .catch((err) => {
            console.error("setPaid error:", err);
            alert("Failed to mark as paid: " + (err.message || err));
            btn.disabled = false;
            btn.textContent = "Paid";
        });
}

// export for debugging/scope
window.setPaid = setPaid;
