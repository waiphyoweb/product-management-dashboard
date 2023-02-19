@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('product-update'))
                            <div class="alert alert-success">
                                {{ session('product-update') }}
                            </div>
                        @endif
                        <h2 class="card-title">{{ $product->name }}</h2>
                        <ul class="list-group">
                            <li class="list-group-item h5">Price: {{ $product->price }} MMK</li>
                            <li class="list-group-item">Category: {{ $product->category->name }}</li>
                            <li class="list-group-item">By: {{ $product->seller->name }}</li>
                            <div class="mt-3">
                                <a href="{{ url("/products") }}" class="btn btn-outline-secondary btn-sm">Back</a> 
                                <a href="{{ url("/products/delete/$product->id") }}" class="btn btn-warning btn-sm ms-2 float-end">Delete Product</a>    
                                <a href="{{ url("/products/update/$product->id") }}" class="btn btn-primary btn-sm float-end">Edit Product</a>    
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection