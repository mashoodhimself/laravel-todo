<?php

use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [TaskController::class, 'index'] )->name('home');

Route::get('/progress', [TaskController::class, 'pending_tasks'] )->name('progress');

Route::get('/completed', [TaskController::class, 'completed_tasks'])->name('completed');

Route::get('/trashed', [TaskController::class, 'trashed_tasks'])->name('trashed');

Route::get('/task/add', [TaskController::class, 'create'] );

Route::post('/task/add', [TaskController::class, 'store']);

Route::get('/task/author/{user}', [TaskController::class, 'task_by_author']);

Route::get('/edit/task/{task}', [TaskController::class, 'edit']);

Route::post('/edit/task/{task}', [TaskController::class, 'update']);

Route::post('/trash/task/{task}', [TaskController::class, 'trash'])->name('trash');

Route::post('/delete/task/{task}', [TaskController::class, 'destroy'])->name('destroy');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');

Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');