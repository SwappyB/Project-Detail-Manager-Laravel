@extends('layouts.app')

@section('content') 
    @if(count($data['project']) > 0)
    
    <div style="padding-bottom:60px;">
            <a href="/project/{{$data['project'][0]->pid}}" class="btn btn-danger btn-lg float-right" style="margin-left:10px;">Go back</a>
        <h2 class="float-left" style="color:#212529">{{ $data['project'][0]->title }} - Members</h2>
        <a href="/addMember/{{$data['project'][0]->pid}}/add" class="btn btn-success btn-lg float-right">Add New</a>
    </div>
    @if(count($data['main']) > 0) 
        <div class='row'>
            <div class="col-1 showProject" style="font-weight:600;">Sr.No.</div>
            <div class="col-3 showProject" style="font-weight:600;">Name</div>
            <div class="col-8 showProject" style="font-weight:600;">Work</div>
        </div>
        <hr>
    @for ($i = 0; $i < count($data['main']); $i++)
    <div class="row">
        <div class="col-1 showProject">{{ $i+1 }}</div>
        <div class="col-3 showProject" style="font-weight:500;"><a href="/member/{{ $data['main'][$i]->mid}}">{{$data['main'][$i]->name}}</a></div>
        <div class="col-6 showProject">{{$data['main'][$i]->job}}</div>
        <div class="col-1 showProject"><a href="/addMember/{{ $data['main'][$i]->mid }}/{{ $data['project'][0]->pid }}" class="btn btn-md btn-success">Edit</a></div>
        <div class="col-1 showProject">
            <form action="{{ action('AddController@destroy', [$data['main'][$i]->mid,$data['project'][0]->pid ] ) }}" method="POST">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input type="hidden" name="_method" value="delete" />
                <input type="submit" onclick="return confirm('Member will be removed from this project!')" value="Delete" class="btn btn-danger btn-md">
            </form>
        </div>
    </div>
    <hr>
    @endfor

    @else
    <div class="alert alert-warning" role="alert">
      <h5>No members found for this project! Add members now!</h5>
    </div>
    @endif

    @else
    <div class="alert alert-warning" role="alert">
        <h5>Project Id is Invalid! <a href="/project" class="alert-link">Go Back</a></h5>
    </div>
    @endif
    
@endsection