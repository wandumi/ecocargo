<?php

namespace App\Http\Controllers;

use App\City;
use App\Fleet;
use App\State;
use App\Country;
use App\Clientinfo;
use Illuminate\Http\Request;

class FleetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $city = City::all();
        $state = State::all();
        $sender = Clientinfo::where('client_type','=',0)->get();
        $receiver = Clientinfo::where('client_type','=',1)->get();

        return view("front.fleet", compact('countries', 'city', 'state', 'allclientsinfo', 'sender', 'receiver') );
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
        // return $request->all();
        request()->validate([
            'countries' => 'required',
            'states' => 'required',
            'cities' => 'required',
            'services' => 'required',            
            'date' => 'required'
        ]);

        $fleet = new Fleet;
        $fleet->country_id = $request->countries;
        $fleet->state_id = $request->states;
        $fleet->city_id = $request->cities;
        $fleet->sender_id = $request->sender;
        $fleet->receiver_id = $request->receiver;
        $fleet->service = $request->services;
        $fleet->date = $request->date;
        $fleet->order_note = $request->order_note;
        $fleet->save();

        return response()->json('saved', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function show(Fleet $fleet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function edit(Fleet $fleet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fleet $fleet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fleet $fleet)
    {
        //
    }
}
