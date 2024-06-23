<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\NotesController;

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

Route::get('/', function () {
    return 'Привет, Ларавел!';
});

//Route::get('/test/{param}', [TestController::class, 'show'])->where('param', '[a-z]+');

Route::get('/test/token', fn() => csrf_token());

Route::post('/test/post', fn() => 'Это метод пост');

Route::get('/test/error', [TestController::class, 'errorPage']);

Route::get('/test.html', [TestController::class, 'index']);

Route::get('/test.html', [TestController::class, 'request']);

Route::get('/info', function () {
    return 'helloworld';
});

Route::get('/http-methods', function () {
    return 'get';
});

Route::match(['get', 'post', 'delete'], '/match', function () { return 'match';});
Route::any('/any', function () { return 'any';});

use Illuminate\Http\Request;
Route::get('/di', function (Request $request)
{
    return '<pre>' . dd($request);
});

Route::redirect('/uri1', '/uri2');
Route::get('/uri2', function (){return 'uri2';});

Route::resource('apartments', ApartmentController::class);

Route::resource('/notes', NotesController::class);
