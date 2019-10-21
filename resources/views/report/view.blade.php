@extends('layouts.app')

@section('content')
    <div style="padding-bottom:80px;">
        <h1 class="float-left" style="color:#212529">Report results</h1>
        <button class="btn btn-danger btn-lg float-right" style="margin-left:10px" onclick="location.href='{{ url('/report') }}'">Go Back</button>
    </div>
    @if(count($data) > 0)

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

            @foreach($data as $result)
              <tr>
                <td class="indexProjectTableHead"><a href="/project/{{$result->pid}}">{{$result->title}}</a></td>
                <td class="indexProjectTableHead">{{$result->datestarted}}</td>
                <td class="indexProjectTableHead">{{$result->status}}</td>
                <td class="indexProjectTableHead">{{$result->created_at}}</td>
              </tr>
             @endforeach

            </tbody>
          </table>

    @else
        <hr>
        <h4>No projects found</h4>
    @endif
@endsection