<?php
include("include/session.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Scrapbook Project | Data Entry Results Page</title>
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
	<div id="header"><img src="images/scrapbook.jpg" alt="" width="219" height="114" align="middle" />	</div>
	<div id="menu">
		  <h1><u>&nbsp; &nbsp;Scrapbook Project | Data Entry Results Page </u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
			<li><a href="scrapbookform.php">Scrapbook Project | Data Entry Page</a></li>
		</ul>
	</div>
	<div id= "content">
	  <div id= "primaryContentContainer">
	  <h1><strong>Scrapbook Project | Data Entry Results</strong></h1><br><br>

<?php

//create short variable terms
$sbt=$_GET['sbtitle'];
$art=$_GET['artitle'];
$npt=$_GET['nptitle'];
$date=$_GET['date'];
$sbp=$_GET['sbpage'];
$peop=$_GET['people'];
$sub=$_GET['subjects'];
$sum=$_GET['summary'];
$init=$_GET['initials'];
$id=$_GET['scrapbook_id]'];


//connect to the database
include "include/ec_connect.php";

//query the database

$query = "INSERT INTO scrapbook VALUES ('".addslashes($sbt)."', '".addslashes ($art)."', '".addslashes($npt)."', '". addslashes($date)."', '". addslashes($sbp)."', '".addslashes($peop)."', '".addslashes($sub)."', '". addslashes($sum)."', '". NULL ."', '". addslashes($init) ."')";
$result = mysql_query($query);

$query1 = "SELECT * FROM scrapbook WHERE (initials) LIKE '".addslashes($init)."' ORDER BY `scrapbook`.`scrapbook_id` DESC";
$result1 = mysql_query($query1) or die ('Error: '.mysql_error ());

//Display the results

//You can display the queries for troubleshooting purposes by removing the slashes from the next two lines.
//echo "$query";
//echo "$query1";
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
