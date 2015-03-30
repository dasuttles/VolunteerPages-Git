<?php
include("include/session.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Valdosta Daily Times Vital Records Project | Data Entry Page</title>
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
	<div id="header">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/vdt.jpg" alt="" width="100" height="117" align="middle" />	</div>
	<div id="menu">
	  	  <h1><u>&nbsp; &nbsp;Valdosta Daily Times Vital Records Data Entry Page </u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
		</ul>
	</div>
	<div id="content">
	  <div id="primaryContentContainer">
	  <h1><strong>Valdosta Daily Times Vital Records Form</strong></h1><br><br>

<FORM METHOD=get ACTION="vdtresults.php" enctype="application/x-www-form-urlencoded">
<P> Note: Please format all names: Last Name, First Name
<P><strong>Newspaper Basics:</strong><br>
<P>Month : 
  <select name="month">
  <option value="01">01</option>
  <option value="02">02</option>
  <option value="03">03</option>
  <option value="04">04</option>
  <option value="05">05</option>
  <option value="06">06</option>
  <option value="07">07</option>
  <option value="08">08</option>
  <option value="09">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  </select>
Day :
    <input name="day" type="text" size="2">  
Year  :
  <input name="year" type="text" size="4">
Volume  :
  <input name="vol" type="text" size="3">
Issue  :
  <input name="issue" type="text" size="3">
<P> Record Type  : 
  <select name="rtype">
  <option>Death/Obit</option>
  <option>Engagement</option>
  <option>Marriage</option>
  <option>Registers of Births</option>
  </select>
Page-Section  :
  <input name="page" type= "text" size="3">
Initials  :
  <input name="initials" type="text" size="3"> 
<hr>
<br>
<P><strong>Death or Obituary Notice:</strong><br>
<P>Name of Deceased : 
  <input name="death" type="text">
<hr>
<br>
<P><strong>Engagements  :</strong>
<P>Name of Bride to Be : 
  <input name="btb" type="text">
Name of Groom to Be : 
  <input name="gtb" type="text">
<P><strong>Marriages  :</strong>
<P>Name of Bride : 
  <input name="bride" type="text">
Name of Groom : 
  <input name="groom" type="text">
<hr>
<br>
<P><strong>Registers of Births:</strong>
<P>Newborn's Name : 
  <input name="child" type="text">
<P>Father's Name : 
  <input name="dad" type="text">
Mother's Name : 
  <input name="mom" type="text">
<P><INPUT name="submit" value="submit" TYPE=SUBMIT id="submit"> 
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