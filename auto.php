<?php

// Copyright 2010–2012, David Öhlin
// GNU GPL 3.0 or later

header('Cache-Control: no-cache');
header('Pragma: no-cache');
header('Content-Type: text/html; charset=utf-8');

require_once("sites.php");

$currentlang = $sites[array_rand($sites)];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
 <title>Cross-wiki random page tool</title>
 <frameset rows="40,*">
<?php
	echo "  <frame src=\"search.php?c=" . count($sites)
		. "&amp;lang=" . urlencode($currentlang["lang"])
		. "&amp;langname=" . urlencode($currentlang["langname"])
		. "&amp;sitecode=" . urlencode($currentlang["sitecode"]);
	if(substr($_SERVER['PHP_SELF'], -8) == "auto.php")
		echo "&amp;auto=true";
	echo "\">\n"; 
	echo "  <frame src=\"" . $currentlang["siteurl"] . "/wiki/Special:Random\" id=\"wikipediaframe\">\n";
?>
 </frameset>
</html>
