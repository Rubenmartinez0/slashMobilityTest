<?php

namespace App\Http\Controllers;


use App\Provider;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();
        return view('providers/index', [ "providers" => $providers, ]);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
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
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'address' => ['nullable', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:12', 'unique:users'],
            'city' => ['nullable', 'string', 'max:255'],
        ]);

        //\App\Provider::create($data);
        if(auth()->user()){
            \App\Provider::create($data);
        }
        //->providers()->create($data);

        $providers = Provider::all();
        return view('providers/index', [ "providers" => $providers, ]);
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        $providerProductsList = Product::select('*')
            ->where('provider_id', '=', $provider->id)
            ->get();


        return view('providers.show',compact('provider', 'providerProductsList'));


    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('providers.edit',compact('provider'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'address' => ['nullable', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:12', 'unique:users'],
            'city' => ['nullable', 'string', 'max:255'],
        ]);
        
        if(auth()->user()){
            $provider->update($data);
            return redirect()->route('providers.index')->with('success','Provider updated successfully.');
        }
        

        return redirect()->route('providers.index')->with('failure','Provider failed to update.');
    }   

  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function delete(Provider $provider)
    {
        $provider->delete();
  
        return redirect()->route('providers.index')
                        ->with('success','Provider deleted successfully');
    }
}