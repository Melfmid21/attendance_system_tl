<?php
header('Content-Type: application/json');
//http://192.168.254.175/client_folder/attendance_system_tl/dist/api/biometric/insertStudentAttendance.php
// Include the PDO database connection
require_once '../../config/pdo_database.php';

// Retrieve the unique ID from the query string
 $uniqueID = isset($_GET['id']) ? $_GET['id'] : "";
//$uniqueID = 1;

if (empty($uniqueID)) {
    echo json_encode(["status" => "error", "message" => "No ID provided"]);
    exit;
}

try {
    // Check if the fingerprint_id exists in the student table
    $stmt = $pdo->prepare("SELECT * FROM students WHERE fingerprint_id = :fingerprint_id");
    $stmt->execute(['fingerprint_id' => $uniqueID]);
    $student = $stmt->fetch();

    if ($student) {
        // Fetch the student details
        $student_id = $student['id'];
        $firstname = $student['firstname'];
        $middle_name = $student['middle_name'];
        $lastname = $student['lastname'];
        $grade_level = $student['grade_level'];
        $year_level = $student['year_level'];
        $course_section = $student['course'];

        // Create the full name in the format: lastname, firstname middle_initial
        $middle_initial = strtoupper(substr($middle_name, 0, 1)); // Get the initial of the middle name
        $fullname = $lastname . ', ' . $firstname . ' ' . $middle_initial . '.';

        // Insert the attendance record into the attendance table
        $attendanceStmt = $pdo->prepare("INSERT INTO attendance (student_id, fullname, grade_level, year_level, course_section) 
                                        VALUES (:student_id, :fullname, :grade_level, :year_level, :course_section)");
        $attendanceStmt->execute([
            'student_id' => $student_id,
            'fullname' => $fullname,
            'grade_level' => $grade_level,
            'year_level' => $year_level,
            'course_section' => $course_section
        ]);

        // Echo the name of the student if success
        echo json_encode([
            "status" => "success", 
            "message" => "Attendance recorded", 
            "student_id" => $student_id,
            "fullname" => $fullname
        ]);
    } else {
        // If the fingerprint ID is not found in the student table
        echo json_encode(["status" => "not found", "message" => "No matching fingerprint ID found in student records"]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>