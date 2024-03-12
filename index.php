<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    require_once "autoloader.php";

    $connection = new Connection();
    $conn = $connection->getConn();

    $recPag = 6;
    $pagAct = isset($_GET["page"]) ? $_GET["page"] : 1;

    $query = 'SELECT * FROM cartera';
    $result = mysqli_query($conn, $query);
    $numRows = mysqli_num_rows($result);
    $pag = ceil($numRows / $recPag);
    $primReg = ($pagAct - 1) * $recPag;

    echo '<table class="table table-striped">';
    echo '<tr>
            <th>Id</th>
            <th>Company</th>
            <th>Investment</th>
            <th>Date</th>
            <th>Active</th>
            <th colspan="2">Actions</th>
          </tr>';

    mysqli_data_seek($result, $primReg);
    for ($i = 0; $i < $recPag && $row = mysqli_fetch_assoc($result); $i++) {
        echo '<tr>';
        foreach ($row as $element) {
            echo '<td>' . $element . '</td>';
        }
        echo '<td><a href="add.php?id="><img src="img/insertar.png" width="25" height="25"></a></td>';
        echo '<td><a href="delete.php?Id=' . $row['Id'] . '"><img src="img/delete.png" width="25" height="25"></a></td>';
        echo '<td><a href="edit.php?id=' . $row['Id'] . '"><img src="img/edit.png" width="25" height="25"></a></td>';
        echo '</tr>';
    }
    echo '</table>';

    for ($i = 1; $i <= $pag; $i++) {
        echo '<a href="index.php?page=' . $i . '">' . $i . '</a> ';
    }


    ?>
</body>

</html>
