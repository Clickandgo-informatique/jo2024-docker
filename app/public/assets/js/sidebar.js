document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("sidebar-toggle");
    const mainWrapper = document.querySelector(".main-wrapper");
    const navbar = document.getElementById("navbar");
    const subnav = document.getElementById("subnav-container");

    function adjustSidebar() {
        const navbarHeight = navbar ? navbar.offsetHeight : 0;
        const subnavHeight = subnav ? subnav.offsetHeight : 0; // assure que subnav existe
        const totalTop = navbarHeight + subnavHeight;

        sidebar.style.top = totalTop + "px";
        sidebar.style.height = `calc(100% - ${totalTop}px)`;
    }

    // Initial adjustment
    adjustSidebar();

    // Ajuster à chaque resize
    window.addEventListener("resize", adjustSidebar);

    // Toggle sidebar
    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("hidden");

        // Desktop : main-wrapper poussé
        if (window.innerWidth >= 769) {
            mainWrapper.style.marginLeft = sidebar.classList.contains("hidden")
                ? "0"
                : "240px";
        }

        // Flèche
        toggleBtn.textContent = sidebar.classList.contains("hidden")
            ? "▶"
            : "◀";
    });

    // Initial icon
    toggleBtn.textContent = sidebar.classList.contains("hidden") ? "▶" : "◀";
});
