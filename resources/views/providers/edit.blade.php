@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <label class="mr-auto"><h3><strong>Edit {{$provider->name}}'s provider profile</strong></h3></label>

                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Back to users</a>
                    </div>
                    
                </div>

                <div class="card-body">
                    <form method="POST" action="/provider/{{$provider->id}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                            <div class="col-md-5">
                                <input disabled id="id" type="id" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') ?? $provider->id}}" autocomplete="id">
                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-5">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $provider->name}}" autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-5">
                                
                                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $provider->address}}" autocomplete="address">
        
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                            <div class="col-md-5">
                               <input id="telephone" type="telephone" class="form-control @error('telephone') is-invalid @enderror" telephone="telephone" value="{{ old('telephone') ?? $provider->telephone}}" autocomplete="telephone">
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                            <div class="col-md-5">
                                <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') ?? $provider->city}}" autocomplete="city">
                                
    

                                @error('city')
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
                                <a class="ml-auto btn btn-danger" href="{{ route('provider.destroy',$provider->id) }}" style="color: white"><strong>Delete provider</strong></a>
                            @endif
                        @endauth
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
