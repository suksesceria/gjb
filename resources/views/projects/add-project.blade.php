@extends('layouts.master')

@section('content')
  <div class="container">
    <form action="" method="post">
        @csrf
      <div class="row">
        <div class="col-md-6">

          <div class="form-group">
            <label>Nama Projek</label>
            <input type="text" class="form-control" name="project_name" id="project_name">
          </div>
          <div class="form-group">
            <label>Total Biaya Projek</label>
            <input type="number" min="0" class="form-control" name="cost_total" id="cost_total">
          </div>
          
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Tipe</label>
            <select class="form-control" name="project_type_id" id="project_type_id">
                @foreach ($projectTypes as $projectType)
                    <option value="{{ $projectType->project_type_id }}">{{$projectType->project_type_name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Karyawan</label>
            <select class="form-control" name="project_employees[]" id="project_employees" multiple>
                @foreach($employees as $employee)
                    <option value="{{$employee->employee_id}}">{{$employee->employee_name}}</option>
                @endforeach
            </select>
          </div>
        </div>
      </div>

      <div style="font-size: 12px;font-weight: bold;margin-top: 20px;">Langkah</div>

      <div class="" style="margin-top: 20px;">
        <button type="button" id="add-steps" onclick="addSteps()" class="btn btn-primary" style="padding: 2px; font-size: 10px;">Tambah Langkah</button>
      </div>

      <div class="row" id="steps-container">
        <div class="col-sm-12 mt-3 steps" id="steps-1" style="border: 1px solid grey;padding: 30px;position: relative;">
            <div style="position: absolute;top: 10px;right: 10px;">
                <div style="background-color: red;border-radius: 50%;width: 30px;height: 30px;text-align: center;cursor: pointer;">
                    <i title="Hapus" class="fa fa-trash" style="color: #fff;font-size: 15px;margin-top: 7px"></i>
                </div>
            </div>
          <div class="form-group" >
            <label>Nama Langkah 1</label>
            <input type="text" name="steps_name[]" class="form-control">
          </div>
    
          <div style="font-size: 12px;font-weight: bold;margin-top: 20px;">Item Pekerjaan</div>

          <div class="" style="margin-top: 10px;">
            <button type="button" id="add-subteps"onclick="addSubsteps(1)" class="btn btn-primary" style="padding: 2px; font-size: 10px;"
            >Tambah Item Pekerjaan</button>
          </div>

          <div class="row substeps-container-1" style="padding: 10px;">
            <div class="col-md-4 substeps">
              <div class="form-group">
                  <div style="display: flex;justify-content: space-between;">
                    <label>Nama</label>
                      <div>
                          <i class="fa fa-trash" style="color: red;cursor: pointer;"></i>
                      </div>
                  </div>
                <input type="text" name="substeps_name[]" class="form-control">
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="substeps_start_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="substeps_end_date" class="form-control">
                  </div>
                </div>
              </div>
              
              <div id="bobot-per-minggu">
                <div style="font-size: 12px;margin-bottom: 10px;margin-top: 10px;font-weight: bold;">Bobot per Minggu</div>
                <div class="row" id="bobot-container">
                  <div class="form-group col-sm-4" id="bobot-1">
                      <div style="display: flex;justify-content: space-between;">
                          <label>Minggu 1</label>
                          <div>
                              <i class="fa fa-trash" style="color: red;cursor: pointer;"></i>
                          </div>
                      </div>
                    <input type="text" name="week[]" class="form-control">
                  </div>
                </div>
              </div>
        
              <button type="button" id="add-week" class="btn btn-primary" style="padding: 2px; font-size: 10px;">add</button>
            </div>
          </div>

        </div>

      </div>

      <div style="margin-top: 30px;">
        <button type="submit" style="padding: 6px 20px !important;" class="btn btn-primary">Buat</button>
      </div>
    </form>
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



</script>
    
@endsection
