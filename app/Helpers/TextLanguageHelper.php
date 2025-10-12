<?php

if (!function_exists('detectLanguage')) {
    function textDir($text)
    {
        $arabicCount = preg_match_all('/[\p{Arabic}]/u', $text);
        $englishCount = preg_match_all('/[A-Za-z]/', $text);

        if ($arabicCount > $englishCount) return 'rtl';
        if ($englishCount > $arabicCount) return 'ltr';
        return 'unknown';
    }
}
