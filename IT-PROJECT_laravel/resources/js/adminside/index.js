document.addEventListener("DOMContentLoaded", () => {
    console.log("Admin side loaded");
});

document.addEventListener("DOMContentLoaded", function () {
    const text = "Welcome!";
    const target = document.getElementById("welcome-text");
    let index = 0;

    function typeWriter() {
        if (index < text.length) {
            target.textContent += text.charAt(index);
            index++;
            setTimeout(typeWriter, 250);
        }
    }

    target.textContent = "";
    typeWriter();

    const form = document.querySelector(".form-container");
    setTimeout(() => {
        form.classList.add("show");
    }, 500);
});

document.addEventListener("DOMContentLoaded", () => {
    const passwordInput = document.getElementById("password");
    const toggleEye = document.getElementById("toggle-password");

    if (toggleEye && passwordInput) {
        // Show password while pressing
        toggleEye.addEventListener("mousedown", () => {
            passwordInput.type = "text";
        });

        // Hide password when releasing
        toggleEye.addEventListener("mouseup", () => {
            passwordInput.type = "password";
        });

        // Hide password if mouse leaves the icon while pressed
        toggleEye.addEventListener("mouseleave", () => {
            passwordInput.type = "password";
        });

        // Also works for mobile (touch events)
        toggleEye.addEventListener("touchstart", () => {
            passwordInput.type = "text";
        });

        toggleEye.addEventListener("touchend", () => {
            passwordInput.type = "password";
        });
    }
});

