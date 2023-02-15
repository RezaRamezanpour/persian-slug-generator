
/**
 * Generates URL Slug
 * @param  string  $string            the raw string to be converted
 * @param  boolean $ignoreShortWords  if true, words shorter than 2 char
 *                                     length will be removed from the slug
 * @param  string  $separator         separator char
 * @return string                     the generated slug
 */
function generateSlug($string, $ignoreShortWords = false, $separator = '-')
{
    $allowed = implode('',[
        '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰',
        'آ', 'ا', 'ب', 'پ', 'ت', 'ث', 'ج', 'چ', 'ح', 'خ', 'د',
        'ذ', 'ر', 'ز', 'ژ', 'س', 'ش', 'ص', 'ض', 'ط', 'ظ',
        'ع', 'ق', 'ف', 'ق', 'ک', 'گ', 'ل', 'م', 'ن', 'و',
        'ه', 'ی', 'ئ',
        'a-z', '0-9',
	]);
    $delimiters = implode('',[' ', '|', '_', '(', ')', ',', '،']);
    $words  = preg_split('/[' . $delimiters . ']/u', $string);
    $string = null;
    if ($ignoreShortWords) {
        foreach ($words as $k => $word) {
            if (mb_strlen($word) < 3) unset($words[$k]);
        }
    }

    foreach ($words as $word) {
        $word = strtolower($word);
        $word = mb_ereg_replace('([^' . $allowed . '])+', '', $word);
        if (mb_strlen($word) < 1)  continue;
        $string .= $word .= $separator;
    }
    
    return trim($string, $separator);
}
