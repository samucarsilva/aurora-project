document.addEventListener("DOMContentLoaded", function() {

    const toggle = document.getElementById('menu-icon');
    const navList = document.getElementById('navbar-menu');

    toggle.addEventListener('click', () => {
        navList.classList.toggle('active');
    });


    // Close Menu When Clicking on an Item


    const navLinks = navList.querySelectorAll('a');

    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            navList.classList.remove('active');
        });
    });
});