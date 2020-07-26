<div id="modal-add-material-use" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4>Tambah Laporan Penggunaan Material</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" name="material_use_date" type="date" id="modal-add-material_use-date">
                    </div>
                    <div class="form-group">
                        <label class="mr-1">Material Report: </label>
                        <select class="form-control" name="material_report_id">
                            @foreach($materialReport as $row)
                                <option value="{{$row->material_report_id}}">{{$row->material_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <input class="form-control" name="material_qty" type="number" id="modal-add-material_use-description3">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" name="material_desc" type="text" id="modal-add-material_use-description4">
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
