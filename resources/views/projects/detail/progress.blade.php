@php
$emptyWeek = '';
$totalBobot = 0;
$progressPlanSum = array_fill(0, $totalWeeks, 0);

$emptyWeekProgress = '';
$totalBobotProgress = 0;
$progressSum = array_fill(0, $totalWeeks, 0);
@endphp
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                PROGRESS PLAN
            </div>
            <div class="col-md-6 detail-progress">
                <div class="row">
                    <div class="col-md-4 mt-2">
                        Start Date: {{ $progressPlanStartDate->format('d/m/Y') }}
                    </div>
                    <div class="col-md-4 mt-2">
                        Send Date: {{ $progressPlanEndDate->format('d/m/Y') }}
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#modal-edit-project"
                        >Edit Projek</button>
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow-y: auto; margin-top:20px;">
            <table class="table" style="width: 100%; font-size: 12px">
                <thead>
                <tr>
                    <th rowspan="3" class="text-center" width="1%">No</th>
                    <th rowspan="3" class="text-center" width="20%">Uraian Pekerjaan</th>
                    <th rowspan="3" class="text-center" width="10%">Tanggal</th>
                    <th rowspan="3" class="text-center" width="5%">Bobot (%)</th>
                    <th colspan="{{ $totalWeeks }}" class="text-center" width="64%">Waktu Pelaksanaan</th>
                </tr>
                <tr>
                    @for($month = 1; $month <= $totalMonths; $month++)
                        <th colspan="4" class="text-center">Bulan ke-{{$month}}</th>
                    @endfor
                </tr>
                <tr>
                    @for($week = 1; $week <= $totalWeeks; $week++)
                        <th class="text-center">{{$week}}</th>
                        @php
                            $emptyWeek .= "<td></td>";
                        @endphp
                    @endfor
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($project->steps as $step)
                    <tr class="text-center font-weight-bold">
                        <td>{{NumConvert::roman($no++)}}</td>
                        <td>{{$step->project_step_name}}</td>
                        <td></td>
                        <td></td>
                        @php echo $emptyWeek; @endphp
                    </tr>
                    @php $noSub = 1; @endphp
                    @foreach($step->substeps as $substep)
                        @php
                        $bobot = 0;
                        $cols = "";
                        $start = floor($progressPlanStartDate->diffInDays($substep->estimated_start_date)/7);
                        $end = floor($progressPlanEndDate->diffInDays($substep->estimated_end_date)/7);
                        $startLoop = $start;
                        $length = $substep->progress_plans->count();
                        if (($size = $start + $end + $length) < $totalWeeks) {
                            $end += $totalWeeks - $size;
                        }
                        $padLeft = 0;
                        $padRight = 0;
                        foreach ($substep->progress_plans as $progress_plan) {
                            $progressPlanSum[$startLoop++] += $progress_plan->weight;
                            $bobot += $progress_plan->weight;
                            if ($progress_plan->weight) {
                                $col = '<td style="background-color: red;color:white" class="text-center">'. $progress_plan->weight .'</td>';
                                $cols .= $col;
                                $padLeft += strlen($col);
                            } else {
                                $cols .= '<td></td>';
                                $padLeft += 9;
                            }
                        }
                        $padLeft += $start * 9;
                        $padRight = $padLeft + ($end * 9);
                        $cols = str_pad($cols, $padLeft, '<td></td>', STR_PAD_LEFT);
                        $cols = str_pad($cols, $padRight, '<td></td>', STR_PAD_RIGHT);
                        $totalBobot += $bobot;
                        @endphp
                        <tr class="text-center">
                            <td>{{$noSub++}}</td>
                            <td>{{$substep->project_substep_name}}</td>
                            <td>{{$substep->estimated_start_date->format('d/m/y').' - '.$substep->estimated_end_date->format('d/m/y')}}</td>
                            <td>{{$bobot}}</td>
                            @php echo $cols; @endphp
                        </tr>
                    @endforeach
                @endforeach

                <tr id="total" class="text-center font-weight-bold">
                    <td colspan="2" align="right">Jumlah</td>
                    <td>{{ $totalBobot }}</td>
                    <td>100</td>
                    <td colspan="48"></td>
                </tr>
                <tr class="text-center font-weight-bold">
                    <td colspan="3">Rencana Progress Mingguan (%)</td>
                    <td>-</td>
                    @foreach($progressPlanSum as $sum)
                        <td>{{$sum}}</td>
                    @endforeach
                </tr>
                <tr class="text-center font-weight-bold">
                    <td colspan="3">Kumulatif Rencana Progress Mingguan (%)</td>
                    <td>-</td>
                    @php $kumulatif = 0; @endphp
                    @for($i = 0; $i < $totalWeeks; $i++)
                        @if ($i == 0)
                            <td>{{$kumulatif = $progressPlanSum[$i]}}</td>
                        @else
                            <td>{{$kumulatif += $progressPlanSum[$i]}}</td>
                        @endif
                    @endfor
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                PROGRESS REAL
            </div>
            <div class="col-md-6 detail-progress">
                <div class="row">
                    <div class="col-md-4 mt-2">
                        Start Date: {{$progressStartDate ? $progressStartDate->format('d/m/Y') : '-'}}
                    </div>
                    <div class="col-md-4 mt-2">
                        End Date: {{$progressEndDate ? $progressEndDate->format('d/m/Y') : '-'}}
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow-y: auto; margin-top:20px;">
            <table class="table" style="width: 100%; font-size: 12px">
                <thead>
                <tr>
                    <th rowspan="3" class="text-center" width="1%">No</th>
                    <th rowspan="3" class="text-center" width="20%">Uraian Pekerjaan</th>
                    <th rowspan="3" class="text-center" width="10%">Tanggal</th>
                    <th rowspan="3" class="text-center" width="5%">Bobot (%)</th>
                    <th colspan="{{ $totalWeeks }}" class="text-center" width="64%">Waktu Pelaksanaan</th>
                </tr>
                <tr>
                    @for($month = 1; $month <= $totalMonths; $month++)
                        <th colspan="4" class="text-center">Bulan ke-{{$month}}</th>
                    @endfor
                </tr>
                <tr>
                    @for($week = 1; $week <= $totalWeeks; $week++)
                        <th class="text-center">{{$week}}</th>
                        @php
                            $emptyWeekProgress .= "<td></td>";
                        @endphp
                    @endfor
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach($project->steps as $step)
                <tr class="text-center font-weight-bold">
                    <td>{{NumConvert::roman($no++)}}</td>
                    <td>{{$step->project_step_name}}</td>
                    <td></td>
                    <td></td>
                    @php echo $emptyWeekProgress; @endphp
                </tr>
                @php $noSub = 1; @endphp
                @foreach($step->substeps as $substep)
                    @php
                        $start = 0;
                        $end = 0;
                        $startDate = null;
                        $endDate = null;
                        $date = '-';
                        $bobot = 0;

                        $cols = "";
                        if ($progressStartDate) {
                            if ($substep->progresses->count()) {
                                $startDate = $substep->progresses->sortBy('progress_date')->first()->progress_date;
                                $endDate = $substep->progresses->sortByDesc('progress_date')->first()->progress_date;
                                $start = floor($progressStartDate->diffInDays($startDate)/7);
                                $end = floor($lastProgressDate->diffInDays($endDate)/7);
                                if ($substep->progresses->sum('progress_add') < $substep->progress_plans->sum('weight')) {
                                    $endDate = null;
                                }
                            }
                        }

                        $startLoop = $start;
                        $length = $substep->progresses->count();
                        if (($size = $start + $end + $length) < $totalWeeks) {
                            $end += $totalWeeks - $size;
                        }
                        $padLeft = 0;
                        $padRight = 0;
                        foreach ($substep->progresses as $progress) {
                            $progressSum[$startLoop++] += $progress->progress_add;
                            $bobot += $progress->progress_add;
                            if ($progress->progress_add) {
                                $col = '<td style="background-color: red;color:white" class="text-center">'. $progress->progress_add .'</td>';
                                $cols .= $col;
                                $padLeft += strlen($col);
                            } else {
                                $cols .= '<td></td>';
                                $padLeft += 9;
                            }

                            $totalBobotProgress += $bobot;
                        }
                        $padLeft += $start * 9;
                        $padRight = $padLeft + ($end * 9);
                        $cols = str_pad($cols, $padLeft, '<td></td>', STR_PAD_LEFT);
                        $cols = str_pad($cols, $padRight, '<td></td>', STR_PAD_RIGHT);
                        if ($startDate) {
                            $date = $startDate->format('d/m/Y'). ' - ';
                        }
                        if ($endDate) {
                            $date .= $endDate->format("d/m/Y");
                        }
                    @endphp
                    <tr class="text-center">
                        <td>{{$noSub++}}</td>
                        <td>{{$substep->project_substep_name}}</td>
                        <td>{{$date}}</td>
                        <td>{{$bobot}}</td>
                        @php echo $cols; @endphp
                    </tr>
                @endforeach
            @endforeach
                <tr id="total" class="text-center">
                    <td colspan="2" align="right">Jumlah</td>
                    <td>-</td>
                    <td>{{$totalBobotProgress}}</td>
                    <td colspan="{{ $totalWeeks }}"></td>
                </tr>
                <tr class="text-center font-weight-bold">
                    <td colspan="3">Rencana Progress Mingguan (%)</td>
                    <td>-</td>
                    @foreach($progressSum as $sum)
                        <td>{{$sum}}</td>
                    @endforeach
                </tr>
                <tr class="text-center font-weight-bold">
                    <td colspan="3">Kumulatif Rencana Progress Mingguan (%)</td>
                    <td>-</td>
                    @php $kumulatif = 0; @endphp
                    @for($i = 0; $i < $totalWeeks; $i++)
                        @if ($i == 0)
                            <td>{{$kumulatif = $progressSum[$i]}}</td>
                        @else
                            <td>{{$kumulatif += $progressSum[$i]}}</td>
                        @endif
                    @endfor
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        PROGRESS REAL - WEEKLY
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary float-right"
                                data-target="#modal-add-progress-weekly"
                                data-toggle="modal"
                        >Tambah</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="overflow-y: auto">
                    <table class="table" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Minggu ke-</th>
                                <th>Item Pekerjaan</th>
                                <th>Progress Update</th>
                                <th>Deskripsi Progress</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($project->progresses->count() > 0)
                                @foreach($project->progresses as $progress)
                                    <tr class="data-row" data-id="{{$progress->progress_id}}">
                                        <td class="date">{{$progress->progress_date->format('d/m/Y')}}</td>
                                        <td class="week">{{$progress->week}}</td>
                                        <td class="progress-project-substep" data-id="{{$progress->substep->project_substep_id}}">{{$progress->substep->project_substep_name}}</td>
                                        <td class="progress-add">{{$progress->progress_add}}</td>
                                        <td class="progress-description">{{$progress->progress_desc}}</td>
                                        <td>
                                            <i class="fas fa-pencil-alt mr-2 edit-progress" style="cursor: pointer;"></i>
                                            <a href="/projects/{{$project->project_id}}/progress/{{$progress->progress_id}}/delete"><i class="fas fa-trash" style="cursor: pointer;" id="delete-item"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="data-row">
                                    <td colspan="6">Data tidak ditemukan</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('projects.detail.modal.modal-edit-progress-weekly')
