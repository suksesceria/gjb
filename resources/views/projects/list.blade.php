@extends('layouts.master')

@section('style')
    <style>
        .btn-add-product {
            font-size: 12px;
        }
        .table {
            border: 1px solid #ddd;
        }
        .btn-details {
            font-size: 10px;
        }
        canvas {
            max-height: 40px;
            max-width: 100%;
        }
    </style>
@endsection

@section('content')
<?php
    $url = 'asdasd';
?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <button class="btn btn-primary btn-large mb-4 btn-add-product"
                    data-toggle="modal"
                    data-target="#modal-add-project"
            >ADD NEW PROJECT</button>
            <table class="table">
                <thead>
                    <th>Project name</th>
                    <th width="30%">Progress</th>
                    <th>Employee</th>
                    <th>Type</th>
                    <th width="20%">Total Cost</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Project alpha</td>
                        <td>
                            <div class="row">
                                <div style="background-color: #3BB9FF; width: 100%; max-width: 80%; height: 20px; margin-top: 5px">
                                </div>
                                <span style="margin-top: 4px; margin-left: 2px">20</span>
                            </div>
                        </td>
                        <td>budi</td>
                        <td>gedung</td>
                        <td>2000000</td>
                        <td>
                            <a href="{{ url('/projects/1') }}" class="btn btn-primary btn-details">See details</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @include('projects.modal-add-project')
</div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script>
    </script>
@endsection