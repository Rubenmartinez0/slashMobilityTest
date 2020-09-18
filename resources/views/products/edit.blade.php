@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <label class="mr-auto"><h3><strong>Edit {{$product->name}}'s product data</strong></h3></label>

                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('products.index') }}">Back to products</a>
                    </div>
                    
                </div>

                <div class="card-body">
                    <form method="POST" action="/product/{{$product->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Id') }}</strong></label>

                            <div class="col-md-5">
                                <input disabled id="id" type="id" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') ?? $product->id}}" autocomplete="id">
                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Image') }}</strong></label>

                            <div class="col-md-5">
                                @if($product->image)
                                    <img for="image" class="col-md-8 col-form-label text-md-right" src="/storage/{{ $product->image }}">
                                    <a href="{{ route('product.deleteImage', $product) }}" id="deleteProductImageButton" class="btn btn-danger mb-2"><strong>X</strong></a>
                                @endif
                                <input type="file" class="form-control-file" id="image" name="image" value="que lo que">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Name') }}</strong></label>

                            <div class="col-md-5">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $product->name}}" autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Type') }}</strong></label>

                            <div class="col-md-5">
                                
                                <input id="type" type="type" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') ?? $product->type}}" autocomplete="type">
        
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="provider_id" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Provider Id') }}</strong></label>
                            <div class="col-md-5">
                                
                                <select id="provider_id" type="id"  class="form-control @error('provider_id') is-invalid @enderror" name="provider_id">
                                    @foreach($providersList as $provider)
                                        @if($provider->id == $product->provider_id)
                                            <option selected="true" >{{ $product->provider_id }}</option>
                                        @else
                                            <option name="provider_id">{{ $provider->id }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('provider_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="provider_name" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Provider') }}</strong></label>

                            <div class="col-md-5">
                                @foreach($providersList as $provider)
                                        @if($provider->id == $product->provider_id)
                                            
                                            <provider-input-name provider-name="{{ $provider->name }}"></provider-input-name>
                                        @endif
                                @endforeach
                                @error('provider_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Description') }}</strong></label>

                            <div class="col-md-5">
                               <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $product->description }}" autocomplete="description">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @auth
                            @if(Auth::user()->username)
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">{{ __('Save changes') }}</button>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </form>
                        <hr>
                        <div class="d-flex">
                         @auth
                            @if(Auth::user()->username)
                                <a class="ml-auto btn btn-danger" href="{{ route('product.destroy',$product->id) }}" style="color: white"><strong>Delete product</strong></a>
                            @endif
                        @endauth
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
