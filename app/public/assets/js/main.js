//Gestion fermeture des flashbags
const flashBtnClose = document.querySelectorAll(".alert .btn-close");

//Ferme les flashbags si il y en a
if (flashBtnClose !== null) {
    flashBtnClose.forEach((el) => {
        el.addEventListener("click", (e) => {
            e.target.parentElement.remove();
        });
    });
}
