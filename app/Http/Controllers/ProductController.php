<?php

namespace App\Http\Controllers;

use App\Product;
use App\Provider;
use Illuminate\Http\Request;

class ProductController extends Controller
{

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
       
        return view('products/index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $providers = Provider::all();
        return view('products.create', compact('providers'));
    }

    public function show(Product $product)
    {
        $similarProducts = Product::select('*')
                        ->where('type', '=', $product->type)
                        ->where('id', '!=', $product->id)
                        ->get();

        return view('products.show',compact('product', 'similarProducts'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:2000'],
            'image' => ['nullable', 'image'],
            
            /*
            'provider_name' => ['required', 'string', 'max:255'],
            'provider_id' => ['required', 'string'],
            */
        
        ]);
        //\App\Product::create($data);
        //auth()->provider()->products()->create($data);
        Product::create($data);

        $products = Product::all();
        return view('products/index', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:2000'],
            'image' => ['nullable', 'image'],
        ]);
        
        if(auth()->user()){
            $product->update($data);
            return redirect()->route('products.index')->with('success','Product updated successfully.');
        }
        

        return redirect()->route('products.index')->with('failure','Product failed to update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {
        $product->delete();
  
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}