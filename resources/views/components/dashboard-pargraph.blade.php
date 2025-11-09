@if ($text == null)
 {{ 'no content' }}
@else
 <p dir="{{ textDir($text) }}" class="dashboard-paragraph">
    {{ $text ?? 'no content entered' }}
</p>
@endif
