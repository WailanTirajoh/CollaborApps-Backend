<?php

namespace App\Http\Controllers;

use App\Models\React;
use App\Http\Requests\StoreReactRequest;
use App\Http\Requests\UpdateReactRequest;

class ReactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreReactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\React  $react
     * @return \Illuminate\Http\Response
     */
    public function show(React $react)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\React  $react
     * @return \Illuminate\Http\Response
     */
    public function edit(React $react)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReactRequest  $request
     * @param  \App\Models\React  $react
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReactRequest $request, React $react)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\React  $react
     * @return \Illuminate\Http\Response
     */
    public function destroy(React $react)
    {
        //
    }
}
