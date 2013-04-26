<?

//// Home page controller

namespace controllers\classes;

require_once 'controller.php';

class Home extends Controller
{
	function __construct()
	{
		$this->load_view('home.php', null);
	}

}

?>