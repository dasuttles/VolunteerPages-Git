<?php
include("include/session.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Valdosta State University Video Project | Data Entry Page</title>
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
	<div id="header">&nbsp;<img src="images/video.jpg" alt="" width="210" height="117" align="middle" />	</div>
	<div id="menu">
	  	  <h1><u>&nbsp; &nbsp;Valdosta State University Video Project | Data Entry Page </u></h1>
	  	<ul>
			<li class="first"><a href= "main.php">Student Volunteer Home Page</a></li>
		</ul>
	</div>
	<div id="content">
	  <div id="primaryContentContainer">
	  <h1><strong>Valdosta State Univerisity Video Project | Data Entry Form</strong></h1><br>

<FORM METHOD=get ACTION="videoresults.php" enctype="application/x-www-form-urlencoded">
<P>Tape Number : 
  <input name="tapenum" size="10">
<P>Orginization :
    <input name="org" type="text">  
<P>Event Date  :
  <input name="date" type="text" />
<P>Event  :
  <input name="event" type="text" />
<hr>
<br>
<P>Time :
  <input name="time" type="text" />
&nbsp;&nbsp;Original Format  :
  <select name="of">
  <option>U-matic</option>
  <option>VHS</option>
  <option>BetaMax</option>
  <option>DVD</option>
  <option>16mm</option>
  <option>8mm</option>
  <option>Laserdisc</option>
  <option>Videodisc</option>
  </select>
&nbsp;&nbsp;Copy Format  :
  <select name="cf">
  <option>DVD</option>
  <option>VHS</option>
  </select>
&nbsp;&nbsp;Edited ?  : 
  <input name="edit" type="checkbox" >
<P>Number of Tapes  :
  <select name="tapes">
  <option>1 of 1</option>
  <option>1 of 2</option>
  <option>2 of 2</option>
  <option>1 of 3</option>
  <option>2 of 3</option>
  <option>3 of 3</option>
  </select>
&nbsp;&nbsp;Box Number  :
  <input name="box" size="10">
&nbsp;&nbsp;Digitized ?  :
  <input name="dig" size="10">
&nbsp;&nbsp;Copies Made?  :
  <input name="cop" type="checkbox">
<P>Location:
  <input name="loc" type="text" />
<hr>
<br>
<br>
<P>Summary  :
  <textarea name="sum" cols=48 rows=4 ></textarea>
<P>People  :
  <textarea name="peop" cols=48 rows=4 ></textarea>
<P>Subjects  :
  <textarea name="sub" cols=48 rows=4 ></textarea>
<P>Reformatting Date  :
  <input name="rd" type="text" />
<P>Collection Name  :
  <input name="cn" type="text" />
<P>Collection Number  :
  <input name="cnum" type="text" />
<P>Indexed?  :
  <input name="ind" type="checkbox">
<P>Initials  :
  <input name="init" type="text" /><br><br>
<P><INPUT name="submit" TYPE=SUBMIT id="submit"> 
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