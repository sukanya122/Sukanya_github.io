<?php require_once('Connections/mysqli.php'); ?>
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
  $updateSQL = sprintf("UPDATE std_it12 SET code_std=%s, name_std=%s, dep_std=%s, tel_std=%s WHERE id=%s",
                       GetSQLValueString($_POST['code_std'], "text"),
                       GetSQLValueString($_POST['name_std'], "text"),
                       GetSQLValueString($_POST['dep_std'], "text"),
                       GetSQLValueString($_POST['tel_std'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_mysqli, $mysqli);
  $Result1 = mysql_query($updateSQL, $mysqli) or die(mysql_error());

  $updateGoTo = "admin1.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_ice_rec_update = "-1";
if (isset($_GET['id'])) {
  $colname_ice_rec_update = $_GET['id'];
}
mysql_select_db($database_mysqli, $mysqli);
$query_ice_rec_update = sprintf("SELECT * FROM std_it12 WHERE id = %s", GetSQLValueString($colname_ice_rec_update, "int"));
$ice_rec_update = mysql_query($query_ice_rec_update, $mysqli) or die(mysql_error());
$row_ice_rec_update = mysql_fetch_assoc($ice_rec_update);
$totalRows_ice_rec_update = mysql_num_rows($ice_rec_update);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Code_std:</td>
      <td><input type="text" name="code_std" value="<?php echo htmlentities($row_ice_rec_update['code_std'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Name_std:</td>
      <td><input type="text" name="name_std" value="<?php echo htmlentities($row_ice_rec_update['name_std'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dep_std:</td>
      <td><input type="text" name="dep_std" value="<?php echo htmlentities($row_ice_rec_update['dep_std'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tel_std:</td>
      <td><input type="text" name="tel_std" value="<?php echo htmlentities($row_ice_rec_update['tel_std'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_ice_rec_update['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($ice_rec_update);
?>
