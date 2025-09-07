<?php
// filepath: c:\xampp\htdocs\astroneer\conexao.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "astroneer";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>