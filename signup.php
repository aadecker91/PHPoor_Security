<?php require_once('Connections/tournamentroster.php'); ?>
<?php
/*if (!function_exists("GetSQLValueString")) {
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
  $insertSQL = sprintf("INSERT INTO sony (UFID, firstName, lastName, phoneNumber, email) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ufid'], "text"),
                       GetSQLValueString($_POST['firstname'], "text"),
                       GetSQLValueString($_POST['lastname'], "text"),
                       GetSQLValueString($_POST['phonenumber'], "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_tournamentroster, $tournamentroster);
  $Result1 = mysql_query($insertSQL, $tournamentroster) or die(mysql_error());

  $insertGoTo = "signup.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_tournamentroster, $tournamentroster);
$query_rsRoster = "SELECT firstName, lastName FROM sony ORDER BY firstName ASC";
$rsRoster = mysql_query($query_rsRoster, $tournamentroster) or die(mysql_error());
$row_rsRoster = mysql_fetch_assoc($rsRoster);
$totalRows_rsRoster = mysql_num_rows($rsRoster);
*/?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UF Club Tennis</title>
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
<link href="_CSS/styleSheet.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<meta name="description" content="Sign up for UF Club Tennis Tournaments." />
<meta name="keywords" content="UF Club Tennis, contact, University of Florida, RecSports, tennis, sign up" />
</head>

<body>
 <div class="container">
  <div class="header"><img src="_images/Logo.png" alt="Logo" width="900" height="160" />
  <?php include("_includes/header.php"); ?>
  <!-- end .header --></div>
  <h1>Sony Open Sign Up</h1>
  <div class="content">
  <p>Here you can sign up for the Sony Open, which will take place in Miami, FL on March 22nd. We are planning on taking around 20-25 players to the Sony this year. The last day to sign up for this event will be Monday, March 17th.</p>
  <p>&nbsp;</p>
  <p>If you have not attended at least one event outside of tournaments, you are not eligible to attend the Sony. You can find the current event attendance <a href="events.php">here</a>. If you have attended 4 or more events prior to the Sony, you are guaranteed to go to the Sony, and you can buy your ticket at the Sony Open Website. I recommend buying a day stadium ticket (around $79), which will give you access to the grounds all day on Saturday. We will only be attending the Sony on Saturday, March 22nd. So do not but a ticket/package that includes Sunday unless you have an alternate way of getting back to Gainesville.</p>
  <p>&nbsp;</p>
  <p> If you have already signed up, but can no longer attend, please email me at aadecker91@gmail.com. </p>
  <p>&nbsp;</p>
  <p>The current list of applicants can be found under the entry form.</p>
    <p>&nbsp;</p>
    <div class="content2">
    <form name="form1" method="POST" action="<?php //echo $editFormAction; ?>">
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
          <td width="140">UFID: </td>
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
    <?php /*do { ?>
      <p><?php echo $row_rsRoster['firstName']; ?> <?php echo $row_rsRoster['lastName']; ?></p>
      <?php } while ($row_rsRoster = mysql_fetch_assoc($rsRoster)); */?>
<!-- end .content --></div>
  <div id="body"><!-- body div for footer --></div>
  <div class="footer">UFClubTennis.com
  <!-- end .footer --></div>
  <!-- end .container --></div>
<script type="text/javascript">
<?php include("_includes/menuBar1.php"); ?>
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"], hint:"John"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryLastName", "none", {validateOn:["blur"], hint:"Smith"});
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryUFID", "custom", {validateOn:["blur"], hint:"1234-5678", pattern:"0000-0000"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("spryPhone", "phone_number", {validateOn:["blur"], hint:"(123) 456-7890"});
var sprytextfield5 = new Spry.Widget.ValidationTextField("spryEmail", "email", {validateOn:["blur"], hint:"JohnS@xyz.com"});
</script> 
</body>
</html>
<?php
//mysql_free_result($rsRoster);
?>
