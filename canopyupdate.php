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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE campus_canopy_project SET `year`=%s, volume=%s, title=%s, author=%s, `date`=%s, page_number=%s, people_in_article=%s, subjects_in_article=%s, brief_summary=%s, initials=%s WHERE canopy_id=%s",
                       GetSQLValueString($_POST['year'], "text"),
                       GetSQLValueString($_POST['volume'], "text"),
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['author'], "text"),
                       GetSQLValueString($_POST['date'], "date"),
                       GetSQLValueString($_POST['page_number'], "text"),
                       GetSQLValueString($_POST['people_in_article'], "text"),
                       GetSQLValueString($_POST['subjects_in_article'], "text"),
                       GetSQLValueString($_POST['brief_summary'], "text"),
                       GetSQLValueString($_POST['initials'], "text"),
                       GetSQLValueString($_POST['canopy_id'], "int"));

  mysql_select_db($database_DatabaseServer, $DatabaseServer);
  $Result1 = mysql_query($updateSQL, $DatabaseServer) or die(mysql_error());

  $updateGoTo = "canopyresults.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_DatabaseServer, $DatabaseServer);
$query_Recordset1 = "SELECT * FROM campus_canopy_project ORDER BY canopy_id DESC";
$Recordset1 = mysql_query($query_Recordset1, $DatabaseServer) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_free_result($Recordset1);
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Campus Canopy Edit Entry Form</title>
  </head>
  <body class="container-fluid" style="padding-top:20px">
    <div class="row">
      <div class="col-md-8 pull-right">
        <h1>Campus Canopy Edit Entry Form</h1>
      </div>
      <div class="col-md-4">
        <img src="images/canopy.jpg" class="img-responsive img-rounded" width="50%" style="padding-bottom:20px;">
      </div>
    </div>
    <div class="row">
<div class="form-group">
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center" class="table">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ID:</td>
      <td><?php echo $row_Recordset1['canopy_id']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Year:</td>
      <td><input name="year" type="text" class="form-control" value="<?php echo htmlentities($row_Recordset1['year'], ENT_COMPAT, ''); ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Volume:</td>
      <td><input name="volume" type="text" class="form-control" value="<?php echo htmlentities($row_Recordset1['volume'], ENT_COMPAT, ''); ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Title:</td>
      <td><input name="title" type="text" class="form-control" value="<?php echo htmlentities($row_Recordset1['title'], ENT_COMPAT, ''); ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Author:</td>
      <td><input name="author" type="text" class="form-control" value="<?php echo htmlentities($row_Recordset1['author'], ENT_COMPAT, ''); ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Date:</td>
      <td><input name="date" type="text" class="form-control" value="<?php echo htmlentities($row_Recordset1['date'], ENT_COMPAT, ''); ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Page Number:</td>
      <td><input name="page_number" type="text" class="form-control" value="<?php echo htmlentities($row_Recordset1['page_number'], ENT_COMPAT, ''); ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">People in Article:</td>
      <td><input name="people_in_article" type="text" class="form-control" value="<?php echo htmlentities($row_Recordset1['people_in_article'], ENT_COMPAT, ''); ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Subjects in Article:</td>
      <td><input name="subjects_in_article" type="text" class="form-control" value="<?php echo htmlentities($row_Recordset1['subjects_in_article'], ENT_COMPAT, ''); ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Brief Summary:</td>
      <td><input name="brief_summary" type="text" class="form-control" value="<?php echo htmlentities($row_Recordset1['brief_summary'], ENT_COMPAT, ''); ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Initials:</td>
      <td><input name="initials" type="text" class="form-control" value="<?php echo htmlentities($row_Recordset1['initials'], ENT_COMPAT, ''); ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" class="btn btn-danger" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="canopy_id" value="<?php echo $row_Recordset1['canopy_id']; ?>" />
</form>
</div>
<p>&nbsp;</p>
