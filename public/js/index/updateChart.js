function refreshPie(chart, intersection_id) {
    // chart.destroy();
    $.ajax({
        url: 'api/chart/pie/maintenance',
        type: "GET",
        data: {
            intersection_id: intersection_id,
        },
        success: function(data) {
            chart.config.data = data.data;
            chart.update();

        },
    });
}

function refreshFlow(chart) {
    chart.destroy();
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['05/21', '05/22', '05/23', '05/24', '05/25', '05/26', '05/27', '05/28', '05/29', '05/30'],
            datasets: [{
                label: '流量(/千)',
                data: [1.5, 1.7, 1.2, 1.4, 1.3, 1.2, 1.5, 1.2, 1.3, 1.6, 1.4],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
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
                }]
            },
            title: {
                display: true,
                text: '單週流量圖'
            }
        }
    });
}

function refreshDatatable(table, intersection_id) {
    //you can reload data by this!
    table.ajax.url( 'api/maintenance/get?intersection_id='+intersection_id ).load();
}
