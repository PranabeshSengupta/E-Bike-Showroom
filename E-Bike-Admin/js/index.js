const sidebarToggleBtn = document.getElementById("sidebarToggleTop");
      const sidebar = document.querySelector(".nav-item.sidebar");

      sidebarToggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-collapsed");
      });