<?php require_once('Connections/DatabaseServer.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
if (PHP_VERSION < 6) {
$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
}
$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
switch ($theType) {
case "text":
$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
break;
case "long":
case "int":
$theValue = ($theValue != "") ? intval($theValue) : "NULL";
break;
case "double":
$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
break;
case "date":
$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
break;
case "defined":
$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
break;
}
return $theValue;
}
}
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
$insertSQL = sprintf("INSERT INTO campus_canopy_project (`year`, volume, title, author, `date`, page_number, people_in_article, subjects_in_article, brief_summary, initials) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
GetSQLValueString($_POST['year'], "int"),
GetSQLValueString($_POST['volume'], "text"),
GetSQLValueString($_POST['title'], "text"),
GetSQLValueString($_POST['author'], "text"),
GetSQLValueString($_POST['date'], "date"),
GetSQLValueString($_POST['page_number'], "text"),
GetSQLValueString($_POST['people_in_article'], "text"),
GetSQLValueString($_POST['subjects_in_article'], "text"),
GetSQLValueString($_POST['brief_summary'], "text"),
GetSQLValueString($_POST['initials'], "text"));
mysql_select_db($database_DatabaseServer, $DatabaseServer);
$Result1 = mysql_query($insertSQL, $DatabaseServer) or die(mysql_error());
$insertGoTo = "canopyresults.php";
if (isset($_SERVER['QUERY_STRING'])) {
$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
$insertGoTo .= $_SERVER['QUERY_STRING'];
}
header(sprintf("Location: %s", $insertGoTo));
}
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="canopy.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Campus Canopy Data Entry Form</title>
  </head>
  <body class="container-fluid" style="padding-top:20px">
    <div class="row">
    <div class="col-md-5">
        <img src="images/canopy.jpg" class="img-responsive img-rounded canimg">       
        <a href="http://archives.valdosta.edu/volunteers/main.php"><strong>Return to volunteer page</strong></a>
      </div>
      <div class="col-md-7">
        <h1>Campus Canopy Data Entry Form</h1>
        </div>
        
      </div>
 <div class="row">
    <div class="formwidth">
         <!-- <div class="col-md-12"> -->
        
      </div>
        <div class="row">
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
        <div class="form-group">
          <table class="table">
            <tr class="va">
              <td><strong>Year:</strong></td>
              <td><input type="text" name="year" value="" size="32" class="form-control"></td>
            </tr>
            <tr class="va">
              <td ><strong>Volume:</strong></td>
              <td><input name="volume" type="text" class="form-control" value=""></td>
            </tr>
            <tr class="va">
              <td ><strong>Title:</strong></td>
              <td><input name="title" type="text" class="form-control" value=""></td>
            </tr>
            <tr class="va">
              <td ><strong>Author:</strong></td>
              <td><input name="author" type="text" class="form-control" value=""></td>
            </tr>
            <tr class="va">
              <td><strong>Date:</strong><br><code>Format as YYYY-MM-DD, Use Placeholder Zeros, e.g. 001</code></td>
              <td><input name="date" type="text" class="form-control" value=""></td>
            </tr>
            <tr class="va">
              <td ><strong>Page Number:</strong></td>
              <td><input name="page_number" type="text" class="form-control" value=""></td>
            </tr>
            <tr class="va">
              <td ><strong>People in Article:</strong></td>
              <td><input name="people_in_article" type="text" class="form-control" value=""></td>
            </tr>
            <tr class="va">
              <td ><strong>Subjects in Article:</strong></td>
              <td><input name="subjects_in_article" type="text" class="form-control" value=""></td>
            </tr>
            <tr class="va">
              <td><strong>Brief Summary:</strong></td>
              <td><input name="brief_summary" type="textarea" class="form-control" value=""></td>
            </tr>
            <tr class="va">
              <td ><strong>Initials:</strong></td>
              <td><input name="initials" type="text" class="form-control" value=""></td>
            </tr>
            <tr class="va">
              <td >&nbsp;</td>
              <td><input type="submit" class="btn btn-primary" value="Insert record"></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form1">
        </form>
        </div>
      </div>
    </div>
</div>
    <p>&nbsp;</p>
  </body>
</html>