<?php

// Copyright 2010–2012, David Öhlin
// GNU GPL 3.0 or later

header('Cache-Control: no-cache');
header('Pragma: no-cache');
header('Content-Type: text/html; charset=utf-8');

$auto = isset($_GET['auto']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
 <head>
  <title>Cross-wiki random page tool</title>
<?php
if($auto)
{
?>
  <script type="text/javascript">
   function reloadwiki()
   {
       parent.location.reload();
   }
   
   function reloadtimer()
   {
       setTimeout("reloadwiki();", 10000);
   }
  </script>
<?php
}
?>
 </head>
 <body style="background: #f0f0f0; color: black;"<?php
if($auto)
	echo " onload=\"reloadtimer();\"";
?>>
  <div>
   <form action="./" method="post" target="_top">
<?php
if(isset($_GET['auto']))
{
?>
    <a href="./" target="_top">Turn off auto</a>
<?php
}
else
{
?>
    <input type="submit" id="randompage" value="Random page">
	<a href="auto.php" target="_top">Turn on auto</a>
<?php
}

if(isset($_GET['c']))
	echo "    (from " . htmlspecialchars($_GET['c']) . " Wikimedia wikis)\n";
if(isset($_GET['lang']))
{
	echo "    – Currently showing <strong>" . htmlspecialchars($_GET['lang']) . "</strong>";
	if(isset($_GET['langname']))
		echo " (" . htmlspecialchars($_GET['langname']) . ")";
	if(isset($_GET['sitecode']))
		echo " <strong>" . htmlspecialchars($_GET['sitecode']) . "</strong>";
	echo "\n";
}
?>
   </form>
  </div>
 </body>
</html>
