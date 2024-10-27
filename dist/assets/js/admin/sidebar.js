"use-strict"

document.addEventListener("DOMContentLoaded", function() {
    const menuItems = document.querySelectorAll('.menu-item');

    // Function to handle menu item click
    function handleMenuItemClick(clickedItem) {
        // Remove active class from all menu items
        menuItems.forEach(menuItem => {
            menuItem.classList.remove('active');
        });
        // Add active class to the clicked menu item
        clickedItem.classList.add('active');
    }

    // Add event listener to each menu item
    menuItems.forEach(item => {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            handleMenuItemClick(item);
        });
    });

    // Settings Dropdown
    const settingsDropdown = document.getElementById('settingsDropdown');
    const toggleSettingsDropdown = document.getElementById('toggleSettingsDropdown');
    const menuSettings = document.getElementById('menu-settings');
    const dropdownIcon = document.querySelector('#toggleSettingsDropdown .fa-chevron-down');

    toggleSettingsDropdown.addEventListener('click', function(event) {
        event.preventDefault();
        settingsDropdown.classList.toggle('hidden');
        menuSettings.classList.toggle('active'); // Toggle active class on click
       // Rotate the icon based on the dropdown visibility
        if (! settingsDropdown.classList.contains('hidden')) {
            dropdownIcon.classList.remove('fa-chevron-down');
            dropdownIcon.classList.add('fa-chevron-up');
        } else {
            dropdownIcon.classList.remove('fa-chevron-up');
            dropdownIcon.classList.add('fa-chevron-down');
        }

    });

    // Close dropdown when clicking outside of it
    document.addEventListener('click', function(event) {
        if (!toggleSettingsDropdown.contains(event.target)) {
            settingsDropdown.classList.add('hidden');
            menuSettings.classList.remove('active'); // Remove active class when clicking outside
         
        }
    });

    // Set dashboard as active by default on page load
    const dashboardMenuItem = document.getElementById('menu-home');
    handleMenuItemClick(dashboardMenuItem); // Initial activation of dashboard
});

