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
	    <img src="userIconDefault.png" height="192px" width="192px" style="position: relative; z-index:1; ">
	   </div>
	<div class="cButton" style="width:220px; padding: 40px; padding-top: 80px; ">
         <div style="color:white; position:relative; left:37%; font-size: 20px;">Name</div>
         <input type="text" id="name" name="name"><br>
		 <div id="nameErrorDiv"><br><br></div>
		 <script>
		 
			function errorJS(){
				
			var error = null;
			var success = null;
			
			name = document.getElementById('name').value;
			pass = document.getElementById('pass').value;
	
			xhr = new XMLHttpRequest();

			xhr.open('POST', 'signIn.php');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
			if (xhr.status !== 200) {
				alert(' Request failed.  Returned status of ' + xhr.status + '\n Stop spamming that button!');
			}
			else
			{
			returnData = JSON.parse(xhr.responseText);
			error = returnData.error;	
			success = returnData.success;
			
			var vUrl = window.location.href;
			if(error == 11){
			document.getElementById("nameErrorDiv").innerHTML="<p class='cError'>Name field is empty.</p>";
			document.getElementById("passErrorDiv").innerHTML="<br><br>";
			} else if (error == 12){
				document.getElementById("nameErrorDiv").innerHTML="<p class='cError'>User does not exist.</p>";
				document.getElementById("passErrorDiv").innerHTML="<br><br>";
			} else if (error == 21){
				document.getElementById("passErrorDiv").innerHTML="<p class='cError'>Password field is empty.</p>";
				document.getElementById("nameErrorDiv").innerHTML="<br><br>";
			} else if (error == 22){
				document.getElementById("passErrorDiv").innerHTML="<p class='cError'>Password is wrong.</p>";
				document.getElementById("nameErrorDiv").innerHTML="<br><br>";
			}
			else if (error > 30)
			{
				document.getElementById("passErrorDiv").innerHTML="<p class='cError'>Unknown error.</p>";
				document.getElementById("nameErrorDiv").innerHTML="<p class='cError'>Unknown error.</p>";
			}
			else if (error == 0 && success == 1)
			{
				window.location.replace("http://localhost/Project%20ET/siteHTML_Page1.php");
			}
				
			}
			}
			xhr.send(encodeURI('name=' + name + '&pass=' + pass));
			};
			
			</script>
         <div style="color:white; position:relative; left:29%; font-size: 20px;">Password</div>
            <input type="password" id="pass" name="pass"><br>
			<div id="passErrorDiv"><br><br></div>
			<div id="extraErrorDiv"></div>
			
			<div class="cButton" style="width:220px; position:relative; ">
				<button style="width:220px; position:relative;" onclick="errorJS()">Sign In</button>
			</div>
       <div class="cButton" style="width:220px; position:relative; ">
         <a style="font-size: 18px;" href="siteHTML_Signup.php">Sign Up</a>
       </div>
	</div>
 </div>



 </body>
</html>
