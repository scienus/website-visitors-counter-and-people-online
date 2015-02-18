<?php 
require_once('statics.php'); 
$statics = new statics(); 
$guest = $statics->Guest(); 
$membr = $statics->Members(); 
if(empty($guest)&& empty($membr)) { 
$msg = "There are still some errors!"; } else { $msg = "Statics Test Successfull!"; }
$result = "Guest Online:$guest <br/>Users Online:$membr"; 
?> 
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><link rel="stylesheet" href="css/style.css" media="all" /><title>Test Statics- Techsdl Inc</title><link rel="shortcut icon" href="css/favicon.ico" type="icon/x-png" />
</head><body><div class="nav"><div id="logo"></div><div style="padding-top:8px;"><b>STATICS ONLINE - TECHSDL INC</b></div></div><br/><div class="page"><div style="color:#008000;" align="center"><h2>STATICS ONLINE - PHP MYSQL</h2></div><div align="center">[<u><a href="./index.php">Statics Home</a></u> | <u><a href="http://techsdl.info/product/">Get More Free Script</a></u> | <u><a href="http://my.techsdl.info/">Join Techsdl as Developer</a></u>]</div><hr/><div class="code"><b> Statics Test Result - <?php echo $msg; ?></b><hr/><?php echo $result; ?></div></div></body></html>
