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
			echo '<p>' . date('F jS Y. g:i a.', strtotime($data['datetime'])) . '</p>';
			echo '<h4>' . $data['title'] . '</h4>';
		echo '</div>';
		echo '<div class="post_text">' . $data['description'] . '</div>';

		?>

		<div id="disqus_thread"></div>
		<script type="text/javascript">
			/* * * DON'T EDIT BELOW THIS LINE * * */
			(function() {
				var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>

	</div>

	<? require_once REQUIRE_VERSION . '/views/includes/bottom_nav.php'; ?>

</div>

<? require_once REQUIRE_VERSION . '/views/includes/footer.php'; ?>