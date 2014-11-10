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
</style>
<link href="_CSS/styleSheet.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<meta name="description" content="Contact page for the UF Club Tennis team. You can contact us here." />
<meta name="keywords" content="UF Club Tennis, contact, University of Florida, RecSports, tennis" />
</head>

<body>
<div class="container">
  <div class="header"><img src="_images/Logo.png" alt="Logo" width="900" height="160" />
  <?php include("_includes/header.php"); ?>
  <!-- end .header --></div>
  <h1>Contact Us</h1>
  <div class="content">
    <p>If you have any questions please feel free to use the box below:</p>
    <p>&nbsp;</p>
    <form id="form1" name="form1" method="post" action="http://www.ufclubtennis.com/formmail.php">
      <p><span id="nameTextField">
        <label for="Name"></label>
        <input type="text" name="Name" id="Name" />
        <span class="textfieldRequiredMsg">Please enter your name.</span></span></p>
      <p>&nbsp;</p>
      <p><span id="emailTextField">
      <label for="Email"></label>
      <input type="text" name="Email" id="Email" />
      <span class="textfieldRequiredMsg">An email address is required.</span><span class="textfieldInvalidFormatMsg">Please enter a valid email address.</span></span></p>
      <p>&nbsp;</p>
      <p><span id="messageTextArea">
      <label for="Message"></label>
      <textarea name="Message" id="Message" cols="45" rows="5"></textarea>
      <span id="countmessageTextArea">&nbsp;</span><span class="textareaRequiredMsg">Please enter a message.</span><span class="textareaMinCharsMsg">Minimum number of characters not met.</span><span class="textareaMaxCharsMsg">Exceeded maximum number of characters.</span></span></p>
      <p>
        <input type="submit" name="Submit" id="Submit" value="Submit" />
      </p>
    </form>
  <!-- end .content --></div>
  <div id="body"></div>
  <div class="footer">UFClubTennis.com<!-- end .footer --></div>
  <!-- end .container --></div>
<script type="text/javascript">
<?php include("_includes/menuBar1.php"); ?>
var sprytextfield1 = new Spry.Widget.ValidationTextField("nameTextField", "none", {hint:"Your name"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("emailTextField", "email", {hint:"Your email"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("messageTextArea", {hint:"Your message", minChars:1, maxChars:500, counterType:"chars_remaining", counterId:"countmessageTextArea"});
</script>
</body>
</html>
