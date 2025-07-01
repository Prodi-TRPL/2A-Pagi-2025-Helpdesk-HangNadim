document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('pieChart').getContext('2d');
    let pieChart;
    const dataCache = new Map();

    function loadPieData(tanggal) {
        if (!tanggal) return;

        if (dataCache.has(tanggal)) {
            renderPieChart(dataCache.get(tanggal));
            return;
        }

        const [tahun, bulan] = tanggal.split('-');
        const url = `/statistik/pie?tahun=${tahun}&bulan=${bulan}`;

        fetch(url)
            .then(res => res.json())
            .then(data => {
                dataCache.set(tanggal, data);
                renderPieChart(data);
            })
            .catch(err => console.error('Error loading pie data:', err));
    }

    function renderPieChart(data) {
        if (pieChart) pieChart.destroy();

        pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: data.labels,
                datasets: [{
                    data: data.values,
                    backgroundColor: ['#ffeaa7', '#fab1a0', '#e84393']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 20,
                            padding: 15
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                return `${label}: ${value}`;
                            }
                        }
                    }
                }
            }
        });
    }

    const inputTanggal = document.getElementById('tanggal');

    if (inputTanggal) {
        inputTanggal.addEventListener('change', function () {
            loadPieData(this.value);
        });

        if (inputTanggal.value) {
            loadPieData(inputTanggal.value);
        }
    }
});
