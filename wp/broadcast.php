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
ini_set('max_execution_time', 300);
if (!empty($_POST)) {
$query = "SELECT * FROM newsletter";
try {
$stmt   = $db->prepare($query);
$result = $stmt->execute();
}
catch (PDOException $ex) {
$response["success"] = 0;
$response["message"] = "Database Error1. Please Try Again!";
die(json_encode($response));        
}
$row = $stmt->fetchAll();
foreach ($row as &$value) {
    
$deliver=mail($value['email'],$_POST['title'],$_POST['body'],'From: cbmsce@gmail.com');
echo($value['email']);
echo(":");
echo($deliver);
echo("<br />");
}
header("Location:admin_main.php");
}
else
{
?>
<head><link rel="stylesheet" type="text/css" href="style1.css"/></head>
		<h1 style="position:absolute;top:50;left:550;color:yellow;">SEND NEWSLETTER</h1>
		<form id="loginform" action="broadcast.php" method="post"> 
		    <input type="text" class="input" name="title" placeholder="title" style="width:700;position:relative;left:-200" /> 
		    <br /><br />  
                    <textarea class = "input" rows = "10" name="body" style="width:700;position:relative;left:-200;" placeholder="body"></textarea>
		    <br /><br /> 
		    <input type="submit" class="loginbutton" value="Send" style="position:relative;top:15;" /> 
		</form> 
<?php
}
}
else
{
echo "AHA! We have a hacker";
}
?>