@extends('layouts.app')

@section('content')
<div style="padding-bottom:50px;">
    <h1 class="float-left" style="color:#212529">Customers</h1>
    <button class="btn btn-danger btn-lg float-right" style="margin-left:10px" onclick="location.href='{{ url('/home') }}'">Go Back</button> 
    <button class="btn btn-success btn-lg float-right" onclick="location.href='{{ url('customer/create') }}'">Add New</button>   
</div>

@if(count($customers) > 0)

<table class="table table-hover">
        <thead>
          <tr>
            <th class="indexProjectTableHead">Name</th>
            <th class="indexProjectTableHead">Industry</th>
            <th class="indexProjectTableHead">Email</th>
            <th class="indexProjectTableHead">Added on</th>
          </tr>
        </thead>
        <tbody>

        @foreach($customers as $customer)
          <tr>
            <td class="indexProjectTableHead"><a href="/customer/{{$customer->cid}}">{{$customer->name}}</a></td>
            <td class="indexProjectTableHead">{{$customer->industry}}</td>
            <td class="indexProjectTableHead">{{$customer->email}}</td>
            <td class="indexProjectTableHead">{{$customer->created_at}}</td>
          </tr>
         @endforeach

        </tbody>
      </table>

@else
    <hr>
    <h4>No Customers found</h4>
@endif
</div>
@endsection