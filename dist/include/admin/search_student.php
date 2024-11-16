<?php
  $searchTerm = $_GET['query'] . '%';
try {
    $stmt = $pdo->prepare("SELECT id, firstname, middle_name, lastname, gender, email
    FROM students
    WHERE isDeleted != 1
    AND (firstname LIKE :searchTerm)");
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($students)) {
        try {
        $stmt = $pdo->prepare("SELECT id, firstname, middle_name, lastname, gender, email
        FROM students
        WHERE  isDeleted != 1
        AND (lastname LIKE :searchTerm)");
        $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Check if there are any students
        if ($students) {
            foreach ($students as $student) {
                $fullName = $student['firstname'] . ' ' . $student['middle_name'] . '. ' . $student['lastname'];
                echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
                echo '<td class="px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">' . htmlspecialchars($fullName) . '</td>';
                echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($student['gender']) . '</td>';
                echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($student['email']) . '</td>';
                echo '<td class="px-6 py-4" style="display: flex; align-items: center;">';
            
            // Edit button with tooltip
                echo '<button class="showEditTeacherModal inline-flex items-center p-1 rounded-full transition-all duration-200 ease-in-out hover:bg-blue-100 relative group" 
                data-modal-target="edit-student-modal" 
                data-modal-toggle="edit-student-modal" 
                data-student="' . htmlspecialchars(json_encode($student), ENT_QUOTES, 'UTF-8') . '"
                style="margin-right: 10px;">
                <svg class="w-5 h-5 text-blue-600 hover:text-blue-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.1498 7.93997L8.27978 19.81C7.21978 20.88 4.04977 21.3699 3.32977 20.6599C2.60977 19.9499 3.11978 16.78 4.17978 15.71L16.0498 3.84C16.5979 3.31801 17.3283 3.03097 18.0851 3.04019C18.842 3.04942 19.5652 3.35418 20.1004 3.88938C20.6356 4.42457 20.9403 5.14781 20.9496 5.90463C20.9588 6.66146 20.6718 7.39189 20.1498 7.93997V7.93997Z" 
                        stroke="currentColor" 
                        stroke-width="1.5" 
                        stroke-linecap="round" 
                        stroke-linejoin="round"/>
                </svg>
                <span class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                    Edit

                </button>';


            
            // Delete button with tooltip
                echo '<button class="inline-flex items-center p-1 rounded-full transition-all duration-200 ease-in-out hover:bg-red-100 relative group" 
                id="deleteTeacher" 
                data-id="' . htmlspecialchars(json_encode($student), ENT_QUOTES, 'UTF-8') . '">
                <svg class="w-5 h-5 text-red-600 hover:text-red-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" 
                        stroke="currentColor" 
                        stroke-width="2" 
                        stroke-linecap="round" 
                        stroke-linejoin="round"/>
                </svg>
                <span class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                    Delete

                </button>';

                echo '</td>';
                echo '</tr>';
                
            }
        } else {
            echo '<tr><td colspan="4" class="px-6 py-4 text-center">No students found</td></tr>'; // Update colspan
        }

        } catch (PDOException $e) {
        echo (['error' => 'Database error: ' . $e->getMessage()]);
        }
    }else{
    // Check if there are any students
    if ($students) {
        foreach ($students as $student) {
            $fullName = $student['firstname'] . ' ' . $student['middle_name'] . '. ' . $student['lastname'];
            echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
            echo '<td class="px-6 py-4 text-gray-800 whitespace-nowrap dark:text-white">' . htmlspecialchars($fullName) . '</td>';
            echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($student['gender']) . '</td>';
            echo '<td class="px-6 py-4 text-gray-800">' . htmlspecialchars($student['email']) . '</td>';
            echo '<td class="px-6 py-4" style="display: flex; align-items: center;">';
        
        // Edit button with tooltip
            echo '<button class="showEditTeacherModal inline-flex items-center p-1 rounded-full transition-all duration-200 ease-in-out hover:bg-blue-100 relative group" 
            data-modal-target="edit-student-modal" 
            data-modal-toggle="edit-student-modal" 
            data-student="' . htmlspecialchars(json_encode($student), ENT_QUOTES, 'UTF-8') . '"
            style="margin-right: 10px;">
            <svg class="w-5 h-5 text-blue-600 hover:text-blue-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.1498 7.93997L8.27978 19.81C7.21978 20.88 4.04977 21.3699 3.32977 20.6599C2.60977 19.9499 3.11978 16.78 4.17978 15.71L16.0498 3.84C16.5979 3.31801 17.3283 3.03097 18.0851 3.04019C18.842 3.04942 19.5652 3.35418 20.1004 3.88938C20.6356 4.42457 20.9403 5.14781 20.9496 5.90463C20.9588 6.66146 20.6718 7.39189 20.1498 7.93997V7.93997Z" 
                    stroke="currentColor" 
                    stroke-width="1.5" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"/>
            </svg>
            <span class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                Edit

            </button>';


        
        // Delete button with tooltip
            echo '<button class="inline-flex items-center p-1 rounded-full transition-all duration-200 ease-in-out hover:bg-red-100 relative group" 
            id="deleteTeacher" 
            data-id="' . htmlspecialchars(json_encode($student), ENT_QUOTES, 'UTF-8') . '">
            <svg class="w-5 h-5 text-red-600 hover:text-red-900" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 7V18C6 19.1046 6.89543 20 8 20H16C17.1046 20 18 19.1046 18 18V7M6 7H5M6 7H8M18 7H19M18 7H16M10 11V16M14 11V16M8 7V5C8 3.89543 8.89543 3 10 3H14C15.1046 3 16 3.89543 16 5V7M8 7H16" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round"/>
            </svg>
            <span class="invisible group-hover:visible absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                Delete

            </button>';

            echo '</td>';
            echo '</tr>';
            
        }
    } else {
        echo '<tr><td colspan="4" class="px-6 py-4 text-center">No students found</td></tr>'; // Update colspan
    }
    }

} catch (PDOException $e) {
echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>