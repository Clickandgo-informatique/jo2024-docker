const subnav = document.getElementById("subnav");
const leftBtn = document.getElementById("subnavLeft");
const rightBtn = document.getElementById("subnavRight");

leftBtn.addEventListener("click", () => {
    subnav.scrollBy({ left: -150, behavior: "smooth" });
});

rightBtn.addEventListener("click", () => {
    subnav.scrollBy({ left: 150, behavior: "smooth" });
});
