<?php

define('HELLO', 'hello');
define('SITE_URL', "http://localhost/run");

// 	ini_set('display_errors', 1);
// 	ini_set('display_startup_errors', 1);
// 	error_reporting(E_ALL);

// ROUTING MAP
$section = (isset($_GET['section']) && !empty($_GET['section']))?$_GET['section']:'home';

// ROUTING
switch ($section) {
	case 'home':
		require('home.php');
		break;

	case 'template':
		require('template.php');
		break;
	case 'test':
		require('test.php');
		break;
	case 'test1':
		require('test1.php');
		break;

	default:
		http_response_code(404);
		exit;
}

exit;