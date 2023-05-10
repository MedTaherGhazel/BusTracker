<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusController extends Controller
{
    public function buses ()
    {
        return view('admin.addbus');
    }
}
