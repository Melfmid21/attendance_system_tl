<?php
require_once '../../config/pdo_database.php';

// Query to get the most recent attendance record for the footer
$footerStmt = $pdo->prepare("SELECT fullname, date_time FROM attendance WHERE DATE(date_time) = CURDATE() ORDER BY date_time DESC LIMIT 1");
$footerStmt->execute();
$footerRecord = $footerStmt->fetch(PDO::FETCH_ASSOC);

if ($footerRecord) {
    $formattedFooterTime = date('h:i A', strtotime($footerRecord['date_time']));
    echo '<span class="text-gray-800 text-6xl font-bold mr-4">' . htmlspecialchars($footerRecord['fullname']) . '</span>';
    echo '<span class="text-red-500 text-6xl font-bold ml-4">' . $formattedFooterTime . '</span>';
} else {
    echo '<span class="text-gray-500 text-4xl font-bold">No recent records available</span>';
}
?>