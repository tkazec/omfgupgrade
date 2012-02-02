<?php
class OMFG {
	public static $freshness = array(
		'old' => 'Outdated',
		'cur' => 'Current',
		'pre' => 'Prerelease',
		'mob' => 'Mobile',
		'wtf' => 'Unknown'
	);
	
	public static $list = array(
		'Opera' => array(
			'version' => 11.60,
			'url' => 'http://www.opera.com',
			'pre' => 'http://www.opera.com/browser/next'
		),
		'Firefox' => array(
			'version' => 10,
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
	
	public static function parse($ua) {
		if (preg_match('/Android|BlackBerry|Fennec|Mobile|NetFront|Nokia|Opera Mini|Opera Mobi|SymbianOS/', $ua)) {
			return 'mobile';
		}
		
		preg_match('/(Opera)\/9\.80.*Version\/(\d\d\.\d\d)/', $ua, $m) ||
		preg_match('/(Opera) (\d\d\.\d\d)/', $ua, $m) ||
		preg_match('/(Opera|Firefox|Chrome)\/(\d\d?\.\d\d?)/', $ua, $m);

		if (!$m && preg_match('/Version\/(\d\.\d).*(Safari)/', $ua, $m)) {
			$m = array($m[0], $m[2], $m[1]);
		}

		if (!$m && preg_match('/(MSIE) (\d\d?)/', $ua, $m)) {
			$m[1] = 'Internet Explorer';
		}
		
		return $m;
	}
	
	public static function info($ua) {
		$name = null;
		$version = null;
		$status = 'wtf';
		
		$m = self::parse($ua);
		
		if ($m === 'mobile') {
			$status = 'mob';
		} else if ($m && isset(self::$list[$m[1]])) {
			$name = $m[1];
			$version = floatval($m[2]);
			
			$cur = self::$list[$name];
			$cur_v = floatval($cur['version']);
			
			if ($version < $cur_v) {
				$status = 'old';
			} else if ($version === $cur_v) {
				$status = 'cur';
			} else {
				$status = 'pre';
			}
		}
		
		return array(
			'name' => $name,
			'version' => $version,
			'status' => $status
		);
	}
}
?>