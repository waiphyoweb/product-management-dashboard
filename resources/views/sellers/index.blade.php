@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <a href="{{ url("/products")}} " class="btn btn-outline-secondary float-end btn-sm">Product Dashboard</a>
                <a href="{{ url("/categories")}} " class="btn btn-outline-secondary float-end btn-sm mx-2">Category</a>
                <a href="{{ url("/sellers/create")}} " class="btn btn-outline-secondary float-end btn-sm">Add Seller</a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 mx-auto">
                <h1>Sellers</h1>

                @if (session()->has('seller-create'))
                    <div class="alert alert-success">
                        {{ session('seller-create') }}
                    </div>
                @elseif (session()->has('seller-delete'))
                    <div class="alert alert-warning">
                        {{ session('seller-delete') }}
                    </div>
                @endif

                <table class="table tabel-striped">
                    <thead>
                        <tr>
                            <th>Seller's Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sellers as $seller)
                            <tr>
                                <td>{{ $seller->name }}</td>
                                <td>{{ $seller->email }}</td>
                                <td>{{ $seller->contact }}</td>
                                <td>{{ $seller->address }}</td>
                                <td>
                                    <a href="{{ url("/sellers/detail/$seller->id") }}" class="btn btn-outline-primary">
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