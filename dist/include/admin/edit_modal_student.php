 <!-- Edit teacher Modal -->
 <!-- ================================================================================================================================== -->
 <!-- Edit teacher modal -->
 <div id="edit-student-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full max-w-lg max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-sm shadow dark:bg-gray-700">
             <!-- Modal header -->
             <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                 <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                     Edit Teacher's Account
                 </h3>
                 <button type="button"
                     class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-sm text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                     data-modal-toggle="edit-student-modal">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <!-- Registration Form -->
             <div class="bg-white px-6 py-4 rounded-sm shadow-sm">
                 <form class="space-y-6">
                     <!-- Personal Information -->
                     <div>
                         <h3 class="text-lg font-bold text-primary">Personal Information</h3>
                         <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                             <div>
                                 <label for="edit_firstname" class="block text-sm font-medium text-gray-700">First
                                     Name</label>
                                 <input type="text" id="edit_firstname" name="edit_firstname"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Enter First Name" required>
                             </div>
                             <div>
                                 <label for="edit_middlename" class="block text-sm font-medium text-gray-700">Middle
                                     Name</label>
                                 <input type="text" id="edit_middlename" name="edit_middlename"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Enter Middle Name" required>
                             </div>
                             <div>
                                 <label for="edit_lastname" class="block text-sm font-medium text-gray-700">Last
                                     Name</label>
                                 <input type="text" id="edit_lastname" name="edit_lastname"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Enter Last Name" required>
                             </div>
                             <div>
                                 <label for="edit_gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                 <select id="edit_gender" name="edit_gender"
                                     class="mt-1 p-2 block w-full text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     required>
                                     <option value="" class="text-gray-700">Select Gender</option>
                                     <option value="male">Male</option>
                                     <option value="female">Female</option>
                                     <option value="other">Other</option>
                                 </select>
                             </div>
                             <div class="md:col-span-2">
                                 <label for="edit_dob" class="block text-sm font-medium text-gray-700">Date of
                                     Birth</label>
                                 <input type="date" id="edit_dob" name="edit_dob"
                                     class="mt-1 p-2 text-gray-700 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     required>
                             </div>
                             <div>
                                 <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
                                 <input type="text" id="edit_email" name="edit_email"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Enter Email" required>
                             </div>
                             <div>
                                 <label for="edit_contact_number"
                                     class="block text-sm font-medium text-gray-700">Contact</label>
                                 <input type="tel" id="edit_contact_number" name="edit_contact_number"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Enter Contact Number" required>

                             </div>
                             <div>
                                 <label for="edit_address" class="block text-sm font-medium text-gray-700">Address</label>
                                 <input type="text" id="edit_address" name="edit_address"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Enter Address" required>
                             </div>
                         </div>
                     </div>

                     <!-- Parent/Guardian Information -->
                     <div class="mt-6">
                         <h3 class="text-lg font-bold text-primary">Parent/Guardian Information</h3>
                         <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                             <div>
                                 <label for="edit_guardian_name"
                                     class="block text-sm font-medium text-gray-700">Parent/Guardian
                                     Name</label>
                                 <input type="text" id="edit_guardian_name" name="edit_guardian_name"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Enter Parent/Guardian Name" required>
                             </div>
                             <div>
                                 <label for="edit_relationship" class="block text-sm font-medium text-gray-700">Relationship
                                     to
                                     Student</label>
                                 <input type="text" id="edit_relationship" name="edit_relationship"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="e.g., Mother, Father, Guardian" required>
                             </div>
                             <div>
                                 <label for="edit_guardian_contact" class="block text-sm font-medium text-gray-700">Contact
                                     Number</label>
                                 <input type="tel" id="edit_guardian_contact" name="edit_guardian_contact"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Enter Contact Number" required>
                             </div>
                             <div class="md:col-span-2">
                                 <label for="edit_guardian_address" class="block text-sm font-medium text-gray-700">Home
                                     Address</label>
                                 <textarea id="edit_guardian_address" name="edit_guardian_address"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Enter Home Address" required></textarea>
                             </div>
                         </div>
                     </div>

                     <!-- Academic Information -->
                     <div class="">
                         <h3 class="text-lg font-bold text-primary">Academic Information</h3>
                         <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                             <div>
                                 <label for="edit_course" class="block text-sm font-medium text-gray-700">Course</label>
                                 <input type="text" id="edit_course" name="edit_course"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Enter Course" required>
                             </div>
                             <div>
                                 <label for="edit_year_level" class="block text-sm font-medium text-gray-700">Year
                                     Level</label>
                                 <select id="edit_year_level" name="edit_year_level"
                                     class="mt-1 p-2 text-gray-700 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     required>
                                     <option value="">Select Year Level</option>
                                     <option value="1st Year">1st Year</option>
                                     <option value="2nd Year">2nd Year</option>
                                     <option value="3rd Year">3rd Year</option>
                                     <option value="4th Year">4th Year</option>
                                 </select>
                             </div>
                             <div class="md:col-span-2">
                                 <label for="edit_fingerprint_id" class="block text-sm font-medium text-gray-700">Fingerprint
                                     ID</label>
                                 <input type="text" id="edit_fingerprint_id" name="edit_fingerprint_id"
                                     class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                     placeholder="Enter Fingerprint ID" required>
                             </div>
                         </div>
                     </div>

                     <!-- Submit Button -->
                     <div class="mt-10 mb-4">
                         <button type="submit"
                             class="w-full bg-blue-700 hover:bg-blue-800 text-white font-medium py-2 px-4 rounded-md focus:ring-4 focus:ring-blue-500 focus:outline-none">
                             Register
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- end of edit modal -->