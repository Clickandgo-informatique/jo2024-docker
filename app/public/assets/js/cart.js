window.addEventListener("DOMContentLoaded", () => {
    const cartBadge = document.getElementById("cart-count");
    const reloadedContent = document.querySelector("#cart-container");

    //Actualisation du chiffre du panier + animation
    function updateCartCount(newCount) {
        if (!cartBadge) return;
        cartBadge.textContent = newCount;
        cartBadge.style.display = newCount > 0 ? "inline-block" : "none";
        cartBadge.classList.add("animate");
        setTimeout(() => cartBadge.classList.remove("animate"), 300);
    }
    //Bouton ajouter au panier + redirection vers
    //page du panier
    document.addEventListener("click", (e) => {
        const btn = e.target.closest(".add-to-cart");
        if (!btn) return;
        e.preventDefault(); // empêche la navigation GET

        fetchCartData(btn.dataset.url, btn.dataset.method || "POST")
            .then(() => {
                // Redirige vers la page du panier
                window.location.href = "/panier";
            })
            .catch((err) => console.error("Erreur ajout au panier :", err));
    });

    async function fetchCartData(url, method = "POST", data = null) {
        try {
            const options = {
                method,
                headers: { "X-Requested-With": "XMLHttpRequest" },
            };
            if (data)
                options.body =
                    data instanceof FormData ? data : new URLSearchParams(data);

            const res = await fetch(url, options);
            if (!res.ok) throw new Error(`HTTP error! status: ${res.status}`);
            const result = await res.json();

            if (result.success) {
                if (typeof result.cartCount !== "undefined")
                    updateCartCount(result.cartCount);
                if (result.html && reloadedContent)
                    reloadedContent.innerHTML = result.html;
            }
        } catch (e) {
            console.error("Erreur AJAX panier :", e);
        }
    }

    // Initialisation : récupérer le nombre d’articles au chargement
    fetchCartData("/panier/count", "GET");

    // Gestion clics boutons + / - / remove / clear
    document.addEventListener("click", (e) => {
        const btn = e.target.closest(".btn[data-url]");
        if (!btn) return;
        e.preventDefault();

        const method = btn.dataset.method || "POST";

        // Si bouton + ou -
        const input = btn.parentElement.querySelector(".quantity-input");
        if (btn.classList.contains("increase"))
            input.value = parseInt(input.value) + 1;
        if (btn.classList.contains("decrease"))
            input.value = Math.max(1, parseInt(input.value) - 1);

        // Préparer les données
        let data = input
            ? { quantite: input.value }
            : btn.dataset.form
            ? new FormData(document.querySelector(btn.dataset.form))
            : null;

        fetchCartData(btn.dataset.url, method, data);
    });

    // Mise à jour input quantité manuelle
    document.addEventListener("change", (e) => {
        const input = e.target.closest(".quantity-input");
        if (!input) return;

        fetchCartData(input.dataset.url, "POST", { quantite: input.value });
    });
});
