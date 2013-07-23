<?

	$header['title'] = 'Sample Blog Title';
	$header['description'] = 'Sample description of blog. Example: I\'m good at Flash, PHP, MySQL. Hire me!';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="contact">

<div id="container">

	<? require_once REQUIRE_VERSION . '/views/includes/html_header.php'; ?>

	<? require_once REQUIRE_VERSION . '/views/includes/top_nav.php'; ?>

	<div id="content">
		<? require REQUIRE_VERSION . '/views/includes/breadcrumb_trail.php'; ?>
		<h3><span>Contact.</span></h3>
		<p>I always check my email: sampleemail a t notarealaddress d o t com.</p>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/bottom_nav.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>