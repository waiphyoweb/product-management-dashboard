@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <form action="{{ url("/sellers/create") }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label>Seller's Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Contact</label>
                        <input type="text" name="contact" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Seller</button>
                </form>
            </div>
        </div>
    </div>
@endsection