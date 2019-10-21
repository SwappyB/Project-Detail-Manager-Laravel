@extends('layouts.app')

@section('content')
    @if(count($data['main']) > 0)  

      <div style="padding-bottom:60px;">
        <button class="btn btn-danger btn-lg float-right" style="margin-left:10px" onclick="location.href='{{ url('/project') }}'">Go Back</button>
        <h1 class="float-left" style="color:#212529">{{$data['main'][0]->title}}</h1>
        <a href="{{$data['main'][0]->pid}}/edit" class="btn btn-success btn-lg float-right">Edit</a>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            <p class="showProject2">Customer</p>
        </div>
            <div class="col-4">
                <a href='{{  action("CustomersController@show",$data['main'][0]->cid)  }}'>
                <p class="showProject">{{$data['main'][0]->name}}</p>
                </a>
            </div>
    </div>

    <hr>
    <div class="row">
      <div class="col-2">
          <p class="showProject2">Field</p>
      </div>
      <div class="col-2">
          <p class="showProject">{{$data['main'][0]->field}}</p>
      </div>
    </div>
    <hr> 
    <div class="row">
        <div class="col-2">
            <p class="showProject2">Description</p>
        </div>
        <div class="col-10">
            <p class="showProject">{{$data['main'][0]->description}}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            <p class="showProject2">Starting Date</p>
        </div>
        <div class="col-4" style="border-right:1px solid rgba(0, 0, 0, 0.1)">
            <p class="showProject">{{$data['main'][0]->datestarted}}</p>
        </div>
        
        <div class="col-2">
            <p class="showProject2">Duration</p>
        </div>
        <div class="col-4">
            <p class="showProject">{{$data['main'][0]->duration}} Hours</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            <p class="showProject2">Current Status</p>
        </div>
        <div class="col-2" style="border-right:1px solid rgba(0, 0, 0, 0.1)">
            <p class="showProject">{{$data['main'][0]->status}}</p>
        </div>
        
        <div class="col-2">
            <p class="showProject2">Type</p>
        </div>
        <div class="col-2" style="border-right:1px solid rgba(0, 0, 0, 0.1)">
            <p class="showProject">{{$data['main'][0]->type}}</p>
        </div>

        <div class="col-2">
            <p class="showProject2">Priority</p>
        </div>
        <div class="col-2">
            <p class="showProject">{{$data['main'][0]->priority}}</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-2">
            <p class="showProject2">Added On:</p>
        </div>
        <div class="col-4" style="border-right:1px solid rgba(0, 0, 0, 0.1)">
            <p class="showProject">{{$data['main'][0]->created_at}}</p>
        </div>
        
        <div class="col-2">
            <p class="showProject2">Last Updated</p>
        </div>
        <div class="col-4">
            <p class="showProject">{{$data['main'][0]->updated_at}} </p>
        </div>
    </div>
    <hr>
    
    <div class="row">
        <div class="col-2">
            <p class="showProject2">Members</p>
        </div>
        <div class="col-8">
        </div>
        <div class="col-2">
            <a href="/addMember/{{$data['main'][0]->pid}}" class="btn btn-success btn-lg float-right">Add Members</a>
        </div>
    </div>
    <hr>
    @if(count($data['members']) > 0) 
    <div class='row'>
        <div class="col-1 showProject" style="font-weight:600">Sr.No.</div>
        <div class="col-2 showProject" style="font-weight:600">Name</div>
        <div class="col-3 showProject" style="font-weight:600">Branch</div>
        <div class="col-3 showProject" style="font-weight:600">Year</div>
        <div class="col-3 showProject" style="font-weight:600">Added on</div>
    </div>
    <hr>

        @for ($i = 0; $i < count($data['members']); $i++)
            <a href="{{  action("MembersController@show",$data['members'][$i]->mid)  }}">
                <div class="row">
                    <div class="col-1 showProject" style="font-weight:600;color:black;">{{$i+1}}</div>
                    <div class="col-2 showProject">{{$data['members'][$i]->name}}</div>
                    <div class="col-3 showProject">{{$data['members'][$i]->branch}}</div>
                    <div class="col-3 showProject">{{$data['members'][$i]->year}}</div>
                    <div class="col-3 showProject">{{$data['members'][$i]->created_at}}</div>
                </div>
            </a>
            <hr>
        @endfor
    </div>
    @else
    <div class="alert alert-warning" role="alert">
      <h5>No Members found!</h5>
    </div>
    @endif
    </div>
</div>


    <div class="container" style="padding-bottom:100px;">
      <form action="{{ action('projectsController@destroy', $data['main'][0]->pid ) }}" method="POST">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input type="hidden" name="_method" value="delete" />
        <input type="submit" onclick="return confirm('Project details will be deleted!')" value="Delete" class="btn btn-danger btn-lg float-right">
      </form>
    </div>

    @else
    <div class="alert alert-warning" role="alert">
      <h5>Project Id is Invalid! <a href="/project" class="alert-link">Go Back</a></h5>
    </div>
    @endif
    
@endsection