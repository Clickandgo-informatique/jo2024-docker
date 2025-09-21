document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.getElementById("menuToggle");
    const navbarLinks = document.getElementById("navbarLinks");
    const menuOverlay = document.getElementById("menuOverlay");
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("main");
    const sidebarClose = document.getElementById("sidebarClose");
    const navbar = document.querySelector(".navbar");
    const subnavContainer = document.querySelector(".subnav-container"); // wrapper de la subnav
    const root = document.documentElement;

    // --- Calcule la hauteur dynamique (navbar + subnav) ---
    function updateSidebarOffset() {
        const navbarHeight = navbar ? navbar.offsetHeight : 0;
        const subnavHeight = subnavContainer ? subnavContainer.offsetHeight : 0;
        const headerHeight = navbarHeight + subnavHeight;

        root.style.setProperty("--navbar-height", navbarHeight + "px");
        root.style.setProperty("--subnav-height", subnavHeight + "px");
        root.style.setProperty("--header-height", headerHeight + "px");
    }

    // Initialisation
    updateSidebarOffset();

    // Recalcule si on resize (mobile <-> desktop)
    window.addEventListener("resize", updateSidebarOffset);

    // --- Ouvre le menu ---
    function openMenu() {
        menuToggle?.classList.add("active");
        menuOverlay?.classList.add("active");

        // Navbar mobile
        navbarLinks?.classList.add("open");

        // Sidebar admin
        if (sidebar) {
            if (window.innerWidth >= 768) {
                // Desktop → sidebar fixe
                sidebar.classList.add("open");
                main?.classList.add("shifted");
            } else {
                // Mobile → sidebar intégrée
                sidebar.classList.add("open");
            }
        }
    }

    // --- Ferme le menu ---
    function closeMenu() {
        menuToggle?.classList.remove("active");
        menuOverlay?.classList.remove("active");

        // Navbar mobile
        navbarLinks?.classList.remove("open");

        // Sidebar admin
        if (sidebar) {
            sidebar.classList.remove("open");
            main?.classList.remove("shifted");
        }
    }

    // --- Toggle via hamburger ---
    menuToggle?.addEventListener("click", () => {
        if (menuToggle.classList.contains("active")) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    // Fermer en cliquant sur overlay
    menuOverlay?.addEventListener("click", closeMenu);

    // Bouton de fermeture (desktop)
    sidebarClose?.addEventListener("click", closeMenu);

    // --- Gestion scroll horizontal de la subnav ---
    const subnav = document.getElementById("subnav");
    const subnavLeft = document.getElementById("subnavLeft");
    const subnavRight = document.getElementById("subnavRight");

    if (subnav && subnavLeft && subnavRight) {
        subnavLeft.addEventListener("click", () => {
            subnav.scrollBy({ left: -150, behavior: "smooth" });
        });
        subnavRight.addEventListener("click", () => {
            subnav.scrollBy({ left: 150, behavior: "smooth" });
        });
    }
});
