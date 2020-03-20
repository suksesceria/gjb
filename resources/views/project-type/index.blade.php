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
                            <td class="type">
                                Gedung
                            </td>
                            <td>
                                <i class="fas fa-pencil-alt mr-2" style="cursor: pointer;" onclick="editItem(1)" id="1"></i>
                                <i class="fas fa-trash" style="cursor: pointer;" id="delete-item"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('project-type.modal.modal-create-project-type')
@endsection

@section('script')
    <script>
        function editItem(index) {
            $('#'+index).addClass('edit-item-trigger-clicked');

            $('#modal-edit-role').modal('show');
        }
    </script>
@endsection