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
};


function toggleFormContainer() {
    var formContainer = document.querySelector('.form_container');
    var studentsTable = document.querySelector('.students_table');
    var addButton = document.querySelector('.turn_form');
    var addTable = document.querySelector('.turn_table');
    var numberStudents = document.querySelector('.number_students');
    
    if (formContainer.style.display === 'none') {
      formContainer.style.display = 'block';
      studentsTable.style.display = 'none';
      addTable.style.display = 'none';
      addButton.style.display = 'none';
      numberStudents.style.display = 'none';
    } else {
      formContainer.style.display = 'none';
      studentsTable.style.display = 'none';
      addButton.style.display = 'block';
      addTable.style.display = 'block';
      numberStudents.style.display = 'block';
    }
  }

function closeFormContainer() {
    var formContainer = document.querySelector('.form_container');
    var studentsTable = document.querySelector('.students_table');
    var addButton = document.querySelector('.turn_form');
    var addTable = document.querySelector('.turn_table');
    var numberStudents = document.querySelector('.number_students');
    
    if (formContainer.style.display === 'block') {
      formContainer.style.display = 'none';
      addButton.style.display = 'block';
      addTable.style.display = 'block';
      numberStudents.style.display = 'block';
    } else {
      formContainer.style.display = 'block';
      studentsTable.style.display = 'none';
      addButton.style.display = 'none';
      addTable.style.display = 'none';
      numberStudents.style.display = 'none';
    }
  }


  
function toggleStudentsTable() {
    var studentsTable = document.querySelector('.students_table');
    var formContainer = document.querySelector('.form_container');
    var addTable = document.querySelector('.turn_table');
    var addButton = document.querySelector('.turn_form');
    var numberStudents = document.querySelector('.number_students');
    
    if (studentsTable.style.display === 'none') {
        studentsTable.style.display = 'block';
        formContainer.style.display = 'none';
        addTable.style.display = 'none';
        addButton.style.display = 'none';
        numberStudents.style.display = 'none';
    } else {
        studentsTable.style.display = 'none';
        formContainer.style.display = 'none';
      addTable.style.display = 'block';
      addButton.style.display = 'block';
      numberStudents.style.display = 'block';
    }
  }

  function closeStudentsTable() {
    var studentsTable = document.querySelector('.students_table');
    var formContainer = document.querySelector('.form_container');
    var addTable = document.querySelector('.turn_table');
    var addButton = document.querySelector('.turn_form');
    var numberStudents = document.querySelector('.number_students');
    
    if (studentsTable.style.display === 'block') {
        studentsTable.style.display = 'none';
        formContainer.style.display = 'none';
        addTable.style.display = 'block';
        addButton.style.display = 'block';
        numberStudents.style.display = 'block';
    } else {
        studentsTable.style.display = 'block';
        formContainer.style.display = 'none';
      addTable.style.display = 'none';
      addButton.style.display = 'none';
      numberStudents.style.display = 'none';
    }
  }

