<?php

	session_start();

	$con = mysqli_connect('127.0.0.1','root','','trex');
	if(!$con)
	{
		header("refresh:5; url=siteHTML_Home.html");
		exit("Connection to server failed");
	}
	if(!mysqli_select_db($con,'trex'))
	{
		header("refresh:5; url=siteHTML_Home.html");
		exit("Database not selected");
	}
	
	
	
	
	if(1>0) // month
	{
		
	if (isset($_REQUEST['month']))
	{
	  $Month = $_REQUEST['month'];
	}
	
	if(!$Month)
	{
		header("Location: siteHTML_Page7.php?month=error1");
		exit();
	}
	}


		
	$fullUrl = $_SERVER['HTTP_REFERER'];

	$urlLen = strlen($fullUrl);
	$i = $urlLen;
	while($fullUrl[$i]!='?')
	{
		$fullUrl[$i]=' ';
		$i = $i - 1;
	}
	$fullUrl = $fullUrl . $Month;
	$fullUrl = str_replace(" " , ""  , $fullUrl);
	
	header('Location: '.$fullUrl);
	

	
	
?>