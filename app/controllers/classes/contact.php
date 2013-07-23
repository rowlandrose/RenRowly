<?

//// Contact controller

namespace controllers\classes;

require_once 'controller.php';

class Contact extends Controller
{
	function page($data)
	{
		$this->load_view('contact.php', $data);
	}

}

?>