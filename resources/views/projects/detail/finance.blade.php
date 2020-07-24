<div class="panel panel-default">
    <div class="panel-body">
        <div class="row m-2">
            <div class="col-md-3">
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
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-9">
                        <form class="form-inline">
                            <div class="form-row">
                                <div class="col" style="align-self: center">
                                    Dari:
                                </div>
                                <div class="col">
                                    <input type="date" id="date-from" name="date-from" class="form-control">
                                </div>
                                <div class="col" style="align-self: center">
                                    Sampai:
                                </div>
                                <div class="col">
                                    <input type="date" id="date-to" name="date-to" class="form-control">
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#modal-add-transaction"
                                style="float:right;"
                        ><i class="fa fa-plus" aria-hidden="true"></i>Tambah baru</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Saldo Terakhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->count())
                        <?php
                        $totalKredit = 0;
                        $totalDebit = 0;
                        $total = 0;
                        ?>
                        @foreach($data as $datum)
                            <?php
                                $debit = $datum->cost_report_cashflow ? $datum->cost_expense : 0;
                                $kredit = !$datum->cost_report_cashflow ? $datum->cost_expense : 0;
                                if($datum->status == 1){
                                    $totalDebit += $debit;
                                    $totalKredit += $kredit;
                                    $total = $datum->balance;
                                }
                                if ($datum instanceof \App\CostReportOffice){
                                    $id = $datum->cost_report_office_id;
                                    $desc = $datum->cost_report_office_desc;
                                    $date = $datum->cost_report_office_date;
                                } else {
                                    $id = $datum->cost_report_realtime_id;
                                    $desc = $datum->cost_report_realtime_desc;
                                    $date = $datum->cost_report_realtime_date;
                                }
                            ?>
                            <tr class="data-row">
                                <td class="date">{{$date->format('d-m-Y')}}</td>
                                <td class="description">{{$desc}}</td>
                                <td class="debit-amount">Rp. <span>{{ number_format($debit, 0, ",", ".") }}</span></td>
                                <td class="kredit-amount">Rp. <span>{{ number_format($kredit, 0, ",", ".") }}</span></td>
                                <td class="last-deposit">Rp. <span>{{ number_format($datum->balance, 0, ",", ".") }}</span></td>
                                <?php
                                    if($datum->status == 1){
                                        $status = 'telah diverifikasi';
                                    }else if($datum->status == 2){
                                        $status = 'ditolak admin';
                                    }else{
                                        $status = 'belum diverifikasi';
                                    }
                                ?>
                                <td class="status">{{ $status }}</td>
                                <td>
                                  <?php  if($menu == 'keuangan'){ ?>
                                       <a href="{{ url('/projects/'.$id.'/detail-keuangan') }}"> <i class="fa fa-search mr-2" style="cursor: pointer;" id="{{ $id }}" ></i></a>
                                  <?php  } ?>
                                  <?php  if($menu == 'keuangan-nyata'){ ?>
                                       <a href="{{ url('/projects/'.$id.'/detail-realtime') }}"> <i class="fa fa-search mr-2" style="cursor: pointer;" id="{{ $id }}" ></i></a>
                                  <?php  } ?>
{{--                                    <i class="fas fa-trash" style="cursor: pointer;" id="delete-item"></i>--}}
                                </td>
                            </tr>
                        @endforeach
                        <tr class="data-row">
                            <td class="date"></td>
                            <td class="description"><b>TOTAL</b></td>
                            <td class="debit-amount"><b>Rp. <span>{{ number_format($totalDebit, 0, ",", ".") }}</span></b></td>
                            <td class="kredit-amount"><b>Rp. <span>{{ number_format($totalKredit, 0, ",", ".") }}</span></b></td>
                            <td class="last-deposit"><b>Rp. <span>{{ number_format($total, 0, ",", ".") }}</span></b></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @else
                        <tr class="data-row">
                            <td class="date" colspan="7">Data tidak ditemukan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('projects.detail.modal.modal-add-transaction')
@include('projects.detail.modal.modal-edit-transaction')
@include('projects.detail.modal.modal-detail-keuangan-lapangan')

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

                $('#modal-edit-transaction').modal('show');
            });

            $('#modal-edit-transaction').on('show.bs.modal', function() {
                var element = $('.edit-item-trigger-clicked');
                var row = element.closest('.data-row');

                var date = row.children('.date').text();
                var description = row.children('.description').text();
                var debitAmount = row.children('.debit-amount').children('span').text();
                var kreditAmount = row.children('.kredit-amount').children('span').text();

                $('#modal-edit-transaction-date').val(date);
                $('#modal-edit-transaction-description').val(description);

                if (debitAmount != '-') {
                    $('#modal-edit-transaction-total').val(debitAmount.split('.').join(''));
                    $('#modal-edit-debit').prop("checked", true);
                } else if (kreditAmount != '-') {
                    $('#modal-edit-transaction-total').val(kreditAmount.split('.').join(''));
                    $('#modal-edit-kredit').prop("checked", true);
                }

            });
        });

        function changeRoute(e) {
            window.location.href = e;
        };
    </script>
@endsection
