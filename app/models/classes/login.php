<?

// Login model

namespace models\classes;

class Login 
{
	function check_session()
	{
		global $con;

		$username = $_SESSION['signed_in_user'];

		if(!$username) { return false; }

		// Eventually lookup users in database and see if there is a match.
		// For now just compare to value entered here.
		if($username == ADMIN_USERNAME) {
			return true;
		} else {
			return false;
		}
	}

	function check_login($user, $pass)
	{
		global $con;

		// Eventually lookup users in a database and see if the username / hashed password matches.
		// For now just compare to value entered here.
		if($user == ADMIN_USERNAME && $pass == ADMIN_PASSWORD) {
			return true;
		} else {
			return false;
		}
	}
}

?>