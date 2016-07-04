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
print "<table>";
print "<tr align='center'>";
$row=mysqli_fetch_array($result);
$num_rows=mysql_num_rows($result);
$num_fields=mysql_num_fields($result);


$keys=array_keys($row);
for($index=0;$index<$num_fields;$index++)
print "<th>" . $keys[ 2 *$index+1]. "<\th>";
print"</tr>";

for($row_num=0; $row_num<$num_rows;$row_num++){
   print"<tr align='center'>";
$values=array_values($row);
for($index=0;$index<$num_fields;$index++){
$value=htmlspecialchars($values[2*$index+1]);
print "<th" . $value . "</th>";
}
print "</tr>";
$row=mysql_fetch_array($result);

}
print "</table>"
?> 