<?php



Route::get('/', function () {
    return view('index')->with('title', 'ГеймсМаркет - Главная');
});
Route::get('/about', function () {
    return view('about')->with('title', 'ГеймсМаркет - О компании');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');