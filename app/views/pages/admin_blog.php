<?

	$header['title'] = 'Sample name of Admin page.';
	$header['description'] = 'Admin page. Viewing blog posts.';
	$header['js'] = array();
	$header['js'][] = APP_RELATIVE_URL . 'views/js/admin_blog.js';
	$header['js'][] = APP_RELATIVE_URL . 'views/js/logout.js';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="admin">

<div id="container">

	<div id="content" class="blog">
		
		<? require_once REQUIRE_VERSION . '/views/includes/admin_header.php'; ?>

		<h3><span>Blog entries.</span></h3>
		
		<?

		create_pagination($data['page'], BLOG_ENTRIES_PER_PAGE, $data['total'], LINK_RELATIVE_URL . 'admin/blog'); 

		echo '<table id="entries">';
		echo '<tr>';
			echo '<th>Title</th>';
			echo '<th class="time">Date &amp; Time</th>';
			echo '<th class="actions">Actions</th>';
		echo '</tr>';

		foreach($data['results'] as $key => $blog_post)
		{
			$link_url = LINK_RELATIVE_URL . 'admin/blog/edit/' . date('Y/n/j/', strtotime($blog_post['datetime'])) . $blog_post['title_url'];

			echo '<tr>';
				echo '<td class="title_' . $blog_post['id'] . '" >' . $blog_post['title'] . '</td>';
				echo '<td>' . date('F jS Y. g:i a.', strtotime($blog_post['datetime'])) . '</td>';
				echo '<td><button class="edit" type="button" onClick="window.location = \'' . $link_url . '\';">Edit.</button><button class="delete" id="' . $blog_post['id'] . '" type="button">Delete.</button></td>';
			echo '</tr>';
		}

		echo '</table>';

		create_pagination($data['page'], BLOG_ENTRIES_PER_PAGE, $data['total'], LINK_RELATIVE_URL . 'admin/blog'); 

		?>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/admin_footer.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>