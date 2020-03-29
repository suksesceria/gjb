@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <button class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modal-create-project-type"
                >Membuat Tipe Proyek</button>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="data-row">
                            <td width="5%">1</td>
                            <td class="type">Gedung</td>
                            <td>
                                <i class="fas fa-pencil-alt mr-2" style="cursor: pointer;" onclick="editItem(1)" id="1"></i>
                                <i class="fas fa-trash" style="cursor: pointer;" onclick="deleteItem(1)" id="delete-item"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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

        function editItem(index) {
            $('#'+index).addClass('edit-item-trigger-clicked');

            $('#modal-edit-project-type').modal('show');
        }

        function deleteItem(id) {
            $.ajax({

            });
        }
    </script>
@endsection