<?

//// Routes HTTP Requests

class Routing
{
	function __construct($post)
	{
		//// Handle AJAX Requests first
		switch ($post['ajax']):

			case 'login_check':

				$login_model = new models\classes\Login();

				$user = $post['user'];
				$pass = $post['pass'];

				$success = $login_model->check_login($user, $pass);
				
				$login_obj = new controllers\classes\Login();

				if($success)
				{
					// set session variable and tell ajax callback to reload page
					$login_obj->set_session($user);
					echo 'reload';
				}
				else
				{
					// return error message
					$login_obj->show_error($user, $pass);
				}

				break;

			case 'logout':

				unset($_SESSION['signed_in_user']);

				echo 'reload';

				break;

			case 'delete_blog':

				$blog_model = new models\classes\Blog();

				$id = $post['id'];

				$success = $blog_model->delete_blog($id);

				if($success) {
					echo 'success';
				}

				break;

			case 'delete_portfolio':

				$portfolio_model = new models\classes\Portfolio();

				$id = $post['id'];

				$success = $portfolio_model->delete_portfolio($id);

				if($success) {
					echo 'success';
				}

				break;

			case 'delete_playground':

				$playground_model = new models\classes\Playground();

				$id = $post['id'];

				$success = $playground_model->delete_playground($id);

				if($success) {
					echo 'success';
				}

				break;

			case 'create_blog_post':

				$blog_model = new models\classes\Blog();

				$title = $post['title'];
				$body = $post['body'];

				if($title && $body)
				{
					$success = $blog_model->create_blog_post($title, $body);

					if($success) {
						echo 'success';
					} else {
						echo '<div id="error">';
							echo 'Error. Your post could not be saved.';
						echo '</div>';
					}
				}
				else
				{
					echo '<div id="error">';
						echo 'Error. Either your title or your body was left empty. Please try again.';
					echo '</div>';
				}

				break;

			case 'create_portfolio_piece':

				$portfolio_model = new models\classes\Portfolio();

				$title = $post['title'];
				$date = $post['date'];
				$preview_image = $post['preview_image'];
				$body = $post['body'];

				if( $title && $body && validate('date', $date) )
				{
					$success = $portfolio_model->create_portfolio_piece($title, $date, $preview_image, $body);

					if($success) {
						echo 'success';
					} else {
						echo '<div id="error">';
							echo 'Error. Your post could not be saved.';
						echo '</div>';
					}
				}
				else
				{
					echo '<div id="error">';
						echo 'Error. Your title, date, and/or body was left empty. Please try again.';
					echo '</div>';
				}

				break;

			case 'create_playground_link':

				$playground_model = new models\classes\Playground();

				$title = $post['title'];
				$url = $post['url'];
				$image = $post['image'];

				if($title && $url && $image)
				{
					$success = $playground_model->create_playground_link($title, $url, $image);

					if($success) {
						echo 'success';
					} else {
						echo '<div id="error">';
							echo 'Error. Your link could not be saved.';
						echo '</div>';
					}
				}
				else
				{
					echo '<div id="error">';
						echo 'Error. Either your title or your image url was left empty. Please try again.';
					echo '</div>';
				}

				break;

			case 'edit_blog_post':

				$blog_model = new models\classes\Blog();

				$title = $post['title'];
				$body = $post['body'];
				$id = $post['id'];

				if($title && $body)
				{
					$success = $blog_model->edit_blog_post($title, $body, $id);

					if($success) {
						echo 'success';
					} else {
						echo '<div id="error">';
							echo 'Error. Your changes could not be saved.';
						echo '</div>';
					}
				}
				else
				{
					echo '<div id="error">';
						echo 'Error. Either your title or your body was left empty. Please try again.';
					echo '</div>';
				}

				break;

			case 'edit_portfolio_piece':

				$portfolio_model = new models\classes\Portfolio();

				$title = $post['title'];
				$date = $post['date'];
				$preview_image = $post['preview_image'];
				$body = $post['body'];
				$id = $post['id'];

				if( $title && $body && validate('date', $date) )
				{
					$success = $portfolio_model->edit_portfolio_piece($title, $date, $preview_image, $body, $id);

					if($success) {
						echo 'success';
					} else {
						echo '<div id="error">';
							echo 'Error. Your changes could not be saved.';
						echo '</div>';
					}
				}
				else
				{
					echo '<div id="error">';
						echo 'Error. Your title, date, and/or body was left empty. Please try again.';
					echo '</div>';
				}

				break;

			case 'edit_playground_link':

				$playground_model = new models\classes\Playground();

				$id = $post['id'];
				$title = $post['title'];
				$url = $post['url'];
				$image = $post['image'];

				if($id && $title && $url && $image)
				{
					$success = $playground_model->edit_playground_link($id, $title, $url, $image);

					if($success) {
						echo 'success';
					} else {
						echo '<div id="error">';
							echo 'Error. Your changes could not be saved.';
						echo '</div>';
					}
				}
				else
				{
					echo '<div id="error">';
						echo 'Error. Either your title, url or image url was left empty. Please try again.';
					echo '</div>';
				}

				break;

			case 'playground_move_up':

				$playground_model = new models\classes\Playground();

				$id = $post['id'];
				$current_order = $post['current_order'];

				if($id && $current_order)
				{
					$success = $playground_model->move_up($id, $current_order);

					if($success) {
						echo 'success';
					}
				}

				break;

			case 'playground_move_down':

				$playground_model = new models\classes\Playground();

				$id = $post['id'];
				$current_order = $post['current_order'];

				if($id && $current_order)
				{
					$success = $playground_model->move_down($id, $current_order);

					if($success) {
						echo 'success';
					}
				}

				break;

			default:
				// If no ajax requests, do a full page load based on url
				$this->page_load();
				break;

		endswitch;
	}

	function page_load()
	{
		$path_components = get_url_components();

		$view = $path_components[0];

		// If no path component is set at level 2, 'home' is set
		if(!$view) { $view = 'home'; }

		// Handle all normal page load requests
		switch ($view):

			// 'example' shows a case that would handle yoursite.com/example/search+terms/4
			// Delete or alter as needed

			case 'example_search':

				$terms = $path_components[1];
				$page = $path_components[2];
				$search_obj = new controllers\classes\Search($terms, $page);
				break;

			case 'home':
			
				$blog_model = new models\classes\Blog();
				$portfolio_model = new models\classes\Portfolio();

				$data = array(
					$blog_model->latest(),
					$portfolio_model->id(6)
				);

				$home_obj = new controllers\classes\Home($data);

				break;

			case 'blog':

				$next = $path_components[1];

				if($next == 'post')
				{
					$year = $path_components[2];
					$month = $path_components[3];
					$day = $path_components[4];
					$title = $path_components[5];

					$blog_model = new models\classes\Blog();

					$data = $blog_model->blog_post($year, $month, $day, $title);

					$blog_post_obj = new controllers\classes\Blog();

					$blog_post_obj->post($data);
				}
				else
				{
					$blog_model = new models\classes\Blog();
					
					$page = $next;

					// If no page is set in the url, set it to 1
					if(!$page) { $page = 1; }

					$data = $blog_model->blog_page($page);

					$data['page'] = $page;

					$blog_obj = new controllers\classes\Blog();

					$blog_obj->page($data);

				}

				break;

			case 'portfolio':

				$next = $path_components[1];

				if($next == 'piece')
				{
					$title = $path_components[2];

					$portfolio_model = new models\classes\Portfolio();

					$data = $portfolio_model->portfolio_piece($title);

					$portfolio_piece_obj = new controllers\classes\Portfolio();

					$portfolio_piece_obj->piece($data);
				}
				else
				{
					$portfolio_model = new models\classes\Portfolio();
					
					$page = $next;

					// If no page is set in the url, set it to 1
					if(!$page) { $page = 1; }

					$data = $portfolio_model->portfolio_page($page);

					$data['page'] = $page;

					$portfolio_obj = new controllers\classes\Portfolio();

					$portfolio_obj->page($data);

				}

				break;

			case 'playground':

				$playground_model = new models\classes\Playground();

				$data = $playground_model->playground_all();

				$playground_obj = new controllers\classes\Playground();

				$playground_obj->all($data);

				break;

			case 'contact':

				$contact_obj = new controllers\classes\Contact();

				$contact_obj->page($data);

				break;

			case 'admin':

				$login_model = new models\classes\Login();

				$success = $login_model->check_session();

				if($success)
				{
					$next = $path_components[1];
					$page = $path_components[2];

					if($next == 'blog')
					{
						if($page == 'new')
						{
							$blog_obj = new controllers\classes\Blog();

							$blog_obj->admin_new();
						}
						else if($page == 'edit')
						{
							$year = $path_components[3];
							$month = $path_components[4];
							$day = $path_components[5];
							$title = $path_components[6];

							$blog_model = new models\classes\Blog();

							$data = $blog_model->blog_post($year, $month, $day, $title);

							$blog_post_obj = new controllers\classes\Blog();

							$blog_post_obj->edit_post($data);
						}
						else
						{
							$blog_model = new models\classes\Blog();

							// If no page is set in the url, set it to 1
							if(!$page) { $page = 1; }

							$data = $blog_model->blog_page($page);

							$data['page'] = $page;

							$blog_obj = new controllers\classes\Blog();

							$blog_obj->admin_page($data);
						}
					}
					else if($next == 'portfolio')
					{
						if($page == 'new')
						{
							$portfolio_obj = new controllers\classes\Portfolio();

							$portfolio_obj->admin_new();
						}
						else if($page == 'edit')
						{
							$title = $path_components[3];

							$portfolio_model = new models\classes\Portfolio();

							$data = $portfolio_model->portfolio_piece($title);

							$portfolio_piece_obj = new controllers\classes\Portfolio();

							$portfolio_piece_obj->edit_piece($data);
						}
						else
						{
							$portfolio_model = new models\classes\Portfolio();

							// If no page is set in the url, set it to 1
							if(!$page) { $page = 1; }

							$data = $portfolio_model->portfolio_page($page);

							$data['page'] = $page;

							$portfolio_obj = new controllers\classes\Portfolio();

							$portfolio_obj->admin_page($data);
						}
					}
					else if($next == 'playground')
					{
						if($page == 'new')
						{
							$playground_obj = new controllers\classes\Playground();

							$playground_obj->admin_new();
						}
						else if($page == 'edit')
						{
							$id = $path_components[3];

							$playground_model = new models\classes\Playground();

							$data = $playground_model->playground_link($id);

							$playground_piece_obj = new controllers\classes\Playground();

							$playground_piece_obj->edit_link($data);
						}
						else
						{
							$playground_model = new models\classes\Playground();

							// If no page is set in the url, set it to 1
							if(!$page) { $page = 1; }

							$data = $playground_model->playground_page($page);

							$data['page'] = $page;

							$playground_obj = new controllers\classes\Playground();

							$playground_obj->admin_page($data);
						}
					}
					else
					{
						$admin_obj = new controllers\classes\Admin();
						$admin_obj->show_admin();
					}
				}
				else
				{
					$login_obj = new controllers\classes\Login();
					$login_obj->show_login();
				}

				break;

			default:

				$error_obj = new controllers\classes\Error('Could not find page. The entered URL does not correspond to any existing page on the site.');
				break;

		endswitch;

	}
}

?>