<?php
session_start();

include("php/config.php");


$sql = "SELECT * FROM voiture";



$id = $_SESSION['id'];
$result = mysqli_query($con, "SELECT * FROM user WHERE id='$id' ") or die("Select Error");
$user = mysqli_fetch_assoc($result);

// print $user['role'];

$result = mysqli_query($con, $sql) or die("Select Error");
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

// print_r($row);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a> </p>
        </div>
        <div class="right-links">
            <?php
            print "welcome " . $_SESSION['nom'];
            ?>
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>
    <div>
        <a href="add.php"> <button type="button" class="btn btn-primary">add</button> </a>
        <br></br>
        <table border="1">
            <tr id="items">
                <th>Nom</th>
                <th>Categ</th>
                <?php
                if ($user['role'] == 1) {
                    echo "<th>Modifier</th>";
                    echo "<th>Supprimer</th>";
                }
                ?>
            </tr>
            <?php
            foreach ($row as $val) {
                echo "<tr>";
                echo "<td>" . $val["nom"] . "</td>";
                echo "<td>" . $val["categ"] . "</td>";

                if ($user['role'] == 1) {
                    echo "<td><a href='edit.php?id=" . $val["id"] . "'>Edit</a></td>";
                    echo "<td><a href='delete.php?id=" . $val["id"] . "'>Delete</a></td>";
                }

                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>