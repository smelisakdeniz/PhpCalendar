<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "kartacaweb";

$conn = mysqli_connect($sname, $unmae, $password, $db_name); // pdo ile değşitir bunu kızarlar


if (!$conn) {
	echo "Bağlantı hatası!";
}
?>

