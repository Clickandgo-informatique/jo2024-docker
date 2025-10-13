fetch("/admin/stats-ventes-offres-top-ten")
    .then((res) => res.json())
    .then((json) => {
        const canvas = document.getElementById("bestSalesChart");
        // hauteur = 50px par barre
        canvas.height = json.labels.length * 50;

        const ctx = canvas.getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: json.labels,
                datasets: [
                    {
                        label: "Quantité vendue (commandes payées)",
                        data: json.data,
                        backgroundColor: json.colors,
                        borderWidth: 1,
                        barThickness: 40, // épaisseur fixe des barres
                        maxBarThickness: 50,
                    },
                ],
            },
            options: {
                indexAxis: "y",
                responsive: false,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 50, // augmente selon la longueur des labels
                        right: 20,
                        top: 20,
                        bottom: 20,
                    },
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return context.raw + " ventes";
                            },
                        },
                    },
                },
                scales: {
                    x: { beginAtZero: true },
                    y: {
                        ticks: {
                            autoSkip: false,
                            padding: 10, // espace entre le label et la grille
                            maxRotation: 0,
                            align: "start",
                        },
                    },
                },
            },
        });
    });
