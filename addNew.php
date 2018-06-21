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
		header("Location: siteHTML_Page1.php?name=error1");
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
			header("Location: siteHTML_Page1.php?name=error3");
			exit();
		}
	}
	
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

	if(1>0) // category
	{
	if (isset($_REQUEST['category']))
	{
	  $Category = $_REQUEST['category'];
	}
	else
	{
		header("Location: siteHTML_Page1.php?category=error");
		exit();
	}
	}

	if(1>0) // cost
	{
	if (isset($_REQUEST['cost']))
	{
	  $Cost = $_REQUEST['cost'];
	}
	
	if(!$Cost)
	{
		header("Location: siteHTML_Page1.php?cost=error1");
		exit();
	}
	
	}
	
	if(1>0) // date
	{
		
	if (isset($_REQUEST['date']))
	{
	  $Date = $_REQUEST['date'];
	}
	
	if(!$Date)
	{
		header("Location: siteHTML_Page1.php?date=error1");
		exit();
	}
	}
	
	if(1>0) // observations
	{
		
	$Obs = " ";
	
	if (isset($_REQUEST['comment']))
	{
	  $Obs = $_REQUEST['comment'];
	}

	
	if($Obs)
	{
		if(strlen($Obs)>364)
		{
			header("Location: siteHTML_Page1.php?obs=error");
			exit();
		}
	}
	
	}
		
	$expID = 0;
	$sql = "SELECT MAX(id) FROM spendings;";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
	$expID = $row["MAX(id)"];
	
	$expID = $expID + 1;
	
	$usrID = $_SESSION['u_id'];
	$newDate = date("Y-m-d", strtotime($Date));
	
	$Obs=(filter_var($Obs, FILTER_SANITIZE_MAGIC_QUOTES)) ;
	
	
	$sql = "INSERT INTO spendings VALUES ($expID ,$usrID ,$grID ,'$Category' ,'$Name' ,$Cost,'$newDate' ,'$Obs' );";
		
	$result = $con->query($sql);
	
	header("Location: siteHTML_Page1.php");

	
	
?>