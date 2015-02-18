<?php 
include_once('statics.php'); 
$query = mysql_query("create table if not exist '$gtable' ('id int(11) not null auto_increment','ip varchar(32) not null','timestamp varchar(32) not null')");  
if(!$query) {  
$msg = "Installation errors!"; 
$result = "You can install manually by importing <u><a href='inc/statics.sql'>statics.sql</a></u> file into your database named: <b>$data </b>\n <u><a href='inc/statics.sql'>statics.sql</a></u> can be found on inc folder";
 } 
else { 
 $msg = "Installation Successfull!"; 
 $result = "The table created with the name: '$gtable' in the database: '$data'"; 
 } 
?> 
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><link rel="stylesheet" href="css/style.css" media="all" /><title>Install Statics- Techsdl Inc</title><link rel="shortcut icon" href="css/favicon.ico" type="icon/x-png" />
</head><body><div class="nav"><div id="logo"></div><div style="padding-top:8px;"><b>STATICS ONLINE - TECHSDL INC</b></div></div><br/><div class="page"><div style="color:#008000;" align="center"><h2>STATICS ONLINE - PHP MYSQL</h2></div><div align="center">[<u><a href="./index.php">Statics Home</a></u> | <u><a href="http://techsdl.info/product/">Get More Free Script</a></u> | <u><a href="http://my.techsdl.info/">Join Techsdl as Developer</a></u>]</div><hr/><div class="code"><b> Installation result - <?php echo $msg; ?></b><hr/><?php echo $result; ?></div></div></body></html>
