document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('barChart').getContext('2d');
    let barChart;
    const dataCache = new Map();

    function loadChartData(tahun) {
        if (dataCache.has(tahun)) {
            renderChart(dataCache.get(tahun));
            return;
        }

        fetch(`/statistik?year=${tahun}`)
            .then(res => res.json())
            .then(data => {
                dataCache.set(tahun, data);
                renderChart(data);
            })
            .catch(err => console.error('Error loading chart data:', err));
    }

    function renderChart(data) {
        if (barChart) barChart.destroy();

        barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [
                    {
                        label: 'Menunggu',
                        data: data.Menunggu,
                        backgroundColor: '#f7b073'
                    },
                    {
                        label: 'Diproses',
                        data: data.Diproses,
                        backgroundColor: '#7ed7eb'
                    },
                    {
                        label: 'Selesai',
                        data: data.Selesai,
                        backgroundColor: '#aed886'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    const selectTahun = document.getElementById('tahun');
    if (selectTahun) {
        selectTahun.addEventListener('change', function () {
            loadChartData(this.value);
        });

        loadChartData(selectTahun.value);
    }
});