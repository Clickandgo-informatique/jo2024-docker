document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById("sidebarToggle");
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("main");
    const menuOverlay = document.getElementById("menuOverlay");

    if (!sidebar || !menuToggle) return; // si pas admin/2FA, ne fait rien

    function openMenu() {
        menuToggle.classList.add("active");
        menuOverlay?.classList.add("active");
        sidebar.classList.add("open");
        main?.classList.add("shifted");
    }

    function closeMenu() {
        menuToggle.classList.remove("active");
        menuOverlay?.classList.remove("active");
        sidebar.classList.remove("open");
        main?.classList.remove("shifted");
    }

    menuToggle.addEventListener("click", () => {
        if (menuToggle.classList.contains("active")) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    menuOverlay?.addEventListener("click", closeMenu);
});
