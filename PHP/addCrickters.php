<!DOCTYPE html>
<head>
    <title>Cric Info</title>
    <link rel="stylesheet" href="../CSS/headerFooter.css">
    <link rel="stylesheet" href="../CSS/addCricketers.css">
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
                <li><a href="./products.php" class="nav-links">Equipments</a></li>
                <li><a href="./cricketers.php" class="nav-links">Players</a></li>
                <li><a href="./champions.php" class="nav-links">Champs</a></li>
                <li><a href="./rankings.php" class="nav-links">Rankings</a></li>
            </ul>
        </nav>
    </div>

    <!-- Body Part -->
<div class="form-container">
    <h1>Add Cricketer</h1>
    <form action="#" method="post">
        <p>Enter Name : <input type="text" name="name" id="name"></p>
        <p>Select Category : 
            <input type="radio" name="men" id="men" checked>
            <label>Men</label>
            <input type="radio" name="women" id="women">
            <label>Women</label>
        </p>
        <p>Select Status : 
            <input type="radio" name="active" id="active" checked>
            <label>Active</label>
            <input type="radio" name="retired" id="retired">
            <label>Retired</label>
        </p>
        <p>Select Player Type : 
            <select id="type" name="type">
                <option value="batsman">Batsman</option>
                <option value="bowler">Bowler</option>
                <option value="allRounder">All-Rounder</option>
            </select>
        </p>
        <input type="submit" value="Add Cricketer">
    </form>
</div>

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