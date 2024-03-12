<?php
require_once "autoloader.php";
$connection = new Connection();
$conn = $connection->getConn();

for ($i = 1; $i <= 50; $i++) {
    $id = $i;
    $company = "Company " . $i;
    $investment = rand(1000, 100000);
    $date = 2021/2/20;
    $active = rand(0, 1);
    $query = "INSERT INTO cartera (Id, Company, Investment, Date, Active)
              VALUES ('$id', '$company', '$investment', '$date', '$active')";


    mysqli_query($conn, $query);
    $result = $conn->query($query);
    $result->data_seek($i);

}




?>