@extends('layouts.app')
@section('content')
   
   <div style="width:50%; margin:auto; padding-left:1%">
      <br>
     
      <h1>{{$todo->name}}</h1>
      <p>Desc :  {{$todo->description}}</p>
      <p>Status :  {{$todo->status}}</p>
      <small>Created at : {{$todo->created_at}} by {{$todo->user_id}}</small> <br>
      <a href="/home" class="btn btn-success col-2" role="button">Go Back</a>
   </div>
    
@endsection