<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{
    //

    public function index() {
        return view("project-type.index");
    }
}
