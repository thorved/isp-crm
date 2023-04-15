<?php 

if (!function_exists('getenv_docker')) {
	// https://github.com/docker-library/wordpress/issues/588 (WP-CLI will load this file 2x)
	function getenv_docker($env, $default) {
		if ($fileEnv = getenv($env . '_FILE')) {
			return rtrim(file_get_contents($fileEnv), "\r\n");
		}
		else if (($val = getenv($env)) !== false) {
			return $val;
		}
		else {
			return $default;
		}
	}
}

// DB credentials.
define('DB_HOST',getenv_docker('DB_HOST', 'localhost'));
define('DB_USER',getenv_docker('DB_USER', 'isp'));
define('DB_PASS',getenv_docker('DB_PASSWORD', 'test1234'));
define('DB_NAME',getenv_docker('DB_NAME', 'isp'));
// Establish database connection.
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
