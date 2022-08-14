@extends('layouts.app')
@section('content')
   {{--  <h1>{{ $title }} </h1> --}}
    @if(count($todos) > 0)
    <ul class="list-group">
        @foreach ($todos as $todo)
            <li class="list-group-item m-2">
                <a href="/todos/{{$todo->id}}"><h1>{{$todo->name}}</h1></a>
                <div class="p-2 bg-info text-brown">
                    <p>Description :  {{$todo->description}}</p>
                    <p>Status:  {{$todo->status}}</p>
                    <small>Created at : {{$todo->created_at}} by {{$todo->user_id}}</small> 
                </div>
            </li> 
        @endforeach
    </ul>
    @endif
@endsection