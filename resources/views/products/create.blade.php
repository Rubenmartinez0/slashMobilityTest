@extends('providers.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card-header d-flex ">
                    <h3 class="mr-auto">{{ __('Add new product') }}</h3>

                    <div>
                        <a class="btn btn-primary" href="{{ route('products.index') }}">Back to products</a>
                    </div>
                </div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product name*') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type*') }}</label>

                            <div class="col-md-6">
                                <input id="type" type="type" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" autocomplete="type">

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="provider_id" class="col-md-4 col-form-label text-md-right">{{ __('Provider ID') }}</label>

                            <div class="col-md-6">
                                <select id="provider_id" type="text" class="form-control @error('provider_id') is-invalid @enderror" name="provider_id" value="{{ old('provider_id') }}" autocomplete="provider_id" autofocus>
                                    @forelse($providers as $provider)
                                        <option>
                                            {{ $provider->id }}
                                        </option>
                                    @empty
                                        <option>There are no providers in the database</option>       
                                    @endforelse
                                </select>
                                @error('provider_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                        
       

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-4 mb-3">
                            <button type="submit" class="btn btn-success">Create product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection