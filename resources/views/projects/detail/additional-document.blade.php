<div class="panel panel-default">
    <div class="panel-body">
        <div class="row m-2">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <button class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modal-add-supporting_document"
                >Tambah baru</button>
            </div>
        </div>
        <div class="overflow-x">
            <table class="table">
                <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @if($supportingDocuments->count())
                        @foreach($supportingDocuments as $supportingDocument)
                            <tr class="data-row">
                                <td class="date">{{$supportingDocument->supporting_document_upload_date->format('d/m/Y')}}</td>
                                <td class="description">{{ $supportingDocument->supporting_document_name }}</td>
                                <td class="debit-amount"><a href="{{ url('storages/'. $supportingDocument->supporting_document_path) }}">{{ $supportingDocument->supporting_document_path }}</a></td>
                                <td>
                                    <i class="fas fa-trash" style="cursor: pointer;" id="delete-item"></i>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="data-row">
                            <td colspan="4" align="center">Data tidak ditemukan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('projects.detail.modal.modal-add-supporting_document')

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

                $('#modal-edit-supporting_document').modal('show');
            });

            $('#modal-edit-supporting_document').on('show.bs.modal', function() {
                var element = $('.edit-item-trigger-clicked');
                var row = element.closest('.data-row');

                var date = row.children('.date').text();
                var description = row.children('.description').text();
                var debitAmount = row.children('.debit-amount').children('span').text();
                var kreditAmount = row.children('.kredit-amount').children('span').text();

                $('#modal-edit-supporting_document-date').val(date);
                $('#modal-edit-supporting_document-description').val(description);

                if (debitAmount != '-') {
                    $('#modal-edit-supporting_document-total').val(debitAmount.split('.').join(''));
                    $('#modal-edit-debit').prop("checked", true);
                } else if (kreditAmount != '-') {
                    $('#modal-edit-supporting_document-total').val(kreditAmount.split('.').join(''));
                    $('#modal-edit-kredit').prop("checked", true);
                }

            });
        });

        function changeRoute(e) {
            window.location.href = e;
        };
    </script>
@endsection
