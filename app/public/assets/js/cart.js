const buttons = document.querySelectorAll(".btn");
const btnAddItem = document.querySelector(".btn-add-to-cart");
const btnRemoveItem = document.querySelector(".btn-remove-from-cart");
const reloadedContent = document.querySelector(".ajax-reloaded-data");
const cartItems = document.querySelector(".cart-items");

let url = "";

//Recherche du bouton apellant la fonction (délégation)
buttons.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        //On vérifie qu'il s'agît bien d'un bouton
        //de requête Ajax
        if (e.target.dataset.url) {
            e.preventDefault();
            url = e.target.dataset.url;
        } else {
            return;
        }
        //On éxécute la requête
        fetchCartData(url);
    });
});

const fetchCartData = async (url) => {
    let loading = true;
    try {
        const response = await fetch(url, {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        });
        reloadedContent.innerHTML = await response.text();
       
    } catch (error) {
        console.log(error);
    } finally {
        loading = false;
    }
};
