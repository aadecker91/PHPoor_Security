<?php require_once('../Connections/sandboxDatabase.php'); ?>
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
  $selectSQL = sprintf("SELECT username FROM Injections2 WHERE password = %s",
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_sandbox, $sandbox);
  $Result1 = mysql_query($selectSQL, $sandbox) or die(mysql_error());
  if ($Result1 == 'Admin') {
	  $insertGoTo = "challenge_2_complete.php";
	  if (isset($_SERVER['QUERY_STRING'])) {
		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
		$insertGoTo .= $_SERVER['QUERY_STRING'];
	  }
	  header(sprintf("Location: %s", $insertGoTo));
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHPoor Security</title>
<style type="text/css">
.content {
	background-color: rgba(0,0,255,.2);
	margin-left: 1%;
	border-radius: 5px;
	margin-right: 3%;
	padding: 10px 0;
}
table {
	margin-left: auto;
	margin-right: auto;
	text-align: center;
}
.content2 {
	width: 100%;
	text-align: center;
}
form {
	margin-right: auto;
	margin-left: auto;
}
</style>
<link href="../_CSS/styleSheet.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<meta name="description" content="PHPoor Security" />
<meta name="keywords" content="PHPoor Security challenge 1" />
</head>

<body>
 <div class="container">
  <div class="header"><img src="../_images/Logo.png" alt="Logo" width="900" height="160" />
  <?php include("../_includes/header.php"); ?>
  <!-- end .header --></div>
  <h1>YOU DID IT</h1>
  <div class="content">
  <p>Congratulations you are now ADMIN!!<!-- end .content --></p>
  </div>
  <div id="body"><!-- body div for footer --></div>
  <div class="footer">PHPoor Security
  <!-- end .footer --></div>
  <!-- end .container --></div>
<script type="text/javascript">
<?php include("../_includes/menuBar1.php"); ?>
</script> 
</body>
</html>
