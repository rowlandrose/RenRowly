<?

	$header['title'] = 'Sample name of portfolio.';
	$header['description'] = 'Experiments in programming by Sample Name.';

	require_once REQUIRE_VERSION . '/views/includes/header.php';

?>

<body class="playground">

<div id="container">

	<? require_once REQUIRE_VERSION . '/views/includes/html_header.php'; ?>

	<? require_once REQUIRE_VERSION . '/views/includes/top_nav.php'; ?>

	<div id="content">
		<? require REQUIRE_VERSION . '/views/includes/breadcrumb_trail.php'; ?>
		<h3><span>Playground.</span></h3>
		<p>Experiments in programming (and other stuff)</p>
		<ul id="experiments">
			
			<?

			foreach($data['results'] as $key => $experiment)
			{
				echo '<li style="background-image: url(' . $experiment['image_url'] . ');">';
					echo '<a href="' . $experiment['url'] . '">' . $experiment['title'] . '</a>';
				echo '</li>';
			}

			?>

		</ul>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/bottom_nav.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>