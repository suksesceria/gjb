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
                                    <i class="fas fa-pencil-alt mr-2" style="cursor: pointer;" onclick="editItem({{ json_encode($role) }})" id="{{ $role->role_id }}"></i>
                                    <i class="fas fa-trash" style="cursor: pointer;" onclick="deleteItem({{ $role->role_id }})" id="delete-item"></i>
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
    <form action="" method="post" id="form-delete-role_id">
        @method('DELETE')
        @csrf
        <input type="hidden" name="role_id" id="delete-role_id" />
    </form>
@endsection

@section('script')
    <script>
        $('#modal-edit-role').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        });

        function editItem(data) {
            $('#'+ data.role_id).addClass('edit-item-trigger-clicked');
            var form = $('#form-edit-role');
            form.find('[name="role_id"]').val(data.role_id);
            form.find('[name="role_name"]').val(data.role_name);
            form.find('[name="role_desc"]').val(data.role_desc);
            form.find('[name="menus[]"]').prop('checked', false);
            data.menus.forEach(function (menu) {
                form.find('#menu_' + menu.menu_id).prop('checked', true);
            });
            $('#modal-edit-role').modal('show');
        }

        function deleteItem(id) {
            $('#delete-role_id').val(id);
            $('#form-delete-role_id').submit();
        }
    </script>
@endsection
