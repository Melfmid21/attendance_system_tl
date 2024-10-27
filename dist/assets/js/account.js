"use strict";

document.addEventListener('DOMContentLoaded', function() {
    // Functionality for handling form submissions
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();
        handleLoginFormSubmit();
    });

    // Other event listeners or function calls related to admin functionality
    // Example:
    // document.getElementById('logoutButton').addEventListener('click', handleLogout);
});

// Function to handle admin form submission
function handleLoginFormSubmit() {
    let formData = new FormData(document.getElementById('loginForm'));

    fetch('./api/login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Determine the role of the logged-in user
            let role = data.user.role; // Adjust according to your server response structure

            // Redirect based on user role
            if (role === 'admin') {
                // Redirect to admin dashboard
                //alert('Login success user is ' + role);
                window.location.href = './pages/admin/dashboard.php';
            } else if (role === 'user') {
               // alert('Login success user is ' + role);
                // Redirect to user dashboard or homepage
               // window.location.href = './user-page.php';
            } else {
                // Handle unexpected role (optional)
               // alert('Login failed: Unknown user role.');
               Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!"
              });
            }
            //  alert('Login success user is ');
        } else {
           // alert('Login failed: ' + data.message);
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Username and password is incorrect!"
              });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred during login.');
    });
}

// Other functions related to admin functionality
// Example:
// function handleLogout() {
//     // Code to handle admin logout
// }
