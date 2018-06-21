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
		
	if(1>0) // group
	{
	$grID = 0;
	if (isset($_REQUEST['group']))
	{
	  $Group = $_REQUEST['group'];
	  if(!strcmp($Group,"Personal"))
	  {
		  $grID = 0;
	  }
	  else
	  {
		  $Group=(filter_var($Group, FILTER_SANITIZE_MAGIC_QUOTES)) ;
		  $sql = "SELECT id FROM groups WHERE name = '$Group';";
		  $result = $con->query($sql);
		  $row = $result->fetch_assoc();
		  $grID = $row["id"];
	  }
	  
	}
	else
	{
		header("Location: siteHTML_Page1.php?group=error");
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
	$fullUrl = $fullUrl . $Group;
	$fullUrl = str_replace(" " , ""  , $fullUrl);
	
	header('Location: '.$fullUrl);
	
	
	
?>