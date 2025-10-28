@if ($text == null)
 {{ 'no content' }}
@else
 <p dir="{{ textDir($text) }}"
   class="text-lg my-7 break-words leading-relaxed text-gray-700 dark:text-gray-300
          bg-gray-50 dark:bg-gray-800
          p-4 rounded-2xl shadow-sm
          border border-gray-200 dark:border-gray-700
          transition-all duration-300 hover:shadow-md">
    {{ $text ?? 'no content entered' }}
</p>
@endif
