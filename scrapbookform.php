<?php
include("include/session.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Scrapbook Project | Data Entry Page</title>
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<?php
/* User is not logged in */
if(!$session->logged_in){
?>
<body>
<h2><strong>You must <a href= "main.php">log in</a> to view this page!</strong></h2>
</body>
<?php
}
/* User is logged in */
else{
?>

<body>
<h3>This is a password protected page.</h3>
<div id="outer">
	<div id="header">&nbsp;<img src="images/scrapbook.jpg" alt="" width="210" height="117" align="middle" />	</div>
	<div id="menu">
	  	  <h1><u>&nbsp; &nbsp;Scrapbook Project | Data Entry Page </u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
		</ul>
	</div>
	<div id="content">
	  <div id="primaryContentContainer">
	  <h1><strong>Scrapbook Project | Data Entry Form</strong></h1><br><br>

<FORM METHOD=get ACTION="scrapbookresults.php" enctype="application/x-www-form-urlencoded">
<P>Scrapbook Title : 
  <input name="sbtitle" size="20"><br>
  (Format example: GSWC 1944-45 would be 1944-45)
<P>Article Title :
    <input name="artitle" type="text">  
<P>Newspaper Title  :
  <input name="nptitle" type="text" />
<P>Article Date  :
  <input name="date" type="text" /><br>
  (Format: yyyy-mm-dd Example: January 2, 1943 would be 1943-01-02)
<P>Scrapbook Page Number  :
  <input name="sbpage" size="3" type="text" />
<P> People In Article  :<br>
  <textarea name="people" cols=48 rows=4></textarea><br>
  (Format: Last Name, First Name; Last Name, First Name)
<P>Subjects  In Article  :<br>
  <textarea name="subjects" cols="48" rows="4"></textarea>
<P>Brief Summary  :<br>
  <textarea name="summary" cols="48" rows="4"></textarea>
<P>Initials  :
  <input name="initials" size="3" type="text" />

<P><INPUT name="submit" value="Submit" TYPE=SUBMIT id="submit"> 
<INPUT TYPE=RESET>
</FORM>
	  </div>
		<div class="clear"></div>
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