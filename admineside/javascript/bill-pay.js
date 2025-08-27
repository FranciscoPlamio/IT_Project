document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (e) {
        let valid = true;
        const name = document.querySelector('input[name="name"]').value.trim();
        const email = document.querySelector('input[name="email"]').value.trim();
        const cardNumber = document.querySelector('input[name="cardNumber"]').value.trim();
        const expiry = document.querySelector('input[name="expiry"]').value.trim();
        const cvv = document.querySelector('input[name="cvv"]').value.trim();
        const amount = document.querySelector('input[name="amount"]').value.trim();

        if (name === "" || email === "" || cardNumber === "" || expiry === "" || cvv === "" || amount === "") {
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