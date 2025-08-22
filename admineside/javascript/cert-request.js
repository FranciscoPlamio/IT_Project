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
