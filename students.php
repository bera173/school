<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matična knjiga učenika</title>
    <script src="https://kit.fontawesome.com/a47266d986.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/students.css"> <!-- Poveznica na CSS datoteku -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./js/students_script.js"></script>
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
        <li><a href="classes.php" class="classes_btn"><i class="fas fa-users"></i> Razredi</a></li>
        <li><a href="subjects.php"  class="subjects_btn"><i class="fas fa-book"></i> Predmeti</a></li>
        <li><a href="logout_index.php"  class="close_btn"><i class="fas fa-circle-xmark"></i></a></li>
    </ul>
</nav>
<?php
if (isset($_SESSION['success_add_student']) && $_SESSION['success_add_student'] === true) {
    echo '
    <script>
        swal({
            title: "Učenik uspješno dodat!",
            icon: "success",
            showConfirmButton: true,
            timer: 5000
        });
    </script>';
    unset($_SESSION['success_add_student']);
}
?>

<?php
if (isset($_SESSION['success_update_student']) && $_SESSION['success_update_student'] === true) {
    echo '
    <script>
        swal({
            title: "Podatci uspiješno sačuvani!",
            icon: "success",
            showConfirmButton: true,
            timer: 5000
        });
    </script>';
    unset($_SESSION['success_update_student']);
}
?>
    <div class="meni">
        <button class="turn_form" onclick="toggleFormContainer()">Dodaj učenika</button>
        <button class="turn_table" onclick="toggleStudentsTable()">Prikaži tabelu učenika</button>
    </div>
    
<div class="form_container">
        <h2 class="form_title">Dodavanje učenika</h2>
        <form action="add_student.php" onsubmit="return submitForm()" method="POST" class="add_student_form" id="addStudentForm">
        <i id="close_form" onclick="closeFormContainer()" class="fas fa-circle-xmark"></i>
            <label for="name">Ime:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="surname">Prezime:</label>
            <input type="text" id="surname" name="surname" required><br><br>
            
            <label for="birth_date">Datum rođenja:</label>
            <input type="date" id="birth_date" name="birth_date" required><br><br>
            
            <label for="address">Adresa:</label>
            <input type="text" id="address" name="address" required><br><br>
            
            <label for="email">Email:</label>
            <input type="e-mail" id="email" name="email" required><br><br>

            <label for="class">Razred:</label>
            <select id="class" name="class" required>
            <option value="">Izaberite razred</option>
            <?php
                include 'db_connect.php';

                $sql = "SELECT * FROM school_class";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Kombiniranje ID i imena razreda u vrijednost opcije
                        echo "<option value='" . $row['class'] . "'>" . $row['class'] . "</option>";
                    }
                } else {
                    echo "Nema dostupnih razreda.";
                }

                $conn->close();
            ?>
        </select><br><br>
            <input type="submit" value="Dodaj učenika">
        </form>

</div>

<div class="number_students">
        <?php
                include 'db_connect.php';

                    // SQL upit za brojanje redova u tabeli 'students'
                    $sql = "SELECT COUNT(*) AS num_students FROM students";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Izvlačenje rezultata upita
                        $row = $result->fetch_assoc();
                        $num_students = $row["num_students"];

                        // Ispis broja razreda unutar h1 taga
                        echo "<h1 class='number_of_students'>Broj učenika: $num_students</h1>";
                            } else {
                                echo "Nema rezultata.";
                            }
        ?>
</div>
<div class="students_table">
    <i id="close_table" onclick="closeStudentsTable()" class="fas fa-circle-xmark"></i>
    <h1>Tabela učenika</h1>
    <table class="student_table">
        <tr>
      <th>Ime</th>
      <th>Prezime</th>
      <th>Datum rođenja</th>
      <th>Razred</th>
      <th>Adresa</th>
      <th>Email</th>
      <th>Akcije</th>
    </tr>
    <?php include 'get_students.php'; ?>
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

