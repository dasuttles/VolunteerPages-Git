<?php
/**
 * Main.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2004
 */
include("include/session.php");
?>

<html>
<head>
<title>Student Volunteer Homepage</title>
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>

<table>
<tr><td>

<div id="outer">
<?php
/**
 * User has already logged in, so display relavent links, including
 * a link to the admin center if the user is an administrator.
 */
if($session->logged_in){
   echo "<div id=header>&nbsp;<img src=images/volunteer.jpg width=230 height=128 align=middle /></div><br><br><br><br>";
   echo "<br>&nbsp;<h1>You have successfully logged in.</h1><br><br>";
   echo "<div id=primaryContentContainer><h2>Available Projects for Student Volunteers:</h2><br><br>";
   echo "<a href= canopyform.php><h2><strong>Campus Canopy Indexing Project</strong></h2></a> &nbsp;&nbsp;";
   echo "<a href= scrapbookform.php><h2><strong>Scrapbook Indexing Project</strong></h2></a> &nbsp;&nbsp;";
   echo "<a href= vdtform.php><h2><strong>Valdosta Daily Times Vital Records Project</strong></h2></a> &nbsp;&nbsp;";
   echo "<a href= videoform.php><h2><strong>Valdosta State University Video Project</strong></h2></a> &nbsp;&nbsp; <br>";
    echo "<a href= civilrightsform.php><h2><strong>Civil Rights Newspapers Project</strong></h2></a> &nbsp;&nbsp;";
   echo "<a href= video_search.php><h2><strong>Valdosta State University Video Project Search Page</strong></h2></a> &nbsp;&nbsp; <br><br>";
   echo "Welcome <b>$session->username</b>, you are logged in. <br><br>"
       ."[<a href=\"userinfo.php?user=$session->username\">My Account</a>] &nbsp;&nbsp;"
       ."[<a href=\"useredit.php\">Edit Account</a>] &nbsp;&nbsp;";
   if($session->isAdmin()){
      echo "[<a href=\"admin/admin.php\">Admin Center</a>] &nbsp;&nbsp;";
   }
   echo "[<a href=\"process.php\">Logout</a>]";
}
else{
?>
</div>
<div id="outer">
<h1>Login Here to Work on Student Volunteer Projects</h1><br><br>
<?php
/**
 * User not logged in, display the login form.
 * If user has already tried to login, but errors were
 * found, display the total number of errors.
 * If errors occurred, they will be displayed.
 */
if($form->num_errors > 0){
   echo "<font size=\"2\" color=\"#ff0000\">".$form->num_errors." error(s) found</font>";
}
?>
<form action="process.php" method="POST">
<table align="left" border="0" cellspacing="0" cellpadding="3">
<tr><td>Username:</td><td><input type="text" name="user" maxlength="30" value="<?php echo $form->value("user"); ?>"></td><td><?php echo $form->error("user"); ?></td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" maxlength="30" value="<?php echo $form->value("pass"); ?>"></td><td><?php echo $form->error("pass"); ?></td></tr>
<tr><td colspan="2" align="left"><input type="checkbox" name="remember" <?php if($form->value("remember") != ""){ echo "checked"; } ?>>
<font size="2">Remember me next time &nbsp;&nbsp;&nbsp;&nbsp;
<input type="hidden" name="sublogin" value="1">
<input type="submit" value="Login"></td></tr>
<tr><td colspan="2" align="left"><br><font size="2">[<a href="forgotpass.php">Forgot Password?</a>]</font></td><td align="right"></td></tr>
<tr><td colspan="2" align="left"><br>Not registered? <a href="register.php">Sign-Up!</a></td></tr>
</table>
</form>

<?php
}

/**
 * Just a little page footer, tells how many registered members
 * there are, how many users currently logged in and viewing site,
 * and how many guests viewing site. Active users are displayed,
 * with link to their user information.
 */
echo "</td></tr><tr><td align=\"center\"><br><br>";
echo "<b>Total Registered Volunteers:</b> ".$database->getNumMembers()."<br>";
echo "There are $database->num_active_users registered volunteers and ";
echo "$database->num_active_guests guests viewing the site.<br><br>";



?>

</div>
</td></tr>
</table>


</body>
</html>
