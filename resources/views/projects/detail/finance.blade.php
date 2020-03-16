<div class="panel panel-default">
    <div class="panel-body">
        <div class="row m-2">
            <div class="col-md-4">
                <div class="row">
                    <div class="mr-2 mt-1">
                        <label>Pilihan</label>
                    </div>
                    <div>
                        <select name="" id="" class="form-control">
                            <option value="">Keuangan Lapangan</option>
                            <option value="">Keuangan Lapangan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 mt-1">
                        <div class="row">
                            <div class="mt-1 mr-2">Dari:</div>
                            <div>
                                <input type="date" id="date-from" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-1">
                        <div class="row">
                            <div class="mt-1 mr-2">Sampai:</div>
                            <div>
                                <input type="date" id="date-to" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#modal-add-transaction"
                        >Tambah baru</button>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="data-row">
                        <td class="date">10/10/2020</td>
                        <td class="description">Pemasukan dari kantor</td>
                        <td class="debit-amount">Rp. <span>-</span></td>
                        <td class="kredit-amount">Rp. <span>{{ number_format(2000000, 0, ",", ".") }}</span></td>
                        <td class="last-deposit">Rp. <span>{{ number_format(2000000, 0, ",", ".") }}</span></td>
                        <td>
                            <i class="fas fa-pencil-alt mr-2" style="cursor: pointer;" id="edit-item"></i>
                            <i class="fas fa-trash" style="cursor: pointer;" id="delete-item"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('projects.detail.modal.modal-add-transaction')
@include('projects.detail.modal.modal-edit-transaction')

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
    </script>
@endsection