<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Auth;

class Notifications extends Model
{
    use SoftDeletes;
    protected $table = 'notifications';
    protected $primaryKey = 'id_notif';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_notif', 'type', 'notifiable_type', 'notifiable_id', 'data', 'read_at', 'created_at', 'updated_at','href', 'id_href', 'id_href_segment2',
    ];


    public function getNotifByRole(){
        $notif =  DB::table('notifications')
                    ->select('notifications.*')
                    ->where('notifications.notifiable_id',Auth::user()->role_id)
                    ->where('notifications.read_at',null)
                    ->orderBy('notifications.created_at', 'DESC')
                    ->take(5)
                    ->get();
        return $notif->toArray();
    }
    public function getNotifSemua(){
        $notif =  DB::table('notifications')
                    ->select('notifications.*')
                    ->where('notifications.notifiable_id',Auth::user()->role_id)
                    ->orderBy('notifications.created_at', 'DESC')
                    ->get();
        return $notif->toArray();
    }

    public function getNotifcount(){
        $notif =  DB::table('notifications')
                    ->select('notifications.*')
                    ->where('notifications.notifiable_id',Auth::user()->role_id)
                    ->where('notifications.read_at',null)
                    ->orderBy('notifications.created_at', 'DESC')
                    ->count();
        return $notif;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
