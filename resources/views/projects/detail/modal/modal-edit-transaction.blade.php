<div id="modal-edit-transaction" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" type="date" id="modal-edit-transaction-date">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input class="form-control" type="text" id="modal-edit-transaction-description">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input class="form-control" type="text" id="modal-edit-transaction-total">
                    </div>
                    <div class="form-group">
                        <label class="mr-1">Jenis Transaksi: </label>
                        <input type="radio" id="modal-edit-debit" value="debit" name="payment-type">
                        <label for="debit" class="mr-1">Debit</label>
                        <input type="radio" id="modal-edit-kredit" value="kredit" name="payment-type">
                        <label for="kredit">Kredit</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Edit</button>
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