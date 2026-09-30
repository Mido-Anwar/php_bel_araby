@props(['disabled' => false])

<input
    @disabled($disabled)
    x-data="{
        dir: 'ltr',
        updateDir(el) {
            const val = el.value || '';
            const isArabic = /[\u0600-\u06FF]/.test(val);
            this.dir = isArabic ? 'rtl' : 'ltr';
        }
    }"
    x-init="updateDir($el)"
    @input="updateDir($el)"
    x-bind:dir="dir"
    {{ $attributes->merge([
        'class' => 'border-gray-300 dark:border-gray-700 dark:bg-white dark:text-gray-800 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
    ]) }}
>
