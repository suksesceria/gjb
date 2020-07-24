<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $notification;
    public function __construct(Notifications $notification)
    {
        $this->middleware('auth');
        $this->notification = $notification;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getNotif()
    {
        $notif = $this->notification->getNotifByRole();
        $data ="";
        if(empty($notif)){
            $data = "<li>Tidak ada notifikasi terbaru</li>";
        }
        else
        {
            foreach($notif as $row)
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
                }else{

                }
                if($row->id_href_segment2){
                    $data .= "<li>"."<a href=".url('$row->href').">";
                    // dd($data);
                }else{
                    if($row->href){
                        $data .= "<li>"."<a href=".url( $row->href).">";
                        
                    }
                }
                $huruf_maksimal=100;
                $jml_karakter = strlen($row->data);
                $kalimat = substr($row->data, 0, $huruf_maksimal);
                if($jml_karakter > $huruf_maksimal)
                {
                    $data .= "<li style='z-index=999999999999; display:block'>".$kalimat."...</li>";
                }
                if($jml_karakter <= $huruf_maksimal)
                {
                    $data .= $row->data;
                }
                if($row->href){
                    $data .= "</a>"."</li>";
                }
                $data .=  "
                    <i class='far fa-clock'></i>
                    <span align = 'right' style = 'font-size: 10px;'>".$waktu."</span>
                    <hr style = 'margin-left: -10px;'>
                ";
            }
        }
        
        // dd($data);
        echo  $data;
    }
    public function getSemuaNotif()
    {
        $notif = $this->notification->getNotifSemua();
        
        // dd($notif);
        return view('notifikasi.index', ['notif' =>$notif]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        $notif =  $this->notification->getNotifcount();
        // dd($notif);
        return $notif;
    }
}
