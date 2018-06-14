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
	
	
    if(1>0) // get ID
	{
		
	if (isset($_REQUEST['ID']))
	{
	  $grID = $_REQUEST['ID'];
	}
	
	if(!$grID)
	{
		header("Location: siteHTML_Page6.php?grID=error1");
		exit();
	}
	else if($grID)
	{
		
		$sql = "SELECT id FROM groups WHERE id = $grID;";
		
		$result = $con->query($sql);
		if ($result->num_rows < 1) 
		{
			header("Location: siteHTML_Page6.php?grID=error2");
			exit();
		}
		else if($grID == 0)
		{
			header("Location: siteHTML_Page6.php?grID=error4");
			exit();
		}
		else if($grID == 1000)
		{
			header("Location: siteHTML_Page6.php?grID=error2");
			exit();
		}
		else 
		{
			$usrID = $_SESSION['u_id'];
			$sql = "SELECT id_user FROM gr_us WHERE id_group = '$grID' AND id_user = '$usrID';";
			$result = $con->query($sql);
			if ($result->num_rows > 0) 
			{
			header("Location: siteHTML_Page6.php?grID=error3");
			exit();
			}
		}
		
	}
	
	}
	
	
	$usrID = $_SESSION['u_id'];
	$sql = "INSERT INTO gr_us (`id_user`, `id_group`) VALUES ($usrID, $grID)";
	$result = $con->query($sql);
	
	header("Location: siteHTML_Page6.php");

	
	
?>