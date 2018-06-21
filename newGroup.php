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
	
	
    if(1>0) // name
	{
		
	if (isset($_REQUEST['name']))
	{
	  $Name = $_REQUEST['name'];
	}
	
	if(!$Name)
	{
		header("Location: siteHTML_Page6.php?name=error1");
		exit();
	}
	else if($Name)
	{
		
		if(strlen($Name)>19)
		{
			header("Location: siteHTML_Page1.php?name=error2");
			exit();
		}
		$temp = $Name;
		$temp = str_replace("'" , "xx"  , $temp);
		$temp = str_replace("\\" , "xx"  , $temp);
		if(strlen($temp) != strlen($Name))
		{
			header("Location: siteHTML_Page6.php?name=error3");
			exit();
		}
		
	}
	
	}
	
	 	
	$grID = 0;
	$sql = "SELECT MAX(id) FROM groups;";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
	$grID = $row["MAX(id)"];
	
	$grID = $grID + 1;
	$Name=(filter_var($Name, FILTER_SANITIZE_MAGIC_QUOTES)) ;
	$sql = "INSERT INTO groups VALUES ($grID,'$Name')";
	$result = $con->query($sql);
	
	$usrID = $_SESSION['u_id'];
	
	$sql = "INSERT INTO gr_us (`id_user`, `id_group`) VALUES ($usrID, $grID)";
	$result = $con->query($sql);
	
	header("Location: siteHTML_Page6.php");


	
?>