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
                    <a href="/todos/create" class="btn btn-primary mb-2">Create Todo</a>
                    {{-- {{ __('You are logged in!') }} --}}
                    @if(count($todos) > 0)
                        <ul class="list-group well">
                            @foreach ($todos as $todo)
                                <div class="list-group-item m-1 py-3 well">
                                    <h3 ><a href="/todos/{{$todo->id}}" class="text-success">{{$todo->name}}</a></h3>
                                    <p >{{$todo->description}}</p>
                                    <p class="text-white fs-4 p-2 bg-secondary">{{$todo->status}}</p>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                           {{--  <label class="input-group-text" for="inputGroupSelect01">Status</label> --}}
                                        </div>
                                        {{-- <select class="custom-select" id="inputGroupSelect01">
                                            <option >Make me...</option>
                                            <option value="NotStarted">NotStarted</option>
                                            <option value="OnGoing">OnGoing</option>
                                            <option value="Completed">Completed</option>
                                        </select> --}}
                                        <form action="{{ route('todos.update', ['todo' => $todo->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        
                                            <select name="status" class="p-1">
                                                <option value="#">Choose Status</option>
                                                <option value="OnGoing">OnGoing</option>
                                                <option value="NotStarted">NotStarted</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                        
                                            <button type="submit" class="btn btn-info">Update Status</button>
                                        </form>
                                    </div>

                                    <p>{{$todo->created_at}}</p>
                                    @csrf
                                    {{-- <form action="/todos/delete/{{$todo->id}}" method="POST">
                                        <button class="btn btn-danger">Delete</button>
                                    </form> --}}
                                    {!!Form::open(['action' => ['App\Http\Controllers\HomeController@destroy',$todo->id], 'method'=> 'POST', 'class'=>'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                    {!!Form::close()!!}
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
