<?php

    session_start();

	$con = mysqli_connect('127.0.0.1','root','','trex');
	if(!$con)
	{
		header("refresh:5; url=siteHTML_Home.php");
		exit("Connection to server failed");
	}
	if(!mysqli_select_db($con,'trex'))
	{
		header("refresh:5; url=siteHTML_Home.php");
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
		header("Location: siteHTML_Home.php?name=error1");
		exit();
	}
	else if($Name)
	{
		$sql = "SELECT pass FROM users WHERE name = '$Name';";
		
		$result = $con->query($sql);
		if ($result->num_rows == 0) 
		{
			header("Location: siteHTML_Home.php?name=error2");
			exit();
		}
	}
	
	}
	
	if(1>0) // password
	{
	if (isset($_REQUEST['pass']))
	{
	  $Pass = $_REQUEST['pass'];
	}
	if(!$Pass)
	{
		header("Location: siteHTML_Home.php?pass=error1");
		exit();
	}
	else if($Pass)
	{		

		if($row = mysqli_fetch_assoc($result))
		{
			$hashedPassCheck = password_verify($Pass, $row['pass']);
			if($hashedPassCheck == false)
			{
				header("Location: siteHTML_Home.php?pass=error2");
				exit();
			}
			else if($hashedPassCheck == true)
			{
				$sql = "SELECT id, name FROM users WHERE name = '$Name';";
		
				$result = $con->query($sql);
				$row = mysqli_fetch_assoc($result);
				
				$_SESSION['u_id'] = $row['id'];
				$_SESSION['u_na'] = $row['name'];

				header("Location: siteHTML_Page1.php");
				exit();
			}
		}
	}
	
	}
		

	header("Location: siteHTML_Home.php?login=error");

?>