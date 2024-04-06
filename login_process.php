<?php
session_start();
include 'db_connect.php';

// Provjera je li korisnik poslao podatke putem POST metode
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Provjera je li korisničko ime i lozinka poslani kao podaci
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Dobivanje korisničkih podataka iz POST zahtjeva
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Provjerite postoje li korisnički podaci u bazi podataka
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        // Provjerite rezultat upita
        if ($result->num_rows > 0) {
            // Ako korisnički podaci postoje, postavite sesiju na temelju korisničkog imena
            $_SESSION['username'] = $username;
            // Preusmjeravanje korisnika na početnu stranicu nakon prijave
            header("Location: index.php");
            exit();
        } else {
            // Ako korisničko ime ili lozinka nisu ispravni, preusmjerite korisnika na login stranicu s odgovarajućom porukom
            header("Location: index.php");
            exit();
        }
    }
}
?>
