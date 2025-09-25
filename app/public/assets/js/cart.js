window.addEventListener("DOMContentLoaded", () => {
    const cartBadge = document.getElementById("cart-count");
    const reloadedContent = document.querySelector(".ajax-reloaded-data");

    function updateCartCount(newCount) {
        if (cartBadge) {
            cartBadge.textContent = newCount;
            cartBadge.style.display = newCount > 0 ? "inline-block" : "none";
        }
        // Ajout de l’animation
        cartBadge.classList.add("animate");
        setTimeout(() => {
            cartBadge.classList.remove("animate");
        }, 300);
    }

    async function fetchCartData(url, method = "GET") {
        try {
            const res = await fetch(url, {
                method,
                headers: { "X-Requested-With": "XMLHttpRequest" },
            });
            const data = await res.json();
            // console.log("Nombre d'articles dans le panier :", data.cartCount);
            if (data.success) {
                if (typeof data.cartCount !== "undefined")
                    updateCartCount(data.cartCount);
                if (data.html && reloadedContent)
                    reloadedContent.innerHTML = data.html;
            }
        } catch (e) {
            console.error(e);
        }
    }

    // Initialisation
    fetchCartData("/cart/count", "GET");

    // Délégation sur tous les boutons add/remove
    document.addEventListener("click", (e) => {
        const btn = e.target.closest(".btn[data-url]");
        if (!btn) return;
        e.preventDefault();
        fetchCartData(btn.dataset.url, btn.dataset.method || "POST");
    });
});
