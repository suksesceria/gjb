<div id="modal-detail-keuangan-lapangan" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4>Detail Keuangan Lapangan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control date" type="date" id="modal-detail-keuangan-lapangan-date" disbaled>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control description" type="text" id="modal-detail-keuangan-lapangan-description" disbaled>
                    </div>
                    <div class="form-group">
                        <label>Debit</label>
                        <input class="form-control debit" name="debit" type="text" id="modal-detail-keuangan-lapangan-debit" disbaled>
                    </div>
                    <div class="form-group">
                        <label>Kredit</label>
                        <input class="form-control kredit" name="kredit" type="number" id="modal-detail-keuangan-lapangan-kredit" disbaled>
                    </div>
                    <div class="form-group">
                        <label>Saldo Terakhir</label>
                        <input class="form-control total" type="text" id="modal-detail-keuangan-lapangan-total" disbaled>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input class="form-control status" type="text" id="modal-detail-keuangan-lapangan-status" disbaled>
                    </div>
                    <div class="text-center">
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
<div id="modal-detail-keuangan-lapangan" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4>Detail Keuangan Lapangan</h4>
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
                        <label>Keterangan</label>
                        <input class="form-control" name="material_name" type="text" id="modal-add-material_report-description1">
                    </div>
                    <div class="form-group">
                        <label>Debit</label>
                        <input class="form-control" name="material_cost_unit" type="number" id="modal-add-material_report-description2">
                    </div>
                    <div class="form-group">
                        <label>Kredit</label>
                        <input class="form-control" name="material_qty" type="number" id="modal-add-material_report-description3">
                    </div>
                    <div class="form-group">
                        <label>Saldo Terakhir</label>
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
