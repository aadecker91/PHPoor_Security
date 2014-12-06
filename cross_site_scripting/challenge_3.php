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
  $insertSQL = sprintf("INSERT INTO XSSChallenge3 (message, firstname, lastname) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['message'], "text"),
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['lastname'], "text"));

  mysql_select_db($database_sandbox, $sandbox);
  $Result1 = mysql_query($insertSQL, $sandbox) or die(mysql_error());

  $insertGoTo = "challenge_3.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_sandbox, $sandbox);
$query_rsRoster = "SELECT firstname, lastname, message FROM XSSChallenge3";
$rsRoster = mysql_query($query_rsRoster, $sandbox) or die(mysql_error());
$row_rsRoster = mysql_fetch_assoc($rsRoster);
$totalRows_rsRoster = mysql_num_rows($rsRoster);
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
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<meta name="description" content="PHPoor Security" />
<meta name="keywords" content="PHPoor Security challenge 1" />
</head>

<body>
 <div class="container">
  <div class="header"><img src="../_images/Logo.png" alt="Logo" width="900" height="160" />
  <?php include("../_includes/header.php"); ?>
  <!-- end .header --></div>
  <h1>Super Secure Web Forum 3</h1>
  <div class="content">
    <p>The form on this page sends data to a database hosted on the server and then displays the name and message associated with that name. Using your knowledge of HTML and scripting, try adding a script that will prompt future visitors for login credentials before they can access this page. </p>
  <p>&nbsp;</p>
  <p>*Hint* This form has no restrictions on what can be entered into the &quot;First Name&quot; and &quot;Last Name&quot; text fields.</p>
    <p>&nbsp;</p>
    <div class="content2">
    <form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
      <table border="1">
        <tr>
          <td>First Name: </td>
          <td align="left">&nbsp;&nbsp;<span id="sprytextfield1">
            <input type="text" name="firstname" id="firstname">
          </span></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td align="left">&nbsp;&nbsp;<span id="spryLastName">
            <input type="text" name="lastname" id="lastname">
          </span></td>
        </tr>
        <tr>
          <td>Message: </td>
          <td>    <p><span id="spryMessage">
            <textarea name="message" id="message" cols="45" rows="5"></textarea>
</span></p>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit">  </td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1">
    </form>
    </div>
    <p>&nbsp;</p>
    <h2>Message Board:</h2>
    <?php do { ?>
      <p><?php echo $row_rsRoster['firstname']; ?> <?php echo $row_rsRoster['lastname']; ?></p>
      <p><?php echo $row_rsRoster['message']; ?></p>
      <?php } while ($row_rsRoster = mysql_fetch_assoc($rsRoster)); ?>
<!-- end .content --></div>
  <div id="body"><!-- body div for footer --></div>
  <div class="footer">PHPoor Security
  <!-- end .footer --></div>
  <!-- end .container --></div>
<script type="text/javascript">
<?php include("../_includes/menuBar1.php"); ?>
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"], hint:"John"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryLastName", "none", {validateOn:["blur"], hint:"Smith"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("spryMessage", {isRequired:false});
</script> 
</body>
</html>
<?php
mysql_free_result($rsRoster);
?>
