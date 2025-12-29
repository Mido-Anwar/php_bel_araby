import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('focusin', (e) => {
  if (e.target && e.target.id === 'deleteBtn') {
    alert("Are you sure you want to delete this user?");
  }
});

document.addEventListener('DOMContentLoaded', function () {

    // 1. امسك كل أزرار الأقسام
    const buttons = document.querySelectorAll('.section-btn');

    // 2. لف عليهم واحد واحد
    buttons.forEach(function (btn) {

        btn.addEventListener('click', function () {

            // 3. اقرأ target من data-target
            const targetId = btn.getAttribute('data-target');

            // 4. هات الـ div اللي هنفتحها
            const body = document.getElementById(targetId);

            // 5. افتح / اقفل
            body.classList.toggle('show');
        });

    });

});
