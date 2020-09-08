@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user['username'] }}'s profile</div>

                <div class="card-body">
                    <form method="PATCH" action="{{ route('profile.update', $user) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                @auth
                                    @if(Auth::user()->username == $user["username"])
                                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user['username'] }}" autocomplete="username">
                                    @else
                                        <label for="username" class="col-md-8 col-form-label text-md-right">{{ $user['username'] }}</label>

                                    @endif
                                @endauth

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                @auth
                                    @if(Auth::user()->username == $user["username"])
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user['email'] }}" autocomplete="email">
                                    @else
                                        <label for="email" class="col-md-8 col-form-label text-md-right">{{ $user['email'] }}</label>
                                    @endif
                                @endauth
                            
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                @auth
                                    @if(Auth::user()->username == $user["username"])
                                       <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user['name'] }}" autocomplete="name" autofocus>
                                    @else
                                        <label for="name" class="col-md-8 col-form-label text-md-right">{{ $user['name'] }}</label>
                                    @endif
                                @endauth

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>


                            <div class="col-md-6">
                                @auth
                                    @if(Auth::user()->username == $user["username"])
                                       <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user['lastname'] }}" autocomplete="lastname" autofocus>
                                    @else
                                        <label for="lastname" class="col-md-8 col-form-label text-md-right">{{ $user['lastname'] }}</label>
                                    @endif
                                @endauth
                                

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
