<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHPoor Security</title>
<style type="text/css">
.content {
	padding: 10px 0;
	width: 78%;
	float: right;
	margin-right: 1%;
	background-color: rgba(0,0,255,.2);
	border-radius: 5px;
}
</style>
<link href="_CSS/aboutStyleSheet.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css">
<!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<meta name="keywords" content="PHPoor Security">
<meta name="description" content="Information about Injections and PHP coding">
</head>

<body>

<div class="container">
  <div class="header"><img src="_images/Logo.png" width="900" height="160" alt="Logo"> 
  <?php include("_includes/header.php"); ?>
  <!-- end .header --></div>
  <div class="sidebar1">
    
    <ul id="MenuBar2" class="MenuBarVertical">
<li><a href="injections/challenge_1.php">Challenge 1</a></li>
    <li><a href="injections/challenge_2.php">Challenge 2</a></li>
<li><a href="preventing_injections.php">Preventing Injections</a></li>
    <li><a href="cross_site_scripting.php">Cross Site Scripting</a></li>
    </ul>
  <p>Information on OWASP and the OWASP top ten project can be found <a href="https://www.owasp.org/index.php/Main_Page">here</a>.</p>
  <!-- end .sidebar --></div>
    <h1>Preventing Injections</h1>
  <div class="content">
    <p>Injection flaws, such as SQL, OS, and LDAP injection occur when untrusted data is sent to an interpreter or query as part of a command or query. The attackers hostile data can trick the interpreter into executing unintented commands or accessing data without proper authorization.</p>
    <p>&nbsp;</p>
    <p>PHP is often used to connect to a server database and query/modify server data. After connection to the database this can be done in the following manner:</p>
    <blockquote><code>
      if ((isset($_POST[&quot;MM_insert&quot;])) &amp;&amp; ($_POST[&quot;MM_insert&quot;] == &quot;form1&quot;)) {<br>
$selectSQL = sprintf(&quot;SELECT username FROM Injections2 WHERE password = %s&quot;,<br>
GetSQLValueString($_POST['password'], &quot;text&quot;));<br><br>
mysql_select_db($database_sandbox, $sandbox);<br>
        $Result1 = mysql_query($selectSQL, $sandbox) or die(mysql_error());<br>
        }
    </code></blockquote>
    <p>However, this does not filter what goes into the database, and the user could potentially enter SQL scripts to fetch data. Attackers will use tricks like ' OR 1=1--' to ensure that the username is returned by the query.</p>
    <p>&nbsp;</p>
    <p>User input can be secured by using the PHP mysql_real_escape_string/mysql_escape_string functions as follows:    </p>
    <blockquote><code>if (!function_exists("GetSQLValueString")) {<br>
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {<br>
  if (PHP_VERSION < 6) {<br>
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;<br>
  }<br><br>

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);<br><br>

  switch ($theType) {<br>
    case "text":<br>
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";<br>
      break;   <br> 
    case "long":<br>
    case "int":<br>
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";<br>
      break;<br>
    case "double":<br>
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";<br>
      break;<br>
    case "date":<br>
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";<br>
      break;<br>
    case "defined":<br>
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;<br>
      break;<br>
  }<br>
  return $theValue;<br>
}<br></code></blockquote>
	<p>This ensures that the user input data is properly padded with characters so that if it is an SQL query, it will not be executed with the query on the server.</p>
    <!-- end .content --></div>
    <div id="body"><!-- body div for footer --></div>
  <div class="footer">
    <p>PHPoor Security</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
<script type="text/javascript">
<?php include("_includes/menuBar1.php"); ?>
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
