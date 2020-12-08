<?php 
define('BASE_DIR', './');
define('PUBLIC_DIR', BASE_DIR.'public/');
define('PROTECTED_DIR', BASE_DIR.'protected/');
define('NORMAL_DIR', BASE_DIR.'normal/');

define('DATABASE_CONTROLLER', PROTECTED_DIR.'database.php');
define('USER_MANAGER', PROTECTED_DIR.'usermanager.php');

define('DB_TYPE', 'mysql');
define('DB_HOST', $_ENV["host"]);
define('DB_NAME', 'zsolti_website');
define('DB_USER', $_ENV["user"]);
define('DB_PASS', $_ENV["pass"]);
define('DB_CHARSET', 'utf8');
?>