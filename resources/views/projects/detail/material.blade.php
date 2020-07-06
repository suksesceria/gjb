<div class="panel panel-default">
    <div class="panel-body">
        <div class="row m-2">
            <div class="col-md-4">
                <div class="row">
                    <div class="mr-2 mt-1">
                        <label>Pilihan</label>
                    </div>
                    <div>
                        <?php $menu = request()->segment(count(request()->segments())); ?>
                        <select name="" id="" class="form-control" onchange="changeRoute(this.value)">
                            <option value="keuangan" {{ $menu == 'keuangan' ? 'selected' : '' }}>Keuangan Lapangan</option>
                            <option value="keuangan-nyata" {{ $menu == 'keuangan-nyata' ? 'selected' : '' }}>Keuangan Kantor</option>
                            <option value="laporan-material" {{ $menu == 'laporan-material' ? 'selected' : '' }}>Laporan Material</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
{{--                    <div class="col-md-4 mt-1">--}}
{{--                        <div class="row">--}}
{{--                            <div class="mt-1 mr-2">Dari:</div>--}}
{{--                            <div>--}}
{{--                                <input type="date" id="date-from" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-5 mt-1">--}}
{{--                        <div class="row">--}}
{{--                            <div class="mt-1 mr-2">Sampai:</div>--}}
{{--                            <div>--}}
{{--                                <input type="date" id="date-to" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                        <button class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#modal-add-material_report"
                        >Tambah baru</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Uraian</th>
                        <th>Kode</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
{{--                        <th>Aksi</th>--}}
                    </tr>
                </thead>
                <tbody>
                    @if($data->count())
                        @foreach($data as $index => $datum)
                            <tr class="data-row">
                                <td>{{$index + 1}}</td>
                                <td>{{$datum->material_name}}</td>
                                <td>{{$datum->material_code}}</td>
                                <td>{{$datum->unit->material_unit_name}}</td>
                                <td>{{$datum->material_qty}}</td>
                                <td>Rp. <span>{{ number_format($datum->material_cost_unit, 0, ",", ".") }}</span></td>
                                <td>Rp. <span>{{ number_format(($datum->material_cost_unit * $datum->material_qty), 0, ",", ".") }}</span></td>
                                <td class="date">{{$datum->material_report_date->format('d-m-Y')}}</td>
                                <td class="description">{{$datum->material_desc}}</td>
{{--                                <td>--}}
{{--                                    <i class="fas fa-pencil-alt mr-2" style="cursor: pointer;" id="edit-item"></i>--}}
{{--                                    <i class="fas fa-trash" style="cursor: pointer;" id="delete-item"></i>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                    @else
                        <tr class="data-row">
                            <td class="date" colspan="9">Data tidak ditemukan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('projects.detail.modal.modal-add-material_report')

@section('script')
    <script>
        $(document).ready(function() {
            var date = new Date();

            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;

            var today = year + "-" + month + "-" + day;

            $("#date-from").attr('value', today);
            $("#date-to").attr('value', today);

            $('#edit-item').click(function() {
                console.log("edit");
                $(this).addClass('edit-item-trigger-clicked');

                $('#modal-edit-material_report').modal('show');
            });

            $('#modal-edit-material_report').on('show.bs.modal', function() {
                var element = $('.edit-item-trigger-clicked');
                var row = element.closest('.data-row');

                var date = row.children('.date').text();
                var description = row.children('.description').text();
                var debitAmount = row.children('.debit-amount').children('span').text();
                var kreditAmount = row.children('.kredit-amount').children('span').text();

                $('#modal-edit-material_report-date').val(date);
                $('#modal-edit-material_report-description').val(description);

                if (debitAmount != '-') {
                    $('#modal-edit-material_report-total').val(debitAmount.split('.').join(''));
                    $('#modal-edit-debit').prop("checked", true);
                } else if (kreditAmount != '-') {
                    $('#modal-edit-material_report-total').val(kreditAmount.split('.').join(''));
                    $('#modal-edit-kredit').prop("checked", true);
                }

            });
        });

        function changeRoute(e) {
            window.location.href = e;
        };
    </script>
@endsection
