<?php
// Include database connection file
require_once '../../config/pdo_database.php';


// Decode the JSON data received from the client
$data = json_decode(file_get_contents("php://input"));

// Get the values from the JSON data
$teacher_id = $data->teacher;
$year_level = $data->year_level;
$course_id = $data->course;
$subject_id = $data->subject;
$days = implode(", ", $data->days);  // Convert the array of days to a string
$start_time = $data->start_time;
$end_time = $data->end_time;
$is_deleted = 0;  // Assuming new schedule is not deleted by default

// Prepare the SQL query to check if the schedule already exists based on the combination of teacher_id, year_level, course_id, and subject_id
$query = "SELECT COUNT(*) FROM teacher_schedule WHERE teacher_id = :teacher_id AND year_level = :year_level AND course_id = :course_id AND subject_id = :subject_id AND isDeleted = 0";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':teacher_id', $teacher_id);
$stmt->bindParam(':year_level', $year_level);
$stmt->bindParam(':course_id', $course_id);
$stmt->bindParam(':subject_id', $subject_id);

try {
    // Execute the query to check if the schedule already exists
    $stmt->execute();
    $result = $stmt->fetchColumn();

    if ($result > 0) {
        // If the schedule already exists, return an error message
        echo json_encode([
            'status' => 'error',
            'message' => 'This schedule already exists for the selected teacher, year level, course, and subject.'
        ]);
    } else {
        // If the schedule does not exist, proceed to insert the new schedule
        $insertQuery = "INSERT INTO teacher_schedule (teacher_id, year_level, course_id, subject_id, days, start_time, end_time, isDeleted)
                        VALUES (:teacher_id, :year_level, :course_id, :subject_id, :days, :start_time, :end_time, :is_deleted)";
        $insertStmt = $pdo->prepare($insertQuery);
        $insertStmt->bindParam(':teacher_id', $teacher_id);
        $insertStmt->bindParam(':year_level', $year_level);
        $insertStmt->bindParam(':course_id', $course_id);
        $insertStmt->bindParam(':subject_id', $subject_id);
        $insertStmt->bindParam(':days', $days);
        $insertStmt->bindParam(':start_time', $start_time);
        $insertStmt->bindParam(':end_time', $end_time);
        $insertStmt->bindParam(':is_deleted', $is_deleted);

        // Execute the insert query
        $insertStmt->execute();

        // Return success response
        echo json_encode([
            'status' => 'success',
            'message' => 'Teacher schedule saved successfully!'
        ]);
    }

} catch (PDOException $e) {
    // Handle error
    echo json_encode([
        'status' => 'error',
        'message' => 'Error occurred: ' . $e->getMessage()
    ]);
}
?>