@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="mr-auto">Providers List</h3>
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('provider.create') }}">Add New Provider</a>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Telephone</th>
                            <th>City</th>
                            <th>User_ID</th>
                            <th>Creation date</th>
                            <th>Last modification</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>
                        @foreach ($providers as $provider)
                            <tr>
                                <td>{{ $provider->id }}</td>
                                <td>{{ $provider->name }}</td>
                                <td>{{ $provider->address }}</td>
                                <td>{{ $provider->telephone }}</td>
                                <td>{{ $provider->city }}</td>
                                <td>{{ $provider->user_id }}</td>
                                <td>{{ $provider->created_at }}</td>
                                <td>{{ $provider->updated_at }}</td>
                                <td>   
                                    <a class="btn btn-primary" href="{{ route('provider.show',$provider->id) }}">Show</a>
                                    <a class="btn btn-warning" href="{{ route('provider.edit',$provider->id) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('provider.destroy',$provider->id) }}">Delete</a>
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