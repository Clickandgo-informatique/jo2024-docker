document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("sidebar-toggle");
    const mainWrapper = document.querySelector(".main-wrapper");

    // ===============================
    // Initialisation : Mini par défaut desktop
    // ===============================
    if (window.innerWidth >= 769) {
        sidebar.classList.add("sidebar-mini"); // sidebar réduite par défaut
        mainWrapper.style.marginLeft = "60px"; // décalage correspondant
        mainWrapper.style.width = "calc(100% - 60px)"; // largeur restante
        toggleBtn.style.left = "60px"; // position du bouton toggle
        toggleBtn.textContent = "▶"; // icône toggle
    }

    // ===============================
    // Toggle sidebar desktop / mobile
    // ===============================
    toggleBtn.addEventListener("click", () => {
        if (window.innerWidth >= 769) {
            const expanded = sidebar.classList.toggle("expanded"); // toggle expanded
            sidebar.classList.toggle("sidebar-mini", !expanded); // active/désactive mini
            mainWrapper.style.marginLeft = expanded ? "250px" : "60px"; // ajuste le main-wrapper
            mainWrapper.style.width = expanded
                ? "calc(100% - 250px)"
                : "calc(100% - 60px)";
            toggleBtn.style.left = expanded ? "250px" : "60px"; // bouton
            toggleBtn.textContent = expanded ? "◀" : "▶"; // icône
        } else {
            sidebar.classList.toggle("active"); // mode mobile
        }
    });

    // ===============================
    // Cliquer sur un item avec sous-menu en mode mini
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
                    // Étendre sidebar
                    sidebar.classList.add("expanded");
                    sidebar.classList.remove("sidebar-mini");
                    mainWrapper.style.marginLeft = "250px";
                    mainWrapper.style.width = "calc(100% - 250px)";
                    toggleBtn.style.left = "250px";
                    toggleBtn.textContent = "◀";

                    // Afficher le sous-menu
                    sublist.style.display = "block";
                } else {
                    // Toggle sous-menu si déjà étendu
                    sublist.style.display =
                        sublist.style.display === "block" ? "none" : "block";
                }
            });
        }
    });

    // ===============================
    // Reset sidebar / main-wrapper sur resize
    // ===============================
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 769) {
            sidebar.classList.add("sidebar-mini");
            sidebar.classList.remove("expanded", "active");
            mainWrapper.style.marginLeft = "60px";
            mainWrapper.style.width = "calc(100% - 60px)";
            toggleBtn.style.left = "60px";
            toggleBtn.textContent = "▶";

            document
                .querySelectorAll(".sidebar-sublist")
                .forEach((sub) => (sub.style.display = "none"));
        } else {
            sidebar.classList.remove("sidebar-mini", "expanded");
            sidebar.classList.remove("active");
            mainWrapper.style.marginLeft = "0";
            mainWrapper.style.width = "100%";
            toggleBtn.style.left = "";
            toggleBtn.textContent = "▶";

            document
                .querySelectorAll(".sidebar-sublist")
                .forEach((sub) => (sub.style.display = "none"));
        }
    });
});
