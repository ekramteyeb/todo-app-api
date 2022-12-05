
## <p>PHP-laravel-API-app</p>
 
## A personal todo api 

Features : 
- user register/login
- authentication/authorization
- uses can read, edit , delete only thier own todos
- password encryption
- a user can create multiple todos 
- a todo is owend by a user 
_ a status query param can be included to return only todos of specific status





## Deployed to heroku  
 The api is served over Heroku host server , so it is possible to use the services on the link below.
 
 - POST :  https://todo-php-api.herokuapp.com/api/v1/register 
        - email , password , confirm_password , name - inputs are needed 

 - POST : https://todo-php-api.herokuapp.com/api/v1/login 
        - email , password

 - POST :  https://todo-php-api.herokuapp.com/api/v1/todos
       -  name , description, status(optional , but ['NotStarted, 'OnGoing', 'Completed'])  (of a todo)

 - GET : https://todo-php-api.herokuapp.com/api/v1/todos 

## Or in Local machine 

## Required  to install : 
- php 
- composer 
- laravel framework
- POSTMAN(preferable)
- postgres , or mysql database (should be configured in .env file), start it in local machine and should be connected to the application. Configuring (DB_) fields in .env file would be enough to connect to the database.

## Steps to Run the app in your local machin:

* clone from repo and save it
    * git clone url    
* move to the root directory ie. todo-app
    * cd todo-app-api  
* open it with  text editor and create .env file in the root
* copy everything from .env.example file and paste it in .env file 

* run composer install : 
    * composer install 

* Generate application key by running : 
    * php artisan key:generate
    * copy and assign it to APP_KEY= variable in .env file 

* Then start the app: 
    * php artisan serve

## End points to the API resources 
Since all of routes are protected by laravel/sanctum , first thing needed is  to start by registering via ‘/v1/register’ route . 

    * POST :  http//localhost:8000/api/v1/register
        * need attributes : email , password, confirm_password, name 

    * Post :  http//localhost:8000/api/v1/login 
        * using : email , password

* Then free to go. Postman is  handy tool to play around with this. 
     N.B the returned token should be send back to server via Bearer token header or other way

    * GET : http//localhost:8000/api/v1/todos   // get all the todos of the user

    * GET : http//localhost:8000/api/v1/todos?status='status'   // get specific todos filterd by status

    * GET : http//localhost:8000/api/v1/todos/id 

    * POST : http//localhost:8000/api/v1/todos   
        * name ----  is required 
        * description ---optional 
        * status ---optional(but must be ['OnGoing' , 'NotStarted', 'Completed'] , default is 'NotStarted')

    * PUT : http//localhost:8000/api/v1/todos/id?status='thestatus' // using params is recommended

    N.B only values ['NotStarted', 'OnGoing', 'Completed'] are allowed. 

    * DELETE :  http:localhost:8000/api/v1/todos/id. 

## Features to add : 
* changePassword
 

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
