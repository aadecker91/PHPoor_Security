<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UF Club Tennis</title>
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
<meta name="keywords" content="UF Club Tennis, about, University of Florida, tournaments, serving the community, fundraising, events, becoming a member, officers">
<meta name="description" content="Information about the University of Florida Club Tennis team.  Including community service, fundraising, practices, etc.">
</head>

<body>

<div class="container">
  <div class="header"><img src="_images/Logo.png" width="900" height="160" alt="Logo"> 
  <?php include("_includes/header.php"); ?>
  <!-- end .header --></div>
  <div class="sidebar1">
    
    <ul id="MenuBar2" class="MenuBarVertical">
    <li><a href="how_it_happens.php">How It Happens</a></li>
    <li><a href="session_management/tutorial_1.php">Tutorial 1</a></li>
	<li><a href="session_management/tutorial_2.php">Tutorial 2</a></li>
    <li><a href="session_management/tutorial_3.php">Tutorial 3</a></li>
    <li><a href="session_management/tutorial_4.php">Tutorial 4</a></li>
    <li><a href="something_else.php">Something Else</a></li>
  </ul>
  <p>Information on OWASP and the OWASP top ten project can be found <a href="https://www.owasp.org/index.php/Main_Page">here</a>.</p>
  <!-- end .sidebar --></div>
    <h1>Session Management</h1>
  <div class="content">
    <p>Application functions related to authentication and session management are often not implemented correctly, allowing attackers to compromise passwords, keys, or session tokens, or to exploit other implementation flaws to assume other users’ identities.</p>
    <p>&nbsp;</p>
    <p>Because of the nature of session management vulnerabilities, challenges have been replaced with in depth tutorials on prevention of safe session management protocols.</p>
    <p>&nbsp;</p>
    <p>The information below is taken directly from the OWASP Top Ten Project which can be found <a href="https://www.owasp.org/index.php/Main_Page">here</a>.</p>
    <p>&nbsp;</p>
    <h2>Am I Vulnerable to Hijacking?</h2>
    <p>Are session management assets like user credentials and session IDs properly protected? You may be vulnerable if:</p>
    <p><br>
    1. User authentication credentials aren’t protected when stored using hashing or encryption.</p>
    <p><br>
    2. Credentials can be guessed or overwritten through weak account management functions (e.g., account creation, change password, recover password, weak session IDs).</p>
    <p><br>
    3. Session IDs are exposed in the URL (e.g., URL rewriting).</p>
    <p><br>
    4. Session IDs are vulnerable to session fixation attacks.</p>
    <p><br>
    5. Session IDs don’t timeout, or user sessions or authentication tokens, particularly single sign-on (SSO) tokens, aren’t properly invalidated during logout.</p>
    <p><br>
    6. Session IDs aren’t rotated after successful login.</p>
    <p><br>
      7. Passwords, session IDs, and other credentials are sent over unencrypted connections.</p>
    <p>&nbsp;</p>
    <h2>How Do I Prevent This?</h2>
    <p>The primary recommendation for an organization is to make available to developers:</p>
    <p><br>
    1. A single set of strong authentication and session management controls. Such controls should strive to:</p>
    <p><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    a)meet all the authentication and session management requirements defined in OWASP’s Application Security Verification Standard (ASVS) areas V2 (Authentication) and V3 (Session Management).</p>
    <p><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b)have a simple interface for developers. Consider the ESAPI Authenticator and User APIs as good examples to emulate, use, or build upon.</p>
    <p><br>
      2. Strong efforts should also be made to avoid XSS flaws which can be used to steal session IDs.</p>
    <p>&nbsp;</p>
    <h2>Example Attack Scenarios</h2>
    <p><strong>Scenario #1</strong>: Airline reservations application supports URL rewriting, putting session IDs in the URL: </p>
    <p><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;http://example.com/sale/saleitems;<strong>jsessionid=<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2P0OC2JSNDLPSKHCJUN2JV</strong>?dest=Hawaii </em></p>
    <p>An authenticated user of the site wants to let his friends know about the sale. He e-mails the above link without knowing he is also giving away his session ID. When his friends use the link they will use his session and credit card. </p>
    <p>&nbsp;</p>
    <p><strong>Scenario #2</strong>: Application’s timeouts aren’t set properly. User uses a public computer to access site. Instead of selecting “logout” the user simply closes the browser tab and walks away. Attacker uses the same browser an hour later, and that browser is still authenticated. </p>
    <p>&nbsp;</p>
    <p><strong>Scenario #3</strong>: Insider or external attacker gains access to the system’s password database. User passwords are not properly hashed, exposing every users’ password to the attacker.</p>
    <p> <!-- end .content --></p>
  </div>
    <div id="body"><!-- body div for footer --></div>
  <div class="footer">
    <p>UFClubTennis.com</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
<script type="text/javascript">
<?php include("_includes/menuBar1.php"); ?>
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
