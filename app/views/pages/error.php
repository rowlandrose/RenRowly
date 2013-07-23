<?

	$header['title'] = 'Sample Blog Title';
	$header['description'] = 'Sample description of blog. Example: I\'m good at Flash, PHP, MySQL. Hire me!';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="home">

<div id="container">

	<? require_once REQUIRE_VERSION . '/views/includes/html_header.php'; ?>

	<? require_once REQUIRE_VERSION . '/views/includes/top_nav.php'; ?>

	<div id="content">
		<h3><span>Error.</span></h3>
		<div class="post_title">
			<p><?php echo $data; ?></p>
		</div>
	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/bottom_nav.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>