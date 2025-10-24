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

    // Add click event to "See more"
    const seeMoreLinks = document.querySelectorAll(".see-more");
    seeMoreLinks.forEach(link => {
        link.addEventListener("click", function () {
            alert("More details coming soon...");
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
  const logoutLink = document.querySelector(".bottom-links .menu-item");
  const modal = document.getElementById("logout-modal");
  const confirmBtn = document.getElementById("confirm-logout");
  const cancelBtn = document.getElementById("cancel-logout");
  const logoutForm = document.getElementById("logout-form");

  // Show modal when logout is clicked
  logoutLink.addEventListener("click", (e) => {
    e.preventDefault();
    modal.style.display = "flex";
  });

  // Confirm logout -> submit hidden form
  confirmBtn.addEventListener("click", (e) => {
    e.preventDefault();
    logoutForm.submit(); // Laravel handles redirect/session clear
  });

  // Cancel logout -> close modal
  cancelBtn.addEventListener("click", () => {
    modal.style.display = "none";
  });

  // Close modal when clicking outside
  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });
});

 document.addEventListener("DOMContentLoaded", function() {
        const highlighted = document.querySelector(".highlighted");
        if (highlighted) {
            highlighted.scrollIntoView({ behavior: "smooth", block: "center" });
        }
    });

document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.querySelector("#searchInput");
  const tableRows = document.querySelectorAll(".table-container table tbody tr");
  const filterIcon = document.querySelector(".filter-bar img");
  const filterDropdown = document.getElementById("filterDropdown");
  const dateFilter = document.getElementById("dateFilter");
  const formFilter = document.getElementById("formFilter");
  const applyBtn = document.getElementById("applyFilter");

  // SEARCH BAR FUNCTIONALITY
  if (searchInput) {
    searchInput.addEventListener("keyup", function () {
      const filter = searchInput.value.toLowerCase();

      tableRows.forEach(row => {
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

  // TOGGLE FILTER DROPDOWN
  filterIcon.addEventListener("click", () => {
    filterDropdown.style.display =
      filterDropdown.style.display === "block" ? "none" : "block";
  });

  // APPLY FILTER
  applyBtn.addEventListener("click", () => {
    const selectedDate = dateFilter.value;
    const selectedForm = formFilter.value.toLowerCase();
    const now = new Date();

    let startDate = null;
    let endDate = new Date(now); // always ends at today

    if (selectedDate === "week") {
      // Sunday → Saturday
      const day = now.getDay(); // 0 = Sunday
      startDate = new Date(now);
      startDate.setDate(now.getDate() - day);
      endDate = new Date(startDate);
      endDate.setDate(startDate.getDate() + 6);
    } else if (selectedDate === "month") {
      startDate = new Date(now.getFullYear(), now.getMonth(), 1);
      endDate = new Date(now.getFullYear(), now.getMonth() + 1, 0);
    } else if (selectedDate === "3months") {
      const startMonth = now.getMonth() - 2;
      startDate = new Date(now.getFullYear(), startMonth, 1);
    } else if (selectedDate === "6months") {
      const startMonth = now.getMonth() - 5;
      startDate = new Date(now.getFullYear(), startMonth, 1);
    } else if (selectedDate === "year") {
      startDate = new Date(now.getFullYear(), 0, 1);
      endDate = new Date(now.getFullYear(), 11, 31);
    }

    tableRows.forEach(row => {
      const dateText = row.children[2].textContent.trim();
      const formType = row.children[1].textContent.toLowerCase();
      let showRow = true;

      // Parse date
      const rowDate = new Date(dateText);
      if (selectedDate !== "all" && startDate) {
        if (rowDate < startDate || rowDate > endDate) {
          showRow = false;
        }
      }

      // Form filter (recognize "Form1-01")
      if (selectedForm !== "all") {
        const formCode = formType.replace(/\s+/g, '').toLowerCase();
        if (!formCode.includes(selectedForm.toLowerCase())) {
          showRow = false;
        }
      }

      row.style.display = showRow ? "" : "none";
    });

    filterDropdown.style.display = "none"; // close after applying
  });

  // CLOSE FILTER DROPDOWN WHEN CLICKING OUTSIDE
  document.addEventListener("click", (e) => {
    if (!filterDropdown.contains(e.target) && !filterIcon.contains(e.target)) {
      filterDropdown.style.display = "none";
    }
  });

  // HIGHLIGHT ROW FROM DASHBOARD
  const highlighted = document.querySelector(".highlighted");
  if (highlighted) {
    highlighted.scrollIntoView({ behavior: "smooth", block: "center" });
  }

  // "SEE MORE" POPUP (placeholder)
  const seeMoreLinks = document.querySelectorAll(".see-more");
  seeMoreLinks.forEach(link => {
    link.addEventListener("click", function () {
      alert("More details coming soon...");
    });
  });

  // ✅ LOGOUT MODAL FUNCTIONALITY
  const logoutLink = document.querySelector(".bottom-links .menu-item");
  const modal = document.getElementById("logout-modal");
  const confirmBtn = document.getElementById("confirm-logout");
  const cancelBtn = document.getElementById("cancel-logout");
  const logoutForm = document.getElementById("logout-form");

  if (logoutLink) {
    logoutLink.addEventListener("click", (e) => {
      e.preventDefault();
      modal.style.display = "flex";
    });
  }

  confirmBtn?.addEventListener("click", (e) => {
    e.preventDefault();
    logoutForm.submit();
  });

  cancelBtn?.addEventListener("click", () => {
    modal.style.display = "none";
  });

});

document.addEventListener("DOMContentLoaded", function () {
  const highlighted = document.querySelector(".highlighted");

  if (highlighted) {
    highlighted.scrollIntoView({ behavior: "smooth", block: "center" });

    // Remove highlight when clicking anywhere
    document.addEventListener("click", (e) => {
      if (!highlighted.contains(e.target)) {
        highlighted.classList.remove("highlighted");
      }
    });
  }
});

