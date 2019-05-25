var bar = document.getElementById('barChart');
var barData = {
    labels: ['機車', '自小客車', '大客車', '貨車'],
    datasets: [
        {
            label: '車輛數(萬)',
            backgroundColor: [
                'rgba(255, 0, 0, 0.35)',
                'rgba(0, 255, 0, 0.35)',
                'rgba(0, 0, 255, 0.35)',
                'rgba(255, 255, 0, 0.35)',
            ],

            data: [4.3, 3.7, 2.1, 2.7]
        }
    ]
};
var myBarChart = new Chart(bar, {
    type: 'bar',
    data: barData,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        title: {
            display: true,
            text: '車種統計'
        }
    }
});
