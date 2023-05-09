<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function users ()
    {
        return view('admin.users');
    }
    public function buses ()
    {
        return view('admin.addbus');
    }

}
