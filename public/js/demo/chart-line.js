document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('lineChart').getContext('2d');
    let lineChart;
    const dataCache = new Map();

    function loadLineChartData(tahun) {
        if (dataCache.has(tahun)) {
            renderLineChart(dataCache.get(tahun));
            return;
        }

        fetch(`/statistik/line?tahun=${tahun}`)
            .then(res => res.json())
            .then(data => {
                dataCache.set(tahun, data);
                renderLineChart(data);
            })
            .catch(err => console.error('Error loading line chart data:', err));
    }

    function renderLineChart(data) {
    if (lineChart) lineChart.destroy();

    lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ],
            datasets: [{
                label: 'Rata-rata Waktu Penyelesaian (jam)',
                data: data.rata_rata,
                borderColor: '#3498db',
                backgroundColor: 'rgba(52, 152, 219, 0.2)',
                tension: 0.3,
                fill: true,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jam'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.parsed.y} jam`;
                            }
                        }
                    }
                }
            }
        });
    }

    const selectTahun = document.getElementById('tahunStatistik');

    if (selectTahun) {
        selectTahun.addEventListener('change', function () {
            loadLineChartData(this.value);
        });

        loadLineChartData(selectTahun.value);
    }
});
