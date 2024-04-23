<?php
include 'db_connect.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["surname"] . "</td>";
        echo "<td>" . date('j.n.Y', strtotime($row["birth_date"])) . "</td>";
        echo "<td>" . $row["class"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>";
        echo "<a href='edit_student.php?id=" . $row["id"] . "'>Uredi</a>";
        echo "<button class='delete_button' onclick='deleteStudent(" . $row["id"] . ")' data-id='" . $row["id"] . "'>Obriši</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Nema rezultata.</td></tr>";
}
?>

<script>
// Funkcija koja se poziva kada se pritisne gumb "Obriši"
function deleteStudent(studentId) {
    // Prikaži SweetAlert dijalog
    Swal.fire({
        title: 'Jeste li sigurni da želite obrisati ovog učenika?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Da, obriši!',
        cancelButtonText: 'Odustani'
    }).then((result) => {
        if (result.isConfirmed) {
            // Ako korisnik potvrdi, pošalji AJAX zahtjev za brisanje učenika
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_student.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Osvježi stranicu nakon uspješnog brisanja
                    location.reload();
                }
            };
            xhr.send("student_id=" + studentId);
        }
    });
}
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>