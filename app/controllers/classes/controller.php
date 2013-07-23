<?

// Controller parent abstract class
// Handles loading of views / snippets

namespace controllers\classes;

abstract class Controller
{
	function load_view( $file_name, $data = null )
	{
		include REQUIRE_VERSION . '/views/pages/' . $file_name;
	}

	function load_snippet( $file_name, $data = null )
	{
		include REQUIRE_VERSION . '/views/snippets/' . $file_name;
	}

	function load_api( $file_name, $data = null )
	{
		include REQUIRE_VERSION . '/views/api/' . $file_name;
	}
}

?>