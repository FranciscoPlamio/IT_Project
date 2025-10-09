console.log("req-management.js loaded");

// Handle Upload button click
function handleUpload() {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = '.pdf,.jpg,.png,.docx';
    input.onchange = () => {
        alert(`File selected: ${input.files[0].name}`);
    };
    input.click();
}

// Handle Complete button click
function handleComplete() {
    alert("Status set to Complete!");
}

// Handle In Progress button click
function handleProgress() {
    alert("Status set to In Progress!");
}

document.addEventListener("DOMContentLoaded", () => {
    console.log("JS Loaded (Laravel)"); // Debugging

    const logoutLink = document.querySelector(".bottom-links .menu-item");
    const modal = document.getElementById("logout-modal");
    const confirmBtn = document.getElementById("confirm-logout");
    const cancelBtn = document.getElementById("cancel-logout");
    const logoutForm = document.getElementById("logout-form");

    if (!logoutLink || !modal) {
        console.warn("Logout elements not found");
        return;
    }

    // Show modal when logout is clicked
    logoutLink.addEventListener("click", (e) => {
        e.preventDefault();
        console.log("Logout clicked");
        modal.style.display = "flex";
    });

    // Confirm logout -> submit Laravel form
    confirmBtn.addEventListener("click", (e) => {
        e.preventDefault();
        console.log("Confirmed logout");
        if (logoutForm) {
            logoutForm.submit();
        }
    });

    // Cancel logout
    cancelBtn.addEventListener("click", () => {
        console.log("Cancelled logout");
        modal.style.display = "none";
    });

    // Close modal if background clicked
    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
});

function updateStatus(formId, newStatus) {
    console.log("Updating status for:", formId, "→", newStatus);

    fetch('/admin/update-status', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            form_id: formId,
            status: newStatus
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log("Server response:", data);

        if (data.success) {
            alert(` Status updated to ${newStatus.toUpperCase()}`);
            location.reload(); // refresh to reflect change
        } else {
            alert(` ${data.message || "Failed to update status."}`);
        }
    })
    .catch(error => {
        console.error(" AJAX error:", error);
        alert("Something went wrong. Check the console.");
    });
}

window.updateStatus = updateStatus;

