import Editor from '@toast-ui/editor';
import '@toast-ui/editor/dist/toastui-editor.css';

document.addEventListener("DOMContentLoaded", function () {
    const el = document.getElementById("markdown-editor");
    if (!el) return;

    // البحث عن أي حقل مخفي داخل الفورم (سواء كان content أو description)
    const hiddenInput = document.querySelector('form input[type="hidden"][name="content"], form input[type="hidden"][name="description"]');
    const initialContent = hiddenInput ? hiddenInput.value : '';

    const editor = new Editor({
        el: el,
        height: '450px',
        initialEditType: 'markdown',
        previewStyle: 'tab',
        initialValue: initialContent,
        placeholder: 'اكتب التفاصيل هنا...',
        events: {
            load: function() {
                const editorEl = document.querySelector('.toastui-editor-defaultUI');
                if (editorEl) {
                    editorEl.setAttribute('dir', 'rtl');
                }
            }
        }
    });

    // تحديث الحقل المخفي فور ضغط زر الإرسال أياً كان اسمه
    const form = el.closest('form');
    if (form && hiddenInput) {
        form.addEventListener('submit', function() {
            hiddenInput.value = editor.getMarkdown();
        });
    }
});
