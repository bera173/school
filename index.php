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
    <script src="./js/students_script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        <li><a href="students.php" class="students_btn"><i class="fas fa-user"></i> Učenici</a></li>
        <li><a href="classes.php" class="classes_btn"><i class="fas fa-users"></i> Razredi</a></li>
        <li><a href="subjects.php"  class="subjects_btn"><i class="fas fa-book"></i> Predmeti</a></li>
        <li><a href="logout_index.php"  class="close_btn"><i class="fas fa-circle-xmark"></i></a></li>
    </ul>
</nav>

<div class="statistic">
    <?php
        include 'db_connect.php';

            // SQL upit za brojanje redova u tabeli 'school_class'
            $sql = "SELECT COUNT(*) AS num_classes FROM school_class";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Izvlačenje rezultata upita
                $row = $result->fetch_assoc();
                $num_classes = $row["num_classes"];

                // Ispis broja razreda unutar h1 taga
                echo "<h1 class='number_of_classes'>Broj razreda: $num_classes</h1>";
                    } else {
                        echo "Nema rezultata.";
                    }

            // SQL upit za brojanje redova u tabeli 'direction'
            $sql = "SELECT COUNT(*) AS num_directions FROM direction";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Izvlačenje rezultata upita
                $row = $result->fetch_assoc();
                $num_directions = $row["num_directions"];

                // Ispis broja smjerova unutar h1 taga
                echo "<h1 class='number_of_directions'>Broj smjerova: $num_directions</h1>";
                    } else {
                        echo "Nema rezultata.";
                    }
            // SQL upit za brojanje redova u tabeli 'students'
            $sql = "SELECT COUNT(*) AS num_students FROM students";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Izvlačenje rezultata upita
                $row = $result->fetch_assoc();
                $num_students = $row["num_students"];

                // Ispis broja učenika unutar h1 taga
                echo "<h1 class='number_of_students'>Broj učenika: $num_students</h1>";
                    } else {
                        echo "Nema rezultata.";
                    }
            // SQL upit za brojanje redova u tabeli 'subjects'
            $sql = "SELECT COUNT(*) AS num_subjects FROM subjects";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Izvlačenje rezultata upita
                $row = $result->fetch_assoc();
                $num_subjects = $row["num_subjects"];

                // Ispis broja predmeta unutar h1 taga
                echo "<h1 class='number_of_subjects'>Broj predmeta: $num_subjects</h1>";
                    } else {
                        echo "Nema rezultata.";
                    }
        // Zatvaranje konekcije
        $conn->close();
    ?>
</div>

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

