<?php
include("include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Valdosta Daily Times Vital Records Project | Edited Records Notification</title>
<link href="default.css" rel="stylesheet" type="text/css" />
</head>

<?php
/* User is not logged in */
if(!$session->logged_in){
?>

<body>
<h2><strong>You must <a href="main.php">log in</a> to view this page.</strong></h2>
</body>

<?php
}
/* User is logged in */
else{
?>

<body>
<h3>This is a password protected page</h3>
<div id= "outer">
	<div id="header">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/vdt.jpg" alt="" width="100" height="117" align="middle" /></div>
	<div id="menu">
	  <h1><u>&nbsp; &nbsp;VDT Vital Records Project | Edited Records Notification Page </u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
			<li><a href="vdtform.php">Valdosta Daily Times Vital Records Project | Data Entry Page</a></li>
		</ul>
	</div>
	<div id= "content">
	  <div id= "primaryContentContainer">
	  <h1><strong>VDT Vital Records Project | Edited Records Notification</strong></h1><br /><br />
<?php

// Create short variable names
$month=$_GET['month'];
$day=$_GET['day'];
$year=$_GET['year'];
$vol=$_GET['vol'];
$issue=$_GET['issue'];
$rtype=$_GET['rtype'];
$page=$_GET['page'];
$init=$_GET['initials'];
$death=$_GET['death'];
$btb=$_GET['btb'];
$gtb=$_GET['gtb'];
$bride=$_GET['bride'];
$groom=$_GET['groom'];
$child=$_GET['child'];
$dad=$_GET['dad'];
$mom=$_GET['mom'];
$id=$_GET['vdt_id'];

//connect to the database
include "include/ec_connect.php";

//Query the database and get the results

$query="UPDATE vital_records SET month='$month', day='$day', year='$year', vol='$vol', issue='$issue', record_type='$rtype', page_section='$page', name_of_deceased='$death', bride_to_be='$btb', groom_to_be='$gtb', brides_name='$bride', grooms_name='$groom', newborns_name='$child', fathers_name='$dad', mothers_name='$mom', initials='$init' WHERE vdt_id='$id'";
mysql_query($query);
$result = mysql_query($query) or die ('Error: '.mysql_error ());
//echo "$query";
$query1 = "SELECT * FROM vital_records WHERE initials='$init' ORDER BY `vital_records`.`vdt_id` DESC";
//echo "$query1";
$result1 = mysql_query($query1) or die ('Error: '.mysql_error ());

echo "Record Updated Successfully<br><br>";

echo "<table border='1' cellspacing = '0'>";
echo "<tr><td bgcolor='#c0c0c0' align='center'></td><td bgcolor='#c0c0c0' align='center'><strong>ID</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Month</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Day</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Year</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Volume</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Issue</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Record Type</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Page & Section</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Name of Deceased</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Bride to Be</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Groom to Be</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Bride's Name</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Grooms's Name</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Newborn's Name</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Father's Name</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Mother's Name</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Your Initials</strong></td></tr>";
while ($row = mysql_fetch_array($result1)){

	echo "<tr>";
	echo "<td><a href= vdtform2.php?id=$row[vdt_id]>Edit This Record?</a></td>";				
	echo "<td>$row[vdt_id]</td>";
	echo "<td>$row[month]</td>";
	echo "<td>$row[day]</td>";
	echo "<td>$row[year]</td>";
	echo "<td>$row[vol]</td>";
	echo "<td>$row[issue]</td>";
	echo "<td>$row[record_type]</td>";
	echo "<td>$row[page_section]</td>";
	echo "<td>$row[name_of_deceased]</td>";
	echo "<td>$row[bride_to_be]</td>";
	echo "<td>$row[groom_to_be]</td>";
	echo "<td>$row[brides_name]</td>";
	echo "<td>$row[grooms_name]</td>";
	echo "<td>$row[newborns_name]</td>";
	echo "<td>$row[fathers_name]</td>";
	echo "<td>$row[mothers_name]</td>";
	echo "<td>$row[initials]</td>";
	echo "</tr>";

}

?>
<br />
</div>
</div>
<?php
}
?>
</div>


</div>


</body>
</html>
