<?php

namespace App\Http\Controllers;

use App\Notifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{

    public function index()
    {
        $data = Notifications::orderBy('id_notif', 'desc')->get();
        // dd($data);
        return view("notifications.index", compact(['data']));
    }


}
