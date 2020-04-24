<?php

namespace App\Http\Controllers;

use App\Clientinfo;
use Illuminate\Http\Request;

class ClientinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allclients = Clientinfo::all();
        return view('admin.pages.clients.allclients', compact('allclients') );
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
     * @param  \App\Clientinfo  $clientinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Clientinfo $clientinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientinfo  $clientinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientinfo $clientinfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientinfo  $clientinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientinfo $clientinfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientinfo  $clientinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientinfo $clientinfo)
    {
        //
    }
}
