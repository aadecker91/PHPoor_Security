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
    <li><a href="tutorial_1.php">Tutorial 1</a></li>
	<li><a href="tutorial_2.php">Tutorial 2</a></li>
    <li><a href="tutorial_3.php">Tutorial 3</a></li>
    <li><a href="tutorial_1.php">Tutorial 4</a></li>
    <li><a href="something_else.php">Something Else</a></li>
  </ul>
  <p> Injections are bad!</p>
  <!-- end .sidebar --></div>
    <h1>Session Management</h1>
  <div class="content">
    <p>Info regarding Session Management.</p>
    <!-- end .content --></div>
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