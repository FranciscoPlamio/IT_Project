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