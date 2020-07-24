@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-header" style="margin-top: 3%;margin-left: 3%;margin-bottom: -3%;">
                <h4>Tipe Material</h4>
            </div>
            <div class="panel-body">
                <button class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modal-create-material-type"
                        style="float:right;margin:2%" ><i class="fa fa-plus" aria-hidden="true"></i>Membuat Tipe Material</button>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data->count() > 0)
                            @foreach($data as $index => $material_type)
                            <tr class="data-row">
                                <td width="5%">{{ $index + 1 }}</td>
                                <td class="type">{{ $material_type->material_type_name }}</td>
                                <td>
                                    <i class="fas fa-pencil-alt mr-2" style="cursor: pointer;" onclick="editItem({{ json_encode($material_type) }})" id="{{ $material_type->material_type_id }}"></i>
                                    <i class="fas fa-trash" style="cursor: pointer;" onclick="deleteItem({{ $material_type->material_type_id }})" id="delete-item"></i>
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
    <form action="" method="post" id="form-delete-material_type_id">
        @method('DELETE')
        @csrf
        <input type="hidden" name="material_type_id" id="delete-material_type_id" />
    </form>
    @include('material-type.modal.modal-create-material-type')
    @include('material-type.modal.modal-edit-material-type')
@endsection

@section('script')
    <script>
        $('#modal-edit-material-type').on('show.bs.modal', function() {
            var element = $('.edit-item-trigger-clicked');
            var row = element.closest('.data-row');

            var typeProyek = row.children('.type').text();

            $('#edit-type-proyek').val(typeProyek);
        });

        $('#modal-edit-material-type').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        });

        function editItem(data) {
            $('#'+data.material_type_id).addClass('edit-item-trigger-clicked');
            $('#edit-material_type_name').val(data.material_type_name);
            $('#edit-material_type_id').val(data.material_type_id);
            $('#modal-edit-material-type').modal('show');
        }

        function deleteItem(id) {
            $('#delete-material_type_id').val(id);
            $('#form-delete-material_type_id').submit();
        }
    </script>
@endsection
