document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("sidebar-toggle");
    const mainContent = document.querySelector(".main-content");

    // Mini par défaut desktop
    if (window.innerWidth >= 769) {
        sidebar.classList.add("sidebar-mini");
        mainContent.style.marginLeft = "60px";
        toggleBtn.style.left = "60px";
        toggleBtn.textContent = "▶";
    }

    // Toggle sidebar desktop / mobile
    toggleBtn.addEventListener("click", () => {
        if (window.innerWidth >= 769) {
            const expanded = sidebar.classList.toggle("expanded");
            sidebar.classList.toggle("sidebar-mini", !expanded);
            mainContent.style.marginLeft = expanded ? "250px" : "60px";
            toggleBtn.style.left = expanded ? "250px" : "60px";
            toggleBtn.textContent = expanded ? "◀" : "▶";
        } else {
            sidebar.classList.toggle("active");
        }
    });

    // Cliquer sur un item avec sous-menu en mode mini → ouvrir sidebar + afficher sous-menu
    const sidebarItems = document.querySelectorAll(".sidebar-item");
    sidebarItems.forEach(item => {
        const title = item.querySelector(".sidebar-item-title");
        const sublist = item.querySelector(".sidebar-sublist");
        if (title && sublist) {
            title.addEventListener("click", () => {
                if (window.innerWidth >= 769 && sidebar.classList.contains("sidebar-mini")) {
                    // Étendre sidebar
                    sidebar.classList.add("expanded");
                    sidebar.classList.remove("sidebar-mini");
                    mainContent.style.marginLeft = "250px";
                    toggleBtn.style.left = "250px";
                    toggleBtn.textContent = "◀";

                    // Afficher le sous-menu
                    sublist.style.display = "block";
                } else if (sublist) {
                    // Toggle sous-menu si déjà étendu
                    sublist.style.display = sublist.style.display === "block" ? "none" : "block";
                }
            });
        }
    });

    // Reset sur resize
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 769) {
            sidebar.classList.add("sidebar-mini");
            sidebar.classList.remove("expanded", "active");
            mainContent.style.marginLeft = "60px";
            toggleBtn.style.left = "60px";
            toggleBtn.textContent = "▶";
            document.querySelectorAll(".sidebar-sublist").forEach(sub => sub.style.display = "none");
        } else {
            sidebar.classList.remove("sidebar-mini", "expanded");
            sidebar.classList.remove("active");
            mainContent.style.marginLeft = "0";
            toggleBtn.style.left = "";
            toggleBtn.textContent = "▶";
            document.querySelectorAll(".sidebar-sublist").forEach(sub => sub.style.display = "none");
        }
    });
});
