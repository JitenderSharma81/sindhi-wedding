<?php
// include 'config/DBConfig.php';
 

//Define your host here.
$HostName = "sql305.epizy.com";
 
//Define your database name here.
$DatabaseName = "epiz_30340341_sindhiweddiDB";
 
//Define your database username here.
$HostUser = "epiz_30340341";
 
//Define your database password here.
$HostPass = "v3mK1FVfuoZ";

// Create connection

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 
 
// fetching record from two tables - register and userprofilestep1 .
/*$sql= "select Name,Height from register s, 
userprofilestep1 m where s.Id = m.RegisterId";
*/

/*
//fetching records from 3 tables - register and userprofilestep1 and userprofilestep3.
$sql = "SELECT register.Name,userprofilestep1.Height,userprofilestep2.FamilyType
from register r
INNER JOIN userprofilestep1 u1 ON r.Id = u1.RegisterID
inner join userprofilestep2 u2 on  r.Id = userprofilestep2.RegisterID";

*/

//fetching records from 3 tables - register and userprofilestep1 and userprofilestep3.

$sql= "SELECT register.Id,register.Name,userprofilestep1.Height,userprofilestep2.FamilyType
FROM register
INNER JOIN userprofilestep1 ON register.Id = userprofilestep1.RegisterID
INNER JOIN userprofilestep2 ON register.Id = userprofilestep2.RegisterID";

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $item = $row;
 
 $json = json_encode($item);
 
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();
?>
