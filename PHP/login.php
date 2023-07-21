<?php
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="../CSS/login.css">
    </head>
    <body>
        <div class="container">

            <?php
                if (isset($_POST["login"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    require_once "database.php";

                    $sql = "SELECT * FROM users WHERE username = '$username'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($user) {
                        session_start();
                        $_SESSION["user"] = "yes";
                        header("Location: index.php");
                        die();
                    }else {
                        echo "<script> alert('Credentials does not match !') </script>";
                    }
                }
            ?>

            <form action="login.php" method="post">
                <h1>LOGIN NOW</h1><br>
                <div class="form-input">
                    <input type="text" name="username" id="username" placeholder="Enter your Username"><br><br>
                </div>
                <div class="form-input">
                    <input type="password" name="password" id="password" placeholder="Enter your Password"><br><br>
                </div>
                <input type="submit" value="Login" name="login" 
                        style="background-color: rgb(149, 237, 176);
                        border-radius: 5px;
                        border-color: #84edd4ff;
                        border-width: 0px;
                        color: #009270;
                        font-weight: bold;
                        font-size: 18px;
                        cursor: pointer;"><br><br>
                <p>don't have an account? <a href="./register.php">Signup here !</a></p>
            </form>
        </div>
    </body>
</html>