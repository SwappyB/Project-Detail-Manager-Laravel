@extends('layouts.app')

@section('content')
    <div style="padding-bottom:60px;">
        <h1 class="float-left">Add Member</h1>
        <button class="btn btn-danger btn-lg float-right" onclick="location.href='{{ url('/member') }}'">Go Back</button> 
    </div>

    <form id="customerAdd" name="create_customer" action="{{ action('MembersController@store') }}" method="POST">
        <div class="form-group">
            <label class='custom_label'>Name</label>
            <input name="name" class="form-control" type="text" required placeholder="Enter member name here">
        </div>
        <div class="form-group">
                <label class='custom_label'>Branch</label>
                <input name="branch" class="form-control" type="text" required placeholder="Enter the branch to which member belong">
        </div>
        <div class="form-group">
                <label class='custom_label'>Year</label>
                <input name="year" class="form-control" type="text" required placeholder="Enter the year to which member belong">
        </div>
        <div class="form-group">
                <label class='custom_label'>Contact Number</label>
                <input name="phoneNumber" class="form-control" type="number" placeholder="Enter contact number here" required>
        </div>
        <div class="form-group">
                <label class='custom_label'>Email</label>
                <input name="email" class="form-control" type="email" required placeholder="Enter email here">
        </div>
        {{-- csrf token mandatory for laravel--}}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

        <input style="margin-left:40%;margin-bottom:150px" type="submit" class="btn btn-primary btn-lg" value="Submit">

    </form>
@endsection