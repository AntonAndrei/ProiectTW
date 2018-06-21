<?php
   session_start();
   
?>

<html>
 <head>
  <title> E.T. Statistics </title>
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
	
	echo "<form action=\"siteHTML_Page8.php\">
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
      <h2 class="cTitle"> Statistics
      <h3 class="cText">  </h3>
      </h2>
    </div>
  </span>
  </p>
  
  <div id="options" class="cBox" style="margin: 0 auto; padding-bottom: 6vh; height: 20px">

   <div  style="width:250px; float: left;">
   <form action="statsShow.php" method="statsShow">
   
	<h1 class="cText"> Select a month: </h1>
    <select id="month" name="month">
	  <option value="01">January</option>
	  <option value="02">February</option>
	  <option value="03">March</option>
	  <option value="04">April</option>
	  <option value="05">May</option>
	  <option value="06">June</option>
	  <option value="07">July</option>
	  <option value="08">August</option>
	  <option value="09">September</option>
	  <option value="10">October</option>
	  <option value="11">November</option>
	  <option value="12">December</option>
	 </select>
	 <script>	
			var vUrl = window.location.href;
			if(vUrl.includes("date=error"))
			{
				document.write("<p class='cError'> Please choose a date. </p>");
			}
		</script>
	</div>
	
	

	<div class="cButton" style="width:160px; background-color: rgba(0,0,0,0); 
			 margin: 0 auto; position:relative; float:left;
			 top:  4.7vh; left: 10px;">
         <input type="submit" name="showStats" value="Show Statistics" id="submitButton">
    </div>

	 

	</form>
	</div>
	
	
	<div class="cBox" style="margin: 0 auto; height: 4vh;">
	</div>
	
     <div class="cBox" id="divToDownload" style="margin: 0 auto; background-color: rgba(0,0,0,0); padding-bottom: 3vh;">
	 <div style="background-color: rgba(28,28,28,0.4);
          width:80vh;
		  overflow: visible; margin: 0 auto; padding-top: 6vh;">
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
		$Category = '';
		$Month = '';
		$urlLen = strlen($fullUrl);
		$i = $urlLen;
		if($fullUrl[$i-1]=='?')
		{
			$Month = '10';
		}
		else while($fullUrl[$i]!='?')
		{
			$Month .= $fullUrl[$i];
			$i = $i - 1;
		}
		$Month = strrev ($Month);
		
		$sMonth = "";
		
		if(1>0) //month
		{
			if (strpos($Month, "01") !== false) { $sMonth = "January"; }
			if (strpos($Month, "02") !== false) { $sMonth = "February"; }
			if (strpos($Month, "03") !== false) { $sMonth = "March"; }
			if (strpos($Month, "04") !== false) { $sMonth = "April"; }
			if (strpos($Month, "05") !== false) { $sMonth = "May"; }
			if (strpos($Month, "06") !== false) { $sMonth = "June"; }
			if (strpos($Month, "07") !== false) { $sMonth = "July"; }
			if (strpos($Month, "08") !== false) { $sMonth = "August"; }
			if (strpos($Month, "09") !== false) { $sMonth = "September"; }
			if (strpos($Month, "10") !== false) { $sMonth = "October"; }
			if (strpos($Month, "11") !== false) { $sMonth = "November"; }
			if (strpos($Month, "12") !== false) { $sMonth = "December"; }
			
		}
		
			$usrID = $_SESSION['u_id'];
			
		$sql = "SELECT name, cost, MAX(cost), date, obs FROM spendings 
			WHERE group_id = 0 AND user_id = $usrID
			AND EXTRACT(MONTH FROM date) = $Month 
			GROUP BY id ORDER BY cost DESC";
		
		$result = $con->query($sql);
				
		if ($result->num_rows > 0)
		{
				$counter = 0;
				$avgCost = 0.00;
				$totalCost = 0.00;
				$showedMax = false;
				while($row = $result->fetch_assoc()) 
				{
					$eCost = $row["cost"];
					$maxCost = $row["MAX(cost)"];
					$counter = $counter + 1;
					$totalCost = $totalCost + $eCost;
					if($eCost == $maxCost AND $showedMax == false)
					{
						$showedMax = true;
						$eName = $row["name"];
						$eDate = $row["date"];
						$eObs = $row["obs"];
						echo "<table style=\"background-color: rgba(0,0,0,0.2);
    font-family: arial, sans-serif;
	color: white;
    border-collapse: collapse;
    width: 100%;
	border: 1px solid white;\">";
						echo "<tr>";
						echo "<th> Most expensive item in the month of $sMonth : </th>";
						echo "</tr>";
						echo "</table>";
						echo "<table style=\"background-color: rgba(0,0,0,0.2);
    font-family: arial, sans-serif;
	color: white;
    border-collapse: collapse;
    width: 100%;
	border: 1px solid white;\">";
						echo "<tr>";
						echo "<th>$eName</th>";
						echo "<th>$eCost \$</th>";
						echo "<th>$eDate </th>";
						echo "<th>$eObs </th>";
						echo "</tr>";
						echo "</table>";								
					}
				}
				$avgCost = $totalCost / $counter;
				echo "<table style=\"background-color: rgba(0,0,0,0.2);
    font-family: arial, sans-serif;
	color: white;
    border-collapse: collapse;
    width: 100%;
	border: 1px solid white;\">";
				echo "<tr>";
				echo "<th>Number of items</th>";
				echo "<th width=\"38%\">Average</th>";
				echo "<th width=\"38%\">Total</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<th>$counter </th>";
				echo "<th>$avgCost \$</th>";
				echo "<th>$totalCost \$</th>";
				echo "</tr>";
				echo "</table>";	
		}
		else
		{
			echo "<table style=\"background-color: rgba(0,0,0,0.2);
    font-family: arial, sans-serif;
	color: white;
    border-collapse: collapse;
    width: 100%;
	border: 1px solid white;\">";
			echo "<tr>";
			echo "<th> Nothing personal to show in the month of $sMonth. </th>";
			echo "</tr>";
			echo "</table>";
		}
	  
			echo"<table style=\"background-color: rgba(0,0,0,0);font-family: arial, sans-serif;
	color: white;
    border-collapse: collapse;
    width: 100%;
	border: 1px solid white;\">
				<tr>
				<td height=\"60\" style=\"border: 1px solid rgba(1,1,1,0)\"> </td>
				</tr>
				</table>";
		
		$sql = "SELECT id_user, id_group FROM gr_us WHERE id_user = $usrID";
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
						$grName = $roww[0];
					}
				}
				$sqlll = "SELECT name, cost, MAX(cost), date, obs FROM spendings 
						WHERE group_id = $group_id
						AND EXTRACT(MONTH FROM date) = $Month 
						GROUP BY id ORDER BY cost DESC";
		
						$resulttt = $con->query($sqlll);
				
				if ($resulttt->num_rows > 0)
				{
					$showedMax = false;
					$showedMax = false;
					$counter = 0;
					$avgCost = 0.00;
					$totalCost = 0.00;
					while($rowww = $resulttt->fetch_assoc()) 
					{	
						$eCost = $rowww["cost"];
						$maxCost = $rowww["MAX(cost)"];
						
						$counter = $counter + 1;
						$totalCost = $totalCost + $eCost;
						
						if($eCost == $maxCost AND $showedMax == false)
						{
							$showedMax = true;
							$showedMax = true;
							$eName = $rowww["name"];
							$eDate = $rowww["date"];
							$eObs = $rowww["obs"];
							echo "<table style=\"background-color: rgba(0,0,0,0.2);
    font-family: arial, sans-serif;
	color: white;
    border-collapse: collapse;
    width: 100%;
	border: 1px solid white;\">";
							echo "<tr>";
							echo "<th> Most expensive item in the $grName category , in the month of $sMonth : </th>";
							echo "</tr>";
							echo "</table>";
							echo "<table style=\"background-color: rgba(0,0,0,0.2);
    font-family: arial, sans-serif;
	color: white;
    border-collapse: collapse;
    width: 100%;
	border: 1px solid white;\">";
							echo "<tr>";
							echo "<th>$eName</th>";
							echo "<th>$eCost \$</th>";
							echo "<th>$eDate </th>";
							echo "<th>$eObs </th>";
							echo "</tr>";
							echo "</table>";								
						}
					}
							$avgCost = $totalCost / $counter;
							echo "<table style=\"background-color: rgba(0,0,0,0.2);
    font-family: arial, sans-serif;
	color: white;
    border-collapse: collapse;
    width: 100%;
	border: 1px solid white;\">";
							echo "<tr>";
							echo "<th width=\"50%\">Average</th>";
							echo "<th>Total</th>";
							echo "</tr>";
							echo "<tr>";
							echo "<th>$avgCost $ </th>";
							echo "<th>$totalCost $ </th>";
							echo "</tr>";
							echo "</table>";	
				}
				echo"<table style=\"background-color: rgba(0,0,0,0)font-family: arial, sans-serif;
	color: white;
    border-collapse: collapse;
    width: 100%;
	border: 1px solid white;\">
				<tr>
				<td height=\"60\" style=\"border: 1px solid rgba(1,1,1,0)\"> </td>
				</tr>
				</table>";
			}
		}
		
					
   ?>
	</div>
	</div>
	
	
	<script>
	if(1>0){
	var vUrl = window.location.href;
			if(vUrl.includes("?01"))
			{
				month = "January";
			} else if(vUrl.includes("?02"))
			{
				month = "February";
			} 
			else if(vUrl.includes("?03"))
			{
				month = "March";
			} 
			else if(vUrl.includes("?04"))
			{
				month = "April";
			} 
			else if(vUrl.includes("?05"))
			{
				month = "May";
			} 
			else if(vUrl.includes("?06"))
			{
				month = "June";
			} 
			else if(vUrl.includes("?07"))
			{
				month = "July";
			} 
			else if(vUrl.includes("?08"))
			{
				month = "August";
			} 
			else if(vUrl.includes("?09"))
			{
				month = "September";
			} 
			else if(vUrl.includes("?10"))
			{
				month = "October";
			} 
			else if(vUrl.includes("?11"))
			{
				month = "November";
			} 
			else if(vUrl.includes("?12"))
			{
				month = "December";
			} 
			
	}
	var a = document.getElementById("options").appendChild(document.createElement("a"));
	a.download = month+"_list.html";
	a.href = "data:text/html," + document.getElementById("divToDownload").innerHTML;
	a.innerHTML = "<div class=\"cButton\" style=\"background-color: rgba(28,28,28,0.4); width:180px; height: 0px; float:right; position:relative; margin: 0 auto; top: 54px; \"><a style=\"font-size: 17px;\">Download HTML</a></div>"
	</script>
	

	
 </body>
</html>
