<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not authenticated
    header('Location: ../../index.php');
    exit();
}

$username = $_SESSION['email'];

// Add database connection
require_once '../../config/pdo_database.php';

// Fetch total number of teachers
$teacherQuery = "SELECT COUNT(*) as teacher_count FROM users WHERE role = 'teacher' AND isDeleted !=1";
$teacherStatement = $pdo->query($teacherQuery);
$teacherCount = $teacherStatement->fetchColumn();

// Fetch total number of students
$studentQuery = "SELECT COUNT(*) as student_count FROM students WHERE isDeleted !=1 ";
$studentStatement = $pdo->query($studentQuery);
$studentCount = $studentStatement->fetchColumn();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/icons/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../../node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>

<body class="bg-content">
    <nav
        class="fixed top-0 z-50 w-full bg-white border-b shadow-sm border-gray-200 dark:bg-gray-800 dark:border-gray-700">
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
                                <p class="text-sm text-primary dark:text-white" role="none">
                                    <?php echo htmlspecialchars($username); ?>
                                </p>

                            </div>
                            <ul class="py-1" role="none">

                                <li>
                                    <a id="signOutButton"
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
                        class="flex items-center p-2 text-gray-200 bg-menu rounded-sm cursor-pointer  dark:text-white  dark:hover:bg-gray-700 group">
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
                        class="flex items-center p-2 text-gray-200 rounded-sm dark:text-white hover:bg-menu dark:hover:bg-gray-700 group">
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

    <div class="p-4 sm:ml-64">

        <main class="p-2 dark:border-gray-700 mt-14 ">
            <div id="content-area">
                <!-- Dynamic content will be loaded here -->

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">

                    <div class="bg-white px-7 py-6 rounded-sm border border-stroke shadow-md flex items-center">
                        <img src="../../assets/images/logo.png" alt="image" class="w-16 h-16 rounded-full mr-4">
                        <div>
                            <h2 class="text-sm font-semibold text-gray-700 mt-2">College</h2>
                            <h1 class="text-3xl font-bold text-primary"><?php echo $studentCount; ?></h1>
                        </div>
                    </div>


                    <div class="bg-white px-7 py-6 rounded-sm border border-stroke shadow-md flex items-center">
                        <img src="../../assets/images/logo.png" alt="image" class="w-16 h-16 rounded-full mr-4">
                        <div>
                            <h2 class="text-sm font-semibold text-gray-700 mt-2">High School</h2>
                            <h1 class="text-3xl font-bold text-primary">1500</h1>
                        </div>
                    </div>
                    <div class="bg-white px-7 py-6 rounded-sm border border-stroke shadow-md flex items-center">
                        <img src="../../assets/images/logo.png" alt="image" class="w-16 h-16 rounded-full mr-4">
                        <div>
                            <h2 class="text-sm font-semibold text-gray-700 mt-2">Elementary</h2>
                            <h1 class="text-3xl font-bold text-primary">1500</h1>
                        </div>
                    </div>

                    <div class="bg-white px-7 py-6 rounded-sm border border-stroke shadow-md flex items-center">
                        <img src="../../assets/images/teacher.png" alt="image" class="w-16 h-16  mr-4">
                        <div>
                            <h2 class="text-sm font-semibold text-gray-700 mt-2">Teachers</h2>
                            <h1 class="text-3xl font-bold text-primary"><?php echo $teacherCount; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1  gap-4 mt-4">
                    <div id="content-area">

                        <div class="bg-white px-6  rounded-sm shadow-sm pb-10">
                            <div class="bg-white px-6  border-b-2 border-gray-200 flex items-center justify-between">
                                <h2 class="text-menu text-2xl font-bold mb-4 pt-4">Student's Attendance</h2>

                                <!-- Date and Time -->
                                <div id="date-time"
                                    class="text-primary text-xl font-bold flex items-center justify-center"></div>
                                <a href="../../pages/admin/attendance_expand.php" id="expand" class=" flex items-center p-2 text-gray-200 rounded-sm cursor-pointer
                                    dark:text-white hover:bg-menu hover:text-white dark:hover:bg-gray-700 relative
                                    group">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 4H4m0 0v4m0-4 5 5m7-5h4m0 0v4m0-4-5 5M8 20H4m0 0v-4m0 4 5-5m7 5h4m0 0v-4m0 4-5-5" />
                                    </svg>
                                    <!-- Tooltip -->
                                    <span
                                        class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                                        Expand Attendance
                                    </span>
                                </a>
                            </div>
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-slate-600 bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Full Name</th>
                                        <th scope="col" class="px-6 py-3">Grade Level</th>
                                        <th scope="col" class="px-6 py-3">Year Level</th>
                                        <th scope="col" class="px-6 py-3">Course</th>
                                        <th scope="col" class="px-6 py-3">Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
        require_once '../../config/pdo_database.php';

        try {
            // Pagination settings
            $limit = 10; // Number of records per page
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
            $offset = ($page - 1) * $limit; // Calculate the offset

            // Query to fetch attendance data with student information
            $stmt = $pdo->prepare("
             SELECT *
                FROM attendance
                WHERE DATE(date_time) = CURDATE()
                ORDER BY date_time DESC 
                LIMIT :limit OFFSET :offset
            ");
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $records = $stmt->fetchAll();

            // Query to count total number of records for pagination
            $countStmt = $pdo->query("SELECT COUNT(*) FROM attendance  WHERE DATE(date_time) = CURDATE()");
            $totalRecords = $countStmt->fetchColumn();
            $totalPages = ceil($totalRecords / $limit); // Calculate total pages

            // Check if there are any records
            if ($records) {
                foreach ($records as $record) {
                    // Format full name
                    // $fullName = ucwords(strtolower($record['lastname'])) . ', ' .
                    //             ucwords(strtolower($record['firstname'])) . ' ' .
                    //             strtoupper(substr($record['middle_name'], 0, 1)) . '.';

                    // Format date and time
                    $formattedDateTime = date('F d, Y h:i A', strtotime($record['date_time']));

                    echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
                    echo '<td class="px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">' . htmlspecialchars($record['fullname']) . '</td>';
                    echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($record['grade_level']) . '</td>';
                    echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($record['year_level']) . '</td>';
                    echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($record['course_section']) . '</td>';
                    echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($formattedDateTime) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5" class="px-6 py-4 text-center">No records found</td></tr>';
            }

            // Pagination
            echo '<nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 px-4 pb-2" aria-label="Table navigation">';
            echo '<span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">';
            echo 'Showing <span class="font-semibold text-gray-900 dark:text-white">' . (($page - 1) * $limit + 1) . '-' . min($page * $limit, $totalRecords) . '</span>';
            echo ' of <span class="font-semibold text-gray-900 dark:text-white">' . $totalRecords . '</span>';
            echo '</span>';
            echo '<ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">';
            echo '<li><a href="?page=' . max(1, $page - 1) . '" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a></li>';
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li><a href="?page=' . $i . '" class="flex items-center justify-center px-3 h-8 ' . (($i === $page) ? 'text-blue-600  bg-blue-50' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700') . ' dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">' . $i . '</a></li>';
            }
            echo '<li><a href="?page=' . min($totalPages, $page + 1) . '" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a></li>';
            echo '</ul></nav>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
                                </tbody>
                            </table>




                        </div>


                    </div>
                    <!-- end of content -->

                </div>
            </div>
    </div>
    </main>
    </div>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="../../../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="../../assets/js/admin/admin_test.js"></script>
    <script src="../../assets/js/admin/logout.js"></script>
    <script>
    // Function to format and display the current date and time
    function updateDateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        const formattedDate = now.toLocaleDateString(undefined, options);
        document.getElementById('date-time').textContent = formattedDate;
    }

    // Update the date and time immediately and every second
    updateDateTime();
    setInterval(updateDateTime, 1000);
    </script>
</body>

</html>