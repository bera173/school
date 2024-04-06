<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "maticna_knjiga_ucenika";

// Stvaranje veze s bazom podataka
$conn = new mysqli($servername, $username, $password, $database);

// Provjera veze
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
