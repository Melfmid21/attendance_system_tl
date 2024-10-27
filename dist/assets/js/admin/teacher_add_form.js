document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const submitButton = form.querySelector("button[type='submit']");

    form.addEventListener("submit", async function (event) {
        event.preventDefault(); // Prevents form from submitting by default

        // Check if all inputs are filled
        const isValid = [...form.elements].every(input => {
            if (input.type !== "submit" && input.type !== "button") {
                return input.value.trim() !== "";
            }
            return true;
        });

        if (!isValid) {
            alert("Please fill out all fields before submitting.");
            return;
        }

        // Collect form data into an object
        const formData = {
            firstname: form.firstname.value,
            middleInitial: form["middle-initial"].value,
            lastname: form.lastname.value,
            gender: form.gender.value,
            email: form.email.value
        };

        //console.log(formData);

        try {
            const response = await fetch("../../api/admin/create_teacher_account.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(formData)
            });
        
            const result = await response.json();
        
            if (result.success) {
                alert(result.message); // Show success message from PHP
                form.reset(); // Reset the form after successful submission
            } else {
                alert(result.message); // Show error message from PHP
            }
        } catch (error) {
            console.error("Error:", error);
            alert("An error occurred. Please try again.");
        }        
    });
});
//FUNCTION HERE
//=====================================================================================================
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
