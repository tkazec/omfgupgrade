<?php
require('api.php');
header('Content-Type: application/json');

$json = json_encode(OMFG::info($_SERVER['HTTP_USER_AGENT']));

if (isset($_GET['callback'])) {
	$json = "{$_GET['callback']}({$json})";
}

echo $json;
?>