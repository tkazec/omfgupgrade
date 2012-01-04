<?php
/*** setup ***/
header('Content-Type: application/json');

require('api.php');
require('php-ga/src/autoload.php');

use UnitedPrototype\GoogleAnalytics;


/*** json ***/
$browser = OMFG::info($_SERVER['HTTP_USER_AGENT']);
$json = json_encode($browser);

if (isset($_GET['callback'])) {
	$json = "{$_GET['callback']}({$json})";
}

echo $json;


/*** tracking ***/
$tracker = new GoogleAnalytics\Tracker('UA--', 'omfgupgrade.net');

$variable = new GoogleAnalytics\CustomVariable(1, 'Browser Freshness', OMFG::$freshness[$browser['status']], 1);
$tracker->addCustomVariable($variable);

$page = new GoogleAnalytics\Page('/api.json');

$session = new GoogleAnalytics\Session();

$visitor = new GoogleAnalytics\Visitor();
$visitor->fromServerVar($_SERVER);

$tracker->trackPageView($page, $session, $visitor);
?>