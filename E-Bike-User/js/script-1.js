// Selecting elements
const menuToggle = document.getElementById('menu-toggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

// Toggle Sidebar on Menu Click
menuToggle.addEventListener('click', function() {
    sidebar.classList.toggle('active');  // Show/Hide sidebar
    overlay.classList.toggle('active');  // Show/Hide overlay
});

// Close Sidebar on clicking outside (overlay)
overlay.addEventListener('click', function() {
    sidebar.classList.remove('active');  // Hide sidebar
    overlay.classList.remove('active');  // Hide overlay
});
