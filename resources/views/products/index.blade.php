@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h3 class="mr-auto">Product List</h3>
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('product.create') }}">Add New Product</a>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Provider</th>
                            <th>Description</th>
                            
                            <th>Actions</th>
                        </thead>

                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><a href="{{ route('product.show',$product->id) }}">{{ $product->name }}</a></td>
                                <td>{{ $product->type }}</td>
                                <?php
                                    $providerName = App\Provider::select('name')
                                        ->where('id', '=', $product->provider_id)
                                        ->get();
                                ?>
                                <td><a href="{{ route('provider.show',$product->provider_id) }}">{{$providerName[0]->name }}</a></td>
                                <td>{{ $product->description }}</td>
                                
                                <td>   
                                    <a class="btn btn-primary" href="{{ route('product.show',$product->id) }}">Show</a>
                                    <a class="btn btn-warning" href="{{ route('product.edit',$product->id) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('product.destroy',$product->id) }}">Delete</a>
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