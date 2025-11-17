import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('focusin', (e) => {
  if (e.target && e.target.id === 'deleteBtn') {
    alert("Are you sure you want to delete this user?");
  }
});
