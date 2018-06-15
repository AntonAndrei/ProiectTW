<?php
   session_start();
   
?>
<html>
 <head>
  <title> E.T. Groups </title>
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
      <h2 class="cTitle"> GROUPS
      <h3 class="cText"> 
	                   Create, join or leave groups. Once you have joined a group
					   you can add and also see items in the lists of those specific
					   groups.</h3>
      </h2>
    </div>
  </span>
  </p>

  <div class="cBox" style="margin: 0 auto; padding-bottom: 6vh;">
  <h2 class="cTitle"> Your groups </h2>

  <table>
   <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Members</th>
	<th></th>
   </tr>
   <?php
   
   
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
		
			$usrID = $_SESSION['u_id'];
			$sql = "SELECT id_group FROM gr_us WHERE id_user = '$usrID';";
			$result = $con->query($sql);
			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc()) 
				{
				echo "<tr>";
				$grID = $row["id_group"];
				$sqll = "SELECT name FROM groups WHERE id = '$grID';";
				$resultt = $con->query($sqll);
				$roww = $resultt->fetch_assoc();
				$grName = $roww["name"];
				echo "<br>";
				echo "<th>$grID</th>";
				echo "<th>$grName</th>";
				$sqlll = "SELECT COUNT(id_user) FROM gr_us WHERE id_group = '$grID'
						  GROUP BY id_group;";
				$resulttt = $con->query($sqlll);
				$rowww = $resulttt->fetch_assoc();
				$grMem = $rowww["COUNT(id_user)"];
				echo "<th>$grMem</th>";
				$c_JG = '';
				$c_JG .= (string)$grID;
				echo "<th>
						<form action=\"leaveGroup.php\" method=\"leaveGroup\">
						<div class=\"cButton\" style=\"width:100px; margin: 0 auto; position:relative;\">
							<input type=\"submit\" name=\"$c_JG\" value=\"Leave\" id=\"submitButton\">
					    </div>
						</form>
				      </th>";
				echo "</tr>";
				}
			}
			else
			{
				echo "<p class='cError'> No groups joined. </p>";
			}	
   
   
   ?>
  </table>

  </div>


  <div class="cBox" style="margin: 0 auto; padding-bottom: 6vh;">
  <h2 class="cTitle"> Create new group </h2>
   <div style="width: 200px">
   <form action="newGroup.php" method="newGroup">
		<h1 class="cText">Name:</h1>
			<input type="text" id="name" name="name">
			<script>	
			var vUrl = window.location.href;
			if(vUrl.includes("name=error1"))
			{
				document.write("<p class='cError'> Name is missing. </p>");
			}
			else if(vUrl.includes("name=error2"))
			{
				document.write("<p class='cError'> Name is too long. </p>");
			}
			else if(vUrl.includes("name=error3"))
			{
				document.write("<p class='cError'> Name contains ' or \\ . </p>");
			}
		</script>
		<div class="cButton" style="width:100px; margin: 0 auto; position:relative; top:2vh;">
			<input type="submit" name="addNew" value="Add new" id="submitButton">
		</div>

   </div>
   </form>

  </div>

  
  <div class="cBox" style="margin: 0 auto; padding-bottom: 6vh;">
  <h2 class="cTitle"> Join a group </h2>
  <div style="width: 200px">
     <form action="joinGroup.php" method="joinGroup">
		<h1 class="cText">Group ID:</h1>
            <input type="number" name="ID" value="ID">
			<script>	
			var vUrl = window.location.href;
			if(vUrl.includes("grID=error1"))
			{
				document.write("<p class='cError'> ID is missing. </p>");
			}
			else if(vUrl.includes("grID=error2"))
			{
				document.write("<p class='cError'> Group does not exist. </p>");
			}
			else if(vUrl.includes("grID=error3"))
			{
				document.write("<p class='cError'> Already a member of this group. </p>");
			}
			else if(vUrl.includes("grID=error4"))
			{
				document.write("<p class='cError'> Already a member of this group. </p>");
			}
		</script>
		<div class="cButton" style="width:100px; margin: 0 auto; position:relative; top:2vh;">
			<input type="submit" name="join" value="Join" id="submitButton">
		</div>
		
		
   </div>
   </form>
   </div>

 </body>
</html>
