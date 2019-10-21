@extends('layouts.app')

@section('content')
    <div style="padding-bottom:60px;">
        <h2 class="float-left">Editing - {{ $members[0]->name}}</h2>
        <button class="btn btn-danger btn-lg float-right" onclick="location.href='{{ url('/member') }}'">Go Back</button> 
    </div>

    <form id="customerAdd" name="edit_member"  action="{{ action('MembersController@update', $members[0]->mid) }}" method="POST">
        <div class="form-group">
            <label class='custom_label'>Name</label>
            <input name="name" class="form-control" type="text" required value="{{ $members[0]->name}}">
        </div>
        <div class="form-group">
                <label class='custom_label'>Branch</label>
                <input name="branch" class="form-control" type="text" required value="{{ $members[0]->branch}}">
        </div>
        <div class="form-group">
                <label class='custom_label'>Year</label>
                <input name="year" class="form-control" type="text" required value="{{ $members[0]->year}}">
        </div>
        <div class="form-group">
                <label class='custom_label'>Contact Number</label>
                <input name="phoneNumber" class="form-control" type="number" required value="{{ $members[0]->phoneNumber}}">
        </div>
        <div class="form-group">
                <label class='custom_label'>Email</label>
                <input name="email" class="form-control" type="email" required value="{{ $members[0]->email}}">
        </div>
        {{-- csrf token mandatory for laravel--}}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input type="hidden" name="_method" value="put" />

        <input style="margin-left:40%;margin-bottom:150px" onclick="return confirm('Update changes?')" type="submit" class="btn btn-primary btn-lg" value="Submit">

    </form>
@endsection