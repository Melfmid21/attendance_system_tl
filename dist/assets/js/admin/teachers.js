"use-strict"

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('dashboard_page').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = '../../pages/admin/ad_dashboard.php';
        console.log("Teacher button is clicked.");
    });
    document.getElementById('teacher_page').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = '../../pages/admin/teachers.php';
        console.log("Teacher button is clicked.");
    });
    document.getElementById('students_page').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = '../../pages/admin/students.php';
        console.log("Teacher button is clicked.");
    });
    document.getElementById('courses_page').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = '../../pages/admin/courses.php';
        console.log("Teacher button is clicked.");
    });
    //ADD TEACHER 
    //=========================================================================================================
    document.querySelector("#add-teacher-form").addEventListener("submit", async function (event) {
        event.preventDefault(); // Prevents form from submitting by default

       

        // // Collect form data into an object
        // const formData = {
        //     firstname: form.firstname.value,
        //     middleInitial: form["middle-initial"].value,
        //     lastname: form.lastname.value,
        //     gender: form.gender.value,
        //     email: form.email.value
        // };
        // Capture and trim the form data for comparison
        const addTeacherForm = {
            firstname: document.getElementById('firstname').value.trim(),  // Trim spaces
            middleInitial: document.getElementById('middle-initial').value.trim(),  // Trim spaces
            lastname: document.getElementById('lastname').value.trim(),  // Trim spaces
            gender: document.getElementById('gender').value.trim(),  // Trim spaces
            email: document.getElementById('email').value.trim()  // Trim spaces
        };
        //console.log(formData);

        try {
            const response = await fetch("../../api/admin/create_teacher_account.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(addTeacherForm)
            });
        
            const result = await response.json();
        
            if (result.success) {
                //alert(result.message); // Show success message from PHP
                showSuccess(result.message);
                const forms = document.getElementById('add-teacher-form');
                forms.reset(); // Reset the form after successful submission
            } else {
               // alert(result.message); // Show error message from PHP
                showError(result.message);
            }
        } catch (error) {
            console.error("Error:", error);
           showError("An error occurred. Please try again.");
        }        
    });

    //THIS WILL POPULATE THE DATA IN THE EDIT MODAL
    //==========================================================================================================================
    // Declare originalValues to store the original data for comparison
    let originalValues = {};
    document.querySelectorAll('.showEditTeacherModal').forEach(button => {
        button.addEventListener('click', function() {
           originalValues = JSON.parse(this.getAttribute('data-teacher'));
            console.log(originalValues);
    
            // Fill modal inputs with data
            document.querySelector('#id').value = originalValues.id;
            document.querySelector('#edit-firstname').value = originalValues.firstname;
            document.querySelector('#edit-middle-initial').value = originalValues.middle_initial;
            document.querySelector('#edit-lastname').value = originalValues.lastname;
            
            // Set the selected value for the gender dropdown
            const genderDropdown = document.querySelector('#edit-gender');
            genderDropdown.value = originalValues.gender;  // Set the selected value based on originalValues

            // Ensure the selected value is available in the dropdown
            if (!genderDropdown.value) {
                genderDropdown.value = "Select gender";  // Optionally set to default if no match
            }
            
            document.querySelector('#edit-email').value = originalValues.email;
        });
    });    
    //THIS CODE SUBMIT  WHEN EDIT BUTTON IS PRESSED
    //============================================================================================================
    document.querySelector('#edit-teacher-form').addEventListener('submit',async function(event) {
        event.preventDefault(); // Prevent the default form submission
    
        // Capture and trim the form data for comparison
        const currentValues = {
            id: Number(document.getElementById('id').value.trim()),  // Convert to number for accurate comparison
            firstname: document.getElementById('edit-firstname').value.trim(),  // Trim spaces
            middle_initial: document.getElementById('edit-middle-initial').value.trim(),  // Trim spaces
            lastname: document.getElementById('edit-lastname').value.trim(),  // Trim spaces
            gender: document.getElementById('edit-gender').value.trim(),  // Trim spaces
            email: document.getElementById('edit-email').value.trim()  // Trim spaces
        };
    
        console.log(currentValues);
        // Check if any value has changed
        let hasChanged = false;
        for (const key in originalValues) {
            if (originalValues[key] !== currentValues[key]) {
                hasChanged = true;
                break;
            }
        }

        // Prevent form submission if no changes were made
        if (!hasChanged) {
            //alert("No changes were made.");
            showError("No changes were made.");
            return;
        }

        try {
            const response = await fetch("../../api/admin/edit_teacher_account.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(currentValues)
            });
        
            const result = await response.json();
        
            if (result.success) {
                Swal.fire({
                    title: result.message,
                    icon: "success",
                    confirmButtonText: "Ok"
                  }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                  });
            } else {
                showError(result.message);
            }
        } catch (error) {
            console.error("Error:", error);
          //  alert("An error occurred. Please try again.");
            showError("An error occurred. Please try again.");
        }   
    });

    //DELETE OR DEACTIVATE
//=================================================================================================================    
document.querySelectorAll('#deleteTeacher').forEach(button => {
    button.addEventListener('click', function() {
       values = JSON.parse(this.getAttribute('data-id'));
       const fullname = values.firstname + " " + values.middle_initial + "." + " " + values.lastname;
       const deletes = "Delete " + fullname + "'s" + " " +  "Account?";
       deleteTeacherFunction(values.id,deletes);
    });
});

});
//FUNCTION HERE
//=====================================================================================================
 //DELETE TABLE
 function deleteTeacherFunction(user_id,deletes) {
    Swal.fire({
        title: deletes,
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            fetch('../../api/admin/delete_teacher_account.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: user_id })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                   
                    Swal.fire({
                        title: data.message,
                        icon: "success",
                        confirmButtonText: "Ok"
                      }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                      });
                } else {
                    showError('Error deleting voucher: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showError('An error occurred while deleting the voucher.');
            });
        }
      });
   
}//end
//===========================================================================
async function showSuccess(message){
    await Swal.fire({
        icon: "success",
        title:message,
        showConfirmButton: true
    });
  }
  async function showError(message){
    await Swal.fire({
        icon: "warning",
        title: message,
        showClass: {
          popup: `
            animate__animated
            animate__fadeInUp
            animate__faster
          `
        },
        hideClass: {
          popup: `
            animate__animated
            animate__fadeOutDown
            animate__faster
          `
        }
      });
  }
