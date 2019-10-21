@extends('layouts.app')

@section('content')
    <div style="padding-bottom:50px;">
        <h1 class="float-left" style="color:#212529">Projects</h1>
        <button class="btn btn-danger btn-lg float-right" style="margin-left:10px" onclick="location.href='{{ url('/home') }}'">Go Back</button> 
        <button class="btn btn-success btn-lg float-right" onclick="location.href='{{ url('project/create') }}'">Add New</button>   
    </div>

    @if(count($projects) > 0)

    <table class="table table-hover">
            <thead>
              <tr>
                <th class="indexProjectTableHead">Project Title</th>
                <th class="indexProjectTableHead">Datestarted</th>
                <th class="indexProjectTableHead">Status</th>
                <th class="indexProjectTableHead">Added on</th>
              </tr>
            </thead>
            <tbody>

            @foreach($projects as $project)
              <tr>
                <td class="indexProjectTableHead"><a href="/project/{{$project->pid}}">{{$project->title}}</a></td>
                <td class="indexProjectTableHead">{{$project->datestarted}}</td>
                <td class="indexProjectTableHead">{{$project->status}}</td>
                <td class="indexProjectTableHead">{{$project->created_at}}</td>
              </tr>
             @endforeach

            </tbody>
          </table>

    @else
        <hr>
        <h4>No projects found</h4>
    @endif
    </div>
    
    @endsection