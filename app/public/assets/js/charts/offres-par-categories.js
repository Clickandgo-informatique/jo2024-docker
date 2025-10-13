// --- Répartition des offres par catégorie ---
fetch('/admin/stats-ventes-offres-par-categories')
    .then((res) => res.json())
    .then((json) => {
        const ctx = document
            .getElementById("salesCategoryChart")
            .getContext("2d");
        new Chart(ctx, {
            type: "pie",
            data: {
                labels: json.labels,
                datasets: [
                    {
                        data: json.data,
                        backgroundColor: json.colors,
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: "right" },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                const total = context.dataset.data.reduce(
                                    (a, b) => a + b,
                                    0
                                );
                                const val = context.raw;
                                const percent = ((val / total) * 100).toFixed(
                                    1
                                );
                                return (
                                    context.label +
                                    ": " +
                                    val +
                                    " (" +
                                    percent +
                                    "%)"
                                );
                            },
                        },
                    },
                },
            },
        });
    });
