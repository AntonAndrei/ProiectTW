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
	
	$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$usrID = $_SESSION['u_id'];
		$sql = "SELECT id_group FROM gr_us WHERE id_user = '$usrID';";
		$result = $con->query($sql);
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
				{
				$grID = $row["id_group"];
				if (strpos($fullUrl, "$grID") == true)
					{
						$sqll = "DELETE FROM gr_us WHERE id_group = $grID AND id_user = $usrID;";
						$resultt = $con->query($sqll);
						
						$sqlll = "SELECT COUNT(id_user) FROM gr_us WHERE id_group = '$grID'
								  GROUP BY id_group;";
						$resulttt = $con->query($sqlll);
						$rowww = $resulttt->fetch_assoc();
						$grMem = $rowww["COUNT(id_user)"];
						if($grMem < 1)
						{
							$sqlll = "DELETE FROM spendings WHERE group_id = $grID";
							$resulttt = $con->query($sqlll);
							$sqlll = "DELETE FROM groups WHERE id = $grID";
							$resulttt = $con->query($sqlll);
						}
						header("Location: siteHTML_Page6.php");
						exit();
					}
				}
		}
	
?>