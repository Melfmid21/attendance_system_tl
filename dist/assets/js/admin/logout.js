document.addEventListener("DOMContentLoaded", function () {
    const logoutButton = document.getElementById("signOutButton");

    logoutButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent the default link action

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to log out?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log me out!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to logout.php
                window.location.href = '../../api/signout.php';
            }
        });
    });
});
