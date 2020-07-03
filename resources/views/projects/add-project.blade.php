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

      <div style="font-size: 12px">Langkah</div>

      <div class="text-center">
        <button type="button" id="add-steps" onclick="addSteps()" class="btn btn-primary" style="padding: 2px; font-size: 10px;">Tambah Langkah</button>
        <button type="button" id="remove-steps" onclick="removeSteps()" class="btn btn-danger" style="padding: 2px; font-size: 10px;">Hapus Langkah</button>
      </div>

      <div class="row" id="steps-container">
        <div class="col-sm-12 mt-3 steps" id="steps-1">
          <div class="form-group" >
            <label>Nama Langkah 1</label>
            <input type="text" name="steps_name[]" class="form-control">
          </div>
    
          <div style="font-size: 12px">Item Pekerjaan</div>

          <div class="text-center">
            <button type="button" id="add-subteps"onclick="addSubsteps(1)" class="btn btn-primary" style="padding: 2px; font-size: 10px;"
            >Tambah Item Pekerjaan</button>
            <button type="button" id="remove-substeps-1" class="btn btn-danger" style="padding: 2px; font-size: 10px;">Hapus Item Pekerjaan</button>
          </div>

          <div class="row substeps-container-1">
            <div class="col-md-4 substeps">
              <div class="form-group">
                <label>Nama</label>
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
                <div style="font-size: 12px">Bobot per Minggu</div>
                <div class="row" id="bobot-container">
                  <div class="form-group col-sm-4" id="bobot-1">
                    <label>Minggu 1</label>
                    <input type="text" name="week[]" class="form-control">
                  </div>
                </div>
              </div>
        
              <button type="button" id="add-week" class="btn btn-primary" style="padding: 2px; font-size: 10px;">add</button>
              <button type="button" id="remove-week" class="btn btn-danger" style="padding: 2px; font-size: 10px;">remove</button>
            </div>
          </div>

        </div>

      </div>

      <div style="text-align: center">
        <button type="submit" class="btn btn-primary">Buat</button>
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
  let stepsLength = $('.steps').length;

  $(document).ready(function() {
    var i = $('input[name="week[]"]').length;
    

    $('#add-week').click(function() {
      i++;
      $('#bobot-container').append('<div id=bobot-'+i+' class="form-group col-sm-4"><label>Minggu '+i+'</label><input type="text" name="week[]" class="form-control"></div>');
    });

    $('#remove-week').click(function() {
      $('#bobot-'+i).remove();
      if (i != 0) {
        i--;
      }
    });

    
  });
  function addSteps() {
    stepsLength++;
    
    $('#steps-container').append('<div class="col-sm-12 mt-3 steps" id="steps-'+stepsLength+'"><div class="form-group"><label>Nama Langkah '+stepsLength+'</label><input type="text" name="steps_name[]" class="form-control"></div><div style="font-size: 12px">Item Pekerjaan</div><div class="text-center"><button type="button" id="add-subteps" onclick="addSubsteps('+stepsLength+')" class="btn btn-primary" style="padding: 2px; font-size: 10px;">Tambah Item Pekerjaan</button><button type="button" id="remove-substeps-'+stepsLength+'" class="btn btn-danger" style="padding: 2px; font-size: 10px;">Hapus Item Pekerjaan</button></div><div class="row substeps-container-'+stepsLength+'"><div class="col-md-4" id="substeps-1"><div class="form-group"><label>Nama</label><input type="text" name="substeps_name[]" class="form-control"></div><div class="row"><div class="col-md-6"><div class="form-group"><label>Tanggal Mulai</label><input type="date" name="substeps_start_date" class="form-control"></div></div><div class="col-md-6"><div class="form-group"><label>Tanggal Selesai</label><input type="date" name="substeps_end_date" class="form-control"></div></div></div><div id="bobot-per-minggu"><div style="font-size: 12px">Bobot per Minggu</div><div class="row" id="bobot-container"><div class="form-group col-sm-4" id="bobot-1"><label>Minggu 1</label><input type="text" name="week[]" class="form-control"></div></div></div><button type="button" id="add-week" class="btn btn-primary" style="padding: 2px; font-size: 10px;">add</button><button type="button" id="remove-week" class="btn btn-danger" style="padding: 2px; font-size: 10px;">remove</button></div></div></div>');
  };

  function removeSteps() {
    if (stepsLength > 1) {
      $('#steps-'+stepsLength).remove();
      stepsLength--;
    }
  }

  function addSubsteps(index) {
    console.log(index)

    $('.substeps-container-'+index).append('<div class="col-md-4 substeps"><div class="form-group"><label>Nama</label><input type="text" name="substeps_name[]" class="form-control"></div><div class="row"><div class="col-md-6"><div class="form-group"><label>Tanggal Mulai</label><input type="date" name="substeps_start_date" class="form-control"></div></div><div class="col-md-6"><div class="form-group"><label>Tanggal Selesai</label><input type="date" name="substeps_end_date" class="form-control"></div></div></div><div id="bobot-per-minggu"><div style="font-size: 12px">Bobot per Minggu</div><div class="row" id="bobot-container"><div class="form-group col-sm-4" id="bobot-1"><label>Minggu 1</label><input type="text" name="week[]" class="form-control"></div></div></div><button type="button" id="add-week" class="btn btn-primary" style="padding: 2px; font-size: 10px;">add</button><button type="button" id="remove-week" class="btn btn-danger" style="padding: 2px; font-size: 10px;">remove</button></div>');
  }

  
</script>
    
@endsection
