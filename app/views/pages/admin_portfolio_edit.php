<?

	$header['title'] = 'Sample name of Admin page.';
	$header['description'] = 'Admin page. Edit portfolio piece.';

	$header['js'] = array();
	$header['js'][] = APP_RELATIVE_URL . 'dependencies/ckeditor/ckeditor.js';
	$header['js'][] = APP_RELATIVE_URL . 'views/js/admin_portfolio_edit.js';
	$header['js'][] = APP_RELATIVE_URL . 'views/js/logout.js';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="admin">

<div id="container">

	<div id="content">
		
		<? require_once REQUIRE_VERSION . '/views/includes/admin_header.php'; ?>

		<h3><span>Edit portfolio piece.</span></h3>
		
		<form id="form_portfolio_edit">

			<?
				$formatted_date = date('m/d/Y', strtotime($data['datetime']));
			?>

			<input id="portfolio_title" name="portfolio_title" maxlength="200" placeholder="Title of post." value="<? echo $data['title']; ?>" />
			<input id="portfolio_preview_image_url" name="portfolio_preview_image_url" maxlength="200" placeholder="URL of preview image (at least 150px wide)." value="<? echo $data['image']; ?>" />
			<input id="portfolio_date" name="portfolio_date" maxlength="10" placeholder="Date of piece (MM/DD/YYYY)" value="<? echo $formatted_date; ?>" />
			<textarea id="portfolio_body" name="portfolio_body" placeholder="Body of post."><? echo $data['description']; ?></textarea>

			<div id="results"></div>

			<input type="hidden" id="portfolio_id" value="<? echo $data['id']; ?>" />
			
			<input class="button_submit" type="submit" value="Save changes." />

		</form>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/admin_footer.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>