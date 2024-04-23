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
        <li><a href="subjects.php"  class="subjects_btn"><i class="fas fa-book"></i> Predmeti</a></li>
        <li><a href="logout_index.php"  class="close_btn"><i class="fas fa-circle-xmark"></i></a></li>
    </ul>
</nav>
<?php
if (isset($_SESSION['success_add_class']) && $_SESSION['success_add_class'] === true) {
    echo '
    <script>
        swal({
            title: "Razred uspješno dodat!",
            icon: "success",
            showConfirmButton: true,
            timer: 5000
        });
    </script>';
    unset($_SESSION['success_add_class']);
}
?>

<?php
if (isset($_SESSION['success_update_class']) && $_SESSION['success_update_class'] === true) {
    echo '
    <script>
        swal({
            title: "Podatci uspiješno sačuvani!",
            icon: "success",
            showConfirmButton: true,
            timer: 5000
        });
    </script>';
    unset($_SESSION['success_update_class']);
}
?>
    <div class="meni">
        <button class="turn_form" onclick="toggleFormContainer()">Dodaj razred</button>
        <button class="turn_table" onclick="toggleClassesTable()">Prikaži tabelu razreda</button>
    </div>
    
<div class="form_container">
        <h2 class="form_title">Dodavanje razreda</h2>
        <form action="add_class.php" onsubmit="return submitForm()" method="POST" class="add_classes_form" id="addClassForm">
        <i id="close_form" onclick="closeFormContainer()" class="fas fa-circle-xmark"></i>
            <label for="class">Razred:</label>
            <input type="text" id="class" name="class" required><br><br>

            <label for="head_teacher">Ime razrednog:</label>
            <input type="text" id="head_teacher" name="head_teacher" required><br><br>
            
            <label for="direction">Smjer:</label>
            <input type="text" id="direction" name="direction" required><br><br>
            
            <label for="school_year">Školska godina(napisati u formatu "yyyy/yy"):</label>
            <input type="text" id="school_year" name="school_year" required><br><br>
            
            <label for="email">Email:</label>
            <input type="e-mail" id="email" name="email" required><br><br>
            <input type="submit" value="Dodaj razred">
        </form>

</div>

<div class="number_classes">
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
                        echo "<h1 class='number_of_classes'>Broj učenika: $num_classes</h1>";
                            } else {
                                echo "Nema rezultata.";
                            }
        ?>
</div>
<div class="classes_table">
    <i id="close_table" onclick="closeClassesTable()" class="fas fa-circle-xmark"></i>
    <h1>Tabela razreda</h1>
    <table class="classes_table">
        <tr>
      <th>Ime</th>
      <th>Prezime</th>
      <th>Datum rođenja</th>
      <th>Razred</th>
      <th>Adresa</th>
      <th>Email</th>
      <th>Akcije</th>
    </tr>
    <?php include 'get_classes.php'; ?>
  </table>
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

