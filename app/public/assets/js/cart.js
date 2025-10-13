window.addEventListener("DOMContentLoaded", () => {
    const cartBadge = document.getElementById("cart-count");
    const reloadedContent = document.querySelector("#cart-container");

    // 🔹 Mise à jour du badge
    function updateCartCount(newCount) {
        if (!cartBadge) return;
        cartBadge.textContent = newCount;
        cartBadge.style.display = newCount > 0 ? "inline-block" : "none";
        cartBadge.classList.add("animate");
        setTimeout(() => cartBadge.classList.remove("animate"), 300);
    }

    // 🔹 Fonction AJAX pour manipuler le panier
    async function fetchCartData(url, method = "POST", data = null) {
        try {
            const options = {
                method,
                headers: { "X-Requested-With": "XMLHttpRequest" },
                credentials: "same-origin", // 👈 Très important pour garder la session
            };
            if (data) {
                options.body =
                    data instanceof FormData ? data : new URLSearchParams(data);
            }

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

    // 🔹 Ajout au panier
    document.addEventListener("click", (e) => {
        const btn = e.target.closest(".add-to-cart");
        if (!btn) return;
        e.preventDefault();

        fetchCartData(btn.dataset.url, btn.dataset.method || "POST")
            .then(() => {
                // Redirige vers la page panier après ajout
                window.location.href = "/panier";
            })
            .catch((err) => console.error("Erreur ajout au panier :", err));
    });

    // 🔹 Modification quantité / suppression / clear
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
        let data = null;
        if (input) data = { quantite: input.value };
        else if (btn.dataset.form)
            data = new FormData(document.querySelector(btn.dataset.form));

        fetchCartData(btn.dataset.url, method, data);
    });

    // 🔹 Modification manuelle de la quantité
    document.addEventListener("change", (e) => {
        const input = e.target.closest(".quantity-input");
        if (!input) return;

        fetchCartData(input.dataset.url, "POST", { quantite: input.value });
    });

    // 🔹 Initialisation badge au chargement
    fetchCartData("/panier/count", "GET");

    // 🔹 Validation du panier (optionnel en AJAX)
    const validateForm = document.querySelector("form[action$='/panier/valider']");
    if (validateForm) {
        validateForm.addEventListener("submit", (e) => {
            // Si  AJAX au lieu de POST normal, décommenter :
            /*
            e.preventDefault();
            const url = validateForm.action;
            fetchCartData(url, "POST").then(() => {
                // Redirection vers paiement mock
                window.location.href = "/panier";
            });
            */
        });
    }
});
