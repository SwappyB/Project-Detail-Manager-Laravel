@extends('layouts.app')

@section('content')
    <div style="padding-bottom:50px;">
        <h1 class="float-left" style="color:#212529">Members</h1>
        <button class="btn btn-danger btn-lg float-right" style="margin-left:10px" onclick="location.href='{{ url('/home') }}'">Go Back</button> 
        <button class="btn btn-success btn-lg float-right" onclick="location.href='{{ url('member/create') }}'">Add New</button>   
    </div>

    @if(count($members) > 0)

    <table class="table table-hover">
            <thead>
              <tr>
                <th class="indexProjectTableHead">Name</th>
                <th class="indexProjectTableHead">Branch</th>
                <th class="indexProjectTableHead">Year</th>
                <th class="indexProjectTableHead">Added on</th>
              </tr>
            </thead> 
            <tbody>

            @foreach($members as $member)
                <tr>
                  <td class="indexProjectTableHead"><a href="/member/{{$member->mid}}">{{$member->name}}</a></td>
                  <td class="indexProjectTableHead">{{$member->branch}}</td>
                  <td class="indexProjectTableHead">{{$member->year}}</td>
                  <td class="indexProjectTableHead">{{$member->created_at}}</td>
                </tr>
             @endforeach


            </tbody>
          </table>

    @else
        <hr>
        <h4>No Members found</h4>
    @endif
    </div>
    
    @endsection