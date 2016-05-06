<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class StoreController extends Controller
{
	public function index(Request $request)
	{
		//dd($request->get('name'));
		$products=Product::name($request->get('name'))->orderBy('id', 'DESC')->paginate();
		//$products= Product::all();
		//dd($products);
		return view('store.index',compact('products'));
	}

	public function show($slug)
	{
		$product= Product::where('slug', $slug)->first();
		//dd($products);
		return view('store.show',compact('product'));
	}

	public function contact()
    {
        
        return view('store.contact');

    }
}