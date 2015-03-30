<?php
include("include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Scrapbook Project | Edited Records Notification</title>
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
	<div id="header"><img src="images/scrapbook.jpg" alt="" width="219" height="114" align="middle" />	</div>
	<div id="menu">
	  <h1><u>&nbsp; &nbsp;Scrapbook Project | Edited Records Notification Page </u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
			<li><a href="scrapbookform.php">Scrapbook Project | Data Entry Page</a></li>
		</ul>
	</div>
	<div id= "content">
	  <div id= "primaryContentContainer">
	  <h1><strong>Scrapbook Project | Edited Record Notification</strong></h1><br /><br />
<?php

// Create short variable names
$sbt=$_GET['sbtitle'];
$art=$_GET['artitle'];
$npt=$_GET['nptitle'];
$date=$_GET['date'];
$sbp=$_GET['sbpage'];
$peop=$_GET['people'];
$sub=$_GET['subjects'];
$sum=$_GET['summary'];
$init=$_GET['initials'];
$id=$_GET['scrapbook_id'];

//connect to the database
include "include/ec_connect.php";

//Query the database and get the results

$query="UPDATE scrapbook SET scrapbook_title='$sbt', article_title='$art', newspaper_title='$npt', article_date='$date', scrapbook_page_number='$sbp', people_in_article='$peop', subjects_inarticle='$sub', brief_summary='$sum', initials='$init' WHERE scrapbook_id='$id'";
mysql_query($query);
$result = mysql_query($query);
//You can display the query for troubleshooting purposes by removing the slashes from the next line.
//echo "$query";
$query1 = "SELECT * FROM scrapbook WHERE initials='$init' ORDER BY `scrapbook`.`scrapbook_id` DESC";
//You can display the query for troubleshooting purposes by removing the slashes from the next line.
//echo "$query1";
$result1 = mysql_query($query1) or die ('Error: '.mysql_error ());

echo "Record Updated Successfully<br><br>";

echo "<table border='1' cellspacing = '0'>";
echo "<tr><td bgcolor='#c0c0c0' align='center'></td><td bgcolor='#c0c0c0' align='center'><strong>Scrapbook Title</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Article Title</strong></td><td bgcolor='#c0c0c0' align='center'><strong> Newspaper Title</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Date</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Scrapbook Page Number</strong></td><td bgcolor='#c0c0c0' align='center'><strong>People in Article</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Subjects in Article</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Brief Summary</strong></td><td bgcolor='#c0c0c0' align='center'><strong>ID</strong></td><td bgcolor='#c0c0c0' align='center'><strong>Initials</strong></td></tr>";
while ($row = mysql_fetch_array($result1)){

	echo "<tr>";
	echo "<td><a href= scrapbookform2.php?id=$row[scrapbook_id]>Edit This Record?</a></td>";
	echo "<td>$row[scrapbook_title]</td>";
	echo "<td>$row[article_title]</td>";
	echo "<td>$row[newspaper_title]</td>";
	echo "<td>$row[article_date]</td>";
	echo "<td>$row[scrapbook_page_number]</td>";
	echo "<td>$row[people_in_article]</td>";
	echo "<td>$row[subjects_inarticle]</td>";
	echo "<td>$row[brief_summary]</td>";
	echo "<td>$row[scrapbook_id]</td>";
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
