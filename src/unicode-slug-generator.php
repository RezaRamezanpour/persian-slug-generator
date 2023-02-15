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
	mb_internal_encoding('utf8');
	mb_regex_encoding("UTF-8");

	$wordDelimiters = array(' ', '|', '_', '(', ')', ',', '،');
	$wordDelimiters = implode('', $wordDelimiters);
	$words = preg_split('/[' . $wordDelimiters . ']/u', $string);

	$string = null;

	if ($ignoreShortWords) {
		foreach ($words as $k => $word) {
			if (mb_strlen($word) < 2) unset($words[$k]);
		}
	}

	foreach ($words as $word) {
		$word = mb_strtolower($word);
		$word = mb_ereg_replace('[^\p{L}\p{Nd}]', '', $word);
		if (mb_strlen($word) < 1) continue;
		$string .= $word .= $separator;
	}

	return trim($string, $separator);
}
