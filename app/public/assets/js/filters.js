document.addEventListener("DOMContentLoaded", () => {
    const resultsContainer =
        document.querySelector("#results") ||
        document.querySelector(".ajax-reloaded-data");
    const badge = document.getElementById("filterBadge");

    // drawer mobile
    const fab = document.getElementById("filtersFAB");
    const drawer = document.getElementById("filtersDrawer");
    const closeDrawer = document.getElementById("closeFilters");
    const overlay = document.getElementById("drawerOverlay");

    function log(...args) {
        console.log("[filters.js]", ...args);
    }

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

    function buildFilterUrl() {
        const sports = getSelectedSports();
        const categories = getSelectedCategories();
        let params = [];
        if (sports.length) params.push("sports=" + sports.join(","));
        if (categories.length)
            params.push("categories=" + categories.join(","));
        return (
            "/catalogue-offres-clients" +
            (params.length ? "?" + params.join("&") : "")
        );
    }

    async function fetchAndInject(url, push = true) {
        if (!resultsContainer) {
            log("❌ No results container, redirect to", url);
            window.location.href = url;
            return;
        }
        log("🔗 fetch", url);
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

    function updateBadge() {
        if (!badge) return;
        const count =
            getSelectedSports().length + getSelectedCategories().length;
        if (count > 0) {
            badge.textContent = count;
            badge.style.display = "inline-block";
        } else {
            badge.style.display = "none";
        }
    }

    function syncUIFromUrl() {
        const params = new URLSearchParams(window.location.search);
        const sports = params.get("sports")?.split(",") || [];
        const categories = params.get("categories")?.split(",") || [];

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
                if (cb.value === "toutes") {
                    cb.checked = categories.length === 0;
                } else {
                    cb.checked = categories.includes(cb.value);
                }
            });

        // Mutual exclusivity
        if (sports.length) {
            document
                .querySelectorAll(
                    "#categories-filter input, #categories-filter-drawer input"
                )
                .forEach((cb) => (cb.checked = false));
        }
        if (categories.length) {
            document
                .querySelectorAll(
                    "#sports-filter input, #sports-filter-drawer input"
                )
                .forEach((cb) => (cb.checked = false));
        }
    }

    // écoute des changements sur tous les filtres
    document.addEventListener("change", (e) => {
        const target = e.target;

        if (target.closest("#sports-filter, #sports-filter-drawer")) {
            document
                .querySelectorAll(
                    "#categories-filter input, #categories-filter-drawer input"
                )
                .forEach((cb) => (cb.checked = false));
        }

        if (target.closest("#categories-filter, #categories-filter-drawer")) {
            document
                .querySelectorAll(
                    "#sports-filter input, #sports-filter-drawer input"
                )
                .forEach((cb) => (cb.checked = false));
            // "Toutes" décochage automatique
            if (target.value === "toutes" && target.checked) {
                document
                    .querySelectorAll(
                        "#categories-filter input, #categories-filter-drawer input"
                    )
                    .forEach((cb) => {
                        if (cb.value !== "toutes") cb.checked = false;
                    });
            }
        }

        const url = buildFilterUrl();
        fetchAndInject(url, true);
    });

    // back/forward
    window.addEventListener("popstate", (e) => {
        syncUIFromUrl();
        const url = window.location.pathname + window.location.search;
        fetchAndInject(url, false);
    });

    // sync initial
    syncUIFromUrl();
    updateBadge();

    // drawer mobile
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

    // debug helper
    window.__filtersDebug = {
        getSelectedSports,
        getSelectedCategories,
        buildFilterUrl,
    };
});
