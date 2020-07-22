<div id="modal-add-material_report" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4>Tambah Laporan Material</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" name="material_report_date" type="date" id="modal-add-material_report-date">
                    </div>
                    <div class="form-group">
                        <label class="mr-1">Tipe: </label>
                        <select class="form-control" name="material_type_id">
                            @foreach($materialTypes as $materialType)
                                <option value="{{$materialType->material_type_id}}">{{$materialType->material_type_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Material</label>
                        <input class="form-control" name="material_name" type="text" id="modal-add-material_report-description1">
                    </div>
                    <div class="form-group">
                        <label class="mr-1">Unit: </label>
                        <select class="form-control" name="material_unit_id">
                            @foreach($materialUnits as $materialUnit)
                                <option value="{{$materialUnit->material_unit_id}}">{{$materialUnit->material_unit_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Satuan</label>
                        <input class="form-control" name="material_cost_unit" type="number" id="modal-add-material_report-description2">
                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <input class="form-control" name="material_qty" type="number" id="modal-add-material_report-description3">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" name="material_desc" type="text" id="modal-add-material_report-description4">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Tambah</button>
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
