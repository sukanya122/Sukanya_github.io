<?php require_once('Connections/mysqli.php'); ?>
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

mysql_select_db($database_mysqli, $mysqli);
$query_ice = "SELECT * FROM ice_admin";
$ice = mysql_query($query_ice, $mysqli) or die(mysql_error());
$row_ice = mysql_fetch_assoc($ice);
$totalRows_ice = mysql_num_rows($ice);

mysql_select_db($database_mysqli, $mysqli);
$query_ice2 = "SELECT * FROM std_it12";
$ice2 = mysql_query($query_ice2, $mysqli) or die(mysql_error());
$row_ice2 = mysql_fetch_assoc($ice2);
$totalRows_ice2 = mysql_num_rows($ice2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
  <p>ข้อมูลนักศึกษา</p>
  <p><a href="m_login.php">ย้อนกลับ</a></p>
</div>
<div align="center">
  <table border="1" cellpadding="5" cellspacing="5">
    <tr>
      <td>id</td>
      <td>code_std</td>
      <td>name_std</td>
      <td>dep_std</td>
      <td>tel_std</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_ice2['id']; ?></td>
        <td><?php echo $row_ice2['code_std']; ?></td>
        <td><?php echo $row_ice2['name_std']; ?></td>
        <td><?php echo $row_ice2['dep_std']; ?></td>
        <td><?php echo $row_ice2['tel_std']; ?></td>
      </tr>
      <?php } while ($row_ice2 = mysql_fetch_assoc($ice2)); ?>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($ice);

mysql_free_result($ice2);
?>
