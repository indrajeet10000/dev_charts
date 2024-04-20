<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Chart Layout</title>
    <style>
		.chart-row {
			display: flex;
			justify-content: space-between;
			flex-wrap: nowrap;
			overflow-x: hidden;
		}

		.chart-container {
			width: calc(20% - 20px); /* Adjust width according to number of charts */
			position: relative;
			margin: 10px;
			background-color: #f0f0f0;
			opacity: 0.9;
		}

		canvas {
			width: 100% !important;
			height: 100% !important;
		}
		

		.circle {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 150px; /* Adjust circle size as needed */
			height: 150px; /* Adjust circle size as needed */
			border-radius: 50%;
			background-color: white;
			border: 2px solid black;
			display: flex;
			justify-content: center;
			align-items: center;
			cursor: pointer;
		}

		.percentage {
			font-size: 24px; /* Adjust font size as needed */
		}

		.hide {
			display: none;
		}

	</style>
</head>
<body>
    <div class="chart-row">
        <div class="chart-container">
            <canvas id="stacked-area-chart"></canvas>
        </div>
        <div class="chart-container">
           <canvas id="pie-chart"></canvas>
			<div class="circle">
				<div class="percentage">76%</div>
			</div>
			<div class="dots">
				<span class="dot" onclick="showChart(1)"></span>
				<span class="dot" onclick="showChart(2)"></span>
				<span class="dot" onclick="showChart(3)"></span>
			</div>
        </div>
        <div class="chart-container">
            <canvas id="line-chart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="dual-axis-chart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="stacked-area-chart1"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script> 
		/*document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('stacked-area-chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["15 April", "16 April", "17 April", "18 April", "19 April", "20 April", "21 April"],
            datasets: [{
                label: 'Dataset 1',
                data: [100, 150, 200, 250, 300, 350, 400],
                backgroundColor: 'rgba(0, 0, 255, 0.2)', // Blue background for point 1
                borderColor: 'blue',
                borderWidth: 2,
                pointRadius: 0, // No point radius for a smooth curve
                fill: 'origin', // Fill from origin to data point
            }, {
                label: 'Dataset 2',
                data: [200, 250, 300, 350, 400, 450, 500],
                backgroundColor: 'rgba(255, 165, 0, 0.2)', // Orange background for point 2
                borderColor: 'orange',
                borderWidth: 2,
                pointRadius: 0,
                fill: 'start', // Fill from data point to top
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    min: 0,
                    max: 500,
                    ticks: {
                        stepSize: 250
                    }
                }
            }
        }
    });
});*/
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('stacked-area-chart').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['15 April', '16 April', '17 April', '18 April', '19 April', '20 April', '21 April'],
            datasets: [{
                label: 'Dataset 1',
                data: [250, 150, 200, 300, 400, 350, 500],
                backgroundColor: 'blue',
                borderColor: 'blue',
                fill: 'origin',
                tension: 0.4,
                order: 1
            }, {
                label: 'Dataset 2',
                data: [500, 400, 450, 550, 650, 600, 700],
                backgroundColor: 'rgba(255, 165, 0, 0.5)', // Orange with 50% opacity
                borderColor: 'rgba(255, 165, 0, 0.5)',
                fill: '-1',
                tension: 0.4,
                order: 2
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 500
                }
            }
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('pie-chart').getContext('2d');

    // Dummy data for the pie chart
    var data = {
        labels: ['Red', 'Blue', 'Yellow', 'Green'],
        datasets: [{
            data: [20, 30, 25, 25],
            backgroundColor: ['red', 'blue', 'yellow', 'green']
        }]
    };

    // Chart.js configuration
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Click event to toggle the circle's display
    document.querySelector('.circle').addEventListener('click', function() {
        document.querySelector('.percentage').classList.toggle('hide');
    });
});


document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('line-chart').getContext('2d');

    // Dummy data for the line chart
    var labels = ["M", "T", "W", "T", "F", "S", "S"];
    var data = [0, 250, 300, 350, 400, 450, 500, 550];

    // Chart.js configuration
    var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Dataset',
                data: data,
                borderColor: 'orange',
                backgroundColor: 'rgba(255, 165, 0, 0.2)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: 'black',
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                y: {
                    grid: {
                        color: 'grey'
                    },
                    ticks: {
                        color: 'black',
                        font: {
                            weight: 'bold'
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: false
                }
            }
        }
    });
});




document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('dual-axis-chart').getContext('2d');

    // Dummy data for the line chart
    var labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun"];
    var data1 = [200, 250, 300, 350, 400, 450];
    var data2 = [100, 150, 200, 250, 300, 350];

    // Chart.js configuration
    var dualAxisChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Dataset 1',
                data: data1,
                borderColor: 'blue',
                backgroundColor: 'blue',
                yAxisID: 'y-axis-1',
                type: 'line'
            }, {
                label: 'Dataset 2',
                data: data2,
                backgroundColor: 'rgba(0, 0, 0, 0.1)',
                yAxisID: 'y-axis-2'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    min: 0,
                    max: 500,
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: 'black',
                        font: {
                            weight: 'bold'
                        }
                    },
                    title: {
                        display: true,
                        text: 'Dataset 1',
                        color: 'blue',
                        font: {
                            weight: 'bold'
                        }
                    },
                    id: 'y-axis-1'
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    min: 0,
                    max: 500,
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: 'black',
                        font: {
                            weight: 'bold'
                        }
                    },
                    title: {
                        display: true,
                        text: 'Dataset 2',
                        color: 'black',
                        font: {
                            weight: 'bold'
                        }
                    },
                    id: 'y-axis-2'
                }
            }
        }
    });

    // Add dot point at 489 with text
    dualAxisChart.data.datasets[0].data.push(489);
    dualAxisChart.data.labels.push('Jul');
    dualAxisChart.update();
});



document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('stacked-area-chart1').getContext('2d');

    // Dummy data for the stacked area chart
    var labels = ["M", "T", "W", "T", "F", "S", "S"];
    var data1 = [200, 250, 300, 350, 400, 450, 500];
    var data2 = [150, 200, 250, 300, 350, 400, 450];

    // Chart.js configuration
    var stackedAreaChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Dataset 1',
                data: data1,
                backgroundColor: 'rgba(173, 216, 230, 0.2)',
                borderColor: 'lightblue',
                tension: 0.3
            }, {
                label: 'Dataset 2',
                data: data2,
                backgroundColor: 'rgba(144, 238, 144, 0.2)',
                borderColor: 'lightgreen',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    ticks: {
                        color: 'black'
                    }
                },
                y: {
                    ticks: {
                        color: 'black'
                    }
                }
            }
        }
    });
});



	</script>
</body>
</html>


<!--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
    <title>Dev Charts Ex</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 80%; margin: auto;">
        <canvas id="areaChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('areaChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Data',
                    data: @json($data['data']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>-->