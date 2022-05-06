<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MoncompteController;

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


Route::get('/dashboard', function () {
                                        return view('dashboard');
                                    })->middleware(['auth'])->name('dashboard');

Route::get('/admin' , [DashboardController::class ,'index' ])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

route::get('/moncompte' , [MoncompteController::class , 'index'])->name('moncompte');
route::get('/panier' , [MoncompteController::class , 'panier'])->name('panier');


/* Route adminitration user */
route::get('/admin/user' , [UserController::class , 'index'])->middleware(['auth'])->name('admin-user');

/* Admin rights management */
route::get('/admin/user/right/{user}' , [UserController::class , 'manageRight'])->middleware(['auth'])->name('admin-user-right');


/* Route administration actu */
route::get('/admin/actu-lister' , [ActuController::class , 'index'])->middleware(['auth'])->name('admin-actu-lister');

route::get('/admin/actu-editer' , [ActuController::class , 'editer'])->middleware(['auth'])->name('admin-actu-editer');
route::post('/admin/actu-editer' , [ActuController::class , 'create'])->middleware(['auth'])->name('admin-actu-editer');

route::get('/admin/actu-editer/{actu}' , [ActuController::class , 'editer'])->middleware(['auth'])->name('admin-actu-modifier');
route::post('/admin/actu-editer/{actu}' , [ActuController::class , 'update'])->middleware(['auth'])->name('admin-actu-modifier');

route::get('/admin/actu-supprimer/{actu}' , [ActuController::class , 'delete'])->middleware(['auth'])->name('admin-actu-supprimer');

/* Route "News" */
route::get('/public/index' , [NewsController::class , 'index'])->name('index');

