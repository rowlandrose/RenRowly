<?

	$header['title'] = 'Portfolio of Sample Name;';
	$header['description'] = 'Portfolio of Sample Name. Examples of professional work.';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="blog">

<div id="container">

	<? require_once REQUIRE_VERSION . '/views/includes/html_header.php'; ?>

	<? require_once REQUIRE_VERSION . '/views/includes/top_nav.php'; ?>

	<div id="content">
		<? require REQUIRE_VERSION . '/views/includes/breadcrumb_trail.php'; ?>
		<h3><span>Portfolio.</span></h3>
		<p>Portfolio of Rowland Rose. Examples of professional work.</p>
		
		<?

		create_pagination($data['page'], BLOG_ENTRIES_PER_PAGE, $data['total'], LINK_RELATIVE_URL . 'portfolio'); 

		foreach($data['results'] as $key => $piece)
		{
			$link_url = LINK_RELATIVE_URL . 'portfolio/piece/' . $piece['portfolio_url'];

			$preview_image = '';
			if(strlen($piece['image']) > 2) {
				$preview_image = '<div class="post_preview_image"><img src="' . $piece['image'] . '" alt="' . $piece['title'] . '" width="150" /></div>';
			}

			echo '<div class="post_title">';
				echo '<p>' . date('F jS Y.', strtotime($piece['datetime'])) . '</p>';
				echo '<h4><a href="' . $link_url . '">' . $piece['title'] . '</a></h4>';
			echo '</div>';
			echo $preview_image;
			echo '<div class="post_text">' . token_truncate(strip_tags($piece['description']), BLOG_PREVIEW_CHAR_LIMIT) . '... <a href="' . $link_url . '">read more &raquo;</a></div>';
		}

		create_pagination($data['page'], BLOG_ENTRIES_PER_PAGE, $data['total'], LINK_RELATIVE_URL . 'portfolio'); 

		?>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/bottom_nav.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>