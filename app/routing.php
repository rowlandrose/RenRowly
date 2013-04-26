<?

//// Routes HTTP Requests

class Routing
{
	function __construct($post)
	{
		//// Handle AJAX Requests first
		switch ($post['ajax']):

			// 'ip_to_lat_lng' is an example of an ajax request
			// Delete or alter as needed

			case 'example_ip_to_lat_lng':

				$latlng_model = new models\classes\Ip_to_latlng();
				$latlng_obj = new controllers\classes\Latlng($latlng_model);
				break;

			default:
				// If no ajax requests, do a full page load based on url
				$this->page_load();
				break;

		endswitch;
	}

	function page_load()
	{
		$path_components = $this->get_url_components();

		$view = $path_components[2];

		// If no path component is set at level 2, 'home' is set
		if(!$view) { $view = 'home'; }

		// Handle all normal page load requests
		switch ($view):

			// 'example' shows a case that would handle yoursite.com/example/search+terms/4
			// Delete or alter as needed

			case 'example_search':

				$terms = $path_components[3];
				$page = $path_components[4];
				$search_obj = new controllers\classes\Search($terms, $page);
				break;

			case 'home':
				$home_obj = new controllers\classes\Home();
				break;

			default:
				$error_obj = new controllers\classes\Error();
				break;

		endswitch;

	}

	// Get URL components into an array
	function get_url_components() 
	{
		$url = $_SERVER['PHP_SELF'];
		$path = parse_url($url, PHP_URL_PATH);

		// trim to prevent empty array elements
		return explode("/", trim($path, "/"));
	}
}

?>