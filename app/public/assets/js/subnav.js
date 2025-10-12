document.addEventListener("DOMContentLoaded", () => {
    const subnavWrapper = document.querySelector(".subnav-wrapper");
    const subnav = document.getElementById("subnav");
    const leftBtn = document.getElementById("subnavLeft");
    const rightBtn = document.getElementById("subnavRight");

    function updateSubnavButtons() {
        // Afficher ou cacher les boutons selon scroll position
        if (subnav.scrollWidth > subnavWrapper.clientWidth) {
            leftBtn.style.display = subnav.scrollLeft > 0 ? "flex" : "none";
            rightBtn.style.display =
                subnav.scrollLeft + subnavWrapper.clientWidth <
                subnav.scrollWidth
                    ? "flex"
                    : "none";
        } else {
            leftBtn.style.display = "none";
            rightBtn.style.display = "none";
        }
    }

    // Scroll via boutons
    leftBtn.addEventListener("click", () => {
        subnav.scrollBy({ left: -150, behavior: "smooth" });
    });

    rightBtn.addEventListener("click", () => {
        subnav.scrollBy({ left: 150, behavior: "smooth" });
    });

    // Mettre à jour les boutons après scroll
    subnavWrapper.addEventListener("scroll", updateSubnavButtons);
    window.addEventListener("resize", updateSubnavButtons);

    // Initialisation
    updateSubnavButtons();
});
