<?

	$header['title'] = 'Sample Blog Title';
	$header['description'] = 'Sample description of blog. Example: I\'m good at Flash, PHP, MySQL. Hire me!';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

	$link_url_blog = LINK_RELATIVE_URL . 'blog/post/' . date('Y/n/j/', strtotime($data[0][0]['datetime'])) . $data[0][0]['title_url'];
	$link_url_portfolio = LINK_RELATIVE_URL . 'portfolio/piece/' . $data[1][0]['portfolio_url'];
	$comment_url = $link_url_blog . '#disqus_thread';

?>

<body class="home">

<div id="container">

	<? require_once REQUIRE_VERSION . '/views/includes/html_header.php'; ?>

	<? require_once REQUIRE_VERSION . '/views/includes/top_nav.php'; ?>

	<div id="content">
		<h3><span>Latest blog post.</span></h3>
		<div class="post_title">
			<p><?php echo date('F jS Y. g:i a.', strtotime($data[0][0]['datetime'])); ?> - <a href="<? echo $comment_url; ?>"></a></p>
			<h4><?php echo '<a href="' . $link_url_blog . '">' . $data[0][0]['title'] . '</a>'; ?></h4>
		</div>
		<div><?php echo $data[0][0]['description']; ?></div>
		<a class="archive_link" href="<?php echo LINK_RELATIVE_URL . 'blog'; ?>">Blog Archive.</a>

		<h3><span>Featured portfolio piece.</span></h3>
		<div class="post_title">
			<p><?php echo date('F jS Y.', strtotime($data[1][0]['datetime'])); ?></p>
			<h4><?php echo '<a href="' . $link_url_portfolio . '">' . $data[1][0]['title'] . '</a>'; ?></h4>
		</div>
		<div><?php echo $data[1][0]['description']; ?></div>
		<a class="archive_link" href="<?php echo LINK_RELATIVE_URL . 'portfolio'; ?>">Portfolio Archive.</a>
	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/bottom_nav.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>