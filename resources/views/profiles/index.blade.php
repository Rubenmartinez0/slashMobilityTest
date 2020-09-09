@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <label class="mr-auto"><h3><strong>{{ $user['username'] }}'s profile</strong></h3></label>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Back to users</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="id" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Id') }}</strong></label>
                        <div class="col-md-6">
                            <label for="id" class="col-md-8 col-form-label text-md-right">{{ $user['id'] }}</label>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Username') }}</strong></label>
                        <div class="col-md-6">
                            <label for="username" class="col-md-8 col-form-label text-md-right">{{ $user['username'] }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right"><strong>{{ __('E-Mail Address') }}</strong></label>
                        <div class="col-md-6">     
                            <label for="email" class="col-md-8 col-form-label text-md-right">{{ $user['email'] }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Name') }}</strong></label>
                        <div class="col-md-6">
                            @if($user["name"])
                               <label for="name" class="col-md-8 col-form-label text-md-right">{{ $user['name'] }}</label>
                            @else
                                <label for="name" class="col-md-8 col-form-label text-md-right" style="opacity: .5;">Name not provided</label>  
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lastname" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Lastname') }}</strong></label>
                        <div class="col-md-6">
                            @if($user["lastname"])
                               <label for="lastname" class="col-md-8 col-form-label text-md-right">{{ $user['lastname'] }}</label>
                            @else
                                <label for="lastname" class="col-md-8 col-form-label text-md-right" style="opacity: .5;">Lastname not provided</label>  
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="created_at" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Creation date') }}</strong></label>
                        <div class="col-md-6">
                               <label for="created_at" class="col-md-8 col-form-label text-md-right">{{ $user['created_at'] }}</label>
                            
                        </div>
                    </div>
                    @auth
                        @if(Auth::user()->username == $user["username"])
                            <a class="float-right btn btn-warning" href="/profile/{{$user['id']}}/edit">Edit profile</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
