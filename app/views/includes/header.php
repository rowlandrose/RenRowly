<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<title><?php echo $header['title']; ?></title>
		<meta name="description" content="<?php echo $header['description']; ?>">
		<!-- Viewport meta tag below is good for responsive designs, remove if unneccessary -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
		<!-- Insert any js dependencies (such as jQuery) and css files here -->

		<?

		// Loads a javascript file if set in the page
		if($header['js']) {
			echo '<script type="text/javascript" src="' . $header['js'] . '"></script>';
		}

		?>

	</head>
	<body>