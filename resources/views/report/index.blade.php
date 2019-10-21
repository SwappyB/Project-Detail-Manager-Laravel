@extends('layouts.app')

@section('content')
    <div style="padding-bottom:80px;">
        <h1 class="float-left" style="color:#212529">Generate Report</h1>
        <button class="btn btn-danger btn-lg float-right" style="margin-left:10px" onclick="location.href='{{ url('/home') }}'">Go Back</button>
    </div>
    <form id="report" name="gen_report" action="{{ action('ReportsController@view') }}" method="POST">
    
        {{-- csrf token mandatory for laravel --}}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    
        <h4>Project Duration</h4><br>
        <div class="form-group">
            <label class='custom_label'>From</label>
            <input type="date" name="start" id="start" class="form-control"><br><br>
            <label class='custom_label'>Till</label>
            <input type="date" id="till" name="till" class="form-control"> <br>   
        </div>

    
        <input style="margin-left:40%;margin-bottom:150px" type="submit" class="btn btn-primary btn-lg" value="Submit">
    
    </form>
@endsection