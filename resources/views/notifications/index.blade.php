@extends('layouts.master')

@section('content')
<!-- style semua notif -->
<style>
    .semua_notif
    {
        margin-left: 60px;
        margin-top: 90px;
        font-weight: bold;
    }
    .notif 
    {
        width: auto;
        height: 63px;;
        border: 15px;
        background: #edf2fa;
        padding: 10px;
        margin: 0px;
        font-weight: 600;
    }
	.notif_baca
    {
        background: #fbfbfb;;
		width: auto;
        height: 63px;
        border: 15px;
        /* background: #fff; */
        padding: 10px;
        margin: 0px;
        font-weight: 600;
    }
    .notif hr
    {
        margin-left: -10px;
        width: auto;
        padding: 0 0 0 0;
    }
    .notif_baca hr
    {
        margin-left: -10px;
        width: auto;
        padding: 0 0 0 0;
    }
	.notif span
    {
        font-size: 10px;
    }
    .notif_baca span
    {
        font-size: 10px;
    }
	.m-aside-menu .m-menu__nav 
	{
    	padding: 18px 0 30px 0;
    	margin-top: 30px;
	}
</style>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-header" style="margin-top: 3%;margin-left: 3%;margin-bottom: -3%;">
                <h4>Semua notifikasi</h4>
            </div>
            <div class="panel-body">
            <center>
                    <?php //if(empty($data)) 
                      //  echo "<div class = 'notif'>Tidak ada notifikasi terbaru</div>";
                    ?>
                </center>
                <?php
                    // if($data)
                    // {
                        foreach($data as $row)
                        {
                            $date = $row->created_at;
                            $awal  = date_create($date);
                            $akhir = date_create(); // waktu sekarang
                            $diff  = date_diff( $awal, $akhir );
                            if($diff->y)
                            { 
                                $waktu = $diff->y . ' tahun yang lalu'; 
                            }
                            else if($diff->m)
                            {
                                $waktu = $diff->m . ' bulan yang lalu';
                            }
                            else if($diff->d)
                            {
                                $waktu = $diff->d . ' hari yang lalu';
                            }
                            else if($diff->h)
                            {
                                $waktu = $diff->h . ' jam yang lalu';
                            }
                            else if($diff->i)
                            {
                                $waktu = $diff->i . ' menit yang lalu';
                            }
                            else if($diff->s)
                            {
                                $waktu = $diff->s . ' detik yang lalu';
                            }
                            // if($row->read_at)
                            // {	
                                echo "<div class = 'notif_baca'>";
                                if($row->id_href_segment2)
                                {
                                    echo"<li style=' list-style-type: none;'>"."<a href=".url( $row->href).">";
                                    echo "<a href=".url($row->href, [$row->id_href, $row->id_href_segment2, 'n_'.$row->id_notif]).">";
                                    echo $row->data;
                                    echo "</a>";
                                    echo "
                                    <br>
                                    <i class='far fa-clock'></i>
                                    <span>".$waktu."</span>";
                                }
                                else
                                {
                                    if($row->href)
                                    {
                                        echo "<li style=' list-style-type: none;'>"."<a href=".url( $row->href).">";
                                    }
                                    echo $row->data;
                                    if($row->href) { echo "</a>"; }
                                    echo "
                                    <br>
                                    <i class='far fa-clock'></i>
                                    <span>".$waktu."</span>";
                                }
                                echo "<br><hr>";
                                echo "</div>";
                            // }
                        }
                    // }
                    ?>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('#modal-edit-material-type').on('show.bs.modal', function() {
            var element = $('.edit-item-trigger-clicked');
            var row = element.closest('.data-row');

            var typeProyek = row.children('.type').text();

            $('#edit-type-proyek').val(typeProyek);
        });

        $('#modal-edit-material-type').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        });

        function editItem(data) {
            $('#'+data.material_type_id).addClass('edit-item-trigger-clicked');
            $('#edit-material_type_name').val(data.material_type_name);
            $('#edit-material_type_id').val(data.material_type_id);
            $('#modal-edit-material-type').modal('show');
        }

        function deleteItem(id) {
            $('#delete-material_type_id').val(id);
            $('#form-delete-material_type_id').submit();
        }
    </script>
@endsection
