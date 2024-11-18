<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not authenticated
    header('Location: ../../index.php');
    exit();
}

$username = $_SESSION['email'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/icons/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../../node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>

<body class="bg-content">
    <nav
        class="fixed top-0 z-50 w-full bg-white border-b shadow-md border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="#" class="flex ms-2 md:me-24">
                        <img src="../../assets/images/logo.png" class="h-8 me-3" alt="FlowBite Logo" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">SFC</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    <?php echo htmlspecialchars($username); ?>
                                </p>

                            </div>
                            <ul class="py-1" role="none">


                                <li>
                                    <a href="#" id="signOutButton"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-sidebar border-r border-gray-300 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-sidebar dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a id="dashboard_page"
                        class="flex items-center p-2 text-gray-200 rounded-sm cursor-pointer hover:bg-menu dark:text-white  dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-200 transition duration-75 dark:text-gray-400  "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3 cursor-pointer ">Dashboard
                    </a>
                </li>
                <li>
                    <a href="" id="teacher_page"
                        class="flex items-center p-2 text-gray-200 rounded-sm  cursor-pointer dark:text-white hover:bg-menu dark:hover:bg-gray-700 group">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-200 dark:text-white"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24" focusable="false">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap cursor-pointer ">Teacher
                    </a>
                </li>

                <li>
                    <a id="students_page"
                        class="flex items-center p-2 text-gray-200 rounded-sm cursor-pointer bg-menu  dark:text-white hover:bg-menu dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M4 5a2 2 0 0 0-2 2v2.5a1 1 0 0 0 1 1 1.5 1.5 0 1 1 0 3 1 1 0 0 0-1 1V17a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2.5a1 1 0 0 0-1-1 1.5 1.5 0 1 1 0-3 1 1 0 0 0 1-1V7a2 2 0 0 0-2-2H4Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap cursor-pointer ">Student
                    </a>
                </li>
                <li>
                    <a id="courses_page"
                        class="flex items-center p-2 text-gray-200 rounded-sm cursor-pointer  dark:text-white hover:bg-menu dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Zm2 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap cursor-pointer ">Course
                    </a>
                </li>
            </ul>

        </div>

    </aside>

    <!-- CONTENT -->
    <!-- ================================================================================================================================= -->
    <!-- CONTENT -->
    <div class="p-4 sm:ml-64">
        <main class="p-2 dark:border-gray-700 mt-8">
            <div id="content-area">
                <div class="flex items-center justify-between mb-4 pt-4">
                    <!-- Heading -->
                    <h2 class="text-menu text-2xl font-bold">College Registration</h2>

                    <!-- Buttons on the right -->
                    <div class="flex space-x-4">


                        <a href="../../pages/admin/students.php" type="button" id="refreshButton"
                            class="text-blue-700 border border-blue-700 hover:border-blue-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500 relative group">
                            <svg class="w-4 h-4 text-blue-700 group-hover:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill="#264653" fill-rule="evenodd"
                                    d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="sr-only">Student Page</span>

                            <!-- Tooltip -->
                            <span
                                class="invisible group-hover:visible absolute top-full left-1/2 -translate-x-1/2 mt-2 bg-primary text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                                Back to Student page
                            </span>
                        </a>





                        <!-- Add Students Button -->
                        <button id="addStudent" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                            class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 rounded-lg focus:outline-none focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">Add Student<svg class="w-4 h-4 ms-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownHover"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-md shadow-md w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="addStudent">
                                <li>
                                    <a href="../../pages/admin/students_add_college.php"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">College</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Senior
                                        high</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Junior
                                        high</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Elementary</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-white px-6 py-4 rounded-sm shadow-sm">
                    <!-- Registration Form -->
                    <form class="space-y-6">
                        <!-- Personal Information -->
                        <div>
                            <h3 class="text-lg font-bold text-primary">Personal Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                                <div>
                                    <label for="firstname" class="block text-sm font-medium text-gray-700">First
                                        Name</label>
                                    <input type="text" id="firstname" name="firstname"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter First Name" required>
                                </div>
                                <div>
                                    <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle
                                        Name</label>
                                    <input type="text" id="middle_name" name="middle_name"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter Middle Name" required>
                                </div>
                                <div>
                                    <label for="lastname" class="block text-sm font-medium text-gray-700">Last
                                        Name</label>
                                    <input type="text" id="lastname" name="lastname"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter Last Name" required>
                                </div>
                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                    <select id="gender" name="gender"
                                        class="mt-1 p-2 block w-full text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                        <option value="" class="text-gray-700">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="dob" class="block text-sm font-medium text-gray-700">Date of
                                        Birth</label>
                                    <input type="date" id="dob" name="dob"
                                        class="mt-1 p-2 text-gray-700 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="text" id="email" name="email"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter Email" required>
                                </div>
                                <div>
                                    <label for="contact_number"
                                        class="block text-sm font-medium text-gray-700">Contact</label>
                                    <input type="tel" id="contact_number" name="contact_number"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter Contact Number" required>

                                </div>
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <input type="text" id="address" name="address"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter Address" required>
                                </div>
                            </div>
                        </div>

                        <!-- Parent/Guardian Information -->
                        <div class="mt-6">
                            <h3 class="text-lg font-bold text-primary">Parent/Guardian Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                                <div>
                                    <label for="guardian_name"
                                        class="block text-sm font-medium text-gray-700">Parent/Guardian Name</label>
                                    <input type="text" id="guardian_name" name="guardian_name"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter Parent/Guardian Name" required>
                                </div>
                                <div>
                                    <label for="relationship"
                                        class="block text-sm font-medium text-gray-700">Relationship to Student</label>
                                    <input type="text" id="relationship" name="relationship"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., Mother, Father, Guardian" required>
                                </div>
                                <div>
                                    <label for="guardian_contact"
                                        class="block text-sm font-medium text-gray-700">Contact
                                        Number</label>
                                    <input type="tel" id="guardian_contact" name="guardian_contact"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter Contact Number" required>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="guardian_address" class="block text-sm font-medium text-gray-700">Home
                                        Address</label>
                                    <textarea id="guardian_address" name="guardian_address"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter Home Address" required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Academic Information -->
                        <div class="">
                            <h3 class="text-lg font-bold text-primary">Academic Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                                <div>
                                    <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                                    <input type="text" id="course" name="course"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter Course" required>
                                </div>
                                <div>
                                    <label for="year_level" class="block text-sm font-medium text-gray-700">Year
                                        Level</label>
                                    <select id="year_level" name="year_level"
                                        class="mt-1 p-2 text-gray-700 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                        <option value="">Select Year Level</option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="fingerprint_id"
                                        class="block text-sm font-medium text-gray-700">Fingerprint ID</label>
                                    <input type="text" id="fingerprint_id" name="fingerprint_id"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter Fingerprint ID" required>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-10 mb-4">
                            <button type="submit"
                                class="w-full bg-blue-700 hover:bg-blue-800 text-white font-medium py-2 px-4 rounded-md focus:ring-4 focus:ring-blue-500 focus:outline-none">
                                Register
                            </button>
                            <button type="button" id="backToStudentPageButton"
                                class="mt-3 w-full text-gray-800 hover:text-white border font-medium border-gray-600 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300  rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Close</button>

                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="../../../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="../../assets/js/admin/logout.js"></script>
    <script src="../../assets/js/admin/students_add_college.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document
            .getElementById("dashboard_page")
            .addEventListener("click", function(e) {
                e.preventDefault();
                window.location.href = "../../pages/admin/ad_dashboard.php";
                //console.log("Teacher button is clicked.");
            });
        document
            .getElementById("teacher_page")
            .addEventListener("click", function(e) {
                e.preventDefault();
                window.location.href = "../../pages/admin/teachers.php";
                /// console.log("Teacher button is clicked.");
            });
        document
            .getElementById("students_page")
            .addEventListener("click", function(e) {
                e.preventDefault();
                window.location.href = "../../pages/admin/students.php";
                //  console.log("Teacher button is clicked.");
            });
        document
            .getElementById("courses_page")
            .addEventListener("click", function(e) {
                e.preventDefault();
                window.location.href = "../../pages/admin/courses.php";
                //  console.log("Teacher button is clicked.");
            });
    });
    </script>
    < /body>
        < /html>