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
    <li><a href="SQL.php">SQL Injections</a>    </li>
    <li><a href="cross_site_scripting.php">Cross Site Scripting</a></li>
	<li><a href="preventing_injections.php">Preventing Injections</a></li>
    <li><a href="injections/challenge_1.php">Challenge 1</a></li>
    <li><a href="injections/challenge_2.php">Challenge 2</a></li>
    <li><a href="injections/challenge_3.php">Challenge 3</a></li>
    <li><a href="injections/challenge_4.php">Challenge 4</a></li>
  </ul>
  <p>Information on OWASP and the OWASP top ten project can be found <a href="https://www.owasp.org/index.php/Main_Page">here</a>.</p>
  <!-- end .sidebar --></div>
    <h1>Injections</h1>
  <div class="content">
    <p>Injection flaws, such as SQL, OS, and LDAP injection occur when untrusted data is sent to an interpreter or query as part of a command or query. The attackers hostile data can trick the interpreter into executing unintented commands or accessing data without proper authorization.</p>
    <p>&nbsp;</p>
    <p>To the right are three challenges designed to test an understanding of how injections can be used to access and modify data. After the challenges have been completed, the code modifications necessary to stop these attacks will be shown.</p>
    <p>&nbsp;</p>
    <p>The information below is taken directly from the OWASP Top Ten Project which can be found <a href="https://www.owasp.org/index.php/Main_Page">here</a>.</p>
    <p>&nbsp;</p>
    <h2>Am I Vulnerable To Injection?</h2>
    <p>The best way to find out if an application is vulnerable to injection is to verify that all use of interpreters clearly separates untrusted data from the command or query. For SQL calls, this means using bind variables in all prepared statements and stored procedures, and avoiding dynamic queries.</p>
    <p>&nbsp;</p>
    <p>Checking the code is a fast and accurate way to see if the application uses interpreters safely. Code analysis tools can help a security analyst find the use of interpreters and trace the data flow through the application. Penetration testers can validate these issues by crafting exploits that confirm the vulnerability.</p>
    <p>&nbsp;</p>
    <p>Automated dynamic scanning which exercises the application may provide insight into whether some exploitable injection flaws exist. Scanners cannot always reach interpreters and have difficulty detecting whether an attack was successful. Poor error handling makes injection flaws easier to discover.</p>
    <p>&nbsp;</p>
    <h2>How Do I Prevent Injection?</h2>
    <p>1. The preferred option is to use a safe API which avoids the use of the interpreter entirely or provides a parameterized interface. Be careful with APIs, such as stored procedures, that are parameterized, but can still introduce injection under the hood.</p>
    <p><br>
      2. If a parameterized API is not available, you should carefully escape special characters using the specific escape syntax for that interpreter. OWASP’s ESAPI provides many of these escaping routines.</p>
    <p><br>
      3. Positive or “white list” input validation is also recommended, but is not a complete defense as many applications require special characters in their input. If special characters are required, only approaches 1. and 2. above will make their use safe. OWASP’s ESAPI has an extensible library of white list input validation routines.</p>
    <p>&nbsp;</p>
    <h2>Example Attack Scenarios</h2>
    <p><strong>Scenario #1</strong>: The application uses untrusted data in the construction of the following vulnerable SQL call:</p>
    <p><br>
      <em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;String query = &quot;SELECT * FROM accounts WHERE custID='&quot; + <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;request.getParameter(&quot;id&quot;) + &quot;'&quot;;</em></p>
    <p><br>
    <strong>Scenario #2</strong>: Similarly, an application’s blind trust in frameworks may result in queries that are still vulnerable, (e.g., Hibernate Query Language (HQL)):</p>
    <p><br>
      <em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Query HQLQuery = session.createQuery(“FROM accounts<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WHERE custID='“ + request.getParameter(&quot;id&quot;) + &quot;'&quot;);</em></p>
    <p><br>
    In both cases, the attacker modifies the ‘id’ parameter value in her browser to send:<em> ' or '1'='1</em>. For example:</p>
    <p><br>
    <em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;http://example.com/app/accountView?id=' or '1'='1</em></p>
    <p><br>
      This changes the meaning of both queries to return all the records from the accounts table. More dangerous attacks could modify data or even invoke stored procedures.</p>
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
