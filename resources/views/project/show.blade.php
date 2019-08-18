@extends('layouts.app')

@section('content')
    @if(count($projects) > 0)  

      <div style="padding-bottom:60px;">
        <button class="btn btn-danger btn-lg float-right" style="margin-left:10px" onclick="location.href='{{ url('/project') }}'">Go Back</button>
        <h1 class="float-left" style="color:#212529">{{$projects[0]->title}}</h1>
        <a href="{{$projects[0]->id}}/edit" class="btn btn-success btn-lg float-right">Edit</a>
    </div>
    <hr>

    <div class="row">
      <div class="col-2">
          <p class="showProject">Field</p>
      </div>
      <div class="col-2">
          <p class="showProject">{{$projects[0]->field}}</p>
      </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            <p class="showProject">Description</p>
        </div>
        <div class="col-10">
            <p class="showProject">{{$projects[0]->description}}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            <p class="showProject">Starting Date</p>
        </div>
        <div class="col-4" style="border-right:1px solid rgba(0, 0, 0, 0.1)">
            <p class="showProject">{{$projects[0]->datestarted}}</p>
        </div>
        
        <div class="col-2">
            <p class="showProject">Duration</p>
        </div>
        <div class="col-4">
            <p class="showProject">{{$projects[0]->duration}} Hours</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            <p class="showProject">Current Status</p>
        </div>
        <div class="col-2" style="border-right:1px solid rgba(0, 0, 0, 0.1)">
            <p class="showProject">{{$projects[0]->status}}</p>
        </div>
        
        <div class="col-2">
            <p class="showProject">Type</p>
        </div>
        <div class="col-2" style="border-right:1px solid rgba(0, 0, 0, 0.1)">
            <p class="showProject">{{$projects[0]->type}}</p>
        </div>

        <div class="col-2">
            <p class="showProject">Priority</p>
        </div>
        <div class="col-2">
            <p class="showProject">{{$projects[0]->priority}}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            <p class="showProject">Added On:</p>
        </div>
        <div class="col-4" style="border-right:1px solid rgba(0, 0, 0, 0.1)">
            <p class="showProject">{{$projects[0]->created_at}}</p>
        </div>
        
        <div class="col-2">
            <p class="showProject">Last Updated</p>
        </div>
        <div class="col-4">
            <p class="showProject">{{$projects[0]->updated_at}} </p>
        </div>
    </div>
    <hr>
    @else
        <div class="alert alert-warning" role="alert">
          <h5>Project Id is Invalid! <a href="/project" class="alert-link">Go Back</a></h5>
        </div>
    @endif
    </div>
    
    <div class="container">
      <form action="{{ action('projectsController@update', $projects[0]->id ) }}" method="POST">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input type="hidden" name="_method" value="delete" />
        <input type="submit" onclick="return confirm('Are you sure?')" value="Delete" class="btn btn-danger btn-lg float-right">
      </form>
    </div>


    @endsection