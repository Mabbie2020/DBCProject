<?php

use App\Http\Controllers\Authcontoller;
use App\Http\Controllers\studentcontroller;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\classescontroller;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layout.master');
// });

// Route::get('/greetings', function () {
//     return ('hello world');
// });

// Route::get('/post', function () {
//     return ('welcome to DBC class');
// });

// Route::view('/welcome','welcome' );

// Route::view('/layout','layout.master');


// Route::get('/user/{id}',function (string $id){
//     return 'user '.$id;
// });

// Route::get('/users/{name?}',function (?string $name='ben'){
//     return 'users '.$name;
// });

// Route::get('/auth', function () {
//     return ('welcome to DBC class');
// });


Route::redirect('/','login');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login',[Authcontoller::class, 'login']);

Route::group(['middleware'=>['auth']], function(){
    Route::post('/logout',[Authcontoller::class, 'logout']);

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });

// creating students routes
    #this route is for the students table or list
    Route::get('/students',[studentcontroller::class,'index']);

    #this route is for the students form
    Route::get('/students/create',[studentcontroller::class,'create']);
    Route::post('/students/create',[studentcontroller::class,'store'])->name('student.create');

    // route to return view to edit student details
    Route::get('/students/{id}/edit',[studentcontroller::class,'edit']);

    // route to update student details in the database
    Route::post('/students/{id}/update',[studentcontroller::class,'update']);

    Route::post('/students/{id}/delete',[studentcontroller::class,'delete']);


// creating users routes

    #this route is for the user table or list
    Route::get('/users',[usercontroller::class,'index']);

    #this route is for the users form
    Route::get('/users/create',[usercontroller::class,'create']);
    Route::post('/users/create',[usercontroller::class,'store'])->name('user.create');

    // route to return view to edit user details
    Route::get('/users/{id}/edit',[usercontroller::class,'edit']);

    // route to update user details in the database
    Route::post('/users/{id}/update',[usercontroller::class,'update']);

    Route::post('/users/{id}/delete',[usercontroller::class,'delete']);



// creating classes routes
     #this route is for the classes table or list
    //  Route::get('/classes',[classescontroller::class,'index']);

     #this route is for the students form
     Route::get('/students/create',[studentcontroller::class,'create']);
     Route::post('/students/create',[studentcontroller::class,'store'])->name('student.create');
 
     // route to return view to edit student details
     Route::get('/students/{id}/edit',[studentcontroller::class,'edit']);
 
     // route to update student details in the database
     Route::post('/students/{id}/update',[studentcontroller::class,'update']);
 
     Route::post('/students/{id}/delete',[studentcontroller::class,'delete']);
    
});

Route::get('/register', function () {
    return view('auth.register');

});

