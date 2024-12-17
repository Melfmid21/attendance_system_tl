<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/icons/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    // Function to fetch and update the table with the latest records
    function updateTable() {
        $.ajax({
            url: '../../api/admin/api_students_attendance_table.php', // Path to the table data script
            method: 'GET',
            success: function(data) {
                $('table tbody').html(data); // Update the table rows
            }
        });
    }

    // Function to fetch and update the footer with the latest student and time
    function updateFooter() {
        $.ajax({
            url: '../../api/admin/api_students_attendance_footer.php', // Path to the footer data script
            method: 'GET',
            success: function(data) {
                $('.footer').html(data); // Update the footer content
            }
        });
    }

    // Update the table and footer every second
    setInterval(function() {
        updateTable();
        updateFooter();
    }, 1000);
    </script>
</head>

<body>

    <div class="bg-white px-6 rounded-sm shadow-sm pb-10">
        <div class="bg-white px-6 border-b-2 border-gray-200 flex items-center justify-between">
            <h2 class="text-menu text-2xl font-bold mb-4 pt-4">Student's Attendance</h2>

            <!-- Date and Time -->
            <div id="date-time" class="text-primary text-xl font-bold flex items-center justify-center"></div>
            <button type="button" id="fullscreen-btn"
                class="text-gray-300 hover:text-white border border-gray-300 hover:bg-blue-800  focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-3 py-2 text-xs text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Enter
                Fullscreen</button>
            <a href="../../pages/admin/ad_dashboard.php" id="expand"
                class="flex items-center p-2 text-white rounded-sm cursor-pointer dark:text-white hover:bg-menu hover:text-white dark:hover:bg-gray-700 relative group">
                <svg class="w-5 h-5 text-menu dark:text-white hover:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 9h4m0 0V5m0 4L4 4m15 5h-4m0 0V5m0 4 5-5M5 15h4m0 0v4m0-4-5 5m15-5h-4m0 0v4m0-4 5 5" />
                </svg>

                <!-- Tooltip -->
                <span
                    class="invisible group-hover:visible absolute -bottom-8 left-1/2 -translate-x-1/2 bg-primary text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                    Minimize Attendance
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
                <!-- Table rows will be inserted here dynamically -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="px-6 py-9 text-center bg-gray-100 dark:bg-gray-700">
                        <div class="flex justify-center items-center footer">
                            <!-- Footer content will be inserted here dynamically -->
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>


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


    const fullscreenBtn = document.getElementById('fullscreen-btn');

    fullscreenBtn.addEventListener('click', () => {
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.webkitRequestFullscreen) { // For Safari
            document.documentElement.webkitRequestFullscreen();
        } else if (document.documentElement.msRequestFullscreen) { // For older IE versions
            document.documentElement.msRequestFullscreen();
        }
    });

    // Optional: Exit fullscreen with a button
    document.addEventListener('fullscreenchange', () => {
        if (!document.fullscreenElement) {
            fullscreenBtn.textContent = 'Enter Fullscreen';
        } else {
            fullscreenBtn.textContent = 'Exit Fullscreen';
        }
    });
    </script>
</body>

</html>