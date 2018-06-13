<html>
 <head>
  <title> Project SE </title>
  <link rel="stylesheet" type="text/css" href="siteCSS.css">
 </head>
  <body>
  <?php
  
  if(isset($_SESSION['u_id']))
  {
	  header("Location: siteHTML_Home.php");
	  exit();
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
    <form action="siteHTML_Page2.html"> 
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Bills" id="topBar">
	</a>
	</form>
	<form action="siteHTML_Page3.html"> 
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Food" id="topBar">
	</a>
	</form>
	<form action="siteHTML_Page4.html"> 
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Studies" id="topBar">
	</a>
	</form>
	<form action="siteHTML_Page5.html">  
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Others" id="topBar">
	</a>
	</form>
	<form action="siteHTML_Page6.html"> 
	<a style="background-color: rgba(100,28,28,0); padding: 0px 0px;  text-align: justify;">
    <input type="submit" value="Groups" id="topBar">
	</a>
	</form>
	<form action="siteHTML_Home.php">
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
	                   On this page you can add new elements to the given lists.
                       Each element will have a name, a cost, a date and an observations tab.
                       In order to select in which list the element will be added, a drop down
                       tab will be used inside the html code. </h3>
      </h2>
    </div>
  </span>
  </p>
  <div class="cBox" style="margin: 0 auto; padding-bottom: 6vh;">
   <div style="width: 200px">

   <h1 class="cText">Name:</h1>
            <input type="text" id="name" name="name">

	<h1 class="cText"> Select a group: </h1>
    <select>
    <option value="personal">Personal</option>
    <option value="family">Family</option>
    <option value="work">Work</option>
    <option value="birthday party">Birthday party</option>
    </select>

    <h1 class="cText"> Select a category: </h1>
    <select>
    <option value="others">Others</option>
    <option value="bills">Bills</option>
    <option value="food">Food</option>
    <option value="studies">Studies</option>
    </select>
    
    <h1 class="cText">Cost:</h1>
            <input type="number" name="cost" value="">
	
	<h2 class="cText">Date:</h2>
     <input type="date" name="bday">

   </div>
   <h3 class="cText">Observations:</h3>
   <div style="margin: 0 auto;">
    <textarea rows="4" cols="80" name="comment" form="usrform">
    </textarea>

	</div>

	<div class="cButton" style="width:100px; margin: 0 auto; position:relative; top:2vh;">
         <a href="siteHTML_Page1.html">Add</a>
    </div>

  </div>

  <div class="cBox" style=" margin: 0 auto; top:2vh; position: relative;">
  <h1 class="cTitle" style="font-size: 1.5vh; margin: 0 auto;"> ////////////////////////!// This is a mockup "account" //!//////////////////////// </h1>
  </div>
 </body>
</html>
