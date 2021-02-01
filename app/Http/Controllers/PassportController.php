<?php

 
namespace App\Http\Controllers;
 use App\Cart;
use App\User;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
 
        $token = $user->createToken('MySecret')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }
 
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('MySecret')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }
 
    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
     
     
      public function index_client_cart($id)
     
   {
     
             
  $cart = Cart::where('user_id', '=', $id)
           ->get();
    
 
        return response()->json(  $cart );
     
     
     
     
}

      public function client_all()
     
   {
        $user = User::all();
        return response()->json(  $user );
     
   }
     
     
     
             public function modifier_cart_client(Request $request)
    {

 
           $id=$request->id_client;
           
           
        
           return response()->json(  $id );
           
            $cart = Cart::where('user_id', '=', $id)
           ->first();
           
          $cart->user_id=0; 
          
 
     
 
 
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
    
    
    
     
  
     
     
     
     
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
    
        public function SupprimerUser($id)
    {
        $user = User::find($id);
 
        if (!$user) {
            return response()->json('sorry'
            //     [
            //     'success' => false,
            //     'message' => 'Product with id ' . $id . ' not found'
            // ]
            , 400);
        }
 
        if ($user->delete()) {
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
