
document
  .getElementById("loginForm")
  .addEventListener("submit", async function (e) {
    e.preventDefault(); // Prevent form from submitting the traditional way

    const formData = {
      email: document.getElementById("email").value,
      password: document.getElementById("password").value
    };

    try {
      const response = await fetch("./api/signin.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
      });

      const result = await response.json();

      if (response.ok && result.success) {
        //alert("Login successful!");
        showSuccess();
        // Redirect based on the user's role
        switch (result.role) {
          case "admin":
           
            window.location.href = "./pages/admin/ad_dashboard.php";
            break;
          case "teacher":
            window.location.href = "./pages/teacher/teach_dashboard.php";
            break;
          case "student":
            window.location.href = "./pages/student/stud_dashboard.php";
            break;
          default:
            alert("Role not recognized.");
        }
      } else {
       // alert(result.message || "Login failed.");
       showError(result.message);
      }
    } catch (error) {
      console.error("Error:", error);
      //alert("An error occurred. Please try again.");
      showError("An error occurred. Please try again or contact your administrator.");
    }
  });

  async function showSuccess(){
    await Swal.fire({
        icon: "success",
        title: "Login successful!",
        showConfirmButton: false,
        timer: 1500
    });
  }
  async function showError(message){
    await Swal.fire({
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

