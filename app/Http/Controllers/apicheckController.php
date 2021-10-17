<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apicheckController extends Controller
{
    public function api(Request $request){
    	$id = $request->get('id');
    	print_r($id);
    	$cart = session()->has('cart') ? session()->get('cart') : [];
    	$cart= 1 + $id;
        
        session(['cart' => $cart]);
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        return response()->json($data);
    }
}
