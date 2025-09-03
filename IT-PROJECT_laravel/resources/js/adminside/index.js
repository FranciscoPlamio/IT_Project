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
// document.addEventListener('DOMContentLoaded', function () {
//     const form = document.querySelector('form');
    
//     if (form) {
//         form.addEventListener('submit', function (e) {
//             e.preventDefault(); // Prevent form from submitting immediately

//             const employeeId = document.getElementById('employee-id').value.trim();
//             const password = document.getElementById('password').value.trim();

//             if (employeeId === '' || password === '') {
//                 alert('Please fill in all fields.');
//                 return;
//             }

//             if (password.length < 6) {
//                 alert('Password must be at least 6 characters.');
//                 return;
//             }

//             // If validation passes, submit the form
//             form.submit();
//         });
//     }
// });
