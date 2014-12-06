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
<meta name="keywords" content="XSS, Cross Site Scripting, PHPoor Security">
<meta name="description" content="Cross Site Scripting XSS">
</head>

<body>

<div class="container">
  <div class="header"><img src="_images/Logo.png" width="900" height="160" alt="Logo"> 
  <?php include("_includes/header.php"); ?>
  <!-- end .header --></div>
  <div class="sidebar1">
    
    <ul id="MenuBar2" class="MenuBarVertical">
<li><a href="cross_site_scripting/challenge_1.php">Challenge 1</a></li>
    <li><a href="cross_site_scripting/challenge_2.php">Challenge 2</a></li>
    <li><a href="cross_site_scripting/challenge_3.php">Challenge 3</a></li>
<li><a href="preventing_XSS.php">Preventing XSS</a></li>
  </ul>
  <p>Information on OWASP and the OWASP top ten project can be found <a href="https://www.owasp.org/index.php/Main_Page">here</a></p>
  <!-- end .sidebar --></div>
    <h1>Preventing Cross Site Scripting</h1>
  <div class="content">
    <p>XSS (Cross Site Scripting) flaws occur whenever an application takes untrusted data and sends it to a web browser without proper validation or escaping. XSS allows attackers to execute scripts in the victim’s browser which can hijack user sessions, deface web sites, or redirect the user to malicious sites.</p>
    <p>PHP is often used to connect to a server database and query/modify server data. After connection to the database this can be done in the following manner:</p>
    <blockquote><code>
      if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {<br>
  $insertSQL = sprintf("INSERT INTO database (message, firstname, lastname) VALUES (%s, %s, %s)",<br>
                       GetSQLValueString($_POST['message'], "text"),<br>
                       GetSQLValueString($_POST['firstname'], "text"),<br>
                       GetSQLValueString($_POST['lastname'], "text"));<br><br>

  mysql_select_db($database_sandbox, $sandbox);<br>
  $Result1 = mysql_query($insertSQL, $sandbox) or die(mysql_error());<br>
    </code></blockquote>
    <p>And then the data can be fetched using recordsets as follows:</p>
    <blockquote><code>
    mysql_select_db($database_sandbox, $sandbox);<br>
	$query_rsRoster = "SELECT firstname, lastname, message FROM database";<br>
	$rsRoster = mysql_query($query_rsRoster, $sandbox) or die(mysql_error());<br>
	$row_rsRoster = mysql_fetch_assoc($rsRoster);<br>
	$totalRows_rsRoster = mysql_num_rows($rsRoster);<br>
    </code></blockquote>
    <p>And the items fetched from the database can be displayed as follows:</p>
    <blockquote><code>&lt;?php do { ?&gt;<br>
&lt;p&gt;&lt;?php echo $row_rsRoster['firstname']; ?&gt; &lt;?php echo $row_rsRoster['lastname']; ?&gt;&lt;/p&gt;<br>
&lt;p&gt;&lt;?php echo $row_rsRoster['message']; ?&gt;&lt;/p&gt;<br>
&lt;?php } while ($row_rsRoster = mysql_fetch_assoc($rsRoster)); ?&gt;</code></blockquote>
	<p> However, if there are any scripts being fetched from the database, they will be unintentionally executed. To counter this you can use escape keys built in to PHP.  This prevents arbitrary code from being executed unintentionally. You could also take the following apporach and use the htmlspecialchars PHP function:</p>
    <blockquote><code>&lt;?php do { ?&gt;<br>
&lt;p&gt;&lt;?php echo htmlspecialchars($row_rsRoster['firstname']); ?&gt; &lt;?php echo htmlspecialchars($row_rsRoster['lastname']); ?&gt;&lt;/p&gt;<br>
&lt;p&gt;&lt;?php echo htmlspecialchars($row_rsRoster['message']); ?&gt;&lt;/p&gt;<br>
&lt;?php } while ($row_rsRoster = mysql_fetch_assoc($rsRoster)); ?&gt;</code></blockquote>
  </div>
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
