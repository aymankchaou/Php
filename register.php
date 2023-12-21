<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="box form-box">
            <?php
            include("php/config.php");
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $prenom = $_POST['prenom'];
                $mail = $_POST['mail'];
                $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_DEFAULT);

                $role = $_POST['role'];

                $sql = "INSERT INTO user(nom,mail,prenom,password,role) VALUES('$name','$mail','$prenom','$password','$role')";
                mysqli_query($con, $sql);

                echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
                echo "<a href='index.php'><button class='btn'>Login Now</button>";
            } else {

            ?>

                <header>Sign Up</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">name</label>
                        <input type="text" name="name" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="username">prenom</label>
                        <input type="text" name="prenom" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="mail" id="email" autocomplete="off" required>
                    </div>


                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <select name="role" id="role">
                        <option value="1">admin</option>
                        <option value="2">editor</option>
                    </select>

                    <div class="field">

                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                    <div class="links">
                        Already a member? <a href="index.php">Sign In</a>
                    </div>
                </form>
        </div>
    <?php } ?>
    </div>
</body>

</html>