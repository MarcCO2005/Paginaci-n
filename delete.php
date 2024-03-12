<?php 
require_once "autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();
$id = $_GET['Id'];
$query = "DELETE  FROM cartera WHERE id = '$id'";
$conn->query($query);

$conn->close();
header("Location: index.php");