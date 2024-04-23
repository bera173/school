<?php
session_start();

// Provera da li je forma poslata metod POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Povezivanje na bazu podataka
    include 'db_connect.php';

    // Priprema i izvršavanje SQL upita za dodavanje učenika u tabelu 'students'
    $sql = "INSERT INTO students (name, surname, birth_date, address, email, class) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Provera da li je uspešno pripremljen upit
    if ($stmt === false) {
        echo "Greška pri pripremi SQL upita: " . $conn->error;
        exit;
    }

    // Bindovanje parametara
    $stmt->bind_param("ssssss", $name, $surname, $birth_date, $address, $email, $class);

    // Postavljanje vrednosti parametara
    $name = $_POST['name'];
    $surname = isset($_POST['surname']) ? $_POST['surname'] : null;
    $birth_date = $_POST['birth_date'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $class = $_POST['class'];
  

    // Provera da li su svi obavezni podaci uneti
if ($name !== null && $surname !== null && $birth_date !== null && $address !== null && $email !== null && $class !== null) {
    // Izvršavanje SQL upita
    if ($stmt->execute()) {
        $_SESSION['success_add_student'] = true;
        header("Location: students.php");      
    } else {
        // Greška prilikom izvršavanja upita
        header("Location: students.php?error=insert_error");
        exit;
    }
} else {
    // Nisu uneti svi obavezni podaci ili vrednost za 'id_class' je null, redirekcija na students.php
    header("Location: students.php?error=missing_data");
    exit;
}}
?>

