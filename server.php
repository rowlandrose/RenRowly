<?

define('DB_HOST', 'yourdomain.com');
define('DB_USERNAME', 'sample_username');
define('DB_PASSWORD', 'sample_password');
define('DB_NAME', 'sample_dbname');

// Foldername of your app
// Just upload 'app_v2' for example then point to that folder
// Reverting back if anything goes wrong is as easy as changing this constant
define('LIVE_FOLDER_NAME', 'app');

// Set default timezone (keeps recorded datetimes consistent)
// Change this to whatever you prefer
date_default_timezone_set('America/Chicago');

?>