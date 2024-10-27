<!-- Sidebar -->
<div id="sidebar" class="w-60 bg-primary text-white flex-col mt-4 mb-5 ml-4  rounded-lg  hidden md:block">
    <!-- Logo -->
    <div class="p-4 flex items-center mt-4 justify-center">
        <img src="../../assets/images/logo.png" alt="Logo" class="w-10 h-10 mr-2">
        <div class="p-4 text-2xl font-bold">SFC</div>
    </div>

    <p class="flex items-center text-sm mb-2 sm:mt-1 sm:mr-2 justify-center text-gray-50 capitalize md:hidden">
        Hello, <?php echo htmlspecialchars($userName); ?>!
    </p>
    <div class="h-0.5 mx-4 bg-white opacity-70"></div> <!-- Separator Line -->

    <!-- Navigation Menu -->
    <nav id="navigation" class="flex-1 mt-4 mb-4 overflow-hidden">
        <ul id="menu-home" class="menu-item block cursor-pointer rounded-md py-4 px-4 mx-4 mb-1" data-target="home">
            <li>
                <a href="#" aria-label="Dashboard">
                    <i class="fa-solid fa-house pr-3 "></i>
                    <span class="menu-item-label font-medium">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul id="menu-teachers" class="menu-item block cursor-pointer rounded-md py-4 px-4 mx-4 mb-1"
            data-target="teachers">
            <li>
                <a href="#" aria-label="Teachers">
                    <i class="fa-solid fa-person-chalkboard pr-3 text-gray-50"></i>
                    <span class="menu-item-label text-gray-50 font-medium">Teachers</span>
                </a>
            </li>
        </ul>
        <ul id="menu-students" class="menu-item block cursor-pointer rounded-md py-4 px-4 mx-4 mb-1"
            data-target="students">
            <li>
                <a href="#" aria-label="Students">
                    <i class="fa-solid fa-graduation-cap pr-3 text-gray-50"></i>
                    <span class="menu-item-label text-gray-50 font-medium">Students</span>
                </a>
            </li>
        </ul>
        <ul id="menu-attendance" class="menu-item block cursor-pointer rounded-md py-4 px-4 mx-4 mb-1"
            data-target="attendance">
            <li>
                <a href="#" aria-label="Attendance">
                    <i class="fa-solid fa-clipboard-user pr-5 text-gray-50"></i>
                    <span class="menu-item-label text-gray-50 font-medium">Attendance</span>
                </a>
            </li>
        </ul>
        <ul id="menu-courses" class="menu-item block cursor-pointer rounded-md py-4 px-4 mx-4 mb-1"
            data-target="courses">
            <li>
                <a href="#" aria-label="Courses">
                    <i class="fa-solid fa-book-open pr-3 text-gray-50"></i>
                    <span class="menu-item-label text-gray-50 font-medium">Courses</span>
                </a>
            </li>
        </ul>
        <!-- Settings Dropdown -->
        <ul class="relative">
            <li id="menu-settings" class="menu-item block cursor-pointer rounded-md py-4 px-4 mx-4 mb-1"
                data-target="settings">
                <a href="#" class="flex items-center" aria-label="Settings" id="toggleSettingsDropdown">
                    <i class="fa-solid fa-gear pr-5 text-gray-50"></i>
                    <span class="menu-item-label text-gray-50 font-medium">Settings</span>
                    <i class="fa-solid fa-chevron-down ml-auto"></i> <!-- Dropdown icon -->
                </a>
                <!-- Dropdown Content -->
                <ul id="settingsDropdown" class=" hidden origin-bottom  right-4  mt-2 
                         rounded-md shadow-lg  ring-1
                        ring-black ring-opacity-5 animate-fadeIn">
                    <li><a href="#" class="block py-2 px-4 text-primary hover:bg-tertiary">Register</a></li>
                    <li><a href="#" class="block py-2 px-4 text-primary hover:bg-tertiary">ESP32</a></li>
                    <li><a href="#" class="block py-2 px-4 text-primary hover:bg-tertiary">Profile</a></li>
                </ul>
            </li>
        </ul>
        <!-- Dropdown Content -->
        <!-- <ul id="settingsDropdown" class=" hidden origin-top-right right-4  mt-2 w-52
                         rounded-md shadow-lg bg-white ring-1
                        ring-black ring-opacity-5 animate-fadeIn">
            <li><a href="#" class="block py-2 px-4 text-gray-800 hover:bg-gray-100">Register</a></li>
            <li><a href="#" class="block py-2 px-4 text-gray-800 hover:bg-gray-100">ESP32</a></li>
            <li><a href="#" class="block py-2 px-4 text-gray-800 hover:bg-gray-100">Profile</a></li>
        </ul> -->
        <!-- Logout -->
        <ul id="menu-logout" class="menu-item block cursor-pointer rounded-md py-4 px-4 mx-4 mb-1" data-target="logout">
            <li><a href="#" aria-label="Logout"><i
                        class="fa-solid fa-arrow-right-from-bracket pr-5 text-gray-50"></i><span
                        class="menu-item-label text-gray-50 font-medium">Logout</span></a></li>
        </ul>

        <ul id="menu-close" class="flex justify-center mb-3 md:hidden">
            <li><a id="closeSidebar"
                    class="w-full text-white bg-secondary hover:bg-tertiary focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center justify-center"
                    aria-label="Close Sidebar"><i class="fa-solid fa-bars pr-3"></i><span class="menu-item-label">Close
                        Sidebar</span></a></li>
        </ul>
    </nav>
</div>