@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('seller-update'))
                            <div class="alert alert-success">
                                {{ session('seller-update') }}
                            </div>
                        @endif
                        <h2 class="card-title">{{ $seller->name }}</h2>
                        <ul class="list-group">
                            <li class="list-group-item">Email: {{ $seller->email }}</li>
                            <li class="list-group-item">Contact: {{ $seller->contact }}</li>
                            <li class="list-group-item">Address: {{ $seller->address }}</li>
                            <div class="mt-3">
                                <a href="{{ url("/sellers") }}" class="btn btn-outline-secondary btn-sm">Back</a> 
                                <a href="{{ url("/sellers/delete/$seller->id") }}" class="btn btn-warning btn-sm float-end ms-2">Delete Seller</a>    
                                <a href="{{ url("/sellers/update/$seller->id") }}" class="btn btn-primary btn-sm float-end">Edit Seller</a>    
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection