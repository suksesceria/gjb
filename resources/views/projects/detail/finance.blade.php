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
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-1">
                        <div class="row">
                            <div class="mt-1 mr-2">Sampai:</div>
                            <div>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary">Tambah baru</button>
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
                    <tr>
                        <td>10/10/2020</td>
                        <td>Pemasukan dari kantor</td>
                        <td>Rp. {{ number_format(2000000, 0, ",", ".") }}</td>
                        <td>Rp. {{ number_format(2000000, 0, ",", ".") }}</td>
                        <td>Rp. {{ number_format(2000000, 0, ",", ".") }}</td>
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