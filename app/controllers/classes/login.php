<?

//// Login page controller

namespace controllers\classes;

require_once 'controller.php';

class Login extends Controller
{
	function show_login()
	{
		$this->load_view('login.php');
	}

	function set_session($user)
	{
		$_SESSION['signed_in_user'] = $user;
	}

	function show_error($user, $pass)
	{
		echo '<div id="error">';
			echo 'Error. The username and/or password you entered is incorrect. Please try again.';
		echo '</div>';
	}
}

?>