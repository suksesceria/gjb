@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <button class="btn btn-primary"
                        data-toggle="modal"
                        style="float:right;margin:2%"
                ><i class="fa fa-plus" aria-hidden="true"></i>Membuat Satuan Material</button>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data->count() > 0)
                            @foreach($data as $index => $material_unit)
                            <tr class="data-row">
                                <td width="5%">{{ $index + 1 }}</td>
                                <td class="type">{{ $material_unit->material_unit_name }}</td>
                                <td>
                                    <i class="fas fa-pencil-alt mr-2" style="cursor: pointer;" onclick="editItem({{ json_encode($material_unit) }})" id="{{ $material_unit->material_unit_id }}"></i>
                                    <i class="fas fa-trash" style="cursor: pointer;" onclick="deleteItem({{ $material_unit->material_unit_id }})" id="delete-item"></i>
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
    <form action="" method="post" id="form-delete-material_unit_id">
        @method('DELETE')
        @csrf
        <input type="hidden" name="material_unit_id" id="delete-material_unit_id" />
    </form>
    @include('material-unit.modal.modal-create-material-unit')
    @include('material-unit.modal.modal-edit-material-unit')
@endsection

@section('script')
    <script>
        $('#modal-edit-material-unit').on('show.bs.modal', function() {
            var element = $('.edit-item-trigger-clicked');
            var row = element.closest('.data-row');

            var typeProyek = row.children('.type').text();

            $('#edit-type-proyek').val(typeProyek);
        });

        $('#modal-edit-material-unit').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        });

        function editItem(data) {
            $('#'+data.material_unit_id).addClass('edit-item-trigger-clicked');
            $('#edit-material_unit_name').val(data.material_unit_name);
            $('#edit-material_unit_id').val(data.material_unit_id);
            $('#modal-edit-material-unit').modal('show');
        }

        function deleteItem(id) {
            $('#delete-material_unit_id').val(id);
            $('#form-delete-material_unit_id').submit();
        }
    </script>
@endsection
