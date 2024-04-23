<?php
// Uključite datoteku za povezivanje s bazom podataka
include 'db_connect.php';

// Provjerite je li student_id poslan putem POST metode
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id'])) {
    // Dohvatite student_id iz POST podataka
    $student_id = $_POST['student_id'];

    // Pripremite SQL upit za brisanje učenika
    $sql = "DELETE FROM students WHERE id = $student_id";

    // Izvršite SQL upit za brisanje
    if ($conn->query($sql) === TRUE) {
        // Uspješno brisanje učenika
        echo "Učenik je uspješno obrisan.";
    } else {
        // Greška prilikom brisanja učenika
        echo "Greška prilikom brisanja učenika: " . $conn->error;
    }
} else {
    // Ako student_id nije poslan ili nije HTTP POST zahtjev
    echo "Nije dostavljen ID učenika ili nije POST zahtjev.";
}
?>
