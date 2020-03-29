@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <button class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modal-create-role"
                >Membuat Role</button>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Peran</th>
                            <th>Akses Menu</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($roles->count() > 0)
                            @foreach($roles as $index => $role)
                            <tr class="data-row">
                                <td class="role">{{ $role->role_name }}</td>
                                <td class="access-menu">
                                    {{ $role->menus->implode('menu_name', ', ') }}
                                </td>
                                <td class="description">
                                    {{ $role->role_desc }}
                                </td>
                                <td>
                                    <i class="fas fa-pencil-alt mr-2" style="cursor: pointer;" onclick="editItem(1)" id="1"></i>
                                    <i class="fas fa-trash" style="cursor: pointer;" onclick="deleteItem(2)" id="delete-item"></i>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr class="data-row">
                                <td colspan="4" align="center">Data tidak ditemukan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('role-access.modal.modal-create-role')
    @include('role-access.modal.modal-edit-role')
@endsection

@section('script')
    <script>
        $('#modal-edit-role').on('show.bs.modal', function() {
            var element = $('.edit-item-trigger-clicked');
            var row = element.closest('.data-row');

            var role = row.children('.role').text();
            var accessMenu = row.children('.access-menu').text();
            var description = row.children('.description').text();

            $('#edit-role-name').val(role);
            $('#edit-role-description').val(description);

            if (accessMenu.includes('Beranda')) {
                $('#edit-dashboard').attr('checked', true);
            }

            if (accessMenu.includes('Proyek')) {
                $('#edit-project').attr('checked', true);
            }

            if (accessMenu.includes('Laporan keuangan')) {
                $('#edit-cost-report').attr('checked', true);
            }

            if (accessMenu.includes('Karyawan')) {
                $('#edit-employees').attr('checked', true);
            }

            if (accessMenu.includes('Progress')) {
                $('#edit-progress').attr('checked', true);
            }

            if (accessMenu.includes('Dokument pendukung')) {
                $('#edit-supporting-document').attr('checked', true);
            }

            if (accessMenu.includes('Akses role')) {
                $('#edit-role-access').attr('checked', true);
            }

            if (accessMenu.includes('Tipe Proyek')) {
                $('#edit-project-type').attr('checked', true);
            }
        });

        $('#modal-edit-role').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        });

        function editItem(index) {
            $('#'+index).addClass('edit-item-trigger-clicked');

            $('#modal-edit-role').modal('show');
        }

        function deleteItem() {
            
        }
    </script>
@endsection
