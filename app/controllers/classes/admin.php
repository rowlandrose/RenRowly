<?

//// Admin page controller

namespace controllers\classes;

require_once 'controller.php';

class Admin extends Controller
{
	function show_admin()
	{
		$this->load_view('admin.php');
	}
}

?>