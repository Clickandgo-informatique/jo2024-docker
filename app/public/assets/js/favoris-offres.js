document.querySelectorAll(".favorite-icon").forEach((icon) => {
    icon.addEventListener("click", async () => {
        const offreId = icon.dataset.offreId;

        const response = await fetch(`/offres/${offreId}/favoris-offres`, {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "Content-Type": "application/json",
            },
            body: JSON.stringify({}),
        });

        const data = await response.json();

        if (data.success) {
            if (data.favori) {
                icon.classList.add("fa-solid");
                icon.classList.remove("fa-regular");
            } else {
                icon.classList.add("fa-regular");
                icon.classList.remove("fa-solid");
            }
        } else {
            alert(data.message || "Erreur inconnue");
        }
    });
});
