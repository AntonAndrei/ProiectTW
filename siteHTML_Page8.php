<?php
   session_start();
   
?>
<html>
 <head>
  <title> E.T. Food</title>
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
	<?php
	
	$usrName = $_SESSION['u_na'];
	
	echo "<form>
	<a style=\"background-color: rgba(100,28,28,0); float:right; padding: 0px 0px;  text-align: justify;\">
	<input style=\"float:right\" type=\"submit\" value=\"$usrName\" id=\"topBar\">
	</a>
	</form>
	"
	?>
	
   </div>
   <p> 
   <span>
    <div class="cBox" style="margin: 0 auto;">
	 <?php
	 $name =  $_SESSION['u_na'];
	 echo "<h2 class=\"cTitle\"> $name</h2>";
	 ?>
    </h2>
    </div>

  </span>
  </p>

      <div class="cBox" style="margin: 0 auto; padding-bottom: 6vh;">
	  </div>
  
  <div class="cBox" style="margin: 0 auto">
  <h2 class="cTitle">All your expenses:
  </h2>
  <table>
   <?php
   
	error_reporting(0);
	ini_set('display_errors', 0);
	
	$usrID =  $_SESSION['u_id'];
	
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
	
			$Total = 0.00;
			
			$sql = "SELECT id_group FROM gr_us WHERE id_user = $usrID";
			$result = mysqli_query($con,$sql);
			if($result = mysqli_query($con,$sql))
			{
			echo "<tr>
						<th width=\"10%\";>Group</th>
						<th width=\"10%\";>Category</th>
						<th width=\"20%\";>Name</th>
						<th width=\"15%\";>Cost</th>
						<th width=\"15%\";>Date</th>
						<th>Observations</th>
						</tr>";
			while ($row = mysqli_fetch_row($result))
			{
				$group_id = $row[0];
				
				$sql2 = "SELECT name FROM groups WHERE id = $group_id ;";
				$result2 = mysqli_query($con,$sql2);
				if($result2 = mysqli_query($con,$sql2))
				{
				while ($row2 = mysqli_fetch_row($result2))
				{
					$group_name= $row2[0];
					
					$sql3 = "SELECT category, name, cost, date, obs FROM spendings 
						WHERE group_id = $group_id AND user_id = $usrID ORDER BY category, date, cost DESC;";
				$result3 = $con->query($sql3);
				if ($result3->num_rows > 0)
				{
	
					while($row3 = $result3->fetch_assoc()) 
					{
						$eCategory = $row3["category"];
						$eName = $row3["name"];
						$eCost = $row3["cost"];
						$eDate = $row3["date"];
						$eObs = $row3["obs"];
						$eUsrID = $row3["user_id"];
						$Total = $Total + $eCost;
						
					echo "<tr>";
					echo "<th>$group_name</th>";
					echo "<th>$eCategory</th>";
					echo "<th>$eName</th>";
					echo "<th>$eCost \$</th>";
					echo "<th>$eDate</th>";
					echo "<th>$eObs</th>";
					echo "</tr>";
					}
					
					
				}
						
				}
			}
			}
			}
			else
				{
					echo "<p class='cTitle'> No group to show. </p>";
				}
				
			$sql4 = "SELECT category, name, cost, date, obs FROM spendings 
						WHERE group_id = 0 AND user_id = $usrID ORDER BY category, date, cost DESC;";
				$result4 = $con->query($sql4);
				if ($result4->num_rows > 0)
				{
	
					while($row4 = $result4->fetch_assoc()) 
					{
						$eCategory = $row4['category'];
						$eName = $row4["name"];
						$eCost = $row4["cost"];
						$eDate = $row4["date"];
						$eObs = $row4["obs"];
						$eUsrID = $row4["user_id"];
						$Total = $Total + $eCost;
						
					echo "<tr>";
					echo "<th>Personal</th>";
					echo "<th>$eCategory</th>";
					echo "<th>$eName</th>";
					echo "<th>$eCost \$</th>";
					echo "<th>$eDate</th>";
					echo "<th>$eObs</th>";
					echo "</tr>";
					}
					
					
				}
				else
					{
					echo "<p class='cTitle'> No personal expenses to show. </p>";
				}
			echo " </table> ";
					echo "<table>";
					echo "<tr>
						<th width=\"10%\";>Total:</th>
						<th>$Total \$</th>
						</tr> </table>";
   
   
   ?>
   
   
  
  </div>
 </body>
</html>