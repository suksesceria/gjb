<div id="modal-create-role" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Progress Mingguan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label>Nama Role</label>
                        <input class="form-control" type="text" name="role_name" id="role-name">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Role</label>
                        <input class="form-control" type="text" name="role_description" id="role-description">
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
        </div>
    </div>
</div>