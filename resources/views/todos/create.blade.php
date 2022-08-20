@extends('layouts.app')
@section('content')
   
   <div style="width:60%;  border:solid gray 0.01px; margin:auto; padding:2rem 3rem ; ">
        <a href="/todos" class="btn btn-success mb-4 " role="button">Go Back</a>
        
        <h3>Create todo here</h3>
        <form action="{{ route('home.store') }}" method="POST" class="form col-12">
            @csrf
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" class="form-control col-sm-4" id="name" name="name">
                <label for="description">Description : </label>
                <textarea class="form-control col-sm-4" name="description" id="description" aria-label="With textarea"></textarea>
                <button class="btn btn-primary mb-2 mt-4">Create</button>
            </div>
            
        </form>
        
   </div>
    
@endsection