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
    <title>Teachers</title>
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/icons/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../../node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>
<style>
.group:hover span::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #1f2937 transparent transparent transparent;
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: translateY(0);
    }

    to {
        opacity: 0;
        transform: translateY(-10px);
    }
}

.animate-fade-in {
    animation: fadeIn 0.3s ease-in-out forwards;
}

.animate-fade-out {
    animation: fadeOut 0.3s ease-in-out forwards;
}

/* Styling for time inputs */
.time-inputs {
    transition: all 0.3s ease-in-out;
}

.time-inputs input[type="time"] {
    transition: all 0.2s ease-in-out;
}

.time-inputs input[type="time"]:hover {
    border-color: #3b82f6;
}

.time-inputs input[type="time"]:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
}

/* Day checkbox styling */
.day-checkbox {
    cursor: pointer;
}

.day-checkbox+label {
    transition: all 0.2s ease-in-out;
    cursor: pointer;
}

.day-checkbox:checked+label {
    color: #2563eb;
    font-weight: 600;
}

/* Error state */
.border-red-500 {
    border-color: #ef4444 !important;
}

/* Hover effects */
.flex:hover .day-checkbox:not(:checked)+label {
    color: #4b5563;
}
</style>

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

    <!-- SIDE BAR -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-sidebar border-r border-gray-300 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-sidebar dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a id="dashboard_page"
                        class="flex items-center p-2 text-gray-200 rounded-sm dark:text-white hover:bg-menu dark:hover:bg-gray-700 group">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
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
                        class="flex items-center p-2 text-gray-200 bg-menu rounded-sm cursor-pointer  dark:text-white  dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-200 transition duration-75 dark:text-gray-400  "
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
                        class="flex items-center p-2 text-gray-200 rounded-sm cursor-pointer  dark:text-white hover:bg-menu dark:hover:bg-gray-700 group">

                        <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap cursor-pointer ">Student
                    </a>
                </li>
                <li>
                    <a id="department"
                        class="flex items-center p-2 text-gray-200 rounded-sm cursor-pointer  dark:text-white hover:bg-menu dark:hover:bg-gray-700 group"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">

                        <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Department</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </a>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="../../pages/admin/ad_department_college.php"
                                class="flex items-center w-full p-2 text-gray-200 transition duration-75 rounded-lg pl-11 group hover:bg-menu dark:text-white dark:hover:bg-gray-700">College</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-200 transition duration-75 rounded-lg pl-11 group hover:bg-menu dark:text-white dark:hover:bg-gray-700">Senior
                                high</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-200 transition duration-75 rounded-lg pl-11 group hover:bg-menu dark:text-white dark:hover:bg-gray-700">Junior
                                high</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-200 transition duration-75 rounded-lg pl-11 group hover:bg-menu dark:text-white dark:hover:bg-gray-700">Elementary
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a id="subject"
                        class="flex items-center p-2 text-gray-200 rounded-sm cursor-pointer  dark:text-white hover:bg-menu dark:hover:bg-gray-700 group"
                        aria-controls="dropdown-subject" data-collapse-toggle="dropdown-subject">

                        <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Subject</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>

                    </a>
                    <ul id="dropdown-subject" class="hidden py-2 space-y-2">
                        <li>
                            <a href="../../pages/admin/ad_subject_college.php"
                                class="flex items-center w-full p-2 text-gray-200 transition duration-75 rounded-lg pl-11 group hover:bg-menu dark:text-white dark:hover:bg-gray-700">College</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-200 transition duration-75 rounded-lg pl-11 group hover:bg-menu dark:text-white dark:hover:bg-gray-700">Senior
                                high</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-200 transition duration-75 rounded-lg pl-11 group hover:bg-menu dark:text-white dark:hover:bg-gray-700">Junior
                                high</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-200 transition duration-75 rounded-lg pl-11 group hover:bg-menu dark:text-white dark:hover:bg-gray-700">Elementary
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a id="courses_page"
                        class="flex items-center p-2 text-gray-200 rounded-sm cursor-pointer  dark:text-white hover:bg-menu dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-200 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a28.076 28.076 0 0 1-1.091 9M7.231 4.37a8.994 8.994 0 0 1 12.88 3.73M2.958 15S3 14.577 3 12a8.949 8.949 0 0 1 1.735-5.307m12.84 3.088A5.98 5.98 0 0 1 18 12a30 30 0 0 1-.464 6.232M6 12a6 6 0 0 1 9.352-4.974M4 21a5.964 5.964 0 0 1 1.01-3.328 5.15 5.15 0 0 0 .786-1.926m8.66 2.486a13.96 13.96 0 0 1-.962 2.683M7.5 19.336C9 17.092 9 14.845 9 12a3 3 0 1 1 6 0c0 .749 0 1.521-.031 2.311M12 12c0 3 0 6-2 9" />
                        </svg>


                        <span class="flex-1 ms-3 whitespace-nowrap cursor-pointer ">Biometric
                    </a>
                </li>
            </ul>

        </div>

    </aside>

    <!-- CONTENT -->
    <!-- ================================================================================================================================= -->
    <div class="p-4 sm:ml-64">
        <main class="p-2 dark:border-gray-700 mt-8">
            <div id="content-area">
                <h2 class="text-menu text-2xl font-bold mb-4 pt-4">Teachers</h2>
                <div class="bg-white px-6  rounded-sm shadow-sm">
                    <!-- <h2 class="text-xl font-heading font-bold mb-4">Student Table</h2> -->
                    <div class="flex justify-between items-center pt-4 pb-2  bg-white">
                        <!-- Search Input on the left -->
                        <div>
                            <button type="button" id="refreshButton"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 relative group">
                                <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                                </svg>
                                <span class="sr-only">Icon description</span>

                                <!-- Tooltip -->
                                <span
                                    class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                                    Refresh
                                </span>
                            </button>


                            <input type="text" id="teacherSearch" placeholder="Search Teachers & press enter..."
                                class="p-2 border border-gray-300 rounded-sm focus:ring-2 focus:ring-gray-200 focus:outline-none w-64">
                        </div>


                        <div>
                            <!-- Button on the right -->

                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">Add Account/Schedule <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#" data-modal-target="add-teacher-modal"
                                            data-modal-toggle="add-teacher-modal"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Add
                                            Account</a>
                                    </li>
                                    <!-- <li>
                                        <a data-modal-target="add-teacher-schedule"
                                            data-modal-toggle="add-teacher-schedule" href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Add
                                            Schedule</a>
                                    </li> -->
                                    <li>
                                        <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown"
                                            data-dropdown-placement="right-start" type="button"
                                            class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Add
                                            Schedule<svg class="w-2.5 h-2.5 ms-3 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                            </svg></button>
                                        <div id="doubleDropdown"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="doubleDropdownButton">
                                                <li>
                                                    <a data-modal-target="add-teacher-schedule-college"
                                                        data-modal-toggle="add-teacher-schedule-college" href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">College</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Senior
                                                        High</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Junior
                                                        High</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Elementary</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>


                        </div>



                    </div>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class=" text-slate-600  bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Full Name</th>
                                <th scope="col" class="px-6 py-3">Gender</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Actions</th> <!-- New column for buttons -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        require_once '../../config/pdo_database.php';
        try {
            if (isset($_GET['query']) && !empty($_GET['query'])) {
                include '../../include/admin/search_teacher.php';
            } else {
                // Pagination settings
                $limit = 10; // Number of records per page
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
                $offset = ($page - 1) * $limit; // Calculate the offset

                // Query to fetch teacher data with pagination
                $stmt = $pdo->prepare("SELECT id, firstname, middle_initial, lastname, gender, email FROM users WHERE role != 'admin' AND isDeleted != 1 LIMIT :limit OFFSET :offset");
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                $stmt->execute();
                $teachers = $stmt->fetchAll();

                // Query to count total number of teachers for pagination
                $countStmt = $pdo->query("SELECT COUNT(*) FROM users WHERE role != 'admin' AND isDeleted != 1 ");
                $totalTeachers = $countStmt->fetchColumn();
                $totalPages = ceil($totalTeachers / $limit); // Calculate total pages

                // Check if there are any teachers
                if ($teachers) {
                    foreach ($teachers as $teacher) {
                        $fullName = $teacher['firstname'] . ' ' . $teacher['middle_initial'] . '. ' . $teacher['lastname'];
                        echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
                        echo '<td class="px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">' . htmlspecialchars($fullName) . '</td>';
                        echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($teacher['gender']) . '</td>';
                        echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($teacher['email']) . '</td>';
                        echo '<td class="px-6 py-4" style="display: flex; align-items: center;">';

                        // Edit button with tooltip
                        echo '<button class="showEditTeacherModal inline-flex items-center p-1 rounded-full transition-all duration-200 ease-in-out hover:bg-blue-100 relative group" 
                        data-modal-target="edit-teacher-modal" 
                        data-modal-toggle="edit-teacher-modal" 
                        data-teacher="' . htmlspecialchars(json_encode($teacher), ENT_QUOTES, 'UTF-8') . '"
                        style="margin-right: 10px;">
                        <svg class="w-5 h-5 text-blue-600 hover:text-blue-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.1498 7.93997L8.27978 19.81C7.21978 20.88 4.04977 21.3699 3.32977 20.6599C2.60977 19.9499 3.11978 16.78 4.17978 15.71L16.0498 3.84C16.5979 3.31801 17.3283 3.03097 18.0851 3.04019C18.842 3.04942 19.5652 3.35418 20.1004 3.88938C20.6356 4.42457 20.9403 5.14781 20.9496 5.90463C20.9588 6.66146 20.6718 7.39189 20.1498 7.93997V7.93997Z" 
                                                stroke="currentColor" 
                                                stroke-width="1.5" 
                                                stroke-linecap="round" 
                                                stroke-linejoin="round"/>
                        </svg>
                        <span class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                            Edit
                        </span>
                        </button>';

                        // Delete button with tooltip
                        echo '<button class="inline-flex items-center p-1 rounded-full transition-all duration-200 ease-in-out hover:bg-red-100 relative group" 
                        id="deleteTeacher" 
                        data-id="' . htmlspecialchars(json_encode($teacher), ENT_QUOTES, 'UTF-8') . '">
                        <svg class="w-5 h-5 text-red-600 hover:text-red-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" 
                                                stroke="currentColor" 
                                                stroke-width="2" 
                                                stroke-linecap="round" 
                                                stroke-linejoin="round"/>
                        </svg>
                        <span class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                            Delete
                        </span>
                        </button>';

                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="4" class="px-6 py-4 text-center">No teachers found</td></tr>'; // Update colspan
                }
                // Pagination
                echo '<nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 px-4 pb-2"
                aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                        Showing <span class="font-semibold text-gray-900 dark:text-white">' . (($page - 1) * $limit) + 1 . '-' . min($page * $limit, $totalTeachers) . '</span>
                        of <span class="font-semibold text-gray-900 dark:text-white">' . $totalTeachers . '</span>
                    </span>
                    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                        <li>
                            <a href="?page=' . max(1, $page - 1) . '" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                        </li>';
                        for ($i = 1; $i <= $totalPages; $i++) {
                            echo '<li><a href="?page=' . $i . '" class="flex items-center justify-center px-3 h-8 ' . (($i === $page) ? 'text-blue-600 border border-gray-300 bg-blue-50' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700') . ' dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">' . $i . '</a></li>';
                        }
                        echo '<li>
                            <a href="?page=' . min($totalPages, $page + 1) . '" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                        </li>
                    </ul>
                </nav>';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
                        </tbody>
                    </table>

                </div>

                <?php  include '../../include/admin/add_modal_teacher.php';?>
                <?php  include '../../include/admin/add_modal_teacher_schedule_college.php';?>

                <?php  include '../../include/admin/edit_modal_teacher.php';?>

            </div>
            <!-- end of content -->

    </div>
    </main>
    </div>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="../../../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="../../assets/js/admin/teachers.js"></script>
    <!-- <script src="../../assets/js/admin/teacher_add_form.js"></script> -->
    <script src="../../assets/js/admin/logout.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('add-teacher-schedule-form');

        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Collect values from the form
                const teacher = document.getElementById("teacher").value;
                const yearLevel = document.getElementById("year_level").value;
                const course = document.getElementById("course").value;
                const subject = document.getElementById("subjects").value;
                console.log("Subject: ", subject); // Check if the value is correctly captured

                // Get all the checkboxes
                const checkboxes = document.querySelectorAll('input[type="checkbox"]');

                // Create an array to store the selected days
                let days = [];

                // Loop through the checkboxes to check which ones are checked
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        // Adjusted to get the label's text
                        const label = checkbox.closest('li').querySelector('label');
                        if (label) {
                            days.push(label.textContent.trim());
                        }
                    }
                });

                // Output the selected days
                console.log(days);

                // Get start and end times
                const startTime = document.getElementById("start-time").value;
                const endTime = document.getElementById("end-time").value;

                // Prepare the data to be sent
                const data = {
                    teacher,
                    year_level: yearLevel,
                    course,
                    subject,
                    days,
                    start_time: startTime,
                    end_time: endTime
                };
                console.log(data);

                try {
                    // Send data to the server using fetch
                    const response = await fetch("../../api/admin/api_add_teacher_schedule.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(data)
                    });

                    // Check if the request was successful
                    const result = await response.json();

                    // Check the status from the result
                    if (result.status === 'success') {
                        // Using SweetAlert2 for success message
                        Swal.fire({
                            title: 'Success!',
                            text: result.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });

                        // Optionally reset the form
                        document.getElementById("add-teacher-schedule-form").reset();
                    } else {
                        // Using SweetAlert2 for failure message
                        Swal.fire({
                            title: 'Error!',
                            text: result.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                } catch (error) {
                    console.error("Error saving schedule:", error);
                    // Using SweetAlert2 for error message
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while saving the schedule. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    });
    </script>

</body>

</html>