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
                    <form method="POST" action="/product/{{$product->id}}">
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
                                
                                <select class="form-control @error('type') is-invalid @enderror">
                                    @foreach($providersList as $provider)
                                        @if($provider->id == $product->provider_id)
                                            <option selected="true">{{ $product->provider_id }}</option>
                                        @else
                                            <option>{{ $provider->id }}</option>
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
                                            <input disabled id="provider_name" type="provider_name" class="form-control @error('provider_name') is-invalprovider_name @enderror" name="provider_name" value="{{ old('provider_name') ?? $provider->name}}" autocomplete="provider_name">
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
