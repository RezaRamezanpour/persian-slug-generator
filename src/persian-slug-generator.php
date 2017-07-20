<?php

function get_slug($string, $rmShortWords = false, $separator = '-')
{

    $allowed = array(
        '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰',
        'آ', 'ا', 'ب', 'پ', 'ت', 'ث', 'ج', 'چ', 'ح', 'خ', 'د',
        'ذ', 'ر', 'ز', 'ژ', 'س', 'ش', 'ص', 'ض', 'ط', 'ظ',
        'ع', 'ق', 'ف', 'ق', 'ک', 'گ', 'ل', 'م', 'ن', 'و',
        'ه', 'ی', 'ئ',
        'a-z', '0-9',
    );
    $allowed = implode('', $allowed);

    $delimiters = array(' ', '|', '_', '(', ')', ',', '،');
    $delimiters = implode('', $delimiters);

    $words  = preg_split('/[' . $delimiters . ']/u', $string);

    $string = null;

    if ($rmShortWords) {
        foreach ($words as $k => $word) {
            if (mb_strlen($word) < 3) {
                unset($words[$k]);
            }
        }
    }

    foreach ($words as $word) {
        $word = strtolower($word);
        $word = mb_ereg_replace('([^' . $allowed . '])+', '', $word);
        if (mb_strlen($word) < 1) {
            continue;
        }
        $string .= $word .= $separator;
    }
    
    return trim($string, $separator);
}
