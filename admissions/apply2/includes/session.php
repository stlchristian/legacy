<?php
	session_start();
	
	// if the session vars aren't set, try to set them with a cookie
	if (!isset($_SESSION['user_id'])) {
		if (isset($_COOKIE['user_id']) && isset($_COOKIE['email'])) {
			$_SESSION['user_id'] = $_COOKIE['user_id'];
			$_SESSION['email'] = $_COOKIE['email'];
			if (isset($_COOKIE['app_id'])) {
				$_SESSION['app_id'] = $_COOKIE['app_id'];
			}
		}
	}
?>