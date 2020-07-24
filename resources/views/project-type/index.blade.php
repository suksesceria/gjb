@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <button class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modal-create-project-type"
                        style="float:right;margin:2%"
                ><i class="fa fa-plus" aria-hidden="true"></i>Membuat Tipe Proyek</button>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($project_types->count() > 0)
                            @foreach($project_types as $index => $project_type)
                            <tr class="data-row">
                                <td width="5%">{{ $index + 1 }}</td>
                                <td class="type">{{ $project_type->project_type_name }}</td>
                                <td>
                                    <i class="fas fa-pencil-alt mr-2" style="cursor: pointer;" onclick="editItem({{ json_encode($project_type) }})" id="{{ $project_type->project_type_id }}"></i>
                                    <i class="fas fa-trash" style="cursor: pointer;" onclick="deleteItem({{ $project_type->project_type_id }})" id="delete-item"></i>
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
    <form action="" method="post" id="form-delete-project_type_id">
        @method('DELETE')
        @csrf
        <input type="hidden" name="project_type_id" id="delete-project_type_id" />
    </form>
    @include('project-type.modal.modal-create-project-type')
    @include('project-type.modal.modal-edit-project-type')
@endsection

@section('script')
    <script>
        $('#modal-edit-project-type').on('show.bs.modal', function() {
            var element = $('.edit-item-trigger-clicked');
            var row = element.closest('.data-row');

            var typeProyek = row.children('.type').text();

            $('#edit-type-proyek').val(typeProyek);
        });

        $('#modal-edit-project-type').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        });

        function editItem(data) {
            $('#'+data.project_type_id).addClass('edit-item-trigger-clicked');
            $('#edit-project_type_name').val(data.project_type_name);
            $('#edit-project_type_id').val(data.project_type_id);
            $('#modal-edit-project-type').modal('show');
        }

        function deleteItem(id) {
            $('#delete-project_type_id').val(id);
            $('#form-delete-project_type_id').submit();
        }
    </script>
@endsection
