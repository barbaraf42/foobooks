<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


# example
Route::get('/example', function () {
    return 'hello there!';
});


# welcome

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'WelcomeController');


# books

Route::get('/books', 'BookController@index');


# book

// Route::get('/book/{title}', function($title) {
// 	return 'Results for the book: '.$title;
// });

// Route::get('/book/{title?}', function($title = '') {
//
//     if($title == '') {
//         return 'Your request did not include a title.';
//     }
//     else {
// 	    return 'Results for the book: '.$title;
//     }
//
// });

Route::get('/book/{title}', 'BookController@showBook');


# practice
Route::any('/practice/{n?}', 'PracticeController@index');
