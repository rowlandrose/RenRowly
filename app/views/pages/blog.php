<?

	$header['title'] = 'Sample Name of Blog;';
	$header['description'] = 'Blog of Sample Name. Musings and lessons learned on life.';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="blog">

<div id="container">

	<? require_once REQUIRE_VERSION . '/views/includes/html_header.php'; ?>

	<? require_once REQUIRE_VERSION . '/views/includes/top_nav.php'; ?>

	<div id="content">
		<? require REQUIRE_VERSION . '/views/includes/breadcrumb_trail.php'; ?>
		<h3><span>Blog.</span></h3>
		<p>Musings and lessons learned on life.</p>
		
		<?

		create_pagination($data['page'], BLOG_ENTRIES_PER_PAGE, $data['total'], LINK_RELATIVE_URL . 'blog'); 

		foreach($data['results'] as $key => $blog_post)
		{
			$link_url = LINK_RELATIVE_URL . 'blog/post/' . date('Y/n/j/', strtotime($blog_post['datetime'])) . $blog_post['title_url'];
			$comment_url = $link_url . '#disqus_thread';
			echo '<div class="post_title">';
				echo '<p>' . date('F jS Y. g:i a.', strtotime($blog_post['datetime'])) . ' - <a href="' . $comment_url . '"></a></p>';
				echo '<h4><a href="' . $link_url . '">' . $blog_post['title'] . '</a></h4>';
			echo '</div>';
			echo '<div class="post_text">' . token_truncate(strip_tags($blog_post['description']), BLOG_PREVIEW_CHAR_LIMIT) . '... <a href="' . $link_url . '">read more &raquo;</a></div>';
		}

		create_pagination($data['page'], BLOG_ENTRIES_PER_PAGE, $data['total'], LINK_RELATIVE_URL . 'blog'); 

		?>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/bottom_nav.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>