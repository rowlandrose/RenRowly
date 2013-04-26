<?

// Turns on error reporting
// Remove the following three lines on production
ini_set("max_execution_time", "300");
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');

define('REQUIRE_ROOT', dirname(__FILE__));

// Load Server Constants
require_once 'server.php';

// Load Application
require_once LIVE_FOLDER_NAME . '/load.php';

?>