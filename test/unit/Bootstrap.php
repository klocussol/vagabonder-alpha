<?php 
error_reporting(E_ALL);
set_time_limit(60);
ini_set('memory_limit', '32M');
define('DEFAULT_TIMEZONE', 'America/New_York');
date_default_timezone_set(DEFAULT_TIMEZONE);

$applicationRoot = __DIR__."/../..";

$vendorAutoload = $applicationRoot . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
if(file_exists($vendorAutoload)) {
	$loader = include $vendorAutoload;
} else {
	echo "Application can not be started. No autoloader present.";
	exit(2);
}
unset($applicationRoot);