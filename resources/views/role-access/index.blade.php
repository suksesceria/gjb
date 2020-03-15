@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <button class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modal-create-role"
                >Membuat Role</button>
                
            </div>
        </div>
    </div>
    @include('role-access.modal.modal-create-role')
@endsection