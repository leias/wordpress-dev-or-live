// Define Environments
$environments = array(
    'dev' => 'XXX.XXXdev.co',
    'dev' => 'XXX.YYY.com'
);

// Get current server name
$server_name = $_SERVER['SERVER_NAME'];

// Define ENVIRONMENT constant
foreach($environments AS $key => $env){
    if(strstr($server_name, $env)){
        define('ENVIRONMENT', $key);
        break;
    }
}
// If no environment is set default to production
if(!defined('ENVIRONMENT')) define('ENVIRONMENT', 'live');

// Define WP constants based on current ENVIRONMENT
if(ENVIRONMENT == 'dev'){
    define('DB_NAME', 'ZZZ');
    define('DB_USER', 'ZZZ');
    define('DB_PASSWORD', 'ZZZ');
    define('DB_HOST', 'localhost');
     // Enable WP_DEBUG mode
    define('WP_DEBUG', true );
    // Enable Debug logging to the /wp-content/debug.log file
    define('WP_DEBUG_LOG', true );
    // Disable display of errors and warnings 
    define('WP_DEBUG_DISPLAY', false);
    define('WP_SITEURL', 'https://XXX.XXXdev.co/');
    define('WP_HOME', 'https://XXX.XXXdev.co/');
} else {
    define('DB_NAME', 'ZZZ');
    define('DB_USER', 'ZZZ');
    define('DB_PASSWORD', 'ZZZ');
    define('DB_HOST', 'localhost');
    define('WP_DEBUG', false );
    define('WP_DEBUG_LOG', false );
    define('WP_DEBUG_DISPLAY', false);
    define('WP_SITEURL', 'https://YYY.com/');
    define('WP_HOME', 'https://YYY.com/');
    define('CONCATENATE_SCRIPTS', false);
}
