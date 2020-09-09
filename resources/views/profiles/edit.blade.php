@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <label class="mr-auto"><strong>Edit {{$user->username}}'s profile</strong></label>

                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('users.index') }}">Back to users</a>
                    </div>
                    
                </div>

                <div class="card-body">
                    <form method="POST" action="/profile/{{$user->id}}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                            <div class="col-md-5">
                                <input disabled="" id="id" type="id" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') ?? $user->id}}" autocomplete="id">
                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-5">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? $user->username}}" autocomplete="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-5">
                                
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email}}" autocomplete="email">
        
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-5">
                               <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name}}" autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>
                            <div class="col-md-5">
                                <input id="lastname" type="lastname" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') ?? $user->lastname}}" autocomplete="lastname">
                                
    

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @auth
                            @if(Auth::user()->username == $user["username"])
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
                            @if(Auth::user()->username == $user["username"])
                                <a class="mr-auto" href="{{ route('password.request') }}" style="color: red"><strong>Reset password</strong></a>
                                <br>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <strong>{{ ('Logout') }}</strong>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
