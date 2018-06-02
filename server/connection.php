<?php

$conn = new mysqli('localhost', 'root', '', 'cookbook');

if($conn->connect_errno){
	die("Failed to connect : " . $conn->connect_error);
}

date_default_timezone_set('Asia/Jakarta');


?>