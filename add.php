<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>add</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">

            <?php
            session_start();
            include("php/config.php");
            if (isset($_POST['submit'])) {
                $nom = $_POST['nom'];
                $categ = $_POST['categ'];
                $user = $_POST['user'];

                $sql = "INSERT INTO voiture(nom,categ,user) VALUES('$nom',$categ,$user)";
                print $sql;
                mysqli_query($con, $sql);
                header("Location: home.php");
            } else {

            ?>

                <header>add</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">name</label>
                        <input type="text" name="nom" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="username">categ</label>
                        <input type="text" name="categ" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <input type="hidden" name="user" id="user" value="<?php print $_SESSION["id"]   ?>">
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="add" required>
                    </div>

                </form>
        </div>
    <?php } ?>
    </div>
</body>

</html>