<?

// Start PHP Session
session_start();

// Add GZIP?

// Define Root Folder Paths
define('REQUIRE_VERSION', dirname(__FILE__));
$path_arr = explode('/', REQUIRE_VERSION);
$version_folder_name = $path_arr[count($path_arr) - 1];
$path_arr = explode('/', $_SERVER['SCRIPT_NAME']);

$root_folder_name = '';
for( $i = 1; $i < count($path_arr) - 1; $i++ ) {
	$root_folder_name .= $path_arr[$i] . '/';
}

define('DOMAIN_URL', 'http://' . $_SERVER['HTTP_HOST']);
define('APP_RELATIVE_URL', '/' . $root_folder_name . $version_folder_name . '/');
define('APP_FULL_URL', DOMAIN_URL . '/' . $root_folder_name . $version_folder_name . '/');
define('LINK_RELATIVE_URL', '/' . $root_folder_name);
define('LINK_FULL_URL', DOMAIN_URL . '/' . $root_folder_name);

// Require constants
require_once REQUIRE_VERSION . '/config.php';

// Enable PHP 5.3 namespace class autoloading
spl_autoload_register();

// Connect to database
$con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Create routing object to handle HTTP requests (Use $_REQUEST?)
$routing_obj = new Routing($_POST);

// Close database connection
$con->close();

?>