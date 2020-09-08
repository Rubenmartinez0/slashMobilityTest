@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Users list</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Creation date</th>
                            <th>Last modification</th>
                            <th>Verification date</th>
                        </thead>

                        <tbody>
                        @foreach($usersList as $user)
                            
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td><a href="{{ url('/profile/') }}/{{$user->id}}"><strong>{{$user->username}}</strong></a></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->lastname}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td>{{$user->email_verified_at}}</td>

                                    <td>
                                    </td>
                                </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
