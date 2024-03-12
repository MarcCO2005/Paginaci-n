<?php 
require_once "autoloader.php";
$connection = new Connection();
$conn = $connection->getConn();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $active = isset ($_POST["active"]) ? "True" : "False";
    $conn = mysqli_connect('localhost', 'root', '', "ap21");



    $id = $_POST["id"];
    $company = $_POST["company"];
    $investment = $_POST["investment"];
    $date = $_POST["date"];
    $active = $_POST["active"];

    $query = "INSERT INTO cartera (Id, Company, Investment, Date, Active)
    VALUES ('$id', '$company', '$investment', '$date', '$active')";
    mysqli_query($conn, $query);
    mysqli_close($conn);


    header("location: index.php");
}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inversión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 5%;
            border: 1px solid black;
            padding: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
    <h1>Actualizar Campos</h1>
<body>


    <form method="post" action="add.php">
    <label for="Id">Id:</label>
        <input type="text" id="id" name="id" value= "" >

        <label for="company">Company:</label>
        <input type="text" id="company" name="company" value= "" >

         <label for="investment">Investment:</label>
        <input type="number" id="investment" name="investment"  value= "" >


        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value= "">

        <label for="active">Active:</label>
        <input type="text" name="active" id="active">
        

         <button type="submit">Enviar</button>
   
       
    </form>

</body>
</html>
