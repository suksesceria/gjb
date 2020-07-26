
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="panel panel-default">
        <div class="panel-header" style="margin:2%">
            <h4>Detail Stock Material</h4>
        </div>
            <div class="panel-body">
            <form action="">
                <div class="form-group">
                    <label>Tanggal</label>
                    <input class="form-control" name="material_use_date" type="date" id="modal-add-material_use-date"  value="{{ date_format($data->material_use_date,'Y-m-d') }}" readonly>
                </div>
                <div class="form-group">
                    <label class="mr-1">Material Report: </label>
                    <select class="form-control" name="material_report_id" disabled>
                        @foreach($materialReport as $row)
                            <option value="{{$row->material_report_id}}"  {{ ($data->material_report_id == $row->material_report_id) ? 'selected' : '' }}>{{$row->material_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nama Material</label>
                    <input class="form-control" name="material_name" readonly value="{{ $data->material_report->material_name}}" type="text" id="modal-add-material_use-description">
                </div>
                <div class="form-group">
                    <label>Harga Satuan</label>
                    <input class="form-control" name="material_cost_unit" type="number" readonly value="{{ $data->material_report->material_cost_unit}}" id="modal-add-material_use-description">
                </div>
                <div class="form-group">
                    <label>Qty</label>
                    <input class="form-control" name="material_qty" type="number" readonly value="{{ $data->material_qty}}" id="modal-add-material_use-description">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input class="form-control" name="material_desc" type="text" readonly value="{{ $data->desc}}" id="modal-add-material_use-description">
                </div>
                    <div class="form-group">
                        <label>Status</label>
                        @php
                            if($data->status == 1){
                                $status = 'telah diverifikasi';
                            }
                            else if($data->status == 2){
                                $status = 'ditolak admin';
                            }
                           else{
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
                        <a href="{{ url('/projects/'.$data->material_use_id.'/'.$tolak.'/'.$data->project_id.'/verify-material-use') }}">
                            <button type="button" class="btn btn-danger">Tolak</button>
                        </a>
                        <a href="{{ url('/projects/'.$data->material_use_id.'/'.$verif.'/'.$data->project_id.'/verify-material-use') }}">
                            <button type="button" class="btn btn-primary">Verifikasi</button>
                        </a>
                        @php }else{ @endphp
                            <a href="{{ url('/projects/'.$data->project_id.'/laporan-material-use') }}">
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

<div id="modal-add-material_use" class="modal fade" role="dialog">
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
                        <input class="form-control" name="material_use_date" type="date" id="modal-add-material_use-date">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" name="material_name" type="text" id="modal-add-material_use-description">
                    </div>
                    <div class="form-group">
                        <label>Debit</label>
                        <input class="form-control" name="material_cost_unit" type="number" id="modal-add-material_use-description">
                    </div>
                    <div class="form-group">
                        <label>Kredit</label>
                        <input class="form-control" name="material_qty" type="number" id="modal-add-material_use-description">
                    </div>
                    <div class="form-group">
                        <label>Saldo Terakhir</label>
                        <input class="form-control" name="material_desc" type="text" id="modal-add-material_use-description">
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
