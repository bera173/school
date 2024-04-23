<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matična knjiga učenika</title>
    <script src="https://kit.fontawesome.com/a47266d986.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/edit_student.css"> <!-- Poveznica na CSS datoteku -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./js/update_student.js"></script>
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
include 'db_connect.php';

// Provjerava postoji li ID studenta u URL-u
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Izvršava upit kako bi dobio podatke o određenom studentu
    $sql = "SELECT * FROM students WHERE id = $student_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Prikazuje formu za uređivanje podataka studenta
        ?>
        <form action="update_student.php" onsubmit="return submitStudentUpdate()" method="POST" class="update_student_form" id="updateStudentForm">
            <input type="hidden" name="student_id" value="<?php echo $row['id']; ?>">
            <label for="name">Ime:</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
            <label for="surname">Prezime:</label>
            <input type="text" name="surname" value="<?php echo $row['surname']; ?>"><br>
            <label for="birth_date">Datum rođenja:</label>
            <input type="date" name="birth_date" value="<?php echo $row['birth_date']; ?>"><br>
            <label for="class">Razred:</label>
            <input type="text" name="class" value="<?php echo $row['class']; ?>"><br>
            <label for="address">Adresa:</label>
            <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
            <!-- Ostala polja koja želite urediti -->
            <input type="submit" value="Ažuriraj">
        </form>
        <?php
    } else {
        echo "Student ne postoji.";
    }
} else {
    echo "Nije dostavljen ID studenta.";
}
?>



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

