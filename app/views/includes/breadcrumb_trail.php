<?

// Breadcrumb trail generated from URL
// Uses microdata to be more google-friendly (see: http://support.google.com/webmasters/bin/answer.py?hl=en&answer=185417)

$path_components = get_url_components();
$page_name = $path_components[0];
$param_1 = $path_components[1];
$param_2 = $path_components[2];
$param_3 = $path_components[3];
$param_4 = $path_components[4];
$param_5 = $path_components[5];

if(LINK_RELATIVE_URL != '') {
	$base_url = LINK_RELATIVE_URL;
} else {
	$base_url = '/';
}

?>

<div class="breadcrumbs">

	<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href=<? echo '"' . $base_url . '"'; ?> itemprop="url">
			<span itemprop="title">Home</span></a> 
		&rsaquo;
	</div>

	<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href=<? echo '"' . $base_url . $page_name . '"'; ?> itemprop="url">
			<span itemprop="title"><? echo ucfirst($page_name); ?></span></a> 
		<? if($param_1) { echo '&rsaquo;'; } ?>
	</div>

	<?

	if($param_1 == 'post')
	{
		?>

		<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a href=<? echo '"' . $base_url . $page_name . '/' . $param_1 . '/' . $param_2 . '/' . $param_3 . '/' . $param_4 . '/' . $param_5 . '"'; ?> itemprop="url">
				<span itemprop="title"><? 
					if(strlen($param_5) > POST_TITLE_BREADCRUMB_LENGTH) {
						echo substr($param_5, 0, POST_TITLE_BREADCRUMB_LENGTH) . '...'; 
					} else {
						echo $param_5;
					}
				?></span></a>
		</div>

		<?
	}
	else if($param_1 == 'piece')
	{
		?>

		<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a href=<? echo '"' . $base_url . $page_name . '/' . $param_1 . '/' . $param_2 . '"'; ?> itemprop="url">
				<span itemprop="title"><? echo $param_2; ?></span></a>
		</div>

		<?
	}
	else if($param_1)
	{
		?>

		<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a href=<? echo '"' . $base_url . $page_name . '/' . $param_1 . '"'; ?> itemprop="url">
				<span itemprop="title"><? echo $param_1; ?></span></a>
		</div>

		<?
	}

	?>
</div>