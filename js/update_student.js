function submitStudentUpdate() {
    // Prikazuje SweetAlert
    swal({
        title: "Da li ste sigurni?",
        text: "Da li želite sačuvati izmjene?",
        icon: "info",
        buttons: true,
        dangerMode: true,
    })
    .then((willSubmit) => {
        if (willSubmit) {
            // Ako korisnik klikne na 'Da', podnosi formu
            document.getElementById('updateStudentForm').submit();
        }
    });

    // Spriječava podrazumijevano ponašanje forme
    return false;
};
