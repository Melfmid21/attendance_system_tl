<?php
function getDatabaseConnection() {
    $servername = "localhost";
    $username = "root"; // Change to your DB username
    $password = ""; // Change to your DB password
    $dbname = "school_attendance";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>