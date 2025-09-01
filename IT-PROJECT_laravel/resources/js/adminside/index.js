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
