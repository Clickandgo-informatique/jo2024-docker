document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById("sidebarToggle");
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("main");
    const menuOverlay = document.getElementById("menuOverlay");
    const sidebarClose = document.getElementById("sidebarClose");
    const navbar = document.querySelector(".navbar");
    const subnav = document.querySelector(".subnav-container");

    // --- Calcule la hauteur du header (navbar + subnav) ---
    function updateSidebarTop() {
        const navbarHeight = navbar ? navbar.offsetHeight : 0;
        const subnavHeight = subnav ? subnav.offsetHeight : 0;
        const headerHeight = navbarHeight + subnavHeight;

        if (sidebar) sidebar.style.top = headerHeight + "px";
        if (menuOverlay) menuOverlay.style.top = headerHeight + "px";
        if (menuToggle) menuToggle.style.top = headerHeight + "px";

        document.documentElement.style.setProperty('--header-height', headerHeight + "px");
    }

    // --- Ajuste la position du hamburger pour qu'il suive la sidebar ---
    function updateHamburgerPosition() {
        if (!menuToggle || !sidebar) return;
        const sidebarWidth = sidebar.offsetWidth;
        if (sidebar.classList.contains("open") && window.innerWidth >= 768) {
            menuToggle.style.transform = `translateX(${sidebarWidth}px)`;
            if (main) main.classList.add("shifted");
        } else {
            menuToggle.style.transform = `translateX(0)`;
            if (main) main.classList.remove("shifted");
        }
    }

    function initSidebar() {
        requestAnimationFrame(() => {
            updateSidebarTop();
            updateHamburgerPosition();
        });
    }

    initSidebar();
    window.addEventListener("resize", initSidebar);

    function openMenu() {
        menuToggle?.classList.add("active");
        menuOverlay?.classList.add("active");
        sidebar?.classList.add("open");
        updateHamburgerPosition();
    }

    function closeMenu() {
        menuToggle?.classList.remove("active");
        menuOverlay?.classList.remove("active");
        sidebar?.classList.remove("open");
        updateHamburgerPosition();
    }

    // Toggle via hamburger
    menuToggle?.addEventListener("click", () => {
        sidebar?.classList.contains("open") ? closeMenu() : openMenu();
    });

    // Fermer overlay ou bouton close
    menuOverlay?.addEventListener("click", closeMenu);
    sidebarClose?.addEventListener("click", closeMenu);

    // Fermer sidebar sur clic d'un lien
    sidebar?.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", () => {
            closeMenu();
        });
    });
});
