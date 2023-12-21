            <?php
            session_start();
            include("php/config.php");
            $id = $_GET["id"];
            if ($_GET["id"]) {
                $deleteSql = "DELETE FROM voiture WHERE id='$id'";
                mysqli_query($con, $deleteSql);
                header("Location: home.php");
            }
            ?>

            </html>