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

Route::get('/book/{title}', 'BookController@show');


# practice
Route::any('/practice/{n?}', 'PracticeController@index');


# example rych-random route
Route::get('/exampleX', 'PracticeController@exampleX');


# example debugbar route
Route::get('/debugbar', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::info('Current environment: '.App::environment());
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Just demoing some of the features of Debugbar';

});


# LaravelLogViewer
if (config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}
