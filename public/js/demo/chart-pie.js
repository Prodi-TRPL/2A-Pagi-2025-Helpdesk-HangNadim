document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('pieChart').getContext('2d');
    let pieChart;
    const dataCache = new Map();

    function loadPieData(tahun, bulan = '') {
        const cacheKey = `${tahun}-${bulan}`;
        
        if (dataCache.has(cacheKey)) {
            renderPieChart(dataCache.get(cacheKey));
            return;
        }

        let url = `/statistik/year=${tahun}`;
        if (bulan && bulan !== '') {
            url += `&month=${bulan}`;
        }

        fetch(url)
            .then(res => res.json())
            .then(data => {
                dataCache.set(cacheKey, data);
                renderPieChart(data);
            })
            .catch(err => console.error('Error loading pie data:', err));
    }

    function renderPieChart(data) {
        if (pieChart) pieChart.destroy();

        pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: data.labels, // ['Rendah', 'Sedang', 'Tinggi']
                datasets: [{
                    data: data.values, // [45, 30, 15]
                    backgroundColor: ['#8884d8', '#82ca9d', '#ffc658', '#ff7c7c']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }

    // Event listener untuk dropdown tahun dan bulan
    const selectTahun = document.getElementById('tahun');
    const selectBulan = document.getElementById('bulan'); // Sesuai dengan ID di blade

    function updateChart() {
        const tahun = selectTahun ? selectTahun.value : '';
        const bulan = selectBulan ? selectBulan.value : '';
        
        if (tahun) {
            loadPieData(tahun, bulan);
        }
    }

    if (selectTahun) {
        selectTahun.addEventListener('change', updateChart);
    }

    if (selectBulan) {
        selectBulan.addEventListener('change', updateChart);
    }

    if (selectTahun && selectTahun.value) {
        updateChart();
    }
});