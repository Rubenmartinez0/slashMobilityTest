@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h3>Users list</h3></div>
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
                            <th>Action</th>
                        </thead>

                        <tbody>
                        @foreach($usersList as $user)
                            
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->username}}</a></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->lastname}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td>{{$user->email_verified_at}}</td>

                                    <td>
                                        <a class="btn btn-primary" href="{{ url('/profile/') }}/{{$user->id}}">View profile</a>
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
