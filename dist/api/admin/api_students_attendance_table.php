<?php
require_once '../../config/pdo_database.php';

// Initialize variables to prevent warnings
$limit = 5; // Default limit
$offset = 0;
$records = [];

if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
    $offset = ($page - 1) * $limit;
}

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

// Output the updated table rows
if (!empty($records)) {
    $count = 0;
    foreach ($records as $record) {
        $count++;
        if($count==1){
            $formattedDateTime = date('F d, Y h:i A', strtotime($record['date_time']));
        echo '<tr class="bg-white border-b font-semibold dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
        echo '<td class="px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">' . htmlspecialchars($record['fullname']) . '</td>';
        echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($record['grade_level']) . '</td>';
        echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($record['year_level']) . '</td>';
        echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($record['course_section']) . '</td>';
        echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($formattedDateTime) . '</td>';
        echo '</tr>'; 
        } else {
            $formattedDateTime = date('F d, Y h:i A', strtotime($record['date_time']));
            echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
            echo '<td class="px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">' . htmlspecialchars($record['fullname']) . '</td>';
            echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($record['grade_level']) . '</td>';
            echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($record['year_level']) . '</td>';
            echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($record['course_section']) . '</td>';
            echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($formattedDateTime) . '</td>';
            echo '</tr>';
        }
    }
} else {
    echo '<tr><td colspan="5" class="px-6 py-4 text-center">No records found</td></tr>';
}
?>