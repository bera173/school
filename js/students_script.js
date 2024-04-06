// students_script.js

function submitForm() {
    // Prikazuje SweetAlert
    swal({
        title: "Da li ste sigurni?",
        text: "Da li želite dodati ovog učenika?",
        icon: "info",
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
