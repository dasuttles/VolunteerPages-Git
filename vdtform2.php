<?php
include("include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Valdosta Daily Times Vital Records Project | Edit Records Page</title>
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
$query=" SELECT * FROM vital_records WHERE (vdt_id)='$id'";
//echo "$query";
$result=mysql_query($query);
$data=mysql_fetch_array($result);
?>
<div id= "outer">
	<div id="header">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/vdt.jpg" alt="" width="100" height="117" align="middle" /></div>
	<div id="menu">
	  <h1><u>&nbsp; &nbsp;Valdosta Daily Times Vital Records Project | Edit Records Page </u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
			<li><a href="vdtform.php">Valdosta Daily Times Vital Records Project | Data Entry Page</a></li>
		</ul>
	</div>
	<div id= "content">
	  <div id= "primaryContentContainer">
	  <h1><strong>Valdosta Daily Times Vital Records Project | Edit Record Form</strong></h1><br /><br />


<FORM METHOD=get ACTION="vdtupdate.php" enctype="application/x-www-form-urlencoded">
<input type="hidden" name="vdt_id" value="<?php echo "$data[vdt_id]" ?>">
<p> Note: Please format all names: Last Name, First Name
<p><strong>Newspaper Basics  :</strong><br />
<P>Month : 
  <input name="month" size="2" value="<?php echo "$data[month]" ?>">
Day :
    <input name="day" size="2" value="<?php echo "$data[day]" ?>">  
Year  :
  <input name="year" size="4" value="<?php echo "$data[year]" ?>">
Volume  :
  <input name="vol" size="3" value="<?php echo "$data[vol]" ?>">
Issue  :
  <input name="issue" size="3" value="<?php echo "$data[issue]" ?>">
<P>Record Type  :
  <input name="rtype" value="<?php echo "$data[record_type]" ?>">
Page-Section  :
  <input name="page" value="<?php echo "$data[page_section]" ?>">
Initials  :
  <input name="initials" value="<?php echo "$data[initials]" ?>">
<hr />
<br />
<p><strong>Deaths/Obituaries</strong>
<P>Name of Deceased  :
  <input name="death" value="<?php echo "$data[name_of_deceased]" ?>">
<hr />
<br />
<p><strong>Engagements  :</strong>
<P>Bride to Be  :
  <input name="btb" value="<?php echo "$data[bride_to_be]" ?>">
Groom to Be  :
  <input name="gtb" value="<?php echo "$data[groom_to_be]" ?>">
<p><strong>Weddings  :</strong>
<P>Bride's Name  :
  <input name="bride" value="<?php echo "$data[brides_name]" ?>">
Groom's Name  :
  <input name="groom" value="<?php echo "$data[grooms_name]" ?>">
<hr />
<br />
<p><strong>Registers of Births  :</strong>
<P>Child's Name  :
  <input name="child" value="<?php echo "$data[childs_name]" ?>">
<P>Father's Name  :
  <input name="dad" value="<?php echo "$data[fathers_name]" ?>">
Mothers's Name  :
  <input name="mom" value="<?php echo "$data[mothers_name]" ?>"><br /><br />
<P><INPUT name="submit" value="Submit" TYPE=SUBMIT id="submit"> 
<INPUT TYPE=RESET>
</FORM>
</div>

<?php
}
?>
</div>
</body>
</html>