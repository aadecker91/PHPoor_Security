<?php require_once('../Connections/tournamentroster.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO challenge (ufid, firstname, lastname, phoneNumber, email) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ufid'], "text"),
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['lastname'], "text"),
                       GetSQLValueString($_POST['phonenumber'], "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_tournamentroster, $tournamentroster);
  $Result1 = mysql_query($insertSQL, $tournamentroster) or die(mysql_error());

  $insertGoTo = "challenge_1.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_tournamentroster, $tournamentroster);
$query_rsRoster = "SELECT firstname, lastname FROM challenge ORDER BY firstname ASC";
$rsRoster = mysql_query($query_rsRoster, $tournamentroster) or die(mysql_error());
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
<meta name="description" content="PHPoor Security" />
<meta name="keywords" content="PHPoor Security challenge 1" />
</head>

<body>
 <div class="container">
  <div class="header"><img src="../_images/Logo.png" alt="Logo" width="900" height="160" />
  <?php include("../_includes/header.php"); ?>
  <!-- end .header --></div>
  <h1>Super Secure Web Sign Up</h1>
  <div class="content">
  <p>This first challenge is relatively simple.</p>
  <p>&nbsp;</p>
  <p>The form on this page sends data to a localhost database and then displays the first and last name of those who sign up. Using your knowledge of HTML, injections, and scripts; redirect any future users to &quot;PHPoorSecurity.com/cross_site_scripting_is_bad.php&quot;. </p>
  <p>&nbsp;</p>
  <p>*Hint* This form has no restrictions on what can be entered into the &quot;First Name&quot; and &quot;Last Name&quot; text fields.</p>
    <p>&nbsp;</p>
    <div class="content2">
    <form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
      <table width="306" border="1">
        <tr>
          <td width="140">First Name: </td>
          <td width="150"><span id="sprytextfield1">
            <input type="text" name="firstname" id="firstname">
          </span></td>
        </tr>
        <tr>
          <td width="140">Last Name: </td>
          <td><span id="spryLastName">
            <input type="text" name="lastname" id="lastname">
          </span></td>
        </tr>
        <tr>
          <td width="140">ID: </td>
          <td><span id="spryUFID">
          <input type="text" name="ufid" id="ufid">
          </span></td>
        </tr>
        <tr>
          <td width="140">Phone Number: </td>
          <td><span id="spryPhone">
          <input type="text" name="phonenumber" id="phonenumber">
          </span></td>
        </tr>
        <tr>
          <td width="140">Email: </td>
          <td><span id="spryEmail">
          <input type="text" name="email" id="email">
          </span></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit">  </td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1">
    </form>
    </div>
    <p>&nbsp;</p>
    <h2>Current Applicants:</h2>
    <?php do { ?>
      <p><?php echo $row_rsRoster['firstname']; ?> <?php echo $row_rsRoster['lastname']; ?></p>
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
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryUFID", "custom", {validateOn:["blur"], hint:"1234-5678", pattern:"0000-0000"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("spryPhone", "phone_number", {validateOn:["blur"], hint:"(123) 456-7890"});
var sprytextfield5 = new Spry.Widget.ValidationTextField("spryEmail", "email", {validateOn:["blur"], hint:"JohnS@xyz.com"});
</script> 
</body>
</html>
<?php
mysql_free_result($rsRoster);
?>
