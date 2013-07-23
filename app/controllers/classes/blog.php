<?

//// Blog page controller

namespace controllers\classes;

require_once 'controller.php';

class Blog extends Controller
{
	function page($data)
	{
		$this->load_view('blog.php', $data);
	}

	function post($data)
	{
		$this->load_view('post.php', $data);
	}

	function edit_post($data)
	{
		$this->load_view('admin_blog_edit.php', $data);
	}

	function admin_page($data)
	{
		$this->load_view('admin_blog.php', $data);
	}

	function admin_new()
	{
		$this->load_view('admin_blog_new.php');
	}

}

?>