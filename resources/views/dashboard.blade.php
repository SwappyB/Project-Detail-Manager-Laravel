@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Welcome </h2>
                    <hr>
                    <div class="well">
                        <a href="/customer"><h4>Customers</h4></a>
                    </div>
                
                    <a href="/project"><h4>Projects</h4></a>
                    <a href="/member"><h4>Members</h4></a>
                    <a href="/report"><h4>Generate Report</h4></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
