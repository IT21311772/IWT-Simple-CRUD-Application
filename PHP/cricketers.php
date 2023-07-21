<?php
    require_once "database.php";
    // Retrieve the form data from the database
    $sql = "SELECT * FROM players";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Crickters</title>
        <link rel="stylesheet" href="../CSS/headerFooter.css">
    </head>
    <body>
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

    <button style="background-color: rgb(149, 237, 176);
                        border-radius: 5px;
                        border-color: #84edd4ff;
                        border-width: 0px;
                        font-weight: bold;
                        font-size: 18px;
                        cursor: pointer;
                        margin-top: 20px;
                        margin-left: 1380px;"><a href="./addCrickters.php" 
                        style="text-decoration: none;
                        color: #FFF;"
                        >Add Player</a></button>

    <table border="1" style="
                        border-color: #009270;
                        font-size: 18px;
                        width: 700px;
                        margin-top: -140px;
                        margin-left: 400px;">
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Type</th>
        </tr>
    <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>" . $row["type"] . "</td><br>";
                echo "</tr>";
            }
        } else {
            echo "No data found.";
        }

        // Close the connection
        $conn->close();
    ?>
    </table>
    <br><br><br><br>
    
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
</html>