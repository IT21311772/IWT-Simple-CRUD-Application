<!DOCTYPE html>
<head>
    <title>Cric Info</title>
    <link rel="stylesheet" href="../CSS/headerFooter.css">
    <link rel="stylesheet" href="../CSS/addCricketers.css">
</head>
<body>

    <?php

        session_start();
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $gender = $_POST["gender"];
            $status = $_POST["status"];
            $type = $_POST["type"];

            $_SESSION["name"] = $name;
            $_SESSION["gender"] = $gender;
            $_SESSION["status"] = $status;
            $_SESSION["type"] = $type;

            $errors = array();

            if (empty($name) OR empty($gender) OR empty($status) OR empty($type)) {
                array_push($errors, "All fields are required");
            }

            require_once "database.php";

            if (count($errors) > 0) {
                foreach($errors as $error) {
                    echo "<script> alert('$error') </script>";
                }
            } else {
                $sql = "INSERT INTO players(name, gender, status ,type) VALUES ( ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "ssss", $name, $gender, $status, $type);
                    mysqli_stmt_execute($stmt);
                    echo "<script> alert('Data inserted successfully !') </script>";
                } else {
                    die("Data insertion Unsuccessful");
                }
                header("Location: cricketers.php");
                die();
            }
            
        }
    ?>

    <!-- Navigation Bar -->
    <div class="nav-container">
        <nav class="navbar">
            <h1 id="logo">Cric Enfo</h1>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav-menu">
                <li><a href="./cricketers.php" class="nav-links">Players</a></li>
                <li><a href="./champions.php" class="nav-links">Champs</a></li>
                <li><a href="./rankings.php" class="nav-links">Rankings</a></li>
                <li><a href="./logout.php" class="nav-links">Log out</a></li>
            </ul>
        </nav>
    </div>

    <!-- Body Part -->
<div class="form-container">
    <h1>Add Cricketer</h1>
    <form action="addCrickters.php" method="post" onsubmit="return clearForm()">
        <p>Enter Name : <input type="text" name="name" id="name"></p>
        <p>Select Category : 
            <input type="radio" value="Men" name="gender" id="men" checked>
            <label>Men</label>
            <input type="radio" value="Women" name="gender" id="women">
            <label>Women</label>
        </p>
        <p>Select Status : 
            <input type="radio" value="Active" name="status" id="active" checked>
            <label>Active</label>
            <input type="radio" value="Retired" name="status" id="retired">
            <label>Retired</label>
        </p>
        <p>Select Player Type : 
            <select id="type" name="type">
                <option value="Batsman">Batsman</option>
                <option value="Bowler">Bowler</option>
                <option value="AllRounder">All-Rounder</option>
            </select>
        </p>
        <input type="submit" value="Add Cricketer" name="submit">
    </form>
</div>

    <script>
        function clearForm() {
            // Clear the form fields after successful submission
            document.getElementById("male").checked = false;
            document.getElementById("female").checked = false;
            document.getElementById("other").checked = false;
            document.getElementById("city").selectedIndex = 0;
            return true;
        }
    </script>

<br><br><br><br><br>

<!-- Footer -->
<section class="footer">
    <div class="social">
        <a href="https://www.instagram.com"><img src="../Images/insta.jpg" class="instagram" width="50px" height="50px"></a>
        <a href="https://www.facebook.com"><img src="../Images/fb.png" class="fb" width="50px" height="50px"></a>
        <a href="https://www.snapchat.com"><img src="../Images/snap.jpg" class="snap" width="50px" height="50px"></a>
        <a href="https://www.twitter.com"><img src="../Images/twitter.png" class="twitter" width="50px" height="50px"></a>
    </div>
    <ul class="list">
        <li><a href="index.php">Home</a></li>
        <li><a href="../HTML/about.html">About</a></li>
        <li><a href="../HTML/terms.html">Terms</a></li>
        <li><a href="../HTML/privacy.html">Privacy & Policy</a></li>
    </ul>
    <p class="copyright">
        Cricbuzz @ 2023
    </p>
</section>
</body>