<?php
// Uključivanje datoteke za povezivanje s bazom podataka
include 'db_connect.php';

// Provjera je li zahtjev metoda POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Provjera postoji li student_id u POST podacima
    if (isset($_POST['student_id'])) {
        // Dohvaćanje podataka iz obrasca
        $student_id = $_POST['student_id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $birth_date = $_POST['birth_date'];
        $class = $_POST['class'];
        $address = $_POST['address'];
        $email = $_POST['email'];

        // Priprema SQL upita za ažuriranje podataka
        $sql = "UPDATE students SET 
                name='$name', 
                surname='$surname', 
                birth_date='$birth_date', 
                class='$class', 
                address='$address', 
                email='$email' 
                WHERE id=$student_id";

        // Izvršavanje SQL upita
        if ($conn->query($sql) === TRUE) {
            // Postavljanje sesijske varijable na true nakon uspješnog ažuriranja
            session_start();
            $_SESSION['success_update_student'] = true;
            header("Location: students.php");
            exit; // Dodajte exit nakon preusmjeravanja da biste prekinuli izvršavanje skripte
        } else {
            // Ako je došlo do greške prilikom izvršavanja upita
            echo "Greška prilikom izvršavanja upita: " . $conn->error;
        }
    } else {
        // Ako nije dostavljen ID studenta, prikaži odgovarajuću poruku
        echo "Nije dostavljen ID studenta.";
    }
} else {
    // Ako zahtjev nije metoda POST, prikaži odgovarajuću poruku
    echo "Metoda zahtjeva nije POST.";
}
?>
