/**
 * Generates URL Slug
 * @param  string  $string          the raw string to be converted
 * @param  boolean $rm_short_words  if true, words shorter than 2 char -
 *                                  length will be removed from the slug
 * @param  string  $separator       separator chars
 * @return string                   the slug
 */
function get_slug($string, $rm_short_words = false, $separator = '-')
{

    // Set internal character encoding to utf8
    mb_internal_encoding('utf8');
    mb_regex_encoding("UTF-8");

    // define our delimiters to split slug words
    $word_delimiters = array(' ', '|', '_', '(', ')', ',', '،');

    // join delimiters to use in preg_split!
    $word_delimiters = implode('', $word_delimiters);

    // split words using delimiters
    $words = preg_split('/[' . $word_delimiters . ']/u', $string);

    $string = null;

    // is $rm_short_words enabled? 
    // remove that short words from my slug!
    if ($rm_short_words) {
        foreach ($words as $k => $word) {
            if (mb_strlen($word) < 2) {
                unset($words[$k]);
            }
        }
    }

    // join splitted word with defined seperator
    foreach ($words as $word) {
        $word = mb_strtolower($word);
        $word = mb_ereg_replace('[^\p{L}\p{Nd}]', '', $word);
        if (mb_strlen($word) < 1) {
            continue;
        }
        $string .= $word .= $separator;
    }

    // all done. return the clean slug
    return trim($string, $separator);
}
