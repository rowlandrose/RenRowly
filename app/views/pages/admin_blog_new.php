<?

	$header['title'] = 'Sample name of Admin page.';
	$header['description'] = 'Admin page. Create new blog entry.';

	$header['js'] = array();
	$header['js'][] = APP_RELATIVE_URL . 'dependencies/ckeditor/ckeditor.js';
	$header['js'][] = APP_RELATIVE_URL . 'views/js/admin_blog_new.js';
	$header['js'][] = APP_RELATIVE_URL . 'views/js/logout.js';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="admin">

<div id="container">

	<div id="content" class="blog_new">
		
		<? require_once REQUIRE_VERSION . '/views/includes/admin_header.php'; ?>

		<h3><span>Create new blog entry.</span></h3>
		
		<form id="form_blog_new">

			<input id="blog_title" name="blog_title" maxlength="200" placeholder="Title of post." />
			<textarea id="blog_body" name="blog_body" placeholder="Body of post."></textarea>

			<div id="results"></div>

			<input class="button_submit" type="submit" value="Create." />

		</form>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/admin_footer.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>