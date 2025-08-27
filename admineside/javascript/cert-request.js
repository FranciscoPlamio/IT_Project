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
    console.log("JS Loaded"); // Check if script runs
  
    const logoutLink = document.querySelector(".bottom-links .menu-item");
    const modal = document.getElementById("logout-modal");
    const confirmBtn = document.getElementById("confirm-logout");
    const cancelBtn = document.getElementById("cancel-logout");
  
    console.log("Logout link:", logoutLink); // Check if found
  
    // Show modal when logout is clicked
    logoutLink.addEventListener("click", (e) => {
      e.preventDefault();
      console.log("Logout clicked"); //Check if event fires
      modal.style.display = "flex";
    });
  
    confirmBtn.addEventListener("click", () => {
      console.log("Confirmed"); // Check if button works
      window.location.href = "index.html";
    });
  
    cancelBtn.addEventListener("click", () => {
      console.log("Cancelled"); // Check if cancel works
      modal.style.display = "none";
    });
  
    modal.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.style.display = "none";
      }
    });
  });