<?php
session_start();
$id = 100;
include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php

    $query = "SELECT * FROM appoinment_data WHERE id = $id";
    $result = mysqli_query($con,$query);

    echo "<table>
    <tr>
    <th>Name</th>
    <th>Date and Time</th>
    </tr>";

    if($result){
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['datetime'] . "</td>";
            echo "</tr>";
        }
    }
    else
    {
        echo "<tr>";
        echo "<td>Nothing to Show</td>";
        echo "</tr>";
    }
    echo "</table>";

    

    mysqli_close($con);
    ?>
</body>
</html>