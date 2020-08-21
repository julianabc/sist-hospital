<?php 

$conn = mysqli_connect("localhost", "root", "", "ad2");

if ($conn->connect_error) {

	die("Falha na conexão: ". $conn->connect_error);
}


?>