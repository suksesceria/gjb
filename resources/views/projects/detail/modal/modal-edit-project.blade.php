<div id="modal-edit-project" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Proyek</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="">
                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Nama Proyek</label>
                      <input type="text" class="form-control" name="project_name" id="project_name">
                    </div>
                    <div class="form-group">
                      <label>Total Biaya Proyek</label>
                      <input type="number" min="0" class="form-control" name="project_total_cost" id="project_total_cost">
                    </div>

                  </div>
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>Tipe</label>
                      <select class="form-control" name="project_type" id="project_type">
                        <option value="">1</option>
                        <option value="">2</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Karyawan</label>
                      <select class="form-control" name="project_employee" id="project_type">
                        <option value="">asep</option>
                        <option value="">joko</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div style="font-size: 12px">Langkah</div>

                <div class="form-group">
                  <label>Nama Langkah</label>
                  <input type="text" name="steps_name" class="form-control">
                </div>

                <div style="font-size: 12px">Item Pekerjaan</div>

                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="substeps_name" class="form-control">
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

                <button type="button" id="add" class="btn btn-primary" style="padding: 2px; font-size: 10px;">add</button>
                <button type="button" id="remove" class="btn btn-danger" style="padding: 2px; font-size: 10px;">remove</button>

                <div style="text-align: center">
                  <button type="submit" class="btn btn-primary">Edit</button>
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
        </div>
    </div>
</div>
