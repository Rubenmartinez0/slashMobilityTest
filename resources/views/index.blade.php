@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
       
    @auth
        <div class="container">

            <div class="row mt-5">
                <div class="col-4">
                    <a href="{{ route('users.index') }}"><h1>Users</h1></a>
                </div>

                <div class="col-4">
                    <a href="{{ route('products.index') }}"><h1>Products</h1></a>
                </div>
                <div class="col-4">
                    <a href="{{ route('providers.index') }}"><h1>Providers</h1></a>
                </div>
            </div>
        </div>
    @else
        <div class="container mt-5">
            <h1>Register an account in order to access and manage the data.</h1>
        </div>
    @endauth
@endsection
