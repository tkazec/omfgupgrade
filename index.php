<?php
/*** data ***/
$ua = $_SERVER['HTTP_USER_AGENT'];

$list = array(
	'Opera' => array(
		'version' => 11.60,
		'url' => 'http://www.opera.com',
		'pre' => 'http://www.opera.com/browser/next'
	),
	'Firefox' => array(
		'version' => 9,
		'url' => 'http://www.getfirefox.com',
		'pre' => 'http://www.mozilla.com/firefox/channel'
	),
	'Chrome' => array(
		'version' => 16,
		'url' => 'http://www.google.com/chrome',
		'pre' => 'http://www.google.com/landing/chrome/beta'
	),
	'Safari' => array(
		'version' => 5.1,
		'url' => 'http://www.apple.com/safari'
	),
	'Internet Explorer' => array(
		'version' => 9,
		'url' => 'http://www.ie9.com',
		'pre' => 'http://ie.microsoft.com/testdrive'
	)
);

$page = array(
	'OMFG, WTF? No idea what you\'re on.',
	'You could be cutting edge... Or totally out of date. Go check!'
);

$freshness = 'Unknown';


/*** match ***/
preg_match('/(Opera)\/9\.80.*Version\/(\d\d\.\d\d)/', $ua, $m) ||
preg_match('/(Opera) (\d\d\.\d\d)/', $ua, $m) ||
preg_match('/(Opera|Firefox|Chrome)\/(\d\d?\.\d\d?)/', $ua, $m);

if (!$m && preg_match('/Version\/(\d\.\d).*(Safari)/', $ua, $m)) {
	$m = array($m[0], $m[2], $m[1]);
}

if (!$m && preg_match('/(MSIE) (\d\d?)/', $ua, $m)) {
	$m[1] = 'Internet Explorer';
}


/*** handle ***/
if ($m && isset($list[$m[1]])) {
	$browser = $m[1];
	$version = floatval($m[2]);
	$cur = $list[$browser];
	$curv = floatval($cur['version']);
	
	if ($version < $curv) {
		$page = array(
			'OMFG, upgrade your f-ing browser!',
			$browser === 'Internet Explorer' ? 'Stuck with Internet Explorer? Installing <a href="http://www.google.com/chromeframe">Chrome Frame</a> may help decrease the pain.' : '',
			$browser
		);
		
		$freshness = 'Outdated';
	} else if ($version === $curv) {
		$page = array(
			'OMFG, you\'re fine.',
			$cur['pre'] ? "Want to be in the cool kids club? Go install a <a href='{$cur['pre']}'>prelease</a>!" : ""
		);
		
		$freshness = 'Current';
	} else {
		$page = array(
			'OMFG, double rainbow!',
			'You\'re using a prelease! As a VIP, enjoy the the privilege of being able to tell everyone else to f-ing upgrade.'
		);
		
		$freshness = 'Prerelease';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<title>OMFG, upgrade!</title>
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
		<style>
		html,body,div,span,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,abbr,address,cite,code,del,dfn,em,img,ins,kbd,q,samp,small,strong,sub,sup,var,b,i,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent}body{line-height:1}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}nav ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}a{margin:0;padding:0;font-size:100%;vertical-align:baseline;background:transparent}ins{background-color:#ff9;color:#000;text-decoration:none}mark{background-color:#ff9;color:#000;font-style:italic;font-weight:bold}del{text-decoration:line-through}abbr[title],dfn[title]{border-bottom:1px dotted;cursor:help}table{border-collapse:collapse;border-spacing:0}hr{display:block;height:1px;border:0;border-top:1px solid #ccc;margin:1em 0;padding:0}input,select{vertical-align:middle}
		
		a {
			color: #FFF;
			color: #555\9;
			filter: alpha(opacity = 30);
			opacity: 0.3;
			text-decoration: none;
		}
		a:hover, a:active, .highlight {
			color: #FFF;
			filter: alpha(opacity = 100);
			opacity: 1;
		}
		
		body {
			background: #000;
			color: #FFF;
			font: 16px "Open Sans", "DejaVu Sans", sans-serif;
			margin: 0 auto;
			text-align: center;
			width: 1000px;
		}
		
		h1, h2 {
			font-weight: 400;
		}
		h1 {
			font-size: 48px;
			margin: 80px;
		}
		h2 {
			font-size: 16px;
		}
		
		#nav {
			font-size: 14px;
			position: absolute;
			right: 15px;
			top: 15px;
		}
		#nav-link {
			cursor: pointer;
			text-align: right;
		}
		#nav-content {
			display: none;
			text-align: left;
			width: 200px;
		}
		#nav:hover #nav-content {
			display: block;
		}
		#nav-content p {
			margin-bottom: 15px;
		}
		
		#sub {
			margin-bottom: 50px;
		}
		
		#list a {
			background-repeat: no-repeat;
			float: left;
			padding-top: 186px;
			width: 200px;
		}
		</style>
		<script src="http://www.google-analytics.com/ga.js" async></script>
		<script>
		var _gaq = _gaq || [];
		_gaq.push(
			["_setAccount", "##GA##"],
			["_setCustomVar", 1, "Browser Freshness", "<?php echo $freshness; ?>", 1],
			["_trackPageview"]
		);
		</script>
	</head>
	<body>
		<div id="nav">
			<div id="nav-link">About</div>
			<div id="nav-content">
				<h2>What's this?</h2>
				<p>A fun little site to point outdated users in the right direction.</p>
				
				<h2>Who made it?</h2>
				<p><a href="https://twitter.com/tkazec">@tkazec</a></p>
				
				<h2>What's it think I'm on?</h2>
				<p><?php echo "{$browser} {$version}."; ?></p>
				
				<h2>Where's the source?</h2>
				<p><a href="https://github.com/tkazec/omfgupgrade">GitHub</a>. The browser logos are from <a href="http://paulirish.com/2010/high-res-browser-icons/">Paul Irish</a>.</p>
				
				<h2>Preview? API?</h2>
				<p>Yes. See the <a href="https://github.com/tkazec/omfgupgrade#readme">README</a> for details.</p>
			</div>
		</div>
		
		<?php
		echo "<h1>{$page[0]}</h1>";
		
		if ($page[1]) {
			echo "<p id='sub'>{$page[1]}</p>";
		}
		
		if ($page[2]) {
			echo "<div id='list'>";
			
			foreach ($list as $name => $info) {
				$bg = "style='background-image:url(\"images/{$name}.png\")'";
				$class = $name === $page[2] ? "class='highlight' " : "";
				echo "<a href='{$info['url']}' {$class}{$bg}>{$name} {$info['version']}</a>";
			}
			
			echo "</div>";
		}
		?>
	</body>
</html>