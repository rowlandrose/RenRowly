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

		<!-- Good spot for google analytics code -->

	</head>