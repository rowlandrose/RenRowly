<?

	$header['title'] = 'Sample name of Admin page.';
	$header['description'] = 'Admin page. Viewing playground links.';
	$header['js'] = array();
	$header['js'][] = APP_RELATIVE_URL . 'views/js/admin_playground.js';
	$header['js'][] = APP_RELATIVE_URL . 'views/js/logout.js';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="admin">

<div id="container">

	<div id="content" class="playground">
		
		<? require_once REQUIRE_VERSION . '/views/includes/admin_header.php'; ?>

		<h3><span>Playground links.</span></h3>
		
		<?

		create_pagination($data['page'], PLAYGROUND_ENTRIES_PER_PAGE, $data['total'], LINK_RELATIVE_URL . 'admin/playground'); 

		echo '<table id="entries">';
		echo '<tr>';
			echo '<th>Title</th>';
			echo '<th class="time">Image</th>';
			echo '<th class="actions">Actions</th>';
		echo '</tr>';

		foreach($data['results'] as $key => $playground_link)
		{
			$link_url = LINK_RELATIVE_URL . 'admin/playground/edit/' . $playground_link['id'];

			echo '<tr>';
				echo '<td class="title_' . $playground_link['id'] . '" ><a href="' . $playground_link['url'] . '">' . $playground_link['title'] . '</a></td>';
				echo '<td><img class="link_image" src="' . $playground_link['image_url'] . '" alt="' . $playground_link['title'] . '" /></td>';
				echo '<td><button class="edit" type="button" onClick="window.location = \'' . $link_url . '\';">Edit.</button><button class="delete" id="' . $playground_link['id'] . '" type="button">Delete.</button><button class="move_up" id="' . $playground_link['id'] . '" type="button">Move up.</button><button class="move_down" id="' . $playground_link['id'] . '" type="button">Move down.</button><input class="view_order" type="hidden" value="' . $playground_link['view_order'] . '" /></td>';
			echo '</tr>';
		}

		echo '</table>';

		create_pagination($data['page'], PLAYGROUND_ENTRIES_PER_PAGE, $data['total'], LINK_RELATIVE_URL . 'admin/playground'); 

		?>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/admin_footer.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>