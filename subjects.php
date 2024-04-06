<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matična knjiga učenika</title>
    <script src="https://kit.fontawesome.com/a47266d986.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/style.css"> <!-- Poveznica na CSS datoteku -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<?php
session_start();

// Provjera sesije na temelju korisničkog imena
if (isset($_SESSION['username'])) {
    // Ako je korisnik uspješno prijavljen
?>
<nav>
    <ul>
        <li><a href="index.php" class="home_btn"><i class="fa-solid fa-house"></i> Početna</a></li>
        <li><a href="students.php" class="students_btn"><i class="fas fa-user"></i> Učenici</a></li>
        <li><a href="classes.php" class="classes_btn"><i class="fas fa-users"></i> Razredi</a></li>
        <li><a href="logout_index.php"  class="close_btn"><i class="fas fa-circle-xmark"></i></a></li>
    </ul>
</nav>






<?php
} else {
    // Ako korisnik nije prijavljen, uključite index_login.php
    include 'index_login.php';
}
?>

<footer>    
    <p>© 2024 Mihael Ivkovic</p>
</footer>
</body>
</html>

