import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const accordion = document.getElementById("accordion");
accordion.querySelectorAll("details").forEach((el) => {
    el.addEventListener("toggle", () => {
        if (el.open) {
            accordion.querySelectorAll("details").forEach((other) => {
                if (other !== el) other.open = false;
            });
        }
    });
});
