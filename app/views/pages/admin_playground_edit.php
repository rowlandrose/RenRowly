<?

	$header['title'] = 'Sample name of Admin page.';
	$header['description'] = 'Admin page. Edit playground link.';

	$header['js'] = array();
	$header['js'][] = APP_RELATIVE_URL . 'views/js/admin_playground_edit.js';
	$header['js'][] = APP_RELATIVE_URL . 'views/js/logout.js';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="admin">

<div id="container">

	<div id="content">
		
		<? require_once REQUIRE_VERSION . '/views/includes/admin_header.php'; ?>

		<h3><span>Edit playground link.</span></h3>
		
		<form id="form_playground_edit">

			<input id="playground_title" name="playground_title" maxlength="200" placeholder="Title of link." value="<? echo $data['title']; ?>" />
			<input id="playground_url" name="playground_url" maxlength="200" placeholder="URL of link." value="<? echo $data['url']; ?>" />
			<input id="playground_image" name="playground_image" maxlength="200" placeholder="URL of image. Ideally a square image at least 345px wide." value="<? echo $data['image_url']; ?>" />

			<div id="results"></div>

			<input type="hidden" id="playground_id" value="<? echo $data['id']; ?>" />
			
			<input class="button_submit" type="submit" value="Save changes." />

		</form>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/admin_footer.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>