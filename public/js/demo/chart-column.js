document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('columnChart').getContext('2d');
    let columnChart;
    const dataCache = new Map();

    function loadColumnData(tahun, bulan = '') {
        // Membuat key untuk cache yang menggabungkan tahun dan bulan
        const cacheKey = `${tahun}-${bulan}`;
        
        if (dataCache.has(cacheKey)) {
            renderColumnChart(dataCache.get(cacheKey));
            return;
        }

        // Membuat URL dengan parameter tahun dan bulan
        let url = `/statistik/year=${tahun}`;
        if (bulan && bulan !== '') {
            url += `&month=${bulan}`;
        }

        fetch(url)
            .then(res => res.json())
            .then(data => {
                dataCache.set(cacheKey, data);
                renderColumnChart(data);
            })
            .catch(err => console.error('Error loading column data:', err));
    }

    function renderColumnChart(data) {
        if (columnChart) columnChart.destroy();

        columnChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.labels, // ['Rendah', 'Sedang', 'Tinggi']
                datasets: [{
                    label: 'Jumlah Komplain',
                    data: data.values, // [45, 30, 15]
                    backgroundColor: [
                        'rgba(136, 132, 216, 0.8)',
                        'rgba(130, 202, 157, 0.8)',
                        'rgba(255, 198, 88, 0.8)',
                        'rgba(255, 124, 124, 0.8)'
                    ],
                    borderColor: [
                        'rgba(136, 132, 216, 1)',
                        'rgba(130, 202, 157, 1)',
                        'rgba(255, 198, 88, 1)',
                        'rgba(255, 124, 124, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false // Hide legend untuk column chart
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                return context[0].label;
                            },
                            label: function(context) {
                                return `Jumlah: ${context.parsed.y}`;
                            }
                        }
                    }
                }
            }
        });
    }

    // Event listener untuk dropdown tahun dan bulan
    const selectTahun = document.getElementById('tahun'); // Sesuai dengan ID di blade
    const selectBulan = document.getElementById('bulan'); // Sesuai dengan ID di blade

    function updateChart() {
        const tahun = selectTahun ? selectTahun.value : '';
        const bulan = selectBulan ? selectBulan.value : '';
        
        if (tahun) {
            loadColumnData(tahun, bulan);
        }
    }

    if (selectTahun) {
        selectTahun.addEventListener('change', updateChart);
    }

    if (selectBulan) {
        selectBulan.addEventListener('change', updateChart);
    }

    // Load data awal
    if (selectTahun && selectTahun.value) {
        updateChart();
    }
});