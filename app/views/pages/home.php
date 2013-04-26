<?php

	$header['title'] = 'Example Title';
	$header['description'] = 'Example Description. Should be a short summary of the page.';
	$header['js'] = APP_RELATIVE_URL . 'views/pages/home.js';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<div>Sample Home Page Content.</div>

<?php require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>