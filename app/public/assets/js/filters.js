console.log("✅ filters.js chargé !");

// public/js/filters.js
document.addEventListener("DOMContentLoaded", () => {
    const resultsContainer =
        document.querySelector("#results") ||
        document.querySelector(".ajax-reloaded-data");
    const sportsFilter = document.querySelector("#sports-filter");
    const badge = document.getElementById("filterBadge");

    function log(...args) {
        console.log("[filters.js]", ...args);
    }

    function getSelectedSlugs() {
        const boxes = document.querySelectorAll(
            '#sports-filter input[type="checkbox"], #filtersDrawer #sports-filter input[type="checkbox"]'
        );
        return Array.from(boxes)
            .filter((cb) => cb.checked)
            .map((cb) => cb.value);
    }

    function buildSportsUrl(selectedSlugs) {
        const base = sportsFilter?.dataset.baseUrl || "/offres/sports";
        const normalized = base.replace(/\/$/, ""); // supprime un slash final
        return (
            normalized +
            (selectedSlugs.length
                ? "/" + encodeURIComponent(selectedSlugs.join(","))
                : "")
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

            // 👉 mettre à jour l'URL AVANT de toucher à l'UI
            if (push) history.pushState({ url }, "", url);

            // pas besoin de resyncUI ici : les cases reflètent déjà l’action de l’utilisateur
            updateBadge();
        } catch (err) {
            console.error("fetchAndInject error:", err);
            window.location.href = url; // fallback navigation
        }
    }

    function updateBadge() {
        if (!badge) return;
        const count = getSelectedSlugs().length;
        if (count > 0) {
            badge.textContent = count;
            badge.style.display = "inline-block";
        } else {
            badge.style.display = "none";
        }
    }

    function syncUIFromUrl(pathname) {
        const match = pathname.match(/\/offres\/sports\/([^\/]+)/);
        const boxes = document.querySelectorAll(
            '#sports-filter input[type="checkbox"], #filtersDrawer #sports-filter input[type="checkbox"]'
        );

        if (match) {
            const slugs = decodeURIComponent(match[1]).split(",");
            boxes.forEach((cb) => {
                cb.checked = slugs.includes(cb.value);
            });
        } else {
            boxes.forEach((cb) => (cb.checked = false));
        }
    }

    // écoute les changements sur les cases
    document.addEventListener("change", (e) => {
        const target = e.target;
        if (
            !target.matches(
                '#sports-filter input[type="checkbox"], #filtersDrawer #sports-filter input[type="checkbox"]'
            )
        ) {
            return;
        }
        const selected = getSelectedSlugs();
        const url = buildSportsUrl(selected);
        fetchAndInject(url, true);
    });

    // back/forward
    window.addEventListener("popstate", (e) => {
        const url = e.state?.url || window.location.pathname;
        fetchAndInject(url, false);
        syncUIFromUrl(window.location.pathname);
    });

    // sync initial
    syncUIFromUrl(window.location.pathname);
    updateBadge();

    // debug helper
    window.__filtersDebug = { getSelectedSlugs, buildSportsUrl };

    // Gestion du FAB et du drawer mobile
    const fab = document.getElementById("filtersFAB");
    const drawer = document.getElementById("filtersDrawer");
    const closeDrawer = document.getElementById("closeFilters");

    if (fab && drawer) {
        fab.addEventListener("click", () => {
            console.log("filtersFAB clicqué");
            drawer.classList.add("open");
        });
    }
    if (closeDrawer && drawer) {
        closeDrawer.addEventListener("click", () => {
            drawer.classList.remove("open");
        });
    }
});
