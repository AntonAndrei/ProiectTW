<?php
   session_start();
   
?>

<html>
 <head>
  <title> E.T. Add New </title>
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
      <h2 class="cTitle"> ADD NEW
      <h3 class="cText"> 
	                   You can add a new spending in any group you are a part of, or for your
					   own personal account. You can check the lists in the given tabs.</h3>
      </h2>
    </div>
  </span>
  </p>
  <div class="cBox" style="margin: 0 auto; padding-bottom: 6vh;">
   <div style="width: 200px">
   <form action="addNew.php" method="addNew.php">
    <h1 class="cText">Name:</h1>
      <input type="text" id="name" name="name">
      <?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "name=error1") == true)
		{
		  echo "<p class='cError'> Name is missing. </p>";
		}
		else if (strpos($fullUrl, "name=error2") == true)
		{
		  echo "<p class='cError'> Name is too long. </p>";
		}
		else if (strpos($fullUrl, "name=error3") == true)
		{
		  echo "<p class='cError'> Name contains ' or \ . </p>";
		}
	    ?>
	<h1 class="cText"> Select a group: </h1>
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
	  <?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "group=error") == true)
		{
		  echo "<p class='cError'> Group error. </p>";
		}
	    ?>
	</select>

    <h1 class="cText"> Select a category: </h1>
    <select name="category">
      <option value="others">Others</option>
      <option value="bills">Bills</option>
      <option value="food">Food</option>
      <option value="studies">Studies</option>
    </select>
	<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "category=error") == true)
		{
		  echo "<p class='cError'> Category error. </p>";
		}
	    ?>
    
    <h1 class="cText">Cost (in dollars) :</h1>
     <input type="number" step="0.01" name="cost" value="">
	<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "cost=error") == true)
		{
		  echo "<p class='cError'> Please input an amount. </p>";
		}
	    ?>
		
	<h2 class="cText">Date:</h2>
     <input type="date" name="date">
	 <?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "date=error") == true)
		{
		  echo "<p class='cError'> Please choose a date. </p>";
		}
	    ?>
		
    </div>
	
    <h3 class="cText">Observations:</h3>
    <div style="margin: 0 auto;">
      <textarea rows="4" cols="80" name="comment"> </textarea>
    </div>
	<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "obs=error") == true)
		{
		  echo "<p class='cError'> Observation is too long. </p>";
		}
	    ?>

	<div class="cButton" style="width:100px; margin: 0 auto; position:relative; top:2vh;">
         <input type="submit" name="addNew" value="Add new" id="submitButton">
    </div>
</form>
  </div>

 </body>
</html>
