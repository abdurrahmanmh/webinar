<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/todos', [TodoController::class,'index'])->name('todos.index')->middleware('auth');
Route::get('/todos/create', [TodoController::class,'create'])->name('todos.create');
Route::post('/todos', [TodoController::class,'store'])->name('todos.store');
Route::get('/todos/{todo}/edit', [TodoController::class,'edit'])->name('todos.edit');
Route::put('/todos/{todo}', [TodoController::class,'update'])->name('todos.update');
Route::delete('/todos/{todo}', [TodoController::class,'destroy'])->name('todos.destroy');

require __DIR__.'/auth.php';
