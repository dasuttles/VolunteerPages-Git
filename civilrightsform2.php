<?php
include("include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Civil Rights Newspaperss Project | Edit Records Page</title>
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
<h3>This is a password protected page</h3>
<?php
//Create short variable terms
$id=$_GET['id'];

//Connect to the database
include "include/ec_connect.php";

//Query the database and get the results
$query=" SELECT * FROM civil_rights_newspapers WHERE (civil_rights_id)='$id'";
//echo "$query";
$result=mysql_query($query);
$data=mysql_fetch_array($result);
?>
<div id= "outer">
	<div id="header"><img src="images/canopy.jpg" alt="" width="219" height="114" align="middle" />	</div>
	<div id="menu">
	  <h1><u>&nbsp; &nbsp;Civil Rights Newspapers Project | Edit Records Page </u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
			<li><a href="civilrightsform.php">Civil Rights Newspapers Project | Data Entry Page</a></li>
		</ul>
	</div>
	<div id= "content">
	  <div id= "primaryContentContainer">
	  <h1><strong>Campus Canopy Project | Edit Records Form</strong></h1><br /><br />


<FORM METHOD=get ACTION="civilrightsupdate.php" enctype="application/x-www-form-urlencoded">
<input type=hidden name="civil_rights_id" value="<?php echo "$data[civil_rights_id]" ?>">
<P>Newspaper Title : 
  <input name="newstitle" size="4" value="<?php echo "$data[newspaper_title]" ?>">
<P>Article Title  :
  <input name="title" value="<?php echo "$data[article_title]" ?>">
<P>Article Date  :
  <input name="date" value="<?php echo "$data[article_date]" ?>"><br />
  (Format: yyyy-mm-dd example: January 2, 1943 would be 1943-01-02)
<P>Article Page Number  :
  <input name="number" value="<?php echo "$data[page_number]" ?>">
<P> People In Article  :<br />
  <textarea name="people" cols="48" rows="4"><?php echo "$data[people_in_article]" ?></textarea><br />
  (Format: Last Name, First Name; Last Name, First Name)
<P>Subjects  In Article  :<br />
  <textarea name="subjects" cols="48" rows="4"><?php echo "$data[subjects_in_article]" ?></textarea>
<P>Brief Summary  :<br />
  <textarea name="summary" cols="48" rows="4"><?php echo "$data[brief_summary]" ?></textarea>
<P>Initials  :
  <input name="initials" size="3" value="<?php echo "$data[initials]" ?>"><br /><br />

<P><INPUT name="submit" TYPE=SUBMIT value="Submit" id="submit"> 
<INPUT TYPE=RESET>
</FORM>
</div>

<?php
}
?>
</div>
</body>
</html>