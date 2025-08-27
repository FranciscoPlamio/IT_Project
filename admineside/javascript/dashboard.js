document.addEventListener("DOMContentLoaded", () => {
  const scrollables = document.querySelectorAll(".notifications, .cert-log");

  scrollables.forEach(el => {
    el.style.overflowY = "scroll"; // force visible
    el.style.scrollbarGutter = "stable"; // keeps track space fixed

    const observer = new MutationObserver(() => {
      el.style.overflowY = "scroll"; // re-apply
    });

    observer.observe(el, { childList: true, subtree: true });
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