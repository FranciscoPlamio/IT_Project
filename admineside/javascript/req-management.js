// Handle Upload button click
function handleUpload() {
  // This will open the file picker for actual upload
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