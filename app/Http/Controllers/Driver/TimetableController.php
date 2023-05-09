<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;

class TimetableController extends Controller
{
    public function index()
    {
        return view('driver.timetable');
    }
}
