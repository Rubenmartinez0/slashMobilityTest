@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <label class="mr-auto"><h3><strong>{{ $product->name }} product sheet</strong></h3></label>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('products.index') }}">Back to products</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="id" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Id') }}</strong></label>
                        <div class="col-md-6">
                            <label for="id" class="col-md-8 col-form-label text-md-right">{{ $product->id }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Image') }}</strong></label>
                        <div class="col-md-6">
                            @if($product->image)
                                <img for="image" class="col-md-8 col-form-label text-md-right" src="/storage/{{ $product->image }}">
                            @else
                                <label for="image" class="col-md-8 col-form-label text-md-right" style="opacity: .5;">No image provided.</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Name') }}</strong></label>
                        <div class="col-md-6">
                            <label for="name" class="col-md-8 col-form-label text-md-right">{{ $product->name }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Type') }}</strong></label>
                        <div class="col-md-6">
                            <label for="type" class="col-md-8 col-form-label text-md-right">{{ $product->type }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="provider_name" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Provider') }}</strong></label>
                        <div class="col-md-6">

                            @if($providerName[0])
                                
                                    <a for="provider_name" href="{{ route('provider.show',$product->provider_id) }}" class="btn btn-primary col-md-8 col-form-label text-md-right">{{ $providerName[0]->name }}</a>
                                
                            @else
                                <label for="provider_name" class="col-md-8 col-form-label text-md-right" style="opacity: .5;">Unable to get the provider of this product.</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Description') }}</strong></label>
                        <div class="col-md-6">     
                            
                            @if($product->description)
                               <label for="description" class="col-md-8 col-form-label text-md-right">{{ $product->description }}</label>
                            @else
                                <label for="description" class="col-md-8 col-form-label text-md-right" style="opacity: .5;">There is no current description for this product.</label>
                            @endif
                        </div>
                    </div>

                    


                    <div class="form-group row">
                        <label for="created_at" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Creation date') }}</strong></label>
                        <div class="col-md-6">
                               <label for="created_at" class="col-md-8 col-form-label text-md-right">{{ $product->created_at }}</label>
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updated_at" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Last modification') }}</strong></label>
                        <div class="col-md-6">
                               <label for="updated_at" class="col-md-8 col-form-label text-md-right">{{ $product->updated_at }}</label>
                            
                        </div>
                    </div>

                    @auth
                        @if(Auth::user())
                            <a class="float-right btn btn-warning" href="{{ route('product.edit',$product->id) }}">Edit product data</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@if(count($similarProducts))
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">
                        <label class="mr-auto"><h3><strong>More {{ $product->type }} products</strong></h3></label>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                            @foreach ($similarProducts as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('product.show',$item->id) }}">View product</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
