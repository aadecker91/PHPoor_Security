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
<link href="../_CSS/aboutStyleSheet.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css">
<!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<meta name="keywords" content="PHPoor Security">
<meta name="description" content="session management">
</head>

<body>

<div class="container">
  <div class="header"><img src="../_images/Logo.png" width="900" height="160" alt="Logo"> 
  <?php include("../_includes/header.php"); ?>
  <!-- end .header --></div>
  <div class="sidebar1">
    
    <ul id="MenuBar2" class="MenuBarVertical">
      <li><a href="/session_management/challenge_1.php">Challenge</a></li>
      <li><a href="/session_management/tutorial_1.php">Tutorial 1</a></li>
      <li><a href="/session_management/tutorial_2.php">Tutorial 2</a></li>
</ul>
  <p>Information on OWASP and the OWASP top ten project can be found <a href="https://www.owasp.org/index.php/Main_Page">here</a>.</p>
  <!-- end .sidebar --></div>
    <h1>Handling Tokens</h1>
  <div class="content">
    <p>Session management security can be broken up into two major parts: token generation and handling tokens for the duration of the session. We will now go over some key concepts having to do with handling tokens for their lifecycles. These same programming ideas are demonstrated in the book &quot;The Web Application Hacker's Handbook&quot; by Dafyyd Studdard and Marcus Pinto. Anyone looking to touch up on their security skills should check it out.</p>
    <p>&nbsp;</p>
    <p>After a token is generated, it still has to be transfered to and from the server securely. Many websites often will use HTTPS or another form of secure data transfer to initiate a session, but after the session is initiated the website will switch to HTTP or another insecure form of data transfer.</p>
    <p>&nbsp;</p>
    <p>No matter how well your tokens are generated, they still have to be protected throughout their lifecycle. Session tokens at most have to be checked on every page, which means that every page must use a reliable and secure form of data transfer.  </p>
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
