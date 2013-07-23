<?

	$header['title'] = 'Sample name of Admin page.';
	$header['description'] = 'Admin page. Viewing portfolio pieces.';
	$header['js'] = array();
	$header['js'][] = APP_RELATIVE_URL . 'views/js/admin_portfolio.js';
	$header['js'][] = APP_RELATIVE_URL . 'views/js/logout.js';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="admin">

<div id="container">

	<div id="content" class="portfolio">
		
		<? require_once REQUIRE_VERSION . '/views/includes/admin_header.php'; ?>

		<h3><span>Portfolio pieces.</span></h3>
		
		<?

		create_pagination($data['page'], PORTFOLIO_ENTRIES_PER_PAGE, $data['total'], LINK_RELATIVE_URL . 'admin/portfolio'); 

		echo '<table id="entries">';
		echo '<tr>';
			echo '<th>Preview Image</th>';
			echo '<th>Title</th>';
			echo '<th class="time">Date &amp; Time</th>';
			echo '<th class="actions">Actions</th>';
		echo '</tr>';

		foreach($data['results'] as $key => $blog_post)
		{
			$link_url = LINK_RELATIVE_URL . 'admin/portfolio/edit/' . $blog_post['portfolio_url'];

			$preview_image = '<td>No image uploaded yet</td>';
			if(strlen($blog_post['image']) > 2) {
				$preview_image = '<td><img src="' . $blog_post['image'] . '" alt="' . $blog_post['title'] . '" width="150" /></td>';
			}

			echo '<tr>';
				echo $preview_image;
				echo '<td class="title_' . $blog_post['id'] . '" >' . $blog_post['title'] . '</td>';
				echo '<td>' . date('F jS Y. g:i a.', strtotime($blog_post['datetime'])) . '</td>';
				echo '<td><button class="edit" type="button" onClick="window.location = \'' . $link_url . '\';">Edit.</button><button class="delete" id="' . $blog_post['id'] . '" type="button">Delete.</button></td>';
			echo '</tr>';
		}

		echo '</table>';

		create_pagination($data['page'], PORTFOLIO_ENTRIES_PER_PAGE, $data['total'], LINK_RELATIVE_URL . 'admin/portfolio'); 

		?>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/admin_footer.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>