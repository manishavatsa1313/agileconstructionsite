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
$query = "SELECT * from contact";
try {
$stmt   = $db->prepare($query);
$result = $stmt->execute();
}
catch (PDOException $ex) {
$response["success"] = 0;
$response["message"] = "Database Error1. Please Try Again!";
die(json_encode($response));        
}
echo "
<h1 style=\"color:yellow;\">LIST OF QUERIES</h1>
<ul>";
$row=$stmt->fetchAll();

foreach ($row as $value)
{
?>
<style>
a:visited{
  color:white;
}
a:link{
color:yellow;
}
</style>
<body style="background-color:#2c3335;
	color:#f5f5f5;
	font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;">
<li style="color:yellow;">
<a style ="font-size:20pt;"href= <?php $link="reply.php?name=".$value['name']."&email=".$value['email']."&subject=".$value['subject']; echo str_replace(" ","%20",$link); ?> >
<?php echo $value['name']; ?>
</a>
</li><br />
<?php
}
echo "</ul>";
}
else
{
echo "AHA! We have a hacker";
}
?> 