@extends('layouts.app')

@section('content') 
<div style="padding-bottom:60px;">
    <h2 class="float-left">Add Member</h2>
    <a class="btn btn-danger btn-lg float-right" href="/addMember/{{ $data['id'] }}">Go back</a> 
    <a class="btn btn-success btn-lg float-right" style="margin-right:10px;" href="/member/create">Create New Members</a> 
</div>

<form id="memberAdd" name="create_member" action="{{ action('AddController@store',$data['id']) }}" method="POST">
    
    {{-- csrf token mandatory for laravel --}}
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

    <div class="form-group">
        <label class='custom_label'>Member</label>
        <select  class="form-control" name="member" id="projectType">
            <option value="">Select Member</option>

            @foreach ($data['members'] as $member)
            @if (!$member->pid)
            <option value="{{ $member->mid }}">{{ $member->name }}</option>
            @endif
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <label class='custom_label'>Work</label>
        <textarea name="job" class="form-control" cols="30" rows="5" placeholder="Enter work done by the member"></textarea>
    </div>

    <input style="margin-left:40%;margin-bottom:150px" type="submit" class="btn btn-primary btn-lg" value="Submit">

</form>
@endsection