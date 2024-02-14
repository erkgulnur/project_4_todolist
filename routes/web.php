<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/dashboard', [TaskController::class, 'addTask']);
    Route::get('/dashboard/{id}/delete', function ($id) {
        TaskController::deleteTask($id);
        return redirect('dashboard');
    })->where('id', '[0-9]+');
    Route::get('/dashboard/{id}/done', function ($id) {
        TaskController::doneTask($id);
        return redirect('dashboard');
    })->where('id', '[0-9]+');
    
});