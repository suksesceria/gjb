<div id="modal-edit-employees" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form-edit-employee">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="employee_id"/>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="type" name="employee_name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal lahir</label>
                        <input class="form-control" type="date" name="employee_dob" id="dob" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="employee_username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" name="employee_email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Ponsel</label>
                        <input class="form-control" type="text" name="employee_phone" id="phone-number" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role_id" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="text" name="employee_password">
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
