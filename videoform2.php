<?php
include("include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Valdosta State University Video Project | Edit Records Page</title>
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
<h3>This is a password protected page.</h3>
<?php
//Create short variable terms
$id=$_GET['id'];

//Connect to the database
include "include/ec_connect.php";

//Query the database and get the results
$query=" SELECT * FROM video_collection WHERE (tape_id)='$id'";
//echo "$query";
$result=mysql_query($query);
$data=mysql_fetch_array($result);
?>
<div id= "outer">
	<div id="header"><img src="images/canopy.jpg" alt="" width="219" height="114" align="middle" />	</div>
	<div id="menu">
	  <h1><u>&nbsp; &nbsp;VSU Video Project | Edit Records Page </u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
			<li><a href="videoform.php">VSU Video Project | Data Entry Page</a></li>
		</ul>
	</div>
	<div id= "content">
	  <div id= "primaryContentContainer">
	  <h1><strong>VSU Video Project | Edit Records Form</strong></h1><br /><br />


<FORM METHOD=get ACTION="videoupdate.php" enctype="application/x-www-form-urlencoded">
<input type=hidden name="tape_id" value="<?php echo "$data[tape_id]" ?>">
<P>Tape Number : 
  <input name="tapenum" value="<?php echo "$data[tape_number]" ?>">
<P>Orginization :
    <input name="org" value="<?php echo "$data[orginization]" ?>">  
<P>Event Date  :
  <input name="date" value="<?php echo "$data[event_date]" ?>">
<P>Event  :
  <input name="event" value="<?php echo "$data[event]" ?>">
<hr>
<br />
<P>Time :
  <input name="time" value="<?php echo "$data[time]" ?>">
&nbsp;&nbsp;Original Format  :
  <input name="of" value="<?php echo "$data[original_format]" ?>" />
&nbsp;&nbsp;Copy Format  :
  <input name="cf" value="<?php echo "$data[copy_format]" ?>"> 
&nbsp;&nbsp;Edited ?  : 
  <input name="edit" value="<?php echo "$data[edited]" ?>">
<P>Number of Tapes  :
  <input name="tapes" value="<?php echo "$data[number_of_tapes]" ?>">
&nbsp;&nbsp;Box Number  :
  <input name="box" value="<?php echo "$data[box_number]" ?>">
&nbsp;&nbsp;Digitized ?  :
  <input name="dig" value="<?php echo "$data[digitized]" ?>">
&nbsp;&nbsp;Copies Made?  :
  <input name="cop" value="<?php echo "$data[copies_made]" ?>">
<P>Location:
  <input name="loc" value="<?php echo "$data[location]" ?>">
<hr>
<br />
<P>Summary  :
  <input name="sum" value="<?php echo "$data[summary]" ?>">
<P>People  :
  <input name="peop" value="<?php echo "$data[people]" ?>">
<P>Subjects  :
  <input name="sub" value="<?php echo "$data[subjects]" ?>">
<P>Reformatting Date  :
  <input name="rd" value="<?php echo "$data[reformatting_date]" ?>">
<P>Collection Name  :
  <input name="cn" value="<?php echo "$data[collection_name]" ?>">
<P>Collection Number  :
  <input name="cnum" value="<?php echo "$data[collection_number]" ?>">
<P>Indexed?  :
  <input name="ind" value="<?php echo "$data[indexed]" ?>">
<P>Initials  :
  <input name="init" value="<?php echo "$data[initials]" ?>"><br><br>
<P><INPUT name="submit" TYPE=SUBMIT id="submit"> 
<INPUT TYPE=RESET>
</FORM>
</div>

<?php
}
?>
</div>
</body>
</html>