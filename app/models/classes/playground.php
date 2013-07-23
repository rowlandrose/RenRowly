<?

namespace models\classes;

require_once 'model.php';

class Playground extends Model 
{
	function playground_all()
	{
		global $con;

		$query = '
			SELECT * FROM playground_links 
			WHERE enabled = 1
			ORDER BY view_order DESC 
		';

		$result = $con->query($query);

		$data = array();
		$data['results'] = array();

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$data['results'][] = $row;
		}

		$result->close();
		
		return $data;
	}

	function playground_page($page_num)
	{
		global $con;

		$offset = PLAYGROUND_ENTRIES_PER_PAGE * ($page_num - 1);

		$query = '
			SELECT SQL_CALC_FOUND_ROWS * FROM playground_links 
			WHERE enabled = 1
			ORDER BY view_order DESC 
			LIMIT ' . $offset . ', ' . PLAYGROUND_ENTRIES_PER_PAGE . ' 
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

	function delete_playground($id)
	{
		// Doesn't actually delete, instead sets enabled = 0
		// Have to go into database to truly delete content
		global $con;

		$con->query('
			UPDATE playground_links 
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

	function create_playground_link($title, $url, $image)
	{
		// Create new playground link
		global $con;

		$query = '
			SELECT MAX(view_order) FROM playground_links 
		';

		$result = $con->query($query);

		$data = array();

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$data = $row;
		}

		$con->query('
			INSERT INTO playground_links 
				(title, url, image_url, view_order) 
				VALUES(
				"' . mysqli_real_escape_string($con, $title) . '", 
				"' . mysqli_real_escape_string($con, $url) . '", 
				"' . mysqli_real_escape_string($con, $image) . '", 
				"' . mysqli_real_escape_string($con, $data['MAX(view_order)'] + 1) . '"
				)
		');

		if($con->affected_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	function playground_link($id)
	{
		global $con;

		$query = '
			SELECT * FROM playground_links 
			WHERE id = "' . mysqli_real_escape_string($con, $id) . '" 
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

	function edit_playground_link($id, $title, $url, $image)
	{
		// Edit playground link
		global $con;

		$con->query('
			UPDATE playground_links 
			SET
				title = "' . mysqli_real_escape_string($con, $title) . '", 
				url = "' . mysqli_real_escape_string($con, $url) . '", 
				image_url = "' . mysqli_real_escape_string($con, $image) . '"
			WHERE id = "' . mysqli_real_escape_string($con, $id) . '" 
			LIMIT 1
		');

		if($con->affected_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	function move_up($id, $current_order)
	{
		// Move playground link
		global $con;

		// Find MAX view_order
		$query = '
			SELECT id, view_order FROM playground_links 
			ORDER BY view_order DESC
			LIMIT 1
		';

		$result = $con->query($query);

		$data = array();
		$data['results'] = array();

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$data['results'][] = $row;
		}

		$result->close();

		$current_max = $data['results'][0]['view_order'];

		$next_order = $current_order + 1;

		if($next_order > $current_max) {
			return false;
		}

		// Find link to be switched with
		$query = '
			SELECT id, view_order FROM playground_links 
			WHERE view_order = "' . mysqli_real_escape_string($con, $next_order) . '" 
			LIMIT 1
		';

		$result = $con->query($query);

		$data = array();
		$data['results'] = array();

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$data['results'][] = $row;
		}

		$result->close();

		$replaced_id = $data['results'][0]['id'];

		$con->query('
			UPDATE playground_links
			SET view_order = "0" 
			WHERE id = "' . mysqli_real_escape_string($con, $replaced_id) . '" 
			LIMIT 1
		');

		if($con->affected_rows != 1) {
			return false;
		}

		$con->query('
			UPDATE playground_links
			SET view_order = "' . mysqli_real_escape_string($con, $next_order) . '" 
			WHERE id = "' . mysqli_real_escape_string($con, $id) . '" 
			LIMIT 1
		');

		if($con->affected_rows != 1) {
			return false;
		}

		$con->query('
			UPDATE playground_links
			SET view_order = "' . mysqli_real_escape_string($con, $current_order) . '" 
			WHERE id = "' . mysqli_real_escape_string($con, $replaced_id) . '" 
			LIMIT 1
		');

		if($con->affected_rows == 1) {
			return true;
		} else {
			return false;
		}
	}

	function move_down($id, $current_order)
	{
		// Move playground link
		global $con;

		$next_order = $current_order - 1;

		if($next_order < 1) {
			return false;
		}

		// Find link to be switched with
		$query = '
			SELECT id, view_order FROM playground_links 
			WHERE view_order = "' . mysqli_real_escape_string($con, $next_order) . '" 
			LIMIT 1
		';

		$result = $con->query($query);

		$data = array();
		$data['results'] = array();

		while ($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$data['results'][] = $row;
		}

		$result->close();

		$replaced_id = $data['results'][0]['id'];

		$con->query('
			UPDATE playground_links
			SET view_order = "0" 
			WHERE id = "' . mysqli_real_escape_string($con, $replaced_id) . '" 
			LIMIT 1
		');

		if($con->affected_rows != 1) {
			return false;
		}

		$con->query('
			UPDATE playground_links
			SET view_order = "' . mysqli_real_escape_string($con, $next_order) . '" 
			WHERE id = "' . mysqli_real_escape_string($con, $id) . '" 
			LIMIT 1
		');

		if($con->affected_rows != 1) {
			return false;
		}

		$con->query('
			UPDATE playground_links
			SET view_order = "' . mysqli_real_escape_string($con, $current_order) . '" 
			WHERE id = "' . mysqli_real_escape_string($con, $replaced_id) . '" 
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