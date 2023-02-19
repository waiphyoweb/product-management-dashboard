@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <a href="{{ url("/categories")}} " class="btn btn-outline-secondary float-end btn-sm">Category</a>
                <a href="{{ url("/sellers")}} " class="btn btn-outline-secondary float-end btn-sm mx-2">Seller</a>
                <a href="{{ url("/products/create")}} " class="btn btn-outline-secondary float-end btn-sm">Add Product</a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 mx-auto">
                <h1>Products</h1>

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session()->has('product-delete'))
                    <div class="alert alert-warning">
                        {{ session('product-delete') }}
                    </div>
                @endif

                <table class="table tabel-striped">
                    <thead>
                        <tr>
                            <th>Product's Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Seller</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->seller->name }}</td>
                                <td>
                                    <a href="{{ url("/products/detail/$product->id") }}" class="btn btn-outline-primary">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection