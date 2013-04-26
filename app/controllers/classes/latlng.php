<?

//// IP to Lat Lng snippet controller
// Example of a simple controller that loads the 'data' snippet with data from a model

namespace controllers\classes;

require_once 'controller.php';

class Latlng extends Controller
{
	function __construct($model)
	{
		$this->load_snippet('data.php', $model->data());
	}

}

?>