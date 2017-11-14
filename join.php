<?php
	if(isset($_POST['submit'])){
	  require_once('mail.php');
		$sent = mail_sent($_POST);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
<title>Hispanic Business Student Association at the Ohio State University</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" href="indexcss.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
</head>

<body>

<div id="header"><h1>Hispanic Business Student Association at the Ohio State University</h1></div>

<div id="container">

<ul id="nav">
	<li><a href="index.htm">Home</a></li>
  <li><a class="location" href="about.htm">About</a></li>
  <li><a href="news.htm">Features</a></li>
  <li><a href="profile.htm">Profiles</a></li>
  <!--<li><a href="index.htm">Calendar</a></li>
  <li><a href="index.htm">Forum</a></li>
  <li><a href="index.htm">Links</a></li>-->
</ul>

<ul id="nav02">
	<li><a href="about.htm">Introduction</a></li>
  <li><a href="achievements.htm">Achievements</a></li>
  <li><a href="constitution.htm">Constitution</a></li>
  <li><a href="benefits.htm">Benefits</a></li>
  <li><a class="location" href="join.php">Join Today!</a></li>
</ul>

<div id="content">
	<img id="theimage" src="images/mason.jpg" alt="Mason Hall at The Ohio State University" width="270" height="400" />
  <div id="images">
		<a href="images/Welcome6.jpg" rel="lightbox[roadtrip]"><img src="images/Welcome6.jpg" height="60" width="60" alt="image"/></a>
		<a href="images/Welcome5.jpg" rel="lightbox[roadtrip]"><img src="images/Welcome5.jpg" height="60" width="60" alt="image"/></a>
		<a href="images/welcomeHBSA1.jpg" rel="lightbox[roadtrip]"><img src="images/welcomeHBSA1.jpg" height="60" width="60" alt="image"/></a>
    <a href="images/WelcomePage2.jpg" rel="lightbox[roadtrip]"><img src="images/WelcomePage2.jpg" height="60" width="60" alt="image"/></a>
    <a href="images/WelcomePage.jpg" rel="lightbox[roadtrip]"><img src="images/WelcomePage.jpg" height="60" width="60" alt="image"/></a>
	</div><!--images-->
  <div id="words">
    <div class="expand" onclick="new Effect.toggle($('theimage'),'appear')">Click here to expand/contract this text</div>
		<form action="/join.php" method="post">
		<fieldset>
		<!--<legend >Contact Information</legend>-->
		<div class="clear"><label for="name" >Name:</label><input id="name" name="name" type="text" /></div>
    <div class="clear"><label for="email">Email:</label><input id="email" name="email" type="text" /></div>
    <div class="clear"><label for="misc">Comments:</label><textarea id="misc" name="misc" rows="8" cols="25"></textarea></div>
  </fieldset>
  <fieldset>
    <div class="clear"><input id="submit" name="submit" value="Submit" type="submit" /></div>
  </fieldset>
</form>

  </div><!--words-->
</div><!--content-->

</div><!--container-->

</body>

</html>