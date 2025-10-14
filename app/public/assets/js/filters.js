document.addEventListener("DOMContentLoaded", () => {
    const resultsContainer =
        document.querySelector("#results") ||
        document.querySelector(".ajax-reloaded-data");
    const badge = document.getElementById("filterBadge");

    // Drawer mobile
    const fab = document.getElementById("filtersFAB");
    const drawer = document.getElementById("filtersDrawer");
    const closeDrawer = document.getElementById("closeFilters");
    const overlay = document.getElementById("drawerOverlay");

    // --- Fonctions utilitaires pour récupérer l'état des filtres ---
    function getSelectedSports() {
        return Array.from(
            document.querySelectorAll(
                '#sports-filter input[type="checkbox"], #sports-filter-drawer input[type="checkbox"]'
            )
        )
            .filter((cb) => cb.checked)
            .map((cb) => cb.value);
    }

    function getSelectedCategories() {
        return Array.from(
            document.querySelectorAll(
                '#categories-filter input[type="checkbox"], #categories-filter-drawer input[type="checkbox"]'
            )
        )
            .filter((cb) => cb.checked && cb.value !== "toutes")
            .map((cb) => cb.value);
    }

    function isFavorisSelected() {
        const fav = document.querySelector(
            '#favoris-filter input[type="checkbox"], #favoris-filter-drawer input[type="checkbox"]'
        );
        return fav ? fav.checked : false;
    }

    // --- Construction de l'URL AJAX ---
    function buildFilterUrl() {
        const sports = getSelectedSports();
        const categories = getSelectedCategories();
        const favoris = isFavorisSelected();
        let params = [];
        if (sports.length) params.push("sports=" + sports.join(","));
        if (categories.length)
            params.push("categories=" + categories.join(","));
        if (favoris) params.push("favoris=1");
        return (
            "/catalogue-offres-clients" +
            (params.length ? "?" + params.join("&") : "")
        );
    }

    // --- Chargement AJAX ---
    async function fetchAndInject(url, push = true) {
        if (!resultsContainer) return (window.location.href = url);
        try {
            const resp = await fetch(url, {
                headers: { "X-Requested-With": "XMLHttpRequest" },
            });
            if (!resp.ok) throw new Error("HTTP " + resp.status);
            const text = await resp.text();
            resultsContainer.innerHTML = text;
            if (push) history.pushState({ url }, "", url);
            updateBadge();
        } catch (err) {
            console.error("fetchAndInject error:", err);
            window.location.href = url;
        }
    }

    // --- Mise à jour du badge ---
    function updateBadge() {
        if (!badge) return;
        const count =
            getSelectedSports().length +
            getSelectedCategories().length +
            (isFavorisSelected() ? 1 : 0);
        if (count > 0) {
            badge.textContent = count;
            badge.style.display = "inline-block";
        } else {
            badge.style.display = "none";
        }
    }

    // --- Synchronisation URL -> UI ---
    function syncUIFromUrl() {
        const params = new URLSearchParams(window.location.search);
        const sports = params.get("sports")?.split(",") || [];
        const categories = params.get("categories")?.split(",") || [];
        const favoris = params.get("favoris") === "1";

        document
            .querySelectorAll(
                "#sports-filter input, #sports-filter-drawer input"
            )
            .forEach((cb) => {
                cb.checked = sports.includes(cb.value);
            });

        document
            .querySelectorAll(
                "#categories-filter input, #categories-filter-drawer input"
            )
            .forEach((cb) => {
                if (cb.value === "toutes") cb.checked = categories.length === 0;
                else cb.checked = categories.includes(cb.value);
            });

        const favCb = document.querySelector(
            '#favoris-filter input[type="checkbox"], #favoris-filter-drawer input[type="checkbox"]'
        );
        if (favCb) favCb.checked = favoris;
    }

    // --- Event delegation pour tous les filtres ---
    document.addEventListener("change", (e) => {
        const target = e.target;

        // Sports
        if (target.closest("#sports-filter, #sports-filter-drawer")) {
            // Décocher catégories et favoris
            document
                .querySelectorAll(
                    "#categories-filter input, #categories-filter-drawer input, #favoris-filter input, #favoris-filter-drawer input"
                )
                .forEach((cb) => (cb.checked = false));
            fetchAndInject(buildFilterUrl(), true);
        }

        // Catégories
        if (target.closest("#categories-filter, #categories-filter-drawer")) {
            // Décocher sports et favoris
            document
                .querySelectorAll(
                    "#sports-filter input, #sports-filter-drawer input, #favoris-filter input, #favoris-filter-drawer input"
                )
                .forEach((cb) => (cb.checked = false));

            // Si "Toutes" est coché, décocher les autres catégories
            if (target.value === "toutes" && target.checked) {
                document
                    .querySelectorAll(
                        "#categories-filter input, #categories-filter-drawer input"
                    )
                    .forEach((cb) => {
                        if (cb.value !== "toutes") cb.checked = false;
                    });
            }

            fetchAndInject(buildFilterUrl(), true);
        }

        // Favoris
        if (
            target.matches(
                '#favoris-filter input[type="checkbox"], #favoris-filter-drawer input[type="checkbox"]'
            )
        ) {
            // Décocher sports et catégories
            document
                .querySelectorAll(
                    "#sports-filter input, #sports-filter-drawer input, #categories-filter input, #categories-filter-drawer input"
                )
                .forEach((cb) => (cb.checked = false));

            fetchAndInject(buildFilterUrl(), true);
        }
    });

    // --- Toggle favoris sur les offres ---
    if (resultsContainer) {
        resultsContainer.addEventListener("click", function (e) {
            const btn = e.target.closest(".btn-favori");
            if (!btn) return;
            const offreId = btn.dataset.id;
            fetch(`/offres/${offreId}/favoris-offres`, { method: "POST" })
                .then((r) => r.json())
                .then((data) => {
                    btn.innerHTML = data.favori
                        ? "Retirer des favoris"
                        : "Ajouter aux favoris";
                    btn.dataset.favori = data.favori ? "1" : "0";
                })
                .catch((err) => console.error("Erreur toggle favoris :", err));
        });
    }

    // --- Gestion du bouton retour / avancé navigateur ---
    window.addEventListener("popstate", () => {
        syncUIFromUrl();
        fetchAndInject(
            window.location.pathname + window.location.search,
            false
        );
    });

    // --- Drawer mobile ---
    function openDrawer() {
        drawer.classList.add("open");
        if (overlay) overlay.style.display = "block";
    }
    function closeDrawerFn() {
        drawer.classList.remove("open");
        if (overlay) overlay.style.display = "none";
    }
    if (fab && drawer) fab.addEventListener("click", openDrawer);
    if (closeDrawer && drawer)
        closeDrawer.addEventListener("click", closeDrawerFn);
    if (overlay && drawer) overlay.addEventListener("click", closeDrawerFn);

    // --- Initialisation ---
    syncUIFromUrl();
    updateBadge();

    // --- Debug helper ---
    window.__filtersDebug = {
        getSelectedSports,
        getSelectedCategories,
        isFavorisSelected,
        buildFilterUrl,
    };
});
