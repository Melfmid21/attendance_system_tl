<!-- Extra Large Modal -->
<div id="extralarge-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Extra Large modal
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="extralarge-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="bg-white px-6  rounded-sm shadow-sm pb-10">
                    <div class="bg-white px-6  border-b-2 border-gray-200 flex items-center justify-between">
                        <h2 class="text-menu text-2xl font-bold mb-4 pt-4">Student's Attendance</h2>

                        <!-- Date and Time -->
                        <div id="date-time" class="text-primary text-xl font-bold flex items-center justify-center">
                        </div>
                        <a id="expand" data-modal-hide="extralarge-modal">
                            class="flex items-center p-2 text-gray-200 rounded-sm cursor-pointer dark:text-white
                            hover:bg-menu hover:text-white dark:hover:bg-gray-700 relative group">
                            <svg class="w-5 h-5 text-menu dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 9h4m0 0V5m0 4L4 4m15 5h-4m0 0V5m0 4 5-5M5 15h4m0 0v4m0-4-5 5m15-5h-4m0 0v4m0-4 5 5" />
                            </svg>

                            <!-- Tooltip -->
                            <span
                                class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-primary text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                                Expand Attendance
                            </span>
                        </a>
                    </div>
                    <?php  include '../../include/admin/attendance_modal_expand.php';?>
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
        </div>
    </div>
</div>