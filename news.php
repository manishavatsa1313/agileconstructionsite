<?php
require("config.inc.php");
if (!empty($_POST)) {
$query = "SELECT email FROM newsletter WHERE email = :email ";
$query_params = array(':email' => $_POST['email']);
try {
$stmt   = $db->prepare($query);
$result = $stmt->execute($query_params);
}
catch (PDOException $ex) {
$response["success"] = 0;
$response["message"] = "Database Error1. Please Try Again!";
echo "<script type='text/javascript'>alert(\"Database Error1. Please Try Again!\");
window.location.href = 'home.html';</script>";
}
$row = $stmt->fetch();
if($row)
{
$response["success"] = 0;
$response["message"] = "This email has already been registered";
echo "<script type='text/javascript'>alert(\"This email has already been registered\");
window.location.href = 'home.html';</script>";  
}
else
{
$query = "INSERT into newsletter (name,email) VALUES (:name,:email)";
$query_params = array(':name' => $_POST['name'],':email' => $_POST['email']);
try {
$stmt   = $db->prepare($query);
$result = $stmt->execute($query_params);
}
catch (PDOException $ex) {
$response["success"] = 0;
$response["message"] = "Database Error2. Please Try Again!";
echo "<script type='text/javascript'>alert(\"Database Error2. Please Try Again!\");
window.location.href = 'home.html';</script>";
}
$response["success"] = 1;
$response["message"] = "Thank you for registering! We'll keep you posted on anything important.";
echo "<script type='text/javascript'>alert(\"Thank you for registering! We'll keep you posted on anything important.\");
window.location.href = 'home.html';
</script>";
}
}
else {
?>
		<h1>Newsletter</h1> 
		<form action="news.php" method="post"> 
		    Name:<br /> 
		    <input type="text" name="name" placeholder="name" /> 
		    <br /><br /> 
		    Email:<br /> 
		    <input type="text" name="email" placeholder="email" /> 
		    <br /><br /> 
		    <input type="submit" value="Submit" /> 
		</form> 
	<?php
}
?> 
