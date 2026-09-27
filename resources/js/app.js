import EasyMDE from "easymde";
import "easymde/dist/easymde.min.css";

window.EasyMDE = EasyMDE;

document.addEventListener("DOMContentLoaded", function () {
    const el = document.getElementById("markdown-editor");
    if (!el) return;

    const editor = new EasyMDE({
        element: el,
        spellChecker: false,
        placeholder: "اكتب هنا باستخدام Markdown...",
        status: false,
        autoDownloadFontAwesome: true,
        toolbar: [
            "bold",
            "italic",
            "heading",
            "|",
            "quote",
            "code",
            "unordered-list",
            "ordered-list",
            "|",
            "link",
            "image",
            "table",
            "|",
            "preview",
            "side-by-side",
            "fullscreen",
            "|",
            "guide",
        ],
    });

    // ✅ Auto Direction
    const cm = editor.codemirror;

    function updateDirection() {
        const line = cm.getLine(cm.getCursor().line) || "";
        const isArabic = /[\u0600-\u06FF]/.test(line);

        const wrapper = cm.getWrapperElement();
        wrapper.setAttribute("dir", isArabic ? "rtl" : "ltr");

        const preview = document.querySelector(".editor-preview");
        if (preview) preview.setAttribute("dir", isArabic ? "rtl" : "ltr");
    }

    cm.on("cursorActivity", updateDirection);
    cm.on("change", updateDirection);
    updateDirection();
});
