@extends('layouts.app')
@section('content')
   
   <div style="width:80%; padding-left:1%">
      <br>
     
      <h3>{{$todo->name}}</h3>
      <p>Desc :  {{$todo->description}}</p>
      <p>Status :  {{$todo->status}}</p>
      <small>Created at : {{$todo->created_at}} by {{$todo->user_id}}</small> <br>
      <a href="/todos" class="btn btn-success col-2" role="button">Go Back</a>
   </div>
    
@endsection