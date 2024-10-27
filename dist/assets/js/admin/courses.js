"use-strict"

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('dashboard_page').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = '../../pages/admin/ad_dashboard.php';
        console.log("Teacher button is clicked.");
    });
    document.getElementById('teacher_page').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = '../../pages/admin/teachers.php';
        console.log("Teacher button is clicked.");
    });
    document.getElementById('students_page').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = '../../pages/admin/students.php';
        console.log("Teacher button is clicked.");
    });
    document.getElementById('courses_page').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = '../../pages/admin/courses.php';
        console.log("Teacher button is clicked.");
    });
});