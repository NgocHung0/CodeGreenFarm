<?php

$DBhost = "localhost";
$DBuser = "root";
$DBpassword ="";
$DBname="ql_greenfarm";

$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname); 

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}
//echo "Kết nối thành công";
?> 