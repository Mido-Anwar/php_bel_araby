import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('focusin', (e) => {
  if (e.target && e.target.id === 'deleteBtn') {
    alert("Are you sure you want to delete this user?");
  }
});

document.addEventListener('click', function (e) {
    const btn = e.target.closest('.section-btn');
    if (!btn) return;

    const targetId = btn.dataset.target;
    const body = document.getElementById(targetId);

    if (body) {
        body.classList.toggle('show');
    }
});
