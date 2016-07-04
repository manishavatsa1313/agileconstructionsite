<?php
require("config.inc.php");
if (!empty($_POST)) {
$login_ok=false;
$query = "SELECT username, password, userid FROM users WHERE username = :username ";
$query_params = array(':username' => $_POST['username']);
try {
$stmt   = $db->prepare($query);
$result = $stmt->execute($query_params);
}
catch (PDOException $ex) {
$response["success"] = 0;
$response["message"] = "Database Error1. Please Try Again!";
die(json_encode($response));        
}
$row = $stmt->fetch();
if ($row) {
if (md5($_POST['password']) === $row['password']) {
$login_ok = true;
}
}
if ($login_ok) {
$response["row"]=$row;
$response["success"] = 1;
$response["message"] = "Login successful!";
print( json_encode($response));
$key=rand();
$_SESSION['key']=$key;
file_put_contents("C:/Users/Madhav Desh/verification.txt", md5($key));
header("Location:admin_main.php");
} else {
$response["success"] = 0;
$response["message"] = "Invalid Credentials!";

echo "<script type='text/javascript'>alert('Invalid Credentials'); window.location.href = 'admin.php'; </script>";
}
} 
else {
?>
<head>
<link rel="stylesheet" type="text/css" href="style1.css" />
</head>
<body>
<h1 style="position:absolute;top:70;left:625;color:yellow;">LOGIN</h1>
<form id="loginform" method="post" action="admin.php">
<input type="text" class="input" name="username" placeholder="Username" /> 
<input type="password" class="input" name="password" placeholder="Password" />
<input type="submit" class="loginbutton" value="SIGN IN"  />
</form>
	<?php
}

?> 
