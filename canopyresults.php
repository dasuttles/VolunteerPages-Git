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

mysql_select_db($database_DatabaseServer, $DatabaseServer);
$query_canopyresultsquery = "SELECT * FROM campus_canopy_project ORDER BY canopy_id DESC LIMIT 20";
$canopyresultsquery = mysql_query($query_canopyresultsquery, $DatabaseServer) or die(mysql_error());
$row_canopyresultsquery = mysql_fetch_array($canopyresultsquery);
$totalRows_canopyresultsquery = mysql_num_rows($canopyresultsquery);

mysql_free_result($canopyresultsquery);
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<meta charset="utf-8">
<title>Campus Canopy Data Entry Form</title>
</head>

<body class="container-fluid">
<h1>Entry Submitted.</h1>
<table class="table table-bordered">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Year</th>
    <th scope="col">Volume</th>
    <th scope="col">Title</th>
    <th scope="col">Author</th>
    <th scope="col">Date</th>
    <th scope="col">Page Number</th>
    <th scope="col">People</th>
    <th scope="col">Subjects</th>
    <th scope="col">Summary</th>
    <th scope="col">Initials</th>
    <th scope="col">Edit</th>
  </tr>
  <tr>
    <td>&nbsp;<?php echo $row_canopyresultsquery['canopy_id']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['year']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['volume']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['title']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['author']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['date']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['page_number']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['people_in_article']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['subjects_in_article']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['brief_summary']; ?></td>
    <td>&nbsp;<?php echo $row_canopyresultsquery['initials']; ?></td>
    <td>&nbsp;<a href="canopyupdate.php">Edit this Record</a></td>
  </tr>
 </table>
 
 <a href="http://archives.valdosta.edu/volunteers/canopyform.php">Return to Form</a>
 <a href="http://archives.valdosta.edu/volunteers/main.php">Ruturn to volunteer page</a>
 </body>
 </html>
