<?

//// Portfolio page / piece controller

namespace controllers\classes;

require_once 'controller.php';

class Portfolio extends Controller
{
	function page($data)
	{
		$this->load_view('portfolio.php', $data);
	}

	function piece($data)
	{
		$this->load_view('piece.php', $data);
	}

	function edit_piece($data)
	{
		$this->load_view('admin_portfolio_edit.php', $data);
	}

	function admin_page($data)
	{
		$this->load_view('admin_portfolio.php', $data);
	}

	function admin_new()
	{
		$this->load_view('admin_portfolio_new.php');
	}
}

?>