<?

//// Error page controller

namespace controllers\classes;

require_once 'controller.php';

class Error extends Controller
{
	function __construct($data)
	{
		$this->load_view('error.php', $data);
	}

}

?>