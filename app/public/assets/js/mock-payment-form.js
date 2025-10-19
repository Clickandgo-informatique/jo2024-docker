document.addEventListener("DOMContentLoaded", () => {
    const methodInputs = document.querySelectorAll(
        'input[name$="[paymentMethod]"]'
    );
    const cardInfo = document.getElementById("card-info");
    const submitButton = document.querySelector("#submit-payment");
    const form = submitButton.closest("form");

    function toggleCardFields() {
        const selected = document.querySelector(
            'input[name$="[paymentMethod]"]:checked'
        );

        // Affiche ou masque les champs carte
        if (selected && ["cb", "mastercard", "visa"].includes(selected.value)) {
            cardInfo.style.display = "block";
        } else {
            cardInfo.style.display = "none";
        }
    }

    // ✅ Intercepte la soumission du formulaire
    form.addEventListener("submit", (e) => {
        const selected = document.querySelector(
            'input[name$="[paymentMethod]"]:checked'
        );
        if (!selected) {
            e.preventDefault(); // Empêche la soumission
            alert(
                "Veuillez sélectionner un moyen de paiement avant de valider."
            );
        }
    });

    // Met à jour l'affichage des champs carte
    methodInputs.forEach((input) =>
        input.addEventListener("change", toggleCardFields)
    );
    toggleCardFields();
});
