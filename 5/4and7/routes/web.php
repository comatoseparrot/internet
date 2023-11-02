<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;

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
// activate server php artisan serve
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view ('test');
});

// API route operation
Route::get('/operation/{operation}/{num1}/{num2}', function ($operation, $num1, $num2) {
    switch ($operation) {
        case 'addition':
            return $num1 + $num2;
        case 'subtraction':
            return $num1 - $num2;
        case 'multiplication':
            return $num1 * $num2;
        case 'division':
            return $num1 / $num2;
    }
})->where('operation', 'addition|subtraction|multiplication|division')->whereNumber(['num1', 'num2']);


/*
// View route operation
Route::get('/operation/{operation}/{num1}/{num2}', function ($operation, $num1, $num2) {
    $result = 0;

    switch ($operation) {
        case 'addition':
            $result = $num1 + $num2;
            break;
        case 'subtraction':
            $result = $num1 - $num2;
            break;
        case 'multiplication':
            $result = $num1 * $num2;
            break;
        case 'division':
            $result = $num1 / $num2;
            break;
    }
    return view('operationresult', ['result' => $result]);
})->where('operation', 'addition|subtraction|multiplication|division')->whereNumber(['num1', 'num2']);
*/

// API route greet person
Route::get('/sayhello/{name}/{lastname?}/', function ($name, $lastname='') {
    return "Hello ${name} ${lastname}";
})->whereAlpha(['name', 'lastname']);

// View route greet person
Route::get('/sayhi/{name}/{lastname?}/', function ($name, $lastname='') {
    return view('sayhiresult', ['name' => $name,'lastname'=> $lastname]);
})->whereAlpha(['name', 'lastname']);

// Controller route greet person
Route::get('/greet/{name}/{lastname?}', [GreetController::class, 'greet'])->whereAlpha(['name', 'lastname']);
