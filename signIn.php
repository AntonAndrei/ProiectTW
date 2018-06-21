<?php

    session_start();
	$returnData = array();
	$returnData['success'] = 1;
	$returnData['error'] = 0;
	
	
	
	

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
	
	
	$Name = null;
	$Pass = null;

	if(1>0) // name
	{
		
	if (isset($_POST['name']))
	{
	  $Name = $_POST['name'];
	}
	if(!$Name)
	{
		$returnData['success'] = 0;
		$returnData['error'] = 11;
		echo json_encode($returnData);
		exit();
	}
	else if($Name)
	{
		$Name=(filter_var($Name, FILTER_SANITIZE_MAGIC_QUOTES)) ;
		$sql = "SELECT pass FROM users WHERE name = '$Name';";
		
		$result = $con->query($sql);
		if ($result->num_rows == 0) 
		{
			$returnData['success'] = 0;
			$returnData['error'] = 12;
			echo json_encode($returnData);
			exit();
		}
	}
	
	}

	
	if(1>0) // password
	{
	if (isset($_POST['pass']))
	{
	  $Pass = $_POST['pass'];
	}
	if(!$Pass)
	{
		$returnData['success'] = 0;
		$returnData['error'] = 21;
		echo json_encode($returnData);
		exit();
	}
	else if($Pass)
	{		

		if($row = mysqli_fetch_assoc($result))
		{
			$hashedPassCheck = password_verify($Pass, $row['pass']);
			if($hashedPassCheck == false)
			{
				$returnData['success'] = 0;
				$returnData['error'] = 22;
				echo json_encode($returnData);
				exit();
			}
			else if($hashedPassCheck == true)
			{
				$sql = "SELECT id, name FROM users WHERE name = '$Name';";
		
				$result = $con->query($sql);
				$row = mysqli_fetch_assoc($result);
				$_SESSION['u_id'] = $row['id'];
				$_SESSION['u_na'] = $row['name'];
				echo json_encode($returnData);
				exit();
			}
		}
	}
	
	}
		
	
	$returnData['success'] = 0;
	$returnData['error'] = 31;
	echo json_encode($returnData);
	exit();

?>