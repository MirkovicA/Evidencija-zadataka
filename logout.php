<?php
	require 'session.php';
	ob_start();
	session_start();
    $_SESSION = array();
    header("Location: index.php");
?>