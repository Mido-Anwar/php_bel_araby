import Editor from '@toast-ui/editor';
import '@toast-ui/editor/dist/toastui-editor.css';

// استدعاء Prism والإضافة الخاصة بها
import Prism from 'prismjs';
import 'prismjs/themes/prism.css';
import codeSyntaxHighlight from '@toast-ui/editor-plugin-code-syntax-highlight';

document.addEventListener("DOMContentLoaded", function () {
    const el = document.getElementById("markdown-editor");
    if (!el) return;

    // استرجاع القيمة القديمة من الحقل المخفي لو وجدت (عند التعديل)
    const hiddenInput = document.querySelector('form input[type="hidden"][name="content"], form input[type="hidden"][name="description"]');
    const initialContent = hiddenInput ? hiddenInput.value : '';

    // إنشاء المحرر مع تفعيل إضافة تلوين الأكواد
    const editor = new Editor({
        el: el,
        height: '450px',
        initialEditType: 'markdown',
        previewStyle: 'tab',
        initialValue: initialContent,
        plugins: [[codeSyntaxHighlight, { highlighter: Prism }]],
        events: {
            load: function() {
                // ضبط اتجاه الكتابة ليصبح RTL افتراضياً
                const editorEl = document.querySelector('.toastui-editor-defaultUI');
                if (editorEl) {
                    editorEl.setAttribute('dir', 'rtl');
                }
            }
        }
    });

    // مزامنة محتوى المحرر مع الحقل المخفي عند إرسال النموذج (Submit)
    const form = el.closest('form');
    if (form && hiddenInput) {
        form.addEventListener('submit', function() {
            hiddenInput.value = editor.getMarkdown();
        });
    }
});
