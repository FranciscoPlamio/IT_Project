document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector("#searchInput");
    const tableRows = document.querySelectorAll(".table-container table tbody tr");

    // ✅ Search filter
    if (searchInput) {
        searchInput.addEventListener("keyup", function () {
            const filter = searchInput.value.toLowerCase();
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    }

    // ✅ Add click event to "See more"
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
  const searchInput = document.getElementById("searchInput");
  const tableRows = document.querySelectorAll("#requestsTable tbody tr");
  const filterIcon = document.querySelector(".filter-bar img");
  const filterDropdown = document.getElementById("filterDropdown");
  const dateFilter = document.getElementById("dateFilter");
  const formFilter = document.getElementById("formFilter");
  const applyBtn = document.getElementById("applyFilter");

  // 🔍 Search Functionality
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

  // ⚙️ Toggle Filter Dropdown
  filterIcon.addEventListener("click", () => {
    filterDropdown.style.display =
      filterDropdown.style.display === "block" ? "none" : "block";
  });

  // 🗓️ Apply Filter
  applyBtn.addEventListener("click", () => {
    const selectedDate = dateFilter.value;
    const selectedForm = formFilter.value.toLowerCase();
    const now = new Date();

    tableRows.forEach(row => {
      const dateText = row.children[2].textContent.trim();
      const formType = row.children[1].textContent.toLowerCase();

      let showRow = true;

      // --- Date filtering ---
      if (selectedDate !== "all") {
        const rowDate = new Date(dateText);
        const diffDays = (now - rowDate) / (1000 * 60 * 60 * 24);

        if (
          (selectedDate === "week" && diffDays > 7) ||
          (selectedDate === "month" && diffDays > 30) ||
          (selectedDate === "3months" && diffDays > 90) ||
          (selectedDate === "6months" && diffDays > 180) ||
          (selectedDate === "year" && diffDays > 365)
        ) {
          showRow = false;
        }
      }

      // --- Form filtering ---
      if (selectedForm !== "all") {
        // normalize both sides for consistent matching
        const formCode = formType.replace(/\s+/g, '').toLowerCase(); // e.g. "form1-01"
        if (!formCode.includes(selectedForm.toLowerCase())) {
          showRow = false;
        }
      }


      // Apply visibility
      row.style.display = showRow ? "" : "none";
    });

    filterDropdown.style.display = "none"; // close after apply
  });

  // ✅ Click outside dropdown closes it
  document.addEventListener("click", (e) => {
    if (!filterDropdown.contains(e.target) && !filterIcon.contains(e.target)) {
      filterDropdown.style.display = "none";
    }
  });
});
