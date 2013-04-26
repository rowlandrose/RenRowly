<?

//// IP to Lat Lng snippet controller
// Example of a simple model class that returns data from an api

namespace models\classes;

class Ip_to_latlng 
{
	function data()
	{
		$json = file_get_contents('http://freegeoip.net/json/' . $_SERVER['REMOTE_ADDR']);

		$data = $json;
		
		return $data;
	}

}

?>