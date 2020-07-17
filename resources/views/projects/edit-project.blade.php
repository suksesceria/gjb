@extends('layouts.master')

@section('content')
  <div class="container">
    <form action="" method="post">
        @csrf
      <div class="row">
        <div class="col-md-6">

          <div class="form-group">
            <label>Nama Proyek</label>
            <input type="text" class="form-control" name="project_name" id="project_name" value="{{$project->project_name}}">
          </div>
          <div class="form-group">
            <label>Total Biaya Proyek</label>
            <input type="number" min="0" class="form-control" name="cost_total" id="cost_total" value="{{$project->cost_total}}">
          </div>
          
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Tipe</label>
            <select class="form-control" name="project_type_id" id="project_type_id">
                @foreach ($projectTypes as $projectType)
                    <option value="{{ $projectType->project_type_id }}" {{$project->project_type_id === $projectType->project_type_id ? 'selected' : ''}}>{{$projectType->project_type_name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Karyawan</label>
            <select class="form-control" name="project_employees[]" id="project_employees" multiple>
                @php $employeesId = $project->employees->pluck('employee_id'); @endphp
                @foreach($employees as $employee)
                    <option
                        {{$employeesId->contains($employee->employee_id) ? 'selected' : ''}}
                        value="{{$employee->employee_id}}">
                        {{$employee->employee_name}}
                    </option>
                @endforeach
            </select>
          </div>
        </div>
      </div>

      <div style="font-size: 12px;font-weight: bold;margin-top: 20px;">Langkah</div>

      <div class="" style="margin-top: 20px;">
        <button type="button" id="add-steps" onclick="addStep()" class="btn btn-primary" style="padding: 2px; font-size: 10px;">Tambah Langkah</button>
        <button type="button" id="add-steps" onclick="removeStep()" class="btn btn-danger" style="padding: 2px; font-size: 10px;">Hapus Langkah</button>
      </div>

      <div class="row" id="steps-container">
          @foreach($project->steps as $index => $step)
              <div class="col-sm-12 mt-3 steps" style="border: 1px solid grey;padding: 30px;position: relative;">
                  <div class="form-group" >
                      <label>Nama Langkah {{$index + 1}}</label>
                      <input type="hidden" name="project_step_id[]" value="{{$step->project_step_id}}" />
                      <input type="text" name="project_step_name[]" class="form-control" value="{{$step->project_step_name}}" />
                  </div>

                  <div style="font-size: 12px;font-weight: bold;margin-top: 20px;">Item Pekerjaan</div>

                  <div class="" style="margin-top: 10px;">
                      <button type="button" onclick="addSubstep(this, {{$index}})" class="btn btn-primary" style="padding: 2px; font-size: 10px;"
                      >Tambah Item Pekerjaan</button>
                      <button type="button" onclick="removeSubstep(this)" class="btn btn-danger" style="padding: 2px; font-size: 10px;"
                      >Hapus Item Pekerjaan</button>
                  </div>

                  <div class="row substeps-container" style="padding: 10px;">
                    @foreach($step->substeps as $indexSubstep => $substep)
                          <div class="col-md-4 substeps">
                              <div class="form-group">
                                  <label>Nama</label>
                                  <input type="hidden" name="project_substep_id[{{$index}}][]" value="{{$substep->project_substep_id}}" />
                                  <input type="text" name="project_substep_name[{{$index}}][]" value="{{$substep->project_substep_name}}" class="form-control">
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Tanggal Mulai</label>
                                          <input type="date"
                                                 value="{{$substep->estimated_start_date->format('Y-m-d')}}"
                                                 name="estimated_start_date[{{$index}}][]"
                                                 class="form-control start-date"
                                                 data-index="{{$index}}-{{$indexSubstep}}" onchange="dateChanged(this)">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Tanggal Selesai</label>
                                          <input type="date"
                                                 value="{{$substep->estimated_end_date->format('Y-m-d')}}"
                                                 name="estimated_end_date[{{$index}}][]"
                                                 class="form-control end-date"
                                                 data-index="{{$index}}-{{$indexSubstep}}" onchange="dateChanged(this)">
                                      </div>
                                  </div>
                              </div>

                              <div class="bobot-per-minggu">
                                  <div style="font-size: 12px;margin-bottom: 10px;margin-top: 10px;font-weight: bold;">Bobot per Minggu</div>
                                  <div class="row bobot-container">
                                    @foreach($substep->progress_plans as $indexProgressPlan => $progressPlan)
                                          <div class="form-group col-sm-4 bobot">
                                              <label>Minggu {{$progressPlan->week}}</label>
                                              <input type="hidden"
                                                     name="progress_plan_id[{{$index}}][{{$indexSubstep}}][]"
                                                     value="{{$progressPlan->project_progress_plan_id}}" />
                                              <input type="hidden"
                                                     name="week[{{$index}}][{{$indexSubstep}}][]"
                                                     value="{{$progressPlan->week}}"
                                                     class="form-control">
                                              <input type="number"
                                                     name="weight[{{$index}}][{{$indexSubstep}}][]"
                                                     value="{{$progressPlan->weight}}"
                                                     class="form-control">
                                          </div>
                                      @endforeach
                                  </div>
                              </div>
                          </div>
                    @endforeach
                  </div>

              </div>
          @endforeach
      </div>

      <div style="margin-top: 30px;">
        <button type="submit" style="padding: 6px 20px !important;" class="btn btn-primary">Buat</button>
      </div>
    </form>
      <input id="template-progress-plan" type="hidden" value='
        <div class="form-group col-sm-4 bobot">
                    <label>Minggu {progress_plan}</label>
                    <input type="hidden" name="progress_plan_id[{step_index}][{substep_index}][]" value="">
                    <input type="hidden" name="week[{step_index}][{substep_index}][]" value="{progress_plan}">
                    <input type="number" name="weight[{step_index}][{substep_index}][]" class="form-control">
                  </div>
        '>
      <input id="template-substep" type="hidden" value='
        <div class="col-md-4 substeps">
              <div class="form-group">
                <label>Nama</label>
                <input type="hidden" name="project_substep_id[{step_index}]" value="" />
                <input type="text" name="project_substep_name[{step_index}][]" class="form-control">
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="estimated_start_date[{step_index}][]" class="form-control start-date" data-index="{step_index}-{substep_index}" onchange="dateChanged(this)">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="estimated_end_date[{step_index}][]" class="form-control end-date" data-index="{step_index}-{substep_index}" onchange="dateChanged(this)">
                  </div>
                </div>
              </div>

              <div class="bobot-per-minggu">
                <div style="font-size: 12px;margin-bottom: 10px;margin-top: 10px;font-weight: bold;">Bobot per Minggu</div>
                <div class="row bobot-container">

                </div>
              </div>
            </div>
        '>
      <input id="template-langkah" type="hidden" value='
        <div class="col-sm-12 mt-3 steps" style="border: 1px solid grey;padding: 30px;position: relative;">
          <div class="form-group" >
            <label>Nama Langkah {nama_langkah}</label>
            <input type="hidden" name="project_step_id[]" value="" />
            <input type="text" name="project_step_name[]" class="form-control">
          </div>

          <div style="font-size: 12px;font-weight: bold;margin-top: 20px;">Item Pekerjaan</div>

          <div class="" style="margin-top: 10px;">
            <button type="button" onclick="addSubstep(this, {step_index})" class="btn btn-primary" style="padding: 2px; font-size: 10px;"
            >Tambah Item Pekerjaan</button>
            <button type="button" onclick="removeSubstep(this)" class="btn btn-danger" style="padding: 2px; font-size: 10px;"
            >Hapus Item Pekerjaan</button>
          </div>

          <div class="row substeps-container" style="padding: 10px;">

          </div>

        </div>'>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
  </div>
@endsection


@section('script')
<script type="text/javascript">

function dateChanged(ele) {
    var startDate = '';
    var endDate = '';
    if ($(ele).hasClass("start-date")) {
        startDate = $(ele).val();
        if (startDate === '') {
            return;
        }
        startDate = moment(startDate);
        endDate = $(ele).parent().parent().next().children().children('.end-date').val();
        if (endDate === '') {
            return;
        }
        endDate = moment(endDate);
    } else {
        endDate = $(ele).val();
        if (endDate === '') {
            return;
        }
        endDate = moment(endDate);
        startDate = $(ele).parent().parent().prev().children().children('.start-date').val();
        if (startDate === '') {
            return;
        }
        startDate = moment(startDate);
    }
    var totalWeek = Math.ceil(Math.abs(endDate.diff(startDate, 'day')) / 7);
    var container = $(ele).parent().parent().parent().next('.bobot-per-minggu').children('.bobot-container');
    container.html("");
    var dataIndex = $(ele).attr('data-index').split('-');
    var stepIndex = dataIndex[0];
    var substepIndex = dataIndex[1];
    for (var week = 0; week < totalWeek; week++) {
        addProgressPlan(container, stepIndex, substepIndex);
    }
}

function addStep() {
    var index = $('.steps').length;
    var html = $('#template-langkah').val();
    html = html.replace(/{nama_langkah}/g, index + 1).replace(/{step_index}/g, index);
    $('#steps-container').append(html);
}

function removeStep() {
    var index = $('.steps').length - 1;
    if (index > -1) {
        $($('.steps')[index]).remove();
    }
}

function addSubstep(ele, stepIndex) {
    var container = $(ele).parent().next('.substeps-container');
    var index = container.children('.substeps').length;
    var html = $('#template-substep').val().replace(/{step_index}/g, stepIndex).replace(/{substep_index}/g, index);
    container.append(html);
}

function removeSubstep(ele) {
    var container = $(ele).parent().next('.substeps-container');
    var index = container.children('.substeps').length - 1;
    if (index > -1) {
        $(container.children('.substeps')[index]).remove();
    }
}

function addProgressPlan(ele, stepIndex, substepIndex) {
    // var container = $(ele).next().next('.bobot-container');
    var container = $(ele);
    var index = container.children('.bobot').length;
    var html = $('#template-progress-plan').val().replace(/{step_index}/g, stepIndex).replace(/{substep_index}/g, substepIndex).replace(/{progress_plan}/g, index + 1);
    container.append(html);
}

function removeProgressPlan(ele) {
    var container = $(ele).next('.bobot-container');
    var index = container.children('.bobot').length - 1;
    console.log(ele, container, index);
    if (index > -1) {
        $(container.children('.bobot')[index]).remove();
    }
}

</script>
    
@endsection
