<?php
require("config.inc.php");

$checking = @file_get_contents("C:/Users/Madhav Desh/verification.txt");
if(!$checking)
{
$checking="potato";
}
if($_SESSION['key']==null){
    $_SESSION['key']="potato";
}
if(md5($_SESSION['key']) == $checking)
{

?>
<html>
<head>
<title>admin page</title>
<link rel="stylesheet" type="text/css" href="style2.css" />
</head>
<body>
<center><h1 style="position:absolute;top:80;left:552;color:yellow;">ADMIN OPTIONS</h1></center>
<center><a href="broadcast.php"><input type ="button" value="NEWSLETTER" class = "n" style="position:relative;top:185;" /></a></center><br /><br />
<center><a href="list.php"><input type ="button" value="RESPOND" class = "n" style="position:relative;top:180;"/></a></center>
<center><a href = "logout.php"><input type = "button" value="LOGOUT" class = "n"  style="position:relative;top:230;"/></center>
</body>
</html>
<?php

}
else
{
echo "AHA! We have a hacker";
}

?>