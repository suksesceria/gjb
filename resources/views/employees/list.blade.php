@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-add-employees" style="float:right;margin:2%"
                ><i class="fa fa-plus" aria-hidden="true"></i>Tambah Karyawan</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nomor Ponsel</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($employees->count() > 0)
                            @foreach($employees as $index => $employee)
                                <tr class="data-row">
                                    <td>{{ $employee->employee_id }}</td>
                                    <td class="name">{{ $employee->employee_name }}</td>
                                    <td class="dob">{{ $employee->employee_dob->format('d/m/Y') }}</td>
                                    <td class="username">{{ $employee->employee_username }}</td>
                                    <td class="email">{{ $employee->employee_email }}</td>
                                    <td class="phone-number">{{ $employee->employee_phone }}</td>
                                    <td>
                                        <i class="fas fa-pencil-alt mr-2" style="cursor: pointer;" onclick="editItem({{ json_encode($employee) }})" id="{{ $employee->employee_id }}"></i>
                                        <i class="fas fa-trash" style="cursor: pointer;" id="delete-item" onclick="deleteItem({{ $employee->employee_id }})"></i>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="data-row">
                                <td colspan="3" align="center">Data tidak ditemukan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('employees.modal.modal-add-employee')
    @include('employees.modal.modal-edit-employee')

    <form action="" method="post" id="form-delete-employee">
        @method('DELETE')
        @csrf
        <input type="hidden" name="employee_id" id="delete-employee_id" />
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#modal-edit-employees').on('show.bs.modal', function() {
                var element = $('.edit-item-trigger-clicked');
                var row = element.closest('.data-row');

                var name = row.children('.name').text();
                var dob = row.children('.dob').text();
                var userName = row.children('.username').text();
                var email = row.children('.email').text();
                var phoneNumber= row.children('.phone-number').text();

                dob = dob.split("/").reverse().join("-");

                $('#name').val(name);
                $('#dob').val(dob);
                $('#username').val(userName);
                $('#email').val(email);
                $('#phone-number').val(phoneNumber);
            });

            $('#modal-edit-employees').on('hide.bs.modal', function() {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            });
        });
        function editItem(data) {
            $('#'+data.employee_id).addClass('edit-item-trigger-clicked');
            $('#form-edit-employee').find('[name="employee_id"]').val(data.employee_id);
            $('#form-edit-employee').find('[name="role_id"]').val(data.role_id);
            $('#modal-edit-employees').modal('show');
        }
        function deleteItem(id) {
            $('#delete-employee_id').val(id);
            $('#form-delete-employee').submit();
        }
    </script>
@endsection
