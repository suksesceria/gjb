<div id="modal-add-progress-weekly" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4>Tambah Progress Mingguan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" type="date" id="modal-progress-weekly-date">
                    </div>
                    <div class="form-group">
                        <label>Item Pekerjaan</label>
                        <input class="form-control" type="text" id="modal-progress-weekly-substep">
                    </div>
                    <div class="form-group">
                        <label>Progress Update</label>
                        <input class="form-control" type="text" id="modal-progress-weekly-progress-update">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Progress</label>
                        <input class="form-control" type="text" id="modal-progress-weekly-progress-description">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
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