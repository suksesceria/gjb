<div id="modal-edit-progress-weekly" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Progress Mingguan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/projects/{{$project->project_id}}/progress/update" method="post">
                    @csrf
                    <input type="hidden" name="progress_id" id="modal-progress-weekly-id">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input class="form-control" name="progress_date" type="date" id="modal-progress-weekly-date">
                    </div>
                    <div class="form-group">
                        <label>Minggu ke-</label>
                        <input class="form-control" name="week" type="number" id="modal-progress-weekly-week">
                    </div>
                    <div class="form-group">
                        <label>Item Pekerjaan</label>
                        <select name="project_substep_id" class="form-control" id="modal-progress-weekly-week-project_substep_id">
                            @foreach($project->substeps as $projectSubStep)
                                <option value="{{$projectSubStep->project_substep_id}}">{{$projectSubStep->project_substep_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Progress Update</label>
                        <input class="form-control" name="progress_add" type="number" id="modal-progress-weekly-progress-update">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Progress</label>
                        <input class="form-control" name="progress_desc" type="text" id="modal-progress-weekly-progress-description">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
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
