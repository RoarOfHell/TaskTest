<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
require_once '../resources/php/ClientDB.php';
require_once '../resources/php/CarDB.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them wills
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('list');
});

Route::get('/page/{page}', function ($id) {
    return view('list');
});

Route::get('/edit/{userId}', function ($id) {
    $userId = DetectUpdateOrAddClient($id);
    $userId = DetectUpdateOrAddCar($id);


    return view('edit', compact('userId'));
});

Route::get('/delete/{carId}', function ($id) {
    DB::delete('delete from car where Id = '.$id);

    return view('list');
});
