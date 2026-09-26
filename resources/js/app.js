import EasyMDE from "easymde";
import "easymde/dist/easymde.min.css";
window.EasyMDE = EasyMDE;
document.addEventListener("DOMContentLoaded", function () {
    const easymde = new EasyMDE({
        element: document.getElementById("markdown-editor"),
        spellChecker: false, // قفل المدقق الإنجليزي عشان ما يطلعش خطوط حمراء تحت العربي
        placeholder:
            "اكتب هنا باستخدام Markdown... (يدعم الـ RTL والكود البرمجي)",
        // تقدر تضيف أي إعدادات تانية هنا
    });
});
