<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
 
        return response()->json(  $products );
    }
 
    public function show($id)
    {
        $product = auth()->user()->products()->find($id);
 
        if (!$product) {
            return response()->json('sorry', 400);
        }
 
        return response()->json( [$product->toArray()] , 200);
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer'
        ]);
 
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
 
        if (auth()->user()->products()->save($product))
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
 
    public function update(Request $request, $id)
    {
        $product = auth()->user()->products()->find($id);
 
        if (!$product) {
            return response()->json('sorry', 400);
        }
 
        $updated = $product->fill($request->all())->save();
 
        if ($updated)
            return response()->json('done'
            //     [
            //     'success' => true
            // ]
        );
        else
            return response()->json('sorry'
            //     [
            //     'success' => false,
            //     'message' => 'Product could not be updated'
            // ]
            , 500);
    }
 
 
     public function getallClient()
    {
        
        $user = User::all();
 
        return response()->json(  $user );
        
        
        
    
    }
 
    public function destroy($id)
    {
        $product = auth()->user()->products()->find($id);
 
        if (!$product) {
            return response()->json('sorry'
            //     [
            //     'success' => false,
            //     'message' => 'Product with id ' . $id . ' not found'
            // ]
            , 400);
        }
 
        if ($product->delete()) {
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
