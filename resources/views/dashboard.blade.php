@extends('layouts.master')

@section('style')
    <style>
        .project-name {
            font-weight: 500;
        }
        .start-date-end-date {
            font-size: 14px;
        }
        .progress-status {
            border-right: 1px solid #ddd;
            border-left: 1px solid #ddd;
        }
        .progress-bar-project {
            position: relative;
        }
        canvas {
            position: relative;
        }
        .progress-project-text {
            position: absolute;
            left: 7.8em;
            bottom: 6em;
            font-size: 20px;
            font-weight: bold;
        }
        #progressbar-project {
            max-width: 220px;
            max-height: 220px;
            margin: 0 auto;
        }
        canvas#planned-actual-project {
            max-width: 100%;
            height: 60% !important;
            margin: 24% auto 0px auto;
        }
        .overdue-task-text {
            height: 100%;
            font-size: 50px;
            font-weight: bold;
            line-height: 100%;
            margin: 35% auto;
            color: #3BB9FF;
        }
        @media only screen and (max-width: 767px) {
            .progress-status {
                border-right: 0px;
                border-left: 0px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-12 text-center">
                    <div class="project-name">
                        LALA LAND
                    </div>
                    <div class="start-date-end-date mb-3">
                        12/02/2020 - 28/02/2020
                    </div>
                    <div class="row">
                        <div class="col-md-4 progress-bar-project">
                            <span style="font-weight: 500">
                                PROGRESS
                            </span>
                            <br>
                            {{-- <div class="progress-project-text">
                                <div style="position: relative; text-align: right">
                                    90%
                                </div>
                            </div> --}}
                            <canvas id="progressbar-project"></canvas>
                            <div style="font-size: 12px; margin-top: 1em">2 / 13 in Progress (90%)</div>
                        </div>
                        <div class="col-md-4 progress-status">
                            <span style="font-weight: 500">
                                PLANNED VS ACTUAL
                            </span>
                            <canvas id="planned-actual-project" ></canvas>
                        </div>
                        <div class="col-md-4">
                            <span style="font-weight: 500">OVERDUE TASK</span>
                            <div class="overdue-task-text">
                                4
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script>
        var progress = document.getElementById("progressbar-project").getContext('2d');
        var plannedActual = document.getElementById("planned-actual-project").getContext('2d');

		var myChart = new Chart(progress, {
			type: 'doughnut',
			data: {
                datasets: [{
                    data: [10, 20],
                    backgroundColor: [
                        '#3BB9FF',
                        '#DCDCDC'
                    ]
                }],
                labels: [
                    'Done',
                    'In Progress',
                ]
            }
        });
        
        var plannedActualChart = new Chart(plannedActual, {
            type: 'bar',
            data: {
                datasets:[{
                    data: [100, 40],
                    backgroundColor: [
                        '#DCDCDC',
                        '#3BB9FF'
                    ]
                }],
                labels: [
                    'Planned',
                    'Actual'
                ]
            },
            options: {
                tooltips: {
                    enabled: false
                },
                hover: {
                    animationDuration: 0
                },
                animation: {
                    duration: 1,
                    onComplete: function () {
                        var chartInstance = this.chart,
                        ctx = chartInstance.ctx;

                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function (bar, index) {
                                var data = dataset.data[index];                            
                                ctx.fillText(data, bar._model.x, bar._model.y - 5);
                            });
                        });
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    yAxes: [{
                        display: false,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            display: false,
                            beginAtZero: true
                        }
                    }]
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 20,
                        bottom: 0
                    }
                }
            }
        });

	</script>
@endsection