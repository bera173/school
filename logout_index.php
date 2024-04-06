<?php
// Pokretanje sesije
session_start();

// Uništavanje svih podataka sesije
session_destroy();

// Preusmjeravanje korisnika na početnu stranicu
header("Location: index.php");
exit();
?>