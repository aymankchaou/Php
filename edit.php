<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Edit</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">
            <?php
            session_start();
            include("php/config.php");
            $id = $_GET["id"];

            $result = mysqli_query($con, "SELECT * FROM voiture WHERE id='$id' ") or die("Select Error");
            $row = mysqli_fetch_assoc($result);
            if (isset($_POST['submit'])) {
                $nom = $_POST['nom'];
                $categ = $_POST['categ'];
                $user = $_POST['user'];

                // Check if the record with the given 'nom' and 'user' already exists

                if ($_GET["id"]) {

                    // Record exists, perform an update
                    $updateSql = "UPDATE voiture SET categ='$categ', nom='$nom'  WHERE id='$id'  ";
                    mysqli_query($con, $updateSql);

                    echo "<div class='message'>
                            <p>Record updated successfully!</p>
                        </div> <br>";
                    header("Location: home.php");
                }
            } else {
            ?>
                <!-- Your existing form HTML here -->
            <?php } ?>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">name</label>
                    <input type="text" name="nom" id="username" value="<?php print $row['nom'] ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="username">categ</label>
                    <input type="text" name="categ" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <input type="hidden" name="user" id="user" value="<?php print $_SESSION["id"]   ?>">
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Modifier" required>
                </div>

            </form>
        </div>
    </div>
</body>

</html>