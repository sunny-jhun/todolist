<?php 

$host = 'db4free.net';
$username = 'sunny_9999';
$password = 'Sunz.1996';
$dbname = 'todo_list1996';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('connection failed: ' . mysqli_error($conn));
}


 ?>