<?php
   session_start();
?>

<html>
 <head>
  <title>Expenses Tracker</title>
  <link rel="stylesheet" type="text/css" href="siteCSS.css">
 </head>
 <body style="position: fixed; width: 50vw; height: 100vh; left: 21vw;">


 <div style="list-style-type: none; width:220px; position: relative; margin: 0 auto; top:20%;">

       <div style=" position: relative; top: 4vh; left:52px;"> 
	    <img src="userIconDefault.png" height=192px width=192px style="position: relative; z-index:1; ">
	   </div>
	<div class="cButton" style="width:220px; padding: 40px; padding-top: 80px; ">
      <form action="signIn.php" method="signIn" >
         <div style="color:white; position:relative; left:37%; font-size: 20px;">Name</div>
         <input type="text" id="name" name="name"><br>
		 <?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "name=error1") == true)
		{
		  echo "<p class='cError'> Username field is empty. </p>";
		}
		else if (strpos($fullUrl, "name=error2") == true)
		{
		  echo "<p class='cError'> Username does not exist. </p>";
		}
	    ?>
         <div style="color:white; position:relative; left:29%; font-size: 20px;">Password</div>
            <input type="password" id="pass" name="pass"><br>
			<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "pass=error1") == true)
		{
		  echo "<p class='cError'> Password field is empty. </p>";
		}
		else if (strpos($fullUrl, "pass=error2") == true)
		{
		  echo "<p class='cError'> Password is incorrect. </p>";
		}
	    ?>
			<input class="cButton" type="submit" value="Sign In" id="submitButton">
			</form>
       <div class="cButton" style="width:220px; position:relative; ">
         <a href="siteHTML_Signup.php">Sign Up</a>
       </div>
	</div>
 </div>



 </body>
</html>
