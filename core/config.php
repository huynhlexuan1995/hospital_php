<?php
	$mysql_server = "localhost";
	$mysql_username = "root";
	$mysql_password = "";
	$mysql_db_name = "benhvien";
	$conn = mysqli_connect($mysql_server, $mysql_username, $mysql_password,$mysql_db_name);
	mysqli_set_charset($conn,'utf8');
?>
