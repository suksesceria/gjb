<div id="modal-add-supporting_document" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4>Tambah Dokumen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" name="supporting_document_upload_date" type="date" id="modal-add-supporting_document-date">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="supporting_document_name" type="text" id="modal-add-supporting_document-description">
                    </div>
                    <div class="form-group">
                        <label>Dokumen</label>
                        <input class="form-control" name="supporting_document_path" type="file" id="modal-add-supporting_document-total">
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
