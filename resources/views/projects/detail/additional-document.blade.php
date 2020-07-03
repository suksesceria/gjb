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
                                    <a href="/projects/{{Request::route('id')}}/dokumen-pendukung/{{ $supportingDocument->supporting_document_id }}/delete"><i class="fas fa-trash" style="cursor: pointer;" id="delete-item"></i></a>
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

