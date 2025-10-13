document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("sidebar-toggle");
    const mainWrapper = document.querySelector(".main-wrapper");

    // ===============================
    // Initialisation au chargement
    // ===============================
    const initSidebar = () => {
        if (window.innerWidth >= 769) {
            // Desktop → sidebar mini par défaut
            sidebar.classList.add("sidebar-mini");
            sidebar.classList.remove("expanded", "active");
            mainWrapper.style.marginLeft = "60px";
            mainWrapper.style.width = "calc(100% - 60px)";
            toggleBtn.style.left = "60px";
            toggleBtn.style.right = "";
            toggleBtn.textContent = "▶";

            document.querySelectorAll(".sidebar-sublist").forEach((sub) => {
                sub.style.display = "none";
            });
        } else {
            // Mobile → sidebar fermée par défaut
            sidebar.classList.remove("sidebar-mini", "expanded");
            sidebar.classList.remove("active");
            mainWrapper.style.marginLeft = "0";
            mainWrapper.style.width = "100%";
            toggleBtn.style.left = "0px";
            toggleBtn.style.right = "";
            toggleBtn.textContent = "▶";

            document.querySelectorAll(".sidebar-sublist").forEach((sub) => {
                sub.style.display = "none";
            });
        }
    };

    initSidebar();

    // ===============================
    // Toggle sidebar au clic
    // ===============================
    toggleBtn.addEventListener("click", () => {
        if (window.innerWidth >= 769) {
            // Desktop → toggle mini / expanded
            const expanded = sidebar.classList.toggle("expanded");
            sidebar.classList.toggle("sidebar-mini", !expanded);
            mainWrapper.style.marginLeft = expanded ? "250px" : "60px";
            mainWrapper.style.width = expanded
                ? "calc(100% - 250px)"
                : "calc(100% - 60px)";
            toggleBtn.style.left = expanded ? "250px" : "60px";
            toggleBtn.textContent = expanded ? "◀" : "▶";
        } else {
            // Mobile → toggle sidebar active
            if (window.innerWidth < 769) {
                const active = sidebar.classList.toggle("active");
                toggleBtn.style.left = active
                    ? sidebar.offsetWidth + "px"
                    : "0px";
                toggleBtn.style.right = "";
                toggleBtn.textContent = active ? "◀" : "▶";
            }
        }
    });

    // ===============================
    // Click sur un item avec sous-menu en desktop mini
    // ===============================
    const sidebarItems = document.querySelectorAll(".sidebar-item");
    sidebarItems.forEach((item) => {
        const title = item.querySelector(".sidebar-item-title");
        const sublist = item.querySelector(".sidebar-sublist");

        if (title && sublist) {
            title.addEventListener("click", () => {
                if (
                    window.innerWidth >= 769 &&
                    sidebar.classList.contains("sidebar-mini")
                ) {
                    // Étendre sidebar et afficher sous-menu
                    sidebar.classList.add("expanded");
                    sidebar.classList.remove("sidebar-mini");
                    mainWrapper.style.marginLeft = "250px";
                    mainWrapper.style.width = "calc(100% - 250px)";
                    toggleBtn.style.left = "250px";
                    toggleBtn.textContent = "◀";
                    sublist.style.display = "block";
                } else {
                    // Toggle sous-menu si sidebar déjà étendue ou mobile
                    sublist.style.display =
                        sublist.style.display === "block" ? "none" : "block";
                }
            });
        }
    });

    // ===============================
    // Ajustement responsive au resize
    // ===============================
    window.addEventListener("resize", () => {
        initSidebar();
    });
});
