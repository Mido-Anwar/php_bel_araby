<?php

if (!function_exists('detectLanguage')) {
    function detectLanguage($text)
    {
        $arabicCount = preg_match_all('/[\p{Arabic}]/u', $text);
        $englishCount = preg_match_all('/[A-Za-z]/', $text);

        if ($arabicCount > $englishCount) return 'ar';
        if ($englishCount > $arabicCount) return 'en';
        return 'unknown';
    }
}
