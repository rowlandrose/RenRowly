<?

//// Playground controller

namespace controllers\classes;

require_once 'controller.php';

class Playground extends Controller
{
	function all($data)
	{
		$this->load_view('playground.php', $data);
	}

	function admin_page($data)
	{
		$this->load_view('admin_playground.php', $data);
	}

	function admin_new()
	{
		$this->load_view('admin_playground_new.php');
	}

	function edit_link($data)
	{
		$this->load_view('admin_playground_edit.php', $data);
	}

}

?>