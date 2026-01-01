import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();


// Event delegation for section buttons
document.addEventListener("click", function (e) {
    // Check if the clicked element is a section button
    const btn = e.target.closest(".section-btn");
    if (!btn) return;
    // Toggle the visibility of the section body
    const targetId = btn.dataset.target;
    const body = document.getElementById(targetId);

    if (body) {
        body.classList.toggle("show");
    }
});
