const menuToggle = document.getElementById("menuToggle");
const navbarLinks = document.getElementById("navbarLinks");
const menuOverlay = document.getElementById("menuOverlay");

menuToggle.addEventListener("click", () => {
    navbarLinks.classList.toggle("open");
    menuOverlay.classList.toggle("active");
});

menuOverlay.addEventListener("click", () => {
    navbarLinks.classList.remove("open");
    menuOverlay.classList.remove("active");
});
