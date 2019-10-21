@extends('layouts.app')

@section('content')
    <div style="padding-bottom:60px;">
        <h1 class="float-left">Add Project</h1>
        <button class="btn btn-danger btn-lg float-right" onclick="location.href='{{ url('/project') }}'">Go Back</button> 
    </div>

    <form id="projectAdd" name="create_project" action="{{ action('projectsController@store') }}" method="POST">
        <div class="form-group">
            <label class='custom_label'>Title</label>
            <input name="title" class="form-control" type="text" required placeholder="Enter project title here">
        </div>
        {{-- {{ $data['customers'][0]->name }}
        {{ $data['customers'][0]->cid }} --}}
        <div class="form-group">
                <label class='custom_label'>Field</label>
                <input name="field" class="form-control" type="text" required placeholder="Enter the field to which project belong">
        </div>
        <div class="form-group">
                <label class='custom_label'>Description</label>
                <textarea name="description" class="form-control" cols="30" rows="8" placeholder="Provide description of the project"></textarea>
        </div>
        <div class="form-group">
                <label class='custom_label'>Status</label>
                <input name="status" class="form-control" type="text" required placeholder="Ongoing or Completed ?">
        </div>
        <div class="form-group">
                <label class='custom_label'>Starting Date</label>
                <input name="datestarted" class="form-control" type="date" required>
        </div>
        <div class="form-group">
                <label class='custom_label'>Duration</label>
                <input name="duration" class="form-control" type="number" placeholder="Enter estimated duration (in Hours)" required>
        </div>
        <div class="form-group">
                <label class='custom_label'>Type</label>
                <select  class="form-control" name="type" id="projectType">
                    <option value="">Select privacy type</option>
                    <option value="Public">Public</option>
                    <option value="Private">Private</option>
                </select>
        </div>
        <div class="form-group">
                <label class='custom_label'>Priority</label>
                <select  class="form-control" name="priority" id="projectType">
                    <option value="">Select Priority</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
        </div>

        <div class="form-group">
                <label class='custom_label'>Customer</label>
                <select  class="form-control" name="customer" id="projectType">
                    <option value="">Select Customer</option>

                    @foreach ($data['customers'] as $customer)
                    <option value="{{ $customer->cid }}">{{ $customer->name }}</option>
                    @endforeach

                </select>
        </div>

        {{-- <div class="form-group">
                <label class='custom_label'>Members</label>
                <select multiple class="form-control" name="members[]" id="projectType">
                    <option value="">Select Members</option>

                    @foreach ($data['members'] as $member)
                    <option value="{{ $member->mid }}">{{ $member->name }}</option>
                    @endforeach

                </select>
        </div> --}}

        {{-- csrf token mandatory for laravel--}}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

        <input style="margin-left:40%;margin-bottom:150px" type="submit" class="btn btn-primary btn-lg" value="Submit">

    </form>
@endsection