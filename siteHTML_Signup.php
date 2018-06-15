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
			<script>
			
			var vUrl = window.location.href;
			if(vUrl.includes("name=error1"))
			{
				document.write("<p class='cError'> Username field is empty. </p>");
			}
			else if(vUrl.includes("name=error2"))
			{
				document.write("<p class='cError'> Username is already taken. </p>");
			}
			else if(vUrl.includes("name=error3"))
			{
				document.write("<p class='cError'> Username can not contain spaces. </p>");
			}
			else if(vUrl.includes("name=error4"))
			{
				document.write("<p class='cError'> Username is too long. </p>");
			}
			else if(vUrl.includes("name=error5"))
			{
				document.write("<p class='cError'> Username contains ' or \\ . </p>");
			}
				
			</script>
		 <h1 class="cText">Email:</h1>
            <input type="text" id="email" name="email">
			<script>
			
			var vUrl = window.location.href;
			if(vUrl.includes("email=error1"))
			{
				document.write("<p class='cError'> Email field is empty. </p>");
			}
			else if(vUrl.includes("email=error2"))
			{
				document.write("<p class='cError'> Email has already been used. </p>");
			}
			else if(vUrl.includes("email=error3"))
			{
				document.write("<p class='cError'> Email is invalid. </p>");
			}
				
			</script>
         <h1 class="cText">Password:</h1>
            <input type="password" id="pass" name="pass">
			<script>
			var vUrl = window.location.href;
			if(vUrl.includes("pass=error1"))
			{
				document.write("<p class='cError'> Password field is empty. </p>");
			}
			else if(vUrl.includes("pass=error2"))
			{
				document.write("<p class='cError'> Password needs to be at least 6 characters long. </p>");
			}
			else if(vUrl.includes("pass=error3"))
			{
				document.write("<p class='cError'> Password can not contain spaces. </p>");
			}
			else if(vUrl.includes("pass=error4"))
			{
				document.write("<p class='cError'> Password contains ' or \ . </p>");
			}
			</script>
		
         <h1 class="cText">Repeat password:</h1>
            <input type="password" id="rePass" name="rePass">
			<script>
			
			var vUrl = window.location.href;
			if(vUrl.includes("rep=error1"))
			{
				document.write("<p class='cError'> Repeat the password. </p>");
			}
			else if(vUrl.includes("rep=error2"))
			{
				document.write("<p class='cError'> Passwords do not match. </p>");
			}
				
			</script>
         <input type="submit" value="Sign Up" id="submitButton">
	</form>

   </div>
       
  </div>

  <div class="cBox" style=" margin: 0 auto; top:2vh; position: relative;">
  </div>
 </body>
</html>
