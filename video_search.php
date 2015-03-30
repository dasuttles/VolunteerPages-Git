<?php
include("include/session.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Valdosta State University Video Project | Search Page</title>
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<?php
/* User is not logged in */
if(!$session->logged_in){
?>

<body>
<h2><strong>You must <a href="main.php">log in</a> to view this page!</strong></h2>
</body>

<?php
}
/* User is logged in */
else{
?>
<body>
<h3><strong>This is a password protected page.</strong></h3>
<div id= "outer">
	<div id="header"><img src="images/video.jpg" alt="" width="219" height="114" align="middle" />	</div>
	<div id="menu">
		  <h1><u>&nbsp; &nbsp;Valdosta State University Video Project | Search Form Page </u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
			<li><a href="videoform.php">Valdosta State University Video Project | Data Entry Page</a></li>
		</ul>
	</div>
	<div id= "content">
	  <div id= "primaryContentContainer">
	  <h1><strong>Valdosta State University Video Project | Search Form</strong></h1><br /><br />
<form method="get" action="videosearch_results.php">
<input name="searchterm" type="text" size="50" /><br />
<P><input name="submit" type="submit" value="Search the Video Collection Database" id="submit"> 
</form> 
 </div>
	<div id="footer">
		<p>&nbsp;</p>
	</div>
</div>
</body>
<?php
}
?>
</html>