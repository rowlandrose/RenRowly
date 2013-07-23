<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<title><? echo $header['title']; ?></title>
		<meta name="description" content="<? echo $header['description']; ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!-- Insert any js dependencies (such as jQuery) and css files here -->
		<link rel="stylesheet" href="<? echo APP_RELATIVE_URL . 'views/styles/main.css'; ?>">

		<script type="text/javascript">
			// Pass PHP Constants into Javascript
			<?
			// Only copy constants that are safe
			echo 'var APP_RELATIVE_URL = \'' . APP_RELATIVE_URL . '\';';
			echo 'var LOADING_HTML = \'' . LOADING_HTML . '\';';
			?>
		</script>

		<script type="text/javascript" src="<? echo APP_RELATIVE_URL . 'dependencies/jquery-1.10.1.min.js'; ?>"></script>

		<?

		// Loads a javascript file after jquery if set in the page
		if($header['js']) {
			foreach($header['js'] as $key_js => $jsfile) {
				echo '<script type="text/javascript" src="' . $jsfile . '"></script>';
			}
		}

		?>

		<!-- Good spot for disqus code -->
		<script type="text/javascript">
			/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			var disqus_shortname = 'rowlandroseblogandportfolio'; // required: replace example with your forum shortname

			/* * * DON'T EDIT BELOW THIS LINE * * */
			(function () {
				var s = document.createElement('script'); s.async = true;
				s.type = 'text/javascript';
				s.src = '//' + disqus_shortname + '.disqus.com/count.js';
				(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
			}());
		</script>

		<!-- Good spot for google analytics code -->
		<script>
			// Google Analytics
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-21212393-6', 'rowlandrose.com');
			ga('send', 'pageview');
		</script>

	</head>