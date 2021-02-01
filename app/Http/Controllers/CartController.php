<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Cateogire;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = auth()->user()->products;
 
        return response()->json(  $carts );
    }


  public function cart_in_categeories(Request $request,$id)
    {
        $carts = Cart::findOrFail($id);
        $carts = auth()->user()->products;
 
   $carts = Cart::where('categorie_id', '=', $id)
       //   ->where('status', '=', 0)
           ->get();

 
        return response()->json(  $carts );
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


  public function store_cart_categorie(Request $request)
    {
                $this->validate($request, [
            'code_carte' => 'required',
            'categorie_id' => 'required'
        ]);
 
 
   // 
 
        $id= $request->categorie_id;
        $str= $request->code_carte;
 
 
        $your_array = explode("\n", $str);
 
 
         foreach ($your_array as $value) {
             $cart = new Cart();
             $cart->categorie_id = $id;
            
         
                      $cart->code_carte = $value;
             $cart->save();

          }

  
     $duplicateRecords = Cart::where('code_carte', '=', 0)
           ->first();
              
              $cateogire = Cart::find($duplicateRecords->id);
              $cateogire->delete();
              
              

  
        
        if ($cart)
        return response()->json('done'
        //     [
        //     'success' => true,
        //     'data' => $cart->toArray()
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





    public function Index_cart_categorie($id)
    {
        
        
  $cart = Cart::where('categorie_id', '=', $id)

   ->where('status', '=', 0)

           ->get();
    
 
        return response()->json(  $cart );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
    
    
    
     public function Cart1dollar()
    {
        
        $cat = Cateogire::where('nom_categorie', '=', "1 dollars")
           ->first();
        
      
          // $userId = Auth::id();
         //  $userId = auth()->user();
           
           
           
            $cart = Cart::where('categorie_id', '=', $cat->id)
           // ->where('user_id', '=', $userId->id)
            ->where('status', '=', 0)
            ->first();
           
           return response()->json(  $cart );
           
    }
    
         public function Cart2dollar()
    {
        
        $cat = Cateogire::where('nom_categorie', '=', "2 dollars")
           ->first();
        
      
          // $userId = Auth::id();
           $userId = auth()->user();
           
           
           
            $cart = Cart::where('categorie_id', '=', $cat->id)
         //   ->where('user_id', '=', $userId)
            ->where('status', '=', 0)
            ->first();
           
           return response()->json(  $cart );
           
    }
    
    
         public function Cart5dollar()
    {
        
        $cat = Cateogire::where('nom_categorie', '=', "5 dollars")
           ->first();
        
      
          // $userId = Auth::id();
           $userId = auth()->user();
           
           
           
            $cart = Cart::where('categorie_id', '=', $cat->id)
         //   ->where('user_id', '=', $userId)
            ->where('status', '=', 0)
            ->first();
           
           return response()->json(  $cart );
           
    }
    
    
         public function Cart10dollar()
    {
        
        $cat = Cateogire::where('nom_categorie', '=', "10 dollars")
           ->first();
        
      
          // $userId = Auth::id();
           $userId = auth()->user();
           
           
           
            $cart = Cart::where('categorie_id', '=', $cat->id)
           // ->where('user_id', '=', $userId)
            ->where('status', '=', 0)
            ->first();
           
           return response()->json(  $cart );
           
    }
    
    
    
    
        public function modifier_cart($id)
    {

 
          //  $id=$request->code_carte;
            $cart = Cart::where('code_carte', '=', $id)
           ->first();
           
            $cart->status=1; 
            $cart->save();

 
 
        if ($cart)
            return response()->json('done'
            //     [
            //     'success' => true
            // ]
        );
        else
            return response()->json('sorry'
            //     [
            //     'success' => false,
            //     'message' => 'cart could not be updated'
            // ]
            , 500);
    }
    
    
    
        public function modifier_cart_client(Request $request)
    {
           $id=$request->id_client;
           $code=$request->code;
           $cart1 = Cart::where('user_id', $id)
            ->where('code_carte', $code)
           ->first();
           
           
           $cart = Cart::findOrFail($cart1->id);
           $cart->user_id=null; 
           $cart->save();
 
        if ($cart)
            return response()->json('done'
            //     [
            //     'success' => true
            // ]
        );
        else
            return response()->json('sorry'
            //     [
            //     'success' => false,
            //     'message' => 'cart could not be updated'
            // ]
            , 500);
    }
    
    

    
    
}
