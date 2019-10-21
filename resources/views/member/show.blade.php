@extends('layouts.app')

@section('content')
    @if(count($data['members']) > 0)  

      <div style="padding-bottom:60px;">
        <button class="btn btn-danger btn-lg float-right" style="margin-left:10px" onclick="location.href='{{ url('/member') }}'">Go Back</button>
        <h1 class="float-left" style="color:#212529">{{$data['members'][0]->name}}</h1>
        <a href="{{ $data['members'][0]->mid }}/edit" class="btn btn-success btn-lg float-right">Edit</a>
    </div>
    <hr>

    <div class="row">
      <div class="col-2">
          <p class="showProject2">Branch</p>
      </div>
      <div class="col-2">
          <p class="showProject">{{$data['members'][0]->branch}}</p>
      </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            <p class="showProject2">Year</p>
        </div>
        <div class="col-10">
            <p class="showProject">{{$data['members'][0]->year}}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            <p class="showProject2">Email</p>
        </div>
        <div class="col-4" style="border-right:1px solid rgba(0, 0, 0, 0.1)">
            <p class="showProject">{{$data['members'][0]->email}}</p>
        </div>
        
        <div class="col-2">
            <p class="showProject2">Contact Number</p>
        </div>
        <div class="col-4">
            <p class="showProject">{{$data['members'][0]->phoneNumber}}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            <p class="showProject2">Added On:</p>
        </div>
        <div class="col-4" style="border-right:1px solid rgba(0, 0, 0, 0.1)">
            <p class="showProject">{{$data['members'][0]->created_at}}</p>
        </div>
        
        <div class="col-2">
            <p class="showProject2">Last Updated</p>
        </div>
        <div class="col-4">
            <p class="showProject">{{$data['members'][0]->updated_at}} </p>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-2">
            <p class="showProject2">Projects</p>
        </div>
    </div>
    <hr>
    @if(count($data['projects']) > 0) 
    <div class='row'>
        <div class="col-1 showProject" style="font-weight:600">Sr.No.</div>
        <div class="col-2 showProject" style="font-weight:600">Title</div>
        <div class="col-3 showProject" style="font-weight:600">Datestarted</div>
        <div class="col-3 showProject" style="font-weight:600">Status</div>
        <div class="col-3 showProject" style="font-weight:600">Added on</div>
    </div>
    <hr>
        @for ($i = 0; $i < count($data['projects']); $i++)
            
        <a href="{{  action("projectsController@show",$data['projects'][$i]->pid)  }}">
        <div class="row">
            <div class="col-1 showProject" style="font-weight:600;color:black;">{{$i+1}}</div>
            <div class="col-2 showProject">{{$data['projects'][$i]->title}}</div>
            <div class="col-3 showProject">{{$data['projects'][$i]->datestarted}}</div>
            <div class="col-3 showProject">{{$data['projects'][$i]->status}}</div>
            <div class="col-3 showProject">{{$data['projects'][$i]->created_at}}</div>
        </div>
        </a>
        <hr>
        @endfor
    </div>
    @else
    <div class="alert alert-warning" role="alert">
      <h5>No projects found!</h5>
    </div>
    @endif
    </div>
    </div>

    <div class="container" style="padding-bottom:100px;">
        <form action="{{ action('MembersController@update', $data['members'][0]->mid ) }}" method="POST">
          <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
          <input type="hidden" name="_method" value="delete" />
          <input type="submit" onclick="return confirm('Member details will be deleted!')" value="Delete" class="btn btn-danger btn-lg float-right">
        </form>
    </div>

    @else
    <div class="alert alert-warning" role="alert">
      <h5>Member Id is Invalid! <a href="/member" class="alert-link">Go Back</a></h5>
    </div>
    @endif

@endsection