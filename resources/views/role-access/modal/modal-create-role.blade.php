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
                        <input class="form-control" type="text" name="role_name" id="role-name" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Role</label>
                        <input class="form-control" type="text" name="role_description" id="role-description" required>
                    </div>
                    <label for="">Akses Menu</label>
                    <div class="ml-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <input type="checkbox" class="m-1" id="dashboard" name="dashboard" value="dashboard">
                                    <label for="dashboard">Beranda</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="m-1" id="project" name="project" value="project">
                                    <label for="project">Proyek</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="m-1" id="cost-report" name="cost_report" value="cost_report">
                                    <label for="cost-report">Laporan keuangan</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="m-1" id="employees" name="employees" value="employees">
                                    <label for="employess">Karyawan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <input type="checkbox" class="m-1" id="progress" name="progress" value="progress">
                                    <label for="progress">Progress</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="m-1" id="supporting-document" name="supporting_document" value="supporting_document">
                                    <label for="supporting-document">Documen pendukung</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="m-1" id="role-access" name="role_access" value="role_access">
                                    <label for="role-access">Akses role</label>
                                </div>
                                <div>
                                    <input type="checkbox" class="m-1" id="project-type" name="project_type" value="project_type">
                                    <label for="project-type">Tipe Proyek</label>
                                </div>
                            </div>
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