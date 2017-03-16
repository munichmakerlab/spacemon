<?php
function cookiemonster($var, $default) {
	if (!isset($_GET[$var])) {
		if(!isset($_COOKIE[$var])) {
			$return = $default;
			setcookie($var, $return, time() + (86400 * 356), "/");

		} else {
			$return = $_COOKIE[$var];

		}
	} else {
		
		$return = $_GET[$var];
		echo "<!-- setze variable aus GET -->";
		setcookie($var, $return, time() + (86400 * 356), "/");
	}
	return $return;
}
