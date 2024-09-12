<?php

use App\Http\Controllers\Application\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Note\NoteController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'index'])->name('showLogin');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('register', [UserController::class, 'register'])->name('registerPage');
Route::post('register', [UserController::class, 'store'])->name('storeUser');


Route::group(['namespace'=>'backend', 'prefix' => '', 'middleware' => 'auth'], function(){


    Route::get('/', [ApplicationController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


    //TASKS

    Route::get('/tasks', [TaskController::class, 'index'])->name('showTasks');
    Route::get('/tasks/add', [TaskController::class, 'create'])->name('createTask');
    Route::post('/tasks/add', [TaskController::class, 'store'])->name('storeTask');
    Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('editTask');
    Route::post('/tasks/edit/{id}', [TaskController::class, 'update'])->name('updateTask');
    Route::delete('/tasks/delete/{id}', [TaskController::class, 'delete'])->name('deleteTask');
    Route::get('/tasks/assign/{id}', [TaskController::class, 'showassign'])->name('showAssign');
    Route::post('/tasks/assign/{id}', [TaskController::class, 'assignTask'])->name('assignTask');
    Route::get('/tasks/view/{id}', [TaskController::class, 'view'])->name('viewTask');



    //NOTES

    Route::get('/notes', [NoteController::class, 'index'])->name('showNotes');
    Route::get('/notes/add', [NoteController::class, 'create'])->name('createNote');
    Route::post('/notes/add', [NoteController::class, 'store'])->name('storeNote');
    Route::get('/notes/edit/{id}', [NoteController::class, 'edit'])->name('editNote');
    Route::post('/notes/edit/{id}', [NoteController::class, 'update'])->name('updateNote');
    Route::get('/notes/delete/{id}', [NoteController::class, 'delete'])->name('deleteNote');
    Route::get('/notes/share/{id}', [NoteController::class, 'showShare'])->name('showShare');
    Route::post('/notes/share/{id}', [NoteController::class, 'share'])->name('shareNote');
    Route::get('/notes/view/{id}', [NoteController::class, 'view'])->name('viewNote');
});