<?

	$header['title'] = 'Sample name of Blog';
	$header['description'] = 'Login page.';
	$header['js'] = array();
	$header['js'][] = APP_RELATIVE_URL . 'views/js/login.js';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="admin">

<div id="container">

	<div id="content">
		<h3><span>Admin panel.</span></h3>
		<form id="login_form">
			<input name="username" placeholder="Enter username." maxlength="30" />
			<input name="password" placeholder="Enter password." maxlength="30" type="password" />
			<input type="submit" value="Login" />
		</form>
		<div id="results"></div>
	</div>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>