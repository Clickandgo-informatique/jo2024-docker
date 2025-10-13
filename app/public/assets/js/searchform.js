console.log("searchform.js lancé");

const searchInput = document.querySelector(".search-input");
const url = searchInput.dataset.url;
const reloadedContent = document.querySelector(".ajax-reloaded-content");

// Fonction debounce : attend `delay` ms après la dernière frappe
function debounce(func, delay = 300) {
    let timeout;
    return (...args) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
    };
}

// Fonction de recherche
const searchData = async (formData) => {
    const response = await fetch(url, {
        headers: { "X-Requested-With": "XMLHttpRequest" },
        method: "POST",
        body: formData,
    });

    const data = await response.json();
    reloadedContent.innerHTML = data.html;
};

// Gestion de l'input avec debounce
const handleSearch = () => {
    const formData = new FormData();

    // Si le champ a 2 caractères ou plus, on envoie la valeur
    if (searchInput.value.length >= 2) {
        formData.append("searchString", searchInput.value);
    }

    // Sinon, on envoie un FormData vide → tous les utilisateurs
    searchData(formData);
};

// On applique le debounce à la fonction de recherche
searchInput.addEventListener("keyup", debounce(handleSearch, 300));
