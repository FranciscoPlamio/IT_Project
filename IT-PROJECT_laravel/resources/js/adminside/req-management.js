document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector("#searchInput");
    const tableRows = document.querySelectorAll(".table-container table tbody tr");

    // Search filter
    if (searchInput) {
        searchInput.addEventListener("keyup", function () {
            const filter = searchInput.value.toLowerCase();
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    }

    //Add click event to "See more"
    const seeMoreLinks = document.querySelectorAll(".see-more");
    seeMoreLinks.forEach(link => {
        link.addEventListener("click", function () {
            alert("More details coming soon...");
        });
    });
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
    latestRows.forEach(row => {
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

      latestRows.forEach(row => {
        const dateText = row.children[2].textContent.trim();
        const formType = row.children[1].textContent.toLowerCase();
        let showRow = true;

        const rowDate = new Date(dateText);
        if (selectedDate !== "all" && startDate) {
          if (rowDate < startDate || rowDate > endDate) showRow = false;
        }

        if (selectedForm !== "all") {
          const formCode = formType.replace(/\s+/g, '').toLowerCase();
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
  const historyFilterIcon = document.querySelector(".half-section:last-of-type .filter-bar img");
  const historyDropdown = document.getElementById("filterDropdownLatest");
  const historyDateType = document.getElementById("historyDateType");
  const historyDateFilter = document.getElementById("dateFilterLatest");
  const historyFormFilter = document.getElementById("formFilterLatest");
  const applyHistory = document.getElementById("applyFilterLatest");

  // Search with Highlight 
  if (historySearch) {
    historySearch.addEventListener("keyup", function () {
      const filter = historySearch.value.toLowerCase();
      historyRows.forEach(row => {
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

      historyRows.forEach(row => {
        const dateText = selectedDateType === "release"
          ? row.children[3].textContent.trim()
          : row.children[2].textContent.trim();

        const formType = row.children[1].textContent.toLowerCase();
        const rowDate = new Date(dateText);
        let showRow = true;

        if (selectedDate !== "all" && startDate) {
          if (rowDate < startDate || rowDate > endDate) showRow = false;
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
    if (!latestDropdown.contains(e.target) && !latestFilterIcon.contains(e.target)) {
      latestDropdown.style.display = "none";
    }
    if (!historyDropdown.contains(e.target) && !historyFilterIcon.contains(e.target)) {
      historyDropdown.style.display = "none";
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
