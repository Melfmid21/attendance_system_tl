<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not authenticated
    header('Location: ../../index.php');
    exit();
}


$username = "Amid Gwapo";

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
                        class="flex items-center p-2 text-gray-200 rounded-sm bg-menu  dark:text-white hover:bg-menu dark:hover:bg-gray-700 group">
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
    <div class="p-4 sm:ml-64">
        <main class="p-2 dark:border-gray-700 mt-8">
            <div id="content-area">
                <!-- Dynamic content will be loaded here -->
                <h2 class="text-menu text-2xl font-bold mb-4 pt-4">Teacher</h2>


                <div class="bg-white px-6  rounded-sm shadow-sm">
                    <!-- <h2 class="text-xl font-heading font-bold mb-4">Student Table</h2> -->
                    <div class="flex justify-between items-center pt-4 pb-2  bg-white">
                        <!-- Search Input on the left -->
                        <div>
                            <input type="text" placeholder="Search..."
                                class="p-2 border border-gray-300 rounded-sm focus:ring-2 focus:ring-gray-200 focus:outline-none w-64">
                        </div>

                        <!-- Button on the right -->
                        <button data-modal-target="add-teacher-modal" data-modal-toggle="add-teacher-modal"
                            type="button"
                            class="text-menu bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-sm text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 ">
                            <img src="../../assets/images/add-user.png" alt="" class="w-6 h-5 me-2 -ms-1">
                            Create Teacher's Account
                        </button>
                        <!-- Modal toggle -->

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
            // Database connection
            $dsn = 'mysql:host=localhost;dbname=school_management;charset=utf8';
            $username = 'root';
            $password = '';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            try {
                $pdo = new PDO($dsn, $username, $password, $options);
                
                // Pagination settings
                $limit = 10; // Number of records per page
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
                $offset = ($page - 1) * $limit; // Calculate the offset

                // Query to fetch teacher data with pagination
                $stmt = $pdo->prepare("SELECT id, firstname, middle_initial, lastname, gender, email FROM users WHERE role != 'admin' AND status != 'inactive' LIMIT :limit OFFSET :offset");
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                $stmt->execute();
                $teachers = $stmt->fetchAll();

                // Query to count total number of teachers for pagination
                $countStmt = $pdo->query("SELECT COUNT(*) FROM users WHERE role != 'admin'");
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
                    
                        // Edit button with unique data-teacher
                        echo '<a class="showEditTeacherModal text-blue-600 hover:text-blue-900 space-x-1" 
                                 data-modal-target="edit-teacher-modal" 
                                 data-modal-toggle="edit-teacher-modal" 
                                 data-teacher="' . htmlspecialchars(json_encode($teacher), ENT_QUOTES, 'UTF-8') . '"
                                 style="margin-right: 10px;">';
                        echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="#1C64F2" xmlns="http://www.w3.org/2000/svg">
                              <path d="M20.1498 7.93997L8.27978 19.81C7.21978 20.88 4.04977 21.3699 3.32977 20.6599C2.60977 19.9499 3.11978 16.78 4.17978 15.71L16.0498 3.84C16.5979 3.31801 17.3283 3.03097 18.0851 3.04019C18.842 3.04942 19.5652 3.35418 20.1004 3.88938C20.6356 4.42457 20.9403 5.14781 20.9496 5.90463C20.9588 6.66146 20.6718 7.39189 20.1498 7.93997V7.93997Z" stroke="#1C64F2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg></a>';
                    
                        // Delete button
                        echo '<a id="deleteTeacher" data-id="' . htmlspecialchars(json_encode($teacher), ENT_QUOTES, 'UTF-8') . '" class="text-red-600 hover:text-red-900">
                              <svg width="20" height="20" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                              <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" stroke="#FF3B30" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg></a>';
                        echo '</td>';
                        echo '</tr>';
                        
                    }
                } else {
                    echo '<tr><td colspan="4" class="px-6 py-4 text-center">No teachers found</td></tr>'; // Update colspan
                }
            } catch (PDOException $e) {
                echo 'Database error: ' . $e->getMessage();
            }
            ?>
                        </tbody>
                    </table>
                    <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4 px-4 pb-2"
                        aria-label="Table navigation">
                        <span
                            class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
                            Showing <span
                                class="font-semibold text-gray-900 dark:text-white"><?= (($page - 1) * $limit) + 1 ?>-<?= min($page * $limit, $totalTeachers) ?></span>
                            of <span class="font-semibold text-gray-900 dark:text-white"><?= $totalTeachers ?></span>
                        </span>
                        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                            <li>
                                <a href="?page=<?= max(1, $page - 1) ?>"
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li>
                                <a href="?page=<?= $i ?>"
                                    class="flex items-center justify-center px-3 h-8 <?= ($i === $page) ? 'text-blue-600 border border-gray-300 bg-blue-50' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700' ?> dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $i ?></a>
                            </li>
                            <?php endfor; ?>
                            <li>
                                <a href="?page=<?= min($totalPages, $page + 1) ?>"
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>


                <!-- ===========================================================================================================================================                   -->
                <!-- Add teacher modal -->
                <div id="add-teacher-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-sm shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Create Teacher's Account
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-sm text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="add-teacher-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" id="add-teacher-form">
                                <div class="grid gap-4 mb-4 grid-cols-3">
                                    <!-- First Row: Firstname, M.I, Lastname -->
                                    <div>
                                        <label for="firstname"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Firstname</label>
                                        <input type="text" name="firstname" id="firstname"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="First name" required>
                                    </div>
                                    <div>
                                        <label for="middle-initial"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M.I.</label>
                                        <input type="text" name="middle-initial" id="middle-initial"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="M.I." maxlength="1">
                                    </div>
                                    <div>
                                        <label for="lastname"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lastname</label>
                                        <input type="text" name="lastname" id="lastname"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Last name" required>
                                    </div>
                                </div>

                                <!-- Second Row: Gender Dropdown -->
                                <div class="mb-4">
                                    <label for="gender"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                    <select id="gender" name="gender"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected>Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <!-- Next Row: Email -->
                                <div class="mb-4">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Email address" required>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="text-white w-full flex justify-center items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Submit
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
                <!-- end of add teacher modal -->
                <!-- Edit teacher Modal -->
                <!-- ================================================================================================================================== -->
                <!-- Edit teacher modal -->
                <div id="edit-teacher-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-sm shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Edit Teacher's Account
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-sm text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="edit-teacher-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form id="edit-teacher-form" class="p-4 md:p-5">
                                <input type="number" name="id" id="id"
                                    class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-sm p-2.5 focus:outline-none"
                                    hidden>
                                <div class="grid gap-4 mb-4 grid-cols-3">


                                    <!-- First Row: Firstname, M.I, Lastname -->
                                    <div>
                                        <label for="firstname"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Firstname</label>
                                        <input type="text" name="firstname" id="edit-firstname"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="First name" required>
                                    </div>
                                    <div>
                                        <label for="middle-initial"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">M.I.</label>
                                        <input type="text" name="middle-initial" id="edit-middle-initial"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="M.I." maxlength="1">
                                    </div>
                                    <div>
                                        <label for="lastname"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lastname</label>
                                        <input type="text" name="lastname" id="edit-lastname"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Last name" required>
                                    </div>
                                </div>

                                <!-- Second Row: Gender Dropdown -->
                                <div class="mb-4">
                                    <label for="gender"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                    <select id="edit-gender" name="gender"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected>Select gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <!-- Next Row: Email -->
                                <div class="mb-4">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="edit-email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Email address" required>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="text-white w-full flex justify-center items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Edit
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
                <!-- end of edit modal -->

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
</body>

</html>