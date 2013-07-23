<?

	$header['title'] = 'Sample name of Admin page.';
	$header['description'] = 'Admin page. Edit blog entry.';

	$header['js'] = array();
	$header['js'][] = APP_RELATIVE_URL . 'dependencies/ckeditor/ckeditor.js';
	$header['js'][] = APP_RELATIVE_URL . 'views/js/admin_blog_edit.js';
	$header['js'][] = APP_RELATIVE_URL . 'views/js/logout.js';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="admin">

<div id="container">

	<div id="content">
		
		<? require_once REQUIRE_VERSION . '/views/includes/admin_header.php'; ?>

		<h3><span>Edit blog entry.</span></h3>
		
		<form id="form_blog_edit">

			<input id="blog_title" name="blog_title" maxlength="200" placeholder="Title of post." value="<? echo $data['title']; ?>" />
			<textarea id="blog_body" name="blog_body" placeholder="Body of post."><? echo $data['description']; ?></textarea>

			<div id="results"></div>

			<input type="hidden" id="blog_id" value="<? echo $data['id']; ?>" />
			
			<input class="button_submit" type="submit" value="Save changes." />

		</form>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/admin_footer.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>