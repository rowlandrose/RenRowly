<?

// Model parent abstract class
// Handles shared functions

namespace models\classes;

abstract class Model
{
	function title_to_url($str)
	{
		return urlencode(str_replace( array( '\'', '"', ',' , ';', '<', '>', ']', '[', '(', ')', '{', '}', '?', '=', '&' ), '', preg_replace('/\\s+/', '_', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $str)))));
	}
}

?>