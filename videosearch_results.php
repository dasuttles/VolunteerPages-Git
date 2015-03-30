<?php
include("include/session.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Valdosta State University Video Project | Search Results Page</title>
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
		  <h1><u>&nbsp; &nbsp;Valdosta State University Video Project | Search Results Page </u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
			<li><a href="videoform.php">Valdosta State University Video Project | Data Entry Page</a></li>
			<li><a href="video_search.php">Valdosta State University Video Project | Search Page</a></li>
		</ul>
	</div>
	<div id= "content">
	  <div id= "primaryContentContainer">
	  <h1><strong>Valdosta State University Video Project | Search Results Page</strong></h1>

<?php

$searchterm=$_GET['searchterm'];



$query = "SELECT *,  MATCH (orginization, event, tape_number, summary, people, subjects, collection_name) AGAINST ('$searchterm') AS score FROM video_collection WHERE MATCH (orginization, event, tape_number, summary, people, subjects, collection_name) AGAINST ('$searchterm' IN BOOLEAN MODE)";

//echo $query;

$result = mysql_query($query);
$numresults = mysql_num_rows($result); 

echo '<p> You searched for: '.$searchterm.'</p>';
echo '<p> Number of Results: '.$numresults.'</p>';

echo "<table border='1' cellspacing = '0'>";
echo "<tr><td bgcolor='#c0c0c0' align='center'></td><td bgcolor='#c0c0c0' align='center'><strong>Tape ID</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Orginization</strong></td><td bgcolor='#c0c0c0' align='center'><strong> Event Date</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Event</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Time</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Original Format</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Copy Format</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Edited?</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Number of Tapes</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Tape Number</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Box Number</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Digitized?</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Copies Made?</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Location</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Summary</strong></td><td bgcolor='#c0c0c0' align='center'><strong>People</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Subjects</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Reformatting Date</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Collection Name</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Collection Number</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Indexed?</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Initials</strong></td></tr>";
while ($row = mysql_fetch_array($result)){

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