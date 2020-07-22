
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-default">
        <div class="panel-header" style="margin:2%">
            <h4>Detail Laporan Material</h4>
        </div>
            <div class="panel-body">
            <form action="">
                <div class="form-group">
                    <label>Tanggal</label>
                    <input class="form-control" name="material_report_date" type="date" id="modal-add-material_report-date"  value="{{ date_format($data->material_report_date,'Y-m-d') }}" readonly>
                </div>
                <div class="form-group">
                    <label class="mr-1">Tipe: </label>
                    <select class="form-control" name="material_type_id" readonly>
                        @foreach($materialTypes as $materialType)
                            <option value="{{$materialType->material_type_id}}" {{ ($data->material_type_id == $materialType->material_type_id) ? 'selected' : '' }}>{{$materialType->material_type_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Material</label>
                    <input class="form-control" name="material_name" readonly value="{{ $data->material_name}}" type="text" id="modal-add-material_report-description">
                </div>
                <div class="form-group">
                    <label class="mr-1">Unit: </label>
                    <select class="form-control" name="material_unit_id" readonly>
                        @foreach($materialUnits as $materialUnit)
                            <option value="{{$materialUnit->material_unit_id}}" {{ ($data->material_unit_id == $materialType->material_unit_id) ? 'selected' : '' }}>{{$materialUnit->material_unit_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Harga Satuan</label>
                    <input class="form-control" name="material_cost_unit" type="number" readonly value="{{ $data->material_cost_unit}}" id="modal-add-material_report-description">
                </div>
                <div class="form-group">
                    <label>Qty</label>
                    <input class="form-control" name="material_qty" type="number" readonly value="{{ $data->material_qty}}" id="modal-add-material_report-description">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input class="form-control" name="material_desc" type="text" readonly value="{{ $data->material_desc}}" id="modal-add-material_report-description">
                </div>
                    <div class="form-group">
                        <label>Status</label>
                        @php
                            if($data->status == '1'){
                                $status = 'telah diverifikasi';
                            }
                            if($data->status == 2){
                                $status = 'ditolak admin';
                            }
                            if($data->status == 0){
                                $status = 'belum diverifikasi';
                            }
                        @endphp
                        <input class="form-control status" readonly type="text" value="{{ $status}}" id="modal-detail-keuangan-lapangan-status" disbaled>
                    </div>
                    <div class="text-right">
                        @php
                        if(Auth::user()->role_id == 1  && $data->status == 0){
                            $verif = 1;
                            $tolak = 2;
                        @endphp
                        <a href="{{ url('/projects/'.$data->material_report_id.'/'.$tolak.'/'.$data->project_id.'/verify-material') }}">
                            <button type="button" class="btn btn-danger">Tolak</button>
                        </a>
                        <a href="{{ url('/projects/'.$data->material_report_id.'/'.$verif.'/'.$data->project_id.'/verify-material') }}">
                            <button type="button" class="btn btn-primary">Verifikasi</button>
                        </a>
                        @php }else{ @endphp
                            <a href="{{ url('/projects/'.$data->project_id.'/laporan-material') }}">
                                <button type="button" class="btn btn-primary">Kembali</button>
                            </a>
                        @php } @endphp
                    </div>
                </form>
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
       
    </script>
@endsection

<div id="modal-add-material_report" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4>Detail Keuangan Lapangan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" name="material_report_date" type="date" id="modal-add-material_report-date">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" name="material_name" type="text" id="modal-add-material_report-description">
                    </div>
                    <div class="form-group">
                        <label>Debit</label>
                        <input class="form-control" name="material_cost_unit" type="number" id="modal-add-material_report-description">
                    </div>
                    <div class="form-group">
                        <label>Kredit</label>
                        <input class="form-control" name="material_qty" type="number" id="modal-add-material_report-description">
                    </div>
                    <div class="form-group">
                        <label>Saldo Terakhir</label>
                        <input class="form-control" name="material_desc" type="text" id="modal-add-material_report-description">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
