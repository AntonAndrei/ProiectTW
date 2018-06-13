<html>
 <head>
  <title> E.T. Sign Up </title>
  <link rel="stylesheet" type="text/css" href="siteCSS.css">
 </head>
  <body style=" width: 98vw; height: 100vh;">
   <div class="cTopBar">
    <a style="float:right" href="siteHTML_home.php">Sign in</a>
   </div>
   <p> 
   <span>
    <div class="cBox" style="margin: 0 auto;">
      <h2 class="cTitle"> Sign up
      <h3 class="cText"> 
	                   Please fill the fields in order to create a new E.T. account.       
					   </h3>
      </h2>
    </div>
  </span>
  </p>
  <div class="cBox" style="margin: 0 auto; padding-bottom: 4vh;">
  <div style="width: 200px">
   <form action="signUp.php" method="signUp" >
         <h1 class="cText">Username:</h1>
            <input type="text" id="name" name="name">
			<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "name=error1") == true)
		{
		  echo "<p class='cError'> Username field is empty. </p>";
		}
		else if (strpos($fullUrl, "name=error2") == true)
		{
		  echo "<p class='cError'> Username is already taken. </p>";
		}
		else if (strpos($fullUrl, "name=error3") == true)
		{
		  echo "<p class='cError'> Username can not contain spaces. </p>";
		}
	    ?>
		 <h1 class="cText">Email:</h1>
            <input type="text" id="email" name="email">
			<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "email=error1") == true)
		{
		  echo "<p class='cError'> Email field is empty. </p>";
		}
		else if (strpos($fullUrl, "email=error2") == true)
		{
		  echo "<p class='cError'> Email has already been used. </p>";
		}
		else if (strpos($fullUrl, "email=error3") == true)
		{
		  echo "<p class='cError'> Email is invalid. </p>";
		}
	    ?>
         <h1 class="cText">Password:</h1>
            <input type="password" id="pass" name="pass">
			<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "pass=error1") == true)
		{
		  echo "<p class='cError'> Password field is empty. </p>";
		}
		else if (strpos($fullUrl, "pass=error2") == true)
		{
		  echo "<p class='cError'> Password needs to be at least 6 characters long. </p>";
		}
		else if (strpos($fullUrl, "pass=error3") == true)
		{
		  echo "<p class='cError'> Password can not contain spaces. </p>";
		}
	    ?>
         <h1 class="cText">Repeat password:</h1>
            <input type="password" id="rePass" name="rePass">
			<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "rep=error1") == true)
		{
		  echo "<p class='cError'> Repeat the password. </p>";
		}
		else if (strpos($fullUrl, "rep=error2") == true)
		{
		  echo "<p class='cError'> Passwords do not match. </p>";
		}
	    ?>
         <input type="submit" value="Sign Up" id="submitButton">
	</form>

   </div>
       
  </div>

  <div class="cBox" style=" margin: 0 auto; top:2vh; position: relative;">
  </div>
 </body>
</html>
