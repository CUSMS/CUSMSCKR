<?php
include("../res/x5engine.php");
$nameList = array("heh","yva","ra3","rs7","vy5","53k","3xf","e2n","aff","xt3");
$charList = array("E","K","R","E","L","X","Y","P","K","H");
$cpt = new X5Captcha($nameList, $charList);
//Check Captcha
if ($_GET["action"] == "check")
	echo $cpt->check($_GET["code"], $_GET["ans"]);
//Show Captcha chars
else if ($_GET["action"] == "show")
	echo $cpt->show($_GET['code']);
// End of file x5captcha.php
