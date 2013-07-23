<?

//// Blog

namespace models\classes;

require_once 'model.php';

class Blog extends Model
{
	function latest()
	{
		global $con;

		$query = '
			SELECT * FROM blog_posts 
			WHERE enabled = 1
			ORDER BY datetime DESC 
			LIMIT 1
		';

		$result = $con->query($query);

		$data = array();

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$temp = $row;
			//$temp['blog_url'] = $this->blog_title_to_url($row['title']);
			$data[] = $temp;
		}

		$result->close();
		
		return $data;
	}

	function blog_page($page_num)
	{
		global $con;

		$offset = BLOG_ENTRIES_PER_PAGE * ($page_num - 1);

		$query = '
			SELECT SQL_CALC_FOUND_ROWS * FROM blog_posts 
			WHERE enabled = 1
			ORDER BY datetime DESC 
			LIMIT ' . $offset . ', ' . BLOG_ENTRIES_PER_PAGE . ' 
		';

		$result = $con->query($query);

		$data = array();
		$data['results'] = array();

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$temp = $row;
			$data['results'][] = $temp;
		}


		$result->close();

		$query = 'SELECT FOUND_ROWS()';
		$result = $con->query($query);

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$data['total'] = $row['FOUND_ROWS()'];
		}

		$result->close();
		
		return $data;
	}

	function blog_post($year, $month, $day, $title)
	{
		global $con;

		$query = '
			SELECT * FROM blog_posts 
			WHERE year = ' . mysqli_real_escape_string($con, $year) . ' 
			AND month = ' . mysqli_real_escape_string($con, $month) . ' 
			AND day = ' . mysqli_real_escape_string($con, $day) . ' 
			AND title_url = "' . mysqli_real_escape_string($con, $title) . '" 
			AND enabled = 1
			LIMIT 1 
		';

		$result = $con->query($query);

		$data = array();

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$data = $row;
		}

		$result->close();
		
		return $data;
	}

	function delete_blog($id)
	{
		// Doesn't actually delete, instead sets enabled = 0
		// Have to go into database to truly delete content
		global $con;

		$con->query('
			UPDATE blog_posts 
			SET enabled = 0
			WHERE id = ' . mysqli_real_escape_string($con, $id) . '
			LIMIT 1
		');

		if($con->affected_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	function create_blog_post($title, $body)
	{
		// Create new blog post
		global $con;

		$datetime = date('Y-m-d H:i:s');
		$year = date('Y', strtotime($datetime));
		$month = date('n', strtotime($datetime));
		$day = date('j', strtotime($datetime));

		$con->query('
			INSERT INTO blog_posts 
			SET
				enabled = 1, 
				title = "' . mysqli_real_escape_string($con, $title) . '", 
				title_url = "' . mysqli_real_escape_string($con, $this->title_to_url($title)) . '", 
				description = "' . mysqli_real_escape_string($con, $body) . '", 
				datetime = "' . $datetime . '", 
				year = "' . $year . '", 
				month = "' . $month . '", 
				day = "' . $day . '"
		');

		if($con->affected_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	function edit_blog_post($title, $body, $id)
	{
		// Edit blog post
		global $con;

		$datetime = date('Y-m-d H:i:s');

		$con->query('
			UPDATE blog_posts 
			SET
				title = "' . mysqli_real_escape_string($con, $title) . '", 
				title_url = "' . mysqli_real_escape_string($con, $this->title_to_url($title)) . '", 
				description = "' . mysqli_real_escape_string($con, $body) . '", 
				last_updated = "' . $datetime . '"
			WHERE id = ' . mysqli_real_escape_string($con, $id) . ' 
			LIMIT 1
		');

		if($con->affected_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

}

?>