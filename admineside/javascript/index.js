document.addEventListener("DOMContentLoaded", function () {
    const text = "Welcome!";
    const target = document.getElementById("welcome-text");
    let index = 0;

    function typeWriter() {
        if (index < text.length) {
            target.textContent += text.charAt(index);
            index++;
            setTimeout(typeWriter, 250); // typing speed
        }
    }

    // Run the effect only once per page load
    target.textContent = ""; // start blank
    typeWriter();

    // Slide-in effect for form
        const form = document.querySelector(".form-container");
        setTimeout(() => {
            form.classList.add("show"); // triggers CSS transition
        }, 500); // delay to coordinate with typewriter
});


