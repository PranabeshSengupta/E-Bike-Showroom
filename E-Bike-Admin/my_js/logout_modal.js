function showLogoutModal() {
    document.getElementById('logoutModal').style.display = 'flex';
  }

  function hideLogoutModal() {
    document.getElementById('logoutModal').style.display = 'none';
  }

  function confirmLogout() {
    window.location.href = 'logout.php'; // Redirect to logout page or perform logout action
  }