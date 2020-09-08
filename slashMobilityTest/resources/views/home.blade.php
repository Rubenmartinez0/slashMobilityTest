@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-9">
        <div><h1>{{ $user["username"] }}</h1></div>
        <div>{{ $user["email"] }}</div>
  
        <div>{{ $user["name"] }} {{ $user["lastname"] }}</div>
        
 
        
        <div>
        	@auth
        		@if(Auth::user()->username == $user["username"])
        			<div style="color: red"><strong>Reset password</strong></div>
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            			<strong>{{ ('Logout') }}</strong>
            		</a>
				@endif
                
            @endauth
        	
        </div>
    </div>
</div>
@endsection
