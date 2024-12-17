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
    <title>Department College</title>
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

    <!-- SIDE BAR -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-sidebar border-r border-gray-300 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-sidebar dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="../../pages/admin/ad_dashboard.php" id="dashboard_page"
                        class="flex items-center p-2 text-gray-200 rounded-sm cursor-pointer  dark:text-white hover:bg-menu dark:hover:bg-gray-700 group">
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
                    <a href="../../pages/admin/teachers.php" id="teacher_page"
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
                    <a href="../../pages/admin/students.php" id=""
                        class="flex items-center p-2 text-gray-200 rounded-sm cursor-pointer  dark:text-white hover:bg-menu dark:hover:bg-gray-700 group">
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
                    <a id="department"
                        class="flex items-center p-2 text-gray-200 bg-menu rounded-sm cursor-pointer  dark:text-white  dark:hover:bg-gray-700 group"
                        aria-controls="dropdown-department" data-collapse-toggle="dropdown-department">
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
                    <ul id="dropdown-department" class="hidden py-2 space-y-2">
                        <li>
                            <a href="../../pages/admin/ad_department_college.php"
                                class="flex items-center w-full p-2 text-gray-200 bg-menu transition duration-75 rounded-lg pl-11 group hover:bg-menu dark:text-white dark:hover:bg-gray-700">College</a>
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
                    <a id=""
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
                    <a id=""
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
                <h2 class="text-menu text-2xl font-bold mb-4 pt-4">College Department/Course</h2>
                <div class="bg-white px-6  rounded-sm shadow-sm">
                    <!-- <h2 class="text-xl font-heading font-bold mb-4">Student Table</h2> -->
                    <div class="flex justify-between items-center pt-4 pb-2  bg-white">
                        <!-- Search Input on the left -->
                        <div>
                            <button type="button" id="refresh"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 relative group">
                                <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                                </svg>
                                <span class="sr-only">refresh</span>

                                <!-- Tooltip -->
                                <span
                                    class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                                    Refresh
                                </span>
                            </button>


                            <input type="text" id="studentSearch" placeholder="Search Course & press enter..."
                                class="p-2 border border-gray-300 rounded-sm focus:ring-2 focus:ring-gray-200 focus:outline-none w-64">
                        </div>

                        <button id="addCourse" data-modal-target="add-course-modal" data-modal-toggle="add-course-modal"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">Add Course
                        </button>


                    </div>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-slate-600 bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Course Name</th>
                                <th scope="col" class="px-6 py-3">Action</th>
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

            // Query to fetch course data with pagination
            $stmt = $pdo->prepare("
                SELECT id, course_section_name
                FROM department
                WHERE grade_level = 'college' AND isDeleted = 0
                LIMIT :limit OFFSET :offset
            ");
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $courses = $stmt->fetchAll();

            // Query to count total number of courses for pagination
            $countStmt = $pdo->query("SELECT COUNT(*) FROM department WHERE grade_level = 'college' AND isDeleted = 0");
            $totalCourses = $countStmt->fetchColumn();
            $totalPages = ceil($totalCourses / $limit); // Calculate total pages

            // Check if there are any courses
            if ($courses) {
                foreach ($courses as $course) {
                    echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
                    echo '<td class="px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">' . htmlspecialchars($course['id']) . '</td>';
                    echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($course['course_section_name']) . '</td>';
                    echo '<td class="px-6 py-4 text-gray-800 flex items-center gap-2">';
                    
                    // Edit button
                    echo '<button class="showEditCourseModal inline-flex items-center p-2 rounded-full transition-all duration-200 ease-in-out hover:bg-blue-100" 
                    data-modal-target="edit-course-modal" 
                    data-modal-toggle="edit-course-modal" 
                    data-course-id="' . htmlspecialchars($course['id'], ENT_QUOTES, 'UTF-8') . '" 
                    data-course-name="' . htmlspecialchars($course['course_section_name'], ENT_QUOTES, 'UTF-8') . '">
                    <svg class="w-5 h-5 text-blue-600 hover:text-blue-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M15.232 5.232l3.536 3.536m-2.036-4.036l-1.5 1.5m-1 1-9 9V21h3.5l9-9m-1-1 1.5-1.5m1-1-3.536-3.536z" />
                    </svg>
                    <span class="sr-only">Edit</span>
                    </button>';

                    // Delete button
                    echo '<button class="deleteCourse inline-flex items-center p-2 rounded-full transition-all duration-200 ease-in-out hover:bg-red-100" 
                            data-course-id="' . htmlspecialchars($course['id'], ENT_QUOTES, 'UTF-8') . '">
                            <svg class="w-5 h-5 text-red-600 hover:text-red-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M19 7l-1 14H6L5 7m5-4h4m-4 0h4M4 7h16M9 11v6m6-6v6" />
                            </svg>
                            <span class="sr-only">Delete</span>
                          </button>';
                    
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="3" class="px-6 py-4 text-center">No courses found</td></tr>';
            }
            

            // Pagination
            echo '<nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 px-4 pb-2" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                        Showing <span class="font-semibold text-gray-900 dark:text-white">' . (($page - 1) * $limit + 1) . '-' . min($page * $limit, $totalCourses) . '</span>
                        of <span class="font-semibold text-gray-900 dark:text-white">' . $totalCourses . '</span>
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
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
                        </tbody>
                    </table>


                </div>

                <?php  include '../../include/admin/add_modal_course_college.php';?>
                <?php  include '../../include/admin/edit_modal_course_college.php';?>

            </div>
            <!-- end of content -->

    </div>
    </main>
    </div>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="../../../node_modules/flowbite/dist/flowbite.min.js"></script>
    <!-- <script src="../../assets/js/admin/teacher_add_form.js"></script> -->
    <script src="../../assets/js/admin/logout.js"></script>
    <script>
    // SCRIPT TO ADD COURSE
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('add-course-form');

        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                try {
                    const formData = new FormData(this);

                    const response = await fetch('../../api/admin/api_add_course.php', {
                        method: 'POST',
                        body: formData
                    });

                    const data = await response.json();

                    if (data.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Course added successfully',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.reset();
                                location.reload();
                            }
                        });
                    } else {
                        // Show error message with specific message from server
                        Swal.fire({
                            title: 'Error!',
                            text: data.message || 'Failed to add course',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        });
                    }

                } catch (error) {
                    console.error('Detailed Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while adding the course: ' + error.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        } else {
            console.error('Form not found!');
        }
    });

    //SCRIPT TO EDIT COURSE
    document.addEventListener('DOMContentLoaded', function() {
        // Get all edit buttons
        const editButtons = document.querySelectorAll('.showEditCourseModal');
        const editForm = document.getElementById('edit-course-form');

        // Variable to store original course name for comparison
        let originalCourseName = '';

        // Add click event listener to each edit button
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Get data from button attributes
                const courseId = this.getAttribute('data-course-id');
                const courseName = this.getAttribute('data-course-name');

                // Store original course name for later comparison
                originalCourseName = courseName;

                // Populate the edit form fields
                document.getElementById('edit_course_id').value = courseId;
                document.getElementById('edit_course_name').value = courseName;

                console.log('Populated edit form:', {
                    courseId,
                    courseName
                }); // Debug log
            });
        });

        // Handle edit form submission
        if (editForm) {
            editForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Get the current value
                const currentCourseName = document.getElementById('edit_course_name').value.trim();

                // Check if there are any changes
                if (currentCourseName === originalCourseName) {
                    Swal.fire({
                        title: 'No Changes',
                        text: 'No changes were made to the course name.',
                        icon: 'info',
                        confirmButtonText: 'OK'
                    });
                    return; // Stop form submission if no changes
                }

                try {
                    const formData = new FormData(this);

                    // Debug: Log form data
                    console.log('Update Form Data:', Object.fromEntries(formData));

                    const response = await fetch('../../api/admin/api_update_course.php', {
                        method: 'POST',
                        body: formData
                    });

                    const data = await response.json();

                    if (data.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Course updated successfully',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Close modal and refresh page
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: data.message || 'Failed to update course',
                            icon: 'warning',
                            confirmButtonText: 'OK'
                        });
                    }

                } catch (error) {
                    console.error('Update Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while updating the course: ' + error
                            .message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    });
    //DELETE COURSE
    document.addEventListener('DOMContentLoaded', function() {
        // Get all delete buttons
        const deleteButtons = document.querySelectorAll('.deleteCourse');

        // Add click event listener to each delete button
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const courseId = this.getAttribute('data-course-id');

                // Show confirmation dialog using SweetAlert2
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this course?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Proceed with deletion
                        deleteCourse(courseId);
                    }
                });
            });
        });

        // Function to handle course deletion
        async function deleteCourse(courseId) {
            try {
                const formData = new FormData();
                formData.append('course_id', courseId);

                const response = await fetch('../../api/admin/api_delete_course.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Course has been deleted successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Refresh the page after successful deletion
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message || 'Failed to delete course',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }

            } catch (error) {
                console.error('Delete Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while deleting the course',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
    });
    </script>

</body>

</html>