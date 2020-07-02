<div id="modal-edit-material-type" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Tipe Material</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="material_type_id" id="edit-material_type_id" />
                    <div class="form-group">
                        <label>Nama Tipe Proyek</label>
                        <input class="form-control" type="text" name="material_type_name" id="edit-material_type_name" required>
                    </div>
                    <div class="text-center mt-2">
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
