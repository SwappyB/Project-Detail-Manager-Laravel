@extends('layouts.app')

@section('content')
    <div style="padding-bottom:60px;">
        <h2 class="float-left">Editing - {{ $customers[0]->name}}</h2>
        <button class="btn btn-danger btn-lg float-right" onclick="location.href='{{ url('/customer') }}'">Go Back</button> 
    </div>

    <form id="customerAdd" name="create_customer" action="{{ action('CustomersController@update' , $customers[0]->cid) }}" method="POST">
        <div class="form-group">
            <label class='custom_label'>Name</label>
        <input name="name" class="form-control" type="text" required value="{{ $customers[0]->name }}">
        </div>
        <div class="form-group">
                <label class='custom_label'>Industry</label>
                <input name="industry" class="form-control" type="text" required value="{{ $customers[0]->industry }}">
        </div>
        <div class="form-group">
                <label class='custom_label'>Description</label>
                <textarea name="description" class="form-control" cols="30" rows="8" >{{ $customers[0]->description }}</textarea>
        </div>
        <div class="form-group">
                <label class='custom_label'>Email</label>
                <input name="email" class="form-control" type="email" required value="{{ $customers[0]->email }}">
        </div>
        <div class="form-group">
                <label class='custom_label'>Contact Number</label>
                <input name="phoneNumber" class="form-control" type="number" value="{{ $customers[0]->phoneNumber }}" required>
        </div>
        <div class="form-group">
            <label class='custom_label'>Address</label>
            <textarea name="address" class="form-control" cols="30" rows="8">{{ $customers[0]->address }}</textarea>
        </div>
        {{-- csrf token mandatory for laravel--}}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input type="hidden" name="_method" value="put" />

        <input style="margin-left:40%;margin-bottom:150px" onclick="return confirm('Update changes?')" type="submit" class="btn btn-primary btn-lg" value="Submit">

    </form>
@endsection