<?

namespace models\classes;

require_once 'model.php';

class Portfolio extends Model
{
	function id($num)
	{
		global $con;

		$query = '
			SELECT * FROM projects 
			WHERE id = 3 
			AND enabled = 1
			LIMIT 1
		';

		$result = $con->query($query);

		$data = array();

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$data[] = $row;
		}

		$result->close();
		
		return $data;
	}

	function portfolio_page($page_num)
	{
		global $con;

		$offset = PORTFOLIO_ENTRIES_PER_PAGE * ($page_num - 1);

		$query = '
			SELECT SQL_CALC_FOUND_ROWS * FROM projects 
			WHERE enabled = 1
			ORDER BY datetime DESC 
			LIMIT ' . $offset . ', ' . PORTFOLIO_ENTRIES_PER_PAGE . ' 
		';

		$result = $con->query($query);

		$data = array();
		$data['results'] = array();

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$temp = $row;
			//$temp['portfolio_url'] = $this->blog_title_to_url($row['title']);
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

	function portfolio_piece($title)
	{
		global $con;

		$query = '
			SELECT * FROM projects 
			WHERE portfolio_url = "' . mysqli_real_escape_string($con, $title) . '" 
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

	function delete_portfolio($id)
	{
		// Doesn't actually delete, instead sets enabled = 0
		// Have to go into database to truly delete content
		global $con;

		$con->query('
			UPDATE projects 
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

	function create_portfolio_piece($title, $date, $preview_image, $body)
	{
		// Create new portfolio piece
		global $con;

		$datetime = date('Y-m-d H:i:s', strtotime($date));

		$con->query('
			INSERT INTO projects 
			SET
				enabled = 1, 
				title = "' . mysqli_real_escape_string($con, $title) . '", 
				image = "' . mysqli_real_escape_string($con, $preview_image) . '", 
				portfolio_url = "' . mysqli_real_escape_string($con, $this->title_to_url($title)) . '", 
				description = "' . mysqli_real_escape_string($con, $body) . '", 
				datetime = "' . mysqli_real_escape_string($con, $datetime) . '"
		');

		if($con->affected_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	function edit_portfolio_piece($title, $date, $preview_image, $body, $id)
	{
		global $con;

		$datetime = date('Y-m-d H:i:s', strtotime($date));

		$con->query('
			UPDATE projects 
			SET
				title = "' . mysqli_real_escape_string($con, $title) . '", 
				image = "' . mysqli_real_escape_string($con, $preview_image) . '", 
				portfolio_url = "' . mysqli_real_escape_string($con, $this->title_to_url($title)) . '", 
				description = "' . mysqli_real_escape_string($con, $body) . '", 
				datetime = "' . mysqli_real_escape_string($con, $datetime) . '"
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