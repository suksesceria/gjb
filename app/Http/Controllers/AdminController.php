<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MyEvent;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = Auth::user()->projects;
        return view('dashboard', compact(['data']));
    }

    public function testNotif()
    {
        $data = Auth::user()->projects;
        return view('test', compact(['data']));
    }
}
