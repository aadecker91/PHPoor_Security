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
    <h1>Token Generation</h1>
  <div class="content">
    <p>Session management security can be broken up into two major parts: token generation and handling tokens for the duration of the session. We will now go over some key concepts having to do with token generation. These same programming ideas are demonstrated in the book &quot;The Web Application Hacker's Handbook&quot; by Dafyyd Studdard and Marcus Pinto. Anyone looking to touch up on their security skills should check it out.</p>
    <p>&nbsp;</p>
    <p>In PHP, many people use cookies to store sessions. The generation of these tokens is very important because if an attacker is able to guess any active tokens he/she can gain access to site elements that are usually restricted.</p>
    <p>&nbsp;</p>
    <p>In PHP, a cookie may be generated as follows:</p>
	<blockquote><code>$cookie_name = &quot;SessionID&quot;;<br>
$cookie_value = mysql_result($Result1, 0);<br>
setcookie($cookie_name, $cookie_value, time() + 86400 * 10, &quot;/&quot;);</code></blockquote>
    <p>This will use the results of an SQL query to create a value for the session ID. This value should go through multiple algorithm to ensure randomness and also should be encrypted. The Mersenne Twister algorithm can be used in conjection with an ID from the database, along with a timestamp, and some form of encryption can be used to create a stronger token.</p>
    <p>&nbsp;</p>
    <p>Once the cookie is set, it is then stored in the clients browser until <code> time() + 86400 * 10 </code> has been reached, which means that the cookie will be set for ten days. For the duration of the ten days, that cookie will be available to the server on any part of the root site (this is done by using the "/", which can be restricted to specific pages).</p>
    <p>&nbsp;</p>
    <p>The cookie can be stored indefinitely by setting the third value to 0. For example, Facebook users have the ability to log in forever on a computer. While this is convenient for a home computer, it introduces a big risk overall because if the user forgets to log out on a public computer, anyone can access their personal data. It is important to know how your web application is being used.  For example, a banking website that has a lot of personal information would normally want a very short timeout for their session just in case the user leaves their computer unattended.</p>
    <p>&nbsp;</p>
    <p>Since the cookie is retrieved from the client, there exist software that can create cookies on the client side. Therefore, if the token can be easily guessed then an attacker could potentially steal another user's session and gain special privileges.</p>
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