@include('projects.detail.modal.modal-add-progress-weekly')
@include('projects.detail.modal.modal-edit-project')

@section('script')
    <script>
        $(document).ready(function() {
            var i = $('input[name="week[]"]').length;

            $('.edit-progress').click(function() {
                $('#modal-edit-progress-weekly').modal('show');

                var element = $(this);
                var row = element.closest('.data-row');

                var id = row.attr('data-id');
                var date = row.children('.date').text();
                date = date.split('/');
                date = date[2] +'-'+date[1]+'-'+date[0];
                var week = row.children('.week').text();
                var item = row.children('.progress-project-substep').attr('data-id');
                var progressUpdate = row.children('.progress-add').text();
                var progressDescription = row.children('.progress-description').text();

                $('#modal-progress-weekly-date').val(date);
                $('#modal-progress-weekly-week').val(week);
                $('#modal-progress-weekly-id').val(id);
                $('#modal-progress-weekly-week-project_substep_id option[value='+item+']').attr('selected', 'selected');
                $('#modal-progress-weekly-progress-update').val(progressUpdate);
                $('#modal-progress-weekly-progress-description').val(progressDescription);
            });

            $('#modal-edit-progress-weekly').on('hide.bs.modal', function() {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            });

            $('#add').click(function() {
                i++;
                $('#bobot-container').append('<div id=bobot-'+i+' class="form-group col-sm-4"><label>Minggu '+i+'</label><input type="text" name="week[]" class="form-control"></div>');
            });

            $('#remove').click(function() {
                $('#bobot-'+i).remove();
                if (i != 0) {
                    i--;
                }
            });
        });
    </script>
@endsection
