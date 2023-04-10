<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBasketRequest;
use App\Http\Requests\UpdateBasketRequest;
use App\Models\Basket;
use App\Models\BasketType;
use App\Models\Product;
use App\Services\BasketPriceCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BasketController extends Controller
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
     */
    public function create()
    {
        if (! Gate::allows('create.basket')) {
            abort(403);
        }

//        if (! auth()->user() || auth()->user()->cannot('create.basket')) {
//            abort(403);
//        }

        return view('form.basket', [
            'categories' => BasketType::all(),
            'products' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, BasketPriceCalculator $calculator)
    {
//        var_dump($request->only(['reference', 'basket_type'])); die;
        $basket = new Basket();
        $basket->fill($request->only(['reference', 'basket_type']));
        $basket->basketType()->associate(BasketType::find($request->basket_type));
        $basket->save();
        $builder = Product::whereIn('id',array_map(function ($item) { return (int)$item; }, $request->products));
//        $builder  Product::whereIn([1,2,3]);
        $products = $builder->get();
        $total = $calculator->compute($products);
        $basket->products()->attach($products, ['quantity' => 1]);

        return response()
            ->redirectToRoute('basket.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(Basket $basket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function edit(Basket $basket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBasketRequest  $request
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBasketRequest $request, Basket $basket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basket $basket)
    {
        //
    }

}
