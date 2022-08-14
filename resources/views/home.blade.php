@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info ">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="text-primary text-center">Todos - lists</h1>
                    {{-- {{ __('You are logged in!') }} --}}
                    @if(count($todos) > 0)
                        <ul class="list-group well">
                            @foreach ($todos as $todo)
                                <div class="list-group-item m-1 py-3 well">
                                    <h3 ><a href="/todos/edit/{{$todo->id}}" class="text-success">{{$todo->name}}</a></h3>
                                    <p >{{$todo->description}}</p>
                                    <p>{{$todo->status}}</p>
                                    <p>{{$todo->created_at}}</p>
                                </div> 
                            @endforeach
                        </ul>
                    @else
                        <p>There is no post, so far</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
