<?

	$header['title'] = $data['title'];
	$header['description'] = token_truncate(strip_tags($data['description']), POST_DESCRIPTION_CHAR_LIMIT) . '...';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="post">

<div id="container">

	<? require_once REQUIRE_VERSION . '/views/includes/html_header.php'; ?>

	<? require_once REQUIRE_VERSION . '/views/includes/top_nav.php'; ?>

	<div id="content">
		<? require REQUIRE_VERSION . '/views/includes/breadcrumb_trail.php'; ?>
		
		<?php 

		echo '<div class="post_title post_page">';
			echo '<p>' . date('F jS Y.', strtotime($data['datetime'])) . '</p>';
			echo '<h4>' . $data['title'] . '</h4>';
		echo '</div>';
		echo '<div class="post_text">' . $data['description'] . '</div>';

		?>
		
	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/bottom_nav.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>