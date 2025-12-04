document.addEventListener("DOMContentLoaded", function () {
    const message = sessionStorage.getItem("flashMessage");
    if (message) {
        showFlashMessage(message);
        sessionStorage.removeItem("flashMessage");
    }
    const searchInput = document.querySelector("#searchInput");
    const tableRows = document.querySelectorAll(
        ".table-container table tbody tr"
    );

    // Search filter
    if (searchInput) {
        searchInput.addEventListener("keyup", function () {
            const filter = searchInput.value.toLowerCase();
            tableRows.forEach((row) => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    }

    // "See more" is now handled by viewForm function
    initializeStatusDropdowns();
});

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
// Handle Upload button click
function handleUpload() {
    const input = document.createElement("input");
    input.type = "file";
    input.accept = ".pdf,.jpg,.png,.docx";
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

const STATUS_FLOW = ["pending", "processing", "done", "declined"];

function capitalize(word = "") {
    return word.charAt(0).toUpperCase() + word.slice(1);
}

function updateStatus(formId, newStatus) {
    console.log("Updating status for:", formId, "→", newStatus);
    if (newStatus === "done") {
        // Create a form element
        const form = document.createElement("form");
        form.method = "POST";
        form.action = `/admin/forms/${formId}/approve`; // your Laravel route

        // CSRF token
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        const csrfInput = document.createElement("input");
        csrfInput.type = "hidden";
        csrfInput.name = "_token";
        csrfInput.value = csrfToken;
        form.appendChild(csrfInput);

        // Status input
        const statusInput = document.createElement("input");
        statusInput.type = "hidden";
        statusInput.name = "status";
        statusInput.value = newStatus;
        form.appendChild(statusInput);

        // Append form to body and submit
        document.body.appendChild(form);
        form.submit();
        return;
    }
    if (newStatus === "declined") {
        // Create a form element
        const form = document.createElement("form");
        form.method = "POST";
        form.action = `/admin/forms/${formId}/decline`; // your Laravel route

        // CSRF token
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        const csrfInput = document.createElement("input");
        csrfInput.type = "hidden";
        csrfInput.name = "_token";
        csrfInput.value = csrfToken;
        form.appendChild(csrfInput);

        // Status input
        const statusInput = document.createElement("input");
        statusInput.type = "hidden";
        statusInput.name = "status";
        statusInput.value = newStatus;
        form.appendChild(statusInput);

        // Append form to body and submit
        document.body.appendChild(form);
        form.submit();
        return;
    }

    return fetch("/admin/update-status", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: JSON.stringify({
            form_id: formId,
            status: newStatus,
        }),
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Failed to update status. Please try again.");
            }
            return response.json();
        })
        .then((data) => {
            console.log("Server response:", data);

            if (!data.success) {
                throw new Error(data.message || "Failed to update status.");
            }

            return data;
        })
        .catch((error) => {
            console.error("AJAX error:", error);
            throw error;
        });
}

window.updateStatus = updateStatus;

function canTransition(currentStatus, nextStatus) {
    const currentIndex = STATUS_FLOW.indexOf(currentStatus);
    const nextIndex = STATUS_FLOW.indexOf(nextStatus);
    console.log(currentIndex, nextIndex);
    if (nextIndex === 3) {
        return {
            allowed: true,
        };
    }
    if (currentIndex === -1 || nextIndex === -1) {
        return {
            allowed: false,
            reason: "Invalid status selection.",
        };
    }

    if (currentIndex === nextIndex) {
        return {
            allowed: false,
            reason: null, // no change
        };
    }

    if (currentStatus === "done") {
        return {
            allowed: false,
            reason: "Request is already completed.",
        };
    }

    if (nextIndex < currentIndex) {
        return {
            allowed: false,
            reason: `Cannot revert status. Current status is ${capitalize(
                currentStatus
            )}.`,
        };
    }

    if (nextIndex - currentIndex > 1) {
        return {
            allowed: false,
            reason: "Please follow the status order: Pending → Processing → Done.",
        };
    }

    return {
        allowed: true,
    };
}
function showFlashMessage(message, duration = 3000) {
    const flash = document.getElementById("flash-message");
    flash.textContent = message;
    flash.style.opacity = "1";

    setTimeout(() => {
        flash.style.opacity = "0";
    }, duration);
}

function initializeStatusDropdowns() {
    const statusSelects = document.querySelectorAll(".status-select");

    statusSelects.forEach((select) => {
        const requestId = select.dataset.requestId;
        const currentStatus = (
            select.dataset.currentStatus || "pending"
        ).toLowerCase();

        if (!STATUS_FLOW.includes(currentStatus)) {
            console.warn(
                `Unmanaged status "${currentStatus}" for request ${requestId}. Dropdown disabled.`
            );
            select.disabled = true;
            return;
        }

        select.value = currentStatus;

        if (currentStatus === "done") {
            select.disabled = true;
        }

        select.addEventListener("change", () => {
            const previousStatus = (
                select.dataset.currentStatus || "pending"
            ).toLowerCase();
            const selectedStatus = select.value;
            const transition = canTransition(previousStatus, selectedStatus);

            if (!transition.allowed) {
                if (transition.reason) {
                    alert(transition.reason);
                }
                select.value = previousStatus;
                return;
            }

            select.disabled = true;
            select.classList.add("status-updating");

            updateStatus(requestId, selectedStatus)
                .then(() => {
                    // Store flash message for next page load
                    sessionStorage.setItem(
                        "flashMessage",
                        `Status updated to ${capitalize(selectedStatus)}.`
                    );

                    // Update current status in dataset
                    select.dataset.currentStatus = selectedStatus;
                    select.disabled = false;

                    // Reload the page (optional)
                    window.location.reload();
                })
                .catch((error) => {
                    alert(
                        error.message ||
                            "Failed to update status. Please try again."
                    );
                    select.value = previousStatus;
                })
                .finally(() => {
                    const latestStatus = (
                        select.dataset.currentStatus || previousStatus
                    ).toLowerCase();
                    select.disabled = latestStatus === "done";
                    select.classList.remove("status-updating");
                });
        });
    });
}

// Form Download Functions in progress (pj)
function viewForm(formToken, formType, formId, element) {
    // Store original element content for restoration (outside try block for error handling)
    let originalContent = "";
    let originalStyle = "";

    // Store original element state for restoration
    if (element) {
        originalContent = element.innerHTML;
        originalStyle = element.style.pointerEvents;
        // Show loading state
        element.innerHTML =
            'Loading... <img src="/images/see-icon.png" alt="See">';
        element.style.pointerEvents = "none";
        element.style.opacity = "0.6";
        element.style.cursor = "wait";
    }

    // Fetch form data from database using request ID
    fetch(`/admin/get-form-data?request_id=${encodeURIComponent(formId)}`, {
        method: "GET",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
            Accept: "application/json",
        },
    })
        .then((response) => response.json())
        .then((data) => {
            if (!data.success) {
                throw new Error(data.message || "Failed to fetch form data");
            }

            const formToken = data.form_token;
            const formType = data.form_type;

            if (!formToken || !formType) {
                throw new Error("Form data incomplete");
            }

            // Update loading state
            if (element) {
                element.innerHTML =
                    'Generating PDF... <img src="/images/see-icon.png" alt="See">';
            }

            // Clean form type (remove "Form" prefix if present)
            let cleanFormType = formType
                .replace(/^Form/i, "")
                .replace(/-/g, "_");

            // Build download URL using data from database
            const downloadUrl = `/admin/download-form?token=${encodeURIComponent(
                formToken
            )}&formType=${encodeURIComponent(cleanFormType)}`;

            // Create a temporary link to trigger download
            const link = document.createElement("a");
            link.href = downloadUrl;
            link.download = `NTC_Form_${cleanFormType}_${
                new Date().toISOString().split("T")[0]
            }.pdf`;
            link.style.display = "none";
            document.body.appendChild(link);

            // Trigger download
            link.click();

            // Clean up link
            setTimeout(() => {
                document.body.removeChild(link);
            }, 100);

            // Reset element state after a delay (to allow download to start)
            setTimeout(() => {
                if (element && originalContent) {
                    element.innerHTML = originalContent;
                    element.style.pointerEvents = originalStyle || "auto";
                    element.style.opacity = "1";
                    element.style.cursor = "pointer";
                }
            }, 2000);
        })
        .catch((error) => {
            console.error("PDF download error:", error);
            alert(error.message || "Failed to download PDF. Please try again.");

            // Reset element state on error
            if (element && originalContent) {
                element.innerHTML = originalContent;
                element.style.pointerEvents = originalStyle || "auto";
                element.style.opacity = "1";
                element.style.cursor = "pointer";
            }
        });
}

function approveRequest(formId) {
    updateStatus(formId, "done")
        .then(() => {
            alert("Status updated to Done.");
            window.location.reload();
        })
        .catch((error) => {
            alert(
                error.message || "Failed to approve request. Please try again."
            );
        });
}

window.viewForm = viewForm;
window.approveRequest = approveRequest;

function cancelRequest(formId) {
    if (!confirm("Are you sure you want to cancel this request?")) {
        return;
    }

    updateStatus(formId, "cancelled")
        .then(() => {
            alert("Request has been cancelled.");
            window.location.reload();
        })
        .catch((error) => {
            alert(
                error.message || "Failed to cancel request. Please try again."
            );
        });
}

window.cancelRequest = cancelRequest;

document.addEventListener("DOMContentLoaded", function () {
    console.log("Request Management JS Loaded");

    /* ========== LATEST REQUEST SEARCH & FILTER ========== */
    const latestSearch = document.getElementById("latestSearch");
    const latestRows = document.querySelectorAll(".table-container tbody tr");
    const latestFilterIcon = document.getElementById("latestFilterIcon");
    const latestDropdown = document.getElementById("latestFilterDropdown");
    const latestDateFilter = document.getElementById("latestDateFilter");
    const latestFormFilter = document.getElementById("latestFormFilter");
    const applyLatest = document.getElementById("applyLatestFilter");

    // Search for Latest Requests (with highlight)
    if (latestSearch) {
        latestSearch.addEventListener("keyup", function () {
            const filter = latestSearch.value.toLowerCase();
            latestRows.forEach((row) => {
                const text = row.textContent.toLowerCase();

                if (text.includes(filter) && filter !== "") {
                    row.style.display = "";
                    row.classList.add("highlight-gray");
                } else if (filter === "") {
                    row.style.display = "";
                    row.classList.remove("highlight-gray");
                } else {
                    row.style.display = "none";
                    row.classList.remove("highlight-gray");
                }
            });
        });
    }

    //Toggle Filter Dropdown (Latest)
    if (latestFilterIcon) {
        latestFilterIcon.addEventListener("click", () => {
            latestDropdown.style.display =
                latestDropdown.style.display === "block" ? "none" : "block";
        });
    }

    //Apply Filter for Latest
    if (applyLatest) {
        applyLatest.addEventListener("click", () => {
            const selectedDate = latestDateFilter.value;
            const selectedForm = latestFormFilter.value.toLowerCase();
            const now = new Date();

            let startDate = null;
            let endDate = new Date(now);

            if (selectedDate === "week") {
                const day = now.getDay();
                startDate = new Date(now);
                startDate.setDate(now.getDate() - day);
                endDate = new Date(startDate);
                endDate.setDate(startDate.getDate() + 6);
            } else if (selectedDate === "month") {
                startDate = new Date(now.getFullYear(), now.getMonth(), 1);
                endDate = new Date(now.getFullYear(), now.getMonth() + 1, 0);
            } else if (selectedDate === "3months") {
                startDate = new Date(now.getFullYear(), now.getMonth() - 2, 1);
            } else if (selectedDate === "6months") {
                startDate = new Date(now.getFullYear(), now.getMonth() - 5, 1);
            } else if (selectedDate === "year") {
                startDate = new Date(now.getFullYear(), 0, 1);
                endDate = new Date(now.getFullYear(), 11, 31);
            }

            latestRows.forEach((row) => {
                const dateText = row.children[2].textContent.trim();
                const formType = row.children[1].textContent.toLowerCase();
                let showRow = true;

                const rowDate = new Date(dateText);
                if (selectedDate !== "all" && startDate) {
                    if (rowDate < startDate || rowDate > endDate)
                        showRow = false;
                }

                if (selectedForm !== "all") {
                    const formCode = formType.replace(/\s+/g, "").toLowerCase();
                    if (!formCode.includes(selectedForm)) showRow = false;
                }

                row.style.display = showRow ? "" : "none";
            });

            latestDropdown.style.display = "none";
        });
    }

    /* ========== HISTORY SEARCH & FILTER ========== */
    const historySearch = document.getElementById("searchLatest");
    const historyRows = document.querySelectorAll(".table-container1 tbody tr");
    const historyFilterIcon = document.querySelector(
        ".half-section:last-of-type .filter-bar img"
    );
    const historyDropdown = document.getElementById("filterDropdownLatest");
    const historyDateType = document.getElementById("historyDateType");
    const historyDateFilter = document.getElementById("dateFilterLatest");
    const historyFormFilter = document.getElementById("formFilterLatest");
    const applyHistory = document.getElementById("applyFilterLatest");

    // Search with Highlight
    if (historySearch) {
        historySearch.addEventListener("keyup", function () {
            const filter = historySearch.value.toLowerCase();
            historyRows.forEach((row) => {
                const text = row.textContent.toLowerCase();
                if (text.includes(filter) && filter !== "") {
                    row.style.display = "";
                    row.classList.add("highlight-gray");
                } else if (filter === "") {
                    row.style.display = "";
                    row.classList.remove("highlight-gray");
                } else {
                    row.style.display = "none";
                    row.classList.remove("highlight-gray");
                }
            });
        });
    }

    // Toggle Filter Dropdown (History)
    if (historyFilterIcon) {
        historyFilterIcon.addEventListener("click", () => {
            historyDropdown.style.display =
                historyDropdown.style.display === "block" ? "none" : "block";
        });
    }

    // Apply Filter for History
    if (applyHistory) {
        applyHistory.addEventListener("click", () => {
            const selectedDateType = historyDateType.value;
            const selectedDate = historyDateFilter.value;
            const selectedForm = historyFormFilter.value.toLowerCase();
            const now = new Date();

            let startDate = null;
            let endDate = new Date(now);

            if (selectedDate === "week") {
                const day = now.getDay();
                startDate = new Date(now);
                startDate.setDate(now.getDate() - day);
                endDate = new Date(startDate);
                endDate.setDate(startDate.getDate() + 6);
            } else if (selectedDate === "month") {
                startDate = new Date(now.getFullYear(), now.getMonth(), 1);
                endDate = new Date(now.getFullYear(), now.getMonth() + 1, 0);
            } else if (selectedDate === "3months") {
                startDate = new Date(now.getFullYear(), now.getMonth() - 2, 1);
            } else if (selectedDate === "6months") {
                startDate = new Date(now.getFullYear(), now.getMonth() - 5, 1);
            } else if (selectedDate === "year") {
                startDate = new Date(now.getFullYear(), 0, 1);
                endDate = new Date(now.getFullYear(), 11, 31);
            }

            historyRows.forEach((row) => {
                const dateText =
                    selectedDateType === "release"
                        ? row.children[3].textContent.trim()
                        : row.children[2].textContent.trim();

                const formType = row.children[1].textContent.toLowerCase();
                const rowDate = new Date(dateText);
                let showRow = true;

                if (selectedDate !== "all" && startDate) {
                    if (rowDate < startDate || rowDate > endDate)
                        showRow = false;
                }

                if (selectedForm !== "all") {
                    const formCode = formType.replace(/\s+/g, "").toLowerCase();
                    if (!formCode.includes(selectedForm)) showRow = false;
                }

                row.style.display = showRow ? "" : "none";
            });

            historyDropdown.style.display = "none";
        });
    }

    // Close any dropdown when clicking outside
    document.addEventListener("click", (e) => {
        if (
            !latestDropdown.contains(e.target) &&
            !latestFilterIcon.contains(e.target)
        ) {
            latestDropdown.style.display = "none";
        }
        if (historyDropdown) {
            if (
                !historyDropdown.contains(e.target) &&
                !historyFilterIcon.contains(e.target)
            ) {
                historyDropdown.style.display = "none";
            }
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const highlighted = document.querySelector(".highlighted");

    if (highlighted) {
        highlighted.scrollIntoView({ behavior: "smooth", block: "center" });

        //  Remove highlight when clicking anywhere
        document.addEventListener("click", (e) => {
            if (!highlighted.contains(e.target)) {
                highlighted.classList.remove("highlighted");
            }
        });
    }
});
