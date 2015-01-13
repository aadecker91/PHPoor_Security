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
  $selectSQL = sprintf("SELECT id FROM Sessions1 WHERE username = %s AND password = %s",
                       GetSQLValueString($_POST['username'], "text"),
					   GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_sandbox, $sandbox);
  $Result1 = mysql_query($selectSQL, $sandbox) or die(mysql_error());
  if (mysql_num_rows($Result1) == 0) {
	  $insertGoTo = "challenge_1.php";
	  if (isset($_SERVER['QUERY_STRING'])) {
		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
		$insertGoTo .= $_SERVER['QUERY_STRING'];
	  }
	  header(sprintf("Location: %s", $insertGoTo));
  }
  else{
	  $cookie_name = "SessionID";
	  $cookie_value = mysql_result($Result1, 0);
	  setcookie($cookie_name, $cookie_value, 0);
	  $insertGoTo = "challenge_1.php";
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
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<meta name="description" content="PHPoor Security" />
<meta name="keywords" content="PHPoor Security challenge 1" />
</head>

<body>
 <div class="container">
  <div class="header"><img src="../_images/Logo.png" alt="Logo" width="900" height="160" />
  <?php include("../_includes/header.php"); ?>
  <!-- end .header --></div>
  <h1>Super Secure Web Session</h1>
  <div class="content">
  <p>Log in as &quot;user&quot; with the password of &quot;password&quot;.</p>
  <p>&nbsp;</p>
  <p>
  <?php
	if(!isset($_COOKIE["SessionID"])) {
    	echo "Cookie named '" . "SessionID" . "' is not yet set!";
	} else {
		echo "Cookie '" . "SessionID" . "' is set!<br>";
		echo "Value is: " . $_COOKIE["SessionID"] . "<br>";
		echo "As you can probably guess, this sessionID cookie is based on the auto-incrementing primary key of the database where it checks the username/password.  This is something that is common when generating session keys and is a very bad practice.<br><br>";
		echo "Using software that allows you to send HTTP header data, try to send send another cookie that might give you administrative access!<br><br>";
		if($_COOKIE["SessionID"] == 87634) {
			echo "Cookie '" . "SessionID" . "' is set!<br>";
			echo "Value is: " . $_COOKIE["SessionID"] . "<br>";
			echo "YOU ARE NOW ADMIN.<br>";
		}
	}
	
?></p>
  <p>&nbsp;</p>
    <div class="content2">
    <form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
      <table width="306" border="1">
        <tr>
          <td>Username</td>
          <td align="left"><span id="spryUsername">
            <label for="username"></label>
            <input type="text" name="username" id="username">
            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
        </tr>
        <tr>
          <td width="140">Password: </td>
          <td width="150" align="left"><span id="spryPassword">
            <input type="password" name="password" id="password">
          </span></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Login">  </td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1">
    </form>
    </div>
<!-- end .content --></div>
  <div id="body"><!-- body div for footer --></div>
  <div class="footer">PHPoor Security
  <!-- end .footer --></div>
  <!-- end .container --></div>
<script type="text/javascript">
<?php include("../_includes/menuBar1.php"); ?>
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryPassword", "none", {validateOn:["blur"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryUsername");
</script> 
</body>
</html>
