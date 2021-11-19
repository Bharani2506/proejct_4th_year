<?php 
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'emp_maintenance_v1';

$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);


if ($conn) {
// echo "connection succes..";
}
else {
   die('did not connect DB'.mysqli_connect_error());
   }

?>