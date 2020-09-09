@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <label class="mr-auto"><h3><strong>{{ $provider->name }} provider profile</strong></h3></label>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('providers.index') }}">Back to providers</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="id" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Id') }}</strong></label>
                        <div class="col-md-6">
                            <label for="id" class="col-md-8 col-form-label text-md-right">{{ $provider->id }}</label>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Name') }}</strong></label>
                        <div class="col-md-6">
                            <label for="name" class="col-md-8 col-form-label text-md-right">{{ $provider->name }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Address') }}</strong></label>
                        <div class="col-md-6">     
                            
                            @if($provider->address)
                               <label for="address" class="col-md-8 col-form-label text-md-right">{{ $provider->address }}</label>
                            @else
                                <label for="telephone" class="col-md-8 col-form-label text-md-right" style="opacity: .5;">Address not registered</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telephone" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Telephone') }}</strong></label>
                        <div class="col-md-6">
                            @if($provider->telephone)
                               <label for="telephone" class="col-md-8 col-form-label text-md-right">{{ $provider->telephone }}</label>
                            @else
                                <label for="telephone" class="col-md-8 col-form-label text-md-right" style="opacity: .5;">Telephone not registered</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="City" class="col-md-4 col-form-label text-md-right"><strong>{{ __('City') }}</strong></label>
                        <div class="col-md-6">
                            @if($provider->city)
                               <label for="City" class="col-md-8 col-form-label text-md-right">{{ $provider->city }}</label>
                            @else
                                <label for="City" class="col-md-8 col-form-label text-md-right" style="opacity: .5;">City not registered</label>  
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user_id" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Created By') }}</strong></label>
                        <div class="col-md-6">
                               <label for="user_id" class="col-md-8 col-form-label text-md-right">{{ $provider->user_id }}</label>
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="created_at" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Creation date') }}</strong></label>
                        <div class="col-md-6">
                               <label for="created_at" class="col-md-8 col-form-label text-md-right">{{ $provider->created_at }}</label>
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updated_at" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Last modification') }}</strong></label>
                        <div class="col-md-6">
                               <label for="updated_at" class="col-md-8 col-form-label text-md-right">{{ $provider->updated_at }}</label>
                            
                        </div>
                    </div>

                    @auth
                        @if(Auth::user())
                            <a class="float-right btn btn-warning" href="{{ route('provider.edit',$provider->id) }}">Edit provider data</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <label class="mr-auto"><h3><strong>{{ $provider->name }}'s products</strong></h3></label>
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
                        <!--  -->
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('provider.show',$provider->id) }}">View product</a>
                                </td>
                            </tr>
                            
                        <!-- -->
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
