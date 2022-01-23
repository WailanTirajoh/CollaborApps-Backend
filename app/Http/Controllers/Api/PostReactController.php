<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\React;
use App\Http\Requests\StoreReactRequest;
use App\Http\Requests\UpdateReactRequest;
use App\Models\Post;

class PostReactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReactRequest  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReactRequest $request, Post $post)
    {
        
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
