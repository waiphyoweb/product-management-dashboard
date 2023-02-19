@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <a href="{{ url("/products")}} " class="btn btn-outline-secondary float-end btn-sm">Product Dashboard</a>
                <a href="{{ url("/sellers")}} " class="btn btn-outline-secondary float-end btn-sm mx-2">Seller</a>
                <a href="{{ url("/categories/create")}} " class="btn btn-outline-secondary float-end btn-sm">Add Category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 mx-auto">
                <h1>Category</h1>

                @if (session()->has('category-create'))
                    <div class="alert alert-success">
                        {{ session('category-create') }}
                    </div>
                @elseif (session()->has('category-delete'))
                    <div class="alert alert-warning">
                        {{ session('category-delete') }}
                    </div>
                @elseif (session()->has('category-update'))
                    <div class="alert alert-success">
                        {{ session('category-update') }}
                    </div>
                @endif

                <table class="table tabel-striped">
                    <thead>
                        <tr>
                            <th>Category's Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ url("/categories/delete/$category->id") }}" class="btn btn-warning">
                                        Delete
                                    </a>
                                    <a href="{{ url("/categories/update/$category->id") }}" class="btn btn-secondary">
                                        Update
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