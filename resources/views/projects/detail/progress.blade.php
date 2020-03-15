<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                PROGRESS PLAN
            </div>
            <div class="col-md-6 detail-progress">
                <div class="row">
                    <div class="col-md-4 mt-2">
                        Start Date: 13/12/2020
                    </div>
                    <div class="col-md-4 mt-2">
                        Send Date: 13/12/2020
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary"
                                data-toggle="modal"
                                data-target="#modal-edit-project"
                        >Edit Projek</button>
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow-y: auto">
            <table class="table" style="width: 100%; font-size: 12px">
                <thead>
                <tr>
                    <th rowspan="3" class="text-center">NO</th>
                    <th rowspan="3" class="text-center">URAIAN PEKERJAAN</th>
                    <th rowspan="3" class="text-center">JUMLAH HARGA (RP.)</th>
                    <th rowspan="3" class="text-center">BOBOT (%)</th>
                    <th colspan="48" class="text-center">WAKTU PELAKSANAAN</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">Januari</th>
                </tr>
                <tr>
                    <th class="text-center">1</th>
                    <th class="text-center">2</th>
                    <th class="text-center">3</th>
                    <th class="text-center">4</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td>Membangun atap</td>
                    <td>{{ number_format(2000000, 0, ",", ".") }}</td>
                    <td>3.0</td>
                    <td>
                        <div class="text-center">
                            3.2
                        </div>
                        <div style="background-color: red; width: 100%; height: 1em; border-radius: 5px"></div>
                    </td>
                    <td>
                        <div class="text-center">
                            3.2
                        </div>
                        <div style="background-color: red; width: 100%; height: 1em; border-radius: 5px"></div>
                    </td>
                    <td>
                        <div class="text-center">
                            3.2
                        </div>
                        <div style="background-color: red; width: 100%; height: 1em; border-radius: 5px"></div>
                    </td>
                    <td>
                        <div class="text-center">
                            3.2
                        </div>
                        <div style="background-color: red; width: 100%; height: 1em; border-radius: 5px"></div>
                    </td>
                </tr>
                <tr id="total" class="text-center">
                    <td colspan="2" align="right">Jumlah</td>
                    <td>{{ number_format(2000000, 0, ',', '.') }}</td>
                    <td>3.0</td>
                    <td colspan="48"></td>
                </tr>
                <tr class="text-center">
                    <td colspan="3">Rencana Progress Mingguan (%)</td>
                    <td></td>
                    <td>3.2</td>
                    <td>3.2</td>
                    <td>3.2</td>
                    <td>3.2</td>
                </tr>
                <tr class="text-center">
                    <td colspan="3">Komulatif Progress Mingguan (%)</td>
                    <td></td>
                    <td>3.2</td>
                    <td>3.2</td>
                    <td>3.2</td>
                    <td>3.2</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                PROGRESS REAL
            </div>
            <div class="col-md-6 detail-progress">
                <div class="row">
                    <div class="col-md-4 mt-2">
                        Start Date: 13/12/2020
                    </div>
                    <div class="col-md-4 mt-2">
                        End Date: -
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow-y: auto">
            <table class="table" style="width: 100%; font-size: 12px">
                <thead>
                <tr>
                    <th rowspan="3" class="text-center">NO</th>
                    <th rowspan="3" class="text-center">URAIAN PEKERJAAN</th>
                    <th rowspan="3" class="text-center">JUMLAH HARGA (RP.)</th>
                    <th rowspan="3" class="text-center">BOBOT (%)</th>
                    <th colspan="48" class="text-center">WAKTU PELAKSANAAN</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">Januari</th>
                </tr>
                <tr>
                    <th class="text-center">1</th>
                    <th class="text-center">2</th>
                    <th class="text-center">3</th>
                    <th class="text-center">4</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td>Membangun atap</td>
                    <td>{{ number_format(2000000, 0, ",", ".") }}</td>
                    <td>3.0</td>
                    <td>
                        <div class="text-center">
                            3.2
                        </div>
                        <div style="background-color: red; width: 100%; height: 1em; border-radius: 5px"></div>
                    </td>
                    <td>
                        <div class="text-center">
                            3.2
                        </div>
                        <div style="background-color: red; width: 100%; height: 1em; border-radius: 5px"></div>
                    </td>
                    <td>
                        <div class="text-center">
                            3.2
                        </div>
                        <div style="background-color: red; width: 100%; height: 1em; border-radius: 5px"></div>
                    </td>
                    <td>
                        <div class="text-center">
                            3.2
                        </div>
                        <div style="background-color: red; width: 100%; height: 1em; border-radius: 5px"></div>
                    </td>
                </tr>
                <tr id="total" class="text-center">
                    <td colspan="2" align="right">Jumlah</td>
                    <td>{{ number_format(2000000, 0, ',', '.') }}</td>
                    <td>3.0</td>
                    <td colspan="48"></td>
                </tr>
                <tr class="text-center">
                    <td colspan="3">Rencana Progress Mingguan (%)</td>
                    <td></td>
                    <td>3.2</td>
                    <td>3.2</td>
                    <td>3.2</td>
                    <td>3.2</td>
                </tr>
                <tr class="text-center">
                    <td colspan="3">Komulatif Progress Mingguan (%)</td>
                    <td></td>
                    <td>3.2</td>
                    <td>3.2</td>
                    <td>3.2</td>
                    <td>3.2</td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        PROGRESS REAL - WEEKLY
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary float-right"
                                data-target="#modal-add-progress-weekly"
                                data-toggle="modal"
                        >Tambah</button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div style="overflow-y: auto">
                    <table class="table" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Item Pekerjaan</th>
                                <th>Progress Update</th>
                                <th>Deskripsi Progress</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="data-row">
                                <td class="date">13/02/2020</td>
                                <td class="item">Selokan</td>
                                <td class="progress-update">0.25</td>
                                <td class="progress-description">Tahap Awal</td>
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
    </div>
</div>

@include('projects.detail.modal.modal-edit-progress-weekly')
@include('projects.detail.modal.modal-add-progress-weekly')
@include('projects.detail.modal.modal-edit-project')

@section('script')
    <script>
        $(document).ready(function() {
            $('#edit-item').click(function() {
                console.log("edit");
                $(this).addClass('edit-item-trigger-clicked');

                $('#modal-edit-progress-weekly').modal('show');
            });

            $('#modal-edit-progress-weekly').on('show.bs.modal', function() {
                var element = $('.edit-item-trigger-clicked');
                var row = element.closest('.data-row');

                var date = row.children('.date').text();
                var item = row.children('.item').text();
                var progressUpdate = row.children('.progress-update').text();
                var progressDescription = row.children('.progress-description').text();

                $('#modal-progress-weekly-date').val(date);
                $('#modal-progress-weekly-substep').val(item);
                $('#modal-progress-weekly-progress-update').val(progressUpdate);
                $('#modal-progress-weekly-progress-description').val(progressDescription);
            });
        });
    </script>
@endsection