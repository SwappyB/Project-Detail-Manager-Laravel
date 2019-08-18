@extends('layouts.app')

@section('content')
    @if(count($projects) > 0)  
    
    <div style="padding-bottom:60px;">
        <h2 class="float-left">Editing - {{ $projects[0]->title}}</h2>
        <button class="btn btn-danger btn-lg float-right" onclick="location.href='{{ url('/project') }}'">Go Back</button> 
    </div>

    <form id="projectAdd" name="create_project" action="{{ action('projectsController@update', $projects[0]->id ) }}" method="POST">
        <div class="form-group">
            <label class='custom_label'>Title</label>
            <input name="title" class="form-control" type="text" required value="{{ $projects[0]->title}}">
        </div>
        <div class="form-group">
                <label class='custom_label'>Field</label>
                <input name="field" class="form-control" type="text" required value="{{ $projects[0]->field}}">
        </div>
        <div class="form-group">
                <label class='custom_label'>Description</label>
                <textarea name="description" class="form-control" cols="30" rows="8">{{ $projects[0]->description}}</textarea>
        </div>
        <div class="form-group">
                <label class='custom_label'>Status</label>
                <input name="status" class="form-control" type="text" required value="{{ $projects[0]->status}}">
        </div>
        <div class="form-group">
                <label class='custom_label'>Starting Date</label>
                <input name="datestarted" class="form-control" type="date" required value="{{ $projects[0]->datestarted}}">
        </div>
        <div class="form-group">
                <label class='custom_label'>Duration</label>
                <input name="duration" class="form-control" type="number" value="{{ $projects[0]->duration}}" required>
        </div>
        <div class="form-group">
                <label class='custom_label'>Type</label>
                <select  class="form-control" name="type" id="projectType" value="{{ $projects[0]->type}}">
                    <option value="">Select privacy type</option>
                    <option {{ ( $projects[0]->type == 'Public') ? 'selected' : '' }} value="Public">Public</option>
                    <option {{ ( $projects[0]->type == 'Private') ? 'selected' : '' }} value="Private">Private</option>
                </select>
        </div>
        <div class="form-group">
                <label class='custom_label'>Priority</label>
                <select  class="form-control" name="priority" id="projectType">
                    <option value="">Select Priority</option>
                    <option {{ ( $projects[0]->priority == 'Low') ? 'selected' : '' }} value="Low">Low</option>
                    <option {{ ( $projects[0]->priority == 'Medium') ? 'selected' : '' }} value="Medium">Medium</option>
                    <option {{ ( $projects[0]->priority == 'High') ? 'selected' : '' }} value="High">High</option>
                </select>
        </div>

        {{-- csrf token mandatory for laravel--}}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input type="hidden" name="_method" value="put" />

        <input style="margin-left:40%;margin-bottom:150px" type="submit" class="btn btn-primary btn-lg" placeholder="Submit">

    </form>

    @else
        <div class="alert alert-warning" role="alert">
          <h5>Project Id is Invalid! <a href="/project" class="alert-link">Go Back</a></h5>
        </div>
    @endif
@endsection