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
if (!empty($_POST)) {
mail($_SESSION['post_data']['email'],$_SESSION['post_data']['subject'],$_POST['response'],'From: cbmsce@gmail.com');
$query = "DELETE from contact WHERE name=:name AND email=:email AND subject=:subject ";
$query_params = array(':name' => $_SESSION['post_data']['name'],':email' => $_SESSION['post_data']['email'],':subject' => $_SESSION['post_data']['subject']);
try {
$stmt   = $db->prepare($query);
$result = $stmt->execute($query_params);
}
catch (PDOException $ex) {
$response["success"] = 0;
$response["message"] = "Database Error1. Please Try Again!";
die(json_encode($response));        
}
header("Location:admin_main.php");
}
else {
$_SESSION['post_data']['name']=str_replace("%27","'",str_replace("%20"," ",$_GET['name']));
$_SESSION['post_data']['email']=str_replace("%27","'",str_replace("%20"," ",$_GET['email']));
$_SESSION['post_data']['subject']=str_replace("%27","'",str_replace("%20"," ",$_GET['subject']));
$query = "SELECT query FROM contact WHERE name = :name AND email = :email AND subject = :subject ";
$query_params = array(
':name' => $_SESSION['post_data']['name'],
':email' => $_SESSION['post_data']['email'],
':subject' => $_SESSION['post_data']['subject']);
try {
$stmt   = $db->prepare($query);
$result = $stmt->execute($query_params);
}
catch (PDOException $ex) {
$response["success"] = 0;
$response["message"] = "Database Error1. Please Try Again!";
}
$row=$stmt->fetch();
?>
<link rel = "stylesheet" type="text/css" href="sty2.css">
<body style="background-color:#2c3335;
	color:#f5f5f5;
	font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;">
<style>
.n{
	background-color:#ffdd00;
	border-radius:5px/5px;
	-webkit-border-radius:5px/5px;
	-moz-border-radius:5px/5px;
	color:#333;
	display:inline-block;
	font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
	font-size:18px;
	font-weight:bold;
	width:270px;
	text-align:center;
	line-height:50px;
	text-decoration:none;
	height:50px;
	margin-top:20px;
	margin-bottom:20px;
	border:none;
	outline:0;
	cursor: pointer;
}
</style>

<center><h1 style="color:yellow;font-size:20pt;">QUERY RESPONSE</h1></center><br />
<label style="color:yellow;font-size:15pt;position:absolute;top:100;left:300;">NAME:
<?php
echo $_SESSION['post_data']['name'];
?>
</label>
<?php
echo "<br />";
?>
<label style="color:yellow;font-size:15pt;position:absolute;top:140;left:300;">SUBJECT:
<?php
echo $_SESSION['post_data']['subject'];
?>
</label>
<?php
echo "<br />";
?>
<label style="color:yellow;font-size:15pt;position:absolute;top:180;left:300;">QUERY:
<?php
echo $row['query'];
?>
</label>
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 

		   
                <label style="color:yellow;font-size:15pt;position:absolute;top:220;left:300;">RESPONSE:
                </label>
		

               <textarea style="position:absolute;top:220;left:450;" name="response" rows="10" placeholder="*response" class="input" cols="100"></textarea>

		    <br /><br /> 
		    <input type="submit" value="Send" class="n"style="position:absolute;top:400;left:640;" /> 
               </label>
		</form> 
	<?php
}
}
else
{
echo "AHA! We have a hacker";
}
?> 
