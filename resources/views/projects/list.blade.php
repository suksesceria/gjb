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
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <a class="btn btn-primary btn-large mb-4 btn-add-product"
                    href="{{ url('/projects/tambah-projek') }}"
            >BUAT PROYEK BARU</a>
            <table class="table">
                <thead>
                    <th>Nama Proyek</th>
                    <th width="30%">Proses</th>
                    <th>Employee</th>
                    <th>Type</th>
                    <th width="20%">Total Cost</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @if($data->count() > 0)
                    @foreach($data as $index => $project)
                    <tr>
                        <td>{{ $project->project_name }}</td>
                        <td>
                            <div class="row">
                                <div style="background-color: #3BB9FF; width: {{ $project->progress }}%; max-width: 80%; height: 20px; margin-top: 5px; margin-left: 1em">
                                </div>
                                <span style="margin-top: 4px; margin-left: 2px">{{ $project->progress }}</span>
                            </div>
                        </td>
                        <td>{{ implode(", ", $project->employees->pluck('employee_name')->toArray()) }}</td>
                        <td>{{ $project->type->project_type_name }}</td>
                        <td>
                            {{number_format($project->cost_total, 0, ",", ".")}}
                        </td>
                        <td>
                            <a href="{{ url('/projects/'. $project->project_id .'/progress') }}" class="btn btn-primary btn-details">See details</button>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr class="data-row">
                        <td colspan="6" align="center">Data tidak ditemukan</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script>
    </script>
@endsection
