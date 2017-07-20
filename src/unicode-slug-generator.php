<?php
function get_slug($string, $rmShortWords = false, $separator = '-')
{

    $word_delimiters = array(' ', '|', '(', ')',',','،');
    $word_delimiters = implode('', $word_delimiters);

    $words  = preg_split('/[' . $word_delimiters . ']/u', $string);

    $string = null;

    if ($rmShortWords) {
        foreach ($words as $k => $word) {
            if (mb_strlen($word) < 3) {
                unset($words[$k]);
            }
        }
    }

    foreach ($words as $word) {
        $word = mb_strtolower($word);
        $word = mb_ereg_replace('[^\p{L}\p{Nd}]', '', $word);
        if (mb_strlen($word) < 1) {
            continue;
        }
        $string .= $word .= $separator;
    }
    return trim($string, $separator);
}
