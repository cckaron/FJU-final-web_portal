var chartColors = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(201, 203, 207)'
};

function randomScalingFactor() {
    return (Math.random() > 0.5 ? 1.0 : -1.0) * Math.round(Math.random() * 100);
}

function onRefresh(chart) {

    $.ajax({
        url: 'api/chart/realtime/flow',
        type: "GET",
        data: {
            intersection_id: 1,
        },
        success: function(data) {
            chart.config.data.datasets[0].data.push({
                x: Date.now(),
                y: data.r1_car
            });

            chart.config.data.datasets[1].data.push({
                x: Date.now(),
                y: data.r2_car
            });
        },
    });

}

var color = Chart.helpers.color;
var config = {
    type: 'line',
    data: {
        datasets: [{
            label: '中正路',
            borderColor: 'rgb(255, 99, 132)',
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            lineTension: 0,
            borderDash: [8, 4]
        }, {
            label: '建國一路',
            borderColor: 'rgb(54, 162, 235)',
            backgroundColor: 'rgba(54, 162, 235, 0.5)'
        }]
    },
    options: {
        events: ['click'],
        title: {
            display: true,
            text: '即時車流量監控'
        },
        scales: {
            xAxes: [{
                type: 'realtime',
                realtime: {
                    duration: 20000,
                    refresh: 1000,
                    delay: 2000,
                    onRefresh: onRefresh
                }
            }],
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'value'
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 15
                }
            }]
        },
        tooltips: {
            mode: 'nearest',
            intersect: false
        },
        hover: {
            mode: 'nearest',
            intersect: false
        }
    }
};

window.onload = function() {
    var ctx = document.getElementById('realTimeChart').getContext('2d');
    window.myChart = new Chart(ctx, config);
};

document.getElementById('randomizeData').addEventListener('click', function() {
    config.data.datasets.forEach(function(dataset) {
        dataset.data.forEach(function(dataObj) {
            dataObj.y = randomScalingFactor();
        });
    });
    window.myChart.update();
});

var colorNames = Object.keys(chartColors);
document.getElementById('addDataset').addEventListener('click', function() {
    var colorName = colorNames[config.data.datasets.length % colorNames.length];
    var newColor = chartColors[colorName];
    var newDataset = {
        label: 'Dataset ' + (config.data.datasets.length + 1),
        backgroundColor: color(newColor).alpha(0.5).rgbString(),
        borderColor: newColor,
        fill: false,
        lineTension: 0,
        data: []
    };

    config.data.datasets.push(newDataset);
    window.myChart.update();
});

document.getElementById('removeDataset').addEventListener('click', function() {
    config.data.datasets.pop();
    window.myChart.update();
});

document.getElementById('addData').addEventListener('click', function() {
    onRefresh(window.myChart);
    window.myChart.update();
});
