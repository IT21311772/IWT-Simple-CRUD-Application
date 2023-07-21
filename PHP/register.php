<?php
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Signup Page</title>
        <link rel="stylesheet" href="../CSS/register.css">
        <link rel="" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="../JS/register.js"></script>
    </head>
    <body>
        <div class="container">

            <?php 
               if (isset($_POST["submit"])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $username = $_POST["username"];
                $password = $_POST["password"];

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $errors = array();

                if (empty($name) OR empty($email) OR empty($phone) OR empty($username) OR empty($password)) {
                    array_push($errors, "All fields are required");
                }

                require_once "database.php";

                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0) {
                    array_push($errors, "User already exists !");
                }

                if (count($errors) > 0) {
                    foreach($errors as $error) {
                        echo "<script> alert('$error') </script>";
                    }
                } else {
                    $sql = "INSERT INTO users(name, email, contact, username, password) VALUES ( ?, ?, ?, ?, ? )";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $username, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<script> alert('You are successfully Registered !!!!') </script>";
                    } else {
                        die("Registration Unsuccessful");
                    }
                }

               } 
            ?>

            <form action="register.php" method="post" id="form">
                <h1>SIGNUP NOW</h1><br>
                <div class="form-input">
                    <input type="text" name="name" id="name" placeholder="Enter your Name"><br><br>
                </div>
                <div class="form-input">
                    <input type="text" name="email" id="email" placeholder="Enter your Email"><br><br>
                    <div class="error"></div>
                </div>
                <div class="form-input">
                    <input type="text" name="phone" id="phone" placeholder="Enter your Contact"><br><br>
                    <div class="error"></div>
                </div>
                <div class="form-input">
                    <input type="text" name="username" id="username" placeholder="Enter your Username"><br><br>
                    <div class="error"></div>
                </div>
                <div class="form-input">
                    <input type="password" name="password" id="password" placeholder="Enter your Password"><br><br>
                    <div class="error"></div>
                </div>
                    <input type="submit" value="Signup Now" name="submit" 
                        style="background-color: rgb(149, 237, 176);
                        border-radius: 5px;
                        border-color: #84edd4ff;
                        border-width: 0px;
                        color: #009270;
                        font-weight: bold;
                        font-size: 18px;
                        cursor: pointer;"><br><br>
                <p>already have an account? <a href="./login.php">Login here !</a></p>
            </form>
        </div>
    </body>
</html>