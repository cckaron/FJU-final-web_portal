var pie = document.getElementById('pieChart');
var myPieChart = new Chart(pie, {
    type: 'pie',
    data: {
        labels: [
            '鏡頭異常',
            '通訊控制器異常',
            '電路控制器異常'
        ],
        datasets: [{
            data: [10, 20, 30],
            backgroundColor: [
                'rgba(255, 0, 0, 0.5)',
                'rgba(0, 255, 0, 0.5)',
                'rgba(0, 0, 255, 0.5)',
            ],
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: []
        },
        title: {
            display: true,
            text: '報修故障事件統計'
        }
    }
});
