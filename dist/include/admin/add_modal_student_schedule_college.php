   <!-- ===========================================================================================================================================                   -->
   <!-- Add teacher modal -->
   <div id="add_schedule_modal" tabindex="-1" aria-hidden="true"
       class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
       <div class="relative w-full max-w-4xl max-h-full">
           <!-- Modal content -->
           <div class="relative bg-white rounded-sm shadow dark:bg-gray-700">
               <!-- Modal header -->
               <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                   <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                       Create Student's Schedule
                   </h3>
                   <button type="button"
                       class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-sm text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                       data-modal-toggle="add_schedule_modal">
                       <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                           viewBox="0 0 14 14">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                       </svg>
                       <span class="sr-only">Close modal</span>
                   </button>
               </div>
               <!-- Modal body -->
               <form class="p-4 md:p-5 grid grid-cols-2 gap-4" id="add-student-schedule-form">
                   <!-- <div class="grid gap-4 mb-4 grid-cols-3">

                   </div> -->
                   <div class="mb-4">
                       <label for="teacher"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teacher</label>
                       <select id="teacher" name="teacher"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           required>
                           <option value="">Select student</option>
                           <?php
        // Include database connection
        require_once '../../config/pdo_database.php';

        try {
            // Prepare and execute the query for teachers
            $stmt = $pdo->prepare("SELECT id, firstname, lastname FROM students
                                WHERE grade_level = 'College' 
                                AND isDeleted = 0 
                                ORDER BY lastname ASC");
            $stmt->execute();

            // Fetch all students
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '">' 
                    . htmlspecialchars($row['lastname'] . ', ' . $row['firstname'], ENT_QUOTES, 'UTF-8') . 
                    '</option>';
            }
        } catch(PDOException $e) {
            error_log("Error loading students: " . $e->getMessage());
            echo '<option value="">Error loading students</option>';
        }
        ?>
                       </select>
                   </div>

                   <div class="mb-4">
                       <label for="year_level"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Handle Year
                           Level</label>
                       <select id="year_level" name="year_level"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           required>
                           <option value="">Select Year Level</option>
                           <option value="1">1st Year</option>
                           <option value="2">2nd Year</option>
                           <option value="3">3rd Year</option>
                           <option value="4">4th Year</option>
                       </select>
                   </div>
                   <!-- Course Selection -->
                   <div class="mb-4">
                       <label for="course" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Handle
                           Course</label>
                       <select id="course" name="course"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           required>
                           <option value="">Select course</option>
                           <?php
                            // Include database connection
                            require_once '../../config/pdo_database.php';

                            try {
                                // Prepare and execute the query for courses
                                $stmt = $pdo->prepare("SELECT id, course_section_name FROM department 
                                                    WHERE grade_level = 'college' 
                                                    AND isDeleted = 0 
                                                    ORDER BY course_section_name ASC");
                                $stmt->execute();

                                // Fetch all courses
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '">' 
                                        . htmlspecialchars($row['course_section_name'], ENT_QUOTES, 'UTF-8') . 
                                        '</option>';
                                }
                            } catch(PDOException $e) {
                                error_log("Error loading courses: " . $e->getMessage());
                                echo '<option value="">Error loading courses</option>';
                            }
                            ?>
                       </select>
                   </div>

                   <!-- Subject Selection -->
                   <div class="mb-4">
                       <label for="subjects" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Handle
                           Subject</label>
                       <select id="subjects" name="subjects"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           required>
                           <option value="">Select subject</option>
                           <?php
                            // Include database connection
                            require_once '../../config/pdo_database.php';

                            try {
                                // Prepare and execute the query for courses
                                $stmt = $pdo->prepare("SELECT id, subject_name FROM subjects 
                                                    WHERE grade_level = 'college' 
                                                    AND isDeleted = 0 
                                                    ORDER BY subject_name ASC");
                                $stmt->execute();

                                // Fetch all courses
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . '">' 
                                        . htmlspecialchars($row['subject_name'], ENT_QUOTES, 'UTF-8') . 
                                        '</option>';
                                }
                            } catch(PDOException $e) {
                                error_log("Error loading subject: " . $e->getMessage());
                                echo '<option value="">Error loading subject</option>';
                            }
                            ?>
                       </select>
                   </div>

                   <!-- Days Selection -->
                   <!-- Days and Time Selection Container -->
                   <div class="mt-0">
                       <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Days</label>
                       <ul
                           class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                           <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                               <div class="flex items-center ps-3">
                                   <input id="monday-checkbox" type="checkbox" value=""
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                   <label for="monday-checkbox"
                                       class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Monday</label>
                               </div>
                           </li>
                           <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                               <div class="flex items-center ps-3">
                                   <input id="tuesday-checkbox" type="checkbox" value=""
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                   <label for="tuesday-checkbox"
                                       class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tuesday</label>
                               </div>
                           </li>
                           <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                               <div class="flex items-center ps-3">
                                   <input id="wednesday-checkbox" type="checkbox" value=""
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                   <label for="wednesday-checkbox"
                                       class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wednesday</label>
                               </div>
                           </li>
                           <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                               <div class="flex items-center ps-3">
                                   <input id="thursday-checkbox" type="checkbox" value=""
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                   <label for="thursday-checkbox"
                                       class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Thursday</label>
                               </div>
                           </li>
                           <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                               <div class="flex items-center ps-3">
                                   <input id="friday-checkbox" type="checkbox" value=""
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                   <label for="friday-checkbox"
                                       class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Friday</label>
                               </div>
                           </li>
                       </ul>


                   </div>


                   <!-- <form class="max-w-[16rem] mx-auto grid grid-cols-2 gap-4"> -->
                   <div>
                       <label for="start-time"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start time:</label>
                       <div class="relative">
                           <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                   <path fill-rule="evenodd"
                                       d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                       clip-rule="evenodd" />
                               </svg>
                           </div>
                           <input type="time" id="start-time"
                               class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               min="05:00" max="24:00" value="08:00" required />
                       </div>

                       <label for="end-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                           time:</label>
                       <div class="relative">
                           <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                   xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                   <path fill-rule="evenodd"
                                       d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                       clip-rule="evenodd" />
                               </svg>
                           </div>
                           <input type="time" id="end-time"
                               class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               min="05:00" max="24:00" value="09:00" required />
                       </div>
                   </div>
                   <!-- </form> -->




                   <!-- Submit Button -->
                   <button type="button"
                       class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-gray rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                   <!-- Submit Button -->
                   <button type="submit"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>

               </form>

           </div>
       </div>
   </div>
   <!-- end of add teacher modal -->