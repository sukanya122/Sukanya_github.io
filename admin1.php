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

mysql_select_db($database_mysqli, $mysqli);
$query_admin = "SELECT * FROM ice_admin";
$admin = mysql_query($query_admin, $mysqli) or die(mysql_error());
$row_admin = mysql_fetch_assoc($admin);
$totalRows_admin = mysql_num_rows($admin);

mysql_select_db($database_mysqli, $mysqli);
$query_aaa = "SELECT * FROM std_it12";
$aaa = mysql_query($query_aaa, $mysqli) or die(mysql_error());
$row_aaa = mysql_fetch_assoc($aaa);
$totalRows_aaa = mysql_num_rows($aaa);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
  <p>ข้อมูลของแอดมิน</p>
  <form id="form1" name="form1" method="post" action="">
    <a href="search1.php">
    <input type="text" name="stn" id="stn" />
    <input type="submit" name="stn2" id="stn2" value="Submit" />
    </a>
  </form>
  <p><a href="a_login.php">ย้อนกลับ</a></p>
  <table border="1" cellpadding="5" cellspacing="5">
    <tr>
      <td><div align="center">id</div></td>
      <td><div align="center">code_std</div></td>
      <td><div align="center">name_std</div></td>
      <td><div align="center">dep_std</div></td>
      <td><div align="center">tel_std</div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_aaa['id']; ?></td>
        <td><?php echo $row_aaa['code_std']; ?></td>
        <td><?php echo $row_aaa['name_std']; ?></td>
        <td><?php echo $row_aaa['dep_std']; ?></td>
        <td><?php echo $row_aaa['tel_std']; ?></td>
        <td><a href="delete.php?id=<?php echo $row_aaa['id']; ?>">delete</a></td>
        <td><a href="update.php?id=<?php echo $row_aaa['id']; ?>">update</a></td>
      </tr>
      <?php } while ($row_aaa = mysql_fetch_assoc($aaa)); ?>
  </table>
</div>
</body>
</html>
<?php
mysql_free_result($admin);

mysql_free_result($aaa);
?>
