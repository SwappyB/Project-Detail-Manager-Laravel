@extends('layouts.app')

@section('content')
    <div style="padding-bottom:60px;">
        <h1 class="float-left">Add Customer</h1>
        <button class="btn btn-danger btn-lg float-right" onclick="location.href='{{ url('/customer') }}'">Go Back</button> 
    </div>

    <form id="customerAdd" name="create_customer" action="{{ action('CustomersController@store') }}" method="POST">
        <div class="form-group">
            <label class='custom_label'>Name</label>
            <input name="name" class="form-control" type="text" required placeholder="Enter customer name here">
        </div>
        <div class="form-group">
                <label class='custom_label'>Industry</label>
                <input name="industry" class="form-control" type="text" required placeholder="Enter the industry to which customer belong">
        </div>
        <div class="form-group">
                <label class='custom_label'>Description</label>
                <textarea name="description" class="form-control" cols="30" rows="8" placeholder="Provide description of the customer"></textarea>
        </div>
        <div class="form-group">
                <label class='custom_label'>Email</label>
                <input name="email" class="form-control" type="email" required placeholder="Enter email here">
        </div>
        <div class="form-group">
                <label class='custom_label'>Contact Number</label>
                <input name="phoneNumber" class="form-control" type="number" placeholder="Enter contact number here" required>
        </div>
        <div class="form-group">
            <label class='custom_label'>Address</label>
            <textarea name="address" class="form-control" cols="30" rows="8" placeholder="Enter address of the customer"></textarea>
        </div>
        {{-- csrf token mandatory for laravel--}}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

        <input style="margin-left:40%;margin-bottom:150px" type="submit" class="btn btn-primary btn-lg" value="Submit">

    </form>
@endsection