<?php
include("include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Valdosta State University Video Project | Edited Records Notification Page</title>
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
<div id= "outer">
	<div id="header"><img src="images/video.jpg" alt="" width="219" height="114" align="middle" />	</div>
	<div id="menu">
	  <h1><u>&nbsp; &nbsp;VSU Video Project | Edited Records Notification Page</u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
			<li><a href="videoform.php">Valdosta State University Video Project | Data Entry Page</a></li>
		</ul>
	</div>
	<div id= "content">
	  <div id= "primaryContentContainer">
	  <h1><strong>VSU Video Project | Edited Records Notification</strong></h1><br /><br />
<?php

// Create short variable names
$tn=$_GET['tapenum'];
$org=$_GET['org'];
$date=$_GET['date'];
$event=$_GET['event'];
$time=$_GET['time'];
$of=$_GET['of'];
$cf=$_GET['cf'];
$edit=$_GET['edit'];
$tapes=$_GET['tapes'];
$box=$_GET['box'];
$dig=$_GET['dig'];
$cop=$_GET['cop'];
$loc=$_GET['loc'];
$sum=$_GET['sum'];
$peop=$_GET['peop'];
$sub=$_GET['sub'];
$rd=$_GET['rd'];
$cn=$_GET['cn'];
$cnum=$_GET['cnum'];
$ind=$_GET['ind'];
$init=$_GET['init'];
$id=$_GET['tape_id'];

//connect to the database
include "include/ec_connect.php";

//Query the database and get the results

$query="UPDATE video_collection SET orginization='$org', event_date='$date', event='$event', time='$time', original_format='$of', copy_format='$cf', edited='$edit', number_of_tapes='$tapes', tape_number='$tn', box_number='$box', digitized='$dig', copies_made='$cop', location='$loc', summary='$sum', people='$peop', subjects='$sub', reformatting_date='$rd', collection_name='$cn', collection_number='$cnum', indexed='$ind', initials='$init' WHERE tape_id='$id'";
mysql_query($query);
$result = mysql_query($query);
//echo "$query";
$query1 = "SELECT * FROM video_collection WHERE tape_id='$id'";
$result1 = mysql_query($query1) or die ('Error: '.mysql_error ());
//echo "$query1";

echo "Your update was successful. <br>";

echo "<table border='1' cellspacing = '0'>";
echo "<tr><td bgcolor='#c0c0c0' align='center'></td><td bgcolor='#c0c0c0' align='center'><strong>Tape ID</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Orginization</strong></td><td bgcolor='#c0c0c0' align='center'><strong> Event Date</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Event</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Time</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Original Format</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Copy Format</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Edited?</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Number of Tapes</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Tape Number</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Box Number</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Digitized?</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Copies Made?</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Location</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Summary</strong></td><td bgcolor='#c0c0c0' align='center'><strong>People</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Subjects</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Reformatting Date</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Collection Name</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Collection Number</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Indexed?</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Initials</strong></td></tr>";
while ($row = mysql_fetch_array($result1)){

	echo "<tr>";
	echo "<td><a href= videoform2.php?id=$row[tape_id]>Edit This Record?</a></td>";			
	echo "<td>$row[tape_id]</td>";
	echo "<td>$row[orginization]</td>";
	echo "<td>$row[event_date]</td>";
	echo "<td>$row[event]</td>";
	echo "<td>$row[time]</td>";
	echo "<td>$row[original_format]</td>";
	echo "<td>$row[copy_format]</td>";
	echo "<td>$row[edited]</td>";
	echo "<td>$row[number_of_tapes]</td>";
	echo "<td>$row[tape_number]</td>";
	echo "<td>$row[box_number]</td>";
	echo "<td>$row[digitized]</td>";
	echo "<td>$row[copies_made]</td>";
	echo "<td>$row[location]</td>";
	echo "<td>$row[summary]</td>";
	echo "<td>$row[people]</td>";
	echo "<td>$row[subjects]</td>";
	echo "<td>$row[reformatting_date]</td>";
	echo "<td>$row[collection_name]</td>";
	echo "<td>$row[collection_number]</td>";
	echo "<td>$row[indexed]</td>";
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
