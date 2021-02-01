<?php

namespace App\Http\Controllers;

use App\Cateogire;
use Illuminate\Http\Request;

class CateogireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cateogire = Cateogire::all();
        return response()->json(  $cateogire );
    }
 
   public function index11aa()
    {
        $cateogire = Cateogire::all();
        return response()->json(  $cateogire );
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
            'nom_categorie' => 'required'
          

        ]);
 
        $cateogire = new Cateogire();
        $cateogire->nom_categorie = $request->nom_categorie;
        $cateogire->save();
        if ($cateogire)
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
     * @param  \App\Cateogire  $cateogire
     * @return \Illuminate\Http\Response
     */
    public function show(Cateogire $cateogire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cateogire  $cateogire
     * @return \Illuminate\Http\Response
     */
    public function edit(Cateogire $cateogire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cateogire  $cateogire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cateogire $cateogire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cateogire  $cateogire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cateogire = Cateogire::find($id);
 
        if (!$cateogire) {
            return response()->json('sorry'
            //     [
            //     'success' => false,
            //     'message' => 'Product with id ' . $id . ' not found'
            // ]
            , 400);
        }
 
        if ($cateogire->delete()) {
            return response()->json('done'
            //     [
            //     'success' => true
            // ]
        );
        } else {
            return response()->json('sorry'
            //     [
            //     'success' => false,
            //     'message' => 'Product could not be deleted'
            // ]
            , 500);
        }
    }
}
