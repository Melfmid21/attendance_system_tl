"use-strict";

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("refresh").addEventListener("click", function (e) {
    const searchTerm = "";

    // Update the URL when Enter is pressed
    const url = new URL(window.location.href);
    url.searchParams.set("query", searchTerm); // Add or update the 'query' parameter

    // Reload the page with the updated search query
    window.location.href = url.toString();
  });

  /**
   * SEARCH TEACHER ACCOUNT TO SHOW IN THE TABLE
   */
  //===========================================================================================================
  document
    .getElementById("studentSearch")
    .addEventListener("input", function () {
      const searchTerm = this.value;
      console.log(searchTerm);

      // Check if the user typed something or pressed 'Enter'
      if (searchTerm !== "") {
        // Update the URL with the search query
        const url = new URL(window.location.href);
        url.searchParams.set("query", searchTerm); // Add or update the 'query' parameter

        // Reload the page with the updated search query
        window.history.pushState({}, "", url); // Update the URL without reloading the page
      } else {
        // If the search term is empty, remove the query parameter from the URL
        const url = new URL(window.location.href);
        url.searchParams.delete("query");
        window.history.pushState({}, "", url); // Update the URL without reloading the page
      }
    });

  document
    .getElementById("studentSearch")
    .addEventListener("keydown", function (e) {
      if (e.key === "Enter") {
        const searchTerm = this.value;

        // Update the URL when Enter is pressed
        const url = new URL(window.location.href);
        url.searchParams.set("query", searchTerm); // Add or update the 'query' parameter

        // Reload the page with the updated search query
        window.location.href = url.toString();
      }
    });

  //THIS WILL POPULATE THE DATA IN THE EDIT MODAL FOR TEACHER
  //==========================================================================================================================
  // Declare originalValues to store the original data for comparison
  let originalValues = {};
  document.querySelectorAll(".showEditStudentModal").forEach((button) => {
    button.addEventListener("click", function () {
      originalValues = JSON.parse(this.getAttribute("data-student"));
      console.log(originalValues);

      // Fill modal inputs with data
      document.querySelector("#id").value = originalValues.id;
      document.querySelector("#edit_firstname").value =
        originalValues.firstname;
      document.querySelector("#edit_middlename").value =
        originalValues.middle_name;
      document.querySelector("#edit_lastname").value = originalValues.lastname;

      // Set the selected value for the gender dropdown
      const genderDropdown = document.querySelector("#edit_gender");
      genderDropdown.value = originalValues.gender; // Set the selected value based on originalValues

      // Ensure the selected value is available in the dropdown
      if (!genderDropdown.value) {
        genderDropdown.value = "Select gender"; // Optionally set to default if no match
      }
      document.querySelector("#edit_dob").value = originalValues.dob;
      document.querySelector("#edit_email").value = originalValues.email;
      document.querySelector("#edit_contact_number").value =
        originalValues.contact_number;
      document.querySelector("#edit_address").value = originalValues.address;
      document.querySelector("#edit_guardian_name").value =
        originalValues.guardian_name;
      document.querySelector("#edit_relationship").value =
        originalValues.relationship;
      document.querySelector("#edit_guardian_contact").value =
        originalValues.guardian_contact_number;
      document.querySelector("#edit_guardian_address").value =
        originalValues.guardian_address;
      document.querySelector("#edit_course").value = originalValues.course;
      document.querySelector("#edit_year_level").value =
        originalValues.year_level;
      document.querySelector("#edit_fingerprint_id").value =
        originalValues.fingerprint_id;
    });
  });
  //THIS CODE SUBMIT  WHEN EDIT BUTTON IS PRESSED FOR TEACHER
  //============================================================================================================
  document
    .querySelector("#editStudentForm")
    .addEventListener("submit", async function (event) {
      event.preventDefault(); // Prevent the default form submission

      // Capture and trim the form data for comparison
      const currentValues = {
        id: Number(document.getElementById("id").value.trim()), // Convert to number
        firstname: document.getElementById("edit_firstname").value.trim(), // Trim spaces
        middle_name: document.getElementById("edit_middlename").value.trim(), // Trim spaces
        lastname: document.getElementById("edit_lastname").value.trim(), // Trim spaces
        gender: document.getElementById("edit_gender").value.trim(), // Trim spaces
        dob: document.getElementById("edit_dob").value.trim(), // Trim spaces
        email: document.getElementById("edit_email").value.trim(), // Trim spaces
        contact_number: document
          .getElementById("edit_contact_number")
          .value.trim(), // Trim spaces
        address: document.getElementById("edit_address").value.trim(), // Trim spaces
        guardian_name: document
          .getElementById("edit_guardian_name")
          .value.trim(), // Trim spaces
        relationship: document.getElementById("edit_relationship").value.trim(), // Trim spaces
        guardian_contact_number: document
          .getElementById("edit_guardian_contact")
          .value.trim(), // Trim spaces
        guardian_address: document
          .getElementById("edit_guardian_address")
          .value.trim(), // Trim spaces
        course: document.getElementById("edit_course").value.trim(), // Trim spaces
        year_level: document.getElementById("edit_year_level").value.trim(), // Trim spaces
        fingerprint_id: Number(
          document.getElementById("edit_fingerprint_id").value.trim()
        ) // Convert to number
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
        showAlert("warning", "No changes were made.");
        return;
      }

      try {
        const response = await fetch(
          "../../api/admin/edit_student_account.php",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json"
            },
            body: JSON.stringify(currentValues)
          }
        );

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
          showAlert("error", result.message);
        }
      } catch (error) {
        console.error("Error:", error);
        //  alert("An error occurred. Please try again.");
        showAlert("error", "An error occurred. Please try again.");
      }
    });

  //DELETE OR DEACTIVATE TEACHER
  //=================================================================================================================
  document.querySelectorAll("#deleteTeacher").forEach((button) => {
    button.addEventListener("click", function () {
      values = JSON.parse(this.getAttribute("data-id"));
      const fullname =
        values.firstname +
        " " +
        values.middle_name +
        "." +
        " " +
        values.lastname;
      const deletes = "Delete " + fullname + "'s" + " " + "Account?";
      deleteStudentFunction(values.id, deletes);
    });
  });
}); //end dom
//FUNCTION HERE
//=====================================================================================================
//DELETE TABLE FOR TEACHER
function deleteStudentFunction(user_id, deletes) {
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
      fetch("../../api/admin/delete_student_account.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({ id: user_id })
      })
        .then((response) => response.json())
        .then((data) => {
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
            showError("Error deleting voucher: " + data.message);
          }
        })
        .catch((error) => {
          console.error("Error:", error);
          showError("An error occurred while deleting the voucher.");
        });
    }
  });
} //end
//===========================================================================
// Reusable alert function
async function showAlert(type, message) {
  const iconMap = {
    success: "success",
    warning: "warning",
    error: "error"
  };

  await Swal.fire({
    icon: iconMap[type] || "info",
    title: message,
    showConfirmButton: true,
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
