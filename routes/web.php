<?php

use Illuminate\Support\Facades\Route;
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/*
|
| Web Routes
I
|
| Here is where you can register web routes for your
application. These
| routes are loaded by the RouteService Provider within a group
which
| contains the "web" middleware group. Now create something
great!
|
*/
Route::get('/', function () {
    return view('index');
});

Route::post('/send-message', function (Request $request) {
    echo  $request->input('username');
echo     $request->input('message');
    event(
        new Message(
            $request->input('username'),
            $request->input('message')
        )
    );

    return ["succes" => true];
});

