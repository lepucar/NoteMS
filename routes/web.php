<?php

use App\Http\Controllers\Application\ApplicationController;
use App\Http\Controllers\Auth\LoginController;
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
    Route::post('/tasks/assign/{id}', [TaskController::class, 'assign'])->name('assignTask');
    Route::get('/tasks/view/{id}', [TaskController::class, 'view'])->name('viewTask');
});