import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('focusin', (e) => {
  if (e.target && e.target.id === 'deleteBtn') {
    alert("Are you sure you want to delete this user?");
  }
});


document.addEventListener('DOMContentLoaded', () => {

    // Accordion toggle
    document.querySelectorAll('[data-accordion]').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.accordion;
            document.getElementById(id).classList.toggle('show');
        });
    });

    // Show content
    document.querySelectorAll('[data-content]').forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();

            document.querySelectorAll('.content-block')
                .forEach(el => el.classList.remove('active'));

            const id = link.dataset.content;
            document.getElementById(id).classList.add('active');

            window.scrollTo(0, 0);
        });
    });

});
