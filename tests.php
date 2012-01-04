<?php
require("detect.php");

$total = 0;
$passed = 0;

$list = array(
	'Opera' => array(
		'4.02' => 'Opera/4.02 (Windows 98; U) [en]',
		'9.8' => 'Opera/9.80 (J2ME/MIDP; Opera Mini/5.0 (Windows; U; Windows NT 5.1; en) AppleWebKit/886; U; en) Presto/2.4.15',
		'11.01' => 'Opera/9.80 (X11; Linux i686; U; ja) Presto/2.7.62 Version/11.01',
		'11.11' => 'Mozilla/5.0 (Windows NT 5.1; U; en; rv:1.8.1) Gecko/20061208 Firefox/5.0 Opera 11.11'
	),
	'Firefox' => array(
		'1' => 'Mozilla/5.0 (X11; U; SunOS i86pc; en-US; rv:1.7.5) Gecko/20041109 Firefox/1.0',
		'1.5' => 'Mozilla/5.0 (X11; U; Linux i686; es-ES; rv:1.8.0.11) Gecko/20070327 Ubuntu/dapper-security Firefox/1.5.0.11',
		'3.1' => 'Mozilla/5.0 (Windows; U; Windows NT 6.0; x64; en-US; rv:1.9.1b2pre) Gecko/20081026 Firefox/3.1b2pre',
		'4.2' => 'Mozilla/5.0 (X11; Linux x86_64; rv:2.2a1pre) Gecko/20110324 Firefox/4.2a1pre'
	),
	'Chrome' => array(
		'0.2' => 'Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.2.149.27 Safari/525.13',
		'4.1' => 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/532.5 (KHTML, like Gecko) Chrome/4.1.249.1025 Safari/532.5',
		'7' => 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.7 (KHTML, like Gecko) RockMelt/0.8.36.78 Chrome/7.0.517.44 Safari/534.7',
		'12' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/534.30 (KHTML, like Gecko) Ubuntu/11.04 Chromium/12.0.742.112 Chrome/12.0.742.112 Safari/534.30',
		'14' => 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.815.0 Safari/535.1'
	),
	'Safari' => array(
		'3' => 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en-us) AppleWebKit/522.10.1 (KHTML, like Gecko) Version/3.0 Safari/522.11',
		'3.2' => 'Mozilla/5.0 (Windows; U; Windows NT 6.0; sv-SE) AppleWebKit/525.27.1 (KHTML, like Gecko) Version/3.2.1 Safari/525.27.1',
		'5' => 'Mozilla/5.0 (X11; U; Linux x86_64; en-us) AppleWebKit/531.2+ (KHTML, like Gecko) Version/5.0 Safari/531.2+'
	),
	'Internet Explorer' => array(
		'2' => 'Mozilla/1.22 (compatible; MSIE 2.0; Windows 95)',
		'3' => 'Mozilla/2.0 (compatible; MSIE 3.0B; Windows NT)',
		'5' => 'Mozilla/4.0 (compatible; MSIE 5.5b1; Mac_PowerPC)',
		'6' => 'Mozilla/4.0 (compatible; MSIE 6.1; Windows XP; .NET CLR 1.1.4322; .NET CLR 2.0.50727)',
		'7' => 'Mozilla/5.0 (Windows; U; MSIE 7.0; Windows NT 6.0; en-US)',
		'9' => 'Mozilla/5.0 (Windows; U; MSIE 9.0; Windows NT 9.0; en-US)',
		'10' => 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)'
	)
);

echo "<pre>";
foreach ($list as $name => $versions) {
	foreach ($versions as $ver => $ua) {
		$browser = OMFG::info($ua);
		
		if ($browser['name'] !== $name || $browser['version'] !== floatval($ver)) {
			echo "<strong>{$ua}</strong><br>";
			echo "Expected <em>{$name} {$ver}</em>, detected ";
			print_r($browser);
			echo "<br>";
		} else {
			$passed++;
		}
		
		$total++;
	}
}
echo "</pre>";

echo "<p>Passed {$passed} out of {$total} tests!</p>";
?>