document.addEventListener('DOMContentLoaded', () => {

    const menuIcon = document.getElementById('menu-icon');
    const navbarMenu = document.getElementById('navbar-menu');

    if (menuIcon && navbarMenu) {
        menuIcon.addEventListener('click', () => {
            navbarMenu.classList.toggle('active');
        });
    }


    // Logic for Dropdown Menu

    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userMenu = document.getElementById('user-menu');

    if (userMenuToggle && userMenu) {

        // Open and close the dropdown when clicking the trigger

        userMenuToggle.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent the click from propagating to the window and closing the menu immediately
            userMenu.classList.toggle('active');
        });


        // Close the dropdown if the user clicks anywhere outside of it

        window.addEventListener('click', (event) => {

            // Checks if the menu is open and if the click was not inside the dropdown container

            if (userMenu.classList.contains('active') && !userMenuToggle.contains(event.target)) {
                userMenu.classList.remove('active');
            }

        });

    }

});