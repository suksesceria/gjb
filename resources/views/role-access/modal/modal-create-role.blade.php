<div id="modal-create-role" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Tambah Progress Mingguan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama Role</label>
                        <input class="form-control" type="text" name="role_name" id="role-name" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Role</label>
                        <input class="form-control" type="text" name="role_desc" id="role-desc" required>
                    </div>
                    <label for="">Akses Menu</label>
                    <div class="ml-1">
                        <div class="row">
                            @foreach($menus->split(2) as $menu)
                            <div class="col-md-6">
                                @foreach($menu as $item)
                                    <div>
                                        <input type="checkbox" class="m-1" name="menus[]" value="{{ $item->menu_id }}">
                                        <label for="dashboard">{{ $item->menu_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center mt-2">
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
