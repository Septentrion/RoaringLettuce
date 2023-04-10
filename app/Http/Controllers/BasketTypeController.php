<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBasketTypeRequest;
use App\Http\Requests\UpdateBasketTypeRequest;
use App\Models\BasketType;

class BasketTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreBasketTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBasketTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BasketType  $basketType
     * @return \Illuminate\Http\Response
     */
    public function show(BasketType $basketType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasketType  $basketType
     * @return \Illuminate\Http\Response
     */
    public function edit(BasketType $basketType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBasketTypeRequest  $request
     * @param  \App\Models\BasketType  $basketType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBasketTypeRequest $request, BasketType $basketType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BasketType  $basketType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasketType $basketType)
    {
        //
    }
}
