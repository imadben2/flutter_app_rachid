<?php

namespace App\Http\Controllers;

use App\Cart_affecter;
use Illuminate\Http\Request;

class CartAffecterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts_affecter = auth()->user()->cart_user;
 
        return response()->json(  $carts_affecter );
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
        $this->validate($request, [
            'type_carte' => 'required',
            'code_carte' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'categories_id' => 'required'

        ]);

        $carts_affecter = new Cart_affecter();
        $carts_affecter->type_carte = $request->type_carte;
        $carts_affecter->categories_id = $request->categories_id;
        $carts_affecter->code_carte = $request->code_carte;
        $carts_affecter->status=$request->status;
        $carts_affecter->user_id=$request->user_id; 
        $carts_affecter->save();
   
        if ($carts_affecter)
        return response()->json('done'
        //     [
        //     'success' => true,
        //     'data' => $product->toArray()
        // ]
    );
    else
        return response()->json('sorry'
        //     [
        //     'success' => false,
        //     'message' => 'Product could not be added'
        // ]
        , 500);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart_affecter  $cart_affecter
     * @return \Illuminate\Http\Response
     */
    public function show(Cart_affecter $cart_affecter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart_affecter  $cart_affecter
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart_affecter $cart_affecter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart_affecter  $cart_affecter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart_affecter $cart_affecter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart_affecter  $cart_affecter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart_affecter $cart_affecter)
    {
        //
    }
}
