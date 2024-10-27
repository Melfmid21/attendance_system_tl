"use-strict"

    document.addEventListener('DOMContentLoaded', function () {
        const params = new URLSearchParams(window.location.search);
        const loginParam = params.get('login');
        const loginSuccess = loginParam === 'success';
        console.log('login parameter:', loginParam);
        console.log('login success:', loginSuccess);

        if(loginSuccess){
            loadContent('../../views/admin/home_content.php')
        }
        
        const content = document.getElementById('content');
        const burgerMenu = document.getElementById('burgerMenu');
        const sidebar = document.getElementById('sidebar');
        const closeSidebar = document.getElementById('closeSidebar');

        const menuHome = document.getElementById('menu-home');
        const menuStudents = document.getElementById('menu-students');
        const menuTeachers = document.getElementById('menu-teachers');
        const menuCourses = document.getElementById('menu-courses');
        const menuAttendance = document.getElementById('menu-attendance');

        menuHome.addEventListener('click', function () {
           loadContent('../../views/admin/home_content.php')
           changeHeadingText("Dashboard");
        });

        menuStudents.addEventListener('click', function () {
            //    loadContent('../../views/admin/student_content.php')
           // alert('menu students was clicked');
           loadContent('../../views/admin/students_content.php')
           changeHeadingText("Students");
           fetchStudents();
        });

        menuTeachers.addEventListener('click', function () {
            //    loadContent('../../views/admin/student_content.php')
           // alert('menu students was clicked');
           loadContent('../../views/admin/teachers_content.php')
           changeHeadingText("Teachers");
           fetchTeachers();
        });


        burgerMenu.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
        });

        closeSidebar.addEventListener('click', function () {
            sidebar.classList.add('hidden');
        });

        function changeHeadingText(text){
            // Assuming you have a button element with id="changeTextButton"
            const button = document.getElementById('heading-text');
            const heading = document.querySelector('h1.text-2xl');

            heading.textContent = text;
        
        }//end

        function loadContent(url){
            fetch(url).then(response => {
                if (!response.ok){
                    throw new Error('Network response was not ok');
                }
                return response.text();

            }).then(data => {
                content.innerHTML = data;
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
        }//end of loadContent

        function fetchStudents(){
            fetch('../../api/admin/fetchStudents.php')
            .then(response => response.json())
            .then(data => {
                if (data.success){
                    populateStudentTable(data.students);
                }else {
                    alert('Failed to fetch student data.');
                }
            }).catch(error => console.error('Error fetching student data:', error));
        }//end of fetchStudents

        function populateStudentTable(students){
            const tbody = document.querySelector('#studentTable tbody');
            tbody.innerHTML = '';
            students.forEach(students => { 
                console.log(students.id);
                console.log(students.firstname);
                console.log(students.lastname);
                const row = document.createElement('tr');
                row.className = 'bg-white justify-center border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-tertiary cursor-default';
                row.innerHTML = `<td class="py-5 px-4 text-center capitalize">${students.id}</td><td class="py-5 px-4 text-center capitalize">${students.firstname}</td><td class="py-5 px-4 text-center capitalize">${students.lastname}</td>`;
                tbody.appendChild(row);
            });
        }//end

        function fetchTeachers(){
            fetch('../../api/admin/fetchStudents.php')
            .then(response => response.json())
            .then(data => {
                if (data.success){
                    populateTeachersTable(data.students);
                }else {
                    alert('Failed to fetch student data.');
                }
            }).catch(error => console.error('Error fetching student data:', error));
        }//end of fetchStudents

        function populateTeachersTable(students){
            const tbody = document.querySelector('#studentTable tbody');
            tbody.innerHTML = '';
            students.forEach(students => { 
                console.log(students.id);
                console.log(students.firstname);
                console.log(students.lastname);
                const row = document.createElement('tr');
                row.className = 'bg-white justify-center border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-tertiary cursor-default';
                row.innerHTML = `<td class="py-5 px-4 text-center capitalize">${students.id}</td><td class="py-5 px-4 text-center capitalize">${students.firstname}</td><td class="py-5 px-4 text-center capitalize">${students.lastname}</td>`;
                tbody.appendChild(row);
            });
        }


        const logoutButton = document.getElementById('menu-logout');

        if (logoutButton) {
            logoutButton.addEventListener('click', function() {
                console.log('Logout button clicked');
        
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be logged out of your session.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, log me out!'
                }).then((result) => {
                    console.log('SweetAlert2 result:', result);
        
                    if (result.isConfirmed) {
                        console.log('User confirmed logout');
        
                        // Fade out dashboard content
                        const dashboardContainer = document.getElementById('dashboardContainer');
                        if (dashboardContainer) {
                            dashboardContainer.classList.remove('opacity-100');
                            dashboardContainer.classList.add('opacity-0');
                            console.log('Dashboard content faded out');
                        } else {
                            console.error('Dashboard container not found');
                        }
        
                        // Make a request to the logout.php script
                        fetch('./api/logout.php', {
                            method: 'GET'
                        }).then(response => {
                            console.log('Logout script response:', response);
                            
                            // Redirect to login after fade out
                            setTimeout(() => {
                                window.location.href = '../../index.php';
                            }, 300); // 300ms matches the transition duration
                        }).catch(error => {
                            console.error('Error during fetch:', error);
                            alert('An error occurred during logout.');
                        });
                    } else {
                        console.log('User cancelled logout');
                    }
                }).catch(error => {
                    console.error('SweetAlert2 error:', error);
                });
            });
        } else {
            console.error('Logout button not found');
        }        
    });