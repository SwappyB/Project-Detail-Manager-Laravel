@extends('layouts.app')

@section('content') 
<div style="padding-bottom:60px;">
    <h2 class="float-left">Editing - {{ $data['main'][0]->name }}</h2>
    <a class="btn btn-danger btn-lg float-right" href="/addMember/{{ $data['main'][0]->pid }}">Go back</a> 
</div>

<form id="memberAdd" name="edit_member" action="{{ action('AddController@update',[$data['main'][0]->mid,$data['main'][0]->pid]) }}" method="POST">
    
    {{-- csrf token mandatory for laravel --}}
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <input type="hidden" name="_method" value="put" />
    
    <div class="form-group">
        <label class='custom_label'>Work</label>
        <textarea name="job" class="form-control" cols="30" rows="5">{{ $data['main'][0]->job }}</textarea>
    </div>

    <input style="margin-left:40%;margin-bottom:150px" type="submit" class="btn btn-primary btn-lg" value="Submit">

</form>
@endsection