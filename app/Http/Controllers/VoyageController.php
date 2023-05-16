<?php

namespace App\Http\Controllers;

use App\Models\bus;
use App\Models\User;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voyages = Voyage::all();
        return view('admin.voyages.index',compact('voyages'));
        return view('student.timetable', compact('voyages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers =DB::select('select * from users where role_id=2');
        $buses= DB::select('select * from buses where dispo=0 ') ;
        return view('admin.voyages.create',compact('drivers','buses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newVoyage = new Voyage();

        $newVoyage->destination =$request->destination;
        $newVoyage->driver_id = $request->driver_id;
        $newVoyage->bus_id = $request->bus_id;
        $newVoyage->heure_depart = $request->heure_depart;
        $newVoyage->heure_arrive = $request->heure_depart;
        $newVoyage->bus_postion = 0;
        $newVoyage->en_route = 0;
        $newVoyage->save();
        return redirect()->back()->with('success','Bus added Successfully');

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voyage= Voyage::with('bus','users')->findOrFail($id);
        return view('admin.voyages.show',compact('voyage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voyage = Voyage::findOrFail($id);
        $voyage->delete();
        return redirect()->route('admin.voyages.index')->with('success','Travel Deleted Successfully');
    }
}
