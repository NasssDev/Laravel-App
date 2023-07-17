<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\YoloController;
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

Route::get('/api', function () {
    return view('welcome');
});


Route::get('/todoList', [TodoController::class, 'listTodo'])->name('todoList');
Route::get('/todoList/doTask/{id}', [TodoController::class, 'doTask']);
Route::get('/todoList/deleteTask/{id}', [TodoController::class, 'deleteTask']);
Route::post('/todoList', [TodoController::class, 'addTask']);

Route::get('/pong', [TodoController::class, 'pong']);

Route::post('/contact', [ContactController::class, 'store'])->name('contactStore.post');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','admin'])->group(function(){
    Route::get('/deleteContact/{id}', [AdminController::class, 'deleteContact'])
        ->name('deleteContact.get');

    Route::get('/admin', function () {
        return view('admin.admin');
    })->name('admin');

    Route::patch('/adminContact/{id}', [AdminController::class, 'AdminEditContact'])->name('adminEditContact.patch');
    Route::patch('/admin', [AdminController::class, 'AdminEditUser'])->name('adminEditUser.patch');

    route::get('/adminContacts', [AdminController::class, 'getAllContact'])
        ->name('adminContacts');

    route::get('/adminUsers', [AdminController::class, 'getAllUser'])->middleware(['auth', 'verified'])->name('adminUsers');

    route::get('/deleteUser/{id}', [AdminController::class, 'deleteUserGet'])
        ->name('destroyUser.get');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
