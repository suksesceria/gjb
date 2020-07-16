@extends('layouts.master')

@section('style')
    <style>
        .dashboard {
            height: 100vh;
            overflow-y: auto;
        }
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
        .progressbar-project-items {
            max-width: 250px;
            max-height: 250px;
            margin: 0 auto;
        }
        canvas.planned-actual-project-items {
            max-width: 100%;
            height: 60% !important;
            margin: 32% auto 0px auto;
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

@php
$totalProgressPlans = [];
$totalProgresses = [];
$totalSubstepsPlan = [];
$totalSubsteps = [];
$percentages = [];
$totalJatuhTempo = [];
@endphp

@section('content')
    <div class="container dashboard">
        <div class="panel panel-default">
            @foreach($data as $index => $project)
                @php
                    $totalSubstepsPlan[$index] = $project->substeps->count();
                    $progressPlanStartDate = $project->substeps->sortBy('estimated_start_date')->first()->estimated_start_date;
                    $progressPlanEndDate = $project->substeps->sortByDesc('estimated_end_date')->first()->estimated_end_date;
                    $totalProgressPlans[$index] = $project->progress_plans->sum('weight');
                    $totalProgresses[$index] = $project->progresses->sum('progress_add');
                    $percentages[$index] = ($totalProgresses[$index]/$totalProgressPlans[$index]) * 100;

                    $totalSubsteps[$index] = 0;
                    $totalJatuhTempo[$index] = $totalSubstepsPlan[$index];
                    foreach ($project->substeps as $substep) {
                        $substepPP = $substep->progress_plans->sum('weight');
                        $substepP = $substep->progresses->sum('progress_add');
                        if ($substepP >= $substepPP) {
                            $totalSubsteps[$index]++;
                            $totalJatuhTempo[$index]--;
                        } else {
                            if (! \Carbon\Carbon::now()->greaterThan($substep->estimated_end_date)) {
                                $totalJatuhTempo[$index]--;
                            }
                        }
                    }

                    $realStartDate = $project->progresses()->orderBy('progress_date')->first();
                    if ($realStartDate) {
                        $progressStartDate = $realStartDate->progress_date;
                        if ($project->progresses->sum('progress_add') >= 100) {
                            $progressEndDate = $project->progresses()->orderByDesc('progress_date')->first()->progress_date;
                        } else {
                            $progressEndDate = null;
                        }
                        $lastProgressDate = $progressEndDate;
                        if (! $lastProgressDate) {
                            $lastProgressDate = $project->progresses()->orderByDesc('progress_date')->first();;
                        }
                        if ($lastProgressDate) {
                            $lastProgressDate = $lastProgressDate->progress_date;
                            $totalWeeksProgress = ceil($lastProgressDate->diffInDays($progressStartDate)/7);
                            if ($totalWeeksProgress == 0) {
                                $totalWeeksProgress = 1;
                            }
                            $totalMonthsProgress = ceil($totalWeeksProgress/4);
                        } else {
                            $totalWeeksProgress = 0;
                            $totalMonthsProgress = 0;
                        }

                    } else {
                        $lastProgressDate = null;
                        $progressStartDate = null;
                        $progressEndDate = null;
                        $totalWeeksProgress = 0;
                        $totalMonthsProgress = 0;
                    }
                @endphp
            <div class="panel-body">
                <div class="col-md-12 text-center">
                    <div class="project-name">
                        {{$project->project_name}}
                    </div>
                    <div class="start-date-end-date mb-3">
                        Plan:
                        {{$progressPlanStartDate->format('d/m/Y')}}
                        -
                        {{$progressPlanEndDate->format('d/m/Y')}}
                        <br />
                        Real:
                        {{$progressStartDate ? $progressStartDate->format('d/m/Y') : ''}}
                        -
                        {{$progressEndDate ? $progressEndDate->format('d/m/Y') : ''}}
                    </div>
                    <div class="row">
                        <div class="col-md-4 progress-bar-project">
                            <span style="font-weight: 500">
                                PROGRESS
                            </span>
                            <br>
{{--                            <div class="progress-project-text">--}}
{{--                                <div style="position: relative; text-align: right">--}}
{{--                                    90%--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <canvas id="progressbar-project" class="progressbar-project-items"></canvas>
                            <div style="font-size: 12px; margin-top: 1em">{{$totalProgresses[$index]}} / {{$totalProgressPlans[$index]}} in Progress ({{$percentages[$index]}}%)</div>
                        </div>
                        <div class="col-md-4 progress-status">
                            <span style="font-weight: 500">
                                RENCANA VS REALITA
                            </span>
                            <canvas id="planned-actual-project" class="planned-actual-project-items" ></canvas>
                        </div>
                        <div class="col-md-4">
                            <span style="font-weight: 500">TUGAS JATUH TEMPO</span>
                            <div class="overdue-task-text">
                                {{$totalJatuhTempo[$index]}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script>
            @foreach($data as $index => $project)
        var progress = document.getElementById("progressbar-project").getContext('2d');
        var plannedActual = document.getElementById("planned-actual-project").getContext('2d');

        var x = {
            beforeDraw: function(chart) {
                var width = chart.chart.width,
                    height = chart.chart.height,
                    ctx = chart.chart.ctx;

                ctx.restore();
                var fontSize = (height / 114).toFixed(2);
                ctx.font = fontSize + "em sans-serif";
                ctx.textBaseline = "middle";

                var text = "{{$percentages[$index]}}%",
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 1.7;

                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        };

        var myChart = new Chart(progress, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [{{$totalProgresses[$index]}}, {{$totalProgressPlans[$index] - $totalProgresses[$index]}}],
                    backgroundColor: [
                        '#3BB9FF',
                        '#DCDCDC'
                    ]
                }],
                labels: [
                    'Selesai',
                    'Dalam Pekerjaan',
                ]
            },
            plugins: [x]
        });

        var plannedActualChart = new Chart(plannedActual, {
            type: 'bar',
            data: {
                datasets:[{
                    data: [{{$totalProgressPlans[$index]}}, {{$totalProgresses[$index]}}],
                    backgroundColor: [
                        '#DCDCDC',
                        '#3BB9FF'
                    ]
                }],
                labels: [
                    'Rencana',
                    'Realita'
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
        @endforeach
    </script>
@endsection
