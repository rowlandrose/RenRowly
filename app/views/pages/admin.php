<?

	$header['title'] = 'Sample name of Admin page.';
	$header['description'] = 'Admin page.';
	$header['js'] = array();
	$header['js'][] = APP_RELATIVE_URL . 'views/js/logout.js';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="admin">

<div id="container">

	<div id="content">
		
		<? require_once REQUIRE_VERSION . '/views/includes/admin_header.php'; ?>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/admin_footer.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>