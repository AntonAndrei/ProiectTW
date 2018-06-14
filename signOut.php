<?php

	session_start();
   	session_unset();
	session_destroy();
	header("Location: siteHTML_Home.php");
	exit();

?>