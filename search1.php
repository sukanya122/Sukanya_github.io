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

$colname_dusan = "-1";
if (isset($_GET['name_std'])) {
  $colname_dusan = $_GET['name_std'];
}
mysql_select_db($database_mysqli, $mysqli);
$query_dusan = sprintf("SELECT * FROM std_it12 WHERE name_std LIKE %s", GetSQLValueString("%" . $colname_dusan . "%", "text"));
$dusan = mysql_query($query_dusan, $mysqli) or die(mysql_error());
$row_dusan = mysql_fetch_assoc($dusan);
$totalRows_dusan = mysql_num_rows($dusan);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
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
        <td><?php echo $row_dusan['id']; ?></td>
        <td><?php echo $row_dusan['code_std']; ?></td>
        <td><?php echo $row_dusan['name_std']; ?></td>
        <td><?php echo $row_dusan['dep_std']; ?></td>
        <td><?php echo $row_dusan['tel_std']; ?></td>
      </tr>
      <?php } while ($row_dusan = mysql_fetch_assoc($dusan)); ?>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($dusan);
?>
