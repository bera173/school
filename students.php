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
    <script src="./js/students.js"></script>
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

<div class="form_container">
<h2 class="form_title">Dodavanje učenika</h2>
<form action="add_student.php" onsubmit="return submitForm()" method="POST" class="add_student_form" id="addStudentForm">
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
    // Uključite datoteku za povezivanje s bazom podataka
    include 'db_connect.php';

    // SQL upit za dohvaćanje svih razreda iz tabele school_class
    $sql = "SELECT * FROM school_class";
    $result = $conn->query($sql);

    // Provera da li je rezultat upita prazan
    if ($result->num_rows > 0) {
        // Prikazivanje svakog razreda kao opcije u select elementu
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['class'] . "</option>";
        }
    } else {
        echo "Nema dostupnih razreda.";
    }

    // Zatvaranje konekcije
    $conn->close();
    ?>
</select><br><br>
    <input type="submit" value="Dodaj učenika">
</form>
<script>
function submitForm() {
    // Prikazuje SweetAlert
    swal({
        title: "Da li ste sigurni?",
        text: "Da li želite dodati ovog učenika?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willSubmit) => {
        if (willSubmit) {
            // Ako korisnik klikne na 'Da', podnosi formu
            document.getElementById('addStudentForm').submit();
        } else {
            // Ako korisnik klikne na 'Ne', ne podnosi formu
            return false;
        }
    });

    // Spriječava podrazumijevano ponašanje forme
    return false;
}
</script>

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

