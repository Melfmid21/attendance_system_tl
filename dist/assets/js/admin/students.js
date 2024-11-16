"use-strict";

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("dashboard_page")
    .addEventListener("click", function (e) {
      e.preventDefault();
      window.location.href = "../../pages/admin/ad_dashboard.php";
      console.log("Teacher button is clicked.");
    });
  document
    .getElementById("teacher_page")
    .addEventListener("click", function (e) {
      e.preventDefault();
      window.location.href = "../../pages/admin/teachers.php";
      console.log("Teacher button is clicked.");
    });
  document
    .getElementById("students_page")
    .addEventListener("click", function (e) {
      e.preventDefault();
      window.location.href = "../../pages/admin/students.php";
      console.log("Teacher button is clicked.");
    });
  document
    .getElementById("courses_page")
    .addEventListener("click", function (e) {
      e.preventDefault();
      window.location.href = "../../pages/admin/courses.php";
      console.log("Teacher button is clicked.");
    });
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
      // document.querySelector("#id").value = originalValues.id;
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
      document.querySelector("#edit_contact_number").value = originalValues.contact_number;
      document.querySelector("#edit_address").value = originalValues.address;
      document.querySelector("#edit_guardian_name").value = originalValues.guardian_name;
      document.querySelector("#edit_relationship").value = originalValues.relationship;
      document.querySelector("#edit_guardian_contact").value = originalValues.guardian_contact_number;
      document.querySelector("#edit_guardian_address").value = originalValues.guardian_address;
      document.querySelector("#edit_course").value = originalValues.course;
      document.querySelector("#edit_year_level").value = originalValues.year_level;
      document.querySelector("#edit_fingerprint_id").value = originalValues.fingerprint_id;
    });
  });
}); //end dom
