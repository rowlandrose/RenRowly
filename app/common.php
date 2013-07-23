<?php

// Validation
function validate($type, $input)
{
	switch ($type):

		case 'date':
		case 'datetime':

			if(strtotime($input)) {
				return true;
			} else {
				return false;
			}

			break;

		default:
			
			return false;

			break;

	endswitch;
}

// Truncate a string of words at the nearest word after the desired character limit
// http://stackoverflow.com/questions/79960/how-to-truncate-a-string-in-php-to-the-word-closest-to-a-certain-number-of-chara
function token_truncate($string, $your_desired_width) {
	$parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
	$parts_count = count($parts);

	$length = 0;
	$last_part = 0;
	for (; $last_part < $parts_count; ++$last_part) {
		$length += strlen($parts[$last_part]);
		if ($length > $your_desired_width) { break; }
	}

	return implode(array_slice($parts, 0, $last_part));
}

// Get URL components into an array
function get_url_components() 
{
	$url = $_SERVER['REQUEST_URI'];
	$path = parse_url($url, PHP_URL_PATH);

	// Removes any elements of url before and including root folder
	$path = preg_replace('#' . LINK_RELATIVE_URL . '#', '/', $path, 1);

	// trim to prevent empty array elements
	return explode("/", trim($path, "/"));
}

// Responsive pagination
function create_pagination($current_page_num, $results_per_page, $total_results, $base_url)
{
	if($total_results == 0) {
		return;
	}

	$num_of_pages = ceil($total_results / $results_per_page);

	echo '<ul class="pagination">';

	if($current_page_num > 1) {
		echo '	<li class="first"><a href="' . $base_url . '/1' . '">&laquo;<span class="words"> First</span></a></li>';
		echo '	<li class="prev"><a href="' . $base_url . '/' . ($current_page_num - 1) . '">&lsaquo;<span class="words"> Prev</span></a></li>';
	}

	// Determine the away_num of each link item.
	// The numbers should show twicefor links that are away in one direction but not the other
	//   Example: [  1  ][  2  ][  3  ][  4  ][  5  ][  6  ][  7  ][  8  ][ 9/12][  10 ][  11 ][  12 ]
	//   Awaynum: [  6  ][  5  ][  5  ][  4  ][  4  ][  3  ][  2  ][  1  ][  0  ][  1  ][  2  ][  3  ]
	//   Notice:            ^      ^      ^      ^
	//   This allows media queries to make the pagination responsive
	$away_nums = array();
	// if the current_page_num is less than halfway point
	if($num_of_pages / $current_page_num > 2)
	{
		$last_double_away_step = 0;
		for($i = 1; $i < $current_page_num; $i++)
		{
			$away_nums[$i] = $current_page_num - $i;
		}
		for($i = $current_page_num; $i <= $num_of_pages; $i++) 
		{
			if($i - $current_page_num < $current_page_num) {
				$away_nums[$i] = $i - $current_page_num;
				$last_double_away_step = $away_nums[$i];
			} else {
				$away_nums[$i] = ceil((($i - $current_page_num) - $last_double_away_step) / 2) + $last_double_away_step;
			}
		}
	// if the current_page_num is past the halfway point
	} else if($num_of_pages / $current_page_num < 2)
	{
		$last_double_away_step = 0;
		for($i = $current_page_num; $i <= $num_of_pages; $i++) 
		{
			$away_nums[$i] = $i - $current_page_num;
			$last_double_away_step = $away_nums[$i];
		}
		for($i = 1; $i < $current_page_num; $i++)
		{
			if($current_page_num - $i > $num_of_pages - $current_page_num) {
				$away_nums[$i] = ceil((($current_page_num - $i) - $last_double_away_step) / 2) + $last_double_away_step;
			} else {
				$away_nums[$i] = $current_page_num - $i;
			}
		}
	// if the current_page_num equals the halfway point
	} else {
		for($i = 1; $i <= $num_of_pages; $i++) 
		{
			$away_nums[$i] = abs($current_page_num - $i);
		}
	}

	for($i = 1; $i <= $num_of_pages; $i++)
	{
		if($i == $current_page_num) {
			echo '<li class="away_0"><span class="current_page">' . $i . ' / ' . $num_of_pages . '</span></li>';
		} else {
			echo '<li class="away_' . $away_nums[$i] . '"><a href="' . $base_url . '/' . $i . '">' . $i . '</a></li>';
		}
	}

	if($current_page_num < $num_of_pages) {
		echo '	<li class="next"><a href="' . $base_url . '/' . ($current_page_num + 1) . '"><span class="words">Next </span>&rsaquo;</a></li>';
		echo '	<li class="last"><a href="' . $base_url . '/' . $num_of_pages . '"><span class="words">Last </span>&raquo;</a></li>';
	}
	
	echo '</ul>';
}

?>