<?php
   session_start();
   
?>
<html>
 <head>
  <title> Project SE </title>
  <link rel="stylesheet" type="text/css" href="siteCSS.css">
 </head>
 <body>
  <?php
  if(!isset($_SESSION['u_id']))
  {
	  header("Location: siteHTML_Home.php");  
  }
  ?>
   <div class="cTopBar">
    <form>
	</form>
    <form action="siteHTML_Page1.php"> 
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Add new" id="topBar">
	</a>
	</form>
    <form action="siteHTML_Page2.php"> 
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Bills" id="topBar">
	</a>
	</form>
	<form action="siteHTML_Page3.php"> 
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Food" id="topBar">
	</a>
	</form>
	<form action="siteHTML_Page4.php"> 
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Studies" id="topBar">
	</a>
	</form>
	<form action="siteHTML_Page5.php">  
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Others" id="topBar">
	</a>
	</form>
	<form action="siteHTML_Page7.php">  
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Statistics" id="topBar">
	</a>
	</form>
	<form action="siteHTML_Page6.php"> 
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Groups" id="topBar">
	</a>
	</form>
	<form action="signOut.php" method="signOut">
	<a style="background-color: rgba(100,28,28,0); float:right; padding: 0px 0px;  text-align: justify;">
	<input style="float:right" type="submit" value="Sign Out" id="topBar">
	</a>
	</form>
	
   </div>
   <p> 
   <span>
    <div class="cBox" style="margin: 0 auto;">
    <h2 class="cTitle"> OTHERS
    <h3 class="cText"> Track various expenses that do not fit in the other
						categories.
					   </h3>
    </h2>
    </div>

  </span>
  </p>

      <div class="cBox" style="margin: 0 auto; padding-bottom: 6vh;">
		<div style="width:250px; float: left;">
		<h1 class="cText"> Select a group: </h1>
		<form action="listExp.php" method="listExp">
		<select name="group">
		<option value="personal">Personal</option>
		<?php
	 
		echo "<br> PHP WORKS";
	  
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
	
		$user_id = $_SESSION['u_id'];
			
		$sql = "SELECT id_user, id_group FROM gr_us WHERE id_user = $user_id;";
		$result = mysqli_query($con,$sql);
		if($result = mysqli_query($con,$sql))
		{
			while ($row = mysqli_fetch_row($result))
			{
				$group_id = $row[1];
				$sqll = "SELECT name FROM groups WHERE id = $group_id ;" ;
				$resultt = mysqli_query($con,$sqll);
				if($resultt = mysqli_query($con,$sqll))
				{
					while ($roww = mysqli_fetch_row($resultt))
					{
						$name = $roww[0];
						echo $name;
						echo "<option value=\"$name\">$name</option>";	
					}
				}
			}
		}
	  
	?>
		</select>
		</div>
		<div class="cButton" style="width:100px; background-color: rgba(0,0,0,0); 
			 margin: 0 auto; position:relative; float:left;
			 top:  4.7vh; left: 10px;">
			<input type="submit" name="show" value="Show" id="submitButton">
		</div>
		</form>
	</div>

  <div class="cBox" style="margin: 0 auto; height: 14vh;">
  </div>
  
  <div class="cBox" style="margin: 0 auto">
  <h2 class="cTitle">Expenses
  </h2>
  <table>
   <?php
   
	error_reporting(0);
	ini_set('display_errors', 0);
	
	$con = mysqli_connect('127.0.0.1','root','','trex');
	if(!$con)
	{
		echo "<p class='cError'> Connection to server failed. </p>";
		exit();
	}
	if(!mysqli_select_db($con,'trex'))
	{
		echo "<p class='cError'> Database not selected. </p>";
		exit();
	}
	
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$Group = '';
		$urlLen = strlen($fullUrl);
		$i = $urlLen;
		if($fullUrl[$i-1]=='?')
		{
			$Group = 'srehto';
		}
		else while($fullUrl[$i]!='?')
		{
			$Group .= $fullUrl[$i];
			$i = $i - 1;
		}
		$Group = strrev ($Group);
		
			$usrID = $_SESSION['u_id'];
			$sql = "SELECT id FROM groups WHERE name = '$Group';";
			$result = $con->query($sql);
			$row = $result->fetch_assoc();
			$grID = $row["id"];
			
			if (strpos($Group, "others") == true)
			{
				$grID = 0;
			}
			if($grID == 0)
			{
				$sql = "SELECT name, user_id, cost, date, obs FROM spendings 
						WHERE group_id = $grID AND category = 'others'
						AND user_id = $usrID;";
				$result = $con->query($sql);
				if ($result->num_rows > 0)
				{
					echo "<tr>
						<th width=\"15%\";>Name</th>
						<th width=\"15%\";>Cost</th>
						<th width=\"15%\";>Date</th>
						<th>Observations</th>
						</tr>";
					while($row = $result->fetch_assoc()) 
					{
						
						$eName = $row["name"];
						$eCost = $row["cost"];
						$eDate = $row["date"];
						$eObs = $row["obs"];		
					
					echo "<tr>";
					echo "<th>$eName</th>";
					echo "<th>$eCost \$</th>";
					echo "<th>$eDate</th>";
					echo "<th>$eObs</th>";
					echo "</tr>";
					}
				}
				else
				{
					echo "<p class='cTitle'> No expenses to show. </p>";
				}
			}
			else
			{
				
				$sql = "SELECT name, user_id, cost, date, obs FROM spendings 
						WHERE group_id = $grID AND category = 'others';";
				$result = $con->query($sql);
				if ($result->num_rows > 0)
				{
					echo "<tr>
						<th width=\"15%\";>User</th>
						<th width=\"15%\";>Name</th>
						<th width=\"15%\";>Cost</th>
						<th width=\"15%\";>Date</th>
						<th>Observations</th>
						</tr>";
					while($row = $result->fetch_assoc()) 
					{
						
						$eName = $row["name"];
						$eCost = $row["cost"];
						$eDate = $row["date"];
						$eObs = $row["obs"];
						$eUsrID = $row["user_id"];
					
					$sqll = "SELECT name FROM users WHERE
							 id = $eUsrID;";
					$resultt = $con->query($sqll);
					$roww = $resultt->fetch_assoc();
					$eUsrName = $roww["name"];
					
					echo "<tr>";
					echo "<th>$eUsrName</th>";
					echo "<th>$eName</th>";
					echo "<th>$eCost \$</th>";
					echo "<th>$eDate</th>";
					echo "<th>$eObs</th>";
					echo "</tr>";
					}
				}
				else
				{
					echo "<p class='cTitle'> No expenses to show. </p>";
				}
			}	
   
   
   ?>
   
   
   
  </table>
  </div>


 </body>
</html>
