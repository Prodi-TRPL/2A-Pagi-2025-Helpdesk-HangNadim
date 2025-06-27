document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('columnChart').getContext('2d');
    let columnChart;
    const dataCache = new Map();

    function loadColumnData(tanggalbar) {
        if (!tanggalbar) return;

        if (dataCache.has(tanggalbar)) {
            renderColumnChart(dataCache.get(tanggalbar));
            return;
        }

        const [tahun, bulan] = tanggalbar.split('-');
        const url = `/statistik/column?tahun=${tahun}&bulan=${bulan}`;
        
        fetch(url)
            .then(res => res.json())
            .then(data => {
                dataCache.set(tanggalbar, data);
                renderColumnChart(data);
            })
            .catch(err => console.error('Error loading column data:', err));
    }

    function renderColumnChart(data) {
        if (columnChart) columnChart.destroy();

        columnChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Jumlah Komplain',
                    data: data.values,
                    backgroundColor: [
                        'rgba(136, 132, 216, 0.8)',
                        'rgba(130, 202, 157, 0.8)',
                        'rgba(255, 198, 88, 0.8)',
                        'rgba(255, 124, 100, 0.8)',
                        'rgba(154, 100, 124, 0.8)',
                        'rgba(200, 154, 124, 0.8)',
                        'rgba(245, 122, 100, 0.8)',
                        'rgba(202, 188, 115, 0.8)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true, // aktifkan legend agar keterangan warna muncul
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw;
                                return `${label}: ${value}`;
                            }
                        }
                    }
                }
            }
        });
    }

    const inputTanggal = document.getElementById('tanggalbar');

    if (inputTanggal) {
        inputTanggal.addEventListener('change', function () {
            loadColumnData(this.value);
        });

        if (inputTanggal.value) {
            loadColumnData(inputTanggal.value);
        }
    }
});
