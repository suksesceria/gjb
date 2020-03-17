@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-add-employees">Tambah Karyawan</button>
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
                        <tr class="data-row">
                            <td>1</td>
                            <td class="name">Suhar</td>
                            <td class="dob">10/12/2020</td>
                            <td class="username">djail</td>
                            <td class="email">djail@org.com</td>
                            <td class="phone-number">123456789</td>
                            <td>
                                <i class="fas fa-pencil-alt mr-2" style="cursor: pointer;" id="edit-item"></i>
                                <i class="fas fa-trash" style="cursor: pointer;" id="delete-item"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('employees.modal.modal-add-employee')
    @include('employees.modal.modal-edit-employee')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#edit-item').click(function() {
                $(this).addClass('edit-item-trigger-clicked');

                $('#modal-edit-employees').modal('show');
            });

            $('#modal-edit-employees').on('show.bs.modal', function() {
                var element = $('.edit-item-trigger-clicked');
                var row = element.closest('.data-row');

                var name = row.children('.name').text();
                var dob = row.children('.dob').text();
                var userName = row.children('.username').text();
                var email = row.children('.email').text();
                var phoneNumber= row.children('.phone-number').text();

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
    </script>
@endsection