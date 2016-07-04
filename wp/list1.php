<?php
require("config.inc.php");
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
echo "<ul>";
$row=$stmt->fetchAll();
foreach ($row as $value)
{
?>
<body style="background-color:#2c3335;
	color:#f5f5f5;
	font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;">
<li style="color:yellow;"><?php 
echo json_encode($temp); 
?></li>

<?php
}
echo "</ul>";
?> 