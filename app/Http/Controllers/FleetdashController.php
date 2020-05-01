<?php

namespace App\Http\Controllers;

use App\Fleet;
use App\Country;
use App\State;
use App\City;
use Illuminate\Http\Request;

class FleetdashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allFleets = Fleet::latest()->get();
        $countries = Country::all();
        $ctate = State::all();
        $cities = City::all();

        return view('admin.pages.fleet.fleetdash', compact('allFleets', 'countries', 'state', 'cities') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fleet = Fleet::where('id',$id)->first();
        $countries = Country::all();
        $cities = City::all();
        $states = State::all();

        return view('admin.pages.fleet.showFleet', compact('fleet','countries','cities','states') );
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
        //
    }
}
