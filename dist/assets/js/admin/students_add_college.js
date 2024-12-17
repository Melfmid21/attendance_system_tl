"use-strict";

document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelector("form")
    .addEventListener("submit", async function (event) {
      event.preventDefault(); // Prevent default form submission
      console.log("Submitting form...");

      const formData = new FormData(event.target);
      const formObject = Object.fromEntries(formData.entries()); // Convert form data to an object

      try {
        const response = await fetch(
          "../../api/admin/api_students_add_college.php",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json"
            },
            body: JSON.stringify(formObject)
          }
        );

        const result = await response.json(); // Parse the JSON response

        if (response.ok) {
          // Show success message and reset the form
          await showAlert(
            "success",
            `Registration successful: ${result.message}`
          );
          event.target.reset();
        } else {
          // Show error message returned from the server
          await showAlert("warning", `Error: ${result.message}`);
        }
      } catch (error) {
        console.error("Error submitting form:", error);
        await showAlert(
          "error",
          "An unexpected error occurred. Please try again."
        );
      }
    });

  document
    .getElementById("backToStudentPageButton")
    .addEventListener("click", function (e) {
      console.log("back to student page");
      window.location.href = "../../pages/admin/ad_student_college.php";
    });
}); //end dom

//=======================================================================
//function here
//=======================================================================
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
