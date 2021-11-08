<?php

$servername = "localhost";
$username = "root"; //aqui se sugier cambiar el usuario root
$password = "";
$dbname = "mydb";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>