@extends('layouts.default')
@section('content')
   <div class="">
                <h1>Personal TODO-API: php laravel application</h1>
                <h5>Hosted in Heroku server : index</h5>
                <h5>Features : </h5>
                <ul>
                    <li>- user register/login</li>
                    <li>- authentication/authorization</li>
                    <li>- uses can read, edit , delete only thier own todos</li>
                    <li>- password encryption</li>
                    <li>- a user can create multiple todos </li>
                    <li>- a todo is owend by a user </li>
                    <li>a status query param can be included to return only todos of specific status</li>

                </ul>

                <h4> Deployed to heroku  </h4>
                <p> The api is served over Heroku host server , so it is possible to use the services on the link below. Postman or other similar tools are recommended to play around with it.</p>
                <ul>
                    <li>- POST :  https://todo-php-api.herokuapp.com/api/v1/register </li>
                            - email , password , confirm_password , name - inputs are needed 
                    <li> - POST : https://todo-php-api.herokuapp.com/api/v1/login </li>
                            - email , password
                    <li>- POST :  https://todo-php-api.herokuapp.com/api/v1/todos</li>
                            -  name , description, status(optional , but ['NotStarted, 'OnGoing', 'Completed'])  (of a todo)
                    <li>- GET : https://todo-php-api.herokuapp.com/api/v1/todos </li>

                    <li>- GET : https://todo-php-api.herokuapp.com/api/v1/todos/id</li>
                    - individual todo

                    <li>- GET : https://todo-php-api.herokuapp.com/api/v1/todos/id?status=Completed</li>

                    - individual todo filterd by the status ['NotStarted, 'OnGoing', 'Completed']

                    <li>- PUT : https://todo-php-api.herokuapp.com/api/v1/todos/id?status={chooseStatus}</li>

                    <li>- DELETE : https://todo-php-api.herokuapp.com/api/v1/todos/id</li>

                </ul>
@stop